<div id="overlay" style="display:none;">
  <div class="spinner"></div>
  <br/>
  Loading...
</div>

<main class="page-content">
  <div class="container">
    <div>
      <ol class="breadcrumb">
        <li><a class="icon icon-sm fa-home text-primary" href="<?php echo base_url() ?>"></a></li>
        <li class="active">Cart
        </li>
      </ol>
    </div>
  </div>

  <div class="container section-bottom-60 offset-top-4" id="main-section">

    <?php if (!empty($cart)): ?>
      <div class="shoping-cart row">
        <div class="col-md-8">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th colspan="2">Product</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody id="output">
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
                  <tr class="cart_item" id="row_<?php echo $cartId ?>">
                    <td class="product-remove">
                      <a onclick="removeCartItem('<?php echo $cartId ?>')" class="icon icon-xs text-primary mdi mdi-close" href="javascript:void(0)"></a>
                    </td>
                    <td class="product-thumbnail">
                      <a class="d-inline-block" href="<?php echo base_url($data->slug) ?>"><img src="<?php echo base_url($data->image_path) ?>" width="100" height="100" alt=""></a>
                    </td>
                    <td class="product-name">
                      <p>
                        <a class="text-base link-default" href="<?php echo base_url($data->slug) ?>">
                          <?php echo $data->product_name ?>
                        </a>
                        <br> SKU: <?php echo $data->sku_code ?>
                        <?php if (!$availStock): ?>
                          <br> <span class="text-danger badge mv-pad">OUT OF STOCK</span>
                        <?php endif ?>
                      </p>
                      <span id="msg_<?php echo $cartId ?>"></span>
                    </td>
                    <td class="product-price">
                      <?php 
                        if($discPrice):
                      ?>
                          <p class="big text-primary">
                            ₹<?php echo check_num($discPrice) ?>
                          </p>
                          <span class="product-details-price-small text-strike text-muted">
                            ₹<?php echo check_num($price) ?>
                          </span>
                      <?php else: ?>
                        <p class="big text-primary">
                          ₹<?php echo check_num($price) ?>
                        </p>
                      <?php endif; ?>
                    </td>
                    <td class="product-quantity">
                      <input <?php echo !$availStock? 'disabled':''; ?> class="stepper form-input" data-id="<?php echo $cartId ?>" type="number" data-zeros="true" value="<?php echo $cartQty ?>" min="1" max="<?php echo $availStock; ?>">
                    </td>
                    <td class="product-subtotal">
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
        </div>
        <div class="col-md-4">
          <div class="clearfix mt-1">
            <div class="cart_totals pull-sm-right">

              <div class="clearfix">
                <!--<div class="form-inline-flex">
                  <div class="form-wrap offset-bottom-0 grid-offset-30">
                    <input class="form-input" type="text" name="coupon" placeholder="Enter Code">
                  </div>
                  <button class="btn btn-default offset-top-10 offset-xs-top-0" type="submit">Apply coupon</button>
                </div>-->
                
                <div class="input-group mb-3">
                  <input type="text" class="form-input form-control" name="coupon" placeholder="Enter coupon code" aria-label="Enter coupon code" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-default" type="submit">Apply</button>
                  </div>
                </div>
                
                
              </div>

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
                  <p class="text-regular cart_totals-price">$0</p>
                </div>
                <div class="align-items-center d-flex justify-content-between offset-top-10">
                  <p class="text-spacing-40 text-thin offset-bottom-0">Total Cost:</p>
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