
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Forgot Password</li>
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
                <div class="customer-login my-account">
                    <form id="forgotPassForm" method="post" class="login">
                        
                        <div class="form-fields">
                            <h2>Forgot Password</h2>
                            <p class="form-row form-row-wide">
                                <label for="username">Mobile Number <span class="required">*</span></label>
                                <input type="text" class="input-text" name="mobile" id="mobile" value="">
                                <span id="mobileErr" class="removeErr error text-danger"></span>
                            </p>

                            <div id="forgotPassMsg"></div>
                        </div>

                        <div class="form-action">
                            <p class="lost_password">Not register yet? <a href="<?php echo base_url().'register'; ?>"><strong>Register Now</strong></a>
                            </p>
                            <div class="actions-log">
                                <input type="submit" class="button" id="forgotPassBtn" value="Submit">
                            </div>
                        </div>                         
                    </form>

                    <form id="forgotPassOtpForm" method="post" class="login" style="display:none;">
                        
                        <div class="form-fields">
                            <h2>Forgot Password</h2>

                            <p class="form-row form-row-wide">
                                <label for="username">Enter OTP <span class="required">*</span></label>
                                <input type="text" class="input-text" name="otp" id="otp" value="">
                                <span id="otpErr" class="removeErr error text-danger"></span>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="username">
                                    <a id="resendForgotOtp" href="javascript:void(0)">Resend OTP</a>
                                </label>
                            </p>

                            <div id="forgotPassOtpMsg"></div>
                            <div id="resendForgotOtpMsg"></div>
                        </div>

                        <div class="form-action">
                            <p class="lost_password">Not register yet? <a href="<?php echo base_url().'register'; ?>"><strong>Register Now</strong></a>
                            </p>
                            <div class="actions-log">
                                <input type="submit" class="button" name="forgotPassOtpBtn" value="Submit">
                            </div>
                        </div>                         
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        
        $("#forgotPassForm").submit(function(event) {
            event.preventDefault();

            formData = $(this).serialize();
            url = "<?php echo base_url('ajax/forgotPass') ?>";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: formData,
                beforeSend: function() {
                    $("#forgotPassBtn").val('Please wait...');
                    $("#forgotPassMsg").html('');
                    $(".removeErr").html('');
                },
                success: function(res) {
                    
                    if (res.error == true) {
                        if (res.type == 'field') {
                            $.each(res, function(index, val) {
                                $("#"+index+"Err").text(val)
                            });
                        }

                        if (res.type == 'final') {
                            $("#forgotPassMsg").html(`
                                <div class="alert alert-danger">${res.msg}</div>
                            `)
                        }
                    } else {
                        $("#forgotPassForm").hide();
                        $("#forgotPassOtpForm").show();
                    }

                    $("#forgotPassBtn").val('Submit');
                }
            });
            

        });

        $("#resendForgotOtp").click(function(event) {
            
            formData = $(this).serialize();
            url = "<?php echo base_url('ajax/resendForgotOtp') ?>";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: formData,
                beforeSend: function() {
                    $("#resendForgotOtp").html('Please wait...');
                    $("#resendForgotOtpMsg").html('');
                    $(".removeErr").html('');
                },
                success: function(res) {
                    
                    if (res.error == true) {
                        if (res.type == 'field') {
                            $.each(res, function(index, val) {
                                $("#"+index+"Err").text(val)
                            });
                        }

                        if (res.type == 'final') {
                            $("#resendForgotOtpMsg").html(`
                                <div class="alert alert-danger">${res.msg}</div>
                            `)
                        }
                    } else {
                        $("#resendForgotOtpMsg").html(`
                            <div class="alert alert-success">${res.msg}</div>
                        `)

                        setTimeout(function() {
                            $("#resendForgotOtpMsg").html('');
                        }, 4000);
                    }

                    $("#resendForgotOtp").html('Resend OTP');
                }
            });
        });

        $("#forgotPassOtpForm").submit(function(event) {
            event.preventDefault();

            formData = $(this).serialize();
            url = "<?php echo base_url('ajax/validateForgotOtp') ?>";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: formData,
                beforeSend: function() {
                    $("#forgotPassOtpBtn").val('Please wait...');
                    $("#forgotPassOtpMsg").html('');
                    $(".removeErr").html('');
                },
                success: function(res) {
                    
                    if (res.error == true) {
                        if (res.type == 'field') {
                            $.each(res, function(index, val) {
                                $("#"+index+"Err").text(val)
                            });
                        }

                        if (res.type == 'final') {
                            $("#forgotPassOtpMsg").html(`
                                <div class="alert alert-danger">${res.msg}</div>
                            `)
                        }
                    } else {
                        window.location.href = res.redirect
                    }

                    $("#forgotPassOtpBtn").val('Submit');
                }
            });
            

        });
        



    });
</script>