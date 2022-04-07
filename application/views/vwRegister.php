<section class="section loginRegPanel section-45 mb-4">
  <div class="container text-left">
    <div class="row">
      <div class="col-12">
      <div class="row mt-3">
            <div class="col-md-4 mx-auto mb-4">
              <div class="separator text-dark">Sign Up with MMTC-PAMP</div>
            </div>

              <!-- 09052021 Start  -->

              <!-- <div class="col-12">
                <div class="row">
                  <div class="col-md-4 mx-auto mb-4 text-center">
                    <button class="btn btn-default btn-block facebookBtn"><i class="fa fa-facebook-square"></i> Facebook</button>
                  </div>
                </div>
              </div>
              <div style="clear:both;"></div>
              <div class="col-12">
                <div class="row">
                  <div class="col-md-4 mx-auto mb-2 text-center">
                    <button class="btn btn-default btn-block googleBtn"><i class="fa fa-google"></i> Google</button>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mx-auto">
                <div class="separator">OR</div>
              </div> -->

              <!-- 09052021 Start  -->
            
          </div>
            <form method="post" id="registerForm">
              <div class="row mt-3">
                <div class="col-md-4 mx-auto">
                  <div class="row">

                    <div class="col-lg-6 mb-3 offset-top-10 offset-md-top-0">
                      <div class="form-wrap">
                        <label class="text-light font-italic form-label-outside" for="fname">First name<span class="text-primary">*</span></label>
                        <input class="form-input form-control-has-validation form-control-last-child" id="fname" type="text" name="fname"><span id="fnameErr" class="form-validation"></span>
                      </div>
                    </div>

                    <div class="col-lg-6 mb-3 offset-top-10 offset-md-top-0">
                      <div class="form-wrap">
                        <label class="text-light font-italic form-label-outside" for="lname">Last name<span class="text-primary">*</span></label>
                        <input class="form-input form-control-has-validation form-control-last-child" id="lname" type="text" name="lname"><span id="lnameErr" class="form-validation"></span>
                      </div>
                    </div>

                    <div class="col-lg-12 mb-3">
                      <div class="form-wrap">
                      <label class="text-light font-italic form-label-outside" for="email-address">Email Address<span class="text-primary">*</span></label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="email" type="text" name="email">
                      <span id="emailErr" class="form-validation"></span>
                      </div>
                    </div>
                    
                    <div class="col-lg-12 mb-3 offset-top-10 offset-md-top-0">
                      <div class="form-wrap">
                      <label class="text-light font-italic form-label-outside" for="password">Password<span class="text-primary">*</span></label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="password" type="password" name="password">
                      <span id="passwordErr" class="form-validation"></span>
                      </div>
                    </div>
                    
                    <div class="col-lg-12 mb-3 offset-top-10 offset-md-top-0">
                      <div class="form-wrap">
                      <label class="text-light font-italic form-label-outside" for="cpassword">Confirm Password<span class="text-primary">*</span></label>
                      <input class="form-input form-control-has-validation form-control-last-child" id="cpassword" type="password" name="cpassword">
                      <span id="cpasswordErr" class="form-validation"></span>
                      </div>
                    </div>
                    
                    <div class="col-lg-6 mb-3 offset-top-10 offset-md-top-0">
                       <div class="form-wrap">
                          <label class="text-light font-italic form-label-outside" for="gender">Select Gender<span class="text-primary">*</span></label>
                          <select name="gender" id="gender" class=" form-control-has-validation form-control-last-child">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                          </select>
                          <span id="genderErr" class="form-validation"></span>
                      </div>
                    </div>
                    
                    <div class="col-lg-6 mb-3 offset-top-10 offset-md-top-0">
                      <div class="form-wrap">
                        <label class="text-light font-italic form-label-outside" for="mob-num">Mobile Number<span class="text-primary">*</span></label>
                        <input class="form-input form-control-has-validation form-control-last-child" id="mobileNum" type="text" name="mobileNum">
                        <span id="mobileNumErr" class="form-validation"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
              <div class="col-md-4 mx-auto">
              <div class="row mt-3">
                <div class="col-12 text-center">

                  <div id="finalRegisterMsg"></div>
                  <input type="hidden" name="action" value="<?php echo $this->input->get('action') ?>">
                  <button type="submit" id="btnRegister" class="btn btn-login btn-block px-3 rounded-btn">Register To Continue</button>
                </div>
                <div class="col-12 text-center mt-3 forgotPass">
                  Already an account <a href="<?php echo base_url('login') ?>">Login</a>
                </div>
              </div>
                </div>
              </div>
            </form>

            <form method="post" id="otpForm" class="hide">
              <div class="row mt-3">
                <div class="col-md-4 mx-auto">
                  <div class="row">
                    <div class="col-lg-12 mb-3">
                      <div class="form-wrap">
                        <label class="text-light font-italic form-label-outside" for="otp">OTP<span class="text-primary">*</span></label>
                        <input class="form-input form-control-has-validation form-control-last-child" id="otp" type="number" name="otp">

                        <a href="javascript:void(0)" class="pull-right mt-3 mb-3" id="resend">
                          <label class="resend-label text-light font-italic form-label-outside" for="resend">Resend OTP</label>
                        </a>

                        <span id="otpErr" class="form-validation"></span>

                        <div id="finalOtpMsg"></div>

                        <button type="submit" id="btnValidateOTP" class="btn btn-login btn-block px-3">Validate OTP</button>

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