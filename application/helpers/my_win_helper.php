<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('get_css')) {

    /**
     * Create a link from a js array or string
     * HTTP_ASSETS_PATH_ADMIN_CSS set a base path of js folder ex assets/client/js admin or client as u want
     * @param Array $css accept a array
     * @param Sting $css accept a  signal string
     * @param String $prifix use both of them admin and client admin/client as u want
     * @return void
     */
    function get_css($css = NULL, $prifix = 'client') {
        // $CI =& get_instance();
        $get_css = "";
        //$path  = ($prifix == 'admin') ? HTTP_ASSETS_PATH_ADMIN_CSS : HTTP_ASSETS_PATH_CLIENT_CSS ;
        $ci = & get_instance();
        $ci->config->load('assets', TRUE);
        $path = $ci->config->item($prifix);


        if (isset($css) && !empty($css) && !is_null($path)) {
            if (is_array($css)) {
                foreach ($css as $css_key => $css_value) {
                    $get_css .= '<link rel="stylesheet" href="' . base_url() . $path . $css_value . '" type="text/css">' . "\n";
                }
            } else {
                $get_css .= '<link rel="stylesheet" href="' . base_url() . $path . $css . '" type="text/css">' . "\n";
            }
        }
        return $get_css;
    }

}


if (!function_exists('get_js')) {

    /**
     * Create a link from a js array or string
     * HTTP_ASSETS_PATH_ADMIN_JS set a base path of js folder ex assets/client/js admin or client as u want
     * @param Array $js accept a array
     * @param Sting $js accept a  signal string
     * @param String $prifix use both of them admin and client admin/client as u want
     * @return void
     */
    function get_js($js = NULl, $prifix = 'client') {
        // $CI =& get_instance();
        $get_js = "";
        //$path  = ($prifix == 'admin') ? HTTP_ASSETS_PATH_ADMIN_JS : HTTP_ASSETS_PATH_CLIENT_JS ;
        $ci = & get_instance();
        $ci->config->load('assets', TRUE);
        $path = $ci->config->item($prifix);
        if (isset($js) && !empty($js)) {
            if (is_array($js)) {
                foreach ($js as $js_key => $js_value) {
                    $get_js .= '<script src="' . base_url() . $path . trim($js_value) . '"></script>' . "\n";
                }
            } else {
                $get_js .= '<script src="' . base_url() . $path . trim($js) . '"></script>' . "\n";
            }
        }
        return $get_js;
    }

}


if (!function_exists('get_input')) {

    /**
     * When server side validation is used , redirect to curent page to refill to input value to used
     * postdata key to use a session
     * @param String $key input name
     * @param string $default input defalult value
     */
    function get_input($key = NULl, $default = '') {
        $ci = & get_instance();
        $ci->load->library('session');


        $poatdata = $ci->session->flashdata('postdata');

        if (array_key_exists($key, $ci->input->post())) {
            return $ci->input->post($key);
        }

        if ($key !== NULL AND ! empty($poatdata)) {
            if (array_key_exists($key, $poatdata)) {
                return $poatdata[$key];
            }
        }

        return $default;
    }

}


if (!function_exists('get_checkbox')) {

    /**
     * Rechecked a check box
     * @param String $key input name
     * @param string $value checkbox box value
     * @return void
     */
    function get_checkbox($key = NULl, $value = '', $default = '') {

        $ci = & get_instance();
        $ci->load->library('session');
        $poatdata = $ci->session->flashdata('postdata');

        if ($default) {
            return "checked";
        }

        if (!isset($poatdata[$key]) && !isset($_POST[$key])) {
            return FALSE;
        }

        if ((is_array($poatdata[$key]) && in_array($value, $poatdata[$key], TRUE) ) OR isset($_POST[$key])) {
            return "checked";
        } else {
            if ($key !== NULL AND ! empty($poatdata)) {
                if (array_key_exists($key, $poatdata) AND $poatdata[$key] !== "" AND ! is_array($poatdata[$key])) {
                    return "checked";
                }
            }
        }
        /** if $default is true then is checked */
        return $default;
    }

}


if (!function_exists('has_error')) { /**
 * Check a server side form validation and input need to display a error
 * @param  String $key as input name
 * @param  String $default
 * @return NUll
 */

    function has_error($key = NULl, $default = NULL) {
        $ci = & get_instance();
        $ci->load->library('session');
        $errors = $ci->session->flashdata('error');

        if (is_array($errors) && !empty($errors)) {
            if (array_key_exists($key, $errors)) {
                return $errors[$key];
            }
        }
        return $default;
    }

}


if (!function_exists('display_flash')) {

    /**
     * Get a flash message from name
     * @param String $name
     * @return void
     */
    function display_flash($name) {
        $CI = & get_instance();
        if ($CI->session->flashdata($name)) {
            $flash = $CI->session->flashdata($name);
            if (is_array($flash['message'])) {
                $msg = '<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-' . $flash['message_type'] . ' alert-dismissible fade show" role="alert">
                <div class="m-alert__icon"> <i class="la la-info-circle"></i> </div>
                <div class="m-alert__text">';
                foreach ($flash['message'] as $flash_message) {
                    $msg .= $flash_message . '<br />';
                }
                return $msg . '</div>
                <div class="m-alert__close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>';
            } else {
                return '<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-' . $flash['message_type'] . ' alert-dismissible fade show" role="alert"> <div class="m-alert__icon"> <i class="la la-info-circle"></i> </div> <div class="m-alert__text"> ' . $flash['message'] . '</div> <div class="m-alert__close"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button> </div> </div>';
            }
        }
    }

}

if (!function_exists('set_flash')) {

    /**
     * set a falsh message
     * @param String $name
     * @param String $message_type calss name ex danger,success,info,warning
     * @param String $message Only singale OR multipal as array message
     * @param Array  $message Only singale string OR multipal as array message
     * @return void
     */
    function set_flash($name, $message_type, $message) {
        $CI = & get_instance();
        $CI->session->set_flashdata($name, array('message_type' => $message_type, 'message' => $message));
    }

}

if (!function_exists('is_menu_active')) {

    /**
     * Set a active class fore curen controller
     * @param String $controller
     * @return void
     */
    function is_menu_active($controller, $class = NUll) {
        $CI = & get_instance();

        if (is_array($controller) && in_array($CI->router->fetch_class(), $controller)) {
            $controller_class = $CI->router->fetch_class();
            return ($controller_class == array_key_exists($controller_class, $controller)) ? config_item('active_class') . ' ' . $class : '';
        }

        $controller_class = $CI->router->fetch_class();


        return ($controller_class == $controller) ? config_item('active_class') . ' ' . $class : '';
    }

}

if (!function_exists('get_subnav')) {

    /**
     * Set a active class fore curen controller
     * @param String $controller
     * @return void
     */
    function get_subnav($method, $text = NUll) {
        $CI = & get_instance();
        $controller_class = $CI->router->fetch_class();
        $li = '
        <li class="m-menu__item " aria-haspopup="true">
        <a href="' . base_url('admin/' . $method) . '" class="m-menu__link ">
        <i class="m-menu__link-bullet m-menu__link-bullet--dot"> <span></span> </i> <span class="m-menu__link-text text-capitalize">' . $text . ' </span>
        </a>
        </li>
        ';
        return $li;
    }

}



if (!function_exists('is_active')) {

    /**
     * Set a active in grid
     * @param String $is_active is a string array of id and activer
     * @return void
     */
    function is_active($row, $method = "is_active") {
        if ($row['is_active'] == 1) {
            return '<div class="text-center">
            <span class="m-switch m-switch--icon  text-center m-switch--success m-switch--sm">
            <label>
            <input type="checkbox" class="gridTable-is-active" data-method="' . $method . '" data-active="1" checked="checked" value="' . $row['id'] . '" name="display_isactive_' . $row['id'] . '">
            <span></span>
            </label>
            </span>
            </div>';
        } else {
            return '<div class="text-center">
            <span class="m-switch m-switch--icon  m-switch--success m-switch--sm">
            <label>
            <input type="checkbox" class="gridTable-is-active" data-method="' . $method . '" data-active="0" name="display_isactive_' . $row['id'] . '" value="' . $row['id'] . '">
            <span></span>
            </label>
            </span>
            </div>';
        }
    }

}

if (!function_exists('get_delete_all')) {

    /**
     * Set a active in grid
     * @param String $_id is id of curent row
     * @return void
     */
    function get_delete_all($_id) {
        return '<label class="m-checkbox m-checkbox--single p-0 m-checkbox--all m-checkbox--solid m-checkbox--brand">
        <input type="checkbox" name="delete_all[]" value="' . $_id . '" data-uid="' . $_id . '"><span class="mt-2"></span>
        </label>';
    }

}

if (!function_exists('get_edit')) {

    /**
     * Set a active in grid
     * @param String $_id is id of curent row
     * @return void
     */
    function get_edit($_id, $url) {

        return "<div class='text-center'>
        <a class='btn btn-success btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill' href='" . base_url($url) . "/" . $_id . "'><i class='fa fa-3x fa-pencil'></i>
        </a>
        </div>";
    }

}

if (!function_exists('get_delete')) {

    /**
     * Set a active in grid
     * @param String $_id is id of curent row
     * @return void
     */
    function get_delete($_id) {
        return '<div class="text-center">
        <a class="btn btn-danger gridTable-delete btn-sm  m-btn m-btn--icon  m-btn--icon-only m-btn--custom m-btn--pill"
        data-uid="' . $_id . '" href="javascript:void(0)" data-method="delete" ><i class="fa fa-3x fa-trash"></i>
        </a>
        </div>';
    }

}

if (!function_exists('get_image_path')) {

    /**
     * Set a active in grid
     * @param String $_id is id of curent row
     * @return void
     */
    function get_image_path($image_path, $width = 75) {

        return "<center><div class='w-" . $width . " mx-auto'><img class='w-100'  src='" . base_url() . htmlentities($image_path) . "'></div></center>";
    }

    function get_video_path($image_path, $width = 75) {

        return "<center><div class='w-" . $width . " mx-auto'><video class='w-100'  src='" . base_url() . htmlentities($image_path) . "'></video></div></center>";
    }


}

if (!function_exists('get_display_order')) {

    /**
     * Set a active disply order
     * @param String $_id is id of curent row
     * @return void
     */
    function get_display_order($display_order) {
        return "<div class='m-form__control form-inline w-75 m-auto'>
        <input type='text' class='form-control w-50 text-center' maxlength='2' value='" . $display_order['display_order'] . "'
        name='display_order_id[]' id='display_order_" . $display_order['id'] . "' onKeyPress='return numericOnly(this);' />
        <input type='hidden' value='" . $display_order['id'] . "' name='hid_table_id[]' id='hid_table_id_" . $display_order['id'] . "' />
        </div>";
    }

}


if (!function_exists('get_display_order_home')) {

    /**
     * Set a active disply order
     * @param String $_id is id of curent row
     * @return void
     */
    function get_display_order_home($display_order_data) {
        return "<div class='m-form__control form-inline w-75 m-auto'>
        <input type='text' class='form-control w-50 text-center' maxlength='2' value='" . $display_order_data['display_order_home'] . "'
        name='display_order_home[]' id='display_order_home_" . $display_order_data['id'] . "' onKeyPress='return numericOnly(this);' />
        </div>";
    }

}

if (!function_exists('get_format_date')) {

    /**
     * Set a date formate
     * @param array $_data is array of curent row or data
     * @return void
     */
    function get_format_date($date) {
        if ($date['date_format'] == "0000-00-00") {
            return '<div class="text-center"></div>';
        } else {
            return '<div class="text-center">' . date("d M Y", strtotime($date['date_format'])) . '</div>';
        }
    }

}

if (!function_exists('get_view')) {
    /* set view link */

    function get_view($id, $url) {
        return "<div class='text-center'><a class='btn btn-primary btn-sm m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill' href='" . base_url($url) . "/" . $id . "'><i class='fa fa-3x fa-eye'></i></a></div>";
    }

}
if (!function_exists('get_total_image_count')) {
    /* set total image count row wise */

    function get_total_image_count($image_count) {
        return "<div class='text-center'><a style='position: relative;' href='" . base_url() . $image_count["url_path"] . $image_count["id"] . "'><img class='fa fa-fw' src='" . base_url() . "assets/admin/images/camera38.png' style='width: 35px;'/> <span class='badge'>" . $image_count["image_count"] . "</span></a></div>";
    }

}

if (!function_exists('get_total_comment_count')) {
    /* set total image count row wise */

    function get_total_comment_count($data) {
        return "<div class='text-center'><a style='position: relative;' href='" . base_url() . $data["url_path"] . $data["id"] . "'><img class='fa fa-fw' src='" . base_url() . "assets/admin/images/blog.png' style='width: 35px;'/> <span class='badge'>" . $data["image_count"] . "</span></a></div>";
    }

}

if (!function_exists('get_total_category_count')) {
    /* set total image count row wise */

    function get_total_category_count($category_count) {
        return "<div class='text-center'><a style='position: relative;' href='" . base_url() . $category_count["url_path"] .$category_count["class_id"].'/'.$category_count["id"] . "'><img class='fa fa-fw' src='" . base_url() . "assets/admin/images/time-image.png' style='width: 35px;'/> <span class='badge'>" . $category_count["category_count"] . "</span></a></div>";
    }

}
if (!function_exists('get_category_details')) {
    /* set total image count row wise */

    function get_category_details($categoryId) {
      $CI = & get_instance();
      $categoryDetails = $CI->db->where('id',$categoryId)->get('main_category_new')->row();
      return $categoryDetails;
  }

}
if (!function_exists('get_total_gift_count')) {
    /* set total image count row wise */

    function get_total_gift_count($image_count) {
        return "<div class='text-center'><a style='position: relative;' href='" . base_url() . $image_count["url_path"] . $image_count["id"] . "'><img  class='fa fa-fw' src='" . base_url() . "assets/admin/images/gift.png' /> <span class='badge'>" . $image_count["image_count"] . "</span></a></div>";
    }

}
if (!function_exists('get_media_promo')) {

    function get_media_promo($news_media_path, $width) {

        $media = explode('#', $news_media_path);

        if ($media[3] == 1) {
            return "<center><div class='w-" . $width . " mx-auto'><img class='w-100'  src='" . base_url() . $media[0] . "'></div></center>";
        } else if ($media[3] == 3) {
            return "<div class='text-center admin-embedcode'>" . $media[1] . "</div>";
        } else if ($media[3] == 2) {
            return "<div class='text-center'><video controls='controls' preload='none' name='media' class='admin-grid-img'><source src='" . base_url() . $media[2] . "'  type='video/mp4'></video></div>";
        }
    }

}
if (!function_exists('get_media')) {

    function get_media($news_media_path, $width) {

        $media = explode('#', $news_media_path);

        if ($media[3] == 1) {
            return "<center><div class='w-" . $width . " mx-auto'><img class='w-100'  src='" . base_url() . $media[0] . "'></div></center>";
        } else if ($media[3] == 3) {
          return "<div class='text-center'><video controls='controls' preload='none' name='media' class='admin-grid-img'><source src='" . base_url() . $media[2] . "'  type='video/mp4'></video></div>";
      } else if ($media[3] == 2) {
        return "<div class='text-center admin-embedcode'>" . $media[1] . "</div>";
    }
}

}
if (!function_exists('get_is_status')) {

    function get_is_status($is_status) {
        if ($is_status == 1) {
            return "<div class='text-center'>Sent</div>";
        } else {
            return "<div class='text-center'>Draft</div>";
        }
    }

}
/*
 * This function create watermark image.
 */
if (!function_exists('create_watermark_image')) {

//        Ex call  :: create_watermark_image($this->images->getdata('banner_image'),$this->data['setting']->website_frontend_logo, $padding = 0, $width = 0, $hight = 0);

    function create_watermark_image($main_image_path, $watermark_image, $padding = 0, $width = 0, $hight = 0) {
        if ($main_image_path != '' && $watermark_image != '') {
            $CI = & get_instance();
            $configWatermark = array();
            $CI->load->library('image_lib');
            $configWatermark['image_library'] = 'gd2';
            $configWatermark['source_image'] = $main_image_path;
            $configWatermark['wm_type'] = 'overlay';
            $configWatermark['wm_overlay_path'] = $watermark_image;
            $configWatermark['wm_vrt_alignment'] = 'bottom';
            $configWatermark['wm_hor_alignment'] = 'right';
            $configWatermark['wm_padding'] = $padding;
            $CI->image_lib->initialize($configWatermark);
            if (!$CI->image_lib->watermark()) {
                echo $CI->image_lib->display_errors();
            }
            $CI->image_lib->clear();
        }
    }

}


/*
 * This function create thumb image.
 */
if (!function_exists('create_thumb_image')) {

//        Ex call  :: create_thumb_image($this->images->getdata('banner_image'), $thumb_dir, $width = 200, $height = 200);

    function create_thumb_image($main_image_path, $thumb_dir, $width = 100, $height = 100) {
        if ($main_image_path != '' && $thumb_dir != '') {

            if (!is_dir($thumb_dir)) {
                mkdir($thumb_dir, 0755);
            }

            $CI = & get_instance();
            $CI->load->library('image_lib');
            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = $main_image_path;
            $configThumb['new_image'] = $thumb_dir;
            $configThumb['maintain_ratio'] = FALSE;
            $configThumb['width'] = $width;
            $configThumb['height'] = $height;
            $CI->image_lib->initialize($configThumb);
            if (!$CI->image_lib->resize()) {
                echo $CI->image_lib->display_errors();
            }
            $CI->image_lib->clear();
            return str_replace("./", "", $thumb_dir . $main_image_path);
        }
    }

}

/*
 * This function get user ipaddress.
 */
if (!function_exists('getUserIpAddr')) {

    function getUserIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }

}

/*
 * This function get days,months And years.
 */
if (!function_exists('get_day_ago')) {

    function get_day_ago($date) {



        $CI = & get_instance();

        $datetime1 = new DateTime($date);
        $datetime2 = new DateTime("now");
        $interval = $datetime1->diff($datetime2);
        if ($interval->format('%R%a') == 0) {
            echo 'Today';
        } else if ($interval->format('%R%a') == 1) {
            echo 'A day ago';
        } else if ($interval->format('%R%a') == -1) {
            echo 'After ' . $interval->format('%a') . ' day';
        } else if ($interval->format('%R%a') < 30) {
            echo $interval->format('%a') . ' days ago';
        } else if ($interval->format('%R%y') == 1) {
            echo $interval->format('%y') . ' year ago';
        } else if ($interval->format('%R%y') > 1) {
            echo $interval->format('%y') . ' years ago';
        } else if ($interval->format('%R%y%m') == 1) {
            echo $interval->format('%m') . ' month ago';
        } else if ($interval->format('%R%y%m') > 1) {
            echo $interval->format('%m') . ' months ago';
        } else {
            echo 'After ' . $interval->format('%a') . ' days';
        }
        //return $date;
    }

}
/*
 * This function get admin image.
 */

function file_exists_admin($filename) {
    $filename_url = base_url();
    if (file_exists($filename) && $filename != '') {
        $admin_image = $filename;
    } else {
        $admin_image = ADMIN_IMAGE;
    }
    return $filename_url . $admin_image;
}

if (!function_exists('get_related_products')) {

    function get_related_products($cheked_ids) {

        $ids = $cheked_ids;
        $CI = & get_instance();
        $CI->db->where_in('id', $ids);
        $CI->db->order_by("display_order", "asc");
        $result = $CI->db->get('product');
        return $result->result_array();
    }

}

if (!function_exists('get_package_features')) {

    function get_package_features($cheked_ids) {

        $ids = $cheked_ids;
        $CI = & get_instance();
        $CI->db->where_in('id', $ids);
        $CI->db->order_by("display_order", "asc");
        $result = $CI->db->get('package_features');
        return $result->result_array();
    }

}
if (!function_exists('get_all_blog_media_front')) {

    function get_all_blog_media_front($id) {
        $CI = & get_instance();
        $CI->db->where('blog_id', $id);
        $result = $CI->db->get('blog_media');
        return ($result->num_rows() > 0) ? $result->result_array() : '';
    }

}

if (!function_exists('get_all_news_media_front')) {

    function get_all_news_media_front($id) {
        $CI = & get_instance();
        $CI->db->where('blog_id', $id);
        $result = $CI->db->get('news_media');
        return ($result->num_rows() > 0) ? $result->result_array() : '';
    }

}

if (!function_exists('google_analytics')) {

    function google_analytics() {
        $CI = & get_instance();
        $CI->db->where('id', 1);
        $result = $CI->db->get('google_analytics');
        return $result->row();
    }

}

if (!function_exists('count_cart')) {

    function count_cart() {

        $CI = & get_instance();

        $tempCartID = $CI->input->cookie('mmtcTempCartID',true);

        if(!$tempCartID) {
          $cookie = array('name' => 'mmtcTempCartID', 'value' => uniqid(), 'expire' => '360000');
          $CI->input->set_cookie($cookie);
        }

        $userSess = $CI->session->userdata('user_sess');

          if (!empty($userSess)) {

            $userId = $userSess['userId'];

            $CI->db->where('user_id', $userId);

        } else {
            $tempCartID = $CI->input->cookie('mmtcTempCartID',true);
            $CI->db->where('temp_cart_id', $tempCartID);
        }


        $result = $CI->db->get('cart');

        if ($result->num_rows()) {

            return $result->num_rows();

        } else {
            return 0;
        }
    }
}

if (!function_exists('count_wishlist')) {

    function count_wishlist() {

        $CI = & get_instance();

        $userSess = $CI->session->userdata('user_sess');

        if (!empty($userSess)) {

            $userId = $userSess['userId'];

            $CI->db->where('user_id', $userId);

            $result = $CI->db->get('wishlist');

            if ($result->num_rows()) {

                return $result->num_rows();

            } else {
                return 0;
            }

        } else {
            return 0;
        }
    }
}

if (!function_exists('set_cart_cookie')) {

    $CI = & get_instance();

    $tempCartID = $CI->input->cookie('mmtcTempCartID',true);

    function set_cart_cookie() {

        global $tempCartID;

        $CI = & get_instance();

        if(!$tempCartID) {
            $cookie = array('name' => 'mmtcTempCartID', 'value' => uniqid(), 'expire' => '360000');
            $CI->input->set_cookie($cookie);
        }

    }

    if (empty($tempCartID)) {
        set_cart_cookie();
    }
}

if (!function_exists('mmtcTempCartID')) {

    function mmtcTempCartID() {

        $CI = & get_instance();

        $tempCartID = $CI->input->cookie('mmtcTempCartID',true);

        if (empty($tempCartID)) {
            set_cart_cookie();
        }

        return $tempCartID;

    }
}


if (!function_exists('get_cart_stock')) {

    function get_cart_stock($pId) {

        $CI = & get_instance();
        $tempCartId = $CI->input->cookie('mmtcTempCartID',true);

        $userSess = $CI->session->userdata('user_sess');

        if (!empty($userSess)) {

            $userId = $userSess['userId'];

            $qty = $CI->db->get_where('cart', array(
                'user_id' => $userId,
                'product_id' => $pId
            ))->row('quantity');

        } else {
            $qty = $CI->db->get_where('cart', array(
                'temp_cart_id' => $tempCartId,
                'product_id' => $pId
            ))->row('quantity');
        }

        if (!empty($qty)) {
            return $qty;
        } else {
            return 0;
        }

    }
}

if (!function_exists('get_cart_id')) {

    function get_cart_id($pId) {

        $CI = & get_instance();
        $tempCartId = $CI->input->cookie('drcycle2_cookie',true);

        $userSess = $CI->session->userdata('user_sess');

        if (!empty($userSess)) {

            $userId = $userSess['userId'];

            $id = $CI->db->get_where('cart', array(
                'user_id' => $userId,
                'product_id' => $pId
            ))->row('id');

        } else {
            $id = $CI->db->get_where('cart', array(
                'temp_cart_id' => $tempCartId,
                'product_id' => $pId
            ))->row('id');
        }

        return $id;

    }
}

if (!function_exists('user_info')) {

    function user_info($id) {

        $CI = & get_instance();

        $data = $CI->db->get_where('user', array(
            'id' => $id
        ))->row();

        if (!empty($data)) {
            return $data;
        } else {
            return false;
        }

    }
}

if (!function_exists('cart_summary')) {

    function cart_summary() {

        $CI = & get_instance();

        $userSess = $CI->session->userdata('user_sess');

        $coupon = $CI->session->userdata('mmtc_promo');

        if (!empty($userSess)) {
            $userId = $userSess['userId'];

            $products = $CI->db
                    ->select('a.*, b.product_name, b.slug, b.sku_code, b.net_weight, b.stock, b.mrp, b.selling_price, b.image_path')
                    ->join('product as b', 'a.product_id = b.id')
                    ->get_where('cart as a', array('a.user_id' => $userId, 'b.is_active' => 1))->result_object();
        }

        $subtotal = 0;
        $deliveryCharge = 0;
        $disRec = 0;
        $promoCode = null;
        $promoId = null;
        
        if (!empty($coupon)) {
          $disRec = $coupon['discount'];
          $promoCode = $coupon['promo_code'];
          $promoId = $coupon['promo_id'];
        }

        $saved = 0;

        if (!empty($products)) {

            foreach ($products as $data) {
                
                $mrp = $data->mrp;
                $sp = $data->selling_price;

                $availStock = $data->stock;
                $cartQty = $data->quantity;

                if (!$availStock) {
                    $mrp = 0;
                    $sp = 0;
                }

                $price = 0;
                $discPrice = 0;

                if ($sp > 0) {
                    if ($sp < $mrp) {
                        $discPrice = $sp;
                        $price = $mrp;
                    } else {
                        $price = $mrp;
                    }
                } else {
                    $price = $mrp;
                }

                if ($discPrice) {
                    $subtotal += $discPrice*$cartQty;
                    $saved += $price*$cartQty;
                } else {
                    $subtotal += $price*$cartQty;
                }
                
            }

            return array(
                'sub_total' => $subtotal,
                'delivery_charge' => $deliveryCharge,
                'discount' => $disRec,
                'promo_code' => $promoCode,
                'promo_id' => $promoId,
            );
            
        } else {
            return array(
                'sub_total' => $subtotal,
                'delivery_charge' => $deliveryCharge,
                'discount' => $disRec,
                'promo_code' => $promoCode,
                'promo_id' => $promoId,
            );
        }

    }
}

if (!function_exists('cart_paid_amount')) {

    function cart_paid_amount() {

        $CI = & get_instance();

        $userSess = $CI->session->userdata('user_sess');

        $coupon = $CI->session->userdata('mmtc_promo');

        if (!empty($userSess)) {
            $userId = $userSess['userId'];

            $products = $CI->db
                    ->select('a.*, b.product_name, b.slug, b.sku_code, b.net_weight, b.stock, b.mrp, b.selling_price, b.image_path')
                    ->join('product as b', 'a.product_id = b.id')
                    ->get_where('cart as a', array('a.user_id' => $userId, 'b.is_active' => 1))->result_object();
        }

        $subtotal = 0;
        $deliveryCharge = 0;
        $disRec = 0;
        $promoCode = null;
        $promoId = null;
        
        if (!empty($coupon)) {
          $disRec = $coupon['discount'];
          $promoCode = $coupon['promo_code'];
          $promoId = $coupon['promo_id'];
        }

        $saved = 0;

        if (!empty($products)) {

            foreach ($products as $data) {
                
                $mrp = $data->mrp;
                $sp = $data->selling_price;

                $availStock = $data->stock;
                $cartQty = $data->quantity;

                if (!$availStock) {
                    $mrp = 0;
                    $sp = 0;
                }

                $price = 0;
                $discPrice = 0;

                if ($sp > 0) {
                    if ($sp < $mrp) {
                        $discPrice = $sp;
                        $price = $mrp;
                    } else {
                        $price = $mrp;
                    }
                } else {
                    $price = $mrp;
                }

                if ($discPrice) {
                    $subtotal += $discPrice*$cartQty;
                    $saved += $price*$cartQty;
                } else {
                    $subtotal += $price*$cartQty;
                }
                
            }

            return ($subtotal+$deliveryCharge)-$disRec;
            
        } else {
            
            return ($subtotal+$deliveryCharge)-$disRec;
        }

    }
}

if (!function_exists('update_cart_user_id')) {

    function update_cart_user_id($userId) {

        $CI = & get_instance();
        $mmtcTempCartID = $CI->input->cookie('mmtcTempCartID',true);

        $CI->db->where('temp_cart_id', $mmtcTempCartID);
        $CI->db->update('cart', array(
            'user_id' => $userId
        ));
    }

}

if (!function_exists('get_page')) {

    function get_page($pageName) {

        $CI = & get_instance();

        if (!empty($pageName)) {

            $data = $CI->db->get_where('page', array(
                'page_name' => $pageName
            ))->row();

            if (!empty($data)) {

                return $data;

            } else {
                return false;
            }

        } else {
            return false;
        }

    }
}

if (!function_exists('check_num')) {

    function check_num($int) {
        if (round($int, 0) == $int) {
            return number_format($int);
        } else {
            return $int;
        }
    }
}

if (!function_exists('count_comment')) {

    function count_comment($blogId) {

        $CI = & get_instance();

        if (!empty($blogId)) {

            $data = $CI->db->get_where('blog_comment', array(
                'blog_id' => $blogId,
                'is_active' => 1
            ))->num_rows('province');

            return $data;

        } else {
            return 0;
        }

    }
}

if (!function_exists('decrypt_id')) {

    function decrypt_id($table, $cond) {

        $CI = & get_instance();

        return $CI->db->get_where($table, $cond)->row();
    }
}

if (!function_exists('escape')) {

    function escape($data) {

        $CI = & get_instance();

        return $CI->db->escape($data);
    }
}

if (!function_exists('category_by_slug')) {

    function category_slug_by_id($id) {

        $CI = & get_instance();

        return $CI->db->get_where('category', array('id' => $id))->row('slug');
    }
}

if (!function_exists('user_id')) {
    
    function user_id() {
        $CI = & get_instance();
        $userSess = $CI->session->userdata('user_sess');
        if (!empty($userSess)) {
            return $userSess['userId'];
        } else {
            return false;
        }
    }

}

if (!function_exists('order_id')) {

    function order_id() {

        $CI = & get_instance();
        $CI->load->database();
        $orderId = $CI->db->select('MAX(id) as id')->get('series_number')->row('id');

        if (!empty($orderId)) {
            $orderId = $orderId+1;
        } else {
            $orderId = 1;
        }

        // $newId = 'BTLDTC'.date('Y') . str_pad($orderId, 4, '0', STR_PAD_LEFT);
        $newId = 'BTLDTC2022'. str_pad($orderId, 4, '0', STR_PAD_LEFT);
        return $newId;
    }
}

function invoice_number() {

    $CI = & get_instance();
    $CI->load->database();
    $orderId = $CI->db->select('MAX(id) as id')->get('series_number')->row('id');

    if (!empty($orderId)) {
        $orderId = $orderId+1;
    } else {
        $orderId = 1;
    }

    //$newId = 'MOVE/'.date('Y').'/DTC'. str_pad($orderId, 4, '0', STR_PAD_LEFT);

    //MOVE/2021/W001
    //$newId = 'MOVE/'.date('Y').'/W'. str_pad($orderId, 3, '0', STR_PAD_LEFT);
    $newId = 'MOVE/2022'.'/W'. str_pad($orderId, 3, '0', STR_PAD_LEFT);    
    return $newId;
}

if (!function_exists('cal_percent_dis')) {

    function cal_percent_dis($mrp, $sp) {

        $diff = $mrp - $sp;

        if ($diff) {
            
            $dis = ($diff*100)/$mrp;
            return number_format($dis,2);

        } else {
            return false;
        }
    }
}

function get_admin_id() {
    $CI = & get_instance();
    $CI->load->library('session');
    
    $adminId = $CI->session->userdata('user_id');

    $isExist = $CI->db->get_where('admins', array('id' => $adminId))->num_rows();

    if ($isExist) {
        return $adminId;
    } else {
        return 0;
    }
}

function getUserId() {
    $CI = & get_instance();
    $CI->load->library('session');

    $userSess = $CI->session->userdata('userSess');

    if (!empty($userSess)) {
        return $userSess['user_id'];
    } else {
        return false;
    }
}

function getUserEmail() {
    $CI = & get_instance();
    $CI->load->library('session');

    $userSess = $CI->session->userdata('userSess');

    if (!empty($userSess)) {
        return $userSess['user_email'];
    } else {
        return false;
    }
}

function getUserName() {
    $CI = & get_instance();
    $CI->load->library('session');

    $userSess = $CI->session->userdata('userSess');

    if (!empty($userSess)) {
        return $userSess['user_name'];
    } else {
        return false;
    }
}

function removeCouponIfUserLoggedOut() {
    $CI = & get_instance();
    $CI->load->library('session');

    $userSess = $CI->session->userdata('userSess');

    if (empty($userSess)) {
        $CI->session->unset_userdata('couponData');    
    }
}

removeCouponIfUserLoggedOut();

function clean_num( $num = ''){
    if (!empty($num)) {
        $pos = strpos($num, '.');
        if($pos === false) { // it is integer number
            return $num;
        }else{ // it is decimal number
            return rtrim(rtrim($num, '0'), '.');
        }
    } else {
        return 0;
    }
}

function numToWord($number) {
    $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';

    if ($points > 0) {
        return 'Indian Rupee '. ucwords($result) . "Rupees  " . $points . " Paise";
    } else {
        return 'Indian Rupee '. ucwords($result) . "Rupees  ";
    }

    
}