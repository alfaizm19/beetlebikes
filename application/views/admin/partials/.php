<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="false" data-menu-dropdown-timeout="500">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('dashboard'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/dashboard'); ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-home"></i>
                <span class="m-menu__link-text">Dashboard <span class="m-menu__link-badge pull-right"> <span class=""> 
                        </span> </span>
                </span>
                <i class="m-menu__ver-arrow la "></i>
            </a>
        </li>

        <!--Start::Pages -->
        <li class="m-menu__item  <? echo is_menu_active('page'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/page'); ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon la la-file-text-o"></i>
                <span class="m-menu__link-text">Pages <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger"> 
                            <? echo $this->common->CountByTable('page'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la "></i>
            </a>
        </li>
        <?
        if ($this->router->fetch_class() === 'schedule') {
            $class = "schedule";
        } else {
            $class = "category";
        }
        ?>
        <!--  End::Pages -->

      
         <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('main_category'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-list-alt"></i>
         <span class="m-menu__link-text"> Categories<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('main_category_new'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('main_category/create', 'Add Category'); ?>
          <? echo get_subnav('main_category', 'Manage Categories'); ?>
          </ul>
          </div>
          </li>       
        <!--  Start::Product Categories-->
         <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('sub_category'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-list-alt"></i>
         <span class="m-menu__link-text"> Sub Categories<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('sub_category'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('sub_category/create', 'Add Sub Category'); ?>
          <? echo get_subnav('sub_category', 'Manage Sub Categories'); ?>
          </ul>
          </div>
          </li>           
        <!--  End::Product Categories -->

        <!--  Start::Product -->
         <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('product'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-product-hunt"></i>
         <span class="m-menu__link-text"> Products<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('product'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('product/create', 'Add Product'); ?>
          <? echo get_subnav('product', 'Manage Products'); ?>
          </ul>
          </div>
          </li>           
        <!--  End::Product -->

        <!--  Start::News-->
         <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('news'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-file"></i>
         <span class="m-menu__link-text"> News<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('news'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('news/create', 'Add News'); ?>
          <? echo get_subnav('news', 'Manage News'); ?>
          </ul>
          </div>
          </li>           
        <!--  End::News -->
		 <!--  Start::Blog Categories-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('blog_category'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-cube"></i>
                <span class="m-menu__link-text"> Blog Categories<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger"> 
                            <? echo $this->common->CountByTable('blog_category'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('blog-category/create', 'Add Blog Category'); ?>
                    <? echo get_subnav('blog-category', 'Manage Blog Categories'); ?>
                </ul>
            </div>
        </li>
        <!--  End::Blog Categories-->

 
        <!--  Start::Tags-->
         <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('tag'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-tag"></i>
         <span class="m-menu__link-text">Blog Tags<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('tag'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('tag/create', 'Add Tag'); ?>
          <? echo get_subnav('tag', 'Manage Tags'); ?>
          </ul>
          </div>
          </li>       
        <!--  End::Tags -->

       
        <!-- Start::Blogs -->
        <?
        if ($this->router->fetch_class() === 'blog_media') {
            $class = "blog_media";
        } else {
            $class = "blog";
        }
        ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active($class); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-pencil-square-o"></i>
                <span class="m-menu__link-text"> Blogs <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger"> 
                            <? echo $this->common->CountByTable('blog'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('blog/create', 'Add Blog'); ?>
                    <? echo get_subnav('blog', 'Manage Blogs'); ?>
                </ul>
            </div>
        </li>
        <!-- End::Blogs -->
         <!--start::Clients-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('clients'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-user"></i>
                <span class="m-menu__link-text">Clients <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                            <? echo $this->common->CountByTable('clients'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('clients/create', 'Add Client'); ?>
                    <? echo get_subnav('clients', 'Manage Clients'); ?>
                </ul>
            </div>
        </li>
        <!--End::Clients-->
		<!--start::Reviews-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('reviews'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-user"></i>
                <span class="m-menu__link-text">Reviews<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                            <? echo $this->common->CountByTable('reviews'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('reviews/create', 'Add Review'); ?>
                    <? echo get_subnav('reviews', 'Manage Reviews'); ?>
                </ul>
            </div>
        </li>
        <!--End::Clients-->
        <!--start::Faqs-->
        <li class="m-menu__item  m-menu__item--submenu <?php echo is_menu_active('faq'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-add"></i> 
                <span class="m-menu__link-text">FAQs <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger"> 
                            <?php echo $this->common->CountByTable('faqs'); ?> </span> </span>  
                </span> 
                <i class="m-menu__ver-arrow la la-angle-right"></i>         
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <?php echo get_subnav('faq/create', 'Add FAQs'); ?>
                    <?php echo get_subnav('faq', 'Manage FAQs'); ?>
                </ul>
            </div>
        </li>
        <!--End::Faqs-->
         <!-- Start:: Banners -->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('banner'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon la la-image"></i>
                <span class="m-menu__link-text">Banners <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger"> 
                            <? echo $this->common->CountByTable('banner'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('banner/create', 'Add Banner'); ?>
                    <? echo get_subnav('banner', 'Manage Banners'); ?>
                </ul>
            </div>
        </li>
        <!--  End::Banners -->
		<!--start::Careers-->
        <li class="m-menu__item  m-menu__item--submenu <?php echo is_menu_active('career'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-user"></i>
                <span class="m-menu__link-text">Careers <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                            <?php echo $this->common->CountByTable('career'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <?php echo get_subnav('career/create', 'Add Career'); ?>
                    <?php echo get_subnav('career', 'Manage Careers'); ?>
                </ul>
            </div>
        </li>
        <!--End::Careers-->
        <!--  Start::Users-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('user'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon  fa fa-user"></i>
         <span class="m-menu__link-text"> Users<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('user'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? //echo get_subnav('user/create', 'Add user'); ?>
          <? echo get_subnav('user', 'Manage Users'); ?>
          </ul>
          </div>
          </li>
          <!--  End::Users -->

          <!--  Start::Payments-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('payments'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon  fa fa-user"></i>
         <span class="m-menu__link-text"> Payments<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('payments'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? //echo get_subnav('user/create', 'Add user'); ?>
          <? echo get_subnav('payments', 'Manage Payments'); ?>
          </ul>
          </div>
          </li>
          <!--  End::Payments -->

          <!--  Start::Orders-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('orders'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon  fa fa-user"></i>
         <span class="m-menu__link-text"> Orders<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->common->CountByTable('orders'); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? //echo get_subnav('user/create', 'Add user'); ?>
          <? echo get_subnav('orders', 'Manage Orders'); ?>
          </ul>
          </div>
          </li>
          <!--  End::Orders -->

          <!--  Start::Catalogues-->
         <li class="m-menu__item  m-menu__item--submenu <?php echo is_menu_active('catalogue'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<?php echo base_url('admin/catalogue'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-id-badge"></i> 
                <span class="m-menu__link-text">Catalogues<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger"> 
                            <?php echo $this->common->CountByTable('catalogue'); ?> </span> </span>  
                </span> 
                <i class="m-menu__ver-arrow la "></i>         
            </a>
            <!-- <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                   
                    <?php echo get_subnav('catalogue', 'Manage Catalogues '); ?>
                </ul>
            </div> -->
        </li>
        <!--  End::Catalogues -->
        <!--  Start::Enquiries-->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('enquiry'); ?> <? echo is_menu_active('distributor_enquiry'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-envelope-open-o"></i> 
                <span class="m-menu__link-text">Enquiries <span class="m-menu__link-badge pull-right"></span>  
                </span> 
                <i class="m-menu__ver-arrow la la-angle-right"></i>      
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('enquiry', 'Enquiries<span class="m-badge m-badge--danger">' . $this->common->CountByTable('enquiry') . '</span>') ?>
                    <!-- <? //echo get_subnav('distributor-enquiry', 'Distributor Enquiries <span class="m-badge m-badge--danger">' . $this->common->CountByTable('distributor_enquiry') . '</span>'); ?> -->
				</ul>
            </div>
        </li>
        <!--  End::Enquiries -->
		<li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('subscription'); ?> aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-envelope-open-o"></i> 
                <span class="m-menu__link-text">Subscriptions <span class="m-menu__link-badge pull-right"></span>  
                </span> 
                <i class="m-menu__ver-arrow la la-angle-right"></i>      
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                   <? echo get_subnav('subscription', 'Subscriptions <span class="m-badge m-badge--danger">' . $this->common->CountByTable('subscription') . '</span>'); ?>
                </ul>
            </div>
        </li>
		
        <!-- Site Settings -->
        <li class="m-menu__item <? echo is_menu_active('site_settings'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/site-setting'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-cogwheel"></i> 
                <span class="m-menu__link-text">Site Settings </span> 
            </a>
        </li>
        <!-- Google Analytics -->
        <li class="m-menu__item  <? echo is_menu_active('google_analytics'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/google-analytics'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-google"></i> 
                <span class="m-menu__link-text">Google Analytics</span> 
            </a>
        </li>
        <!-- End Google Analytics -->

        <!-- Change Password -->
        <li class="m-menu__item <? echo is_menu_active('change_password'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/change-password'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon la la-exclamation-triangle"></i> 
                <span class="m-menu__link-text">Change Password</span>  
            </a>
        </li>
        <!-- End Change  Password -->

        <!-- Change Profile -->
        <li class="m-menu__item <? echo is_menu_active('profile'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/profile'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-profile-1"></i> 
                <span class="m-menu__link-text">Profile</span>  
            </a>
        </li>
        <!-- End Change Profile -->


    </ul>
</div>

<!--https://icons8.com/line-awesome-->