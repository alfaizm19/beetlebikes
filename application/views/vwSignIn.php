<section class="wrapper-main">
<section class="inner-banner productPage">
     <figure> <!--img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/products-banner.jpg" class="img-fluid" /--></figure>
</section>

<div class="inner-wrapper">




  <div class="breadcrumb-main">

    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(''); ?>">Home</a></li>
      <li class="active"><?php echo $page->title; ?></li>
    </ol>

  </div>

<section class="login-wrapper">
    <section class="login-content">
      <section class="logon-title">


			 <h1><?php echo $page->title; ?></h1>


        <a href="<?php echo base_url('sign-up'); ?>">Sign up</a> </section>
        <div id="divMessage"></div>
  <form id="sign_in_form" name="sign_in_form" enctype="multipart/form-data">
      <aside class="form-group">
        <!--label>Email</label-->
        <input  type="email" placeholder="Email"  id="user_email" required name="user_email" value="<?php echo (get_cookie('remember_me') && get_cookie('user_email')) ? get_cookie('user_email') : ''; ?>" class="form-control" >
      </aside>
      <aside class="form-group">
        <!--label>Password</label-->
        <input  type="password" placeholder="Password" id="password" required  name="password" value="<?php echo (get_cookie('remember_me') && get_cookie('user_password') ) ? get_cookie('user_password') : ''; ?>" class="form-control" >
      </aside>
      <section class="remember">
       <section class="remember-notification">
            <label id="verifyBtn" for="verify_notification1">
              <!-- <span>&nbsp;</span> -->
              <input type="checkbox" name="verify_notificationsignin" id="verify_notification"  value="<?php echo (get_cookie('remember_me')) ? 1 : 1; ?>" <?php echo (get_cookie('user_email')) ? 'checked' : ' '; ?>>

              Remember Me [?]
            </label>
       </section>
        <a href="<?php echo base_url('forgot-password'); ?>" class="forgot">Forgot password?</a> </section>
        <button type="submit" class="loginbtn" name="signin" id="signin">Sign In</button>
      </form>
      <p>Don't have an account?</p>
      <a href="<?php echo base_url('sign-up'); ?>" class="signup-btn">Sign Up</a> </section>
  </section>
  </div>
   </section>