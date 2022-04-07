<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2020-06-25 13:17:57 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:18:00 --> Query error: Unknown column 'position_id' in 'where clause' - Invalid query: SELECT *
FROM `career`
WHERE `position_id` = '7'
ERROR - 2020-06-25 13:20:25 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:20:29 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:20:31 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:20:35 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:20:37 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:21:26 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:21:41 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:21:56 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:22:22 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:22:30 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:22:34 --> Query error: Table 'dhofarlocal.career_details' doesn't exist - Invalid query: SELECT *
FROM `career_details`
WHERE `experience_id` = '4'
ERROR - 2020-06-25 13:22:51 --> Query error: Table 'dhofarlocal.career_details' doesn't exist - Invalid query: SELECT *
FROM `career_details`
WHERE `experience_id` = '4'
ERROR - 2020-06-25 13:24:04 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:24:17 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:24:20 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:24:58 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:25:06 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Promo_banner_model.php 105
ERROR - 2020-06-25 13:25:06 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Promo_banner_model.php 105
ERROR - 2020-06-25 13:25:06 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Promo_banner_model.php 105
ERROR - 2020-06-25 13:25:59 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:26:11 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 13:26:37 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 18:03:40 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 18:03:48 --> Query error: Expression #5 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'dhofarlocal.product_country_details.price' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `product`.`category_id`, `product`.`sub_category_id`, `sub_category`.`url`, `product`.`product_name`, `product_country_details`.`price`, `product`.`image_path`, `product`.`thumb_image_path`, `product`.`medium_image_path`, `product`.`related_products`, `product`.`active_subscription`, `product`.`new_arrival`, `product`.`stock`, `product`.`special_deal`, `product`.`special_deal_text`, `product`.`product_url`, `product`.`id` as `product_id`, count(product_image.product_id) as product_count
FROM `product`
LEFT JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id`
LEFT JOIN `product_country_details` ON `product_country_details`.`product_id` = `product`.`id`
LEFT JOIN `product_image` ON `product_image`.`product_id` = `product`.`id`
WHERE `product`.`is_active` = 1
AND `sub_category`.`is_active` = 1
GROUP BY `product`.`id`
ORDER BY `product`.`display_order` ASC
 LIMIT 8
ERROR - 2020-06-25 18:13:56 --> Query error: Expression #5 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'dhofarlocal.product_country_details.price' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `product`.`category_id`, `product`.`sub_category_id`, `sub_category`.`url`, `product`.`product_name`, `product_country_details`.`price`, `product`.`image_path`, `product`.`thumb_image_path`, `product`.`medium_image_path`, `product`.`related_products`, `product`.`active_subscription`, `product`.`new_arrival`, `product`.`stock`, `product`.`special_deal`, `product`.`special_deal_text`, `product`.`product_url`, `product`.`id` as `product_id`, count(product_image.product_id) as product_count
FROM `product`
LEFT JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id`
LEFT JOIN `product_country_details` ON `product_country_details`.`product_id` = `product`.`id`
LEFT JOIN `product_image` ON `product_image`.`product_id` = `product`.`id`
WHERE `product`.`is_active` = 1
AND `sub_category`.`is_active` = 1
GROUP BY `product`.`id`
ORDER BY `product`.`display_order` ASC
 LIMIT 8
ERROR - 2020-06-25 18:13:59 --> Query error: Expression #5 of SELECT list is not in GROUP BY clause and contains nonaggregated column 'dhofarlocal.product_country_details.price' which is not functionally dependent on columns in GROUP BY clause; this is incompatible with sql_mode=only_full_group_by - Invalid query: SELECT `product`.`category_id`, `product`.`sub_category_id`, `sub_category`.`url`, `product`.`product_name`, `product_country_details`.`price`, `product`.`image_path`, `product`.`thumb_image_path`, `product`.`medium_image_path`, `product`.`related_products`, `product`.`active_subscription`, `product`.`new_arrival`, `product`.`stock`, `product`.`special_deal`, `product`.`special_deal_text`, `product`.`product_url`, `product`.`id` as `product_id`, count(product_image.product_id) as product_count
FROM `product`
LEFT JOIN `sub_category` ON `sub_category`.`id` = `product`.`sub_category_id`
LEFT JOIN `product_country_details` ON `product_country_details`.`product_id` = `product`.`id`
LEFT JOIN `product_image` ON `product_image`.`product_id` = `product`.`id`
WHERE `product`.`is_active` = 1
AND `sub_category`.`is_active` = 1
GROUP BY `product`.`id`
ORDER BY `product`.`display_order` ASC
 LIMIT 8
ERROR - 2020-06-25 18:14:49 --> 404 Page Not Found: Assets/index
ERROR - 2020-06-25 19:30:20 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:30:21 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:31:12 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:33:02 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:33:10 --> Query error: Table 'dhofarlocal.career_details' doesn't exist - Invalid query: SELECT *
FROM `career_details`
WHERE `experience_id` IN('4', '3', '2', '1')
ERROR - 2020-06-25 19:33:41 --> Query error: Table 'dhofarlocal.career_details' doesn't exist - Invalid query: SELECT *
FROM `career_details`
WHERE `experience_id` IN('4', '3', '2', '1')
ERROR - 2020-06-25 19:34:28 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:34:40 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:34:45 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:37:38 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:37:41 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:38:25 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:38:30 --> Query error: Unknown column 'position_id' in 'where clause' - Invalid query: SELECT *
FROM `career`
WHERE `position_id` IN('6', '5', '4')
ERROR - 2020-06-25 19:39:00 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:39:44 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:39:47 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:40:16 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:40:21 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:40:33 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:40:38 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Promo_banner_model.php 106
ERROR - 2020-06-25 19:40:44 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:41:31 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:41:33 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:41:44 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:41:53 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Promo_banner_model.php 106
ERROR - 2020-06-25 19:43:41 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:43:44 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:43:55 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:44:42 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:45:26 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Promo_banner_model.php 106
ERROR - 2020-06-25 19:52:14 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:52:16 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:52:36 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:52:41 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:52:53 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 19:53:00 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:01:24 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:01:35 --> Severity: Warning --> unlink(./uploads/productimage/medium/fruit-vegetables.jpg): Permission denied /Library/WebServer/Documents/dhofar/application/models/Product_model.php 165
ERROR - 2020-06-25 20:01:35 --> Severity: Warning --> unlink(./uploads/productimage/medium/arhar-dal.jpg): Permission denied /Library/WebServer/Documents/dhofar/application/models/Product_model.php 165
ERROR - 2020-06-25 20:01:35 --> Severity: Warning --> unlink(./uploads/productimage/medium/logo.png): Permission denied /Library/WebServer/Documents/dhofar/application/models/Product_model.php 165
ERROR - 2020-06-25 20:01:35 --> Severity: Warning --> unlink(./uploads/productimage/medium/business-card.jpg): Permission denied /Library/WebServer/Documents/dhofar/application/models/Product_model.php 165
ERROR - 2020-06-25 20:01:35 --> Severity: Notice --> Array to string conversion /Library/WebServer/Documents/dhofar/system/database/DB_query_builder.php 2442
ERROR - 2020-06-25 20:01:35 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Array' at line 2 - Invalid query: DELETE FROM `product_country_details`
WHERE `product_id` = Array
ERROR - 2020-06-25 20:01:35 --> Severity: Warning --> Cannot modify header information - headers already sent by (output started at /Library/WebServer/Documents/dhofar/system/core/Exceptions.php:271) /Library/WebServer/Documents/dhofar/system/core/Common.php 570
ERROR - 2020-06-25 20:01:56 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:02:14 --> Severity: Notice --> Array to string conversion /Library/WebServer/Documents/dhofar/system/database/DB_query_builder.php 2442
ERROR - 2020-06-25 20:02:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Array' at line 2 - Invalid query: DELETE FROM `product_country_details`
WHERE `product_id` = Array
ERROR - 2020-06-25 20:04:19 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:04:33 --> Severity: Notice --> Use of undefined constant uid - assumed 'uid' /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 493
ERROR - 2020-06-25 20:04:33 --> Severity: Notice --> Undefined variable: data /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 493
ERROR - 2020-06-25 20:04:33 --> Severity: Notice --> Array to string conversion /Library/WebServer/Documents/dhofar/system/database/DB_query_builder.php 2442
ERROR - 2020-06-25 20:04:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Array' at line 2 - Invalid query: DELETE FROM `product_country_details`
WHERE `product_id` = Array
ERROR - 2020-06-25 20:05:08 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:05:11 --> Severity: Warning --> error_log() expects parameter 1 to be string, array given /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 493
ERROR - 2020-06-25 20:05:11 --> Severity: Notice --> Array to string conversion /Library/WebServer/Documents/dhofar/system/database/DB_query_builder.php 2442
ERROR - 2020-06-25 20:05:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Array' at line 2 - Invalid query: DELETE FROM `product_country_details`
WHERE `product_id` = Array
ERROR - 2020-06-25 20:07:02 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:07:17 --> Severity: Warning --> error_log() expects parameter 1 to be string, array given /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 493
ERROR - 2020-06-25 20:07:17 --> Severity: Notice --> Array to string conversion /Library/WebServer/Documents/dhofar/system/database/DB_query_builder.php 2442
ERROR - 2020-06-25 20:07:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Array' at line 2 - Invalid query: DELETE FROM `product_country_details`
WHERE `product_id` = Array
ERROR - 2020-06-25 20:07:44 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:08:49 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:08:52 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:09:37 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:09:39 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:10:23 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:11:37 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:11:40 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:11:51 --> Unable to save the image. Please make sure the image and file directory are writable.
ERROR - 2020-06-25 20:11:53 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:11:53 --> 404 Page Not Found: Uploads/productimage
ERROR - 2020-06-25 20:12:05 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:12:06 --> 404 Page Not Found: Uploads/productimage
ERROR - 2020-06-25 20:12:55 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:13:27 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:13:34 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 493
ERROR - 2020-06-25 20:13:34 --> Severity: Notice --> Array to string conversion /Library/WebServer/Documents/dhofar/system/database/DB_query_builder.php 2442
ERROR - 2020-06-25 20:13:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'Array' at line 2 - Invalid query: DELETE FROM `product_country_details`
WHERE `product_id` = Array
ERROR - 2020-06-25 20:13:48 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:14:34 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:15:22 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:16:54 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:16:59 --> Severity: Notice --> Use of undefined constant uid - assumed 'uid' /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 495
ERROR - 2020-06-25 20:16:59 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/dhofar/application/models/Product_model.php 176
ERROR - 2020-06-25 20:16:59 --> Severity: Notice --> Use of undefined constant uid - assumed 'uid' /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 495
ERROR - 2020-06-25 20:16:59 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/dhofar/application/models/Product_model.php 176
ERROR - 2020-06-25 20:16:59 --> Severity: Notice --> Undefined index: image_path_thumb /Library/WebServer/Documents/dhofar/application/models/Product_model.php 126
ERROR - 2020-06-25 20:16:59 --> Severity: Notice --> Undefined index: image_path_thumb /Library/WebServer/Documents/dhofar/application/models/Product_model.php 127
ERROR - 2020-06-25 20:16:59 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Product_model.php 127
ERROR - 2020-06-25 20:16:59 --> Severity: Notice --> Undefined index: medium_image_path /Library/WebServer/Documents/dhofar/application/models/Product_model.php 129
ERROR - 2020-06-25 20:16:59 --> Severity: Notice --> Undefined index: medium_image_path /Library/WebServer/Documents/dhofar/application/models/Product_model.php 130
ERROR - 2020-06-25 20:16:59 --> Severity: Warning --> unlink(./): Operation not permitted /Library/WebServer/Documents/dhofar/application/models/Product_model.php 130
ERROR - 2020-06-25 20:20:57 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:21:04 --> Severity: Notice --> Undefined variable: uid /Library/WebServer/Documents/dhofar/application/controllers/admin/Product.php 493
ERROR - 2020-06-25 20:21:26 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:22:04 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:22:14 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:24 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:25 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:28 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:22:29 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:22:54 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:31 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:32 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:42 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:25:43 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> Severity: Notice --> Undefined property: stdClass::$sub_category_name /Library/WebServer/Documents/dhofar/application/views/admin/vwAddSecondSubCategory.php 33
ERROR - 2020-06-25 20:26:27 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:27:54 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:27:55 --> 404 Page Not Found: Uploads/certificate
ERROR - 2020-06-25 20:28:03 --> Query error: Table 'dhofarlocal.brand' doesn't exist - Invalid query: SELECT *
FROM `brand`
WHERE CONCAT(",",`certification`,",") REGEXP ",(22),"
ERROR - 2020-06-25 20:29:42 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:29:42 --> 404 Page Not Found: Uploads/certificate
ERROR - 2020-06-25 20:30:10 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:30:22 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:30:25 --> Severity: Notice --> Undefined variable: query /Library/WebServer/Documents/dhofar/application/controllers/admin/Certification.php 161
ERROR - 2020-06-25 20:30:25 --> Severity: error --> Exception: Call to a member function num_rows() on null /Library/WebServer/Documents/dhofar/application/controllers/admin/Certification.php 161
ERROR - 2020-06-25 20:30:43 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:31:24 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:32:11 --> 404 Page Not Found: Assets/admin
ERROR - 2020-06-25 20:36:06 --> Severity: Notice --> Undefined variable: categories /Library/WebServer/Documents/dhofar/application/views/vwProductDetail.php 216
ERROR - 2020-06-25 20:36:06 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/dhofar/application/views/vwProductDetail.php 216
ERROR - 2020-06-25 20:46:38 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/dhofar/application/views/admin/vwAddCareer.php 32
ERROR - 2020-06-25 20:46:38 --> Severity: Warning --> Invalid argument supplied for foreach() /Library/WebServer/Documents/dhofar/application/views/admin/vwAddCareer.php 45
ERROR - 2020-06-25 20:47:34 --> Severity: Notice --> Undefined index: yearsofexperience /Library/WebServer/Documents/dhofar/application/views/vwCareer.php 330
ERROR - 2020-06-25 20:47:34 --> Severity: Notice --> Undefined index: yearsofexperience /Library/WebServer/Documents/dhofar/application/views/vwCareer.php 330
ERROR - 2020-06-25 20:47:55 --> Severity: Notice --> Undefined index: yearsofexperience /Library/WebServer/Documents/dhofar/application/views/vwCareer.php 330
ERROR - 2020-06-25 20:47:55 --> Severity: Notice --> Undefined index: yearsofexperience /Library/WebServer/Documents/dhofar/application/views/vwCareer.php 330
ERROR - 2020-06-25 20:48:03 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 20:48:36 --> Severity: Notice --> Undefined index: yearsofexperience /Library/WebServer/Documents/dhofar/application/views/vwCareer.php 330
ERROR - 2020-06-25 20:48:36 --> Severity: Notice --> Undefined index: yearsofexperience /Library/WebServer/Documents/dhofar/application/views/vwCareer.php 330
ERROR - 2020-06-25 20:48:37 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 20:50:13 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 20:50:29 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 20:51:04 --> 404 Page Not Found: Product/product_detail
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 30
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 34
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 38
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 42
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 46
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 50
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 56
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 57
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 58
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 63
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 67
ERROR - 2020-06-25 20:55:27 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 71
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 30
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 34
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 38
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 42
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 46
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 50
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 56
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 57
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 58
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 63
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 67
ERROR - 2020-06-25 23:26:50 --> Severity: Notice --> Trying to get property of non-object /Library/WebServer/Documents/dhofar/application/views/vwUserProfileUpdate.php 71
ERROR - 2020-06-25 23:27:14 --> 404 Page Not Found: Assets/images
ERROR - 2020-06-25 23:28:04 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 23:28:05 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:31:59 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:33:07 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:44 --> 404 Page Not Found: Assets/frontend
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:34:45 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:38:01 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 122
ERROR - 2020-06-25 23:39:03 --> Severity: Notice --> Undefined index: custom_order_id /Library/WebServer/Documents/dhofar/application/views/admin/vwViewOrders.php 56
ERROR - 2020-06-25 23:39:40 --> Severity: Notice --> Undefined index: custom_orderid /Library/WebServer/Documents/dhofar/application/views/admin/vwViewOrders.php 56
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:43:09 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:44:53 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:15 --> Severity: Warning --> error_log() expects parameter 1 to be string, object given /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:15 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:34 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:35 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
ERROR - 2020-06-25 23:45:35 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 118
ERROR - 2020-06-25 23:45:35 --> Severity: Notice --> Undefined property: stdClass::$country /Library/WebServer/Documents/dhofar/application/controllers/admin/Orders.php 126
