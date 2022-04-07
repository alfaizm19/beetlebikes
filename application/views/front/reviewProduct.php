<section class="section loginRegPanel section-45 mb-4">
    <div class="container text-left">
        <form method="post" action="">
        <div class="row">
            <div class="col-12">
            <div class="row" style="margin-top: 5rem;display: flex;justify-content: center;">
                        <div class="col-md-8" style="margin-bottom: 3rem;">
                            <div class="separator text-dark">Create Review</div>
                        </div>
                        
                    </div>
                    <div class="row" style="margin-top: 3rem;display: flex;justify-content: center;">
                        <div class="col-md-8">
                            <div class="row" style="display: flex;align-items: center;">
                                <div class="col-sm-2">
                                    <img src="<?php echo base_url().$getProductForReview->image_path; ?>" class="img-responsive img-thumbnail" />
                                </div>
                                <div class="col-sm-10" style="margin:0 auto;">
                                    <p class=""><?php echo $getProductForReview->product_name; ?></p>
                                </div>
                                
                            </div>
                            <hr class="divider divider-iron divider-dotted divider-offset-20">
                            
                            <div class="row" style="margin-top: 5rem;">
                                <?php 
                                    if($this->session->flashdata('reviewSaveError'))
                                    { 
                                        echo '<span class="error" style="color:red">'.$this->session->flashdata('reviewSaveError').'</span><br>'; 
                                        unset($_SESSION['reviewSaveError']);
                                    }
                                ?>
                                <?php 
                                    if($this->session->flashdata('reviewSuccess'))
                                    { 
                                        echo '<span class="error" style="color:green">'.$this->session->flashdata('reviewSuccess').'</span><br>'; 
                                        unset($_SESSION['reviewSuccess']);
                                    }
                                ?>
                                <div class="col-lg-12" style="margin-bottom: 2rem;">
                                <div class="offset-top-20 align-items-center">
                                  <div class="font-weight-bold">
                                    <p>Your Rating:</p>
                                  </div>
                                  <div style="clear:both;"></div>
                                  <div class="inset-left-10 pl-0">
                                    <fieldset class="rating">
                                      <input id="star5" type="radio" name="rating" value="5" <?php echo isset($reviewData['rating']) ? $reviewData['rating'] == 5 ? "checked" : '' : '' ?>>
                                      <label class="full" for="star5" title="Awesome - 5 stars"></label>
                                      <input id="star4" type="radio" name="rating" value="4" <?php echo isset($reviewData['rating']) ? $reviewData['rating'] == 4 ? "checked" : '' : '' ?>>
                                      <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                                      <input id="star3" type="radio" name="rating" value="3" <?php echo isset($reviewData['rating']) ? $reviewData['rating'] == 3 ? "checked" : '' : '' ?>>
                                      <label class="full" for="star3" title="Meh - 3 stars"></label>
                                      <input id="star2" type="radio" name="rating" value="2" <?php echo isset($reviewData['rating']) ? $reviewData['rating'] == 2 ? "checked" : '' : '' ?>>
                                      <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                                      <input id="star1" type="radio" name="rating" value="1" <?php echo isset($reviewData['rating']) ? $reviewData['rating'] == 1 ? "checked" : '' : '' ?>>
                                      <label class="full" for="star1" title="Bad - 1 star"></label>
                                    </fieldset>
                                    <span class="error form-validation" style="color:red"><?php echo isset($reviewError['rating']) ? $reviewError['rating'] : '' ?></span>
                                  </div>
                                </div>
                                
                                </div>

                                  <hr class="divider divider-iron divider-dotted divider-offset-20">
                             <!--    <div class="col-lg-12 offset-top-10 offset-md-top-0">
                                <div class="form-wrap">
                                    <label class="text-light font-weight-bold form-label-outside" for="title">Add a photo or video</label>
                                    <input id="input-2" name="input2[]" type="file" class="file"  data-show-upload="false" data-show-caption="true" multiple>
                                  </div>
                                
                                <hr class="divider divider-iron divider-dotted divider-offset-20">
                                </div> -->
                                <div class="col-lg-12 offset-top-10 offset-md-top-0">
                                    
                                <div class="form-wrap">
                                    <label class="text-light font-weight-bold form-label-outside" for="title">Add a headline<span class="text-primary">*</span></label>
                                    <input class="form-input form-control-has-validation" id="title" type="text" name="title" data-constraints="@Required" value="<?php echo isset($reviewData['title']) ? $reviewData['title'] : '' ?>">
                                    <span class="error form-validation" style="color:red"><?php echo isset($reviewError['title']) ? $reviewError['title'] : '' ?></span>
                                  </div>
                                </div>
                                <div class="col-lg-12 offset-top-10" style="margin-top: 3rem;">
                                    <div class="form-wrap">
                                        <label class="text-light font-weight-bold form-label-outside" for="description">Add a written review<span class="text-primary">*</span></label>
                                        <textarea class="form-input form-control-has-validation form-control-last-child" id="description" type="text" name="description" data-constraints="@Required" rows="4"><?php echo isset($reviewData['description']) ? $reviewData['description'] : '' ?></textarea> <span class="error form-validation" style="color:red"><?php echo isset($reviewError['description']) ? $reviewError['description'] : '' ?></span>
                                    </div>
                                </div>
                                
                                
                            </div>
                        
                        </div>
                    </div>
                    <div class="row" style="margin-top: 3rem;display: flex;justify-content: center;">
                    <div class="col-md-8">
                    <div class="row" style="margin-bottom: 3rem;">
                        <div class="col-sm-12">
                            <button class="btn Submit-review" type="submit" name="reviewSbt">Submit</button>
                        </div>
                    </div>
                    </div>
                    </div>
                
            </div>
        </div>
    </form>
    </div>
</section>