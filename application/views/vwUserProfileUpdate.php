<section class="wrapper-main">
	  <section class="inner-banner productPage">
		<figure> <img src="images/about-banner.jpg" alt=""/> </figure>
	  </section>
	  <section class="inner-wrapper">
		<aside class="breadcrumb-main">
		  <ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">My Account</li>
		  </ol>
		</aside>

		<div class="product-title text-center titleStyle">
		 <h1><span>My Account</span></h1>
		</div>



		<section class="login-wrapper" style="max-width: 700px;">
			<?php
				if($this->session->flashdata('successMessage'))
				{
			?>
			<div class="alert alert-success" id="showSuccess" >
				<?php echo $this->session->flashdata('successMessage'); ?>
			</div>
			<?php
		}
			?>
	    <section class="login-content">
			<aside class="accounttop-block">
			  <!-- <aside class="accounttop-blockleft">
				<aside class="titlecontent">
				  <h2><span>Field marked with * are mandatory</span></h2>
				</aside>
				</aside> -->

					<form name="user_profile" id="user_profile" method="post" action="<?php echo base_url();?>user_profile/update" enctype="multipart/form-data" style="clear:both;">
					  <div class="form-row" id="frmupdate">
						  <div class="form-group col-md-6">
							  <label for="inputName4">Name*</label>
							  <input type="text" class="form-control" id="full_name" name="full_name" placeholder="" value="<?php echo $user_profile->name;?>">
							</div>
							<div class="form-group col-md-6">
							  <label for="inputMobile4">Phone/Mobile*</label>
							  <input type="text" class="form-control" id="phone_no" name="phone_no" placeholder="" value="<?php echo $user_profile->phone_number;?>">
							</div>
							<div class="form-group col-md-6">
							  <label for="inputEmail4">Email*</label>
							  <input type="email" class="form-control" id="user_email" name="user_email"  placeholder="" value="<?php echo $user_profile->email;?>" readonly>
							</div>

							<div class="form-group col-md-6">
							  <label for="inputPassword4">Password*</label>
							  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="" value="<?php echo $this->encryption->decrypt($user_profile->password);?>">
							</div>

							<div class="form-group col-md-6">
							  <label for="inputcountry4">Country</label>
							  <select id="user_country" class="form-control" name="user_country">
								<option value=""> Please select country</option>
								<option value="UAE" <?php if($user_profile->country == 'UAE') { echo 'selected';}?>>UAE</option>
								<option value="Qatar" <?php if($user_profile->country == 'Qatar') { echo 'selected';}?>>Qatar</option>
								<option value="Oman" <?php if($user_profile->country == 'Oman') { echo 'selected';}?>>Oman</option>
							  </select>
							</div>

							<div class="form-group col-md-6">
							  <label for="inputCity">City</label>
							  <input type="text" class="form-control" id="user_city" name="user_city"  placeholder="" value="<?php echo $user_profile->city;?>">
							</div>
							<?php
								$userEmail = $user_profile->email;
								$recordSubscriber = isSubscriber($userEmail);
								if($recordSubscriber)
								{
									if($recordSubscriber->is_active)
									{
										$isSubscriber = true;
										$checked = true;
									}
									else
									{
										$isSubscriber = false;
										$checked = false;
									}
								}
								else {
									$isSubscriber = false;
									$checked = false;
								}
							?>
							<div class="form-group col-md-12">
				          <label class="checkbox-inline">
				            <input type="checkbox" <?php echo ($checked == true) ? "checked" : ""; ?> name="newsletter" id="newsletter" value="1" style="zoom: 1.6;vertical-align: middle;"> Subscribe to our Newsletter
				          </label>
				      </div>
					  </div>
					  <div class="text-right">
					  <!-- <button type="edit" class="btn formbtn1">Edit</button> -->
						<button type="button" class="btn formbtn1" onclick="enableFields();">Edit My Account</button>
					  <button type="submit" class="btn formbtn1" name="user_update" id="user_update">Update</button>
					  </div>
					</form>
				</aside>
			</section>
		</section>
	   </section>
	</section>
<script>
function enableFields()
{
	$("#frmupdate").each(function(){
    $(this).find(':input').attr("disabled", false);
	});
	$("#user_update").prop("disabled", false);
}

function disableFields()
{
	$("#frmupdate").each(function(){
    $(this).find(':input').attr("disabled", true); //<-- Should return all input elements in that specific form.
});
$("#user_update").prop("disabled", true);
}
disableFields();
</script>
