<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function cart_data() {

        $tempCartID = $this->input->cookie('mmtcTempCartID',true);

        if(!$tempCartID) {
          $cookie = array('name' => 'mmtcTempCartID', 'value' => uniqid(), 'expire' => '360000');
          $this->input->set_cookie($cookie);
        }

        $userSess = $this->session->userdata('user_sess');

        if (!empty($userSess)) {

            $userId = $userSess['userId'];

            $this->db->where('user_id', $userId);

        } else {
            $tempCartID = $this->input->cookie('mmtcTempCartID',true);
            $this->db->where('temp_cart_id', $tempCartID);
        }

        $this->db->where('b.is_active', 1);
        $result = $this->db
        			->select('a.*, b.product_name, b.slug, b.sku_code, b.net_weight, b.stock, b.mrp, b.selling_price, b.image_path')
        			->join('product as b', 'a.product_id = b.id')
        			->get('cart as a');

        if ($result->num_rows()) {

            return $result->result_object();

        } else {
            return false;
        }
    }

    public function create_output() {
    	$cartData = $this->cart_data();

        $output = '
            <h3>There is no cart data</h3>
            <a href="'.base_url().'">
                <button class="offset-top-20 prefix-sm-30 btn btn-primary btn-icon btn-icon-left" type="button"><span class="icon icon fl-line-icon-set-shopping63"></span> Continue Shopping</button>
            </a>
        ';
        $summary = '';

    	if (!empty($cartData)) {

            $output = '';

            $subtotal = 0;
            $saved = 0;

    		foreach ($cartData as $data) {
                
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

                $output .= '

                  <div class="cart_item row mb-2 border-1 text-left cart-panel" id="row_'.$cartId.'">
                      <div class="col-md-2 col-12 text-center product-thumbnail">
                           <img src="'.base_url($data->image_path).'" class="img-fluid"  alt="">
                      </div>
                      <div class="col-md-10">
                          <div class="row m-0 mb-2">
                              <div class="col-9">
                                <p>
                                  <a class="text-base link-default font-weight-bold" href="'.base_url($data->slug).'">
                                    '.$data->product_name.'
                                  </a>
                                  <br> SKU: '.$data->sku_code;

                                  if (!$availStock):
                                    $output .= '<br> <span class="text-danger badge mv-pad">OUT OF STOCK</span>';
                                  endif;

                                  $output .= '<span id="msg_'.$cartId.'"></span>
                                </p>
                              </div>
                              <div class="col-3 product-subtotal">';

                            if ($discPrice):
                              $output .= '<p class="big text-primary font-weight-bold mb-0">₹'.check_num($discPrice*$cartQty).'</p>  
                              <span class="text-strike text-muted">₹'.check_num($price*$cartQty).'</span>';
                            else:
                              $output .= '<p class="big text-primary">₹'.check_num($price*$cartQty) .'</p>';
                            endif;

                            $output .= '</div>
                          </div>
                          <div class="row m-0">
                            <div class="col-md-3 col-6 mb-2 product-price">';
                            if($discPrice):
                                $output .= '<p class="big text-primary mb-0">
                                 Price: ₹'.check_num($discPrice).'
                                </p>
                               <span class="text-strike text-muted">
                                  ₹'.check_num($price).'
                                </span>';
                            else:
                              $output .= '<p class="big text-primary">
                                Price:₹'.check_num($price).'
                              </p>';
                            endif;

                            $output .= '</div>
                              <div class="col-md-5 col-6 mb-2 product-quantity">
                              <input '.(!$availStock? 'disabled':'').' class="stepper form-input" data-id="'.$cartId.'" type="number" data-zeros="true" value="'.$cartQty.'" min="1" max="'.$availStock.'">
                              </div>
                              <div class="col-md-3 col-12 product-remove text-right pt-3">
                              <a onclick="removeCartItem('."'".$cartId."'".')" class="icon icon-xs text-primary btn btn-dander btn-xs" href="javascript:void(0)">Remove</a>
                              </div>
                          </div>
                      </div>
                  </div>
                ';
            }

            $summary .= '
                <div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">Subtotal:</p>
                <p class="text-regular cart_totals-price">  ₹'.check_num($subtotal).'</p>
              </div>';
              if ($saved):
              $summary .= '<div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">You saved:</p>
                <p class="text-regular cart_totals-price">
                    ₹'.check_num(abs($subtotal - $saved)).'
                </p>
              </div>';
              endif;

              $summary .= '<div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">Delivery Charges:</p>
                <p class="text-regular cart_totals-price">₹0</p>
              </div>
              <div class="align-items-center d-flex justify-content-between offset-top-10">
                <p class="text-spacing-40 text-thin offset-bottom-0">Total Cost:</p>
                <p class="text-regular cart_totals-price">  ₹'.check_num($subtotal).'</p>
              </div>
              <script>
                var $document = $(document),
                plugins = {stepper: $(".stepper")};

                $document.ready(function () {
                    if (plugins.stepper.length) {
                        plugins.stepper.stepper({
                            labels: {
                                up: "",
                                down: ""
                            }
                        });
                    }
                });
            </script>
            ';
    	}

    	return array(
            'output' => $output,
            'summary' => $summary
        );

    }

    public function create_output_22052021() {
      $cartData = $this->cart_data();

        $output = '
            <h3>There is no cart data</h3>
            <a href="'.base_url().'">
                <button class="offset-top-20 prefix-sm-30 btn btn-primary btn-icon btn-icon-left" type="button"><span class="icon icon fl-line-icon-set-shopping63"></span> Continue Shopping</button>
            </a>
        ';
        $summary = '';

      if (!empty($cartData)) {

            $output = '';

            $subtotal = 0;
            $saved = 0;

        foreach ($cartData as $data) {
                
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

                $output .= '<tr class="cart_item" id="row_'.$cartId.'">
                    <td class="product-remove">
                      <a onclick="removeCartItem('."'".$cartId."'".')" class="icon icon-xs text-primary mdi mdi-close" href="javascript:void(0)"></a>
                    </td>
                    <td class="product-thumbnail">
                      <a class="d-inline-block" href="'.base_url($data->slug).'"><img src="'.base_url($data->image_path).'" width="100" height="100" alt=""></a>
                    </td>
                    <td class="product-name">
                      <p>
                        <a class="text-base link-default" href="'.base_url($data->slug).'">
                          '.$data->product_name.'
                        </a>
                        <br> SKU: '.$data->sku_code;

                        if (!$availStock):
                          $output .= '<br> <span class="text-danger badge mv-pad">OUT OF STOCK</span>';
                        endif;
                      $output .= '</p>
                      <span id="msg_'.$cartId .'"></span>
                    </td>
                    <td class="product-price">';
                        if($discPrice):
                          $output .= '<p class="big text-primary">
                            ₹'.check_num($discPrice).'
                          </p>
                          <span class="product-details-price-small text-strike text-muted">
                            ₹'.check_num($price).'
                          </span>';
                      else:
                        $output .= '<p class="big text-primary">
                          ₹'.check_num($price).'
                        </p>';
                      endif;
                    $output .= '</td>
                    <td class="product-quantity">
                      <input '.(!$availStock? "disabled":"").' class="stepper form-input" type="number" data-id="'.$cartId.'" data-zeros="true" value="'.$cartQty.'" min="1" max="'.$availStock.'">
                    </td>
                    <td class="product-subtotal">';
                      if ($discPrice):
                        $output .= '<p class="big text-primary">₹'.check_num($discPrice*$cartQty).'</p>  
                        <span class="product-details-price-small text-strike text-muted">₹'.check_num($price*$cartQty).'</span>';
                      else:
                        $output .= '<p class="big text-primary">₹'.check_num($price*$cartQty).'</p>';  
                      endif;
                    $output .= '</td>
                  </tr>
                  <script>
                    var $document = $(document),
                    plugins = {stepper: $(".stepper")};

                    $document.ready(function () {
                        if (plugins.stepper.length) {
                            plugins.stepper.stepper({
                                labels: {
                                    up: "",
                                    down: ""
                                }
                            });
                        }
                    });
                  </script>
                ';
            }

            $summary .= '
                <div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">Subtotal:</p>
                <p class="text-regular cart_totals-price">  ₹'.check_num($subtotal).'</p>
              </div>';
              if ($saved):
              $summary .= '<div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">You saved:</p>
                <p class="text-regular cart_totals-price">
                    ₹'.check_num(abs($subtotal - $saved)).'
                </p>
              </div>';
              endif;

              $summary .= '<div class="align-items-center d-flex justify-content-between offset-top-20">
                <p class="text-spacing-40 text-thin offset-bottom-0">Delivery Charges:</p>
                <p class="text-regular cart_totals-price">₹0</p>
              </div>
              <div class="align-items-center d-flex justify-content-between offset-top-10">
                <p class="text-spacing-40 text-thin offset-bottom-0">Total Cost:</p>
                <p class="text-regular cart_totals-price">  ₹'.check_num($subtotal).'</p>
              </div>';
      }

      return array(
            'output' => $output,
            'summary' => $summary
        );

    }

}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */