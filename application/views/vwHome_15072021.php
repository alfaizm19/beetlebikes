<?php if (!empty($banners)): ?>
<!-- Banner Start -->
<section class="swiper-container swiper-slider home-slider" data-slide-effect="fade" data-min-height="430px" data-autoplay="6000">

<div class="slide-mobile-overlay swiper-wrapper">

  <?php 
    foreach ($banners as $banner):
      $displayDate = $banner->display_date;
      $displayTime = $banner->display_time;
      $endDisplayTime = $banner->end_time;

      $currentDate = strtotime(date('Y-m-d'));
      $currentTime = strtotime(date('H:i:s'));

      $isVisible = true;

      if ( (empty($displayTime) && empty($endDisplayTime)) 
            && !empty($displayDate) ) {
        
        if (strtotime($displayDate) > $currentDate) {
          $isVisible = false;
        } else {
          $isVisible = true;
        }

      } elseif ( (!empty($displayDate) && !empty($displayTime)) && empty($endDisplayTime) ) {

        $difference = ($currentTime - strtotime($displayTime))/60;
        
        if (strtotime($displayDate) > $currentDate) {
          $isVisible = false;
        } else {

          if(strtotime($displayDate) == $currentDate) {
            if (round($difference) > 0) {
              $isVisible = true;
            } else {
              $isVisible = false;
            }
          }

        }

      } elseif ( (!empty($displayDate) && !empty($endDisplayTime)) && empty($displayTime) ) {
        
        $difference = (strtotime($endDisplayTime) - $currentTime)/60;
        
        if (strtotime($displayDate) > $currentDate) {
          $isVisible = false;
        } else {
          if(strtotime($displayDate) == $currentDate) {
            if (round($difference) > 0) {
              $isVisible = true;
            } else {
              $isVisible = false;
            }
          }

        }
      }
  ?>

    <?php 

      if($isVisible):

        if ($banner->banner_type == 'image'):
    ?>

      <div class="slide-mobile-overlay swiper-slide" data-slide-bg="<?php echo base_url($banner->banner_image) ?>" style="background-position:center;">

        <div class="swiper-slide-caption">
          <div class="container text-md-left">
            <div class="row justify-content">
              <div class="col-md-7 col-md-offset-6 col-lg-5 col-lg-offset-7">

                  <?php if (!empty($banner->heading)): ?>
                    <hr class="divider divider-primary divider-sm-left divider-bold" data-caption-animate="fadeInLeft">
                    <h1 class="offset-top-30" data-caption-delay="100" data-caption-animate="fadeInUp">
                      <?php echo $banner->heading ?>
                    </h1>
                  <?php endif ?>

                  <?php if (!empty($banner->content)): ?>
                    <h2 data-caption-delay="600" data-caption-animate="fadeInUp">
                      <?php echo $banner->content ?>
                    </h2>
                  <?php endif ?>

                  <?php 
                    if (!empty($banner->button_name)):
                  ?>
                    <a class="offset-top-45 btn btn-primary" href="<?php echo $banner->button_link? $banner->button_link:'#'; ?>" data-caption-delay="900" data-caption-animate="fadeInUp">
                      <?php echo $banner->button_name ?>
                    </a>
                  <?php endif ?>
                </div>
              </div>
          </div>
        </div>

      </div>

    <?php else: ?>
        
      <div class="swiper-slide">
        <iframe width="100%" height="670px" src="https://www.youtube.com/embed/lqj-QNYsZFk?controls=1"></iframe>
      </div> 

    <?php endif; endif; ?>
    
  <?php endforeach; ?>  

</div>

  <?php if (count($banners) > 1): ?>
    <!-- Swiper Navigation-->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    <!-- Swiper Pagination-->
    <div class="swiper-pagination"></div>
  <?php endif ?>
</section>
<!-- Banner End -->
<?php endif ?>

<?php if (!empty($catLv1)): ?>
<section class="offset-top-45 section_banners-countdown hide">
  <div class="container">
    <div class="row full_w_row">
      <?php foreach ($catLv1 as $cat): ?>
      	<div class="col-xs-12 col-sm-4 banner_item item_small border-unset mb-2">
      		<div class="banner_wrap cursorPointer hoverZoom" onclick="window.location='<?php echo base_url($cat->slug) ?>'">
      			<div class="banner_image img_placeholder__wrap " style="background-image: url(<?php echo base_url($cat->category_image) ?>);"></div>
      			<div class="banner_caption align_left text_align_left ">
      				<div class="banner_text">
      					<div class="banner_title">
                  <p>
                    <strong>
                      <?php //echo $cat->category ?>
                    </strong>
                  </p>
                </div>
      					<!--<a class="btn banner_btn" href="<?php echo base_url($cat->slug) ?>">Shop Now</a>-->
      				</div>
      			</div>
      		</div>
      	</div>
      <?php endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>


<section class="offset-top-45 section_banners">
  <div class="container">
      <h3>A 100% Secure Marketplace for your Gold & Silver Needs</h3>
            <hr class="divider divider-base divider-bold">
    <div class="row full_w_row">
       
      <div class="col-sm-6 banner_big_50 mb-2 cursorPointer" onclick="window.location='<?php echo base_url('gold') ?>'">
        
        	<img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/img1.jpg" class="img-fluid" />
        <!--<a href="<?php// echo base_url('gold') ?>">	<div class="banner_item">
        		<div class="img_placeholder__wrap img_placeholder__medium" style="background-image: url( <? //echo HTTP_ASSETS_PATH_CLIENT; ?>/images/img1.jpg);"></div>
        		<!-- <div class="banner_caption position_bottom style_none">  
        			<div class="caption_text">
        				<h3>New Collection</h3>
        				<a class="btn banner_btn" href="/collections/gold">shop now</a>
        			</div>
        		</div> -->
        	<!--</div>
        </a>-->
      </div>
      <div class="col-sm-6 banner_big_50 mb-2 cursorPointer" onclick="window.location='<?php echo base_url('collectible') ?>'">
            <div class="row ">
                <div class="col-12 mb-3">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/img2.jpg" class="img-fluid"/>
                </div>
                <div class="col-12">
                    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/img3.jpg" class="img-fluid"/>
                </div>
            </div>
            
            
        	<!--<div class="banner_item">
        		<div class="img_placeholder__wrap img_placeholder__medium" style="background-image: url( <? //echo HTTP_ASSETS_PATH_CLIENT; ?>/images/img2.jpg );"></div>
          		<!-- <div class="banner_caption position_bottom style_none">  
          			<div class="caption_text">
          				<h3>New Collection</h3>
          				<a class="btn banner_btn" href="/collections/gold">shop now</a>
          			</div>
          		</div> -->
        	<!--</div>
        </a>-->
        
      </div>
    </div>
  </div>
</section>

<?php if (!empty($catLv2)): ?>
<section class="section-top-60 mb-4">
  <div class="container">
    <h3>Browse Our Categories</h3>
    <hr class="divider divider-base divider-bold">
    <div class="row offset-top-30">
      <?php 
        $i = 1; 
          foreach ($catLv2 as $subCat):
            $class = "offset-top-30 offset-xs-top-0 ";
            if($i == 1) {
              $class = "";
            }
      ?>
        <div class="<?php echo $class ?>col-lg-3 col-sm-6">
          <a class="thumbnail-variant-1" href="<?php echo base_url($subCat->parent_slug.'/'.$subCat->slug) ?>">
            <img class="img-responsive" alt="" 
            src="<?php echo base_url($subCat->category_image) ?>" width="270" height="363">
            <div class="caption">
              <h5 class="caption-title">
                <?php echo $subCat->category ?>
              </h5>
              <p class="caption-descr"><?php echo $subCat->count ?> products</p>
            </div>
          </a>
        </div>
      <?php $i++; endforeach ?>
    </div>
  </div>
</section>
<?php endif ?>

<?php if (!empty($products)): ?>
  
<section class="section-top-60">
   <div class="container">
    <h3>Popular Products</h3>
    <hr class="divider divider-base divider-bold">
    <div class="row">
      <?php 
        foreach ($products as $product):
          $mrp = $product->mrp;
          $sp = $product->selling_price;

          $displayDate = $product->available_date;
          $displayTime = $product->available_time;

          $currentDate = strtotime(date('Y-m-d'));
          $currentTime = strtotime(date('H:i:s'));

          $isVisible = true;

          if ( (empty($displayTime)) 
                && !empty($displayDate) ) {
            
            if (strtotime($displayDate) > $currentDate) {
              $isVisible = false;
            } else {
              $isVisible = true;
            }

          } elseif ( (!empty($displayDate) && !empty($displayTime)) ) {

            $difference = ($currentTime - strtotime($displayTime))/60;
            
            if (strtotime($displayDate) > $currentDate) {
              $isVisible = false;
            } else {

              if(strtotime($displayDate) == $currentDate) {

                if (round($difference) > 0) {
                  $isVisible = true;
                } else {
                  $isVisible = false;
                }

              }

            }

          }

          if($isVisible):
      ?>
        <div class="col-md-4">
          <div class="product d-inline-block">
            <div class="product-media">
              <a href="<?php echo base_url('products/'.$product->slug) ?>">
                <img class="img-responsive" alt="" src="<?php echo base_url($product->image_path) ?>">
              </a>
              <div class="product-overlay">
                <a class="icon icon-circle icon-base fl-line-icon-set-shopping63" href="<?php echo base_url('products/'.$product->slug) ?>"></a>
              </div>
              <?php if (!empty($product->product_tag)): ?>
              <div class="product-overlay-variant-2">
                <a class="label label-default" href="<?php echo base_url('products/'.$product->slug) ?>"><?php echo $product->product_tag; ?></a>
              </div>
              <?php endif ?>
              <div class="quick-view-btn">
                <button class="btn btn-default btn-block">Quick View</button>
            </div>
            </div>
            <div class="offset-top-10">
              <p class="big">
                <a class="text-base" href="<?php echo base_url('products/'.$product->slug) ?>">
                  <?php echo $product->product_name ?>
                </a>
              </p>
            </div>
            <div class="product-price font-weight-bold">
              <?php 
                if (!empty($sp) && $sp > 0) {
                  if ($sp <= $mrp) {
                    echo check_num($sp);
                    echo ' <span class="font-default text-light text-muted text-strike small">₹ '.check_num($mrp).'</span>';
                  }
                } else {
                  echo '₹ '.check_num($mrp);
                }
              ?>
            </div>
            <div class="product-rating">
              <div><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star text-gray-light"></span></div>
            </div>
           
              <div class="product-actions elements-group-10">
                <a class="icon mdi mdi-heart-outline icon-gray icon-sm" href="#"></a>
                <a class="icon mdi mdi-signal icon-gray icon-sm" href="#"></a>
              </div>
              
             
          </div>
        </div>
      <?php endif; endforeach; ?>
    </div>
</section>

<?php endif ?>
<section class="section-top-60" id="why-mmtc">
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

<section class="section-top-60">
        <div class="container">
          <h3>Our Blog</h3>
          <hr class="divider divider-base divider-bold">
          <div class="owl-mobile-dots owl-nav-md owl-nav-position-top owl-carousel offset-top-30" data-mouse-drag="false" data-autoplay="4000" data-lg-items="3" data-md-items="2" data-sm-items="2" data-margin="30" data-dots="true" data-nav="true">
            <div class="blog-post blog-post-grid">
              <div class="blog-post-media"><a href="single-blog-post.html"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/index-17.jpg">
                  <div class="blog-post-caption">
                    <div class="blog-post-meta-date"><span class='blog-post-meta-date-big reveal-block'>25</span> APR</div>
                  </div></a></div>
              <div class="blog-post-meta">
                <h5 class="blog-post-meta-title"><a class="text-base" href="single-blog-post.html"> Enhancing Your Jewelry Collection</a></h5>
                <p><i>Posted by</i> <a href='blog-list.html'>Shane Doe</a>  &#8226;  <a href='single-blog-post.html#comments'>25 Comments</a></p>
              </div>
              <p>Finding the very best jewelry information is not always the easiest thing to do. There is so much information available, sifting through irrelevant information becomes time consuming, not to mention discouraging. Luckily, the best jewelry tips available anywhere, are right here in this article...</p>
              <div><a class="btn btn-link" href="single-blog-post.html"><span class="btn-text">read more</span></a></div>
            </div>
            <div class="blog-post blog-post-grid">
              <div class="blog-post-media"><a href="single-blog-post.html"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/index-18.jpg">
                  <div class="blog-post-caption">
                    <div class="blog-post-meta-date"><span class='blog-post-meta-date-big reveal-block'>26</span> APR</div>
                  </div></a></div>
              <div class="blog-post-meta">
                <h5 class="blog-post-meta-title"><a class="text-base" href="single-blog-post.html">Wearing Jewelry According to Fashion</a></h5>
                <p><i>Posted by</i> <a href='blog-list.html'>Shane Doe</a>  &#8226;  <a href='single-blog-post.html#comments'>25 Comments</a></p>
              </div>
              <p>There is nothing that brings a smile to our face like a pretty ring, a jangly necklace, or some sparkly earrings. Big or small, real or fake, understated or over-the-top, jewelry lifts the spirits. It also lifts a look. Colorful beads or chandelier earrings could be just the thing to make an...</p>
              <div><a class="btn btn-link" href="single-blog-post.html"><span class="btn-text">read more</span></a></div>
            </div>
            <div class="blog-post blog-post-grid">
              <div class="blog-post-media"><a href="single-blog-post.html"><img class="img-responsive" width="1170" height="854" alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/index-19.jpg">
                  <div class="blog-post-caption">
                    <div class="blog-post-meta-date"><span class='blog-post-meta-date-big reveal-block'>26</span> APR</div>
                  </div></a></div>
              <div class="blog-post-meta">
                <h5 class="blog-post-meta-title"><a class="text-base" href="single-blog-post.html">Choosing Wedding Jewelry: Top 5 Rules</a></h5>
                <p><i>Posted by</i> <a href='blog-list.html'>Shane Doe</a>  &#8226;  <a href='single-blog-post.html#comments'>25 Comments</a></p>
              </div>
              <p>When it comes to style, we’re all for breaking the so-called “rules.” But that doesn’t mean there aren’t still tried-and-true tips to help you look your best, including for your wedding day jewelry. So if you need a little guidance when it comes to accessorizing your gown, read this article with...</p>
              <div><a class="btn btn-link" href="single-blog-post.html"><span class="btn-text">read more</span></a></div>
            </div>
          </div>
        </div>
      </section>
<!---<section class="offset-top-45 section_banners">
<div class="container">
<div class="row full_w_row">
<div class="col-sm-9 banner_big_75">
	<div class="banner_item">
		<div class="img_placeholder__wrap img_placeholder__medium" style="background-image: url( //cdn.shopify.com/s/files/1/0240/2910/2160/files/img-3_32f6165c-7ea0-455b-86eb-b613ad9ed3a6_1485x700_crop_center.png?v=1565080841 );"></div>
		<div class="banner_caption position_left style_none">  
			<div class="caption_text">
				<div>
						<h3>Underline</h3>
						<p class="banner_text">YOUR PERSONALITY</p>
				</div>
				<a class="btn banner_btn" href="/collections/gold">shop now</a>
				
			</div>
		</div>
	</div>
</div>
<div class="col-sm-3 banner_two_small_25">
	<div class="banner_item">
		<div class="bammer_item_1">
				<div class="img_placeholder__wrap img_placeholder__medium" style="background-image: url( //cdn.shopify.com/s/files/1/0240/2910/2160/files/img-4_4f963973-09e7-4240-b0c6-44dd214b215e_475x335_crop_center.png?v=1565080888 );"></div>
				<a class="banner_caption banner_link" href="/collections/emerald">
				<div class="caption_ind">
					<div class="caption_text">
							<h4><span>Sale</span>  50% off</h4>
					</div>
				</div>	
				</a>
		</div>

		<div class="bammer_item_2">
			<div class="img_placeholder__wrap img_placeholder__medium" style="background-image: url( //cdn.shopify.com/s/files/1/0240/2910/2160/files/img-5_2e041314-9002-459c-9eee-f300c2fba2a2_475x335_crop_center.png?v=1565080896 );"></div>
			<div class="banner_caption">
				<div class="caption_ind">
					<div class="caption_text">
							<h4><span>LET YOU</span>Sparkle</h4>
							<a class="btn banner_btn" href="/products/earl-necklace">shop now</a>
					</div>
				</div>	
			</div>
			
		</div>
	</div>
</div>
</div>

</div>

</section>-->
