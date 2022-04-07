<?php
// var_dump($review->video_link);
// die();
?>
<div class="col-sm-12" >
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
<div class="d-flex align-items-center">
  <div class="mr-auto">
    <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
  </div>
 <a href="<? echo base_url('admin/reviews/index/'.hash('SHA256', $review->product_id)) ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
          </a></div>
</div>

<div class="col-sm-12">
<div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
  <!--begin::Form-->
  <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="testimonial_form" id="testimonial_form" novalidate="novalidate">
    <div class="m-portlet__body pb-2">
      <div class="box-header with-border">
        <div id="delete_allmsg_div"></div>
        <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
      </div>

      <?php $userData = user_info($review->user_id); ?>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="name">Name<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="name" class="form-control input-lg m-input" id="customer_name" name="customer_name" value="<? echo get_input('customer_name', $review->customer_name); ?>" required data-msg-required="Please enter customer name.">
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="title">Review Title<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <input type="text" class="form-control input-lg m-input" id="title" name="title" value="<? echo get_input('title',$review->title); ?>" required data-msg-required="Please enter review title.">
        </div>
      </div>

      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="review">Review<span class="text-danger">*</span></label>
        <div class="col-lg-4 col-md-9 col-sm-12">
          <textarea class="form-control input-lg m-input" required data-msg-required="Please enter review." id="review" name="review"><? echo get_input('review',$review->review); ?></textarea>
        </div>
      </div>

      <div class="form-group m-form__group row">
          <label class="col-form-label col-lg-3 col-sm-12" for="country">
               Rating <span class="text-danger">*</span>
          </label>

          <div class="col-lg-4 col-md-9 col-sm-12">
              <select name="rating" class="form-control " id="rating" data-placeholder="Select rating" required data-msg-required="Please select rating." data-allow-clear="true" disabled>
                  <option value="">Select Rating</option>
                  <option <?php echo $review->rating == '0.5'? 'selected':''; ?> value="0.5">0.5 Stars</option>
                  <option <?php echo $review->rating == '1'? 'selected':''; ?> value="1">1 Stars</option>
                  <option <?php echo $review->rating == '1.5'? 'selected':''; ?> value="1.5">1.5 Stars</option>
                  <option <?php echo $review->rating == '2.0'? 'selected':''; ?> value="2">2 Stars</option>
                  <option <?php echo $review->rating == '2.5'? 'selected':''; ?> value="2.5">2.5 Stars</option>
                  <option <?php echo $review->rating == '3'? 'selected':''; ?> value="3">3 Stars</option>
                  <option <?php echo $review->rating == '3.5'? 'selected':''; ?> value="3.5">3.5 Stars</option>
                  <option <?php echo $review->rating == '4'? 'selected':''; ?> value="4">4 Stars</option>
                  <option <?php echo $review->rating == '4.5'? 'selected':''; ?> value="4.5">4.5 Stars</option>
                  <option <?php echo $review->rating == '5'? 'selected':''; ?> value="5">5 Stars</option>
              </select> 
              <div class="has-error"></div>
          </div>
      </div>

      <!-- <div class="form-group m-form__group row imageFile">
        <label class="col-form-label col-lg-3 col-sm-12" for="review_image">Product Picture</label>
        <? if($review->image_1 != ""): ?>
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="w-25 mt-2">
              <img width="100px" src="<? echo base_url('uploads/product_reviews/'.$review->image_1); ?>">
            </div>
          </div>
        <? endif; ?>

        <? if($review->image_2 != ""): ?>
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="w-25 mt-2">
              <img width="100px" src="<? echo base_url('uploads/product_reviews/'.$review->image_2); ?>">
            </div>
          </div>
        <? endif; ?>

        <? if($review->image_3 != ""): ?>
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="w-25 mt-2">
              <img width="100px" src="<? echo base_url('uploads/product_reviews/'.$review->image_3); ?>">
            </div>
          </div>
        <? endif; ?>

        <? if($review->image_4 != ""): ?>
          <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="w-25 mt-2">
              <img width="100px" src="<? echo base_url('uploads/product_reviews/'.$review->image_4); ?>">
            </div>
          </div>
        <? endif; ?>
        
      </div> -->


      <div class="form-group m-form__group row">
        <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
        <div class="col-sm-2">
          <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<? echo get_input('display_order',$review->display_order); ?>">
        </div>
      </div>


      <hr class="my-2">
      <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
        <div class="m-form__actions m-form__actions py-0 ">
          <div class="row">
            <div class="col-lg-9 ml-lg-auto">
              <input type="hidden" name="pId" value="<?php echo $review->product_id ?>">
              <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i>
                Save
              </button>
              <a  class="btn btn-secondary" href="<? echo base_url('admin/reviews/index/'.hash('SHA256', $review->product_id)) ?>"><i class="fa fa-times"></i> Cancel </a>
            </div>
          </div>
        </div>
      </div>

    </div>
  </form>
  <!--end::Form-->
</div>
</div>
<script type="text/javascript">
function mediaType(mediaId)
 {
   //alert(mediaId);
   if(mediaId == "2")
   {
     $(".Video").hide();
     $(".VideoFile").show();
   }
   else if(mediaId == "3")
   {
     $(".Video").show();
     $(".VideoFile").hide();
   }
   else
   {
     $(".Video").hide();
     $(".VideoFile").hide();
   }
 }
 mediaType(<?=$review->media_type ?>);

</script>
