<div class="m-login__wrapper">
  <div class="m-login__logo">
    <a href="<? echo $setting->site_url; ?>">
        <img src="<? echo base_url($setting->website_admin_logo); ?>" alt="<? echo $setting->site_project_name; ?>">
    </a>
  </div>
  <div class="m-login__signin">
    <div class="m-login__head"> <h3 class="m-login__title"> Verify OTP </h3> </div>
    
    <? echo display_flash('message'); ?>

    <form class="m-login__form m-form" action="<? echo base_url('admin/do-verify-otp'); ?>" method="post">
     <div class="form-group <?=(has_error('email') !== NULL ) ? 'has-danger' : '';?>">

      <label class="control-label">Email</label>
      <input class="form-control form-control-lg m-input m-input--air" data-msg-required="Please enter email." type="email" name="email" placeholder="Email" value="<?php echo $otpData['email'] ?>" disabled autofocus>
      <span class="form-control-feedback text-capitalize"><?=has_error('email')?></span>
    </div>

    <div class="form-group  <?=(has_error('otp') !== NULL ) ? 'has-danger' : '';?>">
      <label class="control-label">OTP</label>
      <input class="form-control form-control-lg m-input m-input--air" required data-msg-required="Please enter otp" name="otp" type="password" placeholder="OTP">
      <span class="form-control-feedback text-capitalize"><?=has_error('otp')?></span>
    </div>

    <!-- <div class="row m-login__form-sub">
      <div class="col m--align-right">
        <a href="<? echo site_url('admin/forgot-password'); ?>" id="m_login_forget_password" class="m-link">
          Forget Password ?
        </a>
      </div>
    </div> -->
    
    <div class="m-login__form-action">
      <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">
      Verify
      </button>
    </div>
  </form>
  </div>
</div>