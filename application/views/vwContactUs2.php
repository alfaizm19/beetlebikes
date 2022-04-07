<div class="breadcrumb_content">
    <h4>contact</h4>
    <p><a href="">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Contact</p>
  </div>


<div class="contact_form">
  <style type="text/css">
    footer{margin-top: 0;}
  </style>
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6">
        <h4>DROP US A LINE</h4>
        <p>Thank you for visiting us! Please complete the form below, we promise to get back to you within 24 hours.</p>
        <span class="mandatory">Mandatory fields are marked <span class="required">*</span></span>
        <form id="contact" method="post">
            <div id="resetFinalContactError"></div>
            <label for="name" class="form-label">Your Name<span class="required">*</span></label>
            <div class="input-group mb-3">
              <input type="text" class="form-control nameErr removeErr" id="name" placeholder="" aria-label="name" name="name" aria-describedby="basic-addon1">
            </div>
            
            <label for="email" class="form-label">Your Email<span class="required">*</span></label>
            <div class="input-group mb-3">
              <input type="text" class="form-control emailErr removeErr" name="email" id="email" placeholder="" aria-label="email" aria-describedby="basic-addon1">
            </div>
            
            <label for="phone" class="form-label">Your Phone Number<span class="required">*</span></label>
            <div class="input-group mb-3">
              <input name="phone" type="text" class="form-control phoneErr removeErr" id="phone" placeholder="" aria-label="phone" aria-describedby="basic-addon1">
            </div>
            
            <label for="message" class="form-label">Your Message</label>
            <div class="input-group mb-4">
              <textarea rows="10" class="w-100 form-control messageErr removeErr" id="message" name="message"></textarea>
            </div>

            <div class="captcha_blk">
              <div class="form-group">
                <div class="g-recaptcha g-recaptcha-responseErr remove-err" data-sitekey="<?php echo captcha_site_key ?>"></div>
              </div>
            </div>

            <div class="form-btn">              
              <!-- <button id="btnSend" type="submit">Send</button> -->
              <input id="btnSend" type="submit" value="Send">
            </div>
        </form>
      </div>
      <div class="col-md-6">
        <h4 class="mandatory">OFFICE ADDRESS</h4>
        <p class="mb-0">
          <? echo str_replace(',', ', <br>', $this->data['setting']->site_address) ?>
        </p>
        <!-- <p class="mb-0">Vinita Michael FZE,</p>
        <p class="mb-0">Creative City,</p>
        <p class="mb-0">P.O. Box 4422,</p>
        <p class="mb-0">Fujairah, UAE</p> -->
        <br>
        <p class="mb-0">TEL: <a href="tel:<? echo $this->data['setting']->site_phone_number ?>" class="text-white">
          <? echo $this->data['setting']->site_phone_number ?></a></p>
        <p class="mb-0"><? echo $this->data['setting']->timing ?></p>
        <p class="mb-0">Email: <a href="mailto:<? echo $this->data['setting']->site_email ?>"><? echo $this->data['setting']->site_email ?></p>
      </div>
    </div>
  </div>
</div>