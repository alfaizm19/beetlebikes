<style type="text/css">
    .inlineCheckbox{
        position: relative;
        margin-left: 30px;
        margin-right: 10px;
        bottom: 20px;
    }
</style>
<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <? echo $page_title ?> </h3>
        </div>
        <a href="<? echo base_url('admin/tours') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a>
    </div>
</div>

<? if (empty($tour)): ?>
    <? $this->load->view('admin/partials/_admin_not_found'); ?>
    <?
    return FALSE;
endif;

$tour = $tour[0];
?>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<? echo current_url(); ?>" method="post" enctype="multipart/form-data" name="user_form" id="user_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>


                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourType">
                         Tour Type <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="tourType" class="form-control " id="tourType" data-placeholder="Select tour type" required data-msg-required="Please select tour type." data-allow-clear="true" >
                            <option value="">Select Tour Type</option>
                            <option <?php echo $tour->type == 'Tickets'? 'selected':'' ?> value="Tickets">Tickets</option>
                            <option <?php echo $tour->type == 'Book Now'? 'selected':'' ?> value="Book Now">Book Now</option>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="emirates">
                         Emirates <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="emirates" class="form-control " id="emirates" data-placeholder="Select emirates" required data-msg-required="Please select emirates" data-allow-clear="true" >
                            <option value="">Select Emirates</option>
                            <option <?php echo $tour->emirates == 'Abu Dhabi'? 'selected':'' ?> value="Abu Dhabi">Abu Dhabi</option>
                            <option <?php echo $tour->emirates == 'Dubai'? 'selected':'' ?> value="Dubai">Dubai</option>
                            <option <?php echo $tour->emirates == 'Sharjah'? 'selected':'' ?> value="Sharjah">Sharjah</option>
                            <option <?php echo $tour->emirates == 'Umm al-Qaiwain'? 'selected':'' ?> value="Umm al-Qaiwain">Umm al-Qaiwain</option>
                            <option <?php echo $tour->emirates == 'Fujairah'? 'selected':'' ?> value="Fujairah">Fujairah</option>
                            <option <?php echo $tour->emirates == 'Ajman'? 'selected':'' ?> value="Ajman">Ajman</option>
                            <option <?php echo $tour->emirates == "Ra's al-Khaimah"? 'selected':'' ?> value="Ra's al-Khaimah">Ra's al-Khaimah</option>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="country">
                         Category <span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="category" class="form-control " id="category" data-placeholder="Select category" required data-msg-required="Please select category." data-allow-clear="true" >
                            <option value="">Select Category</option>
                            <?php 
                                if (!empty($categories)):
                                    foreach($categories as $category):
                            ?>
                                <option <?php echo $tour->category == $category->id? 'selected':'' ?> value="<?php echo $category->id ?>"><?php echo $category->category ?></option>
                            <?php endforeach; endif ?>
                        </select> 
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourName">
                         Tour Name <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->tour_name ?>" name="tourName" id="tourName" required data-msg-required="Please enter tour name.">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourName">
                         &nbsp;
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <label class="checkbox-inline">
                            <input <?php echo ($tour->best_seller)? 'checked':'' ?> type="checkbox" class="form-control input-lg m-input checkboxTag" value="1" name="bestSeller" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Best Seller</span>
                        </label>

                        <label class="checkbox-inline">
                            <input <?php echo ($tour->featured)? 'checked':'' ?> type="checkbox" class="form-control input-lg m-input checkboxTag" value="1" name="featured" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Featured</span>
                        </label>

                        <label class="checkbox-inline">
                            <input <?php echo ($tour->popular)? 'checked':'' ?> type="checkbox" class="form-control input-lg m-input checkboxTag" value="1" name="popular" data-msg-required="Please enter tour name."> <span class="inlineCheckbox">Popular</span>
                        </label>

                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="overview"> Description <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="overview" id="overview" required data-msg-ckrequired="Please enter overview." class="form-control ckerequired description input-lg m-input" rows="4"><?php echo $tour->overview ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="inclusion"> Documents <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="inclusion" id="inclusion" required data-msg-ckrequired="Please enter inclusion." class="form-control ckerequired description input-lg m-input" rows="4"><?php echo $tour->inclusion ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="bookingPolicy"> How to Apply <span class="text-danger">*</span></label>
                    <div class="col-lg-9 col-md-9 col-sm-12">
                        <textarea name="bookingPolicy" id="bookingPolicy" required data-msg-ckrequired="Please enter booking policy." class="form-control ckerequired description input-lg m-input" rows="4"><?php echo $tour->policy ?></textarea>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="duration">
                         Duration <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->duration ?>" name="duration" id="duration" required data-msg-required="Please enter duration">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="departurePoint">
                        Departure Point <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->departure_point ?>" name="departurePoint" id="departurePoint" data-msg-required="Please enter Departure Point">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="reportingPoint">
                        Reporting Point <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->reporting_point ?>" name="reportingPoint" id="reportingPoint" required data-msg-required="Please enter Reporting Point">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourLanguage">
                        Tour Language <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->tour_language ?>" name="tourLanguage" id="tourLanguage" required data-msg-required="Please enter Tour Language">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meals">
                        Meals
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->meals ?>" name="meals" id="meals" data-msg-required="Please enter meals">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="availability">
                        Availability
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->availability ?>" name="availability" id="availability" data-msg-required="Please enter availability">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="freeCancellation">
                        Free Cancellation
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->cancellation ?>" name="freeCancellation" id="freeCancellation" data-msg-required="Please enter free cancellation">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="startingTime">
                        Starting Time <span class="text-danger">*</span>
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="time" class="form-control input-lg m-input" value="<?php echo $tour->starting_time ?>" name="startingTime" id="startingTime" required data-msg-required="Please enter starting time">
                    </div>
                </div>

                <!-- <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="confirmation">
                        Confirmation
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->confirmation ?>" name="confirmation" id="confirmation" data-msg-required="Please enter free confirmation">
                    </div>
                </div> -->

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pickup">
                        Pickup & Drop Back
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <label class="checkbox-inline">
                            <input <?php echo ($tour->pickup == 'yes')? 'checked':'' ?> type="checkbox" class="pickupDrop form-control input-lg m-input" value="yes" name="pickup" id="pickup" data-msg-required="Please enter free pickup"> <span class="inlineCheckbox">Yes</span>
                        </label>

                        <label class="checkbox-inline">
                            <input <?php echo ($tour->pickup == 'no')? 'checked':'' ?> type="checkbox" class="pickupDrop form-control input-lg m-input" value="no" name="pickup" id="pickup" data-msg-required="Please enter free pickup"> <span class="inlineCheckbox">No</span>
                        </label>

                        <label class="checkbox-inline">
                            <input <?php echo ($tour->pickup == 'optional')? 'checked':'' ?> type="checkbox" class="pickupDrop form-control input-lg m-input" value="optional" name="pickup" id="pickup" data-msg-required="Please enter free pickup"> <span class="inlineCheckbox">Optional</span>
                        </label>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="pickup">
                        Deals
                    </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <label class="checkbox-inline">
                            <input <?php echo ($tour->deals)? 'checked':'' ?> type="checkbox" class="form-control input-lg m-input" value="1" name="delas" id="delas" data-msg-required="Please enter free delas"> <span class="inlineCheckbox">Yes</span>
                        </label>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourImage">Image<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" class="form-control validImage" name="tourImage" id="tourImage" data-image-crop="1"  
                            data-image-height="292" data-image-width="604" 
                            data-caption="Tour Image" 
                                   data-image-path ="tour/" data-msg-required="Please upload tour image">
                        </div>
                        <? if ($tour->image != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($tour->image); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="tourBanner">Banner<span class="text-danger">*</span></label> 
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="cropoutterwrap">
                            <input type="file" class="form-control validImage" name="tourBanner" id="tourBanner" data-image-crop="1"  
                            data-image-height="300" data-image-width="1920" 
                            data-caption="Tour Banner" 
                                   data-image-path ="tour/banner/" data-msg-required="Please upload tour banner image">
                        </div>
                        <? if ($tour->banner_image != ""): ?>
                            <div class="w-25 mt-2">
                                <img class="w-100" src="<? echo base_url($tour->banner_image); ?>">
                            </div>
                        <? endif; ?>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_title"> Meta Title<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="text" class="form-control input-lg m-input" value="<?php echo $tour->meta_title ?>" required data-msg-required="Please enter meta title." name="meta_title" id="meta_title">
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_keyword"> Meta Keyword </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_keyword" id="meta_keyword" class="form-control input-lg m-input" rows="3"><?php echo $tour->meta_keyword ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="meta_description"> Meta Description </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <textarea name="meta_description" id="meta_description" class="form-control input-lg m-input" rows="3" ><?php echo $tour->meta_description ?></textarea>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" min="1" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<?php echo $tour->display_order ?>">
                    </div>
                </div>

                <hr class="my-2">
                <div class="m-portlet__foot m-portlet__foot--fit py-2 border-0">
                    <div class="m-form__actions m-form__actions py-0 ">
                        <div class="row">
                            <div class="col-lg-9 ml-lg-auto">
                                <button type="submit" name="Submit" id="Submit" value="Save" class="btn btn-success"><i class="fa fa-save"></i>
                                    Save
                                </button>
                                <a  class="btn btn-secondary" href="<? echo base_url('admin/tours'); ?>"><i class="fa fa-times"></i> Cancel </a>
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
    $(".pickupDrop:checkbox").on('click', function() {
      // in the handler, 'this' refers to the box clicked on
      var $box = $(this);
      if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
    
      } else {
        $box.prop("checked", false);
      }
    });

    $("input.checkboxTag").on('change', function(event) {
         $('input.checkboxTag').not(this).prop('checked', false);  
    });
</script>