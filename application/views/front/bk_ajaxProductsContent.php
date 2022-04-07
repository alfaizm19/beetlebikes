

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
            </div>            
        </div>
    </div>
</div>
<?php } ?>