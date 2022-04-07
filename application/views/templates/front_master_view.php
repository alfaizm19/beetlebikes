<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
  <!-- Site Title-->
  <?php if (isset($mTitle) && !empty($mTitle)): ?>
    <title><?php echo $mTitle; ?></title>
  <?php else: ?>
    <title><?php echo $title; ?></title>
  <?php endif ?>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="utf-8">
  <?php if (isset($keyword) && !empty($keyword)): ?>
    <meta name="keywords" content="<?php echo $keyword ?>" />
  <?php endif ?>

  <link rel="icon" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/favicon.ico" type="image/x-icon">

  <?php if (isset($desc) && !empty($desc)): ?>
    <meta name="description" content="<?php echo $desc ?>" />
  <?php endif ?>
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic%7CRoboto:400,300,100,700,300italic,400italic,700italic%7CMontserrat:400,700">
  <link rel="stylesheet" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>css/bootstrap.css">
  <link rel="stylesheet" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>css/fonts.css">
  <link rel="stylesheet" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>css/drift-basic.min.css">

  <link rel="stylesheet" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>css/style.css">
  <link type="text/css" rel="stylesheet" href="<? echo HTTP_ASSETS_PATH_CLIENT; ?>css/mmtc.css" />

  <?php if (isset($canonical) && !empty($canonical)): ?>
    <link rel="canonical" href="<?php echo $canonical ?>">
  <?php endif ?>
  
  <script src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>js/core.min.js"></script>

  <script type="text/javascript">
    base_url = "<?php echo base_url() ?>";
  </script>
</head>
<body>
  <div class="preloader">
    <div class="preloader-body">
      <div class="cssload-container">
        <div class="cssload-speeding-wheel"></div>
      </div>
      <p>Loading...</p>
    </div>
  </div>
  <!-- Page-->
   <?php 
            $fClass = $this->router->fetch_class();
            $fmethod = $this->router->fetch_method();
          ?>
  <?php                 
      $check = array('Checkout');
      if (!in_array($fClass, $check)): 
    ?>
  <div class="page text-center">
      <?php else: ?>
    <div class="page text-center side-sticky">  
     <?php endif ?>
    <!-- Page Header-->
    <!-- RD Navbar-->
    <header class="page-header">
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-fullwidth-variant-1" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-stick-up-offset="51">
         
          <div class="rd-navbar-inner">
            <!-- RD Navbar Panel-->
            <div class="rd-navbar-panel">
              <!-- RD Navbar Toggle-->
              <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
              <!-- RD Navbar Brand-->
              <div class="rd-navbar-brand"><a class="brand-name" href="<?php echo base_url() ?>"><img alt="" src="<?php echo base_url($this->data['setting']->website_frontend_logo) ?>"></a></div>
              <div class="rd-navbar-elements-wrap text-right">

                <?php                 
                  $check = array('cart', 'Checkout');
                  if (!in_array($fClass, $check)): 
                ?>
                  <ul class="rd-navbar-socials elements-group-18 text-middle d-inline-flex">
                   <li><div class="rd-navbar-toppanel-search">
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search-wrap">
                      <div class="rd-navbar-search toggle-original-elements">
                        <form class="rd-search rd-navbar-search-form" data-search-live="rd-search-results-live" method="GET">
                          <label class="rd-navbar-search-form-input">
                            <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off" placeholder="Search...">
                          </label>
                          <!-- <button class="rd-navbar-search-form-submit" type="submit"></button> -->
                          <span id="search_close">
                            <i class="rd-navbar-search-form-submit fa fa-search"></i>
                          </span>
                          <div class="rd-navbar-search-toggle toggle-original" data-rd-navbar-toggle=".rd-navbar-search"></div>
                        </form>
                        <span class="rd-navbar-live-search-results">
                            <ul class="search_result">
                                
                            </ul>
                        </span>
                      </div>
                    </div>
                  </div></li>
                  </ul>
                <?php endif ?>
                <?php if (!in_array($fClass, $check)): ?>
                   <div class="rd-navbar-shop rd-navbar-account text-middle text-left">
                    <div class="rd-navbar-shop-toggle"><a class="text-middle icon icon-primary fa-user" href="#" data-rd-navbar-toggle=".rd-navbar-account"></a></div>
                    <?php $userSess = $this->session->userdata('user_sess'); ?>
                    <div class="rd-navbar-shop-panel <?php echo !empty($userSess)? 'mw-302':''; ?> ">
                      <?php 
                        if (empty($userSess)):
                      ?>
                      <h4>Your Account</h4>
                      <p>Access account & manage your orders.</p>
                      <a class="btn btn-default px-4 mr-2" href="<?php echo base_url('login') ?>">Login</a>
                      <a class="btn btn-primary px-3" href="<?php echo base_url('register') ?>">Sign-Up</a>
                      <?php 
                        else: 
                          $userData = user_info($userSess['userId']);
                      ?>
                        <h4>Welcome <?php echo $userData->first_name.' '.$userData->last_name ?></h4>
                        <p>Access account & manage your orders.</p>
                        <a class="btn btn-default px-4 mr-2" href="<?php echo base_url('customer/dashboard') ?>">My Profile</a>
                        <a class="btn btn-primary px-3" href="<?php echo base_url('logout') ?>">Logout</a>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif ?>
                <!-- 13052021 Start -->
                <div class="rd-navbar-shop text-middle text-left mobile-hide">
                  <?php if (!in_array($fClass, $check)): ?>
                    <div class="rd-navbar-shop-toggle">
                      <a class="text-middle icon icon-primary fa fa-heart-o" href="<?php echo base_url('customer/wishlist') ?>"></a><span id="count_wishlist" class="text-middle badge label-circle label-primary label"><?php echo count_wishlist(); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
                <!-- 13052021 End -->
                <div class="rd-navbar-shop text-middle text-left">
                  <?php if (!in_array($fClass, $check)): ?>
                    <div class="rd-navbar-shop-toggle">
                      <a class="text-middle icon icon-primary fl-line-icon-set-shopping63" href="<?php echo base_url('cart') ?>"></a><span id="count_cart" class="text-middle badge label-circle label-primary label"><?php echo count_cart(); ?></span>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <div class="rd-navbar-nav-wrap">
              <?php if (!in_array($fClass, $check)): ?>
              <ul class="rd-navbar-nav">
                <li class="active"><a href="<?php echo base_url() ?>">home</a></li>
                <li><a id="navProduct" href="<?php echo base_url('gold') ?>">Products</a>
                  
                </li>
                <li><a href="about.html">Special Occasions</a></li>
                <li><a href="about.html">About Us</a>
                </li>
                <li class="d-none rd-navbar-fixed--visible"><a href="cart.html">Cart</a></li>
              </ul>
              <?php else: ?>
                <ul class="rd-navbar-nav">
                  <div class="rd-navbar-contact-info">
                    <h3 class="text-black font-weight-bold callus">
                      Call us: <a class='text-black navbar-contact-link' href='tel:9876543210'>+91-9876543210</a> 
                    </h3>
                  </div>
                </ul>
              <?php endif ?>
            </div>
          </div>
        </nav>
      </div>

      <img id="popup" src="<?php echo base_url('assets/frontend/images/menu.png') ?>" style="position: absolute;z-index: 99;transform: translateX(-50%);display: none;">
    </header>
    

    <? echo $view_content; ?>
    
   <!-- Page Footer-->
    <footer class="page-footer section-top-60 bg-grey">
       
      <div class="container text-left">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h4>ABOUT MMTC-PAMP</h4>
		  <p>We are offering you the unique goods because our product is the real treasure. If you are a true fan, you’ll love it. We have a tremendous variety in comparison to all of our competitors. Our collection is like a sea pearl among simple stones.</p>
          </div>
          <div class="col-md-6 col-lg-3 col-6 offset-top-45 offset-sm-top-0 order-1">
           
           <ul class="list-dividers offset-top-20">
              <li><a class="decorated" href="#">FAQs</a></li>
              <li><a class="decorated" href="#">Return Policy</a></li>
              <li><a class="decorated" href="#">My Account</a></li>
            </ul>
          </div>
          <div class="offset-top-45 offset-md-top-0 col-md-6 col-lg-3 col-sm-8  col-6">
           
            <ul class="list-dividers offset-top-20">
              <li><a class="decorated" href="#">Home</a></li>
              <li><a class="decorated" href="#">Gold</a></li>
              <li><a class="decorated" href="#">Silver</a></li>
              <li><a class="decorated" href="#">Collectibles</a></li>
              <li><a class="decorated" href="#">Special Occasions</a></li>
            </ul>
          </div>
          <div class="offset-top-45 offset-md-top-0 col-md-6 col-lg-3 order-lg-2  col-6">
           
            <ul class="list-dividers offset-top-20">
              <li><a class="decorated" href="contacts.html">Contact Us</a></li>
              <li><a class="decorated" href="#">Terms of usage </a></li>
              <li><a class="decorated" href="#">Privacy Policy </a></li>
            </ul>
          </div>
        </div>
      </div>
      <hr class="divider-offset-lg divider-mercury">
      <div class="container-fluid footer-bottom">
        <div class="row">
          
          <div class="col-lg-12 text-center offset-top-20">
            <p class="mb-2"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span class="brand-name"><span class='font-weight-bold'>MMTC-PAMP</span></span><span>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <div class="snackbars" id="form-output-global"></div>
  <!-- Java script-->
  
  <script src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>js/script.js"></script>
  <script src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>js/mmtc.js"></script>
  <div class="snackbars" id="form-output-global"></div>
  <script src='<? echo HTTP_ASSETS_PATH_CLIENT; ?>js/Drift.min.js'></script>
</body>
</html>