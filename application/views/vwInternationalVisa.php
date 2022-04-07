<div class="page-content bg-white uaevisa_pge brd_crumb">
<div class="top-banner-bg"></div>
  <div class="breadcrumb-strap">
    <div class="container-lg">
      <div class="row justify-content-between">
        <div class="col-md-auto align-self-center">
          <h1 class="page-title">International Visas</h1>
        </div>
        <div class="col-md-auto align-self-center">
          <div class="breadcrumb-row">
            <ul class="list-inline">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>International Visas</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact area -->
  <div class="content-block">
    <div class="section-full bg-white content-inner uaevisas">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-12">
						<p class="font-16 font-weight-500">We have a dedicated team with years of experience who can guide and assist you with International Visa Services. Our main goal is to provide you all the assistance you need to successfully get the visa to your desired destination.</p>
          </div>
        </div>
        <div class="row">
          <?php 
            if(!empty($visas)):
              foreach($visas as $visa):
          ?>
            <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
              <div class="dlab-box img-content-style-1 fly-box">
                <div class="dlab-media dlab-img-overlay1 dlab-img-effect">
                  <img src="<?php echo base_url($visa->image) ?>" alt="">
                </div>
  							<div class="dlab-title-bx bg-theme-blue text-white p-a20 p-l35 p-r35 text-center">
                  <h2 class="m-b5"><?php echo $visa->visa_name ?></h2>
                  <div class="post-action-section-bottom">
                    <div class="post-price-wrap font_mulish">
                      <?php 
                        $curr = get_currency();
                        $info = $this->visa_model->get_price_dis($visa->id, $curr);
                        if($info):
                          $discount = $info['discount'];
                          $price = $info['price'];
                      ?>
                      <span>
                          <?php if($discount>0): ?>
                            <del><?php echo $curr ?> <?php echo $price ?></del>
                          <?php endif; ?>
                          <span><?php echo $curr ?> <?php echo $discount>0? $price-($price*$discount/100):$price ?></span>
                      </span>
                      <?php endif ?>
                    </div>
                    <div class="dlab-post-readmore">
                      <a href="<?php echo base_url('international-visas/'.$visa->visa_slug) ?>" title="Apply Now" rel="bookmark" class="site-button button-smm">Apply Now</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>