<section class="section loginRegPanel section-45 mb-4">
  <div class="container text-left">
    <div class="row">
      <div class="col-12">
        <div class="row mt-3">
          <div class="col-md-4 mx-auto mb-4">
            <div class="separator text-dark">
              Forgot Password
            </div>
          </div>
        </div>
        <form method="post" id="forgotForm">
          <div class="row mt-3">
            <div class="col-md-4 mx-auto">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <div class="form-wrap">
                    <label class="text-light font-italic form-label-outside" for="phone">Phone number<span class="text-primary">*</span></label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="phone" type="text" name="phone"><span id="phoneErr" class="form-validation"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4 mx-auto">
              <div class="row mt-3">
                <div class="col-12 text-center">

                  <div id="finalForgotMsg"></div>

                  <input type="hidden" name="action" value="<?php echo $this->input->get('action') ?>">

                  <button type="submit" id="btnReset" class="btn btn-login btn-block px-3 rounded-btn">Reset Password</button>
                </div>
                <div class="col-md-4 mt-3 forgotPass">
                  <a href="<?php echo base_url('login') ?>">Login</a>
                </div>
                <div class="col-md-8 text-right mt-3 forgotPass">
                <?php 
                          $action = $this->input->get('action');

                          if ($action == 'checkout') {
                            $redirect = base_url('register?action=checkout');
                          } else {
                            $redirect = base_url('register');
                          }
                        ?>

                          New to MMTC-PAMP? <a href="<?php echo $redirect; ?>">Create an Account</a>
                </div>
              </div>
            </div>
          </div>
        </form>

        <form method="post" id="forgotOtpForm" class="hide">
          <div class="row mt-3">
            <div class="col-md-4 mx-auto">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <div class="form-wrap">
                    <label class="text-light font-italic form-label-outside" for="otp">OTP<span class="text-primary">*</span></label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="otp" type="number" name="otp">

                    <a href="javascript:void(0)" class="pull-right mt-3 mb-3" id="resendForgot">
                      <label class="resend-label text-light font-italic form-label-outside" for="resend">Resend OTP</label>
                    </a>

                    <span id="otpErr" class="form-validation"></span>

                    <div id="finalForgotOtpMsg"></div>

                    <button type="submit" id="btnForgotValidateOTP" class="btn btn-login btn-block px-3">Validate OTP</button>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>