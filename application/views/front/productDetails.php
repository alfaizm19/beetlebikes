<?php
$this->load->helper('common_helper'); 
$cart_data = cart_data();
$wishlist_data = wishlist_data();
?>
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
<div class="container">
<div class="row">
<div class="col-md-12">
<ul>
<li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
<li><a href="<?php echo base_url();?>/product">Product</a> <span><i class="fa fa-angle-right"></i></span></li>
<li><?php echo $productDetails['product_name']; ?></li>
</ul>
</div>
</div>
</div>
</div>
<!--breadcrumbs-area end -->
<!--single-product-area start-->
<div class="single-product-area page-bg page-ptb">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
<!--sigle-product-area-->
<div class="sigle-product-area">
<div class="row">
<div class="col-md-7 col-sm-6 col-xs-12">
<?php if($productDetails['gallery']) { ?>
   <div class="single-product-tab">
    <div class="zoomWrapper">
        <div id="img-1" class="zoomWrapper single-zoom">
            <a href="#">
                <img id="zoom1" src="<?php echo base_url().$productDetails['gallery'][0]['image_path'];?>" data-zoom-image="<?php echo base_url().$productDetails['gallery'][0]['image_path'];?>" alt="big-1">
            </a>
        </div>
        <div class="single-zoom-thumb">
            <ul class="s-tab-zoom" id="gallery_01">
                <?php 
                $gallaryStatus = 'active';
                foreach ($productDetails['gallery'] as $gallery_key => $gallery_value) {                
                    ?>
                    <li>
                        <a href="#" class="elevatezoom-gallery <?php echo $gallaryStatus; ?>" data-update="" data-image="<?php echo base_url().$gallery_value['image_path'];?>" data-zoom-image="<?php echo base_url().$gallery_value['image_path'];?>">
                            <img src="<?php echo base_url().$gallery_value['image_path'];?>" alt="zo-th-1" width="90px">
                        </a>
                    </li>
                    <?php  $gallaryStatus = ''; } ?>
                </ul>
            </div>
        </div>
    </div> 
<?php } ?>
</div>
<div class="col-md-5 col-sm-6 col-xs-12">
<div class="single-product-detels">
    <h4 class="single-product-title"><?php echo $productDetails['product_name']; ?></h4>
    <div class="single-price-box">
       <div class="price-box">
        <?php 
        if($productDetails['selling_price']) {
            ?>
            <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $productDetails['mrp'];?></span></div>
            <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $productDetails['selling_price'];?></span></div>
        <?php } else {    ?>
            <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $productDetails['mrp'];?></span></div>
        <?php } ?>    
    </div>
               <!--  <div class="tutole-price">
                    <span><i class="fa fa-inr"></i><?php echo $productDetails['mrp']; ?></span>
                </div> -->
                <?php 
                    if($productDetails['count_total_rating']) {
                        echo '<div class="revew">';
                        for ($i=0; $i < $productDetails['count_total_rating']; $i++) { 
                           echo '<a href="javascript:void(0)"><i class="fa fa-star"></i></a>';
                        }
                        if($productDetails['count_total_rating'] != 5){
                            for ($j=$i; $j < 5; $j++) { 
                                echo '<a href="javascript:void(0)"><i class="fa fa-star-o"></i></a>';
                            }
                        }
                        
                        echo '</div>';
                    } 
                ?>
                
                    
                   <!--  <a href="#"><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star"></i></a>
                    <a href="#"><i class="fa fa-star-o"></i></a> -->
                </div>
            
        </div>
        <div class="desp">
         <?php echo $productDetails['description']; ?>
     </div>
     <?php

     $cart_product_remove = 'display : none;'; 
     $cart_product_add = '';
     $cart_product_qty = 1;

     $wishlist_product_remove = 'display : none;'; 
     $wishlist_product_add = '';

     if($cart_data) {
        if (array_key_exists($productDetails['id'],$cart_data))
        {
          $cart_product_remove = ''; 
          $cart_product_add = 'display : none;';
          $cart_product_qty = $cart_data[$productDetails['id']]['cart_qty'];
      }
  }

  if($wishlist_data) {
    if (array_key_exists($productDetails['id'], $wishlist_data))
    {
      $wishlist_product_remove = ''; 
      $wishlist_product_add = 'display : none;';
  }
}

?>



<!-- <form action="#"> -->
<?php if($productDetails['stock'] >= 1) { ?>
    <div class="quantity">
        <span>QTY <input class="productDetailsChangeQty" data-productid="<?php echo $productDetails['id']; ?>" type="number" value="<?php echo $cart_product_qty; ?>" id="qty_<?php echo $productDetails['id']; ?>" min="1"  onkeypress="return quantityNumberOnly(event)"></span>

        <span class="single-product-btn">
            <a href="javascript:void(0)" class="add_cart cart_add_quantity cart_product_<?php echo $productDetails['id']; ?>" style="<?php echo $cart_product_add; ?>"  data-productid="<?php echo $productDetails['id']; ?>">Add to cart</a>

            <a href="javascript:void(0)" class="buy_now cart_buy_now_quantity cart_product_<?php echo $productDetails['id']; ?>" style="<?php echo $cart_product_add; ?>"  data-productid="<?php echo $productDetails['id']; ?>">Buy Now</a>
            <?php 
                        /*
                        <a href="javascript:void(0)" style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="add_cart remove_cart_product remove_cart_<?php echo $productDetails['id']; ?>"  data-productid="<?php echo $productDetails['id']; ?>">Remove cart</a>
                        */ 

                        ?>
                        <a style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart  remove_cart_<?php echo $productDetails['id']; ?>" >Go To Cart</a>
                    </span>
                </div>
            <?php } ?>

            <div style="margin-bottom: 2pc; <?php echo $wishlist_product_add; ?>" class="wishlist_add_<?php echo $productDetails['id']; ?>">
            <span class="wish-button  wishlist_add" data-productid="<?php echo $productDetails['id']; ?>">
                <button><i class="fa fa-heart"></i></button> 
                Add to Wishlist
            </span>
            </div>

            <div style="margin-bottom: 2pc; <?php echo $wishlist_product_remove; ?>" class="wishlist_remove_<?php echo $productDetails['id']; ?>">
            <span  style="color: #ea3b02; " class="wish-button wishlist_remove" data-productid="<?php echo $productDetails['id']; ?>">
                <button><i class="fa fa-heart"  style="color: #ea3b02; "></i></button> 
                Remove Wishlist
            </span>
            </div>
            <!--  </form> -->

            <div class="pin-check">
                <form action="">
                    <input type="text" placeholder="Enter Pincode" id="pincode" required>
                    <span class="pincodeError error" style="color:red"></span>
                    <span class="pincodeSuccess" style="color:green;"></span>
                    <button type="button" id="checkPincodeBtn">Check</button>
                </form>
            </div>
        </div>
    </div>
<div class="row product-data">
<div class="col-12">
<div class="product-det-tab">
<!-- Nav tabs stat-->
<ul class="nav nav-tabs" role="tablist">

<li role="presentation"  class="active"><a href="#Specifications" aria-controls="Specifications" role="tab" data-toggle="tab">Description</a></li>

<li role="presentation"  class=""><a href="#Description" aria-controls="Description" role="tab" data-toggle="tab">Specifications</a></li>

<li role="presentation"><a href="#Review" aria-controls="Review" role="tab" data-toggle="tab">Reviews</a></li>

</ul>
<!-- Nav tabs end-->
<!-- Tab panes start -->
<div class="tab-content">

<div role="tabpanel" class="cont-pd tab-pane active" id="Specifications">

    <h3>Cycle Description</h3>
    <div>
        <table class="specs">
            <?php echo $productDetails['specifications']; ?>
        </table>
    </div>


</div>

<div role="tabpanel" class="cont-pd tab-pane" id="Description">

    <h3>Cycle Specification</h3>
    <div style="display: flex">
    <table class="specs">
    <tbody>
    <?php if($productDetails['sku_code']) { ?>
    <tr>
        <td><strong>SKU Code</strong></td>
        <td><?php echo $productDetails['sku_code']; ?> </td>
    </tr>
    <?php } ?>
    <?php if($productDetails['hsn_code']) { ?>
    <tr>
        <td><strong>HSN Code</strong></td>
        <td><?php echo $productDetails['hsn_code']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['wheel_size']) { ?>
    <tr>
        <td><strong>Wheel Size</strong></td>
        <td><?php echo $productDetails['wheel_size']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['frame_size']) { ?>
    <tr>
        <td><strong>Frame Size</strong></td>
        <td><?php echo $productDetails['frame_size']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['frame_material']) { ?>
    <tr>
        <td><strong>Frame Material</strong></td>
        <td><?php echo $productDetails['frame_material']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['dimension']) { ?>
    <tr>
        <td><strong>Recommended Age</strong></td>
        <td><?php echo $productDetails['dimension']; ?> </td>
    </tr>
    <?php } ?>



    </tbody>
    </table>
    <table class="specs">
    <tbody>

    <?php if($productDetails['net_weight']) { ?>
    <tr>
        <td><strong>Item Weight</strong></td>
        <td><?php echo $productDetails['net_weight']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['tyre_type']) { ?>
    <tr>
        <td><strong>Tyre Type</strong></td>
        <td><?php echo $productDetails['tyre_type']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['handle_type']) { ?>
    <tr>
        <td><strong>Handle Type</strong></td>
        <td><?php echo $productDetails['handle_type']; ?> </td>
    </tr>
    <?php } ?>

    <?php if($productDetails['break_type']) { ?>
    <tr>
        <td><strong>Brake Type</strong></td>
        <td><?php echo $productDetails['break_type']; ?> </td>
    </tr>
    <?php } ?>

    <?php 
    if($productDetails['productAttribute']) {

    foreach ($productDetails['productAttribute'] as $productAttributeKey => $productAttributeValue) {
    $newAttributeValue = []; 
    ?>        
    <tr>
        <td><strong><?php echo $productAttributeKey; ?></strong></td>

        <?php 
        echo '<td>'; 
        foreach ($productAttributeValue as $productAttributeValueKey => $productAttributeValueValue) {
            $newAttributeValue[] = $productAttributeValueValue['att_value'];
        } 
        $newAttributeValueList = implode(', ', $newAttributeValue );
        echo $newAttributeValueList; 
        echo '</td>';
        ?>
    </tr>
    <?php           
    }
    ?>
    <?php } ?>
    </tbody>
    </table>
    </div>


</div>

    <div role="tabpanel" class="cont-pd tab-pane" id="Review">
        

        <div class="row">
            <?php 

            if($productDetails['productRating']) { 
                foreach ($productDetails['productRating'] as $productRatingKey => $productRatingValue) {
            ?>
                <div class="col-xs-3 col-lg-1">
                    <div class="review-icon">
                     <img src="https://cdn.iconscout.com/icon/free/png-256/laptop-user-1-1179329.png">
                    </div>
                </div>
                <div class="col-lg-11">
                    <div class="review-text">
                        <strong><?php echo $productRatingValue['customer_name']; ?></strong>
                        <br>
                          <small><?php echo date('d-M-Y', strtotime($productRatingValue['created_at'])); ?></small>
                            
                          <div class="inset-left-10 pl-0">
                           <div class="revew">
                              <?php
                                 for ($i=0; $i < $productRatingValue['rating']; $i++) { 
                                   echo '<a href="javascript:void(0)"><i class="fa fa-star"></i></a>';
                                }
                                if($productRatingValue['rating'] != 5){
                                    for ($j=$i; $j < 5; $j++) { 
                                        echo '<a href="javascript:void(0)"><i class="fa fa-star-o"></i></a>';
                                    }
                                }
                        
                              ?>  
                            <!--   <input id="star5" type="radio" name="rating[]" value="5" <?php echo isset($productRatingValue['rating']) ? $productRatingValue['rating'] == 5 ? "checked" : '' : '' ?>>
                              <label class="full" for="star5" title="Awesome - 5 stars"></label>
                              <input id="star4" type="radio" name="rating[]" value="4" <?php echo isset($productRatingValue['rating']) ? $productRatingValue['rating'] == 4 ? "checked" : '' : '' ?>>
                              <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                              <input id="star3" type="radio" name="rating[]" value="3" <?php echo isset($productRatingValue['rating']) ? $productRatingValue['rating'] == 3 ? "checked" : '' : '' ?>>
                              <label class="full" for="star3" title="Meh - 3 stars"></label>
                              <input id="star2" type="radio" name="rating"[] value="2" <?php echo isset($productRatingValue['rating']) ? $productRatingValue['rating'] == 2 ? "checked" : '' : '' ?>>
                              <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                              <input id="star1" type="radio" name="rating[]" value="1" <?php echo isset($productRatingValue['rating']) ? $productRatingValue['rating'] == 1 ? "checked" : '' : '' ?>>
                              <label class="full" for="star1" title="Bad - 1 star"></label> -->
                            </div>
                         </div>
                        <br> <br>
                        <p><?php echo $productRatingValue['title']; ?></p>
                        <p><?php echo $productRatingValue['review']; ?></p>
                    </div>
                </div>
                <?php } ?>
            <?php } ?>

            <?php if($getProductForReview) { ?>
                <div class="col-md-12">
                    <div class="all-product text-center">
                        <?php if($getReview) { ?>
                            <a href="<?php echo base_url().'review/create/'.$productDetails['slug'];?>">Edit Review</a>
                        <?php } else { ?> 
                             <a href="<?php echo base_url().'review/create/'.$productDetails['slug'];?>">Give Review</a>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>

                
        
    </div>

</div>
<!-- Tab panes end -->
</div>
</div>
</div>

<?php

$productShowcase = $this->Master_model->getProductShowcase($productDetails['id']);

if (!empty($productShowcase)):

?>

<div class="row">
    <style type="text/css">
        .beetle-fourthcol {
            width: 220px;
            float: left;
        }

        .beetle-fourthcol p {
            padding: 0;
            margin: 0 0 14px 0;
        }

        .beetle-fourthcol img {
            display: block;
            margin: 0 auto;
        }

        .beetle-spacing img {
            border: none;
        }

        .a-spacing-mini, .aplus-v2 .aplus-standard .a-ws .a-ws-spacing-mini {
            margin-bottom: 6px!important;
        }

        .a-size-small {
            font-size: 12px!important;
            line-height: 16px!important;
        }
    </style>

    
    <div class="row">
        <div class="col-md-12">
            <h4 class="related-title">Designs that Stand out from the Crowd!</h4>
        </div>
    </div>

    <?php foreach ($productShowcase as $showcase): ?>
    <div class="col-md-3">
        <div class="beetle-fourthcol">
            <p>
                <img alt="<?php echo $showcase->image_alt; ?>" class="" data-src="<?php echo base_url($showcase->image_path) ?>" src="<?php echo base_url($showcase->image_path) ?>"><noscript><img alt="<?php echo $showcase->image_alt; ?>" src="<?php echo base_url($showcase->image_path) ?>"/></noscript>
            </p>
        </div>
        <div class="beetle-fourthcol">
            <h4 class="a-spacing-mini"> <?php echo $showcase->title; ?> </h4>                                  
            <p class="a-size-small"> <?php echo $showcase->description; ?> </p>    
        </div>
    </div>
    <?php endforeach ?>
    
</div>

<?php endif; ?>


<div class="related-product-area">
<div class="row">
<div class="col-md-12">
<h4 class="related-title">RELATED PRODUCTS</h4>
</div>
</div>
<div class="row">
<div class="single-product-page-list">

<?php 
if($productDetails['related_products']) { 
  foreach ($productDetails['related_products'] as $related_products_key => $related_products_value) {
    ?>
    <div class="col-md-12">
        <div class="single-product text-center">
            <!-- <span class="price">off <br>30%</span> -->
            <div class="single-product-inner">
                <div class="product-img">
                    <a href="<?php echo base_url().'product/'.$related_products_value['slug']; ?>"><img src="<?php echo base_url().$related_products_value['image_path']; ?>" alt=""></a>
                </div>
                <div class="product-details">
                    <h3><a href="<?php echo base_url().'product/'.$related_products_value['slug']; ?>"><?php echo $related_products_value['product_name']; ?></a></h3>
                   <!--  <div class="revew">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                    </div> -->
                    <div class="price-box">
                        <?php 
                        if($related_products_value['selling_price']) {
                            ?>
                            <div class="old-price"><span><i class="fa fa-inr"></i><?php echo $related_products_value['selling_price'];?></span></div>
                            <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $related_products_value['mrp'];?></span></div>
                        <?php } else {    ?>
                            <div class="new-price"><span><i class="fa fa-inr"></i><?php echo $related_products_value['mrp'];?></span></div>
                        <?php } ?>    
                    </div>
                </div>
                <div class="product-hover">
                   <ul>
                    <?php

                    $cart_product_remove = 'display : none;'; 
                    $cart_product_add = '';

                    $wishlist_product_remove = 'display : none;'; 
                    $wishlist_product_add = '';

                    if($cart_data) {
                        if (array_key_exists($related_products_value['id'],$cart_data))
                        {
                          $cart_product_remove = ''; 
                          $cart_product_add = 'display : none;';
                      }
                  }

                  if($wishlist_data) {
                    if (array_key_exists($related_products_value['id'], $wishlist_data))
                    {
                      $wishlist_product_remove = ''; 
                      $wishlist_product_add = 'display : none;';
                  }
              }    
              ?>
              <li><a  style="<?php echo $cart_product_add; ?>" href="javascript:void(0)" class="add-to-cart cart_add_signle cart_product_<?php echo $related_products_value['id']; ?>" data-productid="<?php echo $related_products_value['id']; ?>" >Add to cart</a></li>
              <?php 
                                        /*
                                        <li><a  style="<?php echo $cart_product_remove; ?>" href="javascript:void(0)" class="remove_cart_product add-to-cart remove_cart_<?php echo $related_products_value['id']; ?>"  data-productid="<?php echo $related_products_value['id']; ?>" >Remove cart</a></li>
                                        */
                                        ?>
                                        <li><a  style="<?php echo $cart_product_remove; ?>" href="<?php echo base_url(); ?>cart" class="add_cart remove_cart_<?php echo $related_products_value['id']; ?>" >Go To Cart</a></li>

                                        <li><a style="<?php echo $wishlist_product_add; ?>"  title="Add to Wishlist" href="javascript:void(0)" class="wishlist_add add-to-cart wishlist_add_<?php echo $related_products_value['id']; ?>" data-productid="<?php echo $related_products_value['id']; ?>"><i class="fa fa-heart"  ></i></a></li>

                                        <li><a  style="<?php echo $wishlist_product_remove; ?>" title="Remove Wishlist" href="javascript:void(0)" class="wishlist_remove add-to-cart wishlist_remove_<?php echo $related_products_value['id']; ?>"  data-productid="<?php echo $related_products_value['id']; ?>"><i class="fa fa-heart" style="color: #ea3b02; "></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            }   else {
                echo 'Not Found';
            } 
            ?>

        

    </div>
</div>
</div>
</div>
<!--sigle-product-area-->
</div>

</div>
</div>
</div>
<!--single-product-area end-->

<?php
    $items = array(
        'items' => array(
            array(
                'item_name' => $productDetails['product_name'],
                'item_id' => $productDetails['sku_code'],
                'price' => $productDetails['selling_price'],
                'item_brand' => 'Beetle Bikes',
                'item_category' => $this->Master_model->getCategoryById($productDetails['category_level_1']),
                'item_category2' => '',
                'item_category2' => '',
                'item_category3' => '',
                'item_category4' => '',
                'item_variant' => '',
                'item_list_name' => '',
                'item_list_name' => '',
                'item_list_id' => '',
                'index' => '',
                'quantity' => 1
            )
        )
    );

    $items = json_encode($items);
?>

<script type="text/javascript">
    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
      event: "view_item",
      ecommerce: <?php echo $items; ?>
    });
</script>

