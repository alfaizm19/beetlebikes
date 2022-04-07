<!DOCTYPE html>
<html lang="en">
    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title> Welcome to
              <? echo $setting->site_project_name; ?> Admin | <? echo $page_title; ?>
        </title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--begin::Web font -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js?v=<?=VERSION?>"></script>
        
        <link type="text/css" rel="stylesheet" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>css/mmtc.css" />
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Web font -->

        <!--begin::Base Styles -->
        <?
        $css = array('style.bundle.css?v='.VERSION,'dataTables.bootstrap4.min.css?v='.VERSION,'custom.css?v='.VERSION);
     
        echo get_css($css, 'admin_css');
       
        ?>
        <!--end::Base Styles -->

   <link rel="shortcut icon" type="image/x-icon" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/favicon.ico">
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js?v=<?=VERSION?>"></script>

    <script type="text/javascript">
        base_url = "<?php echo base_url() ?>";
    </script>

    </head>
    <!-- end::Head -->

    <!-- end::Body -->
    <body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">

            <!-- BEGIN: Header -->
            <? $this->load->view('admin/partials/_admin_header'); ?>
            <!-- END: Header -->

            <!-- begin::Body -->
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

                <!-- BEGIN: Left Aside -->
                <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
                    <i class="la la-close"></i>
                </button>
                <div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark ">
                    <!-- BEGIN: Aside Menu -->
                    <? $this->load->view('admin/partials/_admin_aside'); ?>
                    <!-- END: Aside Menu -->
                </div>
                <!-- END: Left Aside -->

                <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <? $this->load->view('admin/partials/_admin_subheader'); ?>
                    <!-- END: Subheader -->

                    <div class="m-content">
                        <div id="flash-message">
                            <? echo display_flash('message'); ?>
                        </div>
                        <!--Begin::Main Portlet-->
                        <div class="row">
                            <? echo $view_content; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end:: Body -->
            <footer class="m-grid__item   m-footer ">
                <div class="m-container m-container--fluid m-container--full-height m-page__container">
                    <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                        <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                            <span class="m-footer__copyright">
                                <? echo $setting->site_copy_right; ?>
                            </span>
                            <span class="floatright paddingright5"> <a href="http://www.codzio.com" rel="nofollow" target="_blank" style="color:#555!important;">Codzio</a> </span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end:: Page -->

        <!-- begin::Footer -->
        <? $this->load->view('admin/partials/modal'); ?>
        <? $this->load->view('admin/partials/_admin_footer'); ?>
        <!-- end::Footer -->
   <script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.js?v=<?=VERSION?>"></script>
    </body>
    <!-- end::Body -->
</html>