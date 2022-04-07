<div class="container section-60 text-md-left">
  <form id="addAddressForm" method="post">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <h4>Shipping Details</h4>
        <div class="row offset-top-20">
          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingPincode">Pincode<span class="text-primary">*</span></label>
              <input class="form-input" id="shippingPincode" type="number" name="shippingPincode">
              <span id="shippingPincodeErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingCity">City<span class="text-primary">*</span></label>
              <input class="form-input" id="shippingCity" type="text" name="shippingCity">
              <span id="shippingCityErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingState">State<span class="text-primary">*</span></label>
              <select name="shippingState" class="form-input" id="shippingState">
                <option value="">Select State</option>
                <?php 
                  if (!empty($states)):
                    foreach($states as $state):
                ?>
                  <option value="<?php echo $state->id ?>"><?php echo $state->state ?></option>
                <?php endforeach; endif; ?>
              </select>
              <span id="shippingStateErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingCountry">Country<span class="text-primary">*</span></label>
              <select name="shippingCountry" class="form-input" id="shippingCountry">
                <option value="india">India</option>
              </select>
              <span id="shippingCountryErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingAddress1">Address 1<span class="text-primary">*</span></label>
              <textarea maxlength="150" id="shippingAddress1" class="form-input adjust-textarea" name="shippingAddress1"></textarea>

              <span id="shippingAddress1Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingAddress2">Address 2</label>
              <textarea maxlength="150" id="shippingAddress2" class="form-input adjust-textarea" name="shippingAddress2"></textarea>

              <span id="shippingAddress2Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingFirstName">First Name<span class="text-primary">*</span></label>
              <input class="form-input" id="shippingFirstName" type="text" name="shippingFirstName">
              <span id="shippingFirstNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingLastName">Last Name<span class="text-primary">*</span></label>
              <input class="form-input" id="shippingLastName" type="text" name="shippingLastName">
              <span id="shippingLastNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingEmail">Email Address<span class="text-primary">*</span></label>
              <input class="form-input" id="shippingEmail" type="email" name="shippingEmail">
              <span id="shippingEmailErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingPhone">Phone<span class="text-primary">*</span></label>
              <input class="form-input" id="shippingPhone" type="text" name="shippingPhone">
              <span id="shippingPhoneErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="default"> Default<span class="text-primary">*</span></label>
              <select name="default" class="form-input" id="default">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              <span id="defaultErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 offset-top-20">
            
            <h4>Billing Details</h4>

            <div class="form-wrap">
              <input checked class="checkbox isBillingInfoSame-address" id="isBillingInfoSame" type="checkbox" name="isBillingInfoSame" value="yes">
              <label class="text-light font-italic form-label-outside isBillingInfoSame" for="isBillingInfoSame">
                Billing details same as shipping details
              </label>
              <span id="isBillingInfoSameErr" class="form-validation"></span>
            </div>
          </div>


          <!-- <div class="col-lg-12 billing hide">
            <h4>Billing Details</h4>
          </div> -->

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingPincode">Pincode<span class="text-primary">*</span></label>
              <input class="form-input" id="billingPincode" type="number" name="billingPincode">
              <span id="billingPincodeErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingCity">City<span class="text-primary">*</span></label>
              <input class="form-input" id="billingCity" type="text" name="billingCity">
              <span id="billingCityErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingState">State<span class="text-primary">*</span></label>
              <select name="billingState" class="form-input" id="billingState">
                <option value="">Select State</option>
                <?php 
                  if (!empty($states)):
                    foreach($states as $state):
                ?>
                  <option value="<?php echo $state->id ?>"><?php echo $state->state ?></option>
                <?php endforeach; endif; ?>
              </select>
              <span id="billingStateErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingCountry">Country<span class="text-primary">*</span></label>
              <select name="billingCountry" class="form-input" id="billingCountry">
                <option value="india">India</option>
              </select>
              <span id="billingCountryErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingAddress1">Address 1<span class="text-primary">*</span></label>
              <textarea maxlength="150" id="billingAddress1" class="form-input adjust-textarea" name="billingAddress1"></textarea>

              <span id="billingAddress1Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingAddress2">Address 2</label>
              <textarea maxlength="150" id="billingAddress2" class="form-input adjust-textarea" name="billingAddress2"></textarea>

              <span id="billingAddress2Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingFirstName">First Name<span class="text-primary">*</span></label>
              <input class="form-input" id="billingFirstName" type="text" name="billingFirstName">
              <span id="billingFirstNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingLastName">Last Name<span class="text-primary">*</span></label>
              <input class="form-input" id="billingLastName" type="text" name="billingLastName">
              <span id="billingLastNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingEmail">Email Address<span class="text-primary">*</span></label>
              <input class="form-input" id="billingEmail" type="email" name="billingEmail">
              <span id="billingEmailErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20 billing hide">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingPhone">Phone<span class="text-primary">*</span></label>
              <input class="form-input" id="billingPhone" type="text" name="billingPhone">
              <span id="billingPhoneErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-20">

            <div id="finalAddAddressMsg"></div>
        
            <button id="addAddressBtn" class="btn btn-primary" type="submit">Add Address</button>

          </div>

        </div>
      </div>
    </div>
  </form>
</div>