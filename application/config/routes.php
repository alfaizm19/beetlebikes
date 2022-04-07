<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['forgot-password'] = 'Home/forgotPassword';
$route['reset-password'] = 'Home/resetPassword';

$route['admin/product/excel-update-product'] = 'admin/product/excelUpdateProduct';

$route['admin/orders/excel-change-order-status'] = 'admin/orders/excelChangeOrderStatus';

$route['admin/category-level-1'] = 'admin/category/index';
$route['admin/category-level-1/create'] = 'admin/category/create';
$route['admin/category-level-1/edit/(:any)'] = 'admin/category/edit/$1';
$route['admin/category-level-1/delete'] = 'admin/category/delete';
$route['admin/category-level-1/bulk_delete'] = 'admin/category/bulk_delete';
$route['admin/category-level-1/is_active'] = 'admin/category/is_active';


$route['admin/category-level-2'] = 'admin/category2/index';
$route['admin/category-level-2/create'] = 'admin/category2/create';
$route['admin/category-level-2/edit/(:any)'] = 'admin/category2/edit/$1';
$route['admin/category-level-2/delete'] = 'admin/category2/delete';
$route['admin/category-level-2/bulk_delete'] = 'admin/category2/bulk_delete';
$route['admin/category-level-2/is_active'] = 'admin/category2/is_active';


$route['admin/attribute-value'] = 'admin/attribute_value/index';
$route['admin/attribute-value/(:any)'] = 'admin/attribute_value/index/$1';

$route['admin/attribute-value/create'] = 'admin/attribute_value/create';
$route['admin/attribute-value/create/(:any)'] = 'admin/attribute_value/create/$1';


$route['admin/attribute-value/edit/(:any)'] = 'admin/attribute_value/edit/$1';
$route['admin/attribute-value/delete'] = 'admin/attribute_value/delete';
$route['admin/attribute-value/bulk_delete'] = 'admin/attribute_value/bulk_delete';
$route['admin/attribute-value/is_active'] = 'admin/attribute_value/is_active';



$route['admin/collections'] = 'admin/collections/index';
$route['admin/collections/create'] = 'admin/collections/create';
$route['admin/collections/edit/(:num)'] = 'admin/collections/edit/$1';
$route['admin/collections/delete'] = 'admin/collections/delete';
$route['admin/collections/bulk_delete'] = 'admin/collections/bulk_delete';
$route['admin/collections/is_active'] = 'admin/collections/is_active';


$route['category'] = 'category/index';
$route['category/(:any)'] = 'category/index/$1';
$route['category/(:any)/(:any)'] = 'category/index/$1/$2';


$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route["upload"] = "Upload/index";

/*
$route["products"] = "Products/index";
$route["products/(:any)"] = "Products/index/$1";
*/
/*$route["blogs"] = "Blogs/index";
$route["blogs/(:any)"] = "Blogs/index/$1";
$route["blogs-category/(:any)"] = "Blogs/category/$1";*/


$route["checkout"] = "Checkout/index";

$route["globalsearch"] = "home/globalsearch";


//$route['thank-you'] = "Customer/thankyou";
//$route['payment-failed'] = "Customer/paymentFailed";

$route['customer/change-password'] = "Customer/changePassword";
$route['customer/add-address'] = "Customer/addAddress";
$route['customer/edit-address/(:any)'] = "Customer/editAddress/$1";

//$route['customer/write-review/(:any)'] = "Customer/writeReview/$1";

// $route['forgot-password'] = "Customer/forgotPass";
// $route['reset-password'] = "Customer/resetPass";
// $route['reset-password/(:any)'] = "Customer/resetPass/$1";



$route['/(:any)'] = "home/category_level_1";
$route['about-us'] = "home/about_us";


$route['online-payment'] = "home/online_payment";
$route['shipping-and-delivery'] = "home/shipping";
$route['refund-policy'] = "home/refund_policy";
//$route['reviews'] = "home/reviews";
$route['services'] = "home/services";
$route['terms-and-conditions'] = "home/terms_and_conditions";

/*------------------------------ Auth rout ------------------------------*/
$route['admin'] = 'admin/auth/index';

$route['admin/do-login'] = 'admin/auth/doLogin';
$route['admin/verify-otp'] = 'admin/auth/verifyOtp';
$route['admin/do-verify-otp'] = 'admin/auth/doOtpVerify';

$route['admin/forgot-password'] = 'admin/auth/forgotPassword';
$route['admin/do-forgot'] = 'admin/auth/do_forgotPassword';

$route['admin/reset-password/(:any)'] = 'admin/auth/resetPassword/$1';
$route['admin/do-resetpassword/(:any)'] = 'admin/auth/do_resetPassword/$1';

/*------------------------------ End Auth rout ------------------------------*/

/*------------------------------ Site setting  ------------------------------*/

$route['admin/site-setting'] = 'admin/site_settings/edit';
$route['admin/profile'] = 'admin/profile/edit/';
$route['admin/change-password'] = 'admin/change_password/create/';

/*------------------------------ End Site setting  ------------------------------*/


/**---------------------------- News ------------------------------------------*/

$route['admin/news_image/index/(:num)/delete'] = 'admin/news_image/delete';
$route['admin/news_image/index/(:num)/bulk_delete'] = 'admin/news_image/bulk_delete';

/**---------------------------- End News ------------------------------------------*/


/*------------------------------ Blog Category  ------------------------------*/

$route['admin/blog-category'] = 'admin/blog_category/index';
$route['admin/blog-category/create'] = 'admin/blog_category/create';
$route['admin/blog-category/edit/(:num)'] = 'admin/blog_category/edit/$1';
$route['admin/blog-category/delete'] = 'admin/blog_category/delete';
$route['admin/blog-category/bulk_delete'] = 'admin/blog_category/bulk_delete';
$route['admin/blog-category/is_active'] = 'admin/blog_category/is_active';

/*------------------------------ End Blog Category  ------------------------------*/

/*------------------------------ Consultation Enquiry  ------------------------------*/

$route['admin/distributor-enquiry'] = 'admin/distributor_enquiry/index';
$route['admin/distributor-enquiry/view-distributor-enquiry/(:num)'] = 'admin/distributor_enquiry/view_distributor_enquiry/$1';

/*------------------------------ End Consultation Enquiry  ------------------------------*/


$route["admin/career/edit-question/(:num)"] = "admin/career/editQuestion/$1";

$route["admin/faq/(:num)"] = "admin/faq/index/$1";

$route["admin/site-reviews"] = "admin/SiteReviews/index";
$route["admin/site-reviews/create"] = "admin/SiteReviews/create";
$route["admin/site-reviews/(:num)"] = "admin/SiteReviews/index/$1";
$route["admin/site-reviews/edit/(:num)"] = "admin/SiteReviews/edit/$1";

$route["admin/promo-code"] = "admin/Promo_code/index";
$route["admin/promo-code/create"] = "admin/Promo_code/create";
$route["admin/promo-code/(:any)"] = "admin/Promo_code/index/$1";
$route["admin/promo-code/edit/(:any)"] = "admin/Promo_code/edit/$1";

$route["admin/site-faq"] = "admin/SiteFaq/index";
$route["admin/site-faq/create"] = "admin/SiteFaq/create";
$route["admin/site-faq/(:num)"] = "admin/SiteFaq/index/$1";
$route["admin/site-faq/edit/(:num)"] = "admin/SiteFaq/edit/$1";

$route["admin/user-rights"] = "admin/UserRights/index";
$route["admin/user-rights/create"] = "admin/UserRights/create";
$route["admin/user-rights/(:any)"] = "admin/UserRights/index/$1";
$route["admin/user-rights/edit/(:any)"] = "admin/UserRights/edit/$1";


/*

$route['wishlist'] = "product/wishlist";
$route['checkout'] = "product/checkout";
$route['about'] = "home/about";

$route['logout'] = "login/logout";

$route['forgot-password'] = "login/forgotPassword";
$route['categoriesAjax'] = 'category/categoryListAjax';
$route['categoriesAjax/(:any)'] = "category/categoryListAjax/$1";

$route['products/addWishlistProduct'] = 'product/addWishlistProduct';
$route['products/removeWishlistProduct'] = 'product/removeWishlistProduct';

// Product Routes Start

$route['products/removeCartProduct'] = 'product/removeCartProduct';
$route['products/addCartProduct'] = 'product/addCartProduct';


$route['product/(:any)'] = "product/details/$1";
$route['products/(:any)'] = "product/$1";
$route['products'] = 'product/index';
$route['productsAjax'] = 'product/productListAjax';
$route['productsAjax/(:any)'] = "product/productListAjax/$1";
$route['products/(:num)'] = 'product/index/$1';
$route['cart'] = "product/cart";
$route['products/cartUpdate'] = 'product/cartUpdate';

*/


$route['wishlist'] = "product/wishlist";

$route['warranty-terms'] = "home/warrantyTerms";
$route['faq'] = "home/faq";
$route['privacy-policy'] = "home/privacy";

$route['return-and-refund-policy'] = "home/returnPolicy";

$route['terms-and-conditions'] = "home/termsAndCondition";
$route['dealers-enquiry'] = "home/dealersEnquiry";
$route['media'] = "home/media";

$route['contact'] = "home/contact";
$route['about'] = "home/about";
$route['register-bike'] = "home/registerBike";

$route['logout'] = "login/logout";

// $route['forgot-password'] = "login/forgotPassword";


$route['products/addWishlistProduct'] = 'product/addWishlistProduct';
$route['products/removeWishlistProduct'] = 'product/removeWishlistProduct';

// Product Routes Start

$route['products/removeCartProduct'] = 'product/removeCartProduct';
$route['products/addCartProduct'] = 'product/addCartProduct';


$route['product/(:any)'] = "product/details/$1";
$route['products/(:any)'] = "product/$1";
$route['products'] = 'product/index';
$route['productsAjax'] = 'product/productListAjax';
$route['productsAjax/(:any)'] = "product/productListAjax/$1";
$route['products/(:num)'] = 'product/index/$1';
$route['cart'] = "product/cart";
$route['products/cartUpdate'] = 'product/cartUpdate';
$route['products/cartHeader'] = 'product/cartHeader';

$route['checkCouponCode'] = 'product/checkCouponCode';
$route['thank-you'] = 'checkout/thankyourRazorPay';


$route['category'] = "category/index";
$route['category/(:any)'] = "category/subcategory/$1";

$route['categoriesAjax'] = 'category/categoryListAjax';
$route['categoriesAjax/(:any)'] = "category/categoryListAjax/$1";

$route['subCategoryListAjax'] = 'category/subCategoryListAjax';
$route['subCategoryListAjax/(:any)'] = "category/subCategoryListAjax/$1";

$route['blog'] = "blog/index";
$route['blog/(:any)'] = "blog/details/$1";

$route['blogListAjax'] = 'blog/blogListAjax';
$route['blogListAjax/(:any)'] = "blog/blogListAjax/$1";

$route['review/create/(:any)'] = "review/index/$1";