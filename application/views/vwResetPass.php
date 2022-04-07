<div class="breadcrumb_content">
    <h4>Change Password</h4>
    <p><a href="<?php echo site_url() ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Change Password</p>
  </div>


<div class="login_content">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-6" style="margin: 0 auto; display: block">
        <div class="form-login forgot_cont">
          <!-- <h2><p>Lost your password? Please enter your email address. You will receive a link to create a new password via email.</p></h2> -->
            <span>Mandatory fields are marked <span class="required">*</span></span>

            <div><div class="alert_container text-center" id="resetFinalError"></div></div>

            <form method="post" id="change" class="login common-form">
                <label for="new" class="form-label">New Password <span class="required">*</span></label>
                <div class="input-group mb-3">
                  <input name="password1" type="password" class="form-control password1Err removeErr" id="password1" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>

                <label for="email" class="form-label">Confirm Password <span class="required">*</span></label>
                <div class="input-group mb-3">
                  <input name="password2" type="password" class="form-control password2Err removeErr" id="password2" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>

                <input type="hidden" name="token" value="<?php echo $this->uri->segment(2); ?>">

                <p class="form-row pt-2 d-flex justify-content-between">
                  <button id="btnChange" type="submit" class="button">Change Password</button>
                  <button type="button" id="cancel" class="button">Back</button>
                </p>
          </form>
        </div>
      </div>
  </div>
</div>
</div>