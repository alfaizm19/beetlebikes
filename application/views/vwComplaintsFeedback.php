<section class="wrapper-main">
  <section class="inner-banner">
    <figure> <img src="<?= base_url($page->banner_image_path); ?>" alt=""/> </figure>
  </section>
<section class="inner-wrapper pb-0">
    <aside class="breadcrumb-main">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>">Home</a></li>
        <li class="active"><?= $page->title; ?></li>
      </ol>
    </aside>
    <section class="feedback-block">
      <section class="container">

		<div class="product-title text-center titleStyle">
			<h1><span><?= $page->title; ?></span></h1>
		</div>

		<aside class="titleinnercontent">

		<p><?= $page->description; ?></p>
	  </aside>

        <section class="feedback-content">
			<div class="col-lg-8">
				<section class="feedbackcontent-wrapper">
					<section class="feedbackcontent-block">
						<section class="feedback-form">
							<h2><span>Fields marked with * are mandatory</span></h2>
							<div class="alert alert-success" id="showSuccess" style="display: none;">
								<!-- Your request has been sent successfully. -->
                Thanks for contacting us ! We shall review your request and update you soon.
							</div>
							<form name="complaints_feedback" id="complaints_feedback" method="post" action="#" enctype="multipart/form-data">
								<aside class="form-group">
									<!--label for="inputName4">Name*</label-->
									<input placeholder="Name*" type="text" required class="form-control" id="full_name" name="full_name" placeholder="Name*"> </aside>
								<aside class="form-group">
									<!--label for="inputMobile4">Phone/Mobile*</label-->
									<input placeholder="Phone/Mobile*" type="text" maxlength="20" minlength="10" required class="form-control" id="mobile" name="mobile" placeholder="Phone/Mobile*" onkeydown="return validate_phonenumber(this, event);"> </aside>
								<aside class="form-group">
									<!--label for="inputEmail4">Email*</label-->
									<input placeholder="Email*" type="email" required class="form-control" id="email" name="email" placeholder="Email*"> </aside>
								<aside class="form-group">
								<div class="field_row">
									<div class="fcol_name">Select Option:</div>
									<div class="form-check">
											<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="Complaints" checked>
											<label class="form-check-label" for="exampleRadios1">Complaints</label>
									</div>
									<div class="form-check">
											<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="Feedback">
											<label class="form-check-label" for="exampleRadios2">Feedback & Suggestions</label>
									</div>
								</div>
								</aside>
								<aside class="form-group">
									<!--label for="inputMessage4">Message*</label-->
									<textarea class="form-control" required id="message" rows="4" name="message" placeholder="Message*" rows="4"></textarea>
								</aside>
								<aside class="form-group btngroup">
				                  <!-- <?php //echo $recaptcha;?>
				                  <?php //echo $recaptcha_script;?> -->
									<div id="div_captcha_error" class="contact-recaptcha">
										<? $this->load->view('partials/vwRecaptcha'); ?>
									</div>
									<button type="submit" value="save" class="submit-btn enquirenow2">Submit</button>
								</aside>
							</form>
						</section>
						  <!-- <section class="feedbackcontent-left">

							<aside class="form-group btngroup"> <img src="images/feedback_01.jpg" alt=""></aside>
						  </section>
						  <section class="clearfix"></section> -->

						</section>
					  </section>
			</div>
			<div class="col-lg-4">
				<div class="adv_banner">
					<img src="images/adv_banner.jpg" alt="" />
				</div>
			</div>

        </section>
      </section>
    </section>
  </section>

</section>
