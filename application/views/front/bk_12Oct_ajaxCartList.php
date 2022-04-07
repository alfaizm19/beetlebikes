  
    <!--cart-page-area start-->
   
    <div class="cart-page-area page-bg page-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                     <?php
                         $couponData = [];   
                         $couponPriceDiscount = [];   
                         if($this->session->userdata('couponData')){
                            $couponData = $this->session->userdata('couponData');
                         }

                            if($this->session->flashdata('remove_cart_product')){
                        ?>
                                <div class="alert alert-success">
                                   <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> 
                                  <strong>Success!</strong> Product has been removed
                                </div>
                        <?php
                                unset($_SESSION['remove_cart_product']);
                            }
                            else if($this->session->flashdata('error_remove_cart_product')){
                                ?>
                                <div class="alert alert-danger">
                                  <strong>Error!</strong> Somthing went wrong try again..
                                </div>
                                <?php
                                 unset($_SESSION['error_remove_cart_product']);
                            } 
                            else if($this->session->flashdata('error_cart_product_data')){
                               
                                foreach ($this->session->flashdata('error_cart_product_data') as $error_cart_product_data_key => $error_cart_product_data_value) {
                                ?>
                                    <div class="alert alert-danger">
                                      <strong>Error!</strong> Product (<?php echo $error_cart_product_data_value['product_name'] ?>) only  <?php echo $error_cart_product_data_value['stock'] ?> quantity available
                                    </div>
                                <?php
                                 }
                                unset($_SESSION['error_cart_product_data']);
                            } 

                        ?>
                   <?php  if($cart_data){  ?>
                    <form action="" method="POST">
                    <div class="table-responsive">
                        
                        <table class="table-content">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>name</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>total price</th>
                                    <th>remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                        $subTotal = [];
                                        foreach ($cart_data as $cart_data_key => $cart_data_value) {
                                ?>
                                   <tr>
                                        <td class="cart-product">
                                            <a href="<?php echo base_url().'product/'.$cart_data_value['slug']; ?>"><img src="<?php echo base_url().$cart_data_value['image_path']; ?>" alt=""></a>
                                        </td>
                                       <td class="cart-name">
                                           <h3><a href="<?php echo base_url().'product/'.$cart_data_value['slug']; ?>"><?php echo $cart_data_value['product_name']; ?></a></h3>
                                           <div class="revew">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <span>(17)</span>
                                            </div>
                                        </td>
                                       <td>
                                            <div class="cart-quantity">
                                                <div class="product-quantity">
                                                    <div class="cart-quantity">
                                                        <div class="cart-plus-minus">
                                                            <div class="deco qtybutton"  data-productid="<?php echo $cart_data_value['id']; ?>">-</div>
                                                            <input type="text" id="updateQty_<?php echo $cart_data_value['id']; ?>" value="<?php echo $cart_data_value['cart_qty']; ?>" name="qty[<?php echo $cart_data_value['id']; ?>]" class="cart-plus-minus-box"  onkeypress="return quantityNumberOnly(event)">
                                                            <div class="inco qtybutton" data-productid="<?php echo $cart_data_value['id']; ?>">+</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <?php
                                            $applyCount = 1;
                                            if($couponData){

                                                if($couponData['sub_category']){
                                                    $sub_category_arr = explode (",", $couponData['sub_category']);
                                                    if (in_array($cart_data_value['category_level_2'], $sub_category_arr))
                                                    {
                                                      $applyCount = 1;
                                                    }
                                                }

                                                if($couponData['inclusion_product']){
                                                    $inclusion_product_arr = explode (",", $couponData['inclusion_product']);
                                                    if (in_array($cart_data_value['id'], $inclusion_product_arr))
                                                    {
                                                      $applyCount = 1;
                                                    }
                                                }

                                                if($couponData['exclusion_sku']){
                                                    $exclusion_sku_arr = explode (",", $couponData['exclusion_sku']);
                                                    if (in_array($cart_data_value['sku_code'], $exclusion_sku_arr))
                                                    {
                                                      $applyCount = 0;
                                                    }
                                                }

                                                if($couponData['exclusion_sub_category']){
                                                    $exclusion_sub_category_arr = explode (",", $couponData['exclusion_sub_category']);
                                                    if (in_array($cart_data_value['category_level_2'], $exclusion_sub_category_arr))
                                                    {
                                                      $applyCount = 0;
                                                    }
                                                }
                                              
                                            }

                                            if($cart_data_value['selling_price']){

                                                if($applyCount == 1)
                                                {
                                                      $couponPriceDiscount[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                                }
                                                
                                                echo ' <td class="price-cart">$'.$cart_data_value['selling_price'].'</td>';

                                                echo '<td class="total-cart-price">$'.$cart_data_value['selling_price'] * $cart_data_value['cart_qty'].'</td>';
                                                $subTotal[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                            } else {

                                                if($applyCount == 1)
                                                {
                                                      $couponPriceDiscount[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                                }

                                                echo ' <td class="price-cart">$'.$cart_data_value['mrp'].'</td>';
                                                echo '<td class="total-cart-price">$'.$cart_data_value['mrp'] * $cart_data_value['cart_qty'].'</td>';
                                                $subTotal[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                            }
                                        ?>
                                       
                                       <td class="cart-remove">
                                            <a href="<?php echo base_url(); ?>product/removeCartListProduct/<?php echo $cart_data_value['id']; ?>"><i class="fa fa-times"></i></a>
                                       </td>
                                   </tr>
                                <?php } ?>   
                               
                            </tbody>
                        </table>
                      
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <!-- <div class="update-cart-btn">
                        <div class="update-cart-btn-inner">
                            <button type="submit" name="updateCart">Update Cart</button>
                        </div>
                    </div> -->
                </div>
                 </form>
                <div class="col-md-5 col-sm-8 col-xs-12">
                    <div class="offer-coupon">
                        
                        <?php 
                           
                        ?>
                         <?php 
                             $subTotal = array_sum($subTotal);
                             $total = $subTotal;
                             $totalDiscount = 0;
                             if($couponData){
                                if($couponPriceDiscount){

                                    $couponPriceTotal = array_sum($couponPriceDiscount);

                                    if($couponData['discount_type'] == 1){
                                       $totalDiscount = round($couponData['discount'] * ($couponPriceTotal / 100),2);
                                    }  else {
                                        $totalDiscount = $couponData['discount'];
                                    }
                                       
                                    if($couponData['max_discount']){
                                        if($totalDiscount > $couponData['max_discount']){
                                         $totalDiscount = $couponData['max_discount'];
                                        }
                                    }   

                                    if($couponData['min_cart_value']){
                                        if($couponData['min_cart_value'] > $total){
                                            $totalDiscount = 0;
                                        }
                                    }
                                  
                                }
                             }
                            if($totalDiscount){
                                if($this->session->flashdata('couponVerify'))
                                { 
                                    echo '<span class="error" style="color:green">'.$this->session->flashdata('couponVerify').'</span><br>'; 
                                    unset($_SESSION['couponVerify']);
                                }
                                $total = $total - $totalDiscount;
                            } else {
                                if($this->session->userdata('couponData')){
                                   echo '<span style="color:red;">Coupon not applicable for these products</span>';
                                }
                                unset($_SESSION['couponData']);
                                unset($_SESSION['couponVerify']);
                            }
                        ?>
                        <form method="post">
                            <div class="offer-titel">
                                <h4 class="offer-titel">offer-coupon</h4>
                                <p>enter your coupon code if you have one</p>
                            </div>
                            <div class="apply-coupon">
                                <input type="text" placeholder="Write Coupon Number here" name="couponCode" id="couponCode">
                                <span class="error" id="couponCodeError" style="color:red"></span>
                                <?php 
                                    if($this->session->flashdata('couponCheckError'))
                                    { 
                                        echo '<span class="error" style="color:red">'.$this->session->flashdata('couponCheckError').'</span><br>'; 
                                        unset($_SESSION['couponCheckError']);
                                    }
                                ?>

                                <button type="button" name="couponBtn" id="couponBtn">apply coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="cart_total cart-pdi">
                        <h4>Cart total</h4>
                       
                        <div class="cart-inner">
                            <ul>
                                <li>Subtotal <span>$<?php echo $subTotal; ?></span></li>
                                <?php 
                                    if($totalDiscount){
                                        $total = $total - $totalDiscount;
                                        echo '<li> Coupon Discount <span>$'.$totalDiscount.'</span></li>';
                                    }
                                ?>
                               
                               <!--  <li>Shipping cost <span>25.00$</span></li> -->
                            </ul>
                        </div>
                        <p>Total <span>$<?php echo $total; ?></span></p>
                        <div class="proceed-out">
                            <a href="<?php echo base_url(); ?>checkout">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } else { echo 'Not Found'; } ?>   
        </div>
    </div>
     
    <!--cart-page-area end-->
  