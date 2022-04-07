<?php 
  $totalReviews = $this->Master_model->count_product_site_reviews($prod->id);
  $reviewsList = $this->Master_model->product_site_reviews($prod->id);
?>
<section class="section page-content hide">
<div class="container">
  <div>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <?php if (isset($breadcrumb) && !empty($breadcrumb)): ?>
        <?php echo $breadcrumb; ?>
      <?php endif ?>
      <li class="active">
        <?php echo $prod->product_name ?>
      </li>
    </ol>
  </div>
</div>
</section>
<section class="section product-view">
    <div class="container section-60">
        <div class="row product-details row-30">
            
    <div class="col-lg-6">
      <div class="row">
        <?php if (!empty($images)): ?>
          <div class="col-xl-2 col-md-2 col-lg-3 mobile-order-2">
            <div class="slider-nav verticle-product-slider">

              <div><img alt="" src="<?php echo base_url($prod->image_path) ?>" width="88" height="88"></div>

              <?php 
                foreach ($images as $img): ?>
                  
                  <?php if ($img->type == 'image'): ?>
                    <div><img alt="" src="<?php echo base_url($img->image_path) ?>" width="88" height="88"></div>
                  <?php else: ?>
                    <div><img alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/video-play.png" width="88" height="88"></div>
                  <?php endif ?>

              <?php endforeach ?>
            </div>
          </div>
        <?php endif ?>
        <div class="col-xl-10 col-lg-9 col-md-8 offset-top-20 offset-sm-top-0">
          <div class="slider-for" data-lightgallery="group">
            <div>
              <!-- Magnific Popup-->
              <div class="thumbnail-variant-2">
                <img class="img-responsive drift-demo-trigger" data-zoom="<?php echo base_url($prod->image_path) ?>" src="<?php echo base_url($prod->image_path) ?>" width="470" height="632" alt="">
                <?php if (!empty($prod->product_tag)): ?>
                  <div class="caption">
                    <a class="label label-primary" href="<?php echo base_url($prod->slug) ?>">
                      <?php echo $prod->product_tag ?>
                    </a>
                </div>
                <?php endif ?>

                <div class="caption-variant-1">
                  <a class="icon icon-base icon-circle fl-line-icon-set-magnification3" href="<?php echo base_url($prod->image_path) ?>" data-lightgallery="item">
                    <img class="img-responsive" src="<?php echo base_url($prod->image_path) ?>" width="470" height="632" alt="">
                  </a>
                </div>
              </div>
            </div>

            <?php 
              if (!empty($images)):
                foreach($images as $gallery):
            ?>

              <?php if ($gallery->type == 'image'): ?>

                <div>
                  <!-- Magnific Popup-->
                  <div class="thumbnail-variant-2"><img class="img-responsive drift-demo-trigger" data-zoom="<?php echo base_url($gallery->image_path) ?>" src="<?php echo base_url($gallery->image_path) ?>" width="470" height="632" alt="<?php echo base_url($gallery->image_alt) ?>">
                    
                    <?php if (!empty($prod->product_tag)): ?>
                      <div class="caption"><a class="label label-primary" href="<?php echo base_url() ?>"><?php echo $prod->product_tag; ?></a></div>
                    <?php endif ?>

                    <div class="caption-variant-1">
                      <a class="icon icon-base icon-circle fl-line-icon-set-magnification3" data-lightgallery="item" href="<?php echo base_url($gallery->image_path) ?>"><img class="img-responsive" src="<?php echo base_url($gallery->image_path) ?>" width="470" height="632" alt="<?php echo base_url($gallery->image_alt) ?>"></a>
                    </div>
                  </div>
                </div>

              <?php else: ?>

                <div>
                  <div class="thumbnail-variant-2" style="width:100%;">
                    <iframe width="100%" height="480" src="<?php echo $gallery->video_url ?>">
                    </iframe>
                  </div>
                </div>

              <?php endif ?>
              
            <?php endforeach; 
            endif; ?>
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 text-md-left details">
      <h3 class="product-details-heading text-thin">
        <?php echo $prod->product_name ?>
      </h3>
      <div class="offset-top-4 justify-content-md-between">
        <div class="product-details-price text-center">
          <?php 
            $mrp = $prod->mrp;
            $sp = $prod->selling_price;
            $dis = cal_percent_dis($mrp, $sp);
            if (!empty($sp) && $sp > 0) {
              if ($sp <= $mrp) {
                echo '<p class="product-details-price-main"><i class="fa fa-inr"></i>'.check_num($sp).'</p>';
                echo ' <span class="product-details-price-small text-strike text-muted"><i class="fa fa-inr"></i>'.check_num($mrp).'</span>';
              }
            } else {
              echo '<p class="product-details-price-main"><i class="fa fa-inr"></i>'.check_num($mrp).'</p>';
            }

            if ($dis) {
              echo '<span class="product-details-price-small text-muted">'.$dis.'% OFF</span>'; 
            }
          ?>
        </div>
        <div class="hide justify-content-center d-flex offset-top-20 offset-sm-top-30">
          <div class="product-details-rating"><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star text-gray-light"></span></div>
          <!-- <div><a class="decorated tab-change-link" href="#" data-custom-scroll-to="comments">(1 customer review)</a></div> -->
        </div>
      </div>
      <div class="row my-3">
          <div class="col-md-8 mx-auto">
              <div class="input-group mb-3 pincodePanel">
          <input min="1" minlength="6" maxlength="6" type="number" class="form-control" placeholder="Enter pincode to check availability" name="pincode" id="pincode" aria-label="Pincode" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button id="checkPincode" class="btn btn-primary" type="button">Check</button>
          </div>
        </div>
        <span id="pincodeStatus"></span>
        <p class="mt-3 font-italic">
        <!--SKU: <?php //echo $prod->sku_code ?>-->

        <?php 

          $isProdInWishlist = $this->Master_model->is_prod_in_wishlist(user_id(), $prodID);
        ?>

        <a class="link pull-left" href="javascript:void(0)" onclick="wishlist('<?php echo $prodID ?>')">
          <i id="wishlist_<?php echo $prodID ?>" class="fa <?php echo $isProdInWishlist? 'fa-heart text-danger':'fa-heart-o'; ?>" style="font-style: normal !important;"></i> <span id="beforeWishlist"><?php echo $isProdInWishlist? 'Remove from Wishlist':'Add to Wishlist'; ?></span>
          <!-- <span id="wishlistMsg"></span> -->
        </a>

        <!-- <a class="prefix-sm-30 link" href="#">
          <span class="icon icon-sm mdi mdi-signal"></span>Add to Compare
        </a> -->
      </p>
          </div>
        
      </div>
      <!--<hr class="divider divider-iron divider-dotted my-2">-->
      
    
    <!--<hr class="divider divider-iron divider-dotted my-3">-->
    
        <div class="row mt-2">
            <div class="col-md-8 mx-auto">
                <div class="clearfix d-lg-block justify-content-between text-left">

                <?php 
                  if ($prod->short_description) {
                    echo $prod->short_description;
                  }
                ?>
        
                <!-- <span>Enter pincode to check availability</span> -->
        
                <!-- <div class="input-group mb-3 pincodePanel">
                  <input min="1" minlength="6" maxlength="6" type="number" class="form-control" placeholder="Enter pincode to check availability" name="pincode" id="pincode" aria-label="Pincode" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button id="checkPincode" class="btn btn-primary" type="button">Check</button>
                  </div>
                </div>
                <span id="pincodeStatus"></span> -->
              </div>
                
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-8 mx-auto">
                  <?php 
          $cartStock = get_cart_stock($prod->id);
          $currentStock = $prod->stock;
          $displayQty = 1;

          if ( !empty($cartStock) && ($cartStock <= $currentStock) ) {
            $displayQty = $cartStock;
          } else if(!empty($currentStock)) {
            $displayQty = 1;
          }

          if ($prod->stock):
        ?>
        <div class="float-left pull-xs-left">
            <input class="stepper form-input form-input-impressed qty_<?php echo $prodID ?>" type="number" data-zeros="true" value="<?php echo $displayQty ?>" min="1" max="<?php echo $prod->stock ?>">
        </div>
        <?php endif ?>
        <div class="float-left pull-xs-left">
                  <?php 
                    if ($prod->stock):
                  ?>
                    <button id="btn_<?php echo $prodID; ?>" onclick="addToCart('<?php echo $prodID ?>')" class="prefix-sm-30 btn btn-primary btn-icon btn-icon-left btn-w-180 mb-2 p-1" type="button"><span class="icon icon fl-line-icon-set-grocery10"></span> Add to cart</button>
                    <?php endif ?>
                    </div>
        
        
            </div>
        </div>
      
      <!-- <p class="my-3">&nbsp;</p> -->
      <div class="row mt-2">
          <div class="col-md-8 mx-auto">
              <div class="clearfix d-flex d-lg-block justify-content-between">
      
                <div class="pull-xs-left">
                  <?php 
                    if ($prod->stock):
                  ?>
                   
        
                    <button id="buy_now_btn_<?php echo $prodID; ?>" onclick="buyNow('<?php echo $prodID ?>')" class="btn btn-primary buy-now-btn btn-icon btn-icon-left btn-w-180 mb-2 p-1" type="button"><span class="icon icon fl-line-icon-set-shopping63"></span> Buy Now</button>
        
                  <?php else: ?>
                    <button class="btn btn-primary btn-icon btn-icon-left" type="button">Out of stock</button>
                  <?php endif ?>
                </div>
              </div>
          </div>
      </div>
      
      
      <span id="msg_<?php echo $prodID; ?>"></span>

      <p class="my-3">&nbsp;</p>
      
    </div>
        </div>
    </div>
</section>
<section class="section">
<div class="container section-60 mt-3 pt-3">
  <div class="row product-details product-details-view row-30">
      
    <!-- Responsive-tabs-->
    <div class="col-12" id="comments">
      <div class="tabs-custom tabs-horizontal tabs-corporate" id="tabs-1">
        <!--Nav tabs-->
        <ul class="nav nav-tabs">
          <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Description</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-0" data-toggle="tab">Product Details</a></li>
          <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab" data-review="true">Reviews (<?php echo $totalReviews ?>)</a></li>
        </ul>

        <?php 

          
          $attrib = $this->Master_model->get_selected_attribute($prod->id);

        ?>
        <!--Tab panes-->
        <div class="tab-content">
            <div class="tab-pane fade" id="tabs-1-0">
              <div class="row features-list">
                <div class="col-12">
                    <ul class="row">
                      <li class="col-xs-12 col-md-6 list_0" >
                        <div class="row">
                          <p class="col-xs-6 col-sm-6 col-md-6 mt-1 font-weight-bold">Dimension</p><p class="col-xs-6 col-sm-6 col-md-6  mt-1"><?php echo $prod->dimension ?></p>
                        </div>
                      </li>
                      <li class="col-xs-12 col-md-6 list_0" >
                        <div class="row">
                        <p class="col-xs-6 col-sm-6 col-md-6 mt-1 font-weight-bold">Net Weight (gm)</p><p class="col-xs-6 col-sm-6 col-md-6  mt-1"><?php echo number_format($prod->net_weight,2) ?></p>
                        </div>
                      </li>
                      <li class="col-xs-12 col-md-6 list_0" >
                        <div class="row">
                        <p class="col-xs-6 col-sm-6 col-md-6 mt-1 font-weight-bold">Deno (gm)</p><p class="col-xs-6 col-sm-6 col-md-6  mt-1"><?php echo $prod->deno ?></p>
                        </div>
                      </li>
                      <li class="col-xs-12 col-md-6 list_0" >
                        <div class="row">
                        <p class="col-xs-6 col-sm-6 col-md-6 mt-1 font-weight-bold">Categories</p><p class="col-xs-6 col-sm-6 col-md-6  mt-1">
                          <?php 
                            $cat = $this->Master_model->category_by_id($prod->category_level_1);
                          ?>
                          <a href="<?php echo base_url($cat->slug) ?>">
                            <?php echo $cat->category ?>
                          </a>
                        </p>
                        </div>
                      </li>
                      <?php 
                        if (!empty($attrib)):
                          foreach($attrib as $attr):
                      ?>
                      <li class="col-xs-12 col-md-6 list_0" >
                        <div class="row">
                        <p class="col-xs-6 col-sm-6 col-md-6 mt-1 font-weight-bold">
                        <?php echo $this->Master_model->attrib_name_by_id($attr->attribute_name); ?>
                        </p>
                        <p class="col-xs-6 col-sm-6 col-md-6  mt-1">
                          <?php echo $this->Master_model->attrib_value_by_id($attr->attribute_value); ?>
                        </p>
                        </div>
                      </li>
                      <?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>
            </div>
          <div class="tab-pane fade show active" id="tabs-1-1">
            <div class="text-center">
              <h4>Description</h4>
              <p class="offset-top-20">
                <?php echo $prod->description ?>
              </p>
            </div>
          </div>
          
          <div class="tab-pane fade" id="tabs-1-2">
            <h4 class="text-left"><?php echo $totalReviews ?> review for <?php echo $prod->product_name ?></h4>
            <div class="offset-top-20">
              <div class="tab-review">
                <div class="tab-review-body offset-top-10">

                  <?php 
                    if(!empty($reviewsList)):
                      foreach($reviewsList as $reviews):
                        $name = $reviews->first_name.' '.$reviews->last_name;
                  ?>

                    <p>Posted by <?php echo $name ?></p>

                    <p style="font-weight:600">
                      <div class="product-details-rating mr-2" style="display: inline-block;">
                        
                        <?php 
                          for ($i=1; $i <= $reviews->rating; $i++):
                        ?>

                          <?php if ($i <= $reviews->rating): ?>
                            <span class="icon icon-xs mdi mdi-star"></span>
                          <?php endif ?>
                          
                        <?php endfor; ?>

                        <?php 
                          $remain = 5-$reviews->rating;
                        if ($remain > 0): ?>

                          <?php for ($j=0; $j < $remain; $j++): ?>

                            <span class="icon icon-xs mdi mdi-star text-gray-light"></span>

                          <?php endfor; ?>

                        <?php endif ?>

                      </div>
                      <?php echo $reviews->title ?>
                    </p>
                    <p>&#34;<?php echo $reviews->review ?>&#34;</p>
                      
                    <?php if (!empty($reviews->image_1)): ?>
                      
                    <a class="" href="<?php echo base_url('uploads/product_reviews/'.$reviews->image_1) ?>" data-lightgallery="item" tabindex="0">
                      <img src="<?php echo base_url('uploads/product_reviews/'.$reviews->image_1) ?>" width="50" class="pull-left mr-2 mt-1 img-thumbnail"/>
                    </a>

                    <?php endif ?>

                    <?php if (!empty($reviews->image_2)): ?>
                      
                    <a class="" href="<?php echo base_url('uploads/product_reviews/'.$reviews->image_2) ?>" data-lightgallery="item" tabindex="0">
                      <img src="<?php echo base_url('uploads/product_reviews/'.$reviews->image_2) ?>" width="50" class="pull-left mr-2 mt-1 img-thumbnail"/>
                    </a>

                    <?php endif ?>

                    <?php if (!empty($reviews->image_3)): ?>
                      
                    <a class="" href="<?php echo base_url('uploads/product_reviews/'.$reviews->image_3) ?>" data-lightgallery="item" tabindex="0">
                      <img src="<?php echo base_url('uploads/product_reviews/'.$reviews->image_3) ?>" width="50" class="pull-left mr-2 mt-1 img-thumbnail"/>
                    </a>

                    <?php endif ?>

                    <?php if (!empty($reviews->image_4)): ?>
                      
                    <a class="" href="<?php echo base_url('uploads/product_reviews/'.$reviews->image_4) ?>" data-lightgallery="item" tabindex="0">
                      <img src="<?php echo base_url('uploads/product_reviews/'.$reviews->image_4) ?>" width="50" class="pull-left mr-2 mt-1 img-thumbnail"/>
                    </a>

                    <?php endif ?>
                  
                    

                  <?php endforeach; ?>

                  <?php else: ?>
                    <h5>No Reviews</h5>
                  <?php endif; ?>
                </div>
              </div>
              <!--<h4 class="offset-top-45">Add a Review</h4>
              <div class="row offset-top-0">
                <div class="col-lg-6">
                  <form data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                    <div class="offset-top-20 d-flex align-items-center">
                      <div class="font-italic">
                        <p>Your Rating:</p>
                      </div>
                      <div class="inset-left-10">
                        <fieldset class="rating">
                          <input id="star5" type="radio" name="rating" value="5">
                          <label class="full" for="star5" title="Awesome - 5 stars"></label>
                          <input id="star4" type="radio" name="rating" value="4">
                          <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                          <input id="star3" type="radio" name="rating" value="3">
                          <label class="full" for="star3" title="Meh - 3 stars"></label>
                          <input id="star2" type="radio" name="rating" value="2">
                          <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                          <input id="star1" type="radio" name="rating" value="1">
                          <label class="full" for="star1" title="Bad - 1 star"></label>
                        </fieldset>
                      </div>
                    </div>
                    <div class="form-wrap offset-top-20">
                      <label class="form-label-outside text-light font-italic" for="name">Your Name: <span class='text-primary'>*</span></label>
                      <input class="form-input" id="name" type="text" name="name" data-constraints="@Required">
                    </div>
                    <div class="form-wrap">
                      <label class="form-label-outside text-light font-italic" for="email">Your E-mail: <span class=text-primary>*</span></label>
                      <input class="form-input" id="email" type="email" name="name" data-constraints="@Email @Required">
                    </div>
                    <div class="form-wrap offset-bottom-0">
                      <label class="form-label-outside text-light font-italic" for="message">Your Review: <span class='text-primary'>*</span></label>
                      <textarea class="form-input" id="message" name="message" data-constraints="@Required"></textarea>
                    </div>
                    <div class="form-wrap">
                      <button class="btn btn-primary offset-top-30" type="submit">Submit</button>
                    </div>
                  </form>
                </div>
              </div>-->
              <?php
                $userSess = $this->session->userdata('user_sess');
                if (!empty($userSess)):
                  $userId = $userSess['userId'];

                  $isProductPurchased = $this->db
                    ->select('a.*, b.user_id, c.product_name, c.slug, c.image_path')
                    ->join('orders as b', 'a.order_id = b.id')
                    ->join('product as c', 'a.product_id = c.id')
                    ->group_by('a.product_id')
                    ->get_where('order_item as a', array('product_id' => $prod->id, 'b.user_id' => $userId))->row();

                  if($isProductPurchased):

                  $isAddedReviewByCustomer = $this->Master_model->product_review_by_id($prod->id, $userId);

                  if (!empty($isAddedReviewByCustomer)):
                    $hashId = hash('SHA256', $isAddedReviewByCustomer->product_id);
              ?>
                <div class="form-wrap">
                  <a href="<?php echo base_url('customer/write-review/'.$hashId) ?>">
                    <button class="btn btn-primary offset-top-30" type="submit">Edit a review</button>
                  </a>
                </div>

              <?php else: ?>

                <div class="form-wrap">
                  <a href="<?php echo base_url('customer/write-review/'.$hashId) ?>">
                    <button class="btn btn-primary offset-top-30" type="submit">Write a review</button>
                  </a>
                </div>

              <?php endif; endif; endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if(!empty($similar)): ?>
    <div class="col-12">
      <h3 class="offset-top-30">Similar Products</h3>
      <hr class="divider divider-bold divider-base">
      <!-- Owl Carousel-->
      <div class="owl-carousel offset-top-30 related-product-slider" data-lg-items="4" data-md-items="3" data-sm-items="2" data-margin="30" data-dots="true" data-nav="false">
        <?php foreach ($similar as $simProd): ?>          
          <div class="product d-inline-block">
            <div class="product-media">
              <a href="<?php echo base_url($simProd->slug) ?>">
                <img class="img-responsive" alt="" src="<?php echo base_url($simProd->image_path) ?>" width="290" height="389">
              </a>
              <!--<div class="product-overlay">
                <a class="icon icon-circle icon-base fl-line-icon-set-shopping63" href="<?php //echo base_url('products/'.$simProd->slug) ?>"></a>
              </div>-->
              <?php if (!empty($simProd->product_tag)): ?>
                <div class="product-overlay-variant-2">
                  <a class="label label-default" href="<?php echo base_url('products/'.$simProd->slug) ?>">
                    <?php echo $simProd->product_tag; ?>
                  </a>
                </div>
              <?php endif ?>
               <div class="quick-view-btn">
                                        <a href="<?php echo base_url($simProd->slug) ?>" class="btn btn-default btn-block">Buy Now</a>
                                    </div>
            </div>
            <div class="offset-top-20">
              <p class="big"><a class="text-base" href="<?php echo base_url($simProd->slug) ?>"><?php echo $simProd->product_name; ?></a></p>
            </div>
            <?php 
              $mrp = $simProd->mrp;
              $sp  = $simProd->selling_price;

              if (!empty($sp) && $sp > 0) {
                if ($sp <= $mrp) {
                  echo '<div class="product-price font-weight-bold"><i class="fa fa-inr"></i> '.check_num($sp).'</div>';
                  echo ' <span class="font-default text-light text-muted text-strike small"><i class="fa fa-inr"></i> '.check_num($mrp).'</span>';
                }
              } else {
                echo '<div class="product-price font-weight-bold">₹ '.check_num($mrp).'</div>';
              }
            ?>
            <div class="product-actions elements-group-10">
              <a class="icon mdi mdi-heart-outline icon-gray icon-sm" href="<?php echo base_url($simProd->slug) ?>"></a>
              <a class="icon mdi mdi-signal icon-gray icon-sm" href="<?php echo base_url($simProd->slug) ?>"></a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
</div>
</section>

<section class="section-60 product-news-carousel">
    <div class="container">
        <h3>Image/carousel/video</h3>
        <hr class="divider divider-base divider-bold">
        <div class="owl-carousel offset-top-30" data-lg-items="1" data-md-items="1" data-sm-items="1" data-autoplay="6000" data-dots="false" data-nav="false">
            <div class="row">
                <div class="col-md-6 order-md-1 order-2 my-auto">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                    <p class="text-center"><button class="btn btn-primary">KNOW MORE</button></p>
                </div>
                <div class="col-md-6 order-md-2 order-1 mb-2">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/placeholder.png" class="img-fluid"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-1 order-2 my-auto">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                    <p class="text-center"><button class="btn btn-primary">KNOW MORE</button></p>
                </div>
                <div class="col-md-6 order-md-2 order-1 mb-2">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/placeholder.png" class="img-fluid"/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 order-md-1 order-2 my-auto">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                    <p class="text-center"><button class="btn btn-primary">KNOW MORE</button></p>
                </div>
                <div class="col-md-6 order-md-2 order-1 mb-2">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/placeholder.png" class="img-fluid"/>
                </div>
            </div>
        </div>
        
        <div class="owl-carousel offset-top-60" data-lg-items="1" data-md-items="1" data-sm-items="1" data-margin="30" data-autoplay="6000" data-dots="false" data-nav="false">
            <div class="row">
                <div class="col-md-6 mb-2">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/placeholder.png" class="img-fluid"/>
                </div>
                <div class="col-md-6 my-auto">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                    <p class="text-center"><button class="btn btn-primary">KNOW MORE</button></p>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/placeholder.png" class="img-fluid"/>
                </div>
                <div class="col-md-6 my-auto">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                    <p class="text-center"><button class="btn btn-primary">KNOW MORE</button></p>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-6 mb-2">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/placeholder.png" class="img-fluid"/>
                </div>
                <div class="col-md-6 my-auto">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                    <p class="text-center"><button class="btn btn-primary">KNOW MORE</button></p>
                </div>
                
            </div>
        </div>
    </div>
</section>

<section class="section-60 product-blog" id="why-mmtc">
  <div class="container">
    <h3>The MMTC-PAMP Promise</h3>
    <hr class="divider divider-base divider-bold">
    <div class="owl-mobile-dots owl-nav-md owl-nav-position-top owl-carousel offset-top-30" data-mouse-drag="false" data-autoplay="6000" data-lg-items="4" data-md-items="3" data-sm-items="2" data-margin="30" data-dots="true" data-nav="true">
      <div class="blog-post blog-post-grid">
        <div class="blog-post-media"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/blog_1.jpg">
            </div>
        <div class="blog-post-meta">
          <h5 class="blog-post-meta-title"> Customer First Philosophy</h5>
        </div>
        <p>Our products are manufactured of NIL-negative weight tolerance, assuring you will never receive less pure gold or silver than you pay for.</p>
      </div>
      <div class="blog-post blog-post-grid">
        <div class="blog-post-media"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/blog_2.jpg">
            </div>
        <div class="blog-post-meta">
          <h5 class="blog-post-meta-title">Global Standards. Indian Values</h5>
         
        </div>
        <p>Recognized by the London Bullion Market Association as a ‘Good Delivery’ gold and silver refiner.</p>
        
      </div>
      <div class="blog-post blog-post-grid">
        <div class="blog-post-media"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/blog_3.jpg"></div>
        <div class="blog-post-meta">
          <h5 class="blog-post-meta-title">Hassle-free Buyback</h5>
        </div>
        <p>We offer our customers the choice to sell their MMTC-PAMP pure gold purchases back to us through our pan-India network of retail centres that assure transparent and reliable purity verification services.</p>
       </div>
      
      <!-- <div class="blog-post blog-post-grid">
        <div class="blog-post-media"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/blog_4.jpg">
            </div>
        <div class="blog-post-meta">
          <h5 class="blog-post-meta-title">Commitment to Integrity</h5>
       
        </div>
        <p>All our products are completely traceable and arrive to you in flawless condition, fully secured within sealed and individually serial numbered assay packaging.</p>
      </div> -->
      
      <div class="blog-post blog-post-grid">
        <div class="blog-post-media"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/blog_5.jpg">
            </div>
        <div class="blog-post-meta">
          <h5 class="blog-post-meta-title">Sustainability</h5>
       
        </div>
        <p>Our manufacturing plant is a water-neutral facility, with state of- the-art, Swiss engineered equipment that greatly reduces our emissions and carbon footprint.</p>
      </div>
      
      <div class="blog-post blog-post-grid">
        <div class="blog-post-media"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/blog_6.jpg">
            </div>
        <div class="blog-post-meta">
          <h5 class="blog-post-meta-title">Commitment to Integrity</h5>
       
        </div>
        <p>All our products are completely traceable and arrive to you in flawless condition, fully secured within sealed and individually serial numbered assay packaging.</p>
      </div>
    </div>
  </div>
</section>

<section class="section-60">
    <div class="container">
        <?php if(!empty($similar)): ?>
    <div class="col-12">
      <h3 class="offset-top-30">Recommended Products</h3>
      <hr class="divider divider-bold divider-base">
      <!-- Owl Carousel-->
      <div class="owl-carousel offset-top-30 related-product-slider" data-lg-items="4" data-md-items="3" data-sm-items="2" data-margin="30" data-dots="true" data-nav="false">
        <?php foreach ($similar as $simProd): ?>          
          <div class="product d-inline-block">
            <div class="product-media">
              <a href="<?php echo base_url($simProd->slug) ?>">
                <img class="img-responsive" alt="" src="<?php echo base_url($simProd->image_path) ?>" width="290" height="389">
              </a>
              <!--<div class="product-overlay">
                <a class="icon icon-circle icon-base fl-line-icon-set-shopping63" href="<?php //echo base_url('products/'.$simProd->slug) ?>"></a>
              </div>-->
              <?php if (!empty($simProd->product_tag)): ?>
                <div class="product-overlay-variant-2">
                  <a class="label label-default" href="<?php echo base_url('products/'.$simProd->slug) ?>">
                    <?php echo $simProd->product_tag; ?>
                  </a>
                </div>
              <?php endif ?>
               <div class="quick-view-btn">
                                        <a href="<?php echo base_url($simProd->slug) ?>" class="btn btn-default btn-block">Buy Now</a>
                                    </div>
            </div>
            <div class="offset-top-20">
              <p class="big"><a class="text-base" href="<?php echo base_url($simProd->slug) ?>"><?php echo $simProd->product_name; ?></a></p>
            </div>
            <?php 
              $mrp = $simProd->mrp;
              $sp  = $simProd->selling_price;

              if (!empty($sp) && $sp > 0) {
                if ($sp <= $mrp) {
                  echo '<div class="product-price font-weight-bold"><i class="fa fa-inr"></i> '.check_num($sp).'</div>';
                  echo ' <span class="font-default text-light text-muted text-strike small"><i class="fa fa-inr"></i> '.check_num($mrp).'</span>';
                }
              } else {
                echo '<div class="product-price font-weight-bold">₹ '.check_num($mrp).'</div>';
              }
            ?>
            <div class="product-actions elements-group-10">
              <a class="icon mdi mdi-heart-outline icon-gray icon-sm" href="<?php echo base_url($simProd->slug) ?>"></a>
              <a class="icon mdi mdi-signal icon-gray icon-sm" href="<?php echo base_url($simProd->slug) ?>"></a>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <?php endif; ?>
    </div>
</section>