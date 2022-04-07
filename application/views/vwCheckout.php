<section class="page-content"></section>
<div class="container section-60 text-md-left">
  <form class="rd-form rd-mailform order-form" id="orderForm" method="post">
    <div class="row">
      <div class="col-md-7">
        <?php if (!empty($addresses)): ?>
        <h4>Delivery Address</h4>
        <ul class="list-group">
          <?php 
            foreach ($addresses as $addr):
              $addrId = hash('SHA256', $addr->id);
              $state = $this->Master_model->get_state_by_id($addr->shipping_state);

              $hashId = hash('SHA256', $addr->id);

              $isAddrSelected = '';
              $isChecked = '';

              if (isset($defaultAddress->id) 
                && !empty($defaultAddress->id)) {
                if ($defaultAddress->id == $addr->id) {
                  $isAddrSelected = 'selectedAddress';
                  $isChecked = 'checked';
                }
              }
          ?>
            
          <li class="list-group-item px-0 deliveryAddress <?php echo $isAddrSelected; ?>" id="address_<?php echo $addrId ?>">
            <div class="row m-0">
              <div class="col-1">
                <div class="input-box">
                  <input <?php echo $isChecked ?> type="radio" name="gender" value="male" onclick="selectAddress($(this))"><span class="gender_radio_button_male">&nbsp;&nbsp;&nbsp;</span>
                </div>
              </div>
              <div class="col-11">
                <a href="<?php echo base_url('customer/edit-address/'.$addrId) ?>" class="cursorPointer editAddressBtn">Edit</a>
                <p><b class="font-weight-bold"><?php echo $addr->shipping_first_name.' '.$addr->shipping_last_name ?></b>&nbsp;&nbsp;<?php echo $addr->shipping_phone ?></p>
                <p><?php echo $addr->shipping_address_1 ?> <?php echo $addr->shipping_address_2 ?>, <?php echo $state ?>-<?php echo $addr->shipping_pincode ?>, <?php echo ucwords($addr->shipping_country) ?> Phone number: <?php echo $addr->shipping_phone ?></p>
                <!-- 090502021 Start -->
                <!-- <button type="button" class="btn btn-primary mt-0 deliveryBtn" onclick="make_default_addr('<?php echo $hashId ?>')">DELIVER HERE</button> -->

                <button type="button" class="btn btn-primary mt-0 deliveryBtn" onclick="make_default_addr_2('<?php echo $hashId ?>')">DELIVER HERE</button>

                <!-- 090502021 End -->
                <span class="text-danger removeAddrError" id="msg_<?php echo $addrId ?>"></span>
              </div>
            </div>
          </li>

          <?php endforeach ?>
        </ul>
        
        <button id="addNewAddressBtn" type="button" class="btn btn-primary mt-0">ADD NEW</button>

        <button id="cancelAddressBtn" type="button" class="btn btn-primary mt-0 hide" data-default="<?php echo isset($defaultAddress) && !empty($defaultAddress)? hash('SHA256', $defaultAddress->id):'' ?>">CANCEL</button>

        <?php endif ?>

        <h4 class="<?php echo isset($defaultAddress) && !empty($defaultAddress)? 'hide':'show' ?> showShippingAddr">Shipping Details</h4>

        <div class="row offset-top-20 <?php echo isset($defaultAddress) && !empty($defaultAddress)? 'hide':'' ?> showShippingAddr">

          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingPincode">Pincode<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="shippingPincode" type="number" name="shippingPincode" value="<?php echo isset($defaultAddress->shipping_pincode)? $defaultAddress->shipping_pincode:'' ?>">
              <span id="shippingPincodeErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingCity">City<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="shippingCity" type="text" name="shippingCity" value="<?php echo isset($defaultAddress->shipping_city)? $defaultAddress->shipping_city:'' ?>">
              <span id="shippingCityErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingState">State<span class="text-primary">*</span></label>
              <select name="shippingState" class="form-input remove-input" id="shippingState">
                <option value="">Select State</option>
                <?php 
                  if (!empty($states)):
                    foreach($states as $state):
                      if (isset($defaultAddress->shipping_state)) {
                        
                        if ($defaultAddress->shipping_state == $state->id) {
                          $sel = 'selected';
                        } else {
                          $sel = '';
                        }

                      }
                ?>
                  <option <?php echo isset($sel)? $sel:''; ?> value="<?php echo $state->id ?>"><?php echo $state->state ?></option>
                <?php endforeach; endif; ?>
              </select>
              <span id="shippingStateErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingCountry">Country<span class="text-primary">*</span></label>
              <select name="shippingCountry" class="form-input" id="shippingCountry">
                <option value="india">India</option>
              </select>
              <span id="shippingCountryErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingAddress1">Address 1<span class="text-primary">*</span></label>
              <textarea maxlength="100" id="shippingAddress1" class="form-input adjust-textarea remove-input" name="shippingAddress1"><?php echo isset($defaultAddress->shipping_address_1)? $defaultAddress->shipping_address_1:'' ?></textarea>

              <span id="shippingAddress1Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingAddress2">Address 2</label>
              <textarea maxlength="100" id="shippingAddress2" class="form-input adjust-textarea remove-input" name="shippingAddress2"><?php echo isset($defaultAddress->shipping_address_2)? $defaultAddress->shipping_address_2:'' ?></textarea>

              <span id="shippingAddress2Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingFirstName">First Name<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="shippingFirstName" type="text" name="shippingFirstName" value="<?php echo isset($defaultAddress->shipping_first_name)? $defaultAddress->shipping_first_name:'' ?>">
              <span id="shippingFirstNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-10 offset-md-top-0">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingLastName">Last Name<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="shippingLastName" type="text" name="shippingLastName" value="<?php echo isset($defaultAddress->shipping_last_name)? $defaultAddress->shipping_last_name:'' ?>">
              <span id="shippingLastNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-10">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingEmail">Email Address<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="shippingEmail" type="email" name="shippingEmail" value="<?php echo isset($defaultAddress->shipping_email)? $defaultAddress->shipping_email:'' ?>">
              <span id="shippingEmailErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-10">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="shippingPhone">Phone<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="shippingPhone" type="text" name="shippingPhone" value="<?php echo isset($defaultAddress->shipping_phone)? $defaultAddress->shipping_phone:'' ?>">
              <span id="shippingPhoneErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 offset-top-10">
            
            <h4>Billing Details</h4>

            <?php 
              if (isset($defaultAddress->is_billing_same)) {
                
                if ($defaultAddress->is_billing_same) {
                  $isChecked = true;  
                } else {
                  $isChecked = false;
                }

              } else {
                $isChecked = true;
              }
            ?>

            <div class="form-wrap">
              <input <?php echo $isChecked? 'checked':''; ?> class="checkbox" id="isBillingInfoSame" type="checkbox" name="isBillingInfoSame" value="yes">
              <label class="text-light font-italic form-label-outside isBillingInfoSame" for="isBillingInfoSame">
                Billing details same as shipping details
              </label>
              <span id="isBillingInfoSameErr" class="form-validation"></span>
            </div>
          </div>

          <!-- <div class="col-lg-12 billing hide">
            <h4>Billing Details</h4>
          </div> -->

          <div class="col-lg-6 billing <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingPincode">Pincode<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="billingPincode" type="number" name="billingPincode" value="<?php echo isset($defaultAddress->billing_pincode)? $defaultAddress->billing_pincode:'' ?>">
              <span id="billingPincodeErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingCity">City<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="billingCity" type="text" name="billingCity" value="<?php echo isset($defaultAddress->billing_city)? $defaultAddress->billing_city:'' ?>">
              <span id="billingCityErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingState">State<span class="text-primary">*</span></label>
              <select name="billingState" class="form-input remove-input" id="billingState">
                <option value="">Select State</option>
                <?php 
                  if (!empty($states)):
                    foreach($states as $state):
                      if (isset($defaultAddress->billing_state)) {
                        
                        if ($defaultAddress->billing_state == $state->id) {
                          $sel = 'selected';
                        } else {
                          $sel = '';
                        }

                      }
                ?>
                  <option <?php echo isset($sel)? $sel:''; ?> value="<?php echo $state->id ?>"><?php echo $state->state ?></option>
                <?php endforeach; endif; ?>
              </select>
              <span id="billingStateErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingCountry">Country<span class="text-primary">*</span></label>
              <select name="billingCountry" class="form-input" id="billingCountry">
                <option value="india">India</option>
              </select>
              <span id="billingCountryErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingAddress1">Address 1<span class="text-primary">*</span></label>
              <textarea id="billingAddress1" class="form-input adjust-textarea remove-input" name="billingAddress1"><?php echo isset($defaultAddress->billing_address_1)? $defaultAddress->billing_address_1:'' ?></textarea>

              <span id="billingAddress1Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-12 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingAddress2">Address 2</label>
              <textarea id="billingAddress2" class="form-input adjust-textarea remove-input" name="billingAddress2"><?php echo isset($defaultAddress->billing_address_2)? $defaultAddress->billing_address_2:'' ?></textarea>

              <span id="billingAddress2Err" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingFirstName">First Name<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="billingFirstName" type="text" name="billingFirstName" value="<?php echo isset($defaultAddress->billing_first_name)? $defaultAddress->billing_first_name:'' ?>">
              <span id="billingFirstNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-10 offset-md-top-0 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingLastName">Last Name<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="billingLastName" type="text" name="billingLastName" value="<?php echo isset($defaultAddress->billing_last_name)? $defaultAddress->billing_last_name:'' ?>">
              <span id="billingLastNameErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-10 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingEmail">Email Address<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="billingEmail" type="email" name="billingEmail" value="<?php echo isset($defaultAddress->billing_email)? $defaultAddress->billing_email:'' ?>">
              <span id="billingEmailErr" class="form-validation"></span>
            </div>
          </div>

          <div class="col-lg-6 offset-top-10 billing  <?php echo $isChecked? 'hide':''; ?>">
            <div class="form-wrap">
              <label class="text-light font-italic form-label-outside" for="billingPhone">Phone<span class="text-primary">*</span></label>
              <input class="form-input remove-input" id="billingPhone" type="text" name="billingPhone" value="<?php echo isset($defaultAddress->billing_phone)? $defaultAddress->billing_phone:'' ?>">
              <span id="billingPhoneErr" class="form-validation"></span>
            </div>
          </div>
        </div>

        <div class="form-wrap position-relative offset-bottom-0 offset-top-20 form-label-outside">
          <label class="text-light font-italic">PAN</label>
          <input class="form-input remove-input" id="pan" type="text" name="pan" value="<?php echo $userPAN; ?>">
          <span id="panErr" class="form-validation"></span>
        </div>
        <div class="form-wrap position-relative offset-bottom-0 offset-top-20 form-label-outside">
          <label class="text-light font-italic">Gift Message</label>
          <input type="hidden" id="addressId" name="addressId" value="<?php echo isset($defaultAddress) && !empty($defaultAddress)? hash('SHA256', $defaultAddress->id):'' ?>">
          <textarea class="form-input" name="giftMessage" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
        </div>
      </div>
      <div class="col-md-5 checkoutCart sticky-top">
       <div class="row">
        <?php if (!empty($cartData)): ?>
        <div class="col-12">
          <h4 class="offset-top-30 text-left text-thin">Order Summary</h4>
          <table class="table border-0">
            <tbody>
              <?php 
                $subtotal = 0;
                $saved = 0;
                $disRec = 0;

                $coupon = $this->session->userdata('mmtc_promo');

                if (!empty($coupon)) {
                  $disRec = $coupon['discount'];
                }

                foreach ($cartData as $data):
                  $mrp = $data->mrp;
                  $sp = $data->selling_price;

                  $availStock = $data->stock;
                  $cartQty = $data->quantity;

                  if (!$availStock) {
                    $mrp = 0;
                    $sp = 0;
                  }

                  $price = 0;
                  $discPrice = 0;

                  if ($sp > 0) {
                    if ($sp < $mrp) {
                      $discPrice = $sp;
                      $price = $mrp;
                    } else {
                      $price = $mrp;
                    }
                  } else {
                    $price = $mrp;
                  }

                  if ($discPrice) {
                    $subtotal += $discPrice*$cartQty;
                    $saved += $price*$cartQty;
                  } else {
                    $subtotal += $price*$cartQty;
                  }
              ?>
              <tr>
                  <td>
                    <div class="product-thumbnai">
                      <img src="<?php echo base_url($data->image_path) ?>" class="img-responsive img-rounded">
                      <span class="product-thumbnail__quantity" aria-hidden="true"><?php echo $data->quantity ?></span>
                    </div>
                  </td>
                <td>
                  <?php echo $data->product_name ?>
                  <?php if (!$availStock): ?>
                    <br> <span class="text-danger badge mv-pad">OUT OF STOCK</span>
                  <?php endif ?>
                </td>
                <td class="text-right">
                  <?php if ($discPrice): ?>
                    <p class="big text-primary">₹<?php echo check_num($discPrice*$cartQty) ?></p>  
                    <span class="text-strike text-muted">₹<?php echo check_num($price*$cartQty) ?></span>
                  <?php else: ?>
                    <p class="big text-primary">₹<?php echo check_num($price*$cartQty) ?></p>  
                  <?php endif ?>
                </td>
              </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="col-12">
            <table class="table">
              <tbody>
                <tr>
                  <td class="text-spacing-40 text-thin offset-bottom-0">Subtotal</td>
                  <td class="text-right text-regular cart_totals-price">₹<?php echo check_num($subtotal) ?></td>
                </tr>
                <?php if ($saved): ?>
                <tr>
                  <td class="text-spacing-40 text-thin offset-bottom-0">You Saved</td>
                  <td class="text-right text-regular cart_totals-price">₹<?php echo check_num(abs($subtotal - $saved)) ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td class="text-spacing-40 text-thin offset-bottom-0">Delivery Charges</td>
                  <td class="text-right text-regular cart_totals-price">0</td>
                </tr>
                <?php if ($disRec): ?>
                <tr>
                  <td class="text-spacing-40 text-thin offset-bottom-0">Discount</td>
                  <td class="text-right text-regular cart_totals-price">₹<?php echo $disRec ?></td>
                </tr>
                <?php endif ?>
              </tbody>
            </table>
            <hr>
            <table class="table">
              <tbody>
                <tr>
                  <td class="text-spacing-40 text-thin offset-bottom-0">Total</td>
                  <td class="text-right text-regular cart_totals-price">₹<?php echo check_num($subtotal-$disRec) ?></td>
                </tr>
              </tbody>
            </table>
        </div>
        <div class="col-md-12 offset-top-30 text-right">

          <div id="finalPlaceOrderMsg"></div>
        
          <button id="placeOrderBtn" class="btn btn-primary" type="submit">Proceed to Payment</button>
        </div>
      <?php else: ?>
        <div class="col-12">
          <h4>Cart data not found.</h4>
        </div>
      <?php endif; ?>
</div>
</div>
<!-- <div class="col-md-12 offset-top-30">

  <div id="finalPlaceOrderMsg"></div>

  <button id="placeOrderBtn" class="btn btn-primary" type="submit">Proceed to Payment</button>
</div> -->
</div>
</form>


<button id="rzp-button1" class="chck-btn hover-btn collapsed" style="display: none;">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</div>