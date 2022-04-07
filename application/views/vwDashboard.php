<section class="section">
  <div class="container">
    <div>
      <ol class="breadcrumb">
        <li><a class="icon icon-sm fa-home text-primary" href="<?php echo base_url(); ?>"></a></li>
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
      <div class="row m-0 profileNav mt-3 mb-3">
        <ul class="nav nav-pills">
          <!-- 09052021 Start -->
          <li class="nav-item"><a class="text-left nav-link active show" data-toggle="pill" href="#step1"><i class="fa fa-user"></i> Personal details</a></li>
          <li class="nav-item"><a class="text-left nav-link" data-toggle="pill" href="#step2"><i class="fa fa-history" aria-hidden="true"></i> Order History</a></li>
          <li class="nav-item"><a class="text-left nav-link" data-toggle="pill" href="#step3"><i class="fa fa-address-card" aria-hidden="true"></i> Address</a></li>
          <li class="nav-item"><a class="text-left nav-link" href="<?php echo base_url('customer/wishlist') ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Wishlist</a></li>
          <li class="nav-item"><a class="text-left nav-link" href="<?php echo base_url('customer/change-password') ?>"><i class="fa fa-lock" aria-hidden="true"></i> Change Password</a></li>
          <!-- 09052021 End -->
        </ul>
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content profile-content disabledEdit">
        <!-- 09052021 Start -->
        <div class="tab-pane fade in text-style active show" id="step1">
          <form method="post" id="profileForm">
            <p> <span class="personal-detail-span">Personal details</span> <a class="float-right cursorPointer" style="color:#c89a58;cursor:pointer;" onclick="$(this).closest('.profile-content').removeClass('disabledEdit');"><i class="fa fa-pencil-square-o"></i>Edit</a></p>
            <div class="form-group row">
              <label class="control-label col-sm-4 text-right" for="firstName">First Name*</label>
              <div class="col-sm-6">
                <input name="firstName" type="text" class="form-control" id="firstName" value="<?php echo $user->first_name ?>">
                <span class="firstNameErr text-danger removeErr pull-left"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-4 text-right" for="name">Last Name*</label>
              <div class="col-sm-6">
                <input name="lastName" id="lastName" type="text" class="form-control" value="<?php echo $user->last_name ?>">
                <span class="lastNameErr text-danger removeErr pull-left"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-4 text-right" for="email">Email*</label>
              <div class="col-sm-6">
                <input  type="email" name="email" class="form-control" id="email" value="<?php echo $user->email ?>" disabled>
                <span class="emailErr removeErr pull-left"></span>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-sm-4 text-right" for="phone">Mobile*</label>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user->phone_number ?>">
                <span class="phoneErr removeErr text-danger pull-left"></span>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="control-label col-sm-4 text-right" for="pan">PAN</label>
              <div class="col-sm-6">
                <input name="pan" type="text" class="form-control" id="pan" value="<?php echo $user->pan_no ?>">
                <span class="panErr removeErr text-danger pull-left"></span>
              </div>
            </div>

            <div class="form-group row">
              <label class="control-label col-sm-4 text-right" for="gst">GST No.</label>
              <div class="col-sm-6">
                <input name="gst" type="text" class="form-control" id="gst" value="<?php echo $user->gst_no ?>">
                <span class="gstErr removeErr text-danger pull-left"></span>
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-12">
                <div id="finalUpdateProfileMsg" style="position: relative; right: 30px;"></div>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-6">
                <button type="submit" id="btnProfile" class="prefix-sm-30 btn btn-primary btn-icon btn-icon-left btn-text">Submit</button>
              </div>
            </div>

            <!-- <div class="row">
              <div class="col-12 text-left">
                <a class="prefix-sm-30 btn btn-primary btn-icon btn-icon-left" href="<?php echo base_url('customer/change-password') ?>"><span class="btn-text">Submit</span></a>
                <button type="submit" class="prefix-sm-30 btn btn-primary btn-icon btn-icon-left btn-text">Submit</button>
              </div>
            </div> -->
          </form>
        </div>
        <!-- 09052021 End -->
        <div class="tab-pane fade text-style" id="step2" style="overflow:auto;">
          <p>Order History</p>

          <?php if (!empty($orders)): ?>

          <div id="accordion" class="order-history">
            <?php $i=1; foreach ($orders as $order): ?>
              <div class="card">
                <div class="card-header">
                <a class="card-link row" data-toggle="collapse" href="#collapseOne<?php echo $order->id ?>">
                  <div class="col-3">
                    <small>Order ID</small>
                    <?php echo $order->custom_orderid ?>
                  </div>
                  <div class="col-3">
                    <small>Placed On</small>
                    <?php echo date('d M Y h:i A', strtotime($order->order_date)); ?>
                  </div>
                  <div class="col-3">
                    <small>Status</small>
                    <?php 

                      switch ($order->order_status) {
                        case 'Order Confirmed (Verified)':
                          echo 'Order Confirmed';
                          break;

                        case 'Hold':
                          echo 'Order Confirmed';
                          break;

                        case 'Reverse Pickup Delivered':
                          echo 'Reverse Pickup Done';
                          break;

                        case 'Order Cancellation':
                          echo 'Order Cancelled By Seller';
                          break;

                        case 'Order Cancellation - By Customer':
                          echo 'Order Cancelled';
                          break;
                        
                        default:
                          echo $order->order_status;
                          break;
                      }

                    ?>
                  </div>
                  <div class="col-3">
                  <small>Grand Total</small>
                    <i class="fa fa-inr"></i><?php echo $order->paid_amount ?>
                  </div>
                </a>
                </div>
                  <div id="collapseOne<?php echo $order->id ?>" class="collapse <?php echo $i==1? 'show':'' ?>" data-parent="#accordion">
                  <div class="card-body">
                    <?php 
                      $subOrders = $this->db
                      ->select('a.*, b.product_name, b.slug, b.sku_code, b.image_path')
                      ->join('product as b', 'a.product_id = b.id')
                      ->get_where('order_item as a', array('order_id' => $order->id))->result_object();

                      if (!empty($subOrders)):
                        foreach($subOrders as $subOrder):
                          $productId = hash('SHA256', $subOrder->product_id);
                    ?>
                    <div class="row">
                      <div class="col-lg-2 col-md-3">
                        <img src="<?php echo base_url($subOrder->image_path) ?>" class="img-fluid" />
                      </div>
                      <div class="col-lg-6 col-md-9">
                        <h3 class="order-product-title">
                          <a target="_blank" href="<?php echo base_url($subOrder->slug) ?>">
                            <?php echo $subOrder->product_name ?>
                          </a>
                        </h3>
                        <p class="order-qty m-0 mt-1">SKU:  <?php echo $subOrder->sku_code ?>
                        </p>                        
                        <p class="order-qty m-0 mt-1">
                          QTY <?php echo $subOrder->quantity ?> * <i class="fa fa-inr"></i> <?php echo check_num($subOrder->price*$subOrder->quantity) ?>
                        </p>
                        <!-- <p class="order-price m-0 mt-1">
                          <i class="fa fa-inr"></i><?php echo check_num($subOrder->price*$subOrder->quantity) ?>
                        </p> -->
                      </div>
                      <div class="col-lg-4 col-md-6 review">
                        <!-- <p><strong class="text-success"><i class="fa fa-check-circle-o"></i> <?php echo ucwords($order->order_status) ?></strong> on 27 Jan 2021</p> -->

                        <?php 

                          $isExistReview = $this->Master_model->product_review_by_id($subOrder->product_id, $order->user_id);

                          $rating = 0;
                          if (!empty($isExistReview)) {
                            $rating = $isExistReview->rating;
                          }

                        ?>
                        
                        <fieldset class="rating">
                          <input <?php echo $rating == 5? 'checked':'' ?> id="star5" type="radio" name="rating" value="5">
                          <label class="full" for="star5" title="Awesome - 5 stars"></label>
                          <input <?php echo $rating == 4? 'checked':'' ?> id="star4" type="radio" name="rating" value="4">
                          <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                          <input <?php echo $rating == 3? 'checked':'' ?> id="star3" type="radio" name="rating" value="3">
                          <label class="full" for="star3" title="Meh - 3 stars"></label>
                          <input <?php echo $rating == 2? 'checked':'' ?> id="star2" type="radio" name="rating" value="2">
                          <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                          <input <?php echo $rating == 1? 'checked':'' ?> id="star1" type="radio" name="rating" value="1">
                          <label class="full" for="star1" title="Bad - 1 star"></label>
                        </fieldset>
                        <a href="<?php echo base_url('customer/write-review/'.$productId) ?>" class="mt-2"><?php echo !empty($isExistReview)? 'Edit a review':'Write a review'; ?></a>
                      </div>
                      <!-- <div class="col-lg-3 col-md-6">
                        <button class="btn btn-default">Track Order</button><br/>
                        <button class="btn btn-default"><i class="fa fa-file"></i>   Invoice</button>
                        <a href="#" class="btn btn-default">Cancel Order</a>
                      </div> -->
                    </div>
                    <?php endforeach; endif; ?>
                  </div>
                </div>
              </div>
            <?php $i++; endforeach ?>
           </div>
          
          <?php else: ?>
            <h3>There is no orders.</h3>
          <?php endif ?>
          
          
        </div>
          
      
        <div class="tab-pane fade text-style profileAddressPanel" id="step3" style="overflow:auto;">
          <p>Address</p>
          <div class="row m-0">
            <div class="col-md-4 col-sm-6 col-12">
              <div class="card">
                <a class="card-body addPanel text-center cursorPointer" href="<?php echo base_url('customer/add-address') ?>">
                  <div class="addButton">
                    <i class="fa fa-plus"></i><br/>Add Address
                  </div>
                </a>
              </div>
            </div>
            
            <?php 
              if (!empty($address)):
                foreach($address as $addr):
                  $id = hash('SHA256', $addr->id);
            ?>
              <!-- 09052021 Start -->
              <div class="col-md-4 col-sm-6 col-12 addressCard" id="card_<?php echo $id ?>">
                <div class="card">
                  <div class="card-header">
                    <small><?php echo $addr->is_default? 'Default':'Other'; ?></small>
                  </div>
                    <div class="card-body" style="position: relative;top: 50%;margin-top: 25px;">
                      <div class="child">
                        <?php 
                          $name = $addr->shipping_first_name.' '.$addr->shipping_last_name;
                          $email = $addr->shipping_email;
                          $phone = $addr->shipping_phone;
                          $pincode = $addr->shipping_pincode;
                        ?>
                        <?php echo $name ?><br/>
                        <?php echo $email ?><br/>
                        <?php echo $this->db->get_where('states', array('id' => $addr->shipping_state))->row('state'); ?><br/>
                        <?php echo ucwords($addr->shipping_city) ?>-<?php echo $pincode; ?><br/>
                        <?php echo ucwords($addr->shipping_country) ?><br/>
                        Phone number: <?php echo $phone ?><br/>
                      </div>
                    </div>
                   <div class="card-footer">
                    <a href="<?php echo base_url('customer/edit-address/'.$id) ?>" class="cursorPointer mr-3">Edit</a>|<a data-id="<?php echo $id ?>" class="cursorPointer ml-3 removeAddr">Remove</a> <br>
                    <span id="msg<?php echo $id ?>"></span>
                   </div> 
                </div>
              </div>
              <!-- 09052021 End -->
            <?php endforeach; else: ?>
              <div class="col-md-8 col-sm-6 col-12 addressCard">
                <div class="card">
                    <div class="card-body">
                      <h4 class="card-body addPanel text-center cursorPointer">
                        <div class="addButton">
                          <h4>You haven't saved any address</h4>
                        </div>
                      </h4>
                    </div>
                </div>
              </div>
            <?php endif ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>