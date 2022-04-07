<div class="fables-page-content">
  <div class="breadcrumb-main gray">
    <div class="container">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>">Home</a></li>
      <li class="active">Login</li>
    </ol>
    </div>
  </div>


  <section class="login-wrapper">
    <section class="login-content">
      <section class="logon-title">
        <h1>Reset Password</h1>
       </section>
       <div id="divMessage"></div>
        <form name="forgotpasswordform" id="forgotpasswordform" method="post" enctype='multipart/form-data'>
        <input type="hidden" name="verification_code" value="<?php echo $verification_code ?>"/>
      <aside class="form-group">
        <label for="password">Password</label>
        <input  type="password" name="new_password" id="new_password" required class="form-control" >
      </aside>
      <aside class="form-group">
        <label for="confirm_password">Confirm New Password</label>
        <input  type="password" name="confirm_password" id="confirm_password" required class="form-control" >
      </aside>
      <button type="submit" id="forgot_password" name="forgot_password" class="loginbtn">Submit</button>      
      </form>
      </section>
  </section>
  
  
  


  </div>
   