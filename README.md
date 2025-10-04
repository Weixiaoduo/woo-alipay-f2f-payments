# Woo Alipay - Face To Face Extension

独立的 WooCommerce 支付宝当面付（扫码）扩展插件。

## 概述

此插件为 WooCommerce 提供支付宝当面付（扫码支付）功能。它作为 Woo Alipay 核心插件的扩展，独立启用当面付支付网关。

## 功能特性

- 支持支付宝当面付（扫码支付）
- 独立于核心 Woo Alipay 插件运行
- 支持 WooCommerce Blocks（结账块）
- 自动激活支付网关
- 提供设置页面快捷入口

## 安装要求

- WordPress 5.0+
- WooCommerce 3.0+
- Woo Alipay 核心插件

## 安装方法

1. 下载插件文件到 WordPress 插件目录
2. 在 WordPress 管理后台启用插件
3. 在 WooCommerce 设置中配置支付宝当面付

## 文件结构

```
woo-alipay-f2f/
├── woo-alipay-f2f.php     # 主插件文件
├── bootstrap.php          # 插件引导文件
├── css/                   # 样式文件
├── js/                    # JavaScript 文件
└── inc/                   # 核心功能文件
    ├── templates/         # 模板文件
    └── class-*.php        # 类文件
```

## 使用说明

1. 确保已安装并启用 WooCommerce 和 Woo Alipay 核心插件
2. 启用本扩展插件
3. 在 WooCommerce > 设置 > 付款 > 支付宝当面付 中进行配置
4. 设置支付宝商户信息和相关参数

## 技术支持

如有问题，请访问 [WooCN.com](https://woocn.com/)

## 版本信息

- **版本：** 0.1.0
- **作者：** WooCN.com
- **插件主页：** https://woocn.com/

## 许可证

本插件遵循 WordPress GPL 许可证。