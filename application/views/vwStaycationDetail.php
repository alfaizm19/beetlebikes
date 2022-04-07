<div class="page-content bg-white stycat_det brd_crumb page_det">
<div class="top-banner-bg" <?php echo !empty($staycation->banner_image)? 'style="background: url('.base_url($staycation->banner_image).')"':''; ?>></div>
  <div class="breadcrumb-strap">
    <div class="container-lg">
      <div class="row justify-content-between">
        <div class="col-md-auto align-self-center">
          <h1 class="page-title">Staycations</h1>
        </div>
        <div class="col-md-auto align-self-center">
          <div class="breadcrumb-row">
            <ul class="list-inline">
              <li><a href="<?php echo base_url(); ?>">Home</a></li>
              <li>Staycations</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact area -->
  <div class="content-block">
    <div class="section-full bg-white content-inner stay-detail-page p-t40-i p-b0-i">
      <div class="container-lg">
        <div class="text-left">
          <h2 class="page-title">
            <?php echo $staycation->staycations_name ?>
          </h2>
        </div>
      </div>
    </div>
    <div class="section-full bg-white content-inner airticket detail-page p-t0-i p-b0-i">
      <div class="container-lg">
                <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="stay-banner">
              <img class="img-cover" src="<?php echo base_url($staycation->image) ?>" alt="">
            </div>
            <div class="detail-page-block p-t30 stay-detail-text">
              <div class="row">
                <div class="col-md-6">
                  <span class="stay-safe-tag">Safety Verified</span>
                </div>
                <div class="col-md-6">
                  <div class="stay-price text-right">
                    <?php

                      $curr = get_currency();

                      if ($curr == 'AED') {
                        $price = $staycation->aed;
                        $discount = 0;
                        if ($staycation->discount > 0) {
                          $discount = ($staycation->aed * $staycation->discount)/100;
                        }
                      } else {
                        $price = $staycation->usd;
                        $discount = 0;
                        if ($staycation->discount > 0) {
                          $discount = ($staycation->usd * $staycation->discount)/100;
                        }
                      }
                    ?>
                    <span class="text1">Price Starting @</span>
                    <span class="text2"><?php echo $curr ?> <?php echo $discount>0? $price-$discount:$price; ?></span>

                    <?php if ($discount>0): ?>
                      <del>
                        <span class="text2"><?php echo $curr ?> <?php echo $price; ?></span>
                      </del>                      
                    <?php endif ?>
                  </div>
                  <div class="post_packge-section font_karla font-weight-400 justify-text-right fr">
                    <i class="fa fa-sun-o day-icon"></i><i class="fa fa-moon-o night-icon"></i><span>
                      <?php echo $staycation->day_night ?>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <?php 
              if (!empty($staycation->amenities)):
                $amenities = explode(',', $staycation->amenities);
            ?>
            <div class="detail-page-block p-t20">
              <h3>Amenities</h3>
              <div class="row">
                <?php foreach ($amenities as $ament): ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <ul class="list-check rounded amenities-list">
                    <li><?php echo $ament ?></li>
                  </ul>
                </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>
            <div class="mob_toggl">
            <div class="detail-page-block p-t20">
              <h3 id="decrip">Description</h3>
              <div id="toggle1" class="detail-page-block-text">
                <?php echo $staycation->description ?>
              </div>
            </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 detail-sidebar">
            <div class="row">
              <div class="post card-container col-md-12">
                <div class="widget bg-white widget_getintuch p-t0-i m-b0-i">
                  <h4 class="widget-title bg-theme-blue text-center font-22 font_karla font-weight-700 p-a15 text-white"><span class="ti-headphone-alt theme_color"></span> Enquire Now</h4>
                  <div class="p-a20">
                    <?php if (isset($_GET['res']) && $_GET['res'] == 'success'): ?>
                    <div class="alert alert-success"> <strong><i class="fa fa-check"></i> Thank you</strong> for your message. It has been sent</div>
                    <?php endif ?>

                    <form class="myprofile" action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads4730592000001133013 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory4730592000001133013()' accept-charset='UTF-8'>
                     <input type='text' style='display:none;' name='xnQsjsdp' value='dd1dcd3c49fb2ffd9279b8aea4a3e953079ff29b518f3c4649f0dc17377ee33e'></input> 
                     <input type='hidden' name='zc_gad' id='zc_gad' value=''></input> 
                     <input type='text' style='display:none;' name='xmIwtLD' value='fa1d25f29b6c90f54d7b902146f61b19af15938ee800377666bef6f9ad15c8ff'></input> 
                     <input type='text'  style='display:none;' name='actionType' value='TGVhZHM='></input>
                     <input type='text' style='display:none;' name='returnURL' value='http://emiratesdirectory.com/forevertourism/staycations/?stay=success' > </input>
                      <div class="row justify-content-center justify-items-center">
												<div class="col-lg-12 col-md-6 col-sm-12 m-b20">
                          <div class="input-group">
                            <input type='text' id='Last_Name' name='Last Name' maxlength='80' class="form-control font-20-i font_karla_i" placeholder="Name*"></input>
                          </div>
                        </div>
												<div class="col-lg-12 col-md-6 col-sm-12 m-b20">
                          <div class="input-group">
                            <input type='text' ftype='email' id='Email' name='Email' maxlength='100' class="form-control font-20-i font_karla_i" placeholder="Email*"></input>
                          </div>
                        </div>
												<div class="col-lg-12 col-md-6 col-sm-12 m-b20">
                          <div class="input-group">
                            <input type='text' id='Phone' name='Phone' maxlength='30' class="form-control font-20-i font_karla_i" placeholder="Phone Number*"></input>
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12 m-b20">
                          <select class='zcwf_col_fld_slt' id='LEADCF28' name='LEADCF28' class="bs-select-hidden">
                          <option selected value='0'>Select Nationality</option>
                            <option value='UAE'>UAE</option>
                            <option value='India'>India</option>
                          </select>
                        </div>
                        <div class="col-md-12 m-b20">
                          <div class="input-group font-20 font_karla">
                            <input type='date' id='LEADCF27' name='LEADCF27' maxlength='255' class="form-control font-20-i font_karla_i" placeholder="Travel Date"></input>
                          </div>
                        </div>
                        <div class="col-md-12" style="display: none;">
                            <select class='zcwf_col_fld_slt' id='Lead_Source' name='Lead Source'  >
                            <option value='-None-'>-None-</option>
                            <option value='Employee&#x20;Referral'>Employee Referral</option>
                            <option value='Website&#x20;Enquiry'>Website Enquiry</option>
                            <option value='Trade&#x20;Show'>Trade Show</option>
                            <option value='Seminar&#x20;Partner'>Seminar Partner</option>
                            <option value='Online&#x20;Store'>Online Store</option>
                            <option value='Air&#x20;Ticket&#x20;Enquiry'>Air Ticket Enquiry</option>
                            <option value='Partner'>Partner</option>
                            <option value='External&#x20;Referral'>External Referral</option>
                            <option value='Web&#x20;Download'>Web Download</option>
                            <option value='Internal&#x20;Seminar'>Internal Seminar</option>
                            <option value='Advertisement'>Advertisement</option>
                            <option value='Web&#x20;Research'>Web Research</option>
                            <option value='Cold&#x20;Call'>Cold Call</option>
                            <option value='Sales&#x20;Email&#x20;Alias'>Sales Email Alias</option>
                            <option value='Public&#x20;Relations'>Public Relations</option>
                            <option value='Chat'>Chat</option>
                            <option value='Facebook'>Facebook</option>
                            <option value='Twitter'>Twitter</option>
                          <option selected value='Staycation&#x20;Enquiry'>Staycation Enquiry</option>
                            <option value='UAE&#x20;Visa&#x20;Enquiry'>UAE Visa Enquiry</option>
                            <option value='International&#x20;Visa&#x20;Enquiry'>International Visa Enquiry</option>
                            <option value='Tour&#x20;Enquiry'>Tour Enquiry</option>
                          </select>
                        </div>
                        <div class="col-md-12 m-b20">
                          <div class="input-group">
                            <textarea rows="4" id='Description' name='Description' class="form-control font-20-i font_karla_i" placeholder="Message*"></textarea>
                          </div>
                        </div>
                        <div class="col-md-12" style="display: none;">
                          <input type='text' id='LEADCF16' name='LEADCF16' maxlength='255' value='JW Marriot Hotel'></input>
                        </div>
                        <div class="col-md-12 m-b20">
                          <input type='submit' id='formsubmit' class='formsubmit zcwf_button site-button btn-lg bg-theme-blue btn-block font-20-i font_karla font-weight-700' value='Submit' title='Submit'>
                        </div>
                      </div>
                    </form>
                    <script>
                    function validateEmail4730592000001133013()
                    {
                      var form = document.forms['WebToLeads4730592000001133013'];
                      var emailFld = form.querySelectorAll('[ftype=email]');
                      var i;
                      for (i = 0; i < emailFld.length; i++)
                      {
                        var emailVal = emailFld[i].value;
                        if((emailVal.replace(/^\s+|\s+$/g, '')).length!=0 )
                        {
                          var atpos=emailVal.indexOf('@');
                          var dotpos=emailVal.lastIndexOf('.');
                          if (atpos<1 || dotpos<atpos+2 || dotpos+2>=emailVal.length)
                          {
                            alert('Please enter a valid email address. ');
                            emailFld[i].focus();
                            return false;
                          }
                        }
                      }
                      return true;
                    }

                      function checkMandatory4730592000001133013() {
                      var mndFileds = new Array('Last Name','Email','Phone','Description','LEADCF27','LEADCF28');
                      var fldLangVal = new Array('Name','Email','Phone','Message','Date','Nationality');
                      for(i=0;i<mndFileds.length;i++) {
                        var fieldObj=document.forms['WebToLeads4730592000001133013'][mndFileds[i]];
                        if(fieldObj) {
                        if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
                         if(fieldObj.type =='file')
                          { 
                           alert('Please select a file to upload.'); 
                           fieldObj.focus(); 
                           return false;
                          } 
                        alert(fldLangVal[i] +' cannot be empty.'); 
                                fieldObj.focus();
                                return false;
                        }  else if(fieldObj.nodeName=='SELECT') {
                               if(fieldObj.options[fieldObj.selectedIndex].value=='-None-') {
                          alert(fldLangVal[i] +' cannot be none.'); 
                          fieldObj.focus();
                          return false;
                           }
                        } else if(fieldObj.type =='checkbox'){
                         if(fieldObj.checked == false){
                          alert('Please accept  '+fldLangVal[i]);
                          fieldObj.focus();
                          return false;
                           } 
                         } 
                         try {
                             if(fieldObj.name == 'Last Name') {
                          name = fieldObj.value;
                            }
                        } catch (e) {}
                          }
                      }
                      if(!validateEmail4730592000001133013()){return false;}
                      document.querySelector('.crmWebToEntityForm .formsubmit').setAttribute('disabled', true);
                    }

                  function tooltipShow4730592000001133013(el){
                    var tooltip = el.nextElementSibling;
                    var tooltipDisplay = tooltip.style.display;
                    if(tooltipDisplay == 'none'){
                      var allTooltip = document.getElementsByClassName('zcwf_tooltip_over');
                      for(i=0; i<allTooltip.length; i++){
                        allTooltip[i].style.display='none';
                      }
                      tooltip.style.display = 'block';
                    }else{
                      tooltip.style.display='none';
                    }
                  }
                  </script>
                    <!-- Do not remove this --- Analytics Tracking code starts --><script id='wf_anal' src='https://crm.zohopublic.com/crm/WebFormAnalyticsServeServlet?rid=fa1d25f29b6c90f54d7b902146f61b19af15938ee800377666bef6f9ad15c8ffgiddd1dcd3c49fb2ffd9279b8aea4a3e953079ff29b518f3c4649f0dc17377ee33egid885e3c1045bd9bdcc91bdf30f82b5696gid14f4ec16431e0686150daa43f3210513'></script>
                  </div>
                </div>
              </div>
              <div class="post card-container col-md-12 m-t40">
                <div class="widget bg-white widget_getintuch p-t0-i m-b0-i">
                  <h4 class="widget-title bg-theme-red text-center font-22 font_karla font-weight-700 p-a15 text-white">Need More Help?</h4>
                  <ul class="p-a20">
                    <li>
                      <i class="ti-headphone-alt theme_color"></i>
                      <strong class="p-b10">Call us on</strong>
                      +971 54 388 9941<br>
                      +971 54 125 4789
                    </li>
                    <li><i class="fa fa-whatsapp theme_color"></i>+971 54 125 4789</li>
                    <li><i class="ti-email theme_color"></i>visa@forevertourism.com<br>info@forevertourism.com</li>
                    <li><i class="fa fa-comments theme_color"></i><a href="#" class="text-underline">LIVE CHAT</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php if (!empty($ratingAnalysis['average'])): ?>

<div class="section-full bg-white content-inner airticket detail-page p-t40-i p-b0-i">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="detail-page-block">
          <h3>Reviews</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section-full bg-gray-light content-inner airticket detail-page p-t40-i p-b40-i text-center rating_sec">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="detail-page-block">
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12">
              <div class="post_review-section big-review">
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
              </div>
              <div class="review-ratings"><?php echo $ratingAnalysis['average'] ?>/5.0</div>
            </div>
            <div class="col-xl-8 col-lg-6 col-md-12">
              <div class="row">
                <div class="col-xl-5 col-lg-8 col-md-6 col-sm-6 rating-star-section-1">
                  <div class="post_review-section">
                    <span>5 Stars</span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                    <span>4 Stars</span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                    <span>3 Stars</span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                    <span>2 Stars</span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                    <span>1 Stars</span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-3 m-t10 rating-star-section-2">
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6  m-t10 rating-star-section-3">
                  <div class="user-count">
                    <span><?php echo $ratingAnalysis['five'] ?> Users</span>
                  </div>
                  <div class="user-count">
                    <span><?php echo $ratingAnalysis['four'] ?> Users</span>
                  </div>
                  <div class="user-count">
                    <span><?php echo $ratingAnalysis['three'] ?> Users</span>
                  </div>
                  <div class="user-count">
                    <span><?php echo $ratingAnalysis['two'] ?> Users</span>
                  </div>
                  <div class="user-count">
                    <span><?php echo $ratingAnalysis['one'] ?> Users</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (!empty($reviews)): ?>
<div class="section-full bg-white content-inner airticket detail-page p-t40-i p-b0-i">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="custom-comment-wrapper">
          <div id="comments">
            <ol class="commentlist">
              <?php foreach ($reviews as $rev): ?>
              <li class="comment">
                <div class="comment_container row">
                  <div class="comment-img-section col-md-3">
                    <h6><?php echo $rev->customer_name ?></h6>
                    <img class="avatar avatar-60 photo" src="<?php echo base_url($rev->profile_picture) ?>" alt="">
                    <span class="loc-name"><?php echo $rev->city ?>, <?php echo $rev->country_name ?></span>
                    <span class="comment-date"><?php echo date('d/m/y', strtotime($rev->created_at)) ?></span>
                  </div>
                  <div class="comment-text col-md-6">
                    <div class="description">
                      <p><?php echo $rev->review ?></p>
                    </div>
                  </div>
                  <div class="comment-star col-md-3">
                    <span class="review-ratings"><?php echo $rev->rating ?>/5.0</span>
                      <div class="star-rating">
                        <div data-rating="3">
                          <?php 

                          $avRat = $rev->rating;
                          $ratCmnt = '';
                          for($star=1; $star<=5; $star++){
                            if ($star == 1) {
                              if ($avRat < 1) {
                                $ratCmnt = 'Very Bad';
                                echo '<i class="fa fa-star-half-o text-yellow"></i>';
                              } else{
                                $ratCmnt = 'Bad';
                                echo '<i class="fa fa-star text-yellow"></i>';
                              }
                            }

                            if ($star == 2) {
                              if ($avRat < 2 AND $avRat > 1) {
                                $ratCmnt = 'Bad';
                                echo '<i class="fa fa-star-half-o text-yellow"></i>';
                              } elseif($avRat > 1.99){
                                $ratCmnt = 'Poor';
                                echo '<i class="fa fa-star text-yellow"></i>';
                              } else {
                                echo '<i class="fa fa-star-o text-yellow"></i>';
                              }
                            }

                            if ($star == 3) {
                              if ($avRat < 3 AND $avRat > 2) {
                                $ratCmnt = 'Poor';
                                echo '<i class="fa fa-star-half-o text-yellow"></i>';
                              } elseif($avRat > 2.99){
                                $ratCmnt = 'Average';
                                echo '<i class="fa fa-star text-yellow"></i>';
                              } else {
                                echo '<i class="fa fa-star-o text-yellow"></i>';
                              }
                            }

                            if ($star == 4) {
                              if ($avRat < 4 AND $avRat > 3) {
                                $ratCmnt = 'Average';
                                echo '<i class="fa fa-star-half-o text-yellow"></i>';
                              } elseif($avRat > 3.99){
                                $ratCmnt = 'Great';
                                echo '<i class="fa fa-star text-yellow"></i>';
                              } else {
                                echo '<i class="fa fa-star-o text-yellow"></i>';
                              }
                            }

                            if ($star == 5) {
                              if ($avRat < 5 AND $avRat > 4) {
                                $ratCmnt = 'Excellent';
                                echo '<i class="fa fa-star-half-o text-yellow"></i>';
                              } elseif($avRat > 4.99){
                                $ratCmnt = 'Excellent';
                                echo '<i class="fa fa-star text-yellow"></i>';
                              } else {
                                echo '<i class="fa fa-star-o text-yellow"></i>';
                              }
                            }
                          }

                          ?>
                        </div>
                      </div>
                    <?php if (!empty($ratCmnt)): ?>
                    <span class="review-tag"><?php echo $ratCmnt ?></span>
                    <?php endif ?>
                  </div>
                </div>
              </li>
              <?php endforeach ?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; endif; ?>

  </div>
</div>