<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DotBike | <?php echo $pageTitle; ?></title>
    <?php if(isset($meta_title)) { ?>
        <meta name="title" content="<?php echo $meta_title; ?>">
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
    
    <!-- Modernizr JS -->
    <script src="<?php echo base_url();?>assets/front/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
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

            if ($this->session->userdata('user_id')) { 
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
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url();?>assets/front/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4  hidden-xs">
                        <div class="top-email">
                            <span><i class="fa fa-envelope-o"></i></span> E-Mail: dotbike@gmail.com
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
                            <?php  if (!$this->session->userdata('user_id')) {  ?>
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
                                            <li><a class="home" href="index.html"><i class="fa fa-home"></i></a>
                                                <ul class="dropdown_menu">
                                                    <li><a href="index.html">Home version 1</a></li>
                                                    <li><a href="index-2.html">Home Version 2</a></li>
                                                    <li><a href="index-3.html">Home Version 3</a></li>
                                                    <li><a href="index-4.html">Home Version 4</a></li>
                                                    <li><a href="index-box.html">Home Version 5</a></li>
                                                    <li><a href="index-2-box.html">Home Version 6</a></li>
                                                </ul>
                                            </li>
                                            <li class="mega_parent"><a href="shop.html">Bikes & Frames</a>
                                                <ul class="mega-menu">
                                                    <li><a class="title" href="#">ACCESSORIES</a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="#">Bikes & Frames</a></li>
                                                            <li><a href="#"> Bikes Parts</a></li>
                                                            <li><a href="#"> Tires & Tubes</a></li>
                                                            <li><a href="#"> Shoes & Pedals</a></li>
                                                            <li><a href="#"> Clothing</a></li>
                                                            <li><a href="#"> Accessories</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="title" href="shop.html">Clothing</a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="#">Bikes & Frames</a></li>
                                                            <li><a href="#"> Bikes Parts</a></li>
                                                            <li><a href="#"> Tires & Tubes</a></li>
                                                            <li><a href="#"> Shoes & Pedals</a></li>
                                                            <li><a href="#"> Clothing</a></li>
                                                            <li><a href="#"> Accessories</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="title" href="shop.html">BiCycle</a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="#">Bikes & Frames</a></li>
                                                            <li><a href="#"> Bikes Parts</a></li>
                                                            <li><a href="#"> Tires & Tubes</a></li>
                                                            <li><a href="#"> Shoes & Pedals</a></li>
                                                            <li><a href="#"> Clothing</a></li>
                                                            <li><a href="#"> Accessories</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="mega-img">
                                                        <div class="mega-img-inner">
                                                            <img src="<?php echo base_url();?>assets/front/img/menu/1.png" alt="">
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="shop.html">bikes Parts  </a></li>
                                            <li><a href="shop.html">Tires & Tubes  </a></li>
                                            <li class="mega_parent mega-item2"><a href="#">Pages</a>
                                                <ul class="mega-menu">
                                                    <li><a class="title" href="#">Feature pages</a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="index.html">Home version 1</a></li>
                                                            <li><a href="index-2.html">Home version 2</a></li>
                                                            <li><a href="index-3.html">Home Fixed text</a></li>
                                                            <li><a href="index-4.html">Home Video version</a></li>
                                                            <li><a href="index-box.html">Home version box</a></li>
                                                            <li><a href="index-box.html">Home two box</a></li>
                                                            <li><a href="shop.html">Shop pages</a></li>
                                                       </ul>
                                                    </li>
                                                    <li><a class="title" href="#">Shop page</a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="shop-list.html">shop list</a></li>
                                                            <li><a href="shop.html"> Shop grid</a></li>
                                                            <li><a href="shop-right-sidebar.html"> shop right sidebar</a></li>
                                                            <li><a href="single-product.html">Product page</a></li>
                                                            <li><a href="single-product.html">Product sidebar</a></li>
                                                            <li><a href="single-product-2.html">Product right sidebar</a></li>
                                                            <li><a href="cart-page.html">Cart pages</a></li>
                                                         </ul>
                                                    </li>
                                                    <li><a class="title" href="#">Other pages </a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="checkout.html"> checkout pages</a></li>
                                                            <li><a href="404.html"> 404</a></li>
                                                            <li><a href="contact.html"> Contact page</a></li>
                                                            <li><a href="my-account.html">MY account pages</a></li>
                                                            <li><a href="elements-accordion.html">Accordion</a></li>
                                                            <li><a href="elements-alerts.html">Alerts</a></li>
                                                            <li><a href="elements-audio.html">Audio</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="title" href="#">Shortcode</a>
                                                        <ul class="mega_submenu">
                                                            <li><a href="elements-video.html"> Video</a></li>
                                                            <li><a href="elements-progressbar.html"> Progressbar</a></li>
                                                            <li><a href="elements-tab.html"> Tab</a></li>
                                                            <li><a href="elements-table.html"> Table</a></li>
                                                            <li><a href="elements-typhography.html"> Typhography</a></li>
                                                            <li><a href="elements-no-sticky.html"> No sticky</a></li>
                                                            <li><a href="elements-product.html">Product</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="<?php echo base_url();?>category"> Category </a></li>
                                            <li><a href="<?php echo base_url();?>products">Products</a></li>
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
                                    <li><a class="home" href="index.html"><i class="fa fa-home"></i></a>
                                        <ul class="dropdown_menu">
                                            <li><a href="index.html">Home version 1</a></li>
                                            <li><a href="index-2.html">Home Version 2</a></li>
                                            <li><a href="index-3.html">Home Version 3</a></li>
                                            <li><a href="index-4.html">Home Version 4</a></li>
                                            <li><a href="index-box.html">Home Version 5</a></li>
                                            <li><a href="index-2-box.html">Home Version 6</a></li>
                                        </ul>
                                    </li>
                                    <li ><a href="#">Bikes & Frames</a>
                                        <ul class="mega-menu">
                                            <li><a class="title" href="#">ACCESSORIES</a>
                                                <ul class="mega_submenu">
                                                    <li><a href="#">Bikes & Frames</a></li>
                                                    <li><a href="#"> Bikes Parts</a></li>
                                                    <li><a href="#"> Tires & Tubes</a></li>
                                                    <li><a href="#"> Shoes & Pedals</a></li>
                                                    <li><a href="#"> Clothing</a></li>
                                                    <li><a href="#"> Accessories</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="title" href="#">Clothing</a>
                                                <ul class="mega_submenu">
                                                    <li><a href="#">Bikes & Frames</a></li>
                                                    <li><a href="#"> Bikes Parts</a></li>
                                                    <li><a href="#"> Tires & Tubes</a></li>
                                                    <li><a href="#"> Shoes & Pedals</a></li>
                                                    <li><a href="#"> Clothing</a></li>
                                                    <li><a href="#"> Accessories</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="title" href="#">Bi-Cycle</a>
                                                <ul class="mega_submenu">
                                                    <li><a href="#">Bikes & Frames</a></li>
                                                    <li><a href="#"> Bikes Parts</a></li>
                                                    <li><a href="#"> Tires & Tubes</a></li>
                                                    <li><a href="#"> Shoes & Pedals</a></li>
                                                    <li><a href="#"> Clothing</a></li>
                                                    <li><a href="#"> Accessories</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="#">bikes Parts  </a></li>
                                    <li><a href="#">Tires & Tubes  </a></li>
                                    <li><a href="#">Feature</a>
                                        <ul class="mega-menu">
                                            <li><a class="title" href="#">Feature pages</a>
                                                <ul class="mega_submenu">
                                                    <li><a href="index.html">Home version 1</a></li>
                                                    <li><a href="index-2.html">Home version 2</a></li>
                                                    <li><a href="index-3.html">Home Fixed text</a></li>
                                                    <li><a href="index-4.html">Home Video version</a></li>
                                                    <li><a href="index-box.html">Home version box</a></li>
                                                    <li><a href="index-box.html">Home two box</a></li>
                                                    <li><a href="shop.html">Shop pages</a></li>
                                               </ul>
                                            </li>
                                            <li><a class="title" href="#">Shop page</a>
                                                <ul class="mega_submenu">
                                                    <li><a href="shop-list.html">shop list</a></li>
                                                    <li><a href="shop.html"> Shop grid</a></li>
                                                    <li><a href="shop-right-sidebar.html"> shop right sidebar</a></li>
                                                    <li><a href="single-product.html">Product page</a></li>
                                                    <li><a href="single-product.html">Product sidebar</a></li>
                                                    <li><a href="single-product-2.html">Product right sidebar</a></li>
                                                    <li><a href="cart-page.html">Cart pages</a></li>
                                                 </ul>
                                            </li>
                                            <li><a class="title" href="#">Other pages </a>
                                                <ul class="mega_submenu">
                                                    <li><a href="checkout.html"> checkout pages</a></li>
                                                    <li><a href="404.html"> 404</a></li>
                                                    <li><a href="contact.html"> Contact page</a></li>
                                                    <li><a href="my-account.html">MY account pages</a></li>
                                                    <li><a href="elements-accordion.html">Accordion</a></li>
                                                    <li><a href="elements-alerts.html">Alerts</a></li>
                                                    <li><a href="elements-audio.html">Audio</a></li>
                                                </ul>
                                            </li>
                                            <li><a class="title" href="#">Shortcode</a>
                                                <ul class="mega_submenu">
                                                    <li><a href="elements-video.html"> Video</a></li>
                                                    <li><a href="elements-progressbar.html"> Progressbar</a></li>
                                                    <li><a href="elements-tab.html"> Tab</a></li>
                                                    <li><a href="elements-table.html"> Table</a></li>
                                                    <li><a href="elements-typhography.html"> Typhography</a></li>
                                                    <li><a href="elements-no-sticky.html"> No sticky</a></li>
                                                    <li><a href="elements-product.html">Product</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url();?>category"> Category </a></li>
                                    <li><a href="<?php echo base_url();?>products">Products</a></li>
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