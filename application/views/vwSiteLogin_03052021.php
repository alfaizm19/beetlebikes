<section class="section loginRegPanel section-45 mb-4">
	<div class="container text-left">
		<div class="row">
			<div class="col-12">
				<div class="row mt-3">
					<div class="col-md-4 mx-auto mb-4">
						<div class="separator text-dark">Log In to MMTC-PAMP</div>
					</div>
					<div class="col-12">
						<div class="row">
							<div class="col-md-4 mx-auto mb-4 text-center">
								<button class="btn btn-default btn-block facebookBtn"><i class="fa fa-facebook-square"></i> Facebook</button>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="col-12">
						<div class="row">
							<div class="col-md-4 mx-auto mb-2 text-center">
								<button class="btn btn-default btn-block googleBtn"><i class="fa fa-google"></i> Google</button>
							</div>
						</div>
					</div>
					<div class="col-md-4 mx-auto">
						<div class="separator">OR</div>
					</div>

				</div>
				<form method="post" id="loginForm">
					<div class="row mt-3">
						<div class="col-md-4 mx-auto">
							<div class="row">
								<div class="col-lg-12 mb-3">
									<div class="form-wrap">
										<label class="text-light font-italic form-label-outside" for="email-address">Email Address<span class="text-primary">*</span></label>
										<input class="form-input form-control-has-validation form-control-last-child" id="email" type="text" name="email"><span id="emailErr" class="form-validation"></span>
									</div>
								</div>

								<div class="col-lg-12 offset-top-10 offset-md-top-0">
									<div class="form-wrap">
										<label class="text-light font-italic form-label-outside" for="password">Password<span class="text-primary">*</span></label>
										<input class="form-input form-control-has-validation form-control-last-child" id="password" type="password" name="password"><span id="passwordErr" class="form-validation"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-4 mx-auto">
							<div class="row mt-3">
								<div class="col-12 text-center">

									<div id="finalLoginMsg"></div>

									<input type="hidden" name="action" value="<?php echo $this->input->get('action') ?>">

									<button type="submit" id="btnLogin" class="btn btn-login btn-block px-3">Login To Continue</button>
								</div>
								<div class="col-md-4 mt-3 forgotPass">
									<a href="<?php echo base_url('forgot-password') ?>">Forgot password?</a>
								</div>
								<div class="col-md-8 text-right mt-3 forgotPass">
								<?php 
				                  $action = $this->input->get('action');

				                  if ($action == 'checkout') {
				                    $redirect = base_url('register?action=checkout');
				                  } else {
				                    $redirect = base_url('register');
				                  }
				                ?>

				                	New to MMTC-PAMP? <a href="<?php echo $redirect; ?>">Create an Account</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>