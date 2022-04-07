
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Change Password</li>
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
                    <form id="resetPassForm" method="post" class="login">
                        
                        <div class="form-fields">
                            <h2>Reset Password</h2>

                            <p class="form-row form-row-wide">
                                <label for="username">New Password <span class="required">*</span></label>
                                <input type="password" class="input-text" name="password" id="password" value="">
                                <span id="passwordErr" class="removeErr error text-danger"></span>
                            </p>

                            <p class="form-row form-row-wide">
                                <label for="username">Confirm Password <span class="required">*</span></label>
                                <input type="password" class="input-text" name="cpassword" id="cpassword" value="">
                                <span id="cpasswordErr" class="removeErr error text-danger"></span>
                            </p>

                            <div id="resetPassMsg"></div>
                        </div>

                        <div class="form-action">
                            <p class="lost_password">Not register yet? <a href="<?php echo base_url().'register'; ?>"><strong>Register Now</strong></a>
                            </p>
                            <div class="actions-log">
                                <input type="submit" class="button" id="resetPassBtn" value="Submit">
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
        
        $("#resetPassForm").submit(function(event) {
            event.preventDefault();

            formData = $(this).serialize();
            url = "<?php echo base_url('ajax/resetPassword') ?>";

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: formData,
                beforeSend: function() {
                    $("#resetPassBtn").val('Please wait...');
                    $("#resetPassMsg").html('');
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
                            $("#resetPassMsg").html(`
                                <div class="alert alert-danger">${res.msg}</div>
                            `)

                            if (res.redirect != '') {
                                setTimeout(function() {
                                    window.location.href = res.redirect;
                                }, 4000);
                            }
                        }
                    } else {
                        $("#resetPassMsg").html(`
                            <div class="alert alert-success">${res.msg}</div>
                        `);

                        setTimeout(function() {
                            window.location.href = res.redirect;
                        }, 4000);
                    }

                    $("#resetPassBtn").val('Submit');
                }
            });
            

        });

    });
</script>