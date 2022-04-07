<section class="section loginRegPanel section-45 mb-4">
	<div class="container text-left">
		<div class="row">
			<div class="col-12">
				<div class="row mt-3">
					<div class="col-md-8 mx-auto mb-4">
						<div class="separator text-dark">Write Review</div>
					</div>

				</div>

				<form id="writeReview" method="post" enctype="multipart/form-data">
					<div class="row mt-3">
						<div class="col-md-8 mx-auto">
							<div class="row">
								<div class="col-2">
									<img src="<?php echo base_url($product->image_path) ?>" class="img-responsive img-thumbnail" />
								</div>
								<div class="col-10 my-auto">
									<p class="">
										<a href="<?php echo base_url($product->slug) ?>">
											<?php echo $product->product_name ?>
										</a>
									</p>
								</div>

							</div>
							<hr class="divider divider-iron divider-dotted divider-offset-20">
							<div class="row">

								<div class="col-lg-12 mb-3">
									<div class="offset-top-20 align-items-center">
										<div class="font-weight-bold">
											<p>Your Rating:</p>
										</div>
										<div style="clear:both;"></div>
										<div class="inset-left-10 pl-0">
											<fieldset class="rating">
												<input id="star5" type="radio" name="rating" value="5">
												<label class="full" for="star5" title="Awesome - 5 stars"></label>
												<input id="star4" type="radio" name="rating" value="4">
												<label class="full" for="star4" title="Pretty good - 4 stars"></label>
												<input id="star3" type="radio" name="rating" value="3">
												<label class="full" for="star3" title="Meh - 3 stars"></label>
												<input id="star2" type="radio" name="rating" value="2">
												<label class="full" for="star2" title="Kinda bad - 2 stars"></label>
												<input id="star1" type="radio" name="rating" value="1">
												<label class="full" for="star1" title="Bad - 1 star"></label>
											</fieldset>
											<span id="ratingErr" class="form-validation"></span>
										</div>
									</div>
									
								</div>
								<div class="col-lg-12 offset-top-10 offset-md-top-0">
									<div class="form-wrap">
										<label class="text-light font-weight-bold form-label-outside" for="title">Add a photos</label>
										<input id="images" name="images[]" type="file" class="file" multiple>
										<span id="imagesErr" class="form-validation"></span>
									</div>
									
									<hr class="divider divider-iron divider-dotted divider-offset-20">
								</div>
								<div class="col-lg-12 offset-top-10 offset-md-top-0">

									<div class="form-wrap">
										<label class="text-light font-weight-bold form-label-outside" for="title">Add a headline<span class="text-primary">*</span></label>
										<input class="form-input form-control-has-validation" id="title" type="text" name="title"><span id="titleErr" class="form-validation"></span>
									</div>
								</div>
								<div class="col-lg-12 offset-top-10">
									<div class="form-wrap">
										<label class="text-light font-weight-bold form-label-outside" for="title">Add a written review<span class="text-primary">*</span></label>
										<textarea class="form-input form-control-has-validation form-control-last-child" id="review" type="text" name="review" rows="4"></textarea><span id="reviewErr" class="form-validation"></span>
									</div>
								</div>


							</div>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-md-8 mx-auto">
							<div class="row mt-3">
								<div class="col-12">
									<input type="hidden" name="product_id" value="<?php echo hash('SHA256', $product->product_id) ?>">

									<div id="finalMsg"></div>

									<button type="submit" id="btnWriteReview" class="btn btn-primary px-3">Submit</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>