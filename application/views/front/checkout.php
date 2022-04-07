
    <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li><a href="<?php echo base_url();?>cart">Cart</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs-area end -->
    
    
    <!-- checkout-area start -->
    <div class="checkout-area page-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="billing-details-area">
                        <h4 class="checkout-titel">BILLING DETAILS</h4>
                        <?php 
                            if($this->session->flashdata('billingAddressSaveError'))
                            { 
                                echo '<span class="error" style="color:red">'.$this->session->flashdata('billingAddressSaveError').'</span><br>'; 
                                unset($_SESSION['billingAddressSaveError']);
                            }
                        ?>
                        <?php 
                            if($this->session->flashdata('billingAddressSuccess'))
                            { 
                                echo '<span class="error" style="color:green">'.$this->session->flashdata('billingAddressSuccess').'</span><br>'; 
                                unset($_SESSION['billingAddressSuccess']);
                            }
                        ?>
                        <form action="" method="post" id="checkoutBillingForm">
                             <input type="hidden" name="addresss_id"  value="<?php echo isset($billingAddressData['id']) ? $billingAddressData['id'] : '' ?>">
                            <div class="billing-input">
                                <div class="input-field">
                                    
                                <div class="input-text">
                                   <input placeholder="First Name" type="text" name="billing_first_name" value="<?php echo isset($billingAddressData['billing_first_name']) ? $billingAddressData['billing_first_name'] : '' ?>">
                                    <span class="error" id="error_billing_first_name" style="color:red"><?php echo isset($billingAddressError['billing_first_name']) ? $billingAddressError['billing_first_name'] : '' ?></span>
                                </div>
                                    <div class="input-text">
                                       
                                        <input placeholder="Last Name" type="text" name="billing_last_name" value="<?php echo isset($billingAddressData['billing_last_name']) ? $billingAddressData['billing_last_name'] : '' ?>">

                                    <span class="error" id="error_billing_last_name" style="color:red"><?php echo isset($billingAddressError['billing_last_name']) ? $billingAddressError['billing_last_name'] : '' ?></span>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-text">
                                        <input placeholder="Email" type="email" name="billing_email"   value="<?php echo isset($billingAddressData['billing_email']) ? $billingAddressData['billing_email'] : '' ?>">
                                        <span class="error"  id="error_billing_email" style="color:red"><?php echo isset($billingAddressError['email']) ? $billingAddressError['billing_email'] : '' ?></span>
                                    </div>
                                    <div class="input-text">
                                        <input placeholder="Phone" type="text" name="billing_phone"   value="<?php echo isset($billingAddressData['billing_phone']) ? $billingAddressData['billing_phone'] : '' ?>">
                                        <span class="error"  id="error_billing_phone" style="color:red"><?php echo isset($billingAddressError['billing_phone']) ? $billingAddressError['billing_phone'] : '' ?></span>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-text">
                                        <input type="text" placeholder="Street address" name="billing_address_1" value="<?php echo isset($billingAddressData['billing_address_1']) ? $billingAddressData['billing_address_1'] : '' ?>">

                                        <span class="error"  id="error_billing_address_1" style="color:red"><?php echo isset($billingAddressError['billing_address_1']) ? $billingAddressError['billing_address_1'] : '' ?></span>
                                    </div>
                                    <div class="input-text">
                                         <input type="text"  name="billing_address_2"  placeholder="Apartment, suite, unit etc. (optional)" style="/*margin-top: 1rem;*/" value="<?php echo isset($billingAddressData['billing_address_2']) ? $billingAddressData['billing_address_2'] : '' ?>">
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-text">
                                        <input placeholder="Town / City" type="text"  name="billing_city" value="<?php echo isset($billingAddressData['billing_city']) ? $billingAddressData['billing_city'] : '' ?>">
                                        <span class="error"  id="error_billing_city" style="color:red"><?php echo isset($billingAddressError['billing_city']) ? $billingAddressError['billing_city'] : '' ?></span>
                                    </div>
                                    <div class="input-text">
                                        <input placeholder="State" type="text" name="billing_state" value="<?php echo isset($billingAddressData['billing_state']) ? $billingAddressData['billing_state'] : '' ?>">
                                        <span class="error"  id="error_billing_state"  style="color:red"><?php echo isset($billingAddressError['billing_state']) ? $billingAddressError['billing_state'] : '' ?></span>
                                    </div>
                                </div>
                                <div class="input-field">
                                    <div class="input-text" style="padding-left: unset !important;">
                                       <input placeholder="Pincode"  type="text" name="billing_pincode" value="<?php echo isset($billingAddressData['billing_pincode']) ? $billingAddressData['billing_pincode'] : '' ?>">
                                       <span class="error"  id="error_billing_pincode"  style="color:red"><?php echo isset($billingAddressError['billing_pincode']) ? $billingAddressError['billing_pincode'] : '' ?></span>
                                    </div>
                                </div> 
                            </div>
                      
                            <div class="billing-submit">
                                <div class="shipping-different" style="display:none;">
                                    <div class="shipping-different-check">
                                        <input id="is_billing_same" type="radio" name="is_billing_same" value="1" checked>
                                    </div>
                                    <div class="shipping-diffrent-text">
                                        <p>Ship to this address</p>
                                    </div>
                                </div>
                                <br>
                                <!-- 
                                    <div class="continue-btn">
                                        <div class="actions-log  text-right">
                                            <input type="submit" class="button" name="saveAddressBtn" value="Save Address" >
                                        </div>
                                    </div> 
                                -->
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="your-order-area">
                       
                        <div class="cart_total">
                            <h4>Your Order</h4>
                            <div class="cart-inner">
                                <ul>
                                    <?php 
                                    
                                        $subTotal = [];
                                        $couponPriceDiscount = $couponData = [];   
                                        if($this->session->userdata('couponData')){
                                           $couponData = $this->session->userdata('couponData');
                                         
                                        }
                                        $applyCount = 1;
                                        foreach ($cart_data as $cart_data_key => $cart_data_value) {

                                          //   if($couponData){

                                          //     if($couponData['sub_category']){
                                          //         $sub_category_arr = explode (",", $couponData['sub_category']);
                                          //         if (in_array($cart_data_value['category_level_2'], $sub_category_arr))
                                          //         {
                                          //           $applyCount = 1;
                                          //         }
                                          //     }

                                          //     if($couponData['inclusion_product']){
                                          //         $inclusion_product_arr = explode (",", $couponData['inclusion_product']);
                                          //         if (in_array($cart_data_value['id'], $inclusion_product_arr))
                                          //         {
                                          //           $applyCount = 1;
                                          //         }
                                          //     }

                                          //     if($couponData['exclusion_sku']){
                                          //         $exclusion_sku_arr = explode (",", $couponData['exclusion_sku']);
                                          //         if (in_array($cart_data_value['sku_code'], $exclusion_sku_arr))
                                          //         {
                                          //           $applyCount = 0;
                                          //         }
                                          //     }

                                          //     if($couponData['exclusion_sub_category']){
                                          //         $exclusion_sub_category_arr = explode (",", $couponData['exclusion_sub_category']);
                                          //         if (in_array($cart_data_value['category_level_2'], $exclusion_sub_category_arr))
                                          //         {
                                          //           $applyCount = 0;
                                          //         }
                                          //     }
                                            
                                          // }
                                    ?>
                                    <li>
                                        <?php echo $cart_data_value['product_name']; ?> <i class="fa fa-times"></i> <?php echo $cart_data_value['cart_qty']; ?> 
                                       
                                            <?php
                                            if($cart_data_value['selling_price']){

                                                if($applyCount == 1)
                                                {
                                                      $couponPriceDiscount[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                                }

                                                echo '<span><i class="fa fa-inr"></i>'.$cart_data_value['selling_price'] * $cart_data_value['cart_qty'].'</span>';
                                                $subTotal[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                            } else {
                                                if($applyCount == 1)
                                                {
                                                      $couponPriceDiscount[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                                }
                                                echo '<span><i class="fa fa-inr"></i>'.$cart_data_value['mrp'] * $cart_data_value['cart_qty'].'</span>';
                                                $subTotal[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                            }
                                        ?>
                                        
                                    </li>
                                    <?php } ?>   
                                   <?php 
                                         $subTotal = array_sum($subTotal);
                                         $total = $subTotal;
                                         $totalDiscount = 0;
                                         // if($couponData){
                                         //    if($couponPriceDiscount){

                                         //        $couponPriceTotal = array_sum($couponPriceDiscount);

                                         //        if($couponData['discount_type'] == 1){
                                         //           $totalDiscount = round($couponData['discount'] * ($couponPriceTotal / 100),2);
                                         //        }  else {
                                         //            $totalDiscount = $couponData['discount'];
                                         //        }
                                                   
                                         //        if($couponData['max_discount']){
                                         //            if($totalDiscount > $couponData['max_discount']){
                                         //             $totalDiscount = $couponData['max_discount'];
                                         //            }
                                         //        }   

                                         //        if($couponData['min_cart_value']){
                                         //            if($couponData['min_cart_value'] > $total){
                                         //                $totalDiscount = 0;
                                         //            }
                                         //        }
                                              
                                         //    }
                                         // }
                                    ?>
                                   
                                   <!--  <li>Shipping cost <span>25.00$</span></li> -->
                                </ul>
                            </div>
                             <p>Subtotal <span>$<?php echo $subTotal; ?></span></p>
                                    <?php 
                                        if($totalDiscount){
                                            $total = $total - $totalDiscount;
                                            echo '<p> Coupon Discount <span><i class="fa fa-inr"></i>'.$totalDiscount.'</span></p>';
                                        }
                                    ?>

                            <?php
                                if ($couponData):
                            ?>
                                <p> Coupon Discount (<?php echo $couponData['promo_code'] ?>) <span><i class="fa fa-inr"></i><?php echo $couponData['discount'] ?></span></p>

                                <p>Total <span><i class="fa fa-inr"></i><?php echo $total-$couponData['discount']; ?></span></p>

                            <?php else: ?>

                                <p>Total <span><i class="fa fa-inr"></i><?php echo $total; ?></span></p>

                            <?php endif; ?>
                            

                            
                        </div>
                        <div class="payment-method">
                            <?php /*
                           <div class="accordion-active">
                                <!--panel body start-->
                                <h4 class="open">DIRECT BANK TRANSFER</h4>
                                <div class="accordion-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati expedita id debitis, animi, mollitia saepe asperiores distinctio maiores soluta enim blanditiis quis, earum molestias minima libero velit. Corporis, sapiente dolores.</p>
                                </div>
                                <!--panel body end-->
                                <!--panel body start-->
                                <h4>CASH ON DELIVERY</h4>
                                <div class="accordion-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati expedita id debitis, animi, mollitia saepe asperiores distinctio maiores soluta enim blanditiis quis, earum molestias minima libero velit. Corporis, sapiente dolores.</p>
                                </div>
                                <!--panel body end-->
                                <!--panel body start-->
                                <h4>CHEQUE PAYMENT</h4>
                                <div class="accordion-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati expedita id debitis, animi, mollitia saepe asperiores distinctio maiores soluta enim blanditiis quis, earum molestias minima libero velit. Corporis, sapiente dolores.</p>
                                </div>
                                <!--panel body end-->
                                <!--panel body start-->
                                <h4>paypal</h4>
                                <div class="accordion-description">
                                    <img src="<?php echo base_url();?>assets/front/img/logo/cont.png" alt="">
                                </div>
                                <!--panel body end-->
                            </div>
                            */ ?>

                            <div class="payment-checkbox">
                               <!--  <input type="checkbox">  -->
                               <input type="checkbox" id="termsConditionCheckout">
                                I’VE READ AND ACCEPT THE TERMS & CONDITIONS
                            </div>
                           
                            <div class="actions-log  text-right">
                                <input  id="rzp-button1" type="button" class="button" name="checkoutBtn" id="checkoutBtn" value="Proceed to Payment" disabled>
                            </div>
                           <!--  <div class="place-order">
                                <input type="submit" name="checkout" value="checkout" class="btn btn-primary">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->


