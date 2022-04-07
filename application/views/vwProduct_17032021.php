<div class="main_content">
   <div class="product_detail_page">
      <div class="bread_blk">
         <div class="container">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url() ?>">Home</a></li>
                  <!-- <li class="breadcrumb-item"><a href="#">New Arrivals</a></li> -->
                  <li class="breadcrumb-item active" aria-current="page">
                     <?php echo $prod->product_name ?>
                  </li>
               </ol>
            </nav>
         </div>
      </div>

      <div class="product_details">
         <div class="container">
            <div class="row">
               <div class="col-md-6 pro_left">
                  <div class="d-flex align-items-start">
                     <?php if (!empty($images)): ?>
                        <div class="slider slider-for slick-slider">
                          <div class="slick_cont"><img src="<?php echo base_url($prod->image_path) ?>"></div>
                          <div class="slick_cont"><img src="<?php echo base_url($prod->roll_image) ?>"></div>
                          <?php $i=1; foreach ($images as $img): ?>
                          <div class="slick_cont"><img src="<?php echo base_url($img->image_path) ?>"></div>
                          <?php $i++; endforeach ?>
                        </div>
                        <div class="slider slider-nav slick-slider">
                          <div class="slick_cont"><img src="<?php echo base_url($prod->image_path) ?>"></div>
                          <div class="slick_cont"><img src="<?php echo base_url($prod->roll_image) ?>"></div>
                          <?php $i=1; foreach ($images as $img): ?>
                          <div class="slick_cont"><img src="<?php echo base_url($img->image_path) ?>"></div>
                          <?php $i++; endforeach ?>
                        </div>
                      <?php endif ?>
                  </div>
               </div>
               <div class="col-md-6 pro_ryt">
                  <div class="row pro_title align-items-end">
                     <div class="col-md-9">
                        <h2><?php echo $prod->product_name ?></h2>
                        <?php 
                           $curr = get_currency();

                           $price = $prod->price_usd;

                           if ($curr == 'AED') {
                              $price = $prod->price_aed;
                           }
                        ?>
                        <h3><?php echo $curr; ?> <?php echo $price ?></h3>
                     </div>
                     <div class="col-md-3 pro_war_img">
                        <?php if (!empty($prod->warranty)): ?>
                        <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/image_1.svg">
                        <?php endif ?>
                     </div>
                  </div>
                  <div class="row reviwe_blk align-items-center">
                     <div class="col-md-6 reviwe_blk_left d-flex align-items-center">
                        <?php 
                           if (!empty($ratingAnalysis)):
                              $avRat = $ratingAnalysis['average'];
                        ?>
                        <ul class="d-flex" style="list-style: none;">
                           <?php

                              for($star=1; $star<=5; $star++){
                               if ($star == 1) {
                                 if ($avRat < 1) {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star_half.svg"></div>';
                                 } else{
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/fa_star.svg"></div>';
                                 }
                               }

                               if ($star == 2) {
                                 if ($avRat < 2 AND $avRat > 1) {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star_half.svg"></div>';
                                 } elseif($avRat > 1.99){
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/fa_star.svg"></div>';
                                 } else {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star.svg"></div>';
                                 }
                               }

                               if ($star == 3) {
                                 if ($avRat < 3 AND $avRat > 2) {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star_half.svg"></div>';
                                 } elseif($avRat > 2.99){
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/fa_star.svg"></div>';
                                 } else {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star.svg"></div>';
                                 }
                               }

                               if ($star == 4) {
                                 if ($avRat < 4 AND $avRat > 3) {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star_half.svg"></div>';
                                 } elseif($avRat > 3.99){
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/fa_star.svg"></div>';
                                 } else {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star.svg"></div>';
                                 }
                               }

                               if ($star == 5) {
                                 if ($avRat < 5 AND $avRat > 4) {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star_half.svg"></div>';
                                 } elseif($avRat > 4.99){
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/fa_star.svg"></div>';
                                 } else {
                                   echo '<div class="mr-2"><img src="'.HTTP_ASSETS_PATH_CLIENT.'/images/star.svg"></div>';
                                 }
                               }
                             }

                           ?>
                           <!-- <div class="mr-2">
                              <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/fa_star.svg">
                           </div>
                           <div class="mr-2">
                              <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star_half.svg">
                           </div>
                           <div class="">
                              <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                           </div>
                           <div class="">
                              <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                           </div>
                           <div class="">
                              <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                           </div> -->
                        </ul>
                        <span><? echo $ratingAnalysis['average'] ?> Reviews</span>
                        <?php endif ?>
                     </div>
                     <div class="col-md-6 reviwe_blk_ryt">
                        <?php if (!empty($prod->shipping)): ?>
                           <p>Ships in 24 Hours</p>   
                        <?php else: ?>
                           <p>Ships in 5-7 Business Days</p>
                        <?php endif ?>
                     </div>
                  </div>
                  <div class="pro_cont">
                     <?php echo $prod->description; //substr($prod->description, 0, 200); ?>
                  </div>

                  <?php 
                     if (!empty($prod->colors)):
                        $colors = explode(',', $prod->colors);
                        $colors = array_filter($colors);
                  ?>
                     
                     <div class="clr_blk">
                        <h4>OTHER COLORS :</h4>
                        <ul>
                           <?php foreach ($colors as $color): ?>
                              <li><?php echo ucwords(strtolower($color)) ?></li>   
                           <?php endforeach ?>
                        </ul>
                     </div>

                  <?php endif ?>

                  <?php if (empty($images)): ?>
                  <div class="modal fade modal-common" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                     <div class="modal-content">
                       <div class="modal-body text-center">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         <img src="<?php echo base_url($prod->image_path) ?>">
                       </div>
                     </div>
                    </div>
                    </div>

                    <?php else: ?>

                    <div class="modal fade modal-common" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl">
                       <div class="modal-content">
                         <div class="modal-body text-center">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                              <div class="carousel-inner">

                                <div class="carousel-item active">
                                     <img src="<?php echo base_url($prod->image_path) ?>">
                                </div>

                                <div class="carousel-item">
                                     <img src="<?php echo base_url($prod->roll_image) ?>">
                                </div>

                                <?php $t=1; foreach ($images as $img): ?>
                                <div class="carousel-item">
                                     <img src="<?php echo base_url($img->image_path) ?>">
                                </div>
                                <?php $t++; endforeach ?>
                              </div>
                               <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                               </button>
                               <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"  data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                               </button>           
                            </div>
                         </div>
                       </div>
                      </div>
                    </div>

                  <?php endif; ?>

                  <div class="d-flex add_cart_blk">
                     <div class="view_blk com_a" data-bs-toggle="modal" data-bs-target="#<?= !empty($images)? 'exampleModal1':'exampleModal'; ?>">
                        <a href="#"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/image_3.svg"></a>
                     </div>
                     <div class="qua_blk">
                        <div class="product-quantity">
                          <?php
                            $cartStock = get_cart_stock($prod->id);
                            if (!$cartStock) {
                              $cartStock = 1;
                            }
                          ?>
                           <input class="input<?= $prod->id ?>" data-min="<?= $cartStock ?>" data-max="<?= $prod->stock ?>" type="text" name="quantity" value="<?= $cartStock ?>" readonly="true">
                           <div class="quantity-selectors-container">
                              <div class="quantity-selectors">
                                 
                                 <button type="button" class="increment-quantity" aria-label="Add one" data-direction="1" data-cartstock="<?= $cartStock ?>" data-stock="<?= $prod->stock ?>"
                                 data-pid="<?= $prod->id ?>"><i class="fa fa-angle-up"></i></button>

                                 <button type="button" class="decrement-quantity" aria-label="Subtract one" data-direction="-1" data-cartstock="<?= $cartStock ?>"
                                 data-pid="<?= $prod->id ?>" data-stock="<?= $prod->stock ?>" <?= $cartStock? '':'disabled="disabled"' ?> ><i class="fa fa-angle-down"></i></button>

                              </div>
                           </div>
                        </div>
                    </div>
                     <div class="add_cart_blk">
                        <button class="prod<?= $prod->id ?> btn_bg" id="prod<?= $prod->id ?>" data-id="<?= $prod->id ?>" data-stock="<?= $prod->stock ?>" data-cart="<?= get_cart_stock($prod->id) ?>" onclick="addToCart2('prod<?= $prod->id ?>')">Add to cart</button>
                     </div>
                     <div class="com_a wish_list_blk">
                        <a class="prodDetail<?= $prod->id ?>" id="prodDetail<?= $prod->id ?>" data-id="<?= $prod->id ?>" data-currenturl="<?= current_url() ?>" onclick="wishlist_product_detail('prodDetail<?= $prod->id ?>')" href="javascript:void(0)">
                          <?php echo $this->Master_model->wishlist_icon2($prod->id); ?>
                        </a>
                     </div>
                  </div>
                  <div class="sku_blk">
                    <p><span>SKU:</span> <?php echo $prod->sku_code ?></p>
                    <!-- <?php if (!empty($prod->extra_color)): ?>
                    <p><span>Color:</span> <?php echo $prod->extra_color ?></p>
                    <?php endif ?> -->
                  </div>
               </div>
            </div>
            <div class="soc_blk text-center">
               <ul class="d-flex">
                  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url() ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/icon_1.svg"></a></li>
                  <li><a href="https://twitter.com/intent/tweet?url=<?php echo current_url() ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/icon_2.svg"></a></li>
                  <li><a href="mailto:?subject=Check this <?php echo current_url() ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/icon_3.svg"></a></li>
                  <li><a href="https://www.pinterest.com/pin/create/button/?url=<?php echo current_url() ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/icon_4.svg"></a></li>
               </ul>
            </div>
            <div class="new_tab_blk">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <a class="nav-link active" id="des-tab" data-bs-toggle="tab" href="#des" role="tab" aria-controls="des" aria-selected="true">DESCRIPTION</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="info-tab" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">MORE INFORMATION</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="review-tab" data-bs-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                  </li>
                  <li class="nav-item" role="presentation">
                     <a class="nav-link" id="care-tab" data-bs-toggle="tab" href="#care" role="tab" aria-controls="care" aria-selected="false">Care Instructions</a>
                  </li>
               </ul>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="des" role="tabpanel" aria-labelledby="des-tab">
                     <div class="desc_blk text-center">
                        <?php echo $prod->description ?>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                     <div class="info_blk">
                        <div class="table-responsive">
                           <table class="table">
                              <tbody>
                                 <tr>
                                    <td>Shipping Information</td>
                                    <?php if (!empty($prod->shipping)): ?>
                                       <td>Ships in 24 Hours</td>
                                    <?php else: ?>
                                       <td>Ships in 5-7 Business Days</td>
                                    <?php endif ?>
                                 </tr>
                                 <?php 
                                    if (!empty($prod->material)):
                                       $mat = explode(',', $prod->material);
                                       $mat = array_filter($mat);
                                       $matData = '';
                                       foreach($mat as $m){
                                          $matData .= $this->Master_model->get_mat_name_by_id($m).', ';
                                       }
                                 ?>
                                 <tr>
                                    <td>Material Used</td>
                                    <td><? echo rtrim($matData, ', '); ?></td>
                                 </tr>
                                 <?php endif ?>
                                 <tr>
                                    <td>Size</td>
                                    <td><?php echo $prod->size ?></td>
                                 </tr>
                                 <?php if (!empty($prod->extra_color)): ?>
                                   <tr>
                                    <td>Color</td>
                                      <td><?php echo $prod->extra_color ?></td>
                                   </tr>
                                 <?php endif ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                 </div>
                  <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                     <div class="review_blk">
                        <div class="rev_bor">
                           <div class="d-flex rev_blk justify-content-between">
                              <p><? echo !empty($reviews)? count($reviews):0 ?> Reviews Available</p>
                              <a href="#" class="text-right">Write a Review</a>
                           </div>
                           <?php 
                              if (!empty($reviews)):
                                 foreach($reviews as $rev):
                           ?>
                           <div class="rev_cont">
                              <h3><? echo $rev->customer_name ?></h3>
                              <h4><? echo $rev->title ?></h4>
                              <p><?php echo $rev->review ?></p>
                              <a href="#" data-bs-toggle="modal" data-bs-target="#viewPhoto<?= $rev->id ?>">View Photo <i class="fa fa-eye" aria-hidden="true"></i></a> 
                           </div>

                          <div class="modal fade modal-common" id="viewPhoto<?= $rev->id ?>" tabindex="-1" aria-labelledby="viewPhotoLabel<?= $rev->id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                             <div class="modal-content">
                               <div class="modal-body text-center">
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 <img src="<?php echo base_url($rev->profile_picture) ?>">
                               </div>
                             </div>
                            </div>
                          </div>

                          <?php endforeach; endif; ?>
                           <!-- <div class="read_more">
                              <a href="#">Read More Reviews</a>
                           </div> -->
                           <form id="productRatingForm" method="post" enctype="multipart/form-data">
                              <?php 
                                $userSess = $this->session->userdata('user_sess');

                                if (empty($userSess)):
                              ?>
                              <div class="form-group">
                                 <label>Name <sup>*</sup></label>
                                 <input type="text" name="name" class="form-control nameRevErr removeRev-err">
                              </div>
                              <div class="form-group">
                                 <label>Email <sup>*</sup></label>
                                 <input type="text" name="email" class="form-control emailRevErr removeRev-err">
                              </div>
                              <?php endif; ?>
                              <div class="form-group">
                                 <label>Review Title <sup>*</sup></label>
                                 <input type="text" name="title" class="form-control titleRevErr removeRev-err">
                              </div>
                              <div class="form-group">
                                 <label>Body of Review (1500) <sup>*</sup></label>
                                 <textarea maxlength="1500" name="review" class="form-control reviewRevErr removeRev-err"></textarea>
                              </div>
                              <div class="form-group product_attach">
                                 <label>Attachment (Share your Product Picture)*</label>

                                <div class="file_upload_attach form-control p-0">
                                <div class="file-upload-wrapper productPicRevErr removeRev-err" data-text="">
                                  <input name="productPic" type="file" class="file-upload-field form-control productPicRevErr removeRev-err">
                                </div>
                                </div> 
                              </div>
                              <div class="form-group">
                                 <label>Ratings <sup>*</sup></label>
                                  <ul class="d-flex star_blk ratingRevErr removeRev-err">
                                   <div id="rating1" class="mr-2 click-rating" data-rating="1">
                                      <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                                   </div>
                                   <div id="rating2" class="mr-2 click-rating" data-rating="2">
                                      <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                                   </div>
                                   <div id="rating3" class="mr-2 click-rating" data-rating="3">
                                      <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                                   </div>
                                   <div id="rating4" class="mr-2 click-rating" data-rating="4">
                                      <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                                   </div>
                                   <div id="rating5" class="mr-2 click-rating" data-rating="5">
                                      <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/star.svg">
                                   </div>
                                  </ul>
                          <div class="captcha_blk">
                            <div class="form-group">
                              <div class="g-recaptcha g-recaptcha-responseRevErr removeRev-err" data-sitekey="<?php echo captcha_site_key ?>"></div>
                            </div>
                          </div>
                          <div class="add_cart_blks">
                            <input id="rating" type="hidden" name="rating" value="0">
                            <input id="productId" type="hidden" name="productId" value="<?php echo $prod->id ?>">
                            <button id="btnProdRev" type="submit" class="btn_bg">SUBMIT REVIEW</button>
                          </div>
                        </div>
                          <div id="resetFinalRatingError"></div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade show" id="care" role="tabpanel" aria-labelledby="care-tab">
                     <div class="care_blk">
                        <?php echo $prod->care_instructions ?>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <?php if (!empty($similar)): ?>
      <div class="product_carousel">
         <div class="container">
            <h4 class="head-title mb-0 text-center">Similar Products</h4>
            <p class="text-center"> </p>
            <div class="owl-carousel owl-theme">
               <?php 
                  foreach ($similar as $sim):
                     $curr = get_currency();
                     if ($curr == 'AED') {
                        $price = $sim->price_aed;
                     } else {
                        $price = $sim->price_usd;
                     }
               ?>
                <div class="item">
                  <div class="owl_image">

                     <?php if ($sim->celeb_style): ?>
                        <p class="celeb_card">celeb style</p>
                     <?php endif ?>

                     <img src="<?php echo base_url($sim->image_path) ?>" class="product_normal">
                     
                     <?php if (!empty($sim->roll_image)): ?>
                        <img src="<?php echo base_url($sim->roll_image) ?>" class="product_normal_hover">
                     <?php endif ?>

                     <?php if (!$sim->stock): ?>
                        <p><span>Sold out</span></p>
                     <?php endif ?>

                     <div class="owl_hover">
                        <a href=""><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/icon-heart.svg"></a>
                        <a href="<?php echo base_url('products/'.$sim->slug); ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/icon-eye.svg"></a>
                     </div>
                     <div class="addtocart">
                        <button>Add to cart</button>
                     </div>                  
                  </div>
                  <h5><?php echo $sim->product_name ?></h5>
                  <p><?php echo $curr ?> <?php echo $price ?></p>
                </div>
                <?php endforeach ?>
            </div>
         </div>
      </div>
      <?php endif ?>
   </div>
</div>