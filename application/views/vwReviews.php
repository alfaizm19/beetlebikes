<link rel='stylesheet' href='http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<div class="page-content bg-white pb-0 revs_pge">
  <div class="breadcrumb-strap">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-auto col-md-auto align-self-center">
          <h1 class="page-title">Reviews</h1>
        </div>
        <div class="col-auto col-md-auto align-self-center">
          <div class="breadcrumb-row">
            <ul class="list-inline">
              <li><a href="javascript:void(0);">Home</a></li>
              <li>Testimonials</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-block">
    <div class="section content-inner inner-text">
      <div class="container">
        <div class="position-relative">
          <video id="my-video" class="video-js review-video" controls preload="auto" poster="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/video-thumb.png" data-setup='' loop>
            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type='video/mp4'>
          </video>
        </div>
      </div>
    </div>
    <div class="section content-inner pt-0">
      <div class="container position-relative">
        <div class="testimonial-container">
          <div class="testimonial-heading">
            <h2>Our Clients Speak</h2>
            <p>We have been working with clients around the world</p>
          </div>
        </div>
        <div class="review-badge">
          <ul>
            <li class="review-img-border"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/review-badge/tripadvisor.png" alt="Tripadvisor"/> </li>
            <li><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/review-badge/google-review.png" alt="Google Review"/></li>
          </ul>
        </div>
        <?php if (!empty($reviews)): ?>
        <div class="row">
          <?php foreach ($reviews as $rev): ?>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
              <div class="testimonial-3 radius-md mx-3">
                <div class="testimonial-text">
                  <h4><?php echo $rev->title ?></h4>
                  <p><?php echo $rev->testimonial ?></p>
                </div>
                <div class="testimonial-detail mt-3 clearfix">
                  <div class="testimonial-pic-center radius"><img src="<?php echo base_url($rev->profile_picture) ?>" alt=""></div>
                  <h6 class="mb-0"><?php echo $rev->name ?></h6>
                  <p class="mb-0"><?php echo $rev->company ?></p>
                  <div class="review-rating">
                    <style type="text/css">
                      .text-yellow{
                        color: #ffb822 !important;
                      }
                    </style>
                    <?php 
                    $avRat = $rev->rating;
                    for($star=1; $star<=5; $star++){
                      if ($star == 1) {
                        if ($avRat < 1) {
                          echo '<i class="fa fa-star-half-o text-yellow"></i>';
                        } else{
                          echo '<i class="fa fa-star text-yellow"></i>';
                        }
                      }

                      if ($star == 2) {
                        if ($avRat < 2 AND $avRat > 1) {
                          echo '<i class="fa fa-star-half-o text-yellow"></i>';
                        } elseif($avRat > 1.99){
                          echo '<i class="fa fa-star text-yellow"></i>';
                        } else {
                          echo '<i class="fa fa-star-o text-yellow"></i>';
                        }
                      }

                      if ($star == 3) {
                        if ($avRat < 3 AND $avRat > 2) {
                          echo '<i class="fa fa-star-half-o text-yellow"></i>';
                        } elseif($avRat > 2.99){
                          echo '<i class="fa fa-star text-yellow"></i>';
                        } else {
                          echo '<i class="fa fa-star-o text-yellow"></i>';
                        }
                      }

                      if ($star == 4) {
                        if ($avRat < 4 AND $avRat > 3) {
                          echo '<i class="fa fa-star-half-o text-yellow"></i>';
                        } elseif($avRat > 3.99){
                          echo '<i class="fa fa-star text-yellow"></i>';
                        } else {
                          echo '<i class="fa fa-star-o text-yellow"></i>';
                        }
                      }

                      if ($star == 5) {
                        if ($avRat < 5 AND $avRat > 4) {
                          echo '<i class="fa fa-star-half-o text-yellow"></i>';
                        } elseif($avRat > 4.99){
                          echo '<i class="fa fa-star text-yellow"></i>';
                        } else {
                          echo '<i class="fa fa-star-o text-yellow"></i>';
                        }
                      }
                    }
                  ?>
                    <!-- <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star text-yellow"></i>
                    <i class="fa fa-star star-light"></i> -->
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
        <?php if ($total_rev > 9): ?>
        
        <a class="text-center text-uppercase text-dark-blue font-weight-600 d-block mt-5" href="javascript:;">
          View more reviews <i class="ti ti-angle-double-right font-14"></i>
        </a>

        <?php endif; endif ?>
      </div>
    </div>
  </div>
</div>
<script src='http://vjs.zencdn.net/5.4.6/video.js'></script>