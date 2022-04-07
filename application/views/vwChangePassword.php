<section class="section loginRegPanel section-45 mb-4">
  <div class="container text-left">
    <div class="row">
      <div class="col-12">

        <form method="post" id="changePassForm">
          <div class="row mt-3">
            <div class="col-md-4 mx-auto mb-4">
              <div class="separator text-dark">Change Password</div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-4 mx-auto">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <div class="form-wrap">
                  <label class="text-light font-italic form-label-outside" for="old-password">Old Password<span class="text-primary">*</span></label>
                  <input class="form-input form-control-has-validation form-control-last-child" id="oldPassword" type="password" name="oldPassword">
                  <span class="oldPasswordErr form-validation"></span>
                  </div>
                </div>
                
                <div class="col-lg-12 mb-3 offset-top-10 offset-md-top-0">
                  <div class="form-wrap">
                  <label class="text-light font-italic form-label-outside" for="new-password">New Password<span class="text-primary">*</span></label>
                  <input class="form-input form-control-has-validation form-control-last-child" id="newPassword" type="password" name="newPassword">
                  <span class="newPasswordErr form-validation"></span>
                  </div>
                </div>
                
                <div class="col-lg-12 offset-top-10 offset-md-top-0">
                  <div class="form-wrap">
                  <label class="text-light font-italic form-label-outside" for="confirmPassword">Confirm Password<span class="text-primary">*</span></label>
                  <input class="form-input form-control-has-validation form-control-last-child" id="confirmPassword" type="password" name="confirmPassword">
                  <span class="confirmPasswordErr form-validation"></span>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row mt-3">
          <div class="col-md-4 mx-auto">
          <div class="row mt-3">
            <div class="col-12 text-center">
              <div id="finalChangePassMsg"></div>
              <button type="submit" class="btn btnChangePass btn-block px-3 rounded-btn">Submit</button>
            </div>
          </div>
          </div>
          </div>
        
        </form>

      </div>
    </div>
  </div>
</section>