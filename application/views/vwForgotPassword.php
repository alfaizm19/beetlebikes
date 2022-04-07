<section class="wrapper-main">
<section class="inner-banner productPage">
     <figure> <!--img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/products-banner.jpg" class="img-fluid" /--></figure>
</section>

<div class="inner-wrapper">





  <div class="breadcrumb-main">
   
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li class="active">Forgot password</li>
    </ol>
   
  </div>


  <section class="login-wrapper">
    <section class="login-content">
      <section class="logon-title">
        <h1>Forgot your password?</h1>
       </section>
       <div id="divMessage"></div>
       <p class="term"><b>No problem!</b><br>We will send you an email to reset your password. Just enter the same email address you used for registration on Blue Crown Furniture. We will send you an email with instructions for resetting your password.</p>
       <form name="sendrequestform" id="sendrequestform" method="post" enctype='multipart/form-data'>
      <aside class="form-group">
        <!--label>Email</label-->
        <input placeholder="Email Address" type="email" name="reg_email" id="reg_email" required class="form-control" >
      </aside>
      <button type="submit" id="sendRequest" name="sendRequest" class="loginbtn">Send Request</button>
      </form>
       <p class="term"><a href="<?php echo base_url('sign-in'); ?>">Back to Sign In</a></p>
      </section>
  </section>
  
  </div>
    </section>