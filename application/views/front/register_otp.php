
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

                    <form method="post" class="register" action="">
                        <div class="form-fields">
                            <?php 
                                if($this->session->flashdata('reSendOtp'))
                                { 
                                    echo '<span class="error" style="color:green">'.$this->session->flashdata('reSendOtp').'</span>'; 
                                    unset($_SESSION['reSendOtp']);
                                }
                            ?>       
                            <p class="form-row form-row-wide">
                                    <label for="">Please enter OTP send to mobile +91- <?php echo substr($mobile_no, 0, 4); ?>XXXXX </label>
                                    
                                    <input type="text" class="input-text" name="optVerification" id="optVerification" value="" maxlength="6" style="width:60%"><br>
                                    <span class="error" style="color:red">
                                        <?php if($optVerificationError){ echo $optVerificationError['optVerification']; } ?>
                                            
                                    </span>
                                    <?php 
                                        if($this->session->flashdata('otpCheckError'))
                                        { 
                                            echo '<span class="error" style="color:red">'.$this->session->flashdata('otpCheckError').'</span>'; 
                                            unset($_SESSION['otpCheckError']);
                                        }
                                    ?>        
                            </p>
                            <div class="actions-log">
                                <input type="submit" class="button" name="register_otp" value="Submit">
                            </div>
                                       
                            <p></p>
                            <a href="<?php echo base_url();?>register/resend">Resend OTP</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>