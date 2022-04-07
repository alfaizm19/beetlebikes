<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-12 07:50:05 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 07:50:10 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 08:16:20 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:16:31 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:26:11 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:37:03 --> 404 Page Not Found: admin/Product_showcase/index
ERROR - 2022-02-12 08:38:26 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:38:26 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:40:05 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:42:53 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:43:13 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:43:58 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:44:07 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:45:29 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:46:52 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:47:30 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:48:04 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:52:28 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:53:09 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:54:13 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:58:18 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:59:17 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 08:59:49 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:00:00 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:00:13 --> Severity: Notice --> Undefined property: Product_showcase::$product_image /opt/lampp/htdocs/beetlebikes/application/controllers/admin/Product_showcase.php 238
ERROR - 2022-02-12 09:00:13 --> Severity: error --> Exception: Call to a member function get() on null /opt/lampp/htdocs/beetlebikes/application/controllers/admin/Product_showcase.php 238
ERROR - 2022-02-12 09:01:05 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 27
ERROR - 2022-02-12 09:01:05 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 28
ERROR - 2022-02-12 09:01:05 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 34
ERROR - 2022-02-12 09:01:05 --> Severity: Notice --> Undefined property: stdClass::$video_url /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 37
ERROR - 2022-02-12 09:01:05 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 41
ERROR - 2022-02-12 09:01:06 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:28:32 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 27
ERROR - 2022-02-12 09:28:32 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 28
ERROR - 2022-02-12 09:28:32 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 34
ERROR - 2022-02-12 09:28:32 --> Severity: Notice --> Undefined property: stdClass::$video_url /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 37
ERROR - 2022-02-12 09:28:32 --> Severity: Notice --> Undefined property: stdClass::$type /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProductImage.php 41
ERROR - 2022-02-12 09:28:33 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:28:58 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:29:11 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:30:52 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:31:00 --> Severity: Notice --> Undefined index: product_showcase /opt/lampp/htdocs/beetlebikes/application/libraries/Image_upload.php 115
ERROR - 2022-02-12 09:31:00 --> Severity: Notice --> Trying to access array offset on value of type null /opt/lampp/htdocs/beetlebikes/application/libraries/Image_upload.php 115
ERROR - 2022-02-12 09:31:00 --> Severity: Notice --> Undefined index: product_image /opt/lampp/htdocs/beetlebikes/application/libraries/Image_upload.php 122
ERROR - 2022-02-12 09:31:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given /opt/lampp/htdocs/beetlebikes/application/libraries/Image_upload.php 122
ERROR - 2022-02-12 09:31:00 --> Severity: Notice --> Undefined index: product_image /opt/lampp/htdocs/beetlebikes/application/libraries/Image_upload.php 174
ERROR - 2022-02-12 09:31:00 --> Severity: Warning --> in_array() expects parameter 2 to be array, null given /opt/lampp/htdocs/beetlebikes/application/libraries/Image_upload.php 174
ERROR - 2022-02-12 09:31:00 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /opt/lampp/htdocs/beetlebikes/system/core/Exceptions.php:271) /opt/lampp/htdocs/beetlebikes/system/helpers/url_helper.php 561
ERROR - 2022-02-12 09:32:18 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:32:29 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:32:48 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:32:53 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:33:01 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:34:06 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:34:12 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:34:19 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 09:34:40 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:17:53 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:17:55 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:19:35 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:19:36 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:19:38 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:19:43 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:19:44 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:19:45 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:19:46 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:19:49 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:19:59 --> Severity: Notice --> Undefined property: stdClass::$popular /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProduct.php 543
ERROR - 2022-02-12 11:19:59 --> Severity: Notice --> Undefined property: stdClass::$product_tag /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProduct.php 577
ERROR - 2022-02-12 11:19:59 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:20:04 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:20:09 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 11:20:14 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:20:23 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:21:03 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND `stock` >= 1
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:21:04 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:21:17 --> Severity: Notice --> Undefined variable: price /opt/lampp/htdocs/beetlebikes/application/controllers/Product.php 49
ERROR - 2022-02-12 11:21:17 --> Severity: Notice --> Undefined offset: 1 /opt/lampp/htdocs/beetlebikes/application/models/front/Product_model.php 224
ERROR - 2022-02-12 11:21:17 --> Severity: Notice --> Undefined variable: price /opt/lampp/htdocs/beetlebikes/application/controllers/Product.php 126
ERROR - 2022-02-12 11:21:17 --> Severity: Notice --> Undefined offset: 1 /opt/lampp/htdocs/beetlebikes/application/models/front/Product_model.php 244
ERROR - 2022-02-12 11:21:20 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:23:17 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:23:18 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:24:19 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> Severity: Notice --> Undefined index: stock /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 69
ERROR - 2022-02-12 11:24:20 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:24:49 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:24:50 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:27:34 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:27:34 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `id` = '2'
ERROR - 2022-02-12 11:27:47 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:27:47 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `id` = '2'
ERROR - 2022-02-12 11:28:26 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:28:27 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:28:29 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:28:47 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:28:48 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:28:53 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-12'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-12 11:29:19 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:29:22 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:29:23 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:29:30 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:32:29 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:32:30 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:35:31 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:36:02 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:36:58 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:37:25 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:49:27 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:49:48 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:50:56 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:51:02 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:51:08 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:51:13 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:52:10 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:52:38 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:53:18 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:53:49 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:55:46 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:56:23 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:56:47 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 11:57:35 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:00:25 --> Severity: error --> Exception: Call to undefined method Master_model::getLabel() /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 24
ERROR - 2022-02-12 12:00:39 --> Severity: error --> Exception: Call to undefined method Master_model::getLabel() /opt/lampp/htdocs/beetlebikes/application/views/front/ajaxProductsContent.php 24
ERROR - 2022-02-12 12:00:54 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:01:01 --> Severity: Notice --> Undefined property: stdClass::$popular /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProduct.php 543
ERROR - 2022-02-12 12:01:01 --> Severity: Notice --> Undefined property: stdClass::$product_tag /opt/lampp/htdocs/beetlebikes/application/views/admin/vwEditProduct.php 577
ERROR - 2022-02-12 12:01:01 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:01:02 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:01:18 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:01:20 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:01:43 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:01:53 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:29 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:38 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:40 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:42 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:46 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:48 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:49 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:50 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:02:59 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:03:10 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:05:06 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-12 12:26:30 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:26:31 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:26:39 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:27:44 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:27:44 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:27:48 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:28:19 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:29:09 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:29:35 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:29:37 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:30:32 --> 404 Page Not Found: Assets/frontend
ERROR - 2022-02-12 12:32:32 --> 404 Page Not Found: Uploads/product
