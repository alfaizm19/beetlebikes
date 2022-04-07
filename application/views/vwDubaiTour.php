<div class="page-content bg-white  tours_page brd_crumb">
<div class="top-banner-bg"></div>
<div class="breadcrumb-strap">
<div class="container-lg">
<div class="row justify-content-between">
<div class="col-md-auto align-self-center">
<h1 class="page-title">Dubai Tours</h1>
</div>
<div class="col-md-auto align-self-center">
<div class="breadcrumb-row">
<ul class="list-inline">
<li><a href="javascript:void(0);">Home</a></li>
<li>Dubai Tours</li>
</ul>
</div>
</div>
</div>
</div>
</div>
<!-- contact area -->
<div class="content-block">
<div class="section-full bg-white content-inner home-tabs">
<div class="container-lg">
<div class="row">
<div class="col-lg-12">
<div class="clearfix text-center">
<h4 class="text-uppercase font-weight-700 font-14 dlab-dotted m-b0 text-gray-dark">Trending Tours</h4>
							<h2 class="font-weight-600 font-36">Most Popular Tours</h2>
</div>
<div class="section-content p-b0">
<div class="row">
<div class="col-lg-12">
<div class="dlab-tabs">
<div class="tabmob_scrl">
<ul class="nav nav-tabs justify-center m-b30">
  <li><a data-toggle="tab" href="#all" class="active"><span class="title-head">All</span></a></li>
  <li><a data-toggle="tab" href="#best"><span class="title-head">Best Seller</span></a></li>
  <li><a data-toggle="tab" href="#featured"><span class="title-head">Featured</span></a></li>
  <li><a data-toggle="tab" href="#popular"><span class="title-head">Popular</span></a></li>
</ul>
</div>  
<div class="dropdown am-overlay-text-2 top-30">
  <button onclick="myFunction()" class="dropbtn site-button button-smm font_karla font-weight-400 font-18-i"><i class="fa fa-filter"></i> Filters</button>
  <div id="myDropdown" class="dropdown-content">
    <form method="post" action="<?php echo base_url('dubai-tours') ?>">
      <?php if (!empty($emirates)): ?>
      <div class="panel">
        <div class="acod-head1">
          <h5 class="acod-title font-16 font-weight-700 font_nunito">
            <a>
              <i class="fa fa-flag-c"></i> Select Emirates
            </a>
          </h5>
        </div>
        <div class="acod-body">
          <div class="acod-content ">
            <div class="product-brand font_nunito font-weight-600 font-16">
              <div class="search-content">
                <input id="selectEmirate" type="checkbox">
                <label for="selectEmirate" class="search-content-area">Select All</label>
              </div>
              <?php $filterEmi = $this->input->post('emirates');?>
              <?php foreach ($emirates as $emi): ?>
              <div class="search-content">
                <input <?php echo !empty($filterEmi) && in_array($emi->emirates, $filterEmi)? 'checked':'' ?> name="emirates[]" class="emirates" id="<?php echo $emi->emirates ?>" type="checkbox" value="<?php echo $emi->emirates ?>">
                <label for="<?php echo $emi->emirates ?>" class="search-content-area">
                  <?php echo $emi->emirates ?>
                </label>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif ?>
      <?php if (!empty($categories)): ?>
      <div class="panel">
        <div class="acod-head1">
          <h5 class="acod-title font-16 font-weight-700 font_nunito">
            <a>
              <i class="fa fa-list-ul"></i> Select Categories
            </a>
          </h5>
        </div>
        <div class="acod-body">
          <div class="acod-content">
            <div class="product-brand">
              <div class="search-content">
                <input id="selectCategory" type="checkbox">
                <label for="selectCategory" class="search-content-area">Select All</label>
              </div>
              <?php $filterCat = $this->input->post('categories');?>
              <?php foreach ($categories as $cat): ?>
              <div class="search-content">
                <input <?php echo !empty($filterCat) && in_array($cat->id, $filterCat)? 'checked':'' ?> name="categories[]" class="categories" id="<?php echo $cat->id ?>" type="checkbox" value="<?php echo $cat->id ?>">
                <label for="<?php echo $cat->id ?>" class="search-content-area">
                  <?php echo $cat->category_name ?>
                </label>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
      <?php endif ?>
      <div class="panel">
        <div class="acod-head1">
          <h5 class="acod-title font-16 font-weight-700 font_nunito">
            <a>
              <i class="fa fa-dollar"></i> Sort by Price
            </a>
          </h5>
        </div>
        <div class="acod-body">
          <div class="acod-content">
            <div class="product-brand">
              <div class="search-content">
                <input <?php echo $this->input->post('price') == 'low'? 'checked':''; ?> value="low" name="price" id="selectPrice1" type="checkbox">
                <label for="selectPrice1" class="search-content-area">Low to High</label>
              </div>
              <div class="search-content">
                <input <?php echo $this->input->post('price') == 'high'? 'checked':''; ?> value="high" name="price" id="selectPrice2" type="checkbox">
                <label for="selectPrice2" class="search-content-area">High to Low</label>
              </div>
            </div>
            <div class="product-brand text-center m-t20">
              <button type="submit" class="site-button button-smm font_nunito font-weight-700 font-16-i">Update</button>
            </div>
          </div>
        </div>

      </div>
    </form>
  </div>
</div>
<div class="tab-content">
  <div id="all" class="tab-pane active">
    <div class="row">
      <?php 
        if (!empty($allTours)):
          foreach($allTours as $tour):
            $tourOpt = $this->Master_model->tourAdultPrice($tour->id);
            $curr = get_currency();

            $price = 0;
            $discount = 0;
            if (!empty($tourOpt)) {
              if ($curr == 'AED') {
                $price = $tourOpt['adult_aed'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_aed'] * $tourOpt['discount'])/100;
                }
              } else {
                $price = $tourOpt['adult_usd'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_usd'] * $tourOpt['discount'])/100;
                }
              }
            }
      ?>
      <div class="post card-container col-lg-3 col-md-6 col-sm-6">
        <div class="blog-post blog-grid blog-rounded blog-effect1">
          <div class="dlab-media dlab-img-effect zoom">
            <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
              <img class="img-fluid" src="<?php echo base_url($tour->image) ?>" alt="">
            </a>
            <div class="am-overlay-text top-30">
              <?php if ($tour->popular): ?>
                <span class="popular-tag">Popular</span>
              <?php elseif($tour->featured): ?>
                <span class="popular-tag">Featured</span>
              <?php else: ?>
                <span class="popular-tag">Best Seller</span>
              <?php endif ?>
            </div>
          </div>
          <div class="dlab-info p-a10 text-white bg-theme-blue">
            <div class="dlab-post-title">
              <h4 class="post-title font-16 line-h-20 font_mulish">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
                  <?php echo $tour->tour_name ?>
                </a>
              </h4>
            </div>
            <?php 
            $ratingAnalysis = $this->Master_model->averageTourRating($tour->id);

            if (!empty($ratingAnalysis['average'])):
            ?>
            <div class="post_review-section">
              <ul class="item-review">
                <?php 
                  $avRat = $ratingAnalysis['average'];
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
                        echo '<li><i class="fa fa-star text-white"></i></li>';
                      }
                    }

                    if ($star == 3) {
                      if ($avRat < 3 AND $avRat > 2) {
                        echo '<li><i class="fa fa-star-half-o"></i></li>';
                      } elseif($avRat > 2.99){
                        echo '<li><i class="fa fa-star"></i></li>';
                      } else {
                        echo '<li><i class="fa fa-star text-white"></i></li>';
                      }
                    }

                    if ($star == 4) {
                      if ($avRat < 4 AND $avRat > 3) {
                        echo '<li><i class="fa fa-star-half-o"></i></li>';
                      } elseif($avRat > 3.99){
                        echo '<li><i class="fa fa-star"></i></li>';
                      } else {
                        echo '<li><i class="fa fa-star text-white"></i></li>';
                      }
                    }

                    if ($star == 5) {
                      if ($avRat < 5 AND $avRat > 4) {
                        echo '<li><i class="fa fa-star-half-o"></i></li>';
                      } elseif($avRat > 4.99){
                        echo '<li><i class="fa fa-star"></i></li>';
                      } else {
                        echo '<li><i class="fa fa-star text-white"></i></li>';
                      }
                    }
                  }
                ?>  
              </ul>
              <span class="font_mulish">(Read Reviews)</span>
            </div>
            <?php endif; ?>
            <div class="post-action-section-bottom">
              <div class="post-price-wrap font_mulish">
                <span>
                  <?php if ($discount>0): ?>
                  <strike>
                    <span class="strike-text"><?php echo $curr ?> <?php echo $price ?><span>
                  </strike>
                  <?php endif ?>
                  <span><?php echo $curr ?> <?php echo $discount>0? $price-$discount:$price; ?></span>
                </span>
              </div>
              <div class="dlab-post-readmore">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>" title="READ MORE" rel="bookmark" class="site-button button-smm">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; else: ?>
        <div class="post card-container col-lg-3 col-md-6 col-sm-6">
          <h3>Sorry, there are no tours here.</h3>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div id="best" class="tab-pane">
    <div class="row">
      <?php 
        if (!empty($bestSeller)):
          foreach($bestSeller as $tour):
            $tourOpt = $this->Master_model->tourAdultPrice($tour->id);
            $curr = get_currency();

            $price = 0;
            $discount = 0;
            if (!empty($tourOpt)) {
              if ($curr == 'AED') {
                $price = $tourOpt['adult_aed'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_aed'] * $tourOpt['discount'])/100;
                }
              } else {
                $price = $tourOpt['adult_usd'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_usd'] * $tourOpt['discount'])/100;
                }
              }
            }
      ?>
      <div class="post card-container col-lg-3 col-md-6 col-sm-6">
        <div class="blog-post blog-grid blog-rounded blog-effect1">
          <div class="dlab-media dlab-img-effect zoom">
            <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
              <img class="img-fluid" src="<?php echo base_url($tour->image) ?>" alt="">
            </a>
            <div class="am-overlay-text top-30">
              <?php if ($tour->popular): ?>
                <span class="popular-tag">Popular</span>
              <?php elseif($tour->featured): ?>
                <span class="popular-tag">Featured</span>
              <?php else: ?>
                <span class="popular-tag">Best Seller</span>
              <?php endif ?>
            </div>
          </div>
          <div class="dlab-info p-a10 text-white bg-theme-blue">
            <div class="dlab-post-title">
              <h4 class="post-title font-16 line-h-20 font_mulish">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
                  <?php echo $tour->tour_name ?>
                </a>
              </h4>
            </div>
            <?php 
            $ratingAnalysis = $this->Master_model->averageTourRating($tour->id);

            if (!empty($ratingAnalysis['average'])):
            ?>
            <div class="post_review-section">
              <ul class="item-review">
                <?php 
                            $avRat = $ratingAnalysis['average'];
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
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 3) {
                                if ($avRat < 3 AND $avRat > 2) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 2.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 4) {
                                if ($avRat < 4 AND $avRat > 3) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 3.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 5) {
                                if ($avRat < 5 AND $avRat > 4) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 4.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }
                            }
                          ?>  
              </ul>
              <span class="font_mulish">(Read Reviews)</span>
            </div>
            <?php endif; ?>
            <div class="post-action-section-bottom">
              <div class="post-price-wrap font_mulish">
                <span>
                  <?php if ($discount>0): ?>
                  <strike>
                    <span class="strike-text"><?php echo $curr ?> <?php echo $price ?><span>
                  </strike>
                  <?php endif ?>
                  <span><?php echo $curr ?> <?php echo $discount>0? $price-$discount:$price; ?></span>
                </span>
              </div>
              <div class="dlab-post-readmore">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>" title="READ MORE" rel="bookmark" class="site-button button-smm">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; else: ?>
        <div class="post card-container col-lg-12 col-md-12 col-sm-12">
          <h3>Sorry, there are no tours here.</h3>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div id="featured" class="tab-pane">
    <div class="row">
      <?php 
        if (!empty($featured)):
          foreach($featured as $tour):
            $tourOpt = $this->Master_model->tourAdultPrice($tour->id);
            $curr = get_currency();

            $price = 0;
            $discount = 0;
            if (!empty($tourOpt)) {
              if ($curr == 'AED') {
                $price = $tourOpt['adult_aed'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_aed'] * $tourOpt['discount'])/100;
                }
              } else {
                $price = $tourOpt['adult_usd'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_usd'] * $tourOpt['discount'])/100;
                }
              }
            }
      ?>
      <div class="post card-container col-lg-3 col-md-6 col-sm-6">
        <div class="blog-post blog-grid blog-rounded blog-effect1">
          <div class="dlab-media dlab-img-effect zoom">
            <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
              <img class="img-fluid" src="<?php echo base_url($tour->image) ?>" alt="">
            </a>
            <div class="am-overlay-text top-30">
              <?php if ($tour->popular): ?>
                <span class="popular-tag">Popular</span>
              <?php elseif($tour->featured): ?>
                <span class="popular-tag">Featured</span>
              <?php else: ?>
                <span class="popular-tag">Best Seller</span>
              <?php endif ?>
            </div>
          </div>
          <div class="dlab-info p-a10 text-white bg-theme-blue">
            <div class="dlab-post-title">
              <h4 class="post-title font-16 line-h-20 font_mulish">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
                  <?php echo $tour->tour_name ?>
                </a>
              </h4>
            </div>
            <?php 
            $ratingAnalysis = $this->Master_model->averageTourRating($tour->id);

            if (!empty($ratingAnalysis['average'])):
            ?>
            <div class="post_review-section">
              <ul class="item-review">
                <?php 
                            $avRat = $ratingAnalysis['average'];
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
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 3) {
                                if ($avRat < 3 AND $avRat > 2) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 2.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 4) {
                                if ($avRat < 4 AND $avRat > 3) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 3.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 5) {
                                if ($avRat < 5 AND $avRat > 4) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 4.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }
                            }
                          ?>  
              </ul>
              <span class="font_mulish">(Read Reviews)</span>
            </div>
            <?php endif; ?>
            <div class="post-action-section-bottom">
              <div class="post-price-wrap font_mulish">
                <span>
                  <?php if ($discount>0): ?>
                  <strike>
                    <span class="strike-text"><?php echo $curr ?> <?php echo $price ?><span>
                  </strike>
                  <?php endif ?>
                  <span><?php echo $curr ?> <?php echo $discount>0? $price-$discount:$price; ?></span>
                </span>
              </div>
              <div class="dlab-post-readmore">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>" title="READ MORE" rel="bookmark" class="site-button button-smm">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; else: ?>
        <div class="post card-container col-lg-12 col-md-12 col-sm-12">
          <h3>Sorry, there are no tours here.</h3>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div id="popular" class="tab-pane">
    <div class="row">
      <?php 
        if (!empty($popular)):
          foreach($popular as $tour):
            $tourOpt = $this->Master_model->tourAdultPrice($tour->id);
            $curr = get_currency();

            $price = 0;
            $discount = 0;
            if (!empty($tourOpt)) {
              if ($curr == 'AED') {
                $price = $tourOpt['adult_aed'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_aed'] * $tourOpt['discount'])/100;
                }
              } else {
                $price = $tourOpt['adult_usd'];

                if ($tourOpt['discount'] > 0) {
                  $discount = ($tourOpt['adult_usd'] * $tourOpt['discount'])/100;
                }
              }
            }
      ?>
      <div class="post card-container col-lg-3 col-md-6 col-sm-6">
        <div class="blog-post blog-grid blog-rounded blog-effect1">
          <div class="dlab-media dlab-img-effect zoom">
            <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
              <img class="img-fluid" src="<?php echo base_url($tour->image) ?>" alt="">
            </a>
            <div class="am-overlay-text top-30">
              <?php if ($tour->popular): ?>
                <span class="popular-tag">Popular</span>
              <?php elseif($tour->featured): ?>
                <span class="popular-tag">Featured</span>
              <?php else: ?>
                <span class="popular-tag">Best Seller</span>
              <?php endif ?>
            </div>
          </div>
          <div class="dlab-info p-a10 text-white bg-theme-blue">
            <div class="dlab-post-title">
              <h4 class="post-title font-16 line-h-20 font_mulish">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>">
                  <?php echo $tour->tour_name ?>
                </a>
              </h4>
            </div>
            <?php 
            $ratingAnalysis = $this->Master_model->averageTourRating($tour->id);

            if (!empty($ratingAnalysis['average'])):
            ?>
            <div class="post_review-section">
              <ul class="item-review">
                <?php 
                            $avRat = $ratingAnalysis['average'];
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
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 3) {
                                if ($avRat < 3 AND $avRat > 2) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 2.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 4) {
                                if ($avRat < 4 AND $avRat > 3) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 3.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }

                              if ($star == 5) {
                                if ($avRat < 5 AND $avRat > 4) {
                                  echo '<li><i class="fa fa-star-half-o"></i></li>';
                                } elseif($avRat > 4.99){
                                  echo '<li><i class="fa fa-star"></i></li>';
                                } else {
                                  echo '<li><i class="fa fa-star text-white"></i></li>';
                                }
                              }
                            }
                          ?>  
              </ul>
              <span class="font_mulish">(Read Reviews)</span>
            </div>
            <?php endif; ?>
            <div class="post-action-section-bottom">
              <div class="post-price-wrap font_mulish">
                <span>
                  <?php if ($discount>0): ?>
                  <strike>
                    <span class="strike-text"><?php echo $curr ?> <?php echo $price ?><span>
                  </strike>
                  <?php endif ?>
                  <span><?php echo $curr ?> <?php echo $discount>0? $price-$discount:$price; ?></span>
                </span>
              </div>
              <div class="dlab-post-readmore">
                <a href="<?php echo base_url('dubai-tours/'.$tour->tour_slug) ?>" title="READ MORE" rel="bookmark" class="site-button button-smm">Book Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; else: ?>
        <div class="post card-container col-lg-12 col-md-12 col-sm-12">
          <h3>Sorry, there are no tours here.</h3>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 text-center">
<a href="javascript:void(0);" class="site-button">EXPLORE ALL TOURS & THINGS TO DO IN DUBAI</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>