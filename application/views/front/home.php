<?php    

$this->load->helper('common_helper'); 
$cart_data = cart_data();
$wishlist_data = wishlist_data();    

$banners = $this->Master_model->getBanners();
?>

<!--slider-area start-->

<?php if (!empty($banners)): ?>
    <div class="slider-container overlay">
        <div id="mainSlider" class="nivoSlider slider-image">
            <?php $i=1; foreach ($banners as $banner): ?>
                <img src="<?php echo base_url($banner->banner_image); ?>" alt="<?php echo $banner->banner_alt ?>" title="#htmlcaption<?php echo $i; ?>"/>
            <?php $i++; endforeach ?>
        </div>
        <?php $i=1; foreach ($banners as $banner): ?>
        <div id="htmlcaption<?php echo $i; ?>" class="nivo-html-caption slider-caption-<?php echo $i; ?>">
            <div class="container ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="slide1-text">
                            <div class="middle-text">
                                <?php if (!empty($banner->heading)): ?>
                                    <div class="title-1 wow fadeInUp" data-wow-duration="1.4s" data-wow-delay="0.3s">
                                        <h1><?php echo $banner->heading; ?></h1>
                                    </div>
                                <?php endif ?>

                                <?php if (!empty($banner->button_name)): ?>
                                <div class="shop-now wow bounceInUp" data-wow-duration="1.3s" data-wow-delay=".5s">
                                    <a href="<?php echo $banner->button_link; ?>"><?php echo $banner->button_name; ?></a>
                                </div>
                                <?php endif ?>
                            </div>  
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <?php $i++; endforeach; ?>
    </div>
<?php endif; ?>

    <!-- <div class="slider-container overlay">
		<div id="mainSlider" class="nivoSlider slider-image">
			<img src="<?php echo base_url();?>assets/front/img/slider/slider-1.jpg" alt="" title="#htmlcaption1"/>
			<img src="<?php echo base_url();?>assets/front/img/slider/slider-2.jpg" alt="" title="#htmlcaption2"/>
			<img src="<?php echo base_url();?>assets/front/img/slider/slider-3.jpg" alt="" title="#htmlcaption3"/>
		</div>
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
                                    <a href="<?php echo base_url().'products/'; ?>">Shop Now</a>
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
                                    <a href="<?php echo base_url().'products/'; ?>">Shop Now</a>
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
                                    <a href="<?php echo base_url().'products/'; ?>">Shop Now</a>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>	
            </div>
		</div>
	</div> -->

<!--slider-area end-->

   <!--Featured Products start-->
<div class="accessories-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="accessories-list">
                <?php 
                    if($homeFeature) { 
                        foreach ($homeFeature as $homeFeatureKey => $homeFeatureValue) {

                                    
                            $cart_product_remove = 'display : none;'; 
                            $cart_product_add = '';
                            $wishlist_product_remove = 'display : none;'; 
                            $wishlist_product_add = '';
                            
                            if($cart_data) {
                                if (array_key_exists($homeFeatureValue['id'],$cart_data))
                                {
                                  $cart_product_remove = ''; 
                                  $cart_product_add = 'display : none;';
                                }
                            }  
                            if($wishlist_data) {
                                if (array_key_exists($homeFeatureValue['id'], $wishlist_data))
                                {
                                  $wishlist_product_remove = ''; 
                                  $wishlist_product_add = 'display : none;';
                                }
                            }  

                            $label = $this->Master_model->getLabel($homeFeatureValue['id']);
                        
                ?>
                        <div class="col-md-4">
                            <div class="single-product text-center">
                               <!--  <span class="new">New</span>
                                <span class="price">off <br>35%</span> -->
                                <div class="single-product-inner">

                                    <?php if (!empty($label)): ?>
                                        <span class="product-new-label"><?php echo $label; ?></span>
                                    <?php endif ?>

                                    <div class="product-img">
                                     <a href="<?php echo base_url().'product/'.$homeFeatureValue['slug']; ?>">   <img src="<?php echo base_url().$homeFeatureValue['image_path']; ?>" alt=""></a>
                                    </div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="<?php echo base_url().'product/'.$homeFeatureValue['slug']; ?>">

                                                <?php echo $homeFeatureValue['product_name'];?>
                                            </a>
                                        </h3>
                                        <!-- <div class="revew">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </div> -->
                                        <div class="price-box">
                                            <?php 
                                                if($homeFeatureValue['selling_price']) {
                                            ?>
                                                <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $homeFeatureValue['mrp'];?></span></div>
                                                <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeFeatureValue['selling_price'];?></span></div>
                                            <?php } else {    ?>
                                                    <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeFeatureValue['mrp'];?></span></div>
                                            <?php } ?>    
                                        </div>
                                    </div>
                                    <div class="product-hover">
                                        <ul>
                                            <?php
                                                $getStock = $this->Master_model->getStock($homeFeatureValue['id']);
                                                if ($getStock):
                                            ?>
                                            <li>
                                                <a style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $homeFeatureValue['id']; ?>" data-productid="<?php echo $homeFeatureValue['id']; ?>" >Add to cart</a>
                                            </li>
                                            <?php endif; ?>

                                            <?php /*
                                            <li>
                                                <a style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $homeFeatureValue['id']; ?>"  data-productid="<?php echo $homeFeatureValue['id']; ?>" >Remove cart</a>
                                            </li>
                                            */ ?>
                                             <li>
                                                <a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart remove_cart_<?php echo $homeFeatureValue['id']; ?>" >Go To Cart</a></li>

                                            <li>
                                                <a  style="<?php echo $wishlist_product_add; ?>" title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $homeFeatureValue['id']; ?>"  data-productid="<?php echo $homeFeatureValue['id']; ?>"><i class="fa fa-heart"></i></a>
                                            </li>

                                             <li>
                                                <a style="color: #ea3b02; <?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $homeFeatureValue['id']; ?>"  data-productid="<?php echo $homeFeatureValue['id']; ?>"><i class="fa fa-heart"></i></a>
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
<!--Featured Products end-->
<!--Bikes start-->
<div class="new-product-area gray-bg section-pedding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title gray text-center">
                    <h2>Bikes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php 
                if($homeProducts) { 
                    foreach ($homeProducts as $homeProductsKey => $homeProductsValue) {

                        $label = $this->Master_model->getLabel($homeProductsValue['id']);
            ?>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="single-product text-center">
                        <!-- <span class="price">off <br>30%</span> -->
                        <div class="single-product-inner">

                            <?php if (!empty($label)): ?>
                                <span class="product-new-label"><?php echo $label; ?></span>
                            <?php endif ?>

                            <div class="product-img">
                                <a href="<?php echo base_url().'product/'.$homeProductsValue['slug']; ?>"><img src="<?php echo base_url().$homeProductsValue['image_path']; ?>" alt=""></a>
                            </div>
                            <div class="product-details">
                                <h3>
                                    <a href="<?php echo base_url().'product/'.$homeProductsValue['slug']; ?>"><?php echo $homeProductsValue['product_name']; ?></a>
                                </h3>
                              <!--   <div class="revew">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                </div> -->
                                <div class="price-box">
                                    <?php 
                                        if($homeProductsValue['selling_price']) {
                                    ?>
                                        <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $homeProductsValue['mrp'];?></span></div>
                                        <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeProductsValue['selling_price'];?></span></div>
                                    <?php } else {    ?>
                                            <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeProductsValue['mrp'];?></span></div>
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

                                    <?php
                                        $getStock = $this->Master_model->getStock($homeProductsValue['id']);
                                        if ($getStock):
                                    ?>
                                    <li><a  style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $homeProductsValue['id']; ?>" data-productid="<?php echo $homeProductsValue['id']; ?>" >Add to cart</a></li>

                                    <?php endif; ?>

                                    <?php 
                                        /*
                                        <li><a  style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $homeProductsValue['id']; ?>"  data-productid="<?php echo $homeProductsValue['id']; ?>" >Remove cart</a></li>
                                        */
                                    ?>
                                    <li><a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart remove_cart_<?php echo $homeProductsValue['id']; ?>" >Go To Cart</a></li>

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
                    <a href="<?php echo base_url('category/bikes'); ?>">See All Bikes</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Bikes end-->

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

                            $label = $this->Master_model->getLabel($homeAccessoriesValue['id']);
                        
                ?>
                        <div class="col-md-4">
                            <div class="single-product text-center">
                               <!--  <span class="new">New</span>
                                <span class="price">off <br>35%</span> -->
                                <div class="single-product-inner">

                                    <?php if (!empty($label)): ?>
                                        <span class="product-new-label"><?php echo $label; ?></span>
                                    <?php endif ?>

                                    <div class="product-img">
                                        
                                        <a href="<?php echo base_url().'product/'.$homeAccessoriesValue['slug']; ?>">
                                        <img src="<?php echo base_url().$homeAccessoriesValue['image_path']; ?>" alt="">
                                    </a>
                                    </div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="<?php echo base_url().'product/'.$homeAccessoriesValue['slug']; ?>">

                                                <?php echo $homeAccessoriesValue['product_name'];?>
                                            </a>
                                        </h3>
                                        <!-- <div class="revew">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </div> -->
                                        <div class="price-box">
                                            <?php 
                                                if($homeAccessoriesValue['selling_price']) {
                                            ?>
                                                <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $homeAccessoriesValue['mrp'];?></span></div>
                                                <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeAccessoriesValue['selling_price'];?></span></div>
                                            <?php } else {    ?>
                                                    <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeAccessoriesValue['mrp'];?></span></div>
                                            <?php } ?>    
                                        </div>
                                    </div>
                                    <div class="product-hover">
                                        <ul>
                                            <?php
                                                $getStock = $this->Master_model->getStock($homeAccessoriesValue['id']);
                                                if ($getStock):
                                            ?>
                                            <li>
                                                <a style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $homeAccessoriesValue['id']; ?>" data-productid="<?php echo $homeAccessoriesValue['id']; ?>" >Add to cart</a>
                                            </li>
                                            <?php endif; ?>

                                            <?php /*
                                            <li>
                                                <a style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $homeAccessoriesValue['id']; ?>"  data-productid="<?php echo $homeAccessoriesValue['id']; ?>" >Remove cart</a>
                                            </li>
                                            */ ?>
                                             <li>
                                                <a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart remove_cart_<?php echo $homeAccessoriesValue['id']; ?>" >Go To Cart</a></li>

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
            <div class="row">
            <div class="col-md-12">
                <div class="all-product text-center">
                    <a href="<?php echo base_url('category/accessories'); ?>">See All Accessories</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!--accessories-area end-->

<!--accessories-area start-->
<div class="accessories-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Spares</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="accessories-list">
                <?php 
                    if($homeSpares) { 
                        foreach ($homeSpares as $homeSparesKey => $homeSparesValue) {

                                    
                            $cart_product_remove = 'display : none;'; 
                            $cart_product_add = '';
                            $wishlist_product_remove = 'display : none;'; 
                            $wishlist_product_add = '';
                            
                            if($cart_data) {
                                if (array_key_exists($homeSparesValue['id'],$cart_data))
                                {
                                  $cart_product_remove = ''; 
                                  $cart_product_add = 'display : none;';
                                }
                            }  
                            if($wishlist_data) {
                                if (array_key_exists($homeSparesValue['id'], $wishlist_data))
                                {
                                  $wishlist_product_remove = ''; 
                                  $wishlist_product_add = 'display : none;';
                                }
                            }  

                            $label = $this->Master_model->getLabel($homeSparesValue['id']);
                        
                ?>
                        <div class="col-md-4">
                            <div class="single-product text-center">
                               <!--  <span class="new">New</span>
                                <span class="price">off <br>35%</span> -->
                                <div class="single-product-inner">

                                    <?php if (!empty($label)): ?>
                                        <span class="product-new-label"><?php echo $label; ?></span>
                                    <?php endif ?>

                                    <div class="product-img">
                                        
                                        <a href="<?php echo base_url().'product/'.$homeSparesValue['slug']; ?>">
                                        <img src="<?php echo base_url().$homeSparesValue['image_path']; ?>" alt="">
                                    </a>
                                    </div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="<?php echo base_url().'product/'.$homeSparesValue['slug']; ?>">

                                                <?php echo $homeSparesValue['product_name'];?>
                                            </a>
                                        </h3>
                                        <!-- <div class="revew">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </div> -->
                                        <div class="price-box">
                                            <?php 
                                                if($homeSparesValue['selling_price']) {
                                            ?>
                                                <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $homeSparesValue['mrp'];?></span></div>
                                                <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeSparesValue['selling_price'];?></span></div>
                                            <?php } else {    ?>
                                                    <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $homeSparesValue['mrp'];?></span></div>
                                            <?php } ?>    
                                        </div>
                                    </div>
                                    <div class="product-hover">
                                        <ul>
                                            <?php
                                                $getStock = $this->Master_model->getStock($homeSparesValue['id']);
                                                if ($getStock):
                                            ?>
                                            <li>
                                                <a style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $homeSparesValue['id']; ?>" data-productid="<?php echo $homeSparesValue['id']; ?>" >Add to cart</a>
                                            </li>
                                            <?php endif; ?>

                                            <?php /*
                                            <li>
                                                <a style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $homeSparesValue['id']; ?>"  data-productid="<?php echo $homeSparesValue['id']; ?>" >Remove cart</a>
                                            </li>
                                            */ ?>
                                             <li>
                                                <a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart remove_cart_<?php echo $homeSparesValue['id']; ?>" >Go To Cart</a></li>

                                            <li>
                                                <a  style="<?php echo $wishlist_product_add; ?>" title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $homeSparesValue['id']; ?>"  data-productid="<?php echo $homeSparesValue['id']; ?>"><i class="fa fa-heart"></i></a>
                                            </li>

                                             <li>
                                                <a style="color: #ea3b02; <?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $homeSparesValue['id']; ?>"  data-productid="<?php echo $homeSparesValue['id']; ?>"><i class="fa fa-heart"></i></a>
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
            <div class="row">
            <div class="col-md-12">
                <div class="all-product text-center">
                    <a href="<?php echo base_url('category/spares-and-service'); ?>">See All Spares</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<!--accessories-area end-->

<!-- Blogs -->
<?php

$blogs = $this->Master_model->allBlog(3);

if (!empty($blogs)):
?>
<div class="accessories-areas">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Blogs</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px">
            <div class="accessories-lists">
                <?php foreach ($blogs as $blog): ?>
                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:220px; overflow: hidden;">
                        <a href="<?php echo base_url('blog/'.$blog->link) ?>">
                        <img src="<?php echo base_url().$blog->image;?>">
                        </a>
                        </div>
                        <div class="blog-content">
                            <a href="<?php echo base_url('blog/'.$blog->link) ?>">
                                <h3><?php echo $blog->title; ?></h3>
                            </a>

                            <span><strong>Date:</strong> <?php echo $blog->date; ?></span>
                            <span><strong>Posted by:</strong> <?php echo $blog->author_name; ?></span>

                            <p></p><p><?php echo substr($blog->description, 0, 100); ?></p>
                            <div class="view-blog">
                             <a href="<?php echo base_url('blog/'.$blog->link) ?>">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php

    $instaFeed = $this->Master_model->getInstaFeed();
    if(!empty($instaFeed) && isset($instaFeed->data)):
?>

<div class="accessories-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>@beetlebikes</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="accessories-list">
                <?php 
                    foreach ($instaFeed->data as $insta):
                        if($insta->media_type == 'IMAGE'):
                ?>
                <div class="col-md-4">
                    <div class="single-product text-center">
                        <div class="single-product-inner" style="padding-bottom: unset;">
                            <div class="" style="height: 350px;overflow-y: hidden">
                             <a target="_blank" href="<?php echo $insta->permalink ?>">
                                <img src="<?php echo $insta->media_url ?>" alt="">
                             </a>
                            </div>
                            <div class="product-details" style="padding-bottom: unset;">
                                <h3>
                                    <a target="_blank" href="<?php echo $insta->permalink ?>"><?php echo character_limiter($insta->caption, 50); ?></a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>


<!-- Media Section -->

<div class="accessories-areas">
    <div class="container">
        <div class="row" style="margin-top:50px">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Media</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom:50px">
            <div class="accessories-lists">
                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:120px; overflow: hidden;">
                        <a href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_L_8Wyo6puON7K1t4b9a6qkZzCk01XbywcaUwdMi7KOLM2Hc6j-r1APr5CxMHlcCJx34&usqp=CAU">
                        </a>
                        </div>
                        <div class="blog-content" style="margin-top: 10px; min-height: 100px;">
                            <a href="#">
                                <h4 style="padding: 0 30px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h4>
                            </a>

                            <!-- <span><strong>Date:</strong> dasdasdas</span>
                            <span><strong>Posted by:</strong> dadasdas</span>

                            <p>sdasdasdads</p>

                            <div class="view-blog">
                             <a href="#">Read More</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:120px; overflow: hidden;">
                        <a href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_L_8Wyo6puON7K1t4b9a6qkZzCk01XbywcaUwdMi7KOLM2Hc6j-r1APr5CxMHlcCJx34&usqp=CAU">
                        </a>
                        </div>
                        <div class="blog-content" style="margin-top: 10px; min-height: 100px;">
                            <a href="#">
                                <h4 style="padding: 0 30px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h4>
                            </a>

                            <!-- <span><strong>Date:</strong> dasdasdas</span>
                            <span><strong>Posted by:</strong> dadasdas</span>

                            <p>sdasdasdads</p>

                            <div class="view-blog">
                             <a href="#">Read More</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:120px; overflow: hidden;">
                        <a href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_L_8Wyo6puON7K1t4b9a6qkZzCk01XbywcaUwdMi7KOLM2Hc6j-r1APr5CxMHlcCJx34&usqp=CAU">
                        </a>
                        </div>
                        <div class="blog-content" style="margin-top: 10px; min-height: 100px;">
                            <a href="#">
                                <h4 style="padding: 0 30px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h4>
                            </a>

                            <!-- <span><strong>Date:</strong> dasdasdas</span>
                            <span><strong>Posted by:</strong> dadasdas</span>

                            <p>sdasdasdads</p>

                            <div class="view-blog">
                             <a href="#">Read More</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:120px; overflow: hidden;">
                        <a href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_L_8Wyo6puON7K1t4b9a6qkZzCk01XbywcaUwdMi7KOLM2Hc6j-r1APr5CxMHlcCJx34&usqp=CAU">
                        </a>
                        </div>
                        <div class="blog-content" style="margin-top: 10px; min-height: 100px;">
                            <a href="#">
                                <h4 style="padding: 0 30px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h4>
                            </a>

                            <!-- <span><strong>Date:</strong> dasdasdas</span>
                            <span><strong>Posted by:</strong> dadasdas</span>

                            <p>sdasdasdads</p>

                            <div class="view-blog">
                             <a href="#">Read More</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:120px; overflow: hidden;">
                        <a href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_L_8Wyo6puON7K1t4b9a6qkZzCk01XbywcaUwdMi7KOLM2Hc6j-r1APr5CxMHlcCJx34&usqp=CAU">
                        </a>
                        </div>
                        <div class="blog-content" style="margin-top: 10px; min-height: 100px;">
                            <a href="#">
                                <h4 style="padding: 0 30px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h4>
                            </a>

                            <!-- <span><strong>Date:</strong> dasdasdas</span>
                            <span><strong>Posted by:</strong> dadasdas</span>

                            <p>sdasdasdads</p>

                            <div class="view-blog">
                             <a href="#">Read More</a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="blog-entry">
                        <div style="height:120px; overflow: hidden;">
                        <a href="#">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR_L_8Wyo6puON7K1t4b9a6qkZzCk01XbywcaUwdMi7KOLM2Hc6j-r1APr5CxMHlcCJx34&usqp=CAU">
                        </a>
                        </div>
                        <div class="blog-content" style="margin-top: 10px; min-height: 100px;">
                            <a href="#">
                                <h4 style="padding: 0 30px;text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</h4>
                            </a>

                            <!-- <span><strong>Date:</strong> dasdasdas</span>
                            <span><strong>Posted by:</strong> dadasdas</span>

                            <p>sdasdasdads</p>

                            <div class="view-blog">
                             <a href="#">Read More</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Media Section End -->


<?php

$customerReviews = $this->db->order_by('display_order')->get_where('testimonials', array('is_active' => 1))->result_object();

if (!empty($customerReviews)):

?>

<style type="text/css">
    .customer-reviews img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        vertical-align: middle;
    }

    .customer-reviews .product-img {
        height: unset;
    }

    .customer-reviews .product-img {
        height: unset;
    }

    .customer-reviews .product-details h3 {
        font-size: 18px;
        text-align: justify;
    }

    .customer-reviews .product-details p {
        padding: 0px 15px;
        min-height: 53px;
        text-align: justify;
        font-size: 18px;
    }
</style>

<div class="accessories-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Customer Reviews</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="accessories-list customer-reviews">
                <?php foreach ($customerReviews as $customerRev): ?>
                <div class="col-md-4">
                    <div class="single-product text-center">
                        <div class="single-product-inner" style="padding-bottom: unset;">
                            <div class="product-img">
                             <a href="javascript:void(0)">
                                <img src="<?php echo base_url($customerRev->image); ?>" alt="">
                             </a>
                            </div>
                            <div class="product-details" style="padding-bottom: unset;">
                                <h3><?php echo $customerRev->review ?></h3>
                                <p><?php echo $customerRev->name ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?php endif; ?>

<style type="text/css">
    .homePage.hasWebpSupport .hmcSection {
        background: #000 url(<?php echo base_url('assets/front/videos/video-banner.jpg') ?>) no-repeat center center;
        background-size: cover;
    }

    .homePage .hmcSection {
        z-index: 1;
        /*height:  514px;*/
        height:  100vh;
    }
    
    .positionRelative {
        position: relative;
    }

    @media only screen and (min-width: 1200px) {
        .homePage .hmcSection .posContainer h3 {
            font-size: 4.5rem;
            line-height: 53px;
        }
    }

    @media only screen and (min-width: 768px) {
        .homePage .hmcSection:before {
            padding-top: 30%;
        }

        .homePage .hmcSection .posContainer h3 {
            font-size: 3.1rem;
            line-height: 37px;
        }
    }

    .homePage .hmcSection:before {
        content: "";
        display: block;
        padding-top: 50%;
    }    

    .homePage .hmcSection .posContainer {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        -webkit-transform: translate(-50%,-50%);
        width: 100%;
        max-width: 670px;
        padding: 20px;
        z-index: 30;
    }


    .homePage .hmcSection .posContainer h3 {
        margin-top: 0;
        font-size: 2.4rem;
        line-height: 30px;
        text-transform: none;
    }

    .homePage .hmcSection .posContainer h3, .homePage .hmcSection .posContainer p {
        color: #fff;
    }

    .homePage .hmcSection .posContainer p {
        line-height: 21px;
        font-size: 1.4rem;
        margin-bottom: 20px;
    }

    .homePage .hmcSection .posContainer h3, .homePage .hmcSection .posContainer p {
        color: #fff;
    }

    .homePage .hmcSection .posContainer .defaultButton.withIcon {
        margin-top: 10px;
        font-size: 1.2rem;
        line-height: 35px;
        width: 220px;
    }

    button.defaultButton.primaryGreen, a.defaultButton.primaryGreen {
        color: #fff;
        border-color: #00b256;
        background: #00b256;
    }


    button.defaultButton.withIcon, a.defaultButton.withIcon {
        padding: 0;
        height: auto;
        border-radius: 0;
        border: 0;
    }

    button.defaultButton, a.defaultButton {
        cursor: pointer;
        padding: 0 18px;
        color: transparent;
        background-color: transparent;
        border: 2px solid transparent;
        border-radius: 3px;
        font-weight: 700;
        font-family: noto sans kr,sans-serif;
        margin-top: 2px;
        margin-bottom: 2px;
        text-transform: uppercase;
        text-align: center;
        line-height: 44px;
        display: inline-block;
        font-size: 1.36363636rem;
    }

    .videoParent {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 0;
        overflow: hidden;
        margin-bottom: -1px;
    }

    .videoParent video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    audio, canvas, progress, video {
        display: inline-block;
        vertical-align: baseline;
    }
    .homePage .hmcSection:after{
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 5;
        background: rgba(0,0,0,.25);
    }

    @media (min-width: 320px) and (max-width: 480px) {
  
        .homePage {
            margin-top: unset !important;
        }

        .homePage .hmcSection {
            height: unset;
        }

        .videoParent video {
            object-fit: contain;
        }

        .homePage .hmcSection:before {
            padding-top: 56%;
        }
      
    }
</style>

<div class="homePage">
    <div class="hmcSection positionRelative" id="hmcSection" data-mp4="<?php echo base_url('assets/front/videos/bike-panache.webm') ?>" data-webm="<?php echo base_url('assets/front/videos/bike-panache.webm') ?>" data-hasloaded="true">
    <!-- <div class="posContainer text-center">
        <h3>Not sure where to start?</h3>
        <p>Use our expert HMC Wizard to simplify <br class="visible-xs">your search</p>
        <a href="/en/help-me-choose-bicycle" class="defaultButton withIcon primaryGreen cmbRow">
            <span>Help Me Choose</span>
        </a>
    </div> -->
    <div class="videoParent"><video style="opacity:0.98;" autoplay="" loop="" muted="" playsinline="" src="<?php echo base_url('assets/front/videos/bike-panache.webm') ?>"></video></div></div>
</div>