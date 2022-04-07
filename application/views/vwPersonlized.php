<div class="breadcrumb_content">
		<h4>PERSONALIZED</h4>
		<p><a href="">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Personalized</p>
	</div>


<div class="contact_form Personlized_form">
	<style type="text/css">
		footer{margin-top: 0;}
	</style>
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-md-6 pe-md-0 ps-md-2">
				<h4>Request for Personalized Design</h4>
				<p class="pe-md-5">Please complete the form below for your personalized design, we promise to get back to you within 24 hours.</p>
				<span class="mandatory">Mandatory fields are marked <span class="required">*</span></span>
				<form method="post" id="personalized">
					<div id="resetFinalPersError"></div>
                   	<label for="name" class="form-label">Your Name<span class="required">*</span></label>
                   	<div class="input-group mb-3">
					  <input type="text" name="name" class="form-control nameErr removeErr" id="name" placeholder="" aria-label="Name" aria-describedby="basic-addon1">
					</div>

                   	<label for="email" class="form-label">Your Email<span class="required">*</span></label>
                   	<div class="input-group mb-3">
					  <input type="text" name="email" class="form-control emailErr removeErr" id="email" placeholder="" aria-label="Email" aria-describedby="basic-addon1">
					</div>
                   	<label for="phone" class="form-label">Your Phone Number<span class="required">*</span></label>
                   	<div class="input-group mb-3">
					  <input name="phone" type="text" class="form-control phoneErr removeErr" id="phone" placeholder="" aria-label="Phone" aria-describedby="basic-addon1">
					</div>
                   	<label for="looking" class="form-label">Looking For<span class="required">*</span></label>
                   	<div class="input-group mb-3">
					  <select name="looking" class="form-select form-control lookingErr removeErr" aria-label="Default select example">
						  <option value=""></option>
						  <?php if (!empty($categories)): ?>
						  	<?php foreach ($categories as $cat): ?>
						  		<option value="<?= $cat->id ?>">
						  			<?= $cat->category ?>
						  		</option>
						  	<?php endforeach ?>
						  	<option value="-1">Other</option>
						  <?php endif ?>
					  </select>
					</div>
                   	<label for="photo" class="form-label">Attach Reference Image (Optional)</label>
				    <div class="file_upload_attach form-control mb-3 p-0 photoErr removeErr">
					    <div class="file-upload-wrapper" data-text="">
					      <input name="photo" type="file" class="file-upload-field form-control photoErr removeErr">
					    </div>
				    </div>
                   	<label for="mesage" class="form-label">Your Message</label>
                   	<div class="input-group mb-4">
					  <textarea name="message" rows="10" class="w-100 form-control messageErr removeErr" id="message"></textarea>
					</div>

					<div class="captcha_blk">
		              <div class="form-group">
		                <div class="g-recaptcha g-recaptcha-responseErr removeErr" data-sitekey="<?php echo captcha_site_key ?>"></div>
		              </div>
		            </div>

					<div class="form-btn">
						<!-- <button id="btnSend" type="submit">Send</button> -->
						<input id="btnSend" type="submit" value="Send">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>