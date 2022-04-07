
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Login</li>
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
                    <form method="post" class="login">
                        
                        <div class="form-fields">
                            <?php 
                                if($this->session->flashdata('loginCheckError'))
                                { 
                                    echo '<span class="error" style="color:red">'.$this->session->flashdata('loginCheckError').'</span><br>'; 
                                    unset($_SESSION['loginCheckError']);
                                }
                            ?>
                            <?php 
                                if($this->session->flashdata('accountVerify')):
                                    echo '<span class="error" style="color:green">'.$this->session->flashdata('accountVerify').'</span><br>'; 
                                    unset($_SESSION['accountVerify']);
                            ?>

                            <script type="text/javascript">
                                fbq('track', 'CompleteRegistration');
                            </script>

                            <?php endif; ?>

                            <h2>Login</h2>
                            <p class="form-row form-row-wide">
                                <label for="username">Phone or email address <span class="required">*</span></label>
                                <input type="text" class="input-text" name="username" id="username" value="<?php echo isset($loginData['username']) ? $loginData['username'] : '' ?>">
                                <span class="error" style="color:red"><?php echo isset($loginError['username']) ? $loginError['username'] : '' ?></span>
                            </p>
                            <p class="form-row form-row-wide">
                                <label for="password">Password <span class="required">*</span></label>
                                <input class="input-text" type="password" name="password" id="password" value="<?php echo isset($loginData['password']) ? $loginData['password'] : '' ?>">
                                <span class="error" style="color:red">
                                    <?php echo isset($loginError['password']) ? $loginError['password'] : '' ?>
                                </span>
                            </p>
                        </div>

                        <div class="form-action">
                            <p class="lost_password">Not registered yet? <a href="<?php echo base_url().'register'; ?>"><strong>Register Now</strong></a>
                            </p>
                            <div class="actions-log">
                                <input type="hidden" name="redirect" value="<?php echo $this->input->get('redirect') ?>">
                                <input type="submit" class="button" name="loginBtn" value="Login">
                            </div>
                            <label for="rememberme" class="inline"> 
                            <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember me </label>
                        </div>    
                        <div class="form-action">
                           
                            <p class="lost_password"> <a href="<?php echo base_url('forgot-password') ?>">Lost your password?</a></p>
                            
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>