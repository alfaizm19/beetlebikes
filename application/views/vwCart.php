<div id="overlay" style="display:none;">
  <div class="spinner"></div>
  <br/>
  Loading...
</div>

<main class="page-content">
  <div class="container">
    <div>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>">Home</a></li>
        <li class="active">Shopping Cart
        </li>
      </ol>
    </div>
  </div>

  <div class="container section-bottom-60 offset-top-4" id="main-section">

    <?php if (!empty($cart)): ?>
      <div class="shoping-cart row">
        <div class="col-md-8" id="output">
            <?php 
                  $subtotal = 0;
                  $saved = 0;

                  foreach ($cart as $data):
                    $cartId = hash('SHA256', $data->id);
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
            <div class="cart_item row mb-2 border-1 text-left cart-panel" id="row_<?php echo $cartId ?>">
                <div class="col-md-2 col-12 text-center product-thumbnail">
                     <img src="<?php echo base_url($data->image_path) ?>" class="img-fluid"  alt="">
                </div>
                <div class="col-md-10">
                    <div class="row m-0 mb-2">
                        <div class="col-9">
                            <p>
                        <a class="text-base link-default font-weight-bold" href="<?php echo base_url($data->slug) ?>">
                          <?php echo $data->product_name ?>
                        </a>
                        <br> SKU: <?php echo $data->sku_code ?>
                        <?php if (!$availStock): ?>
                          <br> <span class="text-danger badge mv-pad">OUT OF STOCK</span>
                        <?php endif ?>
                        <span id="msg_<?php echo $cartId ?>"></span>
                      </p>
                        </div>
                        <div class="col-3 product-subtotal">
                      <?php if ($discPrice): ?>
                        <p class="big text-primary font-weight-bold mb-0">₹<?php echo check_num($discPrice*$cartQty) ?></p>  
                        <span class="text-strike text-muted">₹<?php echo check_num($price*$cartQty) ?></span>
                      <?php else: ?>
                        <p class="big text-primary">₹<?php echo check_num($price*$cartQty) ?></p>  
                      <?php endif ?>
                        </div>
                    </div>
                    <div class="row m-0">
                      <div class="col-md-3 col-6 mb-2 product-price">
                      <?php 
                        if($discPrice):
                      ?>
                          <p class="big text-primary mb-0">
                           Price: ₹<?php echo check_num($discPrice) ?>
                             
                          </p>
                         <span class="text-strike text-muted">
                            ₹<?php echo check_num($price) ?>
                          </span>
                      <?php else: ?>
                        <p class="big text-primary">
                          Price:₹<?php echo check_num($price) ?>
                        </p>
                      <?php endif; ?>
                        </div>
                        <div class="col-md-5 col-6 mb-2 product-quantity">
                        <input <?php echo !$availStock? 'disabled':''; ?> class="stepper form-input" data-id="<?php echo $cartId ?>" type="number" data-zeros="true" value="<?php echo $cartQty ?>" min="1" max="<?php echo $availStock; ?>">
                        </div>
                        <div class="col-md-3 col-12 product-remove text-right pt-3">
                        <a onclick="removeCartItem('<?php echo $cartId ?>')" class="icon icon-xs text-primary btn btn-dander btn-xs" href="javascript:void(0)">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
          
        </div>
        <div class="col-md-4">
          <div class="clearfix mt-1">
            <div class="cart_totals pull-sm-right">

              <!-- 10052021 Start -->
              <div class="clearfix">
                <!--<div class="form-inline-flex">
                  <div class="form-wrap offset-bottom-0 grid-offset-30">
                    <input class="form-input" type="text" name="coupon" placeholder="Enter Code">
                  </div>
                  <button class="btn btn-default offset-top-10 offset-xs-top-0" type="submit">Apply coupon</button>
                </div>-->
                <form method="post" id="couponForn">
                  <div class="input-group mb-3">
                    <input minlength="3" maxlength="8" type="text" class="form-input form-control" name="coupon" placeholder="Enter coupon code" aria-label="Enter coupon code" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button type="submit" id="btnCoupon" class="btn btn-default">Apply</button>
                    </div>
                    <div style="width: 165px">
                      <span id="couponMsg" class="pull-left"></span>
                    </div>
                  </div>
                </form>
              </div>
              <!-- 10052021 End -->

              <h4 class="offset-top-30 text-left text-thin">Order Summary</h4>

              <div id="summary">
                <div class="align-items-center d-flex justify-content-between offset-top-20">
                  <p class="text-spacing-40 text-thin offset-bottom-0">Subtotal:</p>
                  <p class="text-regular cart_totals-price">  ₹<?php echo check_num($subtotal) ?></p>
                </div>
                <?php if ($saved): ?>
                <div class="align-items-center d-flex justify-content-between offset-top-20">
                  <p class="text-spacing-40 text-thin offset-bottom-0">You saved:</p>
                  <p class="text-regular cart_totals-price">
                      ₹<?php 
                        echo check_num(abs($subtotal - $saved));
                        //echo check_num($saved)
                      ?>
                  </p>
                </div>
                <?php endif ?>
                <div class="align-items-center d-flex justify-content-between offset-top-20">
                  <p class="text-spacing-40 text-thin offset-bottom-0">Delivery Charges:</p>
                  <p class="text-regular cart_totals-price">₹0</p>
                </div>
                <div class="align-items-center d-flex justify-content-between offset-top-10">
                  <p class="text-spacing-40 text-thin offset-bottom-0">Total:</p>
                  <p class="text-regular cart_totals-price">  ₹<?php echo check_num($subtotal) ?></p>
                </div>
              </div>

              <a class="offset-top-20 btn btn-primary" href="<?php echo base_url('checkout') ?>">Checkout Securely</a>
            </div>
          </div>
        </div>
      </div>
    <?php else: ?>
      <h3>There is no cart data</h3>

      <a href="<?php echo base_url() ?>">
        <button class="offset-top-20 prefix-sm-30 btn btn-primary btn-icon btn-icon-left" type="button"><span class="icon icon fl-line-icon-set-shopping63"></span> Continue Shopping</button>
      </a>
    <?php endif ?>
  </div>
</main>