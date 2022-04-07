  <?php
    $this->load->helper('common_helper'); 
    $cart_data = cart_data();
    $wishlist_data = wishlist_data();
  ?>

    <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li><?php echo $pageTitle ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs-area end -->
    <!--shop-area start-->
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="price-slider-box">
                        <div class="price-filter">
                            <div class="price-slider-title">
                                <h6>Min / Max Price</h6>
                            </div>
                            
                            <div class="price-slider-top">
                                <div class="input-type">
                                    <input disabled type="text" id="min-price" />
                                </div>
                                <div class="input-type">
                                    <input disabled type="text" id="max-price" />
                                </div>
                            </div>
                            <div id="price-slider" class="price-slider"></div>
                           
                        </div><!-- /.price-filter -->
                    </div>
                    <div class="categoryies-option">
                        <h4>CATEGORIES</h4>
                        <?php if($categoriesWithPrdouctCount) { ?>
                        <ul>
                            <?php foreach ($categoriesWithPrdouctCount as $categoriesWithPrdouctCountKey => $categoriesWithPrdouctCountValue) { ?>
                            <li>
                                <input class="catFilter" onclick="productSideFilter()" id="catFilter<?php echo $categoriesWithPrdouctCountValue['cat_id']; ?>" value="<?php echo $categoriesWithPrdouctCountValue['cat_id']; ?>" type="checkbox" name="categories[]" <?php if ($catData->id == $categoriesWithPrdouctCountValue['cat_id']) { echo "checked='checked'"; } ?>>
                                <label for="catFilter<?php echo $categoriesWithPrdouctCountValue['cat_id']; ?>"><?php echo $categoriesWithPrdouctCountValue['category']; ?><span> (<?php echo $categoriesWithPrdouctCountValue['product_count']; ?>)</span></label>
                            </li>
                            <?php  } ?>
                        </ul>
                        <?php } ?>
                    </div>
                   
                        <?php 
                            if($attributesPrdouct) {
                               
                               foreach ($attributesPrdouct as $productAttributeKey => $productAttributeValue) {
                                $newAttributeValue = []; 
                        ?>        
                        <div class="categoryies-option color-box">
                            <ul>
                                <h4><?php echo $productAttributeKey; ?></h4>
                                
                            <?php 
                                echo '<li>'; 
                                foreach ($productAttributeValue as $productAttributeValueKey => $productAttributeValueValue) {
                                ?>
                                    <input class="attributeFilter"  onclick="attributeFilter()" id="attributeFilter<?php echo $productAttributeValueValue['att_value_id']; ?>" type="checkbox" name="attribute_values[]" value="<?php echo $productAttributeValueValue['att_value_id']; ?>">
                                    <label for="attributeFilter<?php echo $productAttributeValueValue['att_value_id']; ?>"><?php echo $productAttributeValueValue['att_value']; ?><span> (<?php echo $productAttributeValueValue['product_count']; ?>)</span></label>
                                <?php    
                                   
                                 } 
                                
                                echo '</li>';
                            ?>
                            </ul>
                        </div>
                        <?php           
                                }
                        ?>
                        <?php } ?>
                   
                </div>
                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="shop-item-filter">
                        <div class="toolber-form left">
                           <p class="filter-title">sort by: </p>
                            <div class="filter-form">
                                <select id="productOrderBy">
                                    <option value="Newest">Newest items</option>
                                    <option value="Price Low">Price: low to high</option>
                                    <option value="Price High">Price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolber-form  middle">
                           <p class="filter-title">Show: </p>
                            <div class="filter-form show-form">
                                <select  id="productOnPage">
                                    <option value="9">9</option>
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                </select>
                            </div>
                        </div>
                        <!--tab-list start-->
                        <div class="shop-tab">
                            <ul role="tablist">
                                <li role="presentation" class="active"  id="productTabGrid">
                                    <a href="#grid-view" aria-controls="grid-view" role="tab" data-toggle="tab"><i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li role="presentation" id="productTabList">
                                    <a href="#list-view" aria-controls="list-view" role="tab" data-toggle="tab"><i class="fa fa-th-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--tab-list end-->
                    </div>
                    
                    <div id="ajaxProductFilter">
                    <?php 
                    /*   
                    <div class="row">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="grid-view">
                                <?php 
                                    if($allProducts) { 
                                        foreach ($allProducts as $allProductsKey => $allProductsValue) {
                                ?>

                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <div class="single-product text-center">
                                       <!--  <span class="price">off <br>30%</span> -->
                                        <div class="single-product-inner">
                                            <div class="product-img">
                                               <a href="<?php echo base_url().'product/'.$allProductsValue['slug']; ?>"><img src="<?php echo base_url().$allProductsValue['image_path']; ?>" alt=""></a>
                                            </div>
                                            <div class="product-details">
                                                <h3>
                                                    <a href="<?php echo base_url().'product/'.$allProductsValue['slug']; ?>"><?php echo $allProductsValue['product_name'].'-'.$allProductsValue['sku_code']; ?></a>
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
                                                        if($allProductsValue['selling_price']) {
                                                    ?>
                                                        <div class="old-price"><span>$<?php echo $allProductsValue['selling_price'];?></span></div>
                                                        <div class="new-price"><span>$<?php echo $allProductsValue['mrp'];?></span></div>
                                                    <?php } else {    ?>
                                                            <div class="new-price"><span>$<?php echo $allProductsValue['mrp'];?></span></div>
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
                                                if (array_key_exists($allProductsValue['id'],$cart_data))
                                                {
                                                  $cart_product_remove = ''; 
                                                  $cart_product_add = 'display : none;';
                                                }
                                            }

                                            if($wishlist_data) {
                                                if (array_key_exists($allProductsValue['id'], $wishlist_data))
                                                {
                                                  $wishlist_product_remove = ''; 
                                                  $wishlist_product_add = 'display : none;';
                                                }
                                            }    
                                        ?>
                                        <li><a  style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $allProductsValue['id']; ?>" data-productid="<?php echo $allProductsValue['id']; ?>" >Add to cart</a></li>

                                        <li><a  style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $allProductsValue['id']; ?>"  data-productid="<?php echo $allProductsValue['id']; ?>" >Remove cart</a></li>

                                        <li><a style="<?php echo $wishlist_product_add; ?>"  title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $allProductsValue['id']; ?>" data-productid="<?php echo $allProductsValue['id']; ?>"><i class="fa fa-heart"  ></i></a></li>

                                         <li><a  style="<?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $allProductsValue['id']; ?>"  data-productid="<?php echo $allProductsValue['id']; ?>"><i class="fa fa-heart" style="color: #ea3b02; "></i></a></li>
                                        
                                                    
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
                            <div role="tabpanel" class="tab-pane" id="list-view">
                               <?php 
                                    if($allProducts) { 
                                        foreach ($allProducts as $allProductsKey => $allProductsValue) {
                                ?>
                                <div class="col-md-12 col-sm-12 col-xs-12 product-list">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-img">
                                                <!-- <span class="price">off <br> 30%</span> -->
                                                  <a href="<?php echo base_url().'product/'.$allProductsValue['slug']; ?>"><img src="<?php echo base_url().$allProductsValue['image_path']; ?>" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="product-details">
                                                <h3>
                                                    <a href="<?php echo base_url().'product/'.$allProductsValue['slug']; ?>"><?php echo $allProductsValue['product_name'].'-'.$allProductsValue['sku_code']; ?></a>
                                                </h3>
                                                <div class="product-review">
                                                    <div class="revew">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                                    </div>
                                                    <div class="ratting-count">
                                                        <p>15 Reviews</p>
                                                    </div>
                                                </div>
                                                <div class="price-box">
                                                    <?php 
                                                        if($allProductsValue['selling_price']) {
                                                    ?>
                                                        <div class="old-price"><span>$<?php echo $allProductsValue['selling_price'];?></span></div>
                                                        <div class="new-price"><span>$<?php echo $allProductsValue['mrp'];?></span></div>
                                                    <?php } else {    ?>
                                                            <div class="new-price"><span>$<?php echo $allProductsValue['mrp'];?></span></div>
                                                    <?php } ?>    
                                                </div>
                                                <div class="producut-desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                </div>
                                                <div class="product-action-btn">
                                                    <ul>
                                                    <?php

                                                        $cart_product_remove = 'display : none;'; 
                                                        $cart_product_add = '';

                                                        $wishlist_product_remove = 'display : none;'; 
                                                        $wishlist_product_add = '';
                                                        
                                                        if($cart_data) {
                                                            if (array_key_exists($allProductsValue['id'],$cart_data))
                                                            {
                                                              $cart_product_remove = ''; 
                                                              $cart_product_add = 'display : none;';
                                                            }
                                                        }

                                                        if($wishlist_data) {
                                                            if (array_key_exists($allProductsValue['id'], $wishlist_data))
                                                            {
                                                              $wishlist_product_remove = ''; 
                                                              $wishlist_product_add = 'display : none;';
                                                            }
                                                        }    
                                                    ?>
                                                    <li><a  style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add_cart cart_add_signle cart_product_<?php echo $allProductsValue['id']; ?>" data-productid="<?php echo $allProductsValue['id']; ?>" >Add to cart</a></li>

                                                    <li><a  style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add_cart remove_cart_<?php echo $allProductsValue['id']; ?>"  data-productid="<?php echo $allProductsValue['id']; ?>" >Remove cart</a></li>

                                                    <li><a style="<?php echo $wishlist_product_add; ?>"  title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add Wishlist wishlist_add_<?php echo $allProductsValue['id']; ?>" data-productid="<?php echo $allProductsValue['id']; ?>"><i class="fa fa-heart"  ></i>Add to Wishlist</a></li>

                                                     <li><a  style="<?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove Wishlist wishlist_remove_<?php echo $allProductsValue['id']; ?>"  data-productid="<?php echo $allProductsValue['id']; ?>"><i class="fa fa-heart" style="color: #ea3b02; "></i>Remove Wishlist</a></li>
                                                      <!--   <li><a class="add_cart" href="#">Add to cart</a></li>
                                                        <li><a class="Wishlist" href="#"><i class="fa fa-heart"></i>Add to Wishlist</a></li> -->
                                                    </ul>
                                                </div>
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

                   <?php 
                        if($allProducts) { 
                    ?>
                    <div class="pagination-box">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pagination-inner">
                                    <?php echo $links; ?>
                                    <!-- <ul>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">next</a></li>
                                    </ul> -->
                                </div>
                                <!-- <div class="showing-page"><p>Showing 1 to 12 of 12 (1 Pages)</p></div> -->
                            </div>
                        </div>
                    </div>
                    <?php } */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shop-area end-->
   