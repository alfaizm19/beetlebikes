<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-02-17 16:01:04 --> 404 Page Not Found: Uploads/product
ERROR - 2022-02-17 16:01:14 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-17'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
ERROR - 2022-02-17 16:09:46 --> Query error: Not unique table/alias: 'cart' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`
FROM `cart` as `cart`, `wishlist` as `wish`, `cart` as `cart`, `wishlist` as `wish`, `product_showcase`
WHERE `product_id` = '21'
ERROR - 2022-02-17 16:10:03 --> Query error: Unknown column 'prod.id' in 'field list' - Invalid query: SELECT `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `cart`.`id` as `cart_id`, `cart`.`quantity` as `cart_qty`, `prod`.`category_level_1`, `prod`.`category_level_2`, `prod`.`id`, `prod`.`product_name`, `prod`.`slug`, `prod`.`sku_code`, `prod`.`selling_price`, `prod`.`image_path`, `prod`.`mrp`, `wish`.`id` as `wish_id`, `product_name`, `slug`, `mrp`, `selling_price`, `id`, `image_path`, `sku_code`
FROM `cart` as `cart`, `wishlist` as `wish`, `product`
WHERE `available_date` <= '2022-02-17'
AND `is_active` = 1
AND `category_level_1` = 8
AND SHA2(id, 256) IN('4ec9599fc203d176a301536c2e091a19bc852759b255bd6818810a42c5fed14a', 'b17ef6d19c7a5b1ee83b907c595526dcb1eb06db8227d650d5dda0a9f4ce8cd9', '6b51d431df5d7f141cbececcf79edf3dd861c3b4069f0b11661a3eefacbba918')
ORDER BY `id` DESC
 LIMIT 3
