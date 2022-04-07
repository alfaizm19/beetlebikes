<div class="page-content bg-white">
	<div class="breadcrumb-strap">
		<div class="container-lg">
			<div class="row justify-content-between">
				<div class="col-md-auto align-self-center">
					<h1 class="page-title">My Profile</h1>
				</div>
				<div class="col-md-auto align-self-center">
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="javascript:void(0);">Home</a></li>
							<li>My Profile</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- contact area -->
	<div class="content-block">
		<div class="section-full bg-white content-inner home-tabs">
			<div class="container-lg">
				<div class="row">
					<?php echo $user_menu ; ?>
					<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
						<h2 class="font_nunito font-weight-700 font-34 m-b30">My Profile</h2>
						<div class="m-t20">
							<div id="edit_message"></div>
							<form role="search" enctype="multipart/form-data" method="post" class="myprofile" action="editprofile" id="editprofile" onsubmit="return false">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group">
											<input name="first_name" type="text" class="form-control font-20-i font_karla_i" placeholder="First Name*"  id="edit_first_name" value="<?php echo $user->first_name; ?>">
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="last_name" type="text" class="form-control font-20-i font_karla_i" placeholder="Last Name*" id="edit_last_name" value="<?php echo $user->last_name; ?>"  >
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<select name="country" id="archives-dropdown--1" class="bs-select-hidden" id="edit_country" >
											<option value="<?php echo $user->country; ?>"><?php echo $user->country; ?></option>
											<option value="uae"> UAE</option>
											<option value="usa"> USA</option>
										</select>
									</div>
									<!-- <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="email" type="email" class="form-control font-20-i font_karla_i" placeholder="Email*"  value="<?php echo $user->last_name; ?>" >
										</div>
									</div> -->
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group">
											<input name="street_address" id="edit_street_address" type="text" class="form-control font-20-i font_karla_i" placeholder="Street Address*" value="<?php echo $user->street_address; ?>" >
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="phone_number" id="edit_phone_number" type="text" class="form-control font-20-i font_karla_i" placeholder="Phone Number*" value="<?php echo $user->phone_number; ?>" >
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group">
											<input name="city" type="text" id="edit_city" class="form-control font-20-i font_karla_i" placeholder="City*" value="<?php echo $user->city; ?>" >
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="dob" type="text" class="form-control font-20-i font_karla_i" placeholder="Date of Birth*"  id="dob" value="<?php echo $user->dob; ?>">
											<span class="input-group-btn">
                                                            <button type="button" class="fa fa-calendar-o text-primary"></button>
                                                        </span>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group">
											<input onchange="readURL(this)" name="user_image" id="edit_picture" type="file" class="form-control font-20-i font_karla_i" placeholder="Upload Profile Picture*">
											  <div id="file-upload-filename"></div>
											<span class="file_text">Upload Profile Picture*</span>
											<span class="input-group-btn">
                                                            <button type="buntton" class="fa-rotate-90 ti-clip text-primary font-22"></button>
                                                        </span>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<div class="input-group font-20 font_karla">
											<input name="zip_code" type="text" id="edit_zip" class="form-control font-20-i font_karla_i" placeholder="Zip Code/Postal Code*"  value="<?php echo $user->zip_code; ?>">
										</div>
									</div>
									<div class="offset-lg-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 m-b20">
										<input name="update" type="submit" value="Update Profile" class="site-button btn-lg">
										<a href="blog-single.html" title="Cancel" class="site-button btn-lg bg-theme-blue m-l15">Cancel</a>
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


function readURL(input){
	var image = input.value;

	image = image.replace(/^.*[\\\/]/, '')

	$(".file_text").html(image);
}

$(document).ready(function (e){
$("#editprofile").on('submit',(function(e){
e.preventDefault();

		var succ = true;

		var phoneno = /^\d{10}$/;

		if($("#edit_first_name").val() == ""){

			$("#edit_first_name").css('border','2px solid red');
		succ = false;

		}else{

		$("#edit_first_name").css('border','');
		

		}



		if($("#edit_last_name").val() == ""){

			$("#edit_last_name").css('border','2px solid red');
		succ = false;

		}else{

		$("#edit_last_name").css('border','');
	

		}




		if($("#archives-dropdown--1").val() == ""){

			$("#archives-dropdown--1").css('border','2px solid red');
		succ = false;

		}else{

		$("#archives-dropdown--1").css('border','');
		

		}


		if($("#edit_street_address").val() == ""){

			$("#edit_street_address").css('border','2px solid red');
		succ = false;

		}else{

		$("#edit_street_address").css('border','');
		

		}


		if($("#edit_phone_number").val().length !== 10 || $("#edit_phone_number").val().match(phoneno) == false){

			$("#edit_phone_number").css('border','2px solid red');
		succ = false;

		}else{

		$("#edit_phone_number").css('border','');
		

		}



		if($("#edit_city").val() == ""){

			$("#edit_city").css('border','2px solid red');
		succ = false;

		}else{

		$("#edit_city").css('border','');
		

		}


	if($("#dob").val() == ""){

			$("#dob").css('border','2px solid red');
		succ = false;

		}else{

		$("#dob").css('border','');
		

		}


	if($("#edit_zip").val() == ""){

			$("#edit_zip").css('border','2px solid red');
		succ = false;

		}else{

		$("#edit_zip").css('border','');
		

		}


		if(succ){
$.ajax({
url: $("#editprofile").attr("action"),
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data){
$('#edit_message').html('<div class="alert alert-success fade in alert-dismissible show m-l20 m-r20"> '+data+ '</div>');
  		jQuery('.alert-success').delay(2000).fadeOut('slow');
  		setTimeout(function(){ location.reload(); }, 3000);

  		
},
error: function(){} 	        
});


}


}));
});


	
  $( function() {
    $( "#dob" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );

</script>