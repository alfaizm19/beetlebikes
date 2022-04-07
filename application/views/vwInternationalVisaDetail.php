<div class="page-content bg-white brd_crumb page_det">
<div class="top-banner-bg" <?php echo !empty($visa->banner_image)? 'style="background:url('.base_url($visa->banner_image).')"':''; ?>></div>
  <div class="breadcrumb-strap">
    <div class="container-lg">
      <div class="row justify-content-between">
        <div class="col-md-auto align-self-center">
          <h1 class="page-title">
            <?php echo $visa->visa_name ?>
          </h1>
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
    <div class="section-full bg-white content-inner careers visa-single p-b40-i p-t40-i">
      <div class="container-lg">
        <div class="row">
					<div class="col-md-4 col-lg-4 col-xl-4">
            <ul class="tour-features rounded">
              <li class="fa fa-calendar-o"><?php echo $working_days; ?></li>
              <li class="fa fa-file-text-o">Easy Documentation</li>
            </ul>
          </div>
					<div class="col-md-4 col-lg-4 col-xl-4">
            <ul class="tour-features rounded">
              <li class="fa fa-customer-care-c">Customer Care</li>
              <li class="fa fa-payment-c">Online Payment</li>
            </ul>
          </div>
					<div class="offset-xl-auto offset-lg-auto col-md-4 col-lg-4 col-xl-4 col-sm-12 display-a-c">
									<div class="page-price-wrap font_karla font-weight-700 price_sec">
                    <?php if ($discount>0): ?>
                      <span class="d-inline-block">
  											<del><?php echo get_currency() ?> <?php echo $price ?></del>
  										</span>
                    <?php endif ?>
										<span class="d-flex">
											<span class="font-24">Price</span>
											<span class="font-38"><?php echo get_currency() ?> <?php echo $discount>0? $price-($price*$discount/100):$price; ?></span>
                    </span>
              <a href="javascript:;" title="Book Now" class="site-button btn-lg font-28 font_karla font-weight-700">BOOK NOW</a>
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
            <a class="nav-link active" href="#">VISAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">DESCRIPTION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">DOCUMENTS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">HOW TO APPLY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">REVIEWS</a>
          </li>
        </ul>
      </div>
    </div>
		</div>

    <?php if (!empty($visaOptions)): ?>
    <div class="section-full bg-theme-blue content-inner careers m-t40 p-t40-i p-b40-i">
      <div class="container-lg">
      <div class="mobres_scrl">
        <form role="search" method="post" class="myprofile airticket airticket-form">
          <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-6">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5">
                  <h3 class="font_karla font-24 font-weight-700 text-white text-center">Visa Options</h3>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <h3 class="font_karla font-24 font-weight-700 text-white text-center">Processing Type</h3>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <h3 class="font_karla font-24 font-weight-700 text-white text-center">No. of Visa</h3>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
              <div class="row">
                <div class="offset-lg-1 offset-md-1 offset-sm-1 col-lg-5 col-md-5 col-sm-5">
                  <h3 class="font_karla font-24 font-weight-700 text-white text-center">Travel Date</h3>
                </div>
                <div class="offset-lg-1 offset-md-1 offset-sm-1 col-lg-5 col-md-5 col-sm-5">
                  <h3 class="font_karla font-24 font-weight-700 text-white text-center">Price</h3>
                </div>
              </div>
            </div>

            <?php 
              foreach ($visaOptions as $visaOpt):
                $price_aed = $visaOpt->normal_aed;
                $price_usd = $visaOpt->normal_usd;
                $discount = $visaOpt->normal_discount;

                $curr = get_currency();

                if ($curr == 'AED') {
                  $price = $price_aed;
                } else {
                  $price = $price_usd;
                }
            ?>
            <div class="col-lg-7 col-md-6 col-sm-6">
              <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5">
                  <input type="checkbox" name="terms" id="visa_option<? echo $visaOpt->id ?>" value="<? echo $visaOpt->id ?>" required="">
                  <label for="one-way" class="font-18 font_karla font-weight-400 text-white line-h-20 m-t10">
                    <?php echo $visaOpt->visa_option_name ?>
                  </label>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                  <select name="processing_type" id="archives-dropdown--2" class="bs-select-hidden processing_type processing_type_<? echo $visaOpt->id ?>" data-id="<? echo $visaOpt->id ?>">
                    <?php if (!empty($visaOpt->normal_aed)): ?>
                    <option 
                      data-id="<? echo $visaOpt->id ?>"
                      data-aed="<? echo $visaOpt->normal_aed ?>"
                      data-usd="<? echo $visaOpt->normal_usd ?>"
                      data-discount="<? echo $visaOpt->normal_discount ?>"
                      value="normal">Normal</option>
                    <?php endif ?>
                    <?php if (!empty($visaOpt->express_aed)): ?>
                    <option
                      data-id="<? echo $visaOpt->id ?>"
                      data-aed="<? echo $visaOpt->express_aed ?>"
                      data-usd="<? echo $visaOpt->express_usd ?>"
                      data-discount="<? echo $visaOpt->express_discount ?>"
                      value="express">Express</option>         
                    <?php endif; ?>
                  </select>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                  <select name="visa" id="archives-dropdown--1" class="bs-select-hidden m-b30 visa visa_<? echo $visaOpt->id ?>">
                    <?php 
                        for($i=1; $i<=20; $i++){
                          echo '<option data-id="'.$visaOpt->id.'" value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-6">
              <div class="row">
                <div class="offset-lg-1 offset-md-1 offset-sm-1 col-lg-5 col-md-5 col-sm-5">
                  <div class="input-group font-20 font_karla m-b30">
                    <input name="travel_date" type="date" class="form-control font-20-i font_karla_i" placeholder="00/00/00">
                  </div>
                </div>
                <div class="offset-lg-1 offset-md-1 offset-sm-1 col-lg-5 col-md-5 col-sm-5">
                  <div class="page-price-wrap font_karla font-weight-700 text-center">
                    <span class="d-inline-block text-white">
                          
                          <div id="visa_discount_<? echo $visaOpt->id ?>">
                            <?php if ($discount>0): ?>
                              <del><?php echo $curr ?> <?php echo $price ?></del>
                            <?php endif ?>
                          </div>

                          <span class="font-38" id="visa_price_<? echo $visaOpt->id ?>">
                            <?php echo $curr ?> 
                            <?php echo $discount>0? $price-(($price*$discount)/100):$price; ?>
                        </span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach ?>

          </div>
        </form>
        </div>
      </div>
    </div>
    <?php endif ?>

		<div class="section-full bg-white content-inner detail-page p-0 m-t20 m-b10">
      <div class="container-lg">
        <div class="text-right">
          <input name="submit" type="submit" value="Add to Cart" class="site-button btn-lg font-22-i font-weight-700 font_karla">
        </div>
      </div>
    </div>
    <div class="section-full bg-white content-inner airticket detail-page p-t0-i mob_toggl">
      <div class="container-lg">
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="detail-page-block">
              <h3 id="decrip">Description</h3>
              <div class="detail-page-block-text" id="toggle1">
                <?php echo $visa->description ?>
              </div>
            </div>
            <div class="detail-page-block m-t40">
              <h3 id="documents">Documents</h3>
              <div class="detail-page-block-text" id="toggle2">
                <?php echo $visa->documents ?>
              </div>
            </div>
            <div class="detail-page-block m-t40">
              <h3 id="apply">How to Apply</h3>
              <div class="detail-page-block-text" id="toggle3">
                <?php echo $visa->how_to_apply ?>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12 detail-sidebar">
            <div class="row">
              <div class="post card-container col-md-12">
								<div class="widget bg-white widget_getintuch p-t0-i m-t50">
                  <h4 class="widget-title bg-theme-blue text-center font-22 font_karla font-weight-700 p-a15 text-white"><span class="ti-headphone-alt theme_color"></span> Enquire Now</h4>
                  <div class="p-a20">
                    <?php if (isset($_GET['res']) && $_GET['res'] == 'success'): ?>
                    <div class="alert alert-success"> <strong><i class="fa fa-check"></i> Thank you</strong> for your message. It has been sent</div>
                    <?php endif ?>
                    <form action='https://crm.zoho.com/crm/WebToLeadForm' name=WebToLeads4730592000001137012 method='POST' onSubmit='javascript:document.charset="UTF-8"; return checkMandatory4730592000001137012()' accept-charset='UTF-8' class="myprofile">
                       <input type='text' style='display:none;' name='xnQsjsdp' value='dd1dcd3c49fb2ffd9279b8aea4a3e953079ff29b518f3c4649f0dc17377ee33e'></input>
                       <input type='hidden' name='zc_gad' id='zc_gad' value=''></input> 
                       <input type='text' style='display:none;' name='xmIwtLD' value='fa1d25f29b6c90f54d7b902146f61b1913b48c6b7139fd475e895dcd8def2d94'></input> 
                       <input type='text'  style='display:none;' name='actionType' value='TGVhZHM='></input>
                       <input type='text' style='display:none;' name='returnURL' value='http://emiratesdirectory.com/forevertourism/uae-visa/?uae=success' > </input>
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
                          <option selected>Select Nationality</option>
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
                          <input type='hidden' id='LEADCF16' name='LEADCF16' maxlength='255' value='American Visa'></input><div class='zcwf_col_help'></div></div></div>
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

                      function checkMandatory4730592000001137012() {
                        var mndFileds = new Array('Last Name','Email','Phone','LEADCF28', 'LEADCF27', 'Description');
                        var fldLangVal = new Array('Name','Email','Phone','LEADCF28', 'LEADCF27', 'Description');
                        for(i=0;i<mndFileds.length;i++) {
                          var fieldObj=document.forms['WebToLeads4730592000001137012'][mndFileds[i]];
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
    <div class="section-full bg-gray-light content-inner airticket detail-page p-t40-i p-b0-i">
      <div class="container-lg">
        <div class="row">
          <div class="col-md-12">
            <div class="detail-page-block">
              <div class="dlab-accordion box-sort-in m-b30 no-gap" id="accordion0016">

                <?php $i=1; foreach ($faqs as $faq): ?>
                <div class="panel">
                  <div class="acod-head">
                    <h6 class="acod-title"><a href="javascript:void(0);" data-toggle="collapse" aria-expanded="<? echo $i==1? 'true':''; ?>" data-target="#collapse<? echo $faq->id ?>" class="<? echo $i==1? 'collapsed':'' ?>"><?php echo $faq->question ?></a> 
                    </h6>
                  </div>
                  <div id="collapse<? echo $faq->id ?>" class="acod-body collapse <? echo $i==1? 'show':''; ?>" data-parent="#accordion0016" style="">
                    <div class="acod-content">
                      <?php echo $faq->answer ?>
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