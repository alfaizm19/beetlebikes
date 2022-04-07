<div class="page-content bg-white pb-0 faqs">
<div class="top-banner-bg"></div>
  <div class="breadcrumb-strap">

    <div class="container">
      <div class="row justify-content-between">
        <div class="col-auto col-md-auto align-self-center">
          <h1 class="page-title">FAQ's</h1>
        </div>
        <div class="col-auto col-md-auto align-self-center">
          <div class="breadcrumb-row">
            <ul class="list-inline">
              <li><a href="<?php echo site_url() ?>">Home</a></li>
              <li>FAQ's</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="content-block">
    <div class="section content-inner inner-text">
      <div class="container">
				<p class="text-center mb-5 font24">If you have some questions in your mind and looking for some clarifications regarding our services. You are welcome to visit and check our FAQs and have the answers.</p>
        <ul class="nav nav-tabs row faq-tab mb-5">
          <?php 
            if (!empty($services)):
              $i = 1;
              foreach($services as $service):
                $ser = url_title($service->service, 'dash', true);

                if ($ser == 'air-tickets') {
                  $icon = 'flight.png';
                } elseif ($ser == 'staycations') {
                  $icon = 'staycations.png';
                } elseif ($ser == 'dubai-tours') {
                  $icon = 'tours.png';
                } elseif ($ser == 'visa-services') {
                  $icon = 'visa-services.png';
                }
          ?>
            <li class="col-lg-3 col-md-6 col-sm-6 pb-4">
              <a data-toggle="tab" href="#<?php echo $ser ?>" class="<? echo $i==1? 'active':'' ?>">
              <div class="faq-tab-box">
                <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/icon/<? echo $icon ?>" alt=""> <p class="title-head">
                  <?php echo $service->service ?>
                </p>
              </div>
              </a>
            </li>
          <?php $i++; endforeach; endif; ?>
        </ul>
        <div class="tab-content">
          <?php 
            if (!empty($services)):
              $i = 1;
              foreach($services as $service):
                $ser = url_title($service->service, 'dash', true);

                $getFaq = $this->db->order_by('display_order')->get_where('site_faqs', array(
                  'service' => $service->service,
                  'is_active' => 1
                ))->result_object();
          ?>
          <div id="<?php echo $ser ?>" class="tab-pane <? echo $i==1? 'active':'' ?>">
            <div class="faq-content">
              <div class="dlab-accordion box-sort-in no-gap" id="accordion0016">
                <?php 
                  if (!empty($getFaq)):
                    $i=1;
                    foreach($getFaq as $faq):
                ?>

                  <div class="panel">
                    <div class="acod-head">
                      <h6 class="acod-title"> <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="<? echo $i != 1? 'false':''; ?>" data-target="#collapse<? echo $faq->id; ?>" class="<? echo $i != 1? 'collapsed':''; ?>"> <?php echo $faq->question ?> </a> </h6>
                    </div>
                    <div id="collapse<? echo $faq->id; ?>" class="acod-body collapse <? echo $i == 1? 'show':''; ?>" data-parent="#accordion0016">
                      <div class="acod-content">
                        <p class="m-b0">
                          <?php echo $faq->answer; ?>
                        </p>
                      </div>
                    </div>
                  </div>
                  
                <?php $i++; endforeach; endif; ?>
              </div>
            </div>
          </div>
          <?php $i++; endforeach; endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>