
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Register</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs-area end -->

<div class="customer-login-area">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="customer-register my-account">
                    <form method="post" class="register" action="<?php echo base_url();?>register">
                        <div class="form-fields">
                            <h2>Register</h2>
                            <p class="form-row form-row-wide">
                                <label for="">Name <span class="required">*</span></label>
                                <input type="text" class="input-text" name="name" id="reg_name" value="<?php echo isset($registerData['name']) ? $registerData['name'] : '' ?>">
                                <span class="error" style="color:red"><?php echo isset($registerError['name']) ? $registerError['name'] : '' ?></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_email">Email address <span class="required">*</span></label>
                                <input type="email" class="input-text" name="email" id="reg_email" value="<?php echo isset($registerData['email']) ? $registerData['email'] : '' ?>">
                                <span class="error" style="color:red"><?php echo isset($registerError['email']) ? $registerError['email'] : '' ?></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_password">Password <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="reg_password" value="<?php echo isset($registerData['password']) ? $registerData['password'] : '' ?>">
                                <span class="error" style="color:red"><?php echo isset($registerError['password']) ? $registerError['password'] : '' ?></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="reg_password">Confirm Password <span class="required">*</span></label>
                                <input type="password" class="input-text" name="confirm_password" id="confirm_reg_password"  value="<?php echo isset($registerData['confirm_password']) ? $registerData['confirm_password'] : '' ?>">
                                <span class="error" style="color:red"><?php echo isset($registerError['confirm_password']) ? $registerError['confirm_password'] : '' ?></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="">Mobile No. <span class="required">*</span></label>
                                <input type="text" class="input-text" name="mobile" id="reg_mobile" value="<?php echo isset($registerData['mobile']) ? $registerData['mobile'] : '' ?>">
                                <span class="error" style="color:red"><?php echo isset($registerError['mobile']) ? $registerError['mobile'] : '' ?></span>
                            </p>
                            
                            <div style="left: -999em; position: absolute;">
                                <label for="trap">Anti-spam</label>
                                <input type="text" name="email_2" id="trap" tabindex="-1">
                            </div>
                        </div>
                        <div class="form-action">
                            <p class="lost_password"> Already have account? <a href="<?php echo base_url().'login'; ?>">Login</a></p>
                            <div class="actions-log">
                                <input type="submit" class="button" name="register_btn" value="Register">
                            </div>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </div>
</div>