<div class="page-content bg-white stay_cation brd_crumb">
<div class="top-banner-bg"></div>
<div class="breadcrumb-strap">
<div class="container-lg">
<div class="row justify-content-between">
<div class="col-md-auto align-self-center">
<h1 class="page-title">Staycations</h1>
</div>
<div class="col-md-auto align-self-center">
<div class="breadcrumb-row">
<ul class="list-inline">
<li><a href="<?php echo base_url() ?>">Home</a></li>
<li>Staycations</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- contact area -->
<div class="content-block">
<div class="section-full bg-white content-inner home-tabs staycations">
<div class="container-lg">
<div class="row">
<div class="col-lg-12">
<div class="clearfix text-center">
<h4 class="text-uppercase font-weight-700 font-14 dlab-dotted m-b0 text-gray-dark">Trending Offers</h4>
<h2 class="font-weight-600 font-36">Most Popular Staycations</h2>
</div>
<div class="section-content p-b0">
<div class="row">
  <div class="col-lg-12">
    <div class="dlab-tabs">
			<div class="tabmob_scrl">
      <ul class="nav nav-tabs justify-center m-b30">
        <li><a data-toggle="tab" href="#all" class="active"><span class="title-head">All</span></a></li>
        <?php 
          if (!empty($emirates)):
            foreach($emirates as $emirate):
        ?>
        <li><a data-toggle="tab" href="#<?php echo url_title(strtolower($emirate->emirates), 'dash', true); ?>"><span class="title-head"><?php echo $emirate->emirates ?></span></a></li>
        <?php endforeach; endif; ?>
      </ul>
			</div>	
      <div class="tab-content">
        <div id="all" class="tab-pane active">
          <div class="row">
            <?php 
              if (!empty($staycations)):
                foreach($staycations as $stay):

                  $curr = get_currency();

                  if ($curr == 'AED') {
                    $price = $stay->aed;
                    $discount = 0;
                    if ($stay->discount > 0) {
                      $discount = ($stay->aed * $stay->discount)/100;
                    }
                  } else {
                    $price = $stay->usd;
                    $discount = 0;
                    if ($stay->discount > 0) {
                      $discount = ($stay->usd * $stay->discount)/100;
                    }
                  }
            ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="blog-post blog-md clearfix bg-theme-blue text-white staycations">
                <div class="dlab-post-media dlab-img-effect zoom-slow">
                  <a href="<?php echo base_url('staycations/'.$stay->staycations_slug) ?>">
                    <img class="img-cover" src="<?php echo base_url($stay->cover_image) ?>" alt="">
                  </a>
	  						<div class="am-overlay-text top-30">
                  <?php if ($stay->discount>0): ?>
									  <span class="popular-tag"><?php echo check_num($stay->discount) ?>% OFF</span>
                    <?php endif ?>
									</div>
                </div>
                <div class="dlab-post-info p-a20">
                  <div class="dlab-post-title">
                    <h2 class="post-title font-20 font-weight-700 line-h-25 font_mulish"><a href="<?php echo base_url('staycations/'.$stay->staycations_slug) ?>">
                      <?php echo $stay->staycations_name ?>
                    </a></h2>
                    <p class="post-title font-16 line-h-25 font_nunito">
                      <?php echo substr($stay->description, 0, 100); ?>
                    </p>
                  </div>
                  <div class="post_review-section">
                    <?php 
                      $review = $this->Master_model->averageStaycationRating($stay->id);

                      if($review):
                    ?>
                    <ul class="item-review">
                      <?php 
                      $avRat = $review['average'];
                      for($star=1; $star<=5; $star++){
                        if ($star == 1) {
                          if ($avRat < 1) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } else{
                            echo '<li><i class="fa fa-star"></i></li>';
                          }
                        }

                        if ($star == 2) {
                          if ($avRat < 2 AND $avRat > 1) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 1.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }

                        if ($star == 3) {
                          if ($avRat < 3 AND $avRat > 2) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 2.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }

                        if ($star == 4) {
                          if ($avRat < 4 AND $avRat > 3) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 3.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }

                        if ($star == 5) {
                          if ($avRat < 5 AND $avRat > 4) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 4.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }
                      }
                    ?>  
                    </ul>
                  <?php endif; ?>
                  </div>
                  <div class="post_packge-section font_karla font-weight-400">
                    <i class="fa fa-sun-o day-icon"></i><i class="fa fa-moon-o night-icon"></i><span><?php echo $stay->day_night ?></span>
                  </div>
                  <div class="post-action-section-bottom">
                    <div class="post-price-wrap font_mulish">
                        <span>
                            <span><?php echo $curr ?> <?php echo $discount>0? check_num($price-$discount):check_num($price) ?></span>
                            <?php if ($discount>0): ?>
                              <del class="p-l15"><?php echo $curr ?> <?php echo check_num($price) ?></del>
                            <?php endif ?>
                        </span>
                    </div>
                    <div class="dlab-post-readmore">
                      <a href="<?php echo base_url('staycations/'.$stay->staycations_slug); ?>" title="Know MORE" rel="bookmark" class="site-button button-smm">Know More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; endif; ?>
          </div>
        </div>
        <?php 
          if (!empty($emirates)):
            foreach($emirates as $emirate):
              $staycations = $this->db->order_by('display_order')->get_where('staycations', array(
                'emirates' => strtolower($emirate->emirates),
                'is_active' => 1
              ))->result_object();
        ?>
        <div id="<?php echo  url_title(strtolower($emirate->emirates), 'dash', true); ?>" class="tab-pane">
          <div class="row">
            <?php 
              if (!empty($staycations)):
                foreach($staycations as $stay):
                  $curr = get_currency();

                  if ($curr == 'AED') {
                    $price = $stay->aed;
                    $discount = 0;
                    if ($stay->discount > 0) {
                      $discount = ($stay->aed * $stay->discount)/100;
                    }
                  } else {
                    $price = $stay->usd;
                    $discount = 0;
                    if ($stay->discount > 0) {
                      $discount = ($stay->usd * $stay->discount)/100;
                    }
                  }
            ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="blog-post blog-md clearfix bg-theme-blue text-white staycations">
                <div class="dlab-post-media dlab-img-effect zoom-slow">
                  <a href="<?php echo base_url('staycations/'.$stay->staycations_slug) ?>">
                    <img class="img-cover" src="<?php echo base_url($stay->image) ?>" alt="">
                  </a>
                <div class="am-overlay-text top-30">
                  <?php if ($stay->discount>0): ?>
                    <span class="popular-tag"><?php echo check_num($stay->discount) ?>% OFF</span>
                    <?php endif ?>
                  </div>
                </div>
                <div class="dlab-post-info p-a20">
                  <div class="dlab-post-title">
                    <h2 class="post-title font-20 font-weight-700 line-h-25 font_mulish"><a href="<?php echo base_url('staycations/'.$stay->staycations_slug) ?>">
                      <?php echo $stay->staycations_name ?>
                    </a></h2>
                    <p class="post-title font-16 line-h-25 font_nunito">
                      <?php echo substr($stay->description, 0, 100); ?>
                    </p>
                  </div>
                  <div class="post_review-section">
                    <?php 
                      $review = $this->Master_model->averageStaycationRating($stay->id);

                      if($review):
                    ?>
                    <ul class="item-review">
                      <?php 
                      $avRat = $review['average'];
                      for($star=1; $star<=5; $star++){
                        if ($star == 1) {
                          if ($avRat < 1) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } else{
                            echo '<li><i class="fa fa-star"></i></li>';
                          }
                        }

                        if ($star == 2) {
                          if ($avRat < 2 AND $avRat > 1) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 1.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }

                        if ($star == 3) {
                          if ($avRat < 3 AND $avRat > 2) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 2.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }

                        if ($star == 4) {
                          if ($avRat < 4 AND $avRat > 3) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 3.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }

                        if ($star == 5) {
                          if ($avRat < 5 AND $avRat > 4) {
                            echo '<li><i class="fa fa-star-half-o"></i></li>';
                          } elseif($avRat > 4.99){
                            echo '<li><i class="fa fa-star"></i></li>';
                          } else {
                            echo '<li><i class="fa fa-star-o"></i></li>';
                          }
                        }
                      }
                    ?>  
                    </ul>
                  <?php endif; ?>
                  </div>
                  <div class="post_packge-section font_karla font-weight-400">
                    <i class="fa fa-sun-o day-icon"></i><i class="fa fa-moon-o night-icon"></i><span><?php echo $stay->day_night ?></span>
                  </div>
                  <div class="post-action-section-bottom">
                    <div class="post-price-wrap font_mulish">
                        <span>
                            <span><?php echo $curr ?> <?php echo $discount>0? check_num($price-$discount):check_num($price) ?></span>
                            <?php if ($discount>0): ?>
                              <del class="p-l15"><?php echo $curr ?> <?php echo check_num($price) ?></del>
                            <?php endif ?>
                        </span>
                    </div>
                    <div class="dlab-post-readmore">
                      <a href="<?php echo base_url('staycations/'.$stay->staycations_slug); ?>" title="Know MORE" rel="bookmark" class="site-button button-smm">Know More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; endif; ?>
          </div>
        </div>
        <?php endforeach; endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12 text-center">
    <a href="javascript:void(0);" class="site-button">EXPLORE ALL STAYCATIONS IN UAE</a>
  </div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>