<?php
/*
 * Plugin Name: Woo Alipay - Face To Face Extension
 * Plugin URI: https://woocn.com/
 * Description: 独立启用 Woo Alipay 的“当面付（扫码）”网关。需要先安装并启用 Woo Alipay 与 WooCommerce。
 * Version: 0.1.0
 * Author: WooCN.com
 * Author URI: https://woocn.com/
 * Requires Plugins: woocommerce, woo-alipay
 * Text Domain: woo-alipay-f2f
 * Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

// 启用核心插件中的“当面付”特性
add_filter( 'woo_alipay_enable_facetopay', '__return_true', 10, 0 );

// 覆盖资源（样式/脚本/Blocks/模板）位置为扩展自身
add_filter( 'woo_alipay_facetopay_style_url', function( $default ) {
    return plugin_dir_url( __FILE__ ) . 'css/alipay-facetopay.css';
}, 10, 1 );

add_filter( 'woo_alipay_facetopay_script_url', function( $default ) {
    return plugin_dir_url( __FILE__ ) . 'js/alipay-facetopay.js';
}, 10, 1 );

add_filter( 'woo_alipay_facetopay_blocks_script_url', function( $default ) {
    return plugin_dir_url( __FILE__ ) . 'js/frontend/blocks-facetopay.js';
}, 10, 1 );

add_filter( 'woo_alipay_facetopay_blocks_asset_path', function( $default ) {
    return plugin_dir_path( __FILE__ ) . 'js/frontend/blocks-facetopay.asset.php';
}, 10, 1 );

add_filter( 'woo_alipay_facetopay_qrcode_template', function( $default ) {
    return plugin_dir_path( __FILE__ ) . 'inc/templates/payment-qrcode.php';
}, 10, 1 );

// 加载扩展引导（注册网关和 Blocks 支持）
require_once plugin_dir_path( __FILE__ ) . 'bootstrap.php';

// 可选：激活时将网关设为启用
register_activation_hook( __FILE__, function () {
    if ( current_user_can( 'manage_woocommerce' ) ) {
        $option_key = 'woocommerce_alipay_facetopay_settings';
        $settings = get_option( $option_key, array() );
        $settings['enabled'] = 'yes';
        update_option( $option_key, $settings );
        wp_cache_flush();
    }
} );

// 设置页快捷入口
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function( $links ) {
    $url = admin_url( 'admin.php?page=wc-settings&tab=checkout&section=alipay_facetopay' );
    $links[] = '<a href="' . esc_url( $url ) . '">' . esc_html__( 'Settings', 'woo-alipay-f2f' ) . '</a>';
    return $links;
} );
