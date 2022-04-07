<style type="text/css">
  .option-red::before{
    background-color: red !important;
  }

  .option-white::before{
    background-color: white !important;
  }

  .error{
    border: 1px solid red !important;
  }
</style>
<div class="page-content bg-white brd_crumb page_det">
  <div class="top-banner-bg" <?php echo !empty($tour->banner_image)? "style='background:url(".base_url($tour->banner_image).")'":""; ?>></div>
  <div class="breadcrumb-strap">
    <div class="container-lg">
      <div class="row justify-content-between">
        <div class="col-md-auto align-self-center">
          <h1 class="page-title">
            <?php echo $tour->tour_name ?>
          </h1>
        </div>
        <div class="col-md-auto align-self-center">
          <div class="breadcrumb-row">
            <ul class="list-inline">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li><?php echo $tour->tour_name ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- contact area -->
<div class="content-block">
  <div class="section-full bg-white content-inner careers p-b40-i p-t40-i">
    <div class="container-lg">
      <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4">
          <ul class="tour-features rounded">
            <li class="fa fa-calendar-o">Availability: 
              <strong><?php echo !empty($tour->availability)? $tour->availability:'-'; ?></strong>
            </li>
            <!-- <li class="fa fa-envelope">Instant Confirmation</li> -->
            <li class="fa fa-clock-o">Starting Time: 
              <strong><?php echo $tour->starting_time ?></strong>
            </li>
            <li class="fa fa-language-c">
              <?php echo $tour->tour_language ?>
            </li>
          </ul>
        </div>
				<div class="col-md-4 col-lg-4 col-xl-4">
          <ul class="tour-features rounded">
            <li class="ti-timer">Duration: 
              <strong><?php echo $tour->duration ?></strong>
            </li>
            <li class="fa fa-times-circle red-before">
              Cancellation: <?php echo !empty($tour->cancellation)? $tour->cancellation:'-'; ?>
            </li>
            <li class="fa fa-car-pick">Pick Up & Drop: 
              <strong><?php echo ucwords($tour->pickup) ?></strong>
            </li>
          </ul>
        </div>
					<div class="offset-xl-auto offset-lg-auto col-md-4 col-lg-4 col-xl-4 col-sm-12 display-a-c">
          <div class="page-price-wrap font_karla font-weight-700 price_sec">
            <span class="d-inline-block">
              <?php 

                // $price = 0;
                // $discount = 0;
                // $price = $tour->price;

                // if ($tour->discount > 0) {
                //   $discount = ($tour->price * $tour->discount)/100;
                // }

              ?>
              
              <?php if ($discount>0): ?>
				<del><?php echo get_currency() ?> <?php echo $price ?></del></span>
              <?php endif ?>
              <span class="d-flex">
				  <span class="font-24">Price</span>
              <span class="font-38"><?php echo get_currency() ?> 
                <?php echo $discount>0? ($price-$discount):$price; ?>
              </span>
            </span>
            <a href="javascript:;" title="Book Now" class="site-button btn-lg font-28 font_karla font-weight-700 addCartTour">BOOK NOW</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-full bg-theme-blue content-inner careers p-t40-i p-b40-i">
    <div class="container-lg">
      <div class="dettabmob_scrl">
        <ul class="nav nav-pills nav-fill">
          <li class="nav-item">
            <a class="nav-link active" href="#">TOURS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tour_information">TOUR INFORMATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#inclusion">INCLUSION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#booking_policy">BOOKING POLICY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#gallery">GALLERY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#reviews">REVIEWS</a>
          </li>
        </ul>
      </div>
    </div>
	</div>

<?php if (!empty($tourOptions)): ?>
<!-- Tour Options Start -->
<div class="section-full bg-theme-blue content-inner careers m-t40 p-t40-i p-b40-i">
  <div class="container-lg">
    <div class="mobres_scrl">
      <form id="toursForm" role="search" method="post" class="myprofile airticket airticket-form" action="<?php echo base_url('cart/add') ?>">
        <div class="row">
          <div class="col-lg-7 col-md-7 col-sm-7">
            <div class="row">
              <div class="col-md-5 col-sm-5">
                <h3 class="font_karla font-20 font-weight-700 text-white text-center">Tour Options</h3>
              </div>
              <div class="col-md-4 col-sm-4">
                <h3 class="font_karla font-20 font-weight-700 text-white text-center">
                  Transfer Type
                  <a class="tooltip-info">
                    <i class="fa fa-info-c"></i>
                    <div class="top-help">
                      <p>Dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                  </a>
                </h3>
              </div>
              <div class="col-md-3 col-sm-3">
                <h3 class="font_karla font-20 font-weight-700 text-white text-center">Travel Date</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <h3 class="font_karla font-20 font-weight-700 text-white text-center">Adult</h3>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <h3 class="font_karla font-20 font-weight-700 text-white text-center">
                      Child
                      <a class="tooltip-info">
                        <i class="fa fa-info-c"></i>
                        <div class="top-help">
                          <p>Dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                      </a>
                    </h3>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <h3 class="font_karla font-20 font-weight-700 text-white text-center">
                      Infant
                      <a class="tooltip-info">
                        <i class="fa fa-info-c"></i>
                        <div class="top-help">
                          <p>Dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                      </a>
                    </h3>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <h3 class="font_karla font-20 font-weight-700 text-white text-center">Price</h3>
              </div>
            </div>
          </div>
          <?php 
            foreach ($tourOptions as $tourOption):
              
              $curr = get_currency();
              $discount = 0;

              if (!empty($tourOption->adult_aed)) {
                
                if ($curr == 'AED') {
                  $price = $tourOption->adult_aed;
                } else {
                  $price = $tourOption->adult_usd;
                }

                $discount = $tourOption->discount;

              } elseif (!empty($tourOption->st_adult_aed)) {
                
                if ($curr == 'AED') {
                  $price = $tourOption->st_adult_aed;
                } else {
                  $price = $tourOption->st_adult_usd;
                }

                $discount = $tourOption->st_discount;

              } else {
                
                if ($curr == 'AED') {
                  $price = $tourOption->pt_adult_aed;
                } else {
                  $price = $tourOption->pt_adult_usd;
                }

                $discount = $tourOption->pt_discount;

              }

              if ($discount > 0) {
                $discount = ($price * $discount)/100;
              }
          ?>
          <div class="col-lg-7 col-md-7 col-sm-7">
            <div class="row">
              <div class="col-md-5 col-sm-5">
                <input type="checkbox" name="tour_option[]" id="tourOpt<?php echo $tourOption->id ?>" value="<?php echo $tourOption->id ?>" required="" class="tour-options-checkbox">
                <label for="one-way" class="font-18 font_karla font-weight-400 text-white line-h-20 tour-options remove-error" data-id="<?php echo $tourOption->id ?>">  
                  <span><?php echo $tourOption->tour_option_name ?></span>
                  <a class="tooltip-info ttip_wid">
                    <i class="fa fa-info-c"></i>
                    <div class="top-help">
                      <p><?php echo $tourOption->description ?></p>
                    </div>
                  </a>
                </label>
              </div>
              <div class="col-md-4 col-sm-4">
                <select name="transfer_type[<?php echo $tourOption->id ?>]" id="archives-dropdown--1" class="bs-select-hidden m-b30 transferType transferType_<?php echo $tourOption->id ?> remove-error">
                  <?php if ($tourOption->without_transfer): ?>
                    <option 
                      data-id="<?= $tourOption->id ?>" 
                      data-adult_aed="<?= $tourOption->adult_aed ?>"
                      data-adult_usd="<?= $tourOption->adult_usd ?>"
                      data-child_aed="<?= $tourOption->child_aed ?>"
                      data-child_usd="<?= $tourOption->child_usd ?>"
                      data-discount="<?= $tourOption->discount ?>"
                      value="without_transfer">Without Transfer</option>
                  <?php endif ?>
                  <?php if ($tourOption->sharing_transfer): ?>
                    <option 
                      data-id="<?= $tourOption->id ?>" 
                      data-adult_aed="<?= $tourOption->st_adult_aed ?>"
                      data-adult_usd="<?= $tourOption->st_adult_usd ?>"
                      data-child_aed="<?= $tourOption->st_child_aed ?>"
                      data-child_usd="<?= $tourOption->st_child_usd ?>"
                      data-discount="<?= $tourOption->st_discount ?>"
                    value="sharing_transfer">Sharing Transfer</option>
                  <?php endif ?>
                  <?php if ($tourOption->private_transfer): ?>
                    <option 
                      data-id="<?= $tourOption->id ?>" 
                      data-adult_aed="<?= $tourOption->pt_adult_aed ?>"
                      data-adult_usd="<?= $tourOption->pt_adult_usd ?>"
                      data-child_aed="<?= $tourOption->pt_child_aed ?>"
                      data-child_usd="<?= $tourOption->pt_child_usd ?>"
                      data-discount="<?= $tourOption->pt_discount ?>"
                      data-transfer_cost="<?= $tourOption->transfer_cost ?>"
                      data-transfer_cost_usd="<?= $tourOption->transfer_cost_usd ?>"
                      data-guest_limit="<?= $tourOption->guest_limit ?>"
                      value="private_transfer">Private Transfer</option>
                  <?php endif ?>
                </select>
              </div>
              <div class="col-md-3 col-sm-3">
                <div class="input-group font-20 font_karla m-b30">
                  <input name="travel_date[<?php echo $tourOption->id ?>]" type="date" class="form-control font-20-i font_karla_i travelDate_<?php echo $tourOption->id ?> remove-error" placeholder="00/00/00">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <div class="row">
                  <div class="col-md-4 col-sm-4">
                    <select name="adult[<?php echo $tourOption->id ?>]" id="archives-dropdown--2" class="bs-select-hidden adult adult_<?php echo $tourOption->id ?>" data-id="<?php echo $tourOption->id ?>">
                      <?php 
                        for($i=1; $i<=20; $i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <select name="child[<?php echo $tourOption->id ?>]" id="archives-dropdown--1" class="bs-select-hidden m-b30 child child_<?php echo $tourOption->id ?>" data-id="<?php echo $tourOption->id ?>">
                      <?php 
                        for($i=0; $i<=20; $i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="col-md-4 col-sm-4">
                    <select name="infant[<?php echo $tourOption->id ?>]" id="archives-dropdown--2" class="bs-select-hidden infant infant_<?php echo $tourOption->id ?>" data-id="<?php echo $tourOption->id ?>">
                      <?php 
                        for($i=0; $i<=20; $i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="page-price-wrap font_karla font-weight-700 text-center">
                  <span class="d-inline-block text-white font-30">
                    <?php if ($discount>0): ?>
                      <del class="showDis_<?php echo $tourOption->id ?>"><?php echo $curr ?> <?php echo $price ?></del>
                    <?php endif ?>
                    <span class="font-30 showPrice_<?php echo $tourOption->id ?>">
                      <?php echo $curr ?> <?php echo $discount>0? $price-$discount:$price; ?>
                    </span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach ?>
        </div>
        <input type="hidden" name="action" value="tours">
      </form>
    </div>
  </div>
</div>
<!-- Tour Options End -->
<?php endif ?>


<div class="section-full bg-white content-inner detail-page p-0 m-t20 m-b10">
<div class="container-lg">
<div class="text-right">
<!-- <input name="submit" type="submit" value="Add to Cart" class="site-button btn-lg font-22-i font-weight-700 font_karla" id="addCartTour"> -->

<button type="submit" class="site-button btn-lg font-22-i font-weight-700 font_karla addCartTour">Add to Cart</button>

</div>
</div>
</div>
<div class="section-full bg-white content-inner airticket detail-page p-t0-i mob_toggl">
<div class="container-lg">
<div class="row">
<div class="col-lg-9 col-md-12 col-sm-12">
<div class="detail-page-block" id="tour_information">
<h3 id="decrip">Description</h3>
  <div class="detail-page-block-text" id="toggle1">
    <?php echo $tour->overview ?>
  </div>
</div>
<div class="detail-page-block m-t40" id="inclusion">
<h3 id="documents">Documents</h3>
  <div class="detail-page-block-text" id="toggle2">
    <?php echo $tour->inclusion ?>
  </div>
</div>
<div class="detail-page-block m-t40" id="booking_policy">
<h3 id="apply">How to Apply</h3>
  <div class="detail-page-block-text" id="toggle3">
    <?php echo $tour->policy ?>
  </div>
</div>
</div>
<div class="col-lg-3 col-md-12 col-sm-12 detail-sidebar">
<div class="row">
<div class="post card-container col-md-12">
<div class="widget bg-white widget_getintuch p-t0-i m-t50">
<h4 class="widget-title bg-theme-blue text-center font-22 font_karla font-weight-700 p-a15 text-white "><span class="ti-headphone-alt theme_color"></span> Enquire Now</h4>
<div class="p-a20">
  <?php if (isset($_GET['res']) && $_GET['res'] == 'success'): ?>
  <div class="alert alert-success"> <strong><i class="fa fa-check"></i> Thank you</strong> for your message. It has been sent</div>
  <?php endif ?>
    <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads4730592000001137036 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory4730592000001137036()' accept-charset='UTF-8' class="myprofile">

    <input type='text' style='display:none;' name='xnQsjsdp' value='dd1dcd3c49fb2ffd9279b8aea4a3e953079ff29b518f3c4649f0dc17377ee33e'></input> 
     <input type='hidden' name='zc_gad' id='zc_gad' value=''></input> 
     <input type='text' style='display:none;' name='xmIwtLD' value='fa1d25f29b6c90f54d7b902146f61b1964bdd30620df71f33062fa26b30f1f3c'></input> 
     <input type='text'  style='display:none;' name='actionType' value='TGVhZHM='></input>
     <input type='text' style='display:none;' name='returnURL' value='http://emiratesdirectory.com/forevertourism/dubai-tour/?uae=success' > </input>
    <div class="row justify-content-center justify-items-center">
      <div class="col-md-12 m-b20">
        <div class="input-group">
          <input type='text' id='Last_Name' name='Last Name' maxlength='80' class="form-control font-20-i font_karla_i NameErr removeErr" placeholder="Name*"></input>
        </div>
      </div>
      <div class="col-md-12 m-b20">
        <div class="input-group">
          <input type='text' ftype='email' id='Email' name='Email' maxlength='100' class="form-control font-20-i font_karla_i EmailErr removeErr" placeholder="Email*"></input>
        </div>
      </div>
      <div class="col-md-12 m-b20">
        <div class="input-group">
          <input type='text' id='Phone' name='Phone' maxlength='30' class="form-control font-20-i font_karla_i PhoneErr removeErr" placeholder="Phone Number*"></input>
        </div>
      </div>
      <div class="col-md-12 m-b20">
        <select class='zcwf_col_fld_slt LEADCF28Err removeErr' id='LEADCF28' name='LEADCF28' class="bs-select-hidden m-b30">
          <option selected value='Select&#x20;Nationality'>Select Nationality</option>
          <option value='UAE'>UAE</option>
          <option value='India'>India</option>
        </select>
      </div>
      <div class="col-md-12 m-b20">
        <div class="input-group font-20 font_karla">
          <input type='date' id='LEADCF27' name='LEADCF27' maxlength='255' class="form-control font-20-i font_karla_i LEADCF27Err removeErr" placeholder="Travel Date"></input>
        </div>
      </div>
      <div class="col-md-12 m-b20">
        <div class="input-group">
          <textarea id='Description' name='Description' rows="4" class="form-control font-20-i font_karla_i DescriptionErr removeErr" placeholder="Message*"></textarea>
        </div>
      </div>
      <div class="col-md-12 m-b20" style="display: none;">
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
        <input type='hidden' id='LEADCF16' name='LEADCF16' maxlength='255' value='Burj Khalifa Tour'></input>
      </div>
      <div class="col-md-12 m-b20">
        <input name="submit" type="submit" value="Submit" class="site-button btn-lg bg-theme-blue btn-block font-20-i font_karla font-weight-700">
      </div>
    </div>
  </form>

  <script>
    function validateEmail4730592000000709020()
    {
      var form = document.forms['WebToLeads4730592000000709020'];
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

    function checkMandatory4730592000001137036() {
      var mndFileds = new Array('Last Name','Email','Phone','LEADCF28', 'LEADCF27', 'Description');
      var fldLangVal = new Array('Name','Email','Phone','LEADCF28', 'LEADCF27', 'Description');
      for(i=0;i<mndFileds.length;i++) {
        var fieldObj=document.forms['WebToLeads4730592000001137036'][mndFileds[i]];
        if(fieldObj) {
          if (((fieldObj.value).replace(/^\s+|\s+$/g, '')).length==0) {
            if(fieldObj.type =='file')
            {
              alert('Please select a file to upload.');
              fieldObj.focus();
              return false;
            }

            jQuery(".removeErr").removeClass('error');
            jQuery("."+fldLangVal[i]+"Err").addClass('error');
            //alert(fldLangVal[i] +' cannot be empty.');
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

          if (fldLangVal[i] == 'Phone') {
            if (isNaN(fieldObj.value)) {
              jQuery(".removeErr").removeClass('error');
              jQuery("."+fldLangVal[i]+"Err").addClass('error');
              fieldObj.focus();
              return false;
            }
          }

          console.log(fieldObj.value);

          if (fldLangVal[i] == 'LEADCF28') {
            if (fieldObj.value == 'Select Nationality') {
              jQuery(".removeErr").removeClass('error');
              jQuery("."+fldLangVal[i]+"Err").addClass('error');
              fieldObj.focus();
              return false;
            }
          }

          if (fldLangVal[i] == 'Email') {
            
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

            if (reg.test(fieldObj.value) == false) {
              jQuery(".removeErr").removeClass('error');
              jQuery("."+fldLangVal[i]+"Err").addClass('error');
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
      trackVisitor();
      if(!validateEmail4730592000000709020()){return false;}
      document.querySelector('.crmWebToEntityForm .formsubmit').setAttribute('disabled', true);
    }

    function tooltipShow4730592000000709020(el){
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
<script type='text/javascript' id='VisitorTracking'>var $zoho= $zoho || {};$zoho.salesiq = $zoho.salesiq || {widgetcode:'624b239afa8c5dc489347666b820f3962f02221b1495a1c570c959967c6bcb1db276c3c8c94965e4113cd41dd44a3ccb', values:{},ready:function(){$zoho.salesiq.floatbutton.visible('hide');}};var d=document;s=d.createElement('script');s.type='text/javascript';s.id='zsiqscript';s.defer=true;s.src='https://salesiq.zoho.com/widget';t=d.getElementsByTagName('script')[0];t.parentNode.insertBefore(s,t);function trackVisitor(){try{if($zoho){var LDTuvidObj = document.forms['WebToLeads4730592000000709020']['LDTuvid'];if(LDTuvidObj){LDTuvidObj.value = $zoho.salesiq.visitor.uniqueid();}var firstnameObj = document.forms['WebToLeads4730592000000709020']['First Name'];if(firstnameObj){name = firstnameObj.value +' '+name;}$zoho.salesiq.visitor.name(name);var emailObj = document.forms['WebToLeads4730592000000709020']['Email'];if(emailObj){email = emailObj.value;$zoho.salesiq.visitor.email(email);}}} catch(e){}}</script>
<!-- Do not remove this --- Analytics Tracking code starts --><script id='wf_anal' src='https://crm.zohopublic.com/crm/WebFormAnalyticsServeServlet?rid=fa1d25f29b6c90f54d7b902146f61b19f6ff5035589e4b549e92f8c0e6d005bdgiddd1dcd3c49fb2ffd9279bÀžJ‚3V
·ÀžJ‚3V··················`K,‚3V··········@^I‚3V··(ŸJ‚3V
·········àžJ‚3V··|·······àžJ‚3V··········3f3210513'></script>

</div>
</div>
</div>
<div class="post card-container col-md-12 m-t40">
<div class="widget bg-white widget_getintuch p-t0-i">
									<h4 class="widget-title bg-theme-red text-center font-23 font_karla font-weight-700 p-a15 text-white m-b0-i">Need More Help?</h4>
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
<div class="section-full bg-white content-inner airticket detail-page p-t0-i p-b0-i" id="gallery">
  <?php if (!empty($gallery)): ?>
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="detail-page-block">
          <h3>Gallery</h3>
          <div class="section-content box-sort-in m-b30 button-example">
            <div class="owl-fade-one owl-loaded owl-theme owl-carousel mfp-gallery gallery owl-none owl-dots-primary-full owl-drag">
              <?php foreach ($gallery as $gal): ?>
              <div class="item">
                <div class="dlab-thum-bx">
                  <img src="<?php echo base_url($gal->image_path) ?>" alt="">
                </div>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif ?>

<div class="section-full bg-white content-inner airticket detail-page p-t0-i p-b0-i">
<div class="container-lg">
<div class="row">
					<div class="col-xl-9 col-lg-12 col-md-12 col-sm-12">
<div class="detail-page-block">
<h3>Timings</h3>
<div class="detail-page-block-text bg-gray-light border-radius-none border-none">
<div class="row p-a30">
<div class="col-md-6 col-lg-6 border-bottom-2">
  <ul class="tour-features rounded">
    <li class="ti-timer">Duration: <strong><?php echo $tour->duration ?></strong></li>
    <li class="ti-location-pin">Reporting Point: 
      <strong><?php echo !empty($tour->reporting_point)? $tour->reporting_point:'-' ?></strong>
    </li>
  </ul>
</div>
<div class="col-md-6 col-lg-6 border-bottom-2">
  <ul class="tour-features rounded">
    <li class="fa fa-departure-c">Departure Point: 
      <strong><?php echo !empty($tour->departure_point)? $tour->departure_point:'-' ?></strong>
    </li>
    <li class="fa fa-meal-c">Cancellation: <strong><?php echo !empty($tour->cancellation)? $tour->cancellation:'-' ?></strong></li>
  </ul>
</div>
  <?php 
    if (!empty($tourOptions)):
      foreach($tourOptions as $tourOpt):
  ?>
  
  <div class="col-md-12 col-lg-12 border-bottom-2">
    <h5><?php echo $tourOpt->tour_option_name ?></h5>
    <span class="timing-info" data-toggle="modal" data-target="#timingTransfer<?php echo $tourOpt->id ?>">
      <a class="tooltip-info">
        <i class="fa fa-info-r"></i>
          <div class="top-help">
              <p>Dolor sit amet, consectetur adipiscing elit.</p>
          </div>
      </a> Transfer Timings</span>
    <p><?php echo $tourOpt->description ?></p>
  </div>

  <div class="modal fade timingTransfer" id="timingTransfer<?php echo $tourOpt->id ?>" tabindex="-1" role="dialog" aria-labelledby="Tranfer Timing" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content modal-bg">
        <div class="modal-header modal-bg text-black">
          <div class="head-title">
            <h5 class="modal-title m-t0-i" id="exampleModalLongTitle">Transfer Time Details</h5>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-bg">
          <div class="container-fluid p-lr-0-i p-t30">
            <?php if ($tourOpt->without_transfer): ?>
            <table class="table bg-white font_karla_i font-20">
              <thead class="thead-red">
                <tr>
                  <th scope="col">Without Transfers</th>
                  <th scope="col">Duration</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">
                    <?php echo !empty($tourOpt->transfer_timings)? $tourOpt->transfer_timings:'-'; ?>
                  </td>
                  <td><?php echo !empty($tourOpt->duration)? $tourOpt->duration:'-'; ?></td>
                </tr>
              </tbody>
            </table>
            <?php endif ?>
            <?php if ($tourOpt->sharing_transfer): ?>
            <table class="table bg-white font_karla_i font-20">
              <thead class="thead-red">
                <tr>
                  <th scope="col">Sharing Transfers</th>
                  <th scope="col">Duration</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">
                    <?php echo !empty($tourOpt->st_transfer_timings)? $tourOpt->st_transfer_timings:'-'; ?>
                  </td>
                  <td><?php echo !empty($tourOpt->st_duration)? $tourOpt->st_duration:'-'; ?></td>
                </tr>
              </tbody>
            </table>
            <?php endif ?>
            <?php if ($tourOpt->private_transfer): ?>
            <table class="table bg-white font_karla_i font-20">
              <thead class="thead-red">
                <tr>
                  <th scope="col">Private Transfers</th>
                  <th scope="col">Duration</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row">
                    <?php echo !empty($tourOpt->pt_transfer_timings)? $tourOpt->pt_transfer_timings:'-'; ?>
                  </td>
                  <td><?php echo !empty($tourOpt->pt_duration)? $tourOpt->pt_duration:'-'; ?></td>
                </tr>
              </tbody>
            </table>
            <?php endif ?>
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
</div>
</div>

<?php if (!empty($faqs)): ?>
  
<div class="section-full bg-white content-inner airticket detail-page p-t40-i p-b0-i">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="detail-page-block">
          <h3>FAQ's</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section-full bg-gray-light content-inner airticket detail-page p-t40-i p-b0-i faq">
  <div class="container-lg">
    <div class="row">
      <div class="col-md-12">
        <div class="detail-page-block">
          <div class="dlab-accordion box-sort-in m-b30 no-gap" id="accordion0016">
            <?php $i=1; foreach ($faqs as $faq): ?>
            <div class="panel">
                <div class="acod-head">
                  <h6 class="acod-title"> <a href="javascript:void(0);" data-toggle="collapse" aria-expanded="<? echo $i != 1? 'false':''; ?>" data-target="#collapse<? echo $faq->id; ?>" class="<? echo $i != 1? 'collapsed':''; ?>"> <?php echo $faq->question ?> </a> </h6>
                </div>
                <div id="collapse<? echo $faq->id; ?>" class="acod-body collapse <? echo $i == 1? 'show':''; ?>" data-parent="#accordion0016">
                  <div class="acod-content">
                  <p><?php echo $faq->answer ?></p>
                  </div>
                </div>
              </div>
            <?php $i++; endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php endif ?>

<?php if (!empty($ratingAnalysis['average'])): ?>

<div class="section-full bg-white content-inner airticket detail-page p-t40-i p-b0-i" id="reviews">
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
										<div class="col-xl-4 col-lg-8 col-md-7 col-sm-7 rating-star-section-1">
                  <div class="post_review-section">
                                                            <span>
                                                                5 Stars
                                                            </span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                                                            <span>
                                                                4 Stars
                                                            </span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                                                            <span>
                                                                3 Stars
                                                            </span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                                                            <span>
                                                                2 Stars
                                                            </span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                  <div class="post_review-section">
                                                            <span>
                                                                1 Stars
                                                            </span>
                    <ul class="item-review">
                      <li><i class="fa fa-star"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                      <li><i class="fa fa-star-o"></i></li>
                    </ul>
                  </div>
                </div>
										<div class="col-xl-6 col-lg-4 col-md-3 m-t10 rating-star-section-2">
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
										<div class="col-xl-2 col-lg-4 col-md-5 col-sm-5  m-t10 rating-star-section-3">
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
<!-- Content END-->
