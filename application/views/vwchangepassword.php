	<div class="content-block">
		<div class="section-full bg-white content-inner home-tabs">
			<div class="container-lg">
				<div class="row">
					<?php echo $user_menu ; ?>
					<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
						<h2 class="font_nunito font-weight-700 font-34 m-b30">Change Password</h2>
						<div class="m-t20">
							<div id="edit_message"></div>
							<form role="search" method="post" class="myprofile" action="changepassword" id="changepassword" onsubmit="return false;">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group">
											<input name="current_password" id="current_password" type="password" class="form-control font-20-i font_karla_i" placeholder="Current Password*" >
										</div>
									</div>
									<div class="offset-md-6"></div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="new_password" id="new_password" type="password" class="form-control font-20-i font_karla_i" placeholder="New Password*">
										</div>
									</div>
									<div class="offset-md-6"></div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="confirmnew_password" id="confirmnew_password" type="password" class="form-control font-20-i font_karla_i" placeholder="Confirm Password*" >
										</div>
									</div>
									<div class="offset-md-6"></div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<input name="update" type="submit" value="Change Password" class="site-button btn-lg">
										<a href="javascript:;" title="Cancel" class="site-button btn-lg bg-theme-blue m-l15">Cancel</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script type="text/javascript">

$(document).ready(function (e){
$("#changepassword").on('submit',(function(e){
e.preventDefault();

		var succ = true;

	if($("#current_password").val().length < 6){
		$("#current_password").css('border','2px solid red');
		succ = false;
	}else{
		$("#current_password").css('border','1px');
		
	}


	if($("#new_password").val().length < 6){
		$("#new_password").css('border','2px solid red');
		succ = false;
	}else{
		$("#new_password").css('border','1px');
		
	}


	if($("#confirmnew_password").val().length < 6 || ($("#new_password").val() != $("#confirmnew_password").val())){
		$("#confirmnew_password").css('border','2px solid red');
		$("#new_password").css('border','2px solid red');
		succ = false;
	}else{
		$("#confirmnew_password").css('border','1px');
		
	}


		if(succ){
$.ajax({
url: $("#changepassword").attr("action"),
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$('#edit_message').html('<div class="alert alert-success fade in alert-dismissible show m-l20 m-r20"> '+data+ '</div>');
  		jQuery('.alert-success').delay(2000).fadeOut('slow');

  		setTimeout(function () {
       location.reload();
      }, 3000);

  		
  		
},
error: function(){} 	        
});


}


}));
});

	


</script>