<div class="col-sm-12">
    <? echo display_flash('error'); ?>
</div>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title"> <?php echo $page_title ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/career') ?>" class="btn btn-success m-btn m-btn--icon">
            <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
        </a></div>
</div>

<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">
        <!--begin::Form-->
        <form class="m-form m-form--fit m-form--label-align-right" action="<?php echo current_url(); ?>" method="post" enctype="multipart/form-data" name="career_form" id="career_form" novalidate="novalidate">
            <div class="m-portlet__body pb-2">
                <div class="box-header with-border">
                    <div id="delete_allmsg_div"></div>
                    <div class="FieldsMarked"> Fields Marked with (<span class="text-danger">*</span>) are Mandatory </div>
                </div>

            <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="positions">
                         Position<span class="text-danger">*</span>
                    </label>

                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="positions" class="form-control " id="positions" data-placeholder="Select position" required data-msg-required="Please select position." data-allow-clear="true" >
                            <option value="">Select  Position</option>
                            <? foreach ($positions as $key => $value) : ?>
                                <option <? echo set_select('positions', $key); ?> value="<? echo $value; ?>"
								<? echo ($value == $career->position_name) ? "selected" : '' ?>><? echo $value; ?></option>
                            <? endforeach; ?>
                        </select>
                        <div class="has-error"></div>
                    </div>
                </div>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="experience_list">Experience<span class="text-danger">*</span> </label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <select name="experience_list[]" class="form-control m-select2 m_select2_select " multiple="multiple" id="experience_list" data-placeholder="Select experience" required data-msg-required="Please select experience." data-allow-clear="true" >
                             <?
                            $experience_list = array_column($experience_lists, 'experience_id');
                            foreach ($experience as $key => $value) {
                                if (in_array($key, $experience_list)) {
                                    $selected = "selected";
                                } else {
                                    $selected = '';
                                }
                                ?>
                                <option <? echo set_select('experience_list', $key); ?> <? echo $selected; ?>  value="<? echo $key; ?>"><? echo $value; ?></option>
                            <? }; ?>
                                                    </select>
                        <div class="has-error"></div>
                    </div>
                </div>
                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="country"> Country<span class="text-danger">*</span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="checkbox" id="UAE" name="UAE" value="UAE"
						<?php foreach($country as $value){ if($value['country_name'] == 'UAE') { echo 'checked';}}?>>
                        <span> UAE</span>
                    </div>

                </div>
				<div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="country"><span class="text-danger"></span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="checkbox" id="Qatar" name="Qatar" value="Qatar"
						<?php foreach($country as $value){ if($value['country_name'] == 'Qatar') { echo 'checked';}}?>>
                        <span>Qatar</span>
                    </div>

                </div>
				<div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="country"><span class="text-danger"></span></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <input type="checkbox" id="Oman" name="Oman" value="Oman"
						<?php foreach($country as $value){ if($value['country_name'] == 'Oman') { echo 'checked';}}?>>
                        <span>Oman</span>
                    </div>

                </div>
                <?php if (!empty($questions)): ?>
                    <?php foreach ($questions as $question):
                      ?>
                        <?php
                          $cat = $question['category'];
                          $check[$cat] = false;
                          foreach($question['questions'] as $q)
                          {
                        ?>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-3 col-sm-12">
                              <?php
                              if($check[$cat] == false)
                              {
                                echo $question['category'];
                              }
                              ?>
                            </label>
                            <div class="col-lg-4 col-md-9 col-sm-12">
                                <input type="checkbox" name="question[]" value="<?= $q->question_id ?>" <?php if(in_array($q->question_id, $careerQuestions)) { echo "checked"; }?>>
                                <span><?= $q->question ?></span>
                            </div>
                        </div>
                        <?php
                        $check[$cat] = true;
                          }
                         ?>
                    <?php endforeach ?>
                <?php endif ?>

                <div class="form-group m-form__group row">
                    <label class="col-form-label col-lg-3 col-sm-12" for="display_order"> Display Order </label>
                    <div class="col-sm-2">
                        <input type="number" maxlength="2" minlength="1" pattern="[0-9]+" class="form-control w-50 m-input" id="display_order" name="display_order" value="<? echo get_input('display_order', $career->display_order); ?>">
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
                                <a  class="btn btn-secondary" href="<?php echo base_url('admin/career'); ?>"><i class="fa fa-times"></i> Cancel </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
