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

        <?php
            $orderPerm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'read');
            $productPerm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');
            $productAttribPerm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'read');
            $catLv1Perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_1', 'read');
            $catLv2Perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'read');
            $promoCodePerm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'read');
            $pincodePerm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'read');
            $cartPerm = $this->Permission_model->checkPerm(get_admin_id(), 'cart', 'read');
            $settingPerm = $this->Permission_model->checkPerm(get_admin_id(), 'setting', 'read');
            $userPerm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'read');
            $auditPerm = $this->Permission_model->checkPerm(get_admin_id(), 'audit', 'read');
            $customersPerm = $this->Permission_model->checkPerm(get_admin_id(), 'customers', 'read');
            $blogPerm = $this->Permission_model->checkPerm(get_admin_id(), 'blog', 'read');
            $bannerPerm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'read');
            $freebeePerm = $this->Permission_model->checkPerm(get_admin_id(), 'freebee', 'read');
        ?>

        <?php if($orderPerm): ?>
        <!--  Start::Orders-->
          <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('orders'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
           <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
           <span class="m-menu__item-here"></span>
           <i class="m-menu__link-icon fa fa-first-order"></i>
           <span class="m-menu__link-text"> Orders<span class="m-menu__link-badge pull-right"><span class="m-badge m-badge--danger">
            <? echo $this->db->get_where('orders')->num_rows(); ?> </span></span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
            <? echo get_subnav('orders', 'Manage Orders'); ?>
            <? echo get_subnav('orders/excel-change-order-status', 'Excel Change Orders Status'); ?>
            </ul>
            </div>
          </li>
        <!--  End::Orders -->
        <?php endif; ?>

        <?php //if(!$productPerm): ?>
        <!--  Start::Product -->
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('product'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-product-hunt"></i>
         <span class="m-menu__link-text"> Products<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->db->get('product')->num_rows(); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('product/create', 'Add Product'); ?>
          <? echo get_subnav('product/import', 'Excel Import Product'); ?>
          <? echo get_subnav('product/excel-update-product', 'Excel Update Product'); ?>
          <? echo get_subnav('product', 'Manage Products'); ?>
          </ul>
          </div>
        </li>
        <?php //endif; ?>

        <?php if($productAttribPerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('attribute'); ?> <? echo is_menu_active('attribute'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
          <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
              <i class="m-menu__link-icon fa fa-inbox"></i>
              <span class="m-menu__link-text">Product Attribute <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                  <? echo $this->common->CountByTable('attribute_name'); ?> </span> </span>
              </span>
              <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
              <span class="m-menu__arrow"></span>
              <ul class="m-menu__subnav">
                  <? echo get_subnav('attribute/create', 'Add Attribute') ?>
                  <? echo get_subnav('attribute', 'Manage Attribute'); ?>
                  <li class="m-menu__item " aria-haspopup="true"></li>
                </ul>
          </div>
        </li>
        <?php endif; ?>

        <?php if($catLv1Perm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('category'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
              <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                  <span class="m-menu__item-here"></span>
                  <i class="m-menu__link-icon fa fa-cube"></i>
                  <span class="m-menu__link-text"> Category Level 1<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                  <? echo $this->db->get_where('category', array('parent' => 0))->num_rows(); ?> </span></span>
                  </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <? echo get_subnav('category-level-1/create', 'Add Category'); ?>
                      <? echo get_subnav('category-level-1', 'Manage Category'); ?>
                  </ul>
              </div>
        </li>
        <?php endif; ?>

        <?php if($catLv2Perm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('category2'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
              <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                  <span class="m-menu__item-here"></span>
                  <i class="m-menu__link-icon fa fa-cube"></i>
                  <span class="m-menu__link-text"> Category Level 2<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                  <? echo $this->db->get_where('category', array('parent != ' => 0))->num_rows(); ?> </span> </span>
                  </span>
                  <i class="m-menu__ver-arrow la la-angle-right"></i>
              </a>
              <div class="m-menu__submenu">
                  <span class="m-menu__arrow"></span>
                  <ul class="m-menu__subnav">
                      <? echo get_subnav('category-level-2/create', 'Add Category'); ?>
                      <? echo get_subnav('category-level-2', 'Manage Category'); ?>
                  </ul>
              </div>
        </li>
        <?php endif; ?>

        <!-- <li class="m-menu__item  <? echo is_menu_active('page'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/page'); ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon la la-file-text-o"></i>
                <span class="m-menu__link-text">Pages <span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                  <? echo $this->common->CountByTable('page'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
        </li> -->

        <?php if($promoCodePerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo $this->uri->segment(2) == 'promo-code'? 'm-menu__item--open m-menu__item--expanded m-menu__item--active':''; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-unlock"></i>
                <span class="m-menu__link-text"> Promo Code<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                  <? echo $this->common->CountByTable('promo_code'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('promo-code/create', 'Add Promo Code'); ?>
                    <? echo get_subnav('promo-code', 'Manage Promo Code'); ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>

        <?php if($freebeePerm): ?>
        <!-- <li class="m-menu__item  m-menu__item--submenu <? echo $this->uri->segment(2) == 'freebee'? 'm-menu__item--open m-menu__item--expanded m-menu__item--active':''; ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-unlock"></i>
                <span class="m-menu__link-text"> Freebee<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
                  <? echo $this->common->CountByTable('freebee'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('freebee/create', 'Add Freebee'); ?>
                    <? echo get_subnav('freebee', 'Manage Freebee'); ?>
                </ul>
            </div>
        </li> -->
        <?php endif; ?>

        <?php if($pincodePerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('pincode'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-product-hunt"></i>
         <span class="m-menu__link-text"> Pincode<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->db->get('pincode')->num_rows(); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('pincode/create', 'Add Pincode'); ?>
          <? echo get_subnav('pincode/import', 'Excel Import Pincode'); ?>
          <? echo get_subnav('pincode', 'Manage Pincode'); ?>
          </ul>
          </div>
        </li>
        <?php endif; ?>

        <?php if($blogPerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('blog'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon fa fa-product-hunt"></i>
         <span class="m-menu__link-text"> Blog<span class="m-menu__link-badge pull-right"> <span class="m-badge m-badge--danger">
          <? echo $this->db->get('blogs')->num_rows(); ?> </span> </span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('blog/create', 'Add Blog'); ?>
          <? echo get_subnav('blog', 'Manage Blog'); ?>
          </ul>
          </div>
        </li>
        <?php endif; ?>

        <?php if($orderPerm): ?>
        <!--  Start::Orders-->
          <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('contact_enquiry'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
           <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
           <span class="m-menu__item-here"></span>
           <i class="m-menu__link-icon fa fa-first-order"></i>
           <span class="m-menu__link-text"> Enquiry<span class="m-menu__link-badge pull-right"></span>
            </span>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
            <? echo get_subnav('contact_enquiry', 'Manage Contact Enquiry'); ?>
            <? echo get_subnav('dealer_enquiry', 'Manage Dealer Enquiry'); ?>
            <? echo get_subnav('bike_enquiry', 'Manage Register Bike Enquiry'); ?>
            </ul>
            </div>
          </li>
        <!--  End::Orders -->
        <?php endif; ?>

        <?php if($customersPerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('customers'); ?> <? echo is_menu_active('customers'); ?>" aria-haspopup="true"
            data-menu-submenu-toggle="hover">
            <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-users"></i>
                <span class="m-menu__link-text">Customers <span class="m-menu__link-badge pull-right"></span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('customers', 'Manage Customers') ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>

        <?php if($cartPerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('abandoned_cart'); ?> <? echo is_menu_active('abandoned_cart'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:voide(0);" class="m-menu__link m-menu__toggle"><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-cart-plus"></i>
                <span class="m-menu__link-text">Abandoned Cart <span class="m-menu__link-badge pull-right"></span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('abandoned_cart', 'Manage Abandoned Cart') ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>

        <?php if($settingPerm): ?>
        <li class="m-menu__item <? echo is_menu_active('site_settings'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/site-setting'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-cogwheel"></i>
                <span class="m-menu__link-text">Site Settings </span>
            </a>
        </li>
        <?php endif; ?>

        <?php if($bannerPerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('banner'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-bandcamp"></i>
                <span class="m-menu__link-text"> Banner<span class="m-menu__link-badge pull-right">
                <span class="m-badge m-badge--danger">
                  <? echo $this->common->CountByTable('banner'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('banner/create', 'Add Banner'); ?>
                    <? echo get_subnav('banner', 'Manage Banner'); ?>
                </ul>
            </div>
        </li>

        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('testimonial'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-bandcamp"></i>
                <span class="m-menu__link-text"> Testimonial<span class="m-menu__link-badge pull-right">
                <span class="m-badge m-badge--danger">
                  <? echo $this->common->CountByTable('testimonials'); ?> </span> </span>
                </span>
                <i class="m-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="m-menu__submenu">
                <span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <? echo get_subnav('testimonial/create', 'Add Testimonial'); ?>
                    <? echo get_subnav('testimonial', 'Manage Testimonials'); ?>
                </ul>
            </div>
        </li>
        <?php endif; ?>

        <?php if($userPerm): ?>
        <li class="m-menu__item  m-menu__item--submenu <? echo is_menu_active('UserRights'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
         <a href="javascript:void(0);" class="m-menu__link m-menu__toggle">
         <span class="m-menu__item-here"></span>
         <i class="m-menu__link-icon  fa fa-user"></i>
         <span class="m-menu__link-text"> Users<span class="m-menu__link-badge pull-right"></span>
          </span>
          <i class="m-menu__ver-arrow la la-angle-right"></i>
          </a>
          <div class="m-menu__submenu">
          <span class="m-menu__arrow"></span>
          <ul class="m-menu__subnav">
          <? echo get_subnav('user-rights/create', 'Add User'); ?>
          <? echo get_subnav('user-rights', 'Manage Users'); ?>
          </ul>
          </div>
        </li>
        <?php endif; ?>

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

        <?php if($auditPerm): ?>
        <!-- Audit -->
        <li class="m-menu__item <? echo is_menu_active('audit'); ?>" aria-haspopup="true" data-menu-submenu-toggle="hover">
            <a href="<? echo base_url('admin/audit'); ?>" class="m-menu__link "><span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-search"></i>
                <span class="m-menu__link-text">Audit</span>
            </a>
        </li>
        <!-- End Audit -->
        <?php endif; ?>


    </ul>
</div>
