 <!-- <div class="portfolioContainer row">
<? foreach ($products as $product_val){
  ?>
      <div class="<?=$product_val['url']?> col-sm-6 col-md-3 mb-4 fables-product-block">
        <div class="card rounded-0 mb-3">
          <div class="row">
              <div class="fables-product-img"><img class="card-img-top rounded-0" src="<?=base_url($product_val['medium_image_path']);?>" alt="<?=$product_val['product_name']?>" id="product_img<?= $product_val['product_id'] ?>">
               <ul class="group-btn1">
                      <li class="link"><a href="<?=base_url()?>product/product-detail/<?=$product_val['product_url'];?>">View</a></li>
                      </ul>
                        <ul class="group-btn">
                      <?php if($product_val['product_count'] != 0){
                      ?>
                      <li class="view"><a href="javascript:;" data-toggle="modal" onclick="openPopup(<?= $product_val['product_id'] ?>)" ></a></li>
                      <? } ?>
                    </ul>
              </div>
            <div class="card-body">
              <h5 class="card-title mx-xl-3"> <a href="<?=base_url()?>product/product-detail/<?=$product_val['product_url'];?>" class="fables-main-text-color fables-store-product-title fables-second-hover-color"><?=$product_val['product_name']?></a> </h5>
              <p class="price my-2 mx-xl-3">AED <?=$product_val['price']?></p>
              <button  zone="" qty=1 date="" price=<? echo $product_val['price']; ?> product-id="<? echo $product_val['product_id']; ?>" onclick="addToCart(this);"  class="submit-button add_cart_product product_<? echo $product_val['product_id']; ?>"> </button></div>
          </div>
        </div>
      </div>
<? } ?>
 </div> -->

 <div class="row">
  <? foreach ($products as $product_val){?>
        <div class="<?=$product_val['url']?> col-md-3 col-sm-12 col-xs-12 thumb d-block ">
          <div class="thumbnail">
            <img src="<?=base_url($product_val['medium_image_path']);?>" class="img-responsive img-fluid" alt="<?=$product_val['product_name']?>" id="product_img<?= $product_val['product_id'] ?>">
            <div class="product-dit bg-color">
            <p><?=$product_val['product_name']?></p>
            <h2>$<?=$product_val['price']?></h2>
            <a class="price_cart submit-button add_cart_product product_<? echo $product_val['product_id']; ?>"href="#" price=<? echo $product_val['price']; ?> product-id="<? echo $product_val['product_id']; ?>" onclick="addToCart(this);"><img src ="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_55.png" alt = "">Add To Cart</a>
            </div>
          </div>
        </div>
        <? } ?>   
      
      </div>

