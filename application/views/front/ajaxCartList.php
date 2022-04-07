<!--cart-page-area start-->
<style type="text/css">
    .product-hover {
        opacity: 1;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        -webkit-transform: translateY(0px);
        transform: translateY(0px);
    }
</style>
<?php

//check if cart data have bikes then show bike service

$wishlist_data = wishlist_data();

$cartAccessories = $this->product_model->cartAccessories();
$isDisplayService = false;
$isServiceAlreadyInCart = false;

$getCycleService = $this->db->get_where('product', array('is_active' => 1, 'category_level_1' => 13))->row();

if (!empty($cart_data)) {
    foreach ($cart_data as $cart) {
        if ($cart['category_level_1'] == 1) {
            $isDisplayService = true;
            break;
        }
    }

    if (!empty($getCycleService)) {
        foreach ($cart_data as $cart) {            
            if ($cart['id'] == $getCycleService->id) {
                $isServiceAlreadyInCart = true;
                break;
            }
        }
    }
}

?>

<style type="text/css">
    .add_cart {
        background: #008dc7 none repeat scroll 0 0;
        border-radius: 25px;
        color: #ffffff;
        display: inline-block;
        font-weight: 600;
        margin-left: 5px;
        padding: 8px 28px;
    }

    .cart_add_quantity {
        width: 100%;        
        display: block;
        box-sizing: content-box;
        padding: 8px 10px;
        text-align: center;
    }

    .cart_add_quantity:hover {
        background: #000 none repeat scroll 0 0;
        color: #ffffff;
    }
</style>

<div class="cart-page-area page-bg page-ptb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                 <?php if($this->session->flashdata('remove_cart_product')){ ?>
                            <div class="alert alert-success">
                               <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> 
                              <strong>Success!</strong> Product has been removed
                            </div>
                    <?php 
                    unset($_SESSION['remove_cart_product']); }
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
                    
                    <table class="table-content cart-summary">
                        
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

                                        if($cart_data_value['selling_price']){

                                            if($applyCount == 1)
                                            {
                                                  $couponPriceDiscount[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                            }
                                            
                                            echo ' <td class="price-cart"><i class="fa fa-inr"></i>'.$cart_data_value['selling_price'].'</td>';

                                            echo '<td class="total-cart-price"><i class="fa fa-inr"></i>'.$cart_data_value['selling_price'] * $cart_data_value['cart_qty'].'</td>';
                                            $subTotal[] = $cart_data_value['selling_price'] * $cart_data_value['cart_qty'];
                                        } else {

                                            if($applyCount == 1)
                                            {
                                                  $couponPriceDiscount[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                            }

                                            echo ' <td class="price-cart"><i class="fa fa-inr"></i>'.$cart_data_value['mrp'].'</td>';
                                            echo '<td class="total-cart-price"><i class="fa fa-inr"></i>'.$cart_data_value['mrp'] * $cart_data_value['cart_qty'].'</td>';
                                            $subTotal[] = $cart_data_value['mrp'] * $cart_data_value['cart_qty'];
                                        }
                                    ?>
                                   
                                   <td class="cart-remove">
                                        <a href="<?php echo base_url(); ?>product/removeCartListProduct/<?php echo $cart_data_value['id']; ?>"><i class="fa fa-times"></i></a>
                                   </td>
                               </tr>
                            <?php } ?>


                            <?php if (!$isServiceAlreadyInCart && $isDisplayService && !empty($getCycleService)):?>
                            <tr>
                                <td class="cart-product">
                                    <a href="<?php echo base_url('product/'.$getCycleService->slug); ?>"><img style="width: 226px; height: 155px;" src="<?php echo base_url($getCycleService->image_path) ?>" alt=""></a>
                                </td>
                               <td class="cart-name">
                                   <h3><a href="<?php echo base_url('product/'.$getCycleService->slug); ?>"><?php echo $getCycleService->product_name ?></a></h3>
                                </td>
                               
                                <?php
                                    $applyCount = 1;

                                    if($getCycleService->selling_price){
                                        
                                        echo ' <td class="price-cart"><i class="fa fa-inr"></i>'.$getCycleService->selling_price.'</td>';
                                    } else {

                                        echo ' <td class="price-cart"><i class="fa fa-inr"></i>'.$getCycleService->mrp.'</td>';
                                    }
                                ?>
                               
                               <td class="cart-remove">
                                    <a href="javascript:void(0)" class="add_cart cart_add_quantity cart_product_<?php echo $getCycleService->id; ?>" style="" data-productid="<?php echo $getCycleService->id; ?>">Add to cart</a>
                               </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if(!empty($cartAccessories)): ?>
                    <h5><strong>Recommended Accessories</strong></h5>

                    <div class="row">
                        <?php 
                        foreach ($cartAccessories as $cartAccessoriesKey => $cartAccessoriesValue):
                            $cart_product_remove = 'display : none;'; 
                            $cart_product_add = '';
                            $wishlist_product_remove = 'display : none;'; 
                            $wishlist_product_add = '';
                            
                            if($cart_data) {
                                if (array_key_exists($cartAccessoriesValue['id'],$cart_data))
                                {
                                  $cart_product_remove = ''; 
                                  $cart_product_add = 'display : none;';
                                }
                            }  
                            if($wishlist_data) {
                                if (array_key_exists($cartAccessoriesValue['id'], $wishlist_data))
                                {
                                  $wishlist_product_remove = ''; 
                                  $wishlist_product_add = 'display : none;';
                                }
                            }
                        ?>

                        <div class="col-md-4">
                            <div class="single-product text-center">
                                <div class="single-product-inner">
                                    <div class="product-img">
                                        
                                        <a href="<?php echo base_url().'product/'.$cartAccessoriesValue['slug']; ?>">
                                        <img src="<?php echo base_url().$cartAccessoriesValue['image_path']; ?>" alt="">
                                    </a>
                                    </div>
                                    <div class="product-details">
                                        <h3>
                                            <a href="<?php echo base_url().'product/'.$cartAccessoriesValue['slug']; ?>">

                                                <?php echo $cartAccessoriesValue['product_name'];?>
                                            </a>
                                        </h3>
                                        <div class="price-box">
                                            <?php 
                                                if($cartAccessoriesValue['selling_price']) {
                                            ?>
                                                <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $cartAccessoriesValue['mrp'];?></span></div>
                                                <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $cartAccessoriesValue['selling_price'];?></span></div>
                                            <?php } else {    ?>
                                                    <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $cartAccessoriesValue['mrp'];?></span></div>
                                            <?php } ?>    
                                        </div>
                                    </div>
                                    <div class="product-hover">
                                        <ul>
                                            <li>
                                                <a style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle-cart-page cart_product_<?php echo $cartAccessoriesValue['id']; ?>" data-productid="<?php echo $cartAccessoriesValue['id']; ?>" >Add to cart</a>
                                            </li>
                                            <!-- <li>
                                                <a style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart remove_cart_<?php echo $cartAccessoriesValue['id']; ?>" >Go To Cart</a>
                                            </li> -->

                                            <li>
                                                <a  style="<?php echo $wishlist_product_add; ?>" title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $cartAccessoriesValue['id']; ?>"  data-productid="<?php echo $cartAccessoriesValue['id']; ?>"><i class="fa fa-heart"></i></a>
                                            </li>

                                             <li>
                                                <a style="color: #ea3b02; <?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $cartAccessoriesValue['id']; ?>"  data-productid="<?php echo $cartAccessoriesValue['id']; ?>"><i class="fa fa-heart"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

            </div>
            
            <div class="col-md-4">
                <div class="cart_total cart-pdi">
                    <div style="margin-bottom:2rem">
                        <div class="offer-titel">
                            <p>Enter your coupon code here.</p>
                        </div>
                        <div class="apply-coupon">
                            <input type="text" placeholder="Coupon Code" name="couponCode" id="couponCode">
                           
                            
                            <button type="button" name="couponBtn" id="couponBtn">apply</button>
                            <p class="error" id="couponCodeError" style="color:red"></p>
                        </div>
                    </div>
                    <br>
                     <h4>Cart total</h4>
                   
                    <div class="cart-inner">
                        <?php 
                         $subTotal = array_sum($subTotal);
                         $total = $subTotal;
                         $totalDiscount = 0;
                        ?>
                        <ul class="my-cart-subtotal">
                            <li>Subtotal <span><i class="fa fa-inr"></i><?php echo $subTotal; ?></span></li>
                            <?php 
                                if($totalDiscount){
                                    echo '<li> Coupon Discount <span><i class="fa fa-inr"></i>'.$totalDiscount.'</span></li>';
                                }
                            ?>
                        </ul>
                    </div>
                        
                    <p class="my-cart-total">Total <span><i class="fa fa-inr"></i><?php echo $total; ?></span></p>

                    <div class="proceed-out">
                        <a href="<?php echo base_url(); ?>checkout">Proceed to Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { echo 'Not Found'; } ?>   
    </div>
</div>
