<section class="section loginRegPanel section-60">
  <div class="container text-left">
    <div class="row">
      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6 mx-auto mb-4">
            <div class="separator text-dark rm-pad">Login to MMTC-PAMP</div>
          </div>

          <!-- 09052021 Start -->

          <!-- <div class="col-12">
            <div class="row">
              <div class="col-md-6 mx-auto mb-4 text-center">
                <button class="btn btn-default btn-block facebookBtn"><i class="fa fa-facebook-square"></i> Facebook</button>
              </div>
            </div>
          </div>
          <div style="clear:both;"></div>
          <div class="col-12">
            <div class="row">
              <div class="col-md-6 mx-auto mb-2 text-center">
                <button class="btn btn-default btn-block googleBtn"><i class="fa fa-google"></i> Google</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 mx-auto">
            <div class="separator">OR</div>
          </div> -->

          <!-- 09052021 End-->

        </div>
        
        <form method="post" id="loginForm">
          <div class="row mt-3">
            <div class="col-md-6 mx-auto">
              <div class="row">
                <div class="col-lg-12 mb-3">
                  <div class="form-wrap">
                    <label class="text-light font-italic form-label-outside" for="email-address">Email Address<span class="text-primary">*</span></label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="email" type="text" name="email"><span id="emailErr" class="form-validation"></span>
                  </div>
                </div>

                <div class="col-lg-12 offset-top-10 offset-md-top-0">
                  <div class="form-wrap">
                    <label class="text-light font-italic form-label-outside" for="password">Password<span class="text-primary">*</span></label>
                    <input class="form-input form-control-has-validation form-control-last-child" id="password" type="password" name="password"><span id="passwordErr" class="form-validation"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-6 mx-auto">
              <div class="row mt-3">
                <div class="col-12 text-center">

                  <div id="finalLoginMsg"></div>

                  <input type="hidden" name="action" value="<?php echo $this->input->get('action') ?>">

                  <button type="submit" id="btnLogin" class="btn btn-login btn-block px-3">Login to continue</button>
                </div>
                <div class="col-4 my-3 forgotPass">
                  <a href="<?php echo base_url('forgot-password') ?>">Forgot password?</a>
                </div>
                <div class="col-8 text-right my-3 forgotPass">
                <?php 
                  $action = $this->input->get('action');

                  if ($action == 'checkout') {
                    $redirect = base_url('register?action=checkout');
                  } else {
                    $redirect = base_url('register');
                  }
                ?>

                  New to MMTC-PAMP? <a href="<?php echo $redirect; ?>">Create an account</a>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
      <div class="col-md-4 checkoutCart">
       <div class="row">
        <?php if (!empty($cartData)): ?>
          <div class="col-12">
            <h4>Order Summary</h4>
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
                      <span class="product-details-price-small text-strike text-muted">₹<?php echo check_num($price*$cartQty) ?></span>
                    <?php else: ?>
                      <p class="big text-primary">₹<?php echo check_num($price*$cartQty) ?></p>  
                    <?php endif ?>
                  </td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
          <hr>
          <div class="col-12">
            <table class="table">
              <tbody>
                <tr>
                  <td>Subtotal</td>
                  <td class="text-right"><b>₹<?php echo check_num($subtotal) ?></b></td>
                </tr>
                <?php if ($saved): ?>
                <tr>
                  <td>You Saved</td>
                  <td class="text-right"><b>₹<?php echo check_num(abs($subtotal - $saved)) ?></b></td>
                </tr>
                <?php endif; ?>
                <tr>
                  <td>Shipping</td>
                  <td class="text-right"><b>0</b></td>
                </tr>
                <?php if ($disRec): ?>
                <tr>
                  <td>Discount</td>
                  <td class="text-right"><b>₹<?php echo $disRec ?></b></td>
                </tr>
                <?php endif ?>
            </tbody>
            </table>
            <hr>
            <table class="table">
              <tbody><tr>
                <td><strong>Total</strong></td>
                <td class="text-right"><b>₹<?php echo check_num($subtotal-$disRec) ?></b></td>
              </tr>
            </tbody></table>
          </div>
        <?php else: ?>
          <div class="col-12">
            <h4>Cart data not found.</h4>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</section>