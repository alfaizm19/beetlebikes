<!-- Page Content-->
<section class="section">
  <div class="container">
    <div>
      <ol class="breadcrumb">
        <li><a class="icon icon-sm fa-home" href="./"></a></li>
        <li class="active">Profile
        </li>
      </ol>
    </div>
  </div>
</section>
<section id="profilePanel" class="section">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="row m-0 profileNav">
          <ul class="nav nav-pills">
            <li class="nav-item  <?php echo $tabStatus == 'step1' ? 'active' : ''; ?> "><a class="nav-link" data-toggle="pill" href="#step1"><i class="fa fa-user"></i> Personal details</a></li>
            <li class="nav-item  <?php echo $tabStatus == 'step2' ? 'active' : ''; ?> "><a class="nav-link" data-toggle="pill" href="#step2"><i class="fa fa-user"></i> Change Password</a></li>
            <li class="nav-item  <?php echo $tabStatus == 'step3' ? 'active' : ''; ?>"><a class="nav-link" data-toggle="pill" href="#step3"><i class="fa fa-history" aria-hidden="true"></i> Order History</a></li>
            <li class="nav-item <?php echo $tabStatus == 'step4' ? 'active' : ''; ?>"><a class="nav-link" data-toggle="pill" href="#step4"><i class="fa fa-map" aria-hidden="true"></i> Address</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <div class="tab-content">
          <div class="tab-pane fade in text-style <?php echo $tabStatus == 'step1' ? 'active show' : ''; ?> " id="step1">
            <p>Personal details <a id="editProfile" class="float-right cursorPointer" style="color:#c89a58;cursor:pointer;" href="javascript:void(0)"><i class="fa fa-pencil-square-o"></i>Edit</a></p>
            <?php 
            if($this->session->flashdata('accountUpdate'))
            { 
              echo '<span class="error" style="color:green">'.$this->session->flashdata('accountUpdate').'</span><br>'; 
              unset($_SESSION['accountUpdate']);
            }
            ?>
            <?php 
            if($this->session->flashdata('accountUpdateError'))
            { 
              echo '<span class="error" style="color:red">'.$this->session->flashdata('accountUpdateError').'</span><br>'; 
              unset($_SESSION['accountUpdateError']);
            }
            ?>

            <form method="post" action="" class="profile-content <?php echo $profileDisable; ?>" id="profileArea">   
              <div class="form-group row">
                <label class="control-label col-sm-4 text-right" for="name">Name*</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $userData['name']; ?>">
                  <span class="error" style="color:red"><?php echo isset($profileError['name']) ? $profileError['name'] : '' ?></span>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 text-right" for="email">Email</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control" name="email" id="email" value="<?php echo $userData['email']; ?>">
                  <span class="error" style="color:red"><?php echo isset($profileError['email']) ? $profileError['email'] : '' ?></span>
                  <?php 
                  if($this->session->flashdata('duplicateEmailError'))
                  { 
                    echo '<span class="error" style="color:red">'.$this->session->flashdata('duplicateEmailError').'</span><br>'; 
                    unset($_SESSION['duplicateEmailError']);
                  }
                  ?>
                </div>
              </div>
              <div class="form-group row">
                <label class="control-label col-sm-4 text-right" name="mobile_no" for="phone">Mobile*</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" name="mobile" id="phone" value="<?php echo $userData['phone_number']; ?>">
                  <span class="error" style="color:red"><?php echo isset($profileError['mobile']) ? $profileError['mobile'] : '' ?></span>
                  <?php 
                  if($this->session->flashdata('duplicateMobileError'))
                  { 
                    echo '<span class="error" style="color:red">'.$this->session->flashdata('duplicateMobileError').'</span><br>'; 
                    unset($_SESSION['duplicateMobileError']);
                  }
                  ?>
                </div>
              </div>

          <!--   
            <div class="form-group row">
                <label class="control-label col-sm-4 text-right" for="pan">Pan No.</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control" id="pan">
                </div>
            </div> 
          -->
          <div class="row">
            <div class="col-12  text-right">
              <div class="actions-log">
                <input type="submit" class="button" name="profileBtn" id="profileBtn" value="Update" <?php echo $profileDisable == '' ? '' : 'disabled'; ?>>
              </div>
            </div>
          </div>
        </form> 
      </div>
      <div class="tab-pane fade in text-style  <?php echo $tabStatus == 'step2' ? 'active show' : ''; ?> " id="step2">
        <?php 
        if($this->session->flashdata('passwordChangeSuccess'))
        { 
          echo '<span class="error" style="color:green">'.$this->session->flashdata('passwordChangeSuccess').'</span><br>'; 
          unset($_SESSION['passwordChangeSuccess']);
        }
        ?>
        <?php 
        if($this->session->flashdata('passwordChangeError'))
        { 
          echo '<span class="error" style="color:red">'.$this->session->flashdata('passwordChangeError').'</span><br>'; 
          unset($_SESSION['passwordChangeError']);
        }
        ?>

        <form method="post" action="" class="profile-content">   
          <div class="form-group row">
            <label class="control-label col-sm-4 text-right" for="name">Old Password*</label>
            <div class="col-sm-6">
              <input placeholder="Old Password" type="password" class="form-control" name="old_password" id="old_password">
              <span class="error" style="color:red">
                <?php echo isset($profileError['old_password']) ? $profileError['old_password'] : '' ?>
              </span>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-4 text-right" for="email">New Password*</label>
            <div class="col-sm-6">
              <input placeholder="New Password"  type="password" class="form-control" name="new_password" id="new_password" >
              <span class="error" style="color:red"><?php echo isset($profileError['new_password']) ? $profileError['new_password'] : '' ?></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="control-label col-sm-4 text-right" name="mobile_no" for="phone">Confirm Password*</label>
            <div class="col-sm-6">
              <input placeholder="Confirm Password" type="password" class="form-control" name="confirm_password" id="confirm_password">
              <span class="error" style="color:red"><?php echo isset($profileError['confirm_password']) ? $profileError['confirm_password'] : '' ?></span>
            </div>
          </div>
          <div class="row">
            <div class="col-12  text-right">
              <div class="actions-log">
                <input type="submit" class="button" name="changePasswordBtn" id="changePasswordBtn" value="Change Password" >
              </div>
            </div>
          </div>
        </form> 
      </div>
      <div class="tab-pane fade text-style <?php echo $tabStatus == 'step3' ? 'active show' : ''; ?> " id="step3" style="overflow:hidden;">
        <p class="OH">Order History</p>

        <div id="accordion" class="order-history" style="margin-bottom: 2rem;">

          <?php 
          if($getOrderDetails) { 
            foreach ($getOrderDetails as $getOrderDetailsKey => $getOrderDetailsValue) {   

              $order = $getOrderDetailsValue;
              $hash = hash('SHA256', $order['id']);
              ?>

              <div class="card" style="margin-bottom: 5rem;">
                <div class="card-header">
                 <!--  <a class="card-link row" data-toggle="collapse" href="#collapse<?php echo $getOrderDetailsValue['order_id']; ?>"> -->
                  <div class="col-sm-3">
                    <strong>Order No.</strong><br>
                    <?php echo strtoupper($getOrderDetailsValue['custom_orderid']); ?>
                  </div>
                  <div class="col-sm-2">
                    <strong>Placed On</strong><br>
                    <?php echo date('d-M-Y', strtotime($getOrderDetailsValue['created_at'])); ?>
                  </div>

                  <div class="col-sm-2">
                    <strong>Order Status</strong><br>

                    <?php if ($order['order_status'] == 'Order Cancellation - By Customer'): ?>
                      Order Cancelled
                    <?php else: ?>  
                      <?php echo ucwords($getOrderDetailsValue['order_status']); ?>
                    <?php endif ?>
                    
                  </div>

                  <div class="col-sm-2">
                    <strong>Paid Amount</strong><br>
                    <i class="fa fa-inr"></i><?php echo $getOrderDetailsValue['paid_amount']; ?>
                  </div>

                  <div class="col-sm-3">
                    <!-- <strong>Cancel Order</strong><br> -->
                    
                      <!-- <i style="font-size: 1.8rem; text-align: center;" class="fa fa-times"></i> -->

                      <?php
                        $allowCancelOrder = array(
                          'Order Confirmed', 'Approved', 'Hold'
                        );

                        if(in_array($getOrderDetailsValue['order_status'], $allowCancelOrder)):
                      ?>
                        
                        <a id="cancelOrderBtn<?php echo $hash ?>" onclick="cancelOrder('<?php echo $hash ?>')" class="btn btn-default">Cancel Order</a>
                        <span id="showOrderCanMsg<?php echo $hash ?>"></span>

                      <?php endif ?>


                      <?php if (!empty($getOrderDetailsValue['awb_number'])): ?>
                          <p><strong>AWB:</strong> <?php echo $getOrderDetailsValue['awb_number']; ?></p>
                      <?php endif ?>

                      <?php

                        $allowTrackOrder = array('Order Shipped');

                        if(in_array($getOrderDetailsValue['order_status'], $allowTrackOrder)):
                      ?>
                      
                        <a href="<?php echo !empty($getOrderDetailsValue['tracking_link'])? $getOrderDetailsValue['tracking_link']:'javascript:void(0)';  ?>" target="_blank" class="btn btn-default">Track Order</a>

                      <?php endif; ?>

                      <?php if ($getOrderDetailsValue['order_status'] == 'Order Shipped' OR $getOrderDetailsValue['order_status'] == 'Order Delivered'): ?>
                        
                        <a href="<?php echo base_url('profile/invoice/'.hash('SHA256', $getOrderDetailsValue['id'])); ?>" target="_blank" class="btn btn-default">Invoice</a>

                      <?php endif; ?>

                  </div>
                  <!-- </a> -->
                </div>
                <div id="collapse<?php echo $getOrderDetailsValue['order_id']; ?>" class="collapse in" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row" style="display: flex;flex-wrap: wrap;">
                      <div class="col-lg-12 col-md-12">
                       <!-- <div class=""> -->

                        <table class="table-content ">

                          <tbody>
                            <?php 
                            if($getOrderDetailsValue['orderDetails'])
                            {
                              $subTotal = [];
                              foreach ($getOrderDetailsValue['orderDetails'] as $getOrderDetailsValueKey => $getOrderDetailsValueValue) {
                                ?>

                                <div class="row">
                                 
                                  <div class="col-md-3">
                                    <a href="<?php echo base_url().'product/'.$getOrderDetailsValueValue['slug']; ?>"><img src="<?php echo base_url().$getOrderDetailsValueValue['image_path']; ?>" alt=""></a>
                                  </div>


                                  <div class="col-md-6 cart-name">
                                   <h3><a href="<?php echo base_url().'product/'.$getOrderDetailsValueValue['slug']; ?>"><?php echo $getOrderDetailsValueValue['product_name']; ?></a></h3>

                                   <div class="cart-quantity">
                                    <div class="product-quantity">
                                      <div class="cart-quantity">
                                        <strong>QTY-</strong>

                                        <?php echo $getOrderDetailsValueValue['quantity']; ?>

                                        |

                                        <strong>Price-</strong>

                                        <i class="fa fa-inr"></i><?php echo $getOrderDetailsValueValue['price']; ?>
                                      </div>

                                      <div class="cart-quantity">
                                        
                                      </div>

                                      <div class="cart-quantity">
                                        <strong>Total Price-</strong>

                                         <i class="fa fa-inr"></i><?php echo $getOrderDetailsValueValue['price'] * $getOrderDetailsValueValue['quantity']; ?>
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3" style="padding-left:10px;">

                                  <?php 
                                    if ($getOrderDetailsValue['order_status'] == 'Order Delivered'):

                                      $isExistReview = $this->Master_model->isExistReview($getOrderDetailsValueValue['product_id']);

                                  ?>

                                  <?php if ($isExistReview): ?>
                                    <a href="<?php echo base_url('review/create/').$getOrderDetailsValueValue['slug'];?>" target="_blank" class="btn btn-default">Edit A Review</a>
                                  <?php else: ?>
                                    <a href="<?php echo base_url('review/create/').$getOrderDetailsValueValue['slug'];?>" target="_blank" class="btn btn-default">Write A Review</a>
                                  <?php endif; ?>

                                  <?php endif ?>

                                </div>

                              </div>
                              <hr>
                            <?php }  }?>   

                          </tbody>
                          <tfoot style=" border-top: 3px solid #efefef; ">
                            <div class="row cart-history-bottom">
                              <?php 
                              if($getOrderDetailsValue['discount'])
                                { echo '
                              
                              <div class="col-md-3"><b>Discount :</b><i class="fa fa-inr"></i>'.$getOrderDetailsValue['discount'].' </div>' ;
                            } else {
                              echo '';
                            }
                            ?>
                            <div class="col-md-3"><b>Sub Total : </b><i class="fa fa-inr"></i><?php echo $getOrderDetailsValue['sub_total']; ?></div>
                            <div class="col-md-3"><b>Total : </b><i class="fa fa-inr"></i><?php echo $getOrderDetailsValue['paid_amount']; ?></div>
                          </div>
                        </tfoot>
                      </table>

                    <!-- </div> -->
                  </div>

                </div>
              </div>
            </div>
          </div>

        <?php }   }  ?>                                    
      </div>
    </div>


    <div class="tab-pane fade text-style profileAddressPanel <?php echo $tabStatus == 'step4' ? 'active in' : ''; ?> " id="step4" style="overflow:hidden;">
      <p class="OH">Address</p>
      <div class="row m-0">
        <?php 
        if(!$billilngAddress) {
          ?>
          <div class="col-md-4 col-sm-6 col-12">

            <div class="card" style="margin-left: 0;">
              <a class="card-body addPanel text-center cursorPointer" id="addaddress">
                <div class="addButton">
                  <i class="fa fa-plus"></i><br/>Add Address
                </div>


              </a>
            </div>

          </div>
        <?php }  ?>    
        <?php 
        if($billilngAddress) {
                     // foreach ($billilngAddress as $billilngAddressKey => $billilngAddressValue) {
          ?>
          <div class="col-md-2 col-sm-2 col-2">
            &nbsp;
          </div>
          <div class="col-md-8 col-sm-6 col-12 addressCard">
            <div class="card" style="margin-right: 0;">
              <div class="card-header"><small>Address</small></div>
              <?php /*if($billilngAddress['is_default'] == 1) { echo '<div class="card-header"><small>Default</small></div>';  } */ ?>

              <div class="card-body">
                <?php 
                echo $billilngAddress['billing_first_name'].' '.$billilngAddress['billing_last_name'].'<br>';
                echo $billilngAddress['billing_email'].'<br>';
                echo $billilngAddress['billing_state'].'<br>';
                echo $billilngAddress['billing_city'].' - '.$billilngAddress['billing_pincode'].'<br>';
                echo 'Address 1: '.$billilngAddress['billing_address_1'].'<br>';
                echo 'Address 2: '.$billilngAddress['billing_address_2'].'<br>';
                echo 'Phone number: '.$billilngAddress['billing_phone'].'<br>';
                ?>

              </div>
              <div class="card-footer">
                <a href="<?php echo base_url(); ?>profile?addressId=<?php echo $billilngAddress['id']; ?>" class="cursorPointer mr_3 edit-form">Edit</a><!-- |<a class="cursorPointer ml_3" onclick="$(this).closest('.addressCard').remove()">Remove</a> -->
              </div> 
            </div>
          </div>
        <?php } // }  ?>
        <div class="col-md-12 append-form" <?php echo $addressStatus != '' ? $addressStatus : ''; ?>>
          <!-- Page Content-->

          <div class="container section-60 text-md-left">
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
          <form class="rd-form rd-mailform order-form profile-content" method="post" action="">
            <input type="hidden" name="addresss_id" value="<?php echo $addressId; ?>">
            <div class="row">
              <div class="col-md-7 mx-auto" style="margin-top: 2rem;">
                <h4>Billing Details</h4>
                <div class="row offset-top-20">
                  <div class="col-lg-6">
                    <div class="form-wrap">
                      <label class="text-light font-italic form-label-outside" for="contact-name">First Name<span class="text-primary">*</span></label>
                      <input class="form-input" id="contact-name" type="text" name="first_name"  value="<?php echo isset($billingAddressData['first_name']) ? $billingAddressData['first_name'] : '' ?>">

                      <span class="error" style="color:red"><?php echo isset($billingAddressError['first_name']) ? $billingAddressError['first_name'] : '' ?></span>
                    </div>
                  </div>
                  <div class="col-lg-6 offset-top-10 offset-md-top-0">
                    <div class="form-wrap">
                      <label class="text-light font-italic form-label-outside" for="contact-last-name">Last Name<span class="text-primary">*</span></label>
                      <input class="form-input" id="contact-last-name" type="text" name="last_name"  value="<?php echo isset($billingAddressData['last_name']) ? $billingAddressData['last_name'] : '' ?>">
                      <span class="error" style="color:red"><?php echo isset($billingAddressError['last_name']) ? $billingAddressError['last_name'] : '' ?></span>
                    </div>
                  </div>
                         <!--  <div class="col-lg-12 offset-top-10">
                            <div class="form-wrap offset-bottom-0">
                              <label class="text-light font-italic form-label-outside" for="company-name">Company Name<span class="text-primary">*</span></label>
                              <input class="form-input" id="company-name" type="text" name="company-name" >
                            </div>
                          </div> -->
                          <div class="col-lg-6 offset-top-10">
                            <div class="form-wrap">
                              <label class="text-light font-italic form-label-outside" for="contact-email">Email Address<span class="text-primary">*</span></label>
                              <input class="form-input" id="contact-email" type="email" name="email"   value="<?php echo isset($billingAddressData['email']) ? $billingAddressData['email'] : '' ?>">
                              <span class="error" style="color:red"><?php echo isset($billingAddressError['email']) ? $billingAddressError['email'] : '' ?></span>
                            </div>
                          </div>
                          <div class="col-lg-6 offset-top-10">
                            <div class="form-wrap">
                              <label class="text-light font-italic form-label-outside" for="contact-phone">Phone<span class="text-primary">*</span></label>
                              <input class="form-input" id="contact-phone" type="text" name="phone"   value="<?php echo isset($billingAddressData['phone']) ? $billingAddressData['phone'] : '' ?>">
                              <span class="error" style="color:red"><?php echo isset($billingAddressError['phone']) ? $billingAddressError['phone'] : '' ?></span>
                            </div>
                          </div>
                          <div class="col-lg-12 offset-top-10">
                            <div class="form-wrap offset-bottom-0">
                              <label class="form-label-outside text-light font-italic" for="address">Address<span class="text-primary">*</span></label>

                              <input class="form-input" type="text" placeholder="Street address" name="address_1" value="<?php echo isset($billingAddressData['address_1']) ? $billingAddressData['address_1'] : '' ?>">

                              <span class="error" style="color:red"><?php echo isset($billingAddressError['address_1']) ? $billingAddressError['address_1'] : '' ?></span>

                              <input class="offset-top-10 form-input" id="address" type="text" name="address_2"  placeholder="Apartment, suite, unit etc. (optional)" style="margin-top: 1rem;" value="<?php echo isset($billingAddressData['address_2']) ? $billingAddressData['address_2'] : '' ?>">
                            </div>
                          </div>
                          <div class="col-lg-12 offset-top-10">
                            <div class="form-wrap offset-bottom-0">
                              <label class="form-label-outside text-light font-italic" for="location">Town / City<span class="text-primary">*</span></label>
                              <input class="form-input" id="location" type="text"  name="city" value="<?php echo isset($billingAddressData['city']) ? $billingAddressData['city'] : '' ?>">
                              <span class="error" style="color:red"><?php echo isset($billingAddressError['city']) ? $billingAddressError['city'] : '' ?></span>

                            </div>
                          </div>
                          <div class="col-lg-6 offset-top-10">
                            <div class="form-wrap">
                              <label class="form-label-outside text-light font-italic">State / County<span class="text-primary">*</span></label>
                              <input class="form-input" type="text" name="state" value="<?php echo isset($billingAddressData['state']) ? $billingAddressData['state'] : '' ?>">
                              <span class="error" style="color:red"><?php echo isset($billingAddressError['state']) ? $billingAddressError['state'] : '' ?></span>
                            </div>
                          </div>
                          <div class="col-lg-6 offset-top-10">
                            <div class="form-wrap">
                              <label class="form-label-outside text-light font-italic">Postcode / ZIP<span class="text-primary">*</span></label>
                              <input class="form-input" type="text" name="pincode" value="<?php echo isset($billingAddressData['pincode']) ? $billingAddressData['pincode'] : '' ?>">
                              <span class="error" style="color:red"><?php echo isset($billingAddressError['pincode']) ? $billingAddressError['pincode'] : '' ?></span>
                            </div>
                          </div>
                         <!--  <div class="col-lg-6 offset-top-10">
                            <div class="form-wrap">
                              <label class="form-label-outside text-light font-italic">Set Default Address<span class="text-primary"></span></label>
                              <input class="form-input" type="radio" name="default_address" value="1" >
                            </div>
                          </div> -->
                        </div>
                        <!--   
                          <h4 class="mt-2" style="margin-top: 2rem;">Additional Information</h4>
                          <div class="form-wrap position-relative offset-bottom-0 offset-top-20 form-label-outside">
                            <label class="text-light font-italic">Company Name</label><span class="text-primary"> *</span>
                            <textarea class="form-input" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                          </div>
                        -->
                        <br>
                        <div class="row mx-0 offset-top-30">
                          <button class="btn btn-primary form_submit" type="submit" style="margin-left: 15px;" name="saveAddressBtn">Submit</button>
                        </div>
                      </div>

                    </div>
                  </form>
                </div>
              </div>                                  
              
            </div>

          </div>


        </div>
      </div>
    </div>

  </div>
</section>

<script type="text/javascript">
  function cancelOrder(id) {

    if (confirm('Are you sure want to cancel your order?')) {

      $.ajax({
        url: '<?php echo base_url("ajax/orderCancel") ?>',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
        beforeSend: function() {
          $("#cancelOrderBtn"+id).attr('disabled', true);
          $("#showOrderCanMsg"+id).html('');
          $("#cancelOrderBtn"+id).text('Please wait...');
        },
        success: function(res) {
          if (res.error == true) {
            $("#showOrderCanMsg"+id).html(`<span class="text-danger">${res.msg}</span>`);
          } else {
            $("#showOrderCanMsg"+id).html(`<span class="text-success">${res.msg}</span>`);

            setTimeout(function() {
              location.reload();
            }, 3000);
          }

          $("#cancelOrderBtn"+id).removeAttr('disabled');
          $("#cancelOrderBtn"+id).text('Cancel Order');

          setTimeout(function() {
            $("#showOrderCanMsg"+id).html('');
          }, 4000);

        }
      });
      

    } else {
      return false;
    }
    
  }
</script>