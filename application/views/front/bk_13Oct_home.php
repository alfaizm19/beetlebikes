  <?php
    $this->load->helper('common_helper'); 
    $cart_data = cart_data();
    $wishlist_data = wishlist_data();
  ?>

    <!--slider-area start-->
        <div class="slider-container overlay">
			<!-- Slider Image -->
			<div id="mainSlider" class="nivoSlider slider-image">
				<img src="<?php echo base_url();?>assets/front/img/slider/slider-1.jpg" alt="" title="#htmlcaption1"/>
				<img src="<?php echo base_url();?>assets/front/img/slider/slider-2.jpg" alt="" title="#htmlcaption2"/>
				<img src="<?php echo base_url();?>assets/front/img/slider/slider-3.jpg" alt="" title="#htmlcaption3"/>
			</div>
			<!-- Slider Caption 1 -->
			<div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide1-text">
                                <div class="middle-text">
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1>New <br> Collection</h1>
                                    </div>
                                    <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>	
                </div>
			</div>
			<div id="htmlcaption2" class="nivo-html-caption slider-caption-1">
			   <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide1-text">
                                <div class="middle-text">
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1>New <br> Collection</h1>
                                    </div>
                                    <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>	
                </div>
			</div>
			<div id="htmlcaption3" class="nivo-html-caption slider-caption-1">
			   <div class="container ">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="slide1-text">
                                <div class="middle-text">
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1>New <br> Collection</h1>
                                    </div>
                                    <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                        <a href="shop.html">Shop Now</a>
                                    </div>
                                </div>	
                            </div>
                        </div>
                    </div>	
                </div>
			</div>
		</div>
    <!--slider-area end-->
    <!--benner-area start-->
    <div class="benner-area section-pedding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Featured Sell</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="banner-list">
                    <?php 
                        if($homeFeature) { 
                            foreach ($homeFeature as $homeFeatureKey => $homeFeatureValue) {
                    ?>
                        <div class="col-md-6">
                            <div class="sigle-banner">
                               <div class="banner-desc">
                                    <div class="price"><p>$<?php echo $homeFeatureValue['mrp'];?></p></div>
                                    <div class="benner-heding">
                                    <h3><?php echo $homeFeatureValue['product_name'];?></h3>
                                    <p>Sed ut perspiciatis unde omnis iste <br/> natus error sit voluptatem accusan.</p>
                                    </div>
                                </div>
                                <div class="banner-img">
                                    <img src="<?php echo base_url().$homeFeatureValue['image_path']; ?>" alt="">
                                    <div class="view-details">
                                        <a href="<?php echo base_url().'product/'.$homeFeatureValue['slug']; ?>">View Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php 
                            }
                        }   else {
                                echo 'Not Found';
                            } 
                    ?>
                   
                </div>
            </div>
        </div>
    </div>
    <!--benner-area end-->
    <!--new-product-area start-->
    <div class="new-product-area gray-bg section-pedding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title gray text-center">
                        <h2>New Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    if($homeProducts) { 
                        foreach ($homeProducts as $homeProductsKey => $homeProductsValue) {
                ?>
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="single-product text-center">
                            <!-- <span class="price">off <br>30%</span> -->
                            <div class="single-product-inner">
                                <div class="product-img">
                                    <a href="<?php echo base_url().'product/'.$homeProductsValue['slug']; ?>"><img src="<?php echo base_url().$homeProductsValue['image_path']; ?>" alt=""></a>
                                </div>
                                <div class="product-details">
                                    <h3>
                                        <a href="<?php echo base_url().'product/'.$homeProductsValue['slug']; ?>"><?php echo $homeProductsValue['product_name'].'-'.$homeProductsValue['sku_code']; ?></a>
                                    </h3>
                                    <div class="revew">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    </div>
                                    <div class="price-box">
                                        <?php 
                                            if($homeProductsValue['selling_price']) {
                                        ?>
                                            <div class="old-price"><span>$<?php echo $homeProductsValue['mrp'];?></span></div>
                                            <div class="new-price"><span>$<?php echo $homeProductsValue['selling_price'];?></span></div>
                                        <?php } else {    ?>
                                                <div class="new-price"><span>$<?php echo $homeProductsValue['mrp'];?></span></div>
                                        <?php } ?>    
                                    </div>
                                </div>
                                <div class="product-hover">
                                    <ul>
                                        <?php

                                            $cart_product_remove = 'display : none;'; 
                                            $cart_product_add = '';

                                            $wishlist_product_remove = 'display : none;'; 
                                            $wishlist_product_add = '';
                                            
                                            if($cart_data) {
                                                if (array_key_exists($homeProductsValue['id'],$cart_data))
                                                {
                                                  $cart_product_remove = ''; 
                                                  $cart_product_add = 'display : none;';
                                                }
                                            }

                                            if($wishlist_data) {
                                                if (array_key_exists($homeProductsValue['id'], $wishlist_data))
                                                {
                                                  $wishlist_product_remove = ''; 
                                                  $wishlist_product_add = 'display : none;';
                                                }
                                            }    
                                        ?>
                                        <li><a  style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $homeProductsValue['id']; ?>" data-productid="<?php echo $homeProductsValue['id']; ?>" >Add to cart</a></li>
                                        <?php 
                                            /*
                                            <li><a  style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $homeProductsValue['id']; ?>"  data-productid="<?php echo $homeProductsValue['id']; ?>" >Remove cart</a></li>
                                            */
                                        ?>
                                        <li><a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="remove_cart_product add_cart remove_cart_<?php echo $homeProductsValue['id']; ?>" >Go To Cart</a></li>

                                        <li><a style="<?php echo $wishlist_product_add; ?>"  title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $homeProductsValue['id']; ?>" data-productid="<?php echo $homeProductsValue['id']; ?>"><i class="fa fa-heart"  ></i></a></li>

                                         <li><a  style="<?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $homeProductsValue['id']; ?>"  data-productid="<?php echo $homeProductsValue['id']; ?>"><i class="fa fa-heart" style="color: #ea3b02; "></i></a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php 
                        }
                    }   else {
                            echo 'Not Found';
                        } 
                ?>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all-product text-center">
                        <a href="<?php echo base_url(); ?>products">See All Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--new-product-area end-->
    <!--accessories-area start-->
    <div class="accessories-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Accessories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="accessories-list">
                    <?php 
                        if($homeAccessories) { 
                            foreach ($homeAccessories as $homeAccessoriesKey => $homeAccessoriesValue) {

                                        
                                $cart_product_remove = 'display : none;'; 
                                $cart_product_add = '';
                                $wishlist_product_remove = 'display : none;'; 
                                $wishlist_product_add = '';
                                
                                if($cart_data) {
                                    if (array_key_exists($homeAccessoriesValue['id'],$cart_data))
                                    {
                                      $cart_product_remove = ''; 
                                      $cart_product_add = 'display : none;';
                                    }
                                }  
                                if($wishlist_data) {
                                    if (array_key_exists($homeAccessoriesValue['id'], $wishlist_data))
                                    {
                                      $wishlist_product_remove = ''; 
                                      $wishlist_product_add = 'display : none;';
                                    }
                                }  
                            
                    ?>
                            <div class="col-md-4">
                                <div class="single-product text-center">
                                   <!--  <span class="new">New</span>
                                    <span class="price">off <br>35%</span> -->
                                    <div class="single-product-inner">
                                        <div class="product-img">
                                            <img src="<?php echo base_url().$homeAccessoriesValue['image_path']; ?>" alt="">
                                        </div>
                                        <div class="product-details">
                                            <h3>
                                                <a href="<?php echo base_url().'product/'.$homeAccessoriesValue['slug']; ?>">

                                                    <?php echo $homeAccessoriesValue['product_name'];?>
                                                </a>
                                            </h3>
                                            <div class="revew">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                            </div>
                                            <div class="price-box">
                                                <?php 
                                                    if($homeAccessoriesValue['selling_price']) {
                                                ?>
                                                    <div class="old-price"><span>$<?php echo $homeAccessoriesValue['mrp'];?></span></div>
                                                    <div class="new-price"><span>$<?php echo $homeAccessoriesValue['selling_price'];?></span></div>
                                                <?php } else {    ?>
                                                        <div class="new-price"><span>$<?php echo $homeAccessoriesValue['mrp'];?></span></div>
                                                <?php } ?>    
                                            </div>
                                        </div>
                                        <div class="product-hover">
                                            <ul>
                                                <li>
                                                    <a style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $homeAccessoriesValue['id']; ?>" data-productid="<?php echo $homeAccessoriesValue['id']; ?>" >Add to cart</a>
                                                </li>
                                                <?php /*
                                                <li>
                                                    <a style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $homeAccessoriesValue['id']; ?>"  data-productid="<?php echo $homeAccessoriesValue['id']; ?>" >Remove cart</a>
                                                </li>
                                                */ ?>
                                                 <li>
                                                    <a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="remove_cart_product add_cart remove_cart_<?php echo $homeAccessoriesValue['id']; ?>" >Go To Cart</a></li>

                                                <li>
                                                    <a  style="<?php echo $wishlist_product_add; ?>" title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $homeAccessoriesValue['id']; ?>"  data-productid="<?php echo $homeAccessoriesValue['id']; ?>"><i class="fa fa-heart"></i></a>
                                                </li>

                                                 <li>
                                                    <a style="color: #ea3b02; <?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $homeAccessoriesValue['id']; ?>"  data-productid="<?php echo $homeAccessoriesValue['id']; ?>"><i class="fa fa-heart"></i></a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php 
                            }
                        }   else {
                                echo 'Not Found';
                            } 
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!--accessories-area end-->
    <!--brand-area start-->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-list">
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/1.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/2.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/3.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/4.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/5.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/1.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/2.png" alt=""></a>
                        </div>
                        <div class="single-brand">
                            <a href="#"><img src="<?php echo base_url();?>assets/front/img/brand/3.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--brand-area end-->