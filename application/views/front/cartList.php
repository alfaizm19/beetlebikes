<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs-area end -->
<div id="cartPage">
<?php 


/*
<!--cart-page-area start-->

<div class="cart-page-area page-bg page-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                 <?php
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
                                                        <div class="deco qtybutton">-</div>
                                                        <input type="text" value="<?php echo $cart_data_value['cart_qty']; ?>" name="qty[<?php echo $cart_data_value['id']; ?>]" class="cart-plus-minus-box">
                                                        <div class="inco qtybutton">+</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <?php
                                        if($cart_data_value['selling_price']){
                                            echo ' <td class="price-cart">$'.$cart_data_value['selling_price'].'</td>';

                                            echo '<td class="total-cart-price">$'.$cart_data_value['selling_price'] * $cart_data_value['cart_qty'].'</td>';
                                            $subTotal[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                        } else {
                                            echo ' <td class="price-cart">$'.$cart_data_value['mrp'].'</td>';
                                            echo '<td class="total-cart-price">$'.$cart_data_value['selling_price'] * $cart_data_value['cart_qty'].'</td>';
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
                <div class="update-cart-btn">
                    <div class="update-cart-btn-inner">
                        <button type="submit" name="updateCart">Update Cart</button>
                    </div>
                </div>
            </div>
             </form>
            <div class="col-md-5 col-sm-8 col-xs-12">
                <div class="offer-coupon">
                    <div class="offer-titel">
                        <h4 class="offer-titel">offer-coupon</h4>
                        <p>enter your coupon code if you have one</p>
                    </div>
                    <div class="apply-coupon">
                        <input type="text" placeholder="Write Coupon Number here">
                        <button>apply coupon</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="cart_total cart-pdi">
                    <h4>Cart total</h4>
                    <?php 
                         $subTotal = array_sum($subTotal);
                         $total = $subTotal;
                    ?>
                    <div class="cart-inner">
                        <ul>
                            <li>Subtotal <span>$<?php echo $subTotal; ?></span></li>
                           <!--  <li>Shipping cost <span>25.00$</span></li> -->
                        </ul>
                    </div>
                    <p>Total <span>$<?php echo $subTotal; ?></span></p>
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
*/

?>
</div>

<?php

$cartData = cart_data();

$items = '';

if (!empty($cartData)) {

    $items = array(
        'currency' => 'INR',
        'value' => '',
        'items' => array()
    );

    $total = 0;
    
    foreach ($cartData as $cartD) {

        if($cartD['selling_price']){
          $myPrice = $cartD['selling_price']; 
        } else {
          $myPrice = $cartD['mrp']; 
        }

        $total += $cartD['cart_qty'] * $myPrice;

        $items['items'][] = array(
            'item_name' => $cartD['product_name'],
            'item_id' => $cartD['sku_code'],
            'price' => $myPrice,
            'item_brand' => 'Beetle Bikes',
            'item_category' => $this->Master_model->getCategoryById($cartD['category_level_1']),
            'item_category2' => '',
            'item_category2' => '',
            'item_category3' => '',
            'item_category4' => '',
            'item_variant' => '',
            'item_list_name' => '',
            'item_list_name' => '',
            'item_list_id' => '',
            'index' => '',
            'quantity' => $cartD['cart_qty']
        );
    }

    $items['value'] = $total;
}

if (!empty($items)) {
    $items = json_encode($items, JSON_UNESCAPED_SLASHES);
}

?>

<?php if (!empty($items)): ?>
    <script type="text/javascript">
        dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
        dataLayer.push({
          event: "view_cart",
          ecommerce: <?php echo $items; ?>
        });
    </script>
<?php endif ?>
