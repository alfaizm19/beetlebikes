<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <?php if(isset($meta_title)) { ?>
        <title><?php echo $meta_title; ?></title>
        <meta name="title" content="<?php echo $meta_title; ?>">
     <?php } else { ?>    
        <title>Beetle Bikes | <?php echo $pageTitle; ?></title>
    <?php } ?>
    <?php if(isset($meta_key_words)) { ?>
        <meta name="keywords" content="<?php echo $meta_key_words; ?>">
    <?php } ?>
    <?php if(isset($meta_description)) { ?>
        <meta name="description" content="<?php echo $meta_description; ?>">
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link href="<?php echo base_url();?>assets/front/img/apple-touch-icon.png" type="img/x-icon" rel="shortcut icon">
    <!-- All css files are included here. -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/asset.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/nivo-slider.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/responsive.css">
    <?php 
        if ($this->router->fetch_class() == 'profile') { 
    ?>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/profile.css">
    <?php
        }
    ?> 

    <?php 
        if ($this->router->fetch_class() == 'review' || $this->router->fetch_class() == 'product' && $this->router->fetch_method() == 'details') { 
    ?>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/review.css">
    <?php
        }
    ?> 
    
    <script src="<?php echo base_url();?>assets/front/js/vendor/jquery-1.12.0.min.js"></script>

    <!-- Modernizr JS -->
    <script src="<?php echo base_url();?>assets/front/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url();?>assets/front/css/toaster.css">
    <script src="<?php echo base_url();?>assets/front/js/toaster.js"></script>

    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '212723237686011');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=212723237686011&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M86BW9V');</script>
<!-- End Google Tag Manager -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SVPRVST58D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SVPRVST58D');
</script>
    
    
    <!-- Global site tag (gtag.js) - Google Ads: 10800788525 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-10800788525"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-10800788525');
</script>
<!-- Event snippet for Website traffic conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-10800788525/NiGnCIbmy4ADEK3om54o'});
</script>

<script type="text/javascript">
    price_data = {
        min: "<?php echo round($this->db->query('SELECT MIN(mrp) as min_mrp FROM product where DATE(available_date) <= CURRENT_DATE AND is_active = 1')->row('min_mrp')); ?>",
        max: "<?php echo round($this->db->query('SELECT MAX(mrp) as max_mrp FROM product where DATE(available_date) <= CURRENT_DATE AND is_active = 1')->row('max_mrp')); ?>"
    }
</script>
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M86BW9V"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="toasts"></div>
    <!--[if lt IE 8]>
        <p>Dotbike html5 murkup all content is here </p>
    <![endif]--> 
    
    <!--header start-->
    <div class="header">

        <?php 

            $this->load->helper('common_helper'); 
            $cart_data = cart_data();
            $wishlist_data = wishlist_data();
            if($wishlist_data){
                $wishlistCount = count($wishlist_data);
            } else {
                 $wishlistCount = 0;
            }

            if (getUserId()) { 
        ?>
         <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-4 col-xs-12">
                        
                    </div>
                    <div class="col-md-6 col-sm-8 col-xs-12">
                        <div class="top-bar-menu">
                            <ul>
                                <li><a href="<?php echo base_url().'profile'; ?>">My Account</a></li>
                                <li><a href="<?php echo base_url().'wishlist'; ?>"> Wish List <span id="wishlistCount">(<?php echo $wishlistCount; ?>)</span></a></li>
                                <li><a href="<?php echo base_url().'cart'; ?>"> Shopping Cart</a></li>
                                <li><a href="<?php echo base_url().'checkout'; ?>"> Checkout</a></li>
                                <li><a href="<?php echo base_url().'logout'; ?>"> Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="header-midle">
            <div class="container mfluid">
                <div class="row">
                    <div class="col-md-7 col-sm-4 col-xs-5">
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/front/img/logo/logo.png"  width="157px"  alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4  hidden-xs">
                        <div class="top-email">
                            <span><i class="fa fa-envelope-o"></i></span> E-Mail: support@beetlebikes.in
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4 col-xs-7">
                        <div class="header-middle-right">
                          
                            <div class="mini-cart">
                                <a href="javascript:void(0)" class="cart-icon"><i class="fa fa-shopping-bag"></i></a>
                                <?php  if($cart_data) { ?>
                                <span id="headCartCount"><?php echo count($cart_data); ?></span>
                                <?php  } else{   ?>
                                    <span id="headCartCount">0</span>
                                <?php  }  ?>   
                                
                                    <ul class="cart-area" id="head_cart">
                                        <?php  if($cart_data) { 
                                            $header_cart_html = header_cart_html($cart_data);
                                            echo $header_cart_html;
                                        /* ?>
                                            <?php 
                                                $total = [];
                                                foreach ($cart_data as $cart_data_key => $cart_data_value) {
                                            ?>
                                        <li class="single-cart">
                                            <div class="cart-img">
                                            <img src="<?php echo base_url().$cart_data_value['image_path']; ?>" alt="">
                                            </div>
                                            <div class="cart-content">
                                                <h4><a href="<?php echo base_url().'product/'.$cart_data_value['slug']; ?>"><?php echo $cart_data_value['product_name']; ?></a></h4>
                                                <?php
                                                if($cart_data_value['selling_price']){
                                                    echo ' <p>$'.$cart_data_value['selling_price'].'<i class="fa fa-times"></i>'.$cart_data_value['cart_qty'].'</p>';
                                                     $total[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                                } else {
                                                     echo ' <p>$'.$cart_data_value['mrp'].'<i class="fa fa-times"></i>'.$cart_data_value['cart_qty'].'</p>';
                                                      $total[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                                }
                                                ?>
                                               
                                            </div>
                                            <div class="cart-del">
                                                <a href="javascript:void(0)" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $cart_data_value['id']; ?>"  data-productid="<?php echo $cart_data_value['id']; ?>"><i class="fa fa-times"></i></a>
                                            </div>
                                        </li>
                                        <?php  }  ?>
                                            <li class="mini-cart-price">
                                                <div class="cart-price">
                                                    <span>Total=</span>
                                                    <?php 
                                                         $total = array_sum($total);
                                                    ?>
                                                    <span class="total-price">$<?php echo  $total; ?></span>
                                                </div>
                                                <div class="check-out-btn text-center">
                                                    <a href="<?php echo base_url().'checkout'; ?>">Check Out</a>
                                                </div>
                                            </li>

                                        <?php  */ ?>
                                        <?php } ?>
                                       
                                    
                                    
                                </ul>
                            </div>
                            <?php  if (!getUserId()) {  ?>
                                <div class="usr-login">
                                    <a href="<?php echo base_url().'login'; ?>">Login</a> 
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-header">
            <div class="header-bottom-inner">
                <div class="container mfluid">
                    <div class="row">
                        <div class="mgeamenu-full-width">
                            <div class="col-md-9 col-sm-6 col-xs-3">
                                <div class="main-menu hidden-sm hidden-xs">
                                    <nav>
                                        <ul>
                                            <li><a class="home" href="<?php echo base_url();?>"><i class="fa fa-home"></i></a>
                                                
                                            </li>
                                            <li class="mega_parent"><a href="<?php echo base_url();?>products">All Products</a>
                                                <ul class="mega-menu">
                                                    <li><a class="title" href="<?php echo base_url('category/bikes');?>">Bikes</a>
                                                       
                                                    </li>
                                                    <li><a class="title" href="<?php echo base_url('category/accessories');?>">Accessories</a></li>
                                                    
                                               
                                                </ul>
                                            </li>
                                               <li><a href="<?php echo base_url();?>blog">Blogs</a></li>
                                               <li><a href="<?php echo base_url();?>register-bike">Register Bike </a></li>
                                            <li><a href="<?php echo base_url();?>about">About us  </a></li>
                                         
                                           
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-9">
                                <div class="search-area">
                                   <div class="search-box-inner">
                                        <form action="<?php echo base_url();?>products">
                                           <input type="text" placeholder="Search" name="name" id="productSearchText" value="<?php if(isset($_GET['name'])) { echo $_GET['name'];} ?>">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu start -->
                <div class="mobile-menu-area hidden-lg hidden-md">
                    <div class="container mfluid">
                        <div class="col-md-12">
                            <nav id="dropdown">
                                <ul>
                                    <li><a href="<?php echo base_url();?>">Home</a>
                                    </li>
                                    <li ><a href="<?php echo base_url('products');?>">All Products</a>
                                        <ul class="mega-menu">
                                            <li><a class="title" href="<?php echo base_url('category/bikes');?>">Bikes</a></li>
                                            <li><a class="title" href="<?php echo base_url('category/accessories');?>">Accessories</a></li>
                                            
                                        </ul>
                                    </li>
                                     <li><a href="<?php echo base_url();?>blog">Blogs</a></li>
                                               <li><a href="<?php echo base_url();?>register-bike">Register Bike </a></li>
                                            <li><a href="<?php echo base_url();?>about">About us  </a></li>
                                    
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Mobile menu end -->
            </div>
        </div>
    </div>
    <!--header end-->