<section class="wrapper-main">

<section class="inner-banner productPage">
    <figure> <!--img src="<? echo base_url().$page->banner_image_path; ?>" alt="<? echo ($page->title); ?>"/--></figure>
</section>
<style type="text/css">
  .becomedistributor-content .form-group .btn.btn-submit
  {
    background-color: #0d706d !important;
  }
</style>
  <section class="inner-wrapper">
    <aside class="breadcrumb-main">
       <ol class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="<?= base_url('product') ?>">Products</a></li>
		<li class="active"><?= $product_details->product_name; ?></li>
      </ol>
    </aside>


<style>
.slick-active {
    /* width: 600px !important;
    box-sizing: border-box; */
}
</style>
    <section class="products-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 <?php echo (count($product_image) > 1) ? "col-md-6" : "col-md-5"; ?>">
            <?
            if (!empty($product_image)) {
			?>
            <div class="slider-nav">
            <?
                foreach ($product_image as $product_image_val) {
            ?>
              <figure><img src="<?= base_url() . $product_image_val['medium_image_path']; ?>" class="img-fluid" /></figure>
             <?
            }
            ?>
            </div>
			<?
			}
            ?>
             <?
            if (!empty($product_details)) {
            ?>
			<div class="main-container">
            <div class="slider-for slider slider-main">
              <figure><img src="<?= base_url() . $product_details->image_path; ?>" class="img-fluid" /></figure>
            </div>
			<span class="zoom-icon" data-toggle="modal" data-target="#productid"></span>
			</div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6">
            <section class="products-details">



              <h2><?= $product_details->product_name; ?></h2>


               <p><?= $product_details->description; ?></p>
			   <h4>SKU : <?= $product_details->sku_code; ?></h4>

			  <div class="row">
          <?php $priceLabel = ((country_id == 1) ? "AED" : ((country_id == 2) ? "QAR" : "OMR")); ?>
			  <? if($product_details->discount_price != ""){?>
			  <h4 class="old_price"><?= $priceLabel." ".$product_details->price; ?></h4>
			  <h4 class="price"><?= $priceLabel." ".$product_details->discount_price; ?></h4>
			  <? }else{ ?>
			  <h4 class="offer_price"><?= $priceLabel." ".$product_details->price; ?></h4>
			  <?} ?>
			  </div>

              <div class="products-form">

                <div class="row">
					<div class="col-sm-12 col-md-6">
						<h4 class="qutit">Quantity</h4>

						<aside class="quan product_puan">
						<form>
						  <span class="pleft"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div></span>
						  <input type="" id="number" value="1" maxlength="5" onkeyup="this.value = minmax(this.value, 1, 99999)"/>
						  <span class="right"><div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></span>
						</form>
						</aside>


					</div>
                </div>
				<div class="row">
				<div class="col-md-12">
					<a class="add-btn" href="#" id="submit" zone="" qty="1" date=""
					price="<?= $product_details->price; ?>" product-id="<?= $product_details->id; ?>" data_detail="1" onclick="addToCart(this);"><img src ="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/cartIcon.png" alt = "">Add To Cart</a>
					<a class="add-btn sendenquiry" href="#" data-toggle="modal" data-target="#productenquiry"><img src ="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/detailsIcon.png" alt = "">Send Message</a>
                 </div>
				  </div>
              </div>
            </section>
          </div>
		  <? } ?>
          <div class="col-xs-12 col-sm-12 description">

            <span><a class="add-btn description-add-btn"href="#"><img src ="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/spec.png" alt = "">specifications</a></span>
			<?php if($product_details->catalogue_pdf != ""){ ?>
			<span ><a class="add-btn description-download" target= "_new" href="<?= base_url() . $product_details->catalogue_pdf; ?>"><img src ="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/downPdf.png" alt = "">Download catalogue</a></span>
			<?php } ?>
            <?= $product_details->technical_specification; ?>
          </div>
        </div>
      </div>
       <? if (!empty($related_product)) { ?>
      <section id="categories_section" class="clearfix">
		<div class="container text-center">
			<div class="related_title text-left portfolioFilter rline">
				<h4>Related Products</h4>
			</div>


			<div class="row">
			 <div class="rel-product-carousel owl-carousel owl-theme bottom-nav">
			 <?
       $priceLabel = ((country_id == 1) ? "AED" : ((country_id == 2) ? "QAR" : "OMR"));
                                foreach ($related_product as $related_product_val) {
                                  // print_r($related_product_val);
                                    $disabled = "";
                                    $data = array();
                                    if (isset($cart_items)) {
                                        $data = $cart_items;
                                        if (in_array($related_product_val['id'], array_column($data, 'product_id'))) {
                                            $disabled = "disabled";
                                        }
                                    } elseif (isset($product_data)) {
                                        $data = $product_data;
                                        if (in_array($related_product_val['id'], array_column($data, 'product_id'))) {
                                            $disabled = "disabled";
                                        }
                                    }
                                    ?>


					<div class="thumbnail productGrid">
						<a href="<?php echo base_url('product/product_details/'.$related_product_val['product_url']) ?>">
						<div class="proImage"><img src="<?= base_url() . $related_product_val['medium_image_path']; ?>"
						class="img-responsive img-fluid" alt="">

						<div class="hoverDiv"><i class="fa fa-link" aria-hidden="true"></i></div>
										</div>
						</a>


						<div class="product-dit bg-color">
					    <p><a href="<?php echo base_url('product/product_details/'.$related_product_val['product_url']) ?>"><?= $related_product_val['product_name']; ?></a></p>
						<h2>
              <?php
                if($related_product_val['discount_price'] != "")
                {
                  echo "<del>".$priceLabel." ".$related_product_val['price']."</del> ".$priceLabel." ".$related_product_val['discount_price'];
                }
                else
                {
                    echo $priceLabel." ".$related_product_val['price'];
                }
                ?>
            </h2>
						<button  zone="" qty=1 date=""  price="<? echo $related_product_val['price']; ?>" product-id="<? echo $related_product_val['id']; ?>" onclick="addToCart(this);" class="add_cart_product addtpcartBtn">Add to Cart</button>
						</div>

					</div>
				<? } ?>

			</div>

</div>

			</div>
		</div>
	</section>
    </section>
	  <? } ?>

    </section>
  </section>
</section>




<!-- Modal content-->
	<section class="modal fade becomedistributorid-popup" id="productenquiry" role="dialog">
    <section class="modal-dialog modal-dialog-centered">

      <section class="modal-content">
        <section class="modal-body">
          <section class="becomedistributor-content">
          <button type="button" class="close" data-dismiss="modal"></button>
          <h2>Product Enquiry</h2>
          <div id="divMessage_distribute" class="sucess-message"></div>
        <form name="product_enquiry" id="product_enquiry" method="post" action="#" enctype="multipart/form-data">
          <aside class="form-group">
            <input type="text" required placeholder="*Name" id="company_name" name="company_name" class="form-control">
          </aside>
          <aside class="form-group">
           <input type="email" required class="form-control" id="email" name="email" placeholder="* Email">
          </aside>
          <aside class="form-group">
            <input type="text"  maxlength="20"  minlength="10" required class="form-control" id="phone" name="phone" placeholder="* Phone/Mobile" onKeyDown="return validate_phonenumber(this, event);">
          </aside>
		  <aside class="form-group">
            <!-- <select class="form-control" id="product_category" name="product_category">
                <option>Select Product Category</option>
                <?  foreach ($categories as $categories_val) { ?>
                	<option value="<?php echo $categories_val['id'];?>"><?php echo $categories_val['name'];?></option>
                <?php }?>
            </select> -->
            <input type="text" placeholder="" id="product_name" name="product_name" class="form-control" value="<?= $product_details->product_name." - ".$product_details->sku_code; ?>" readonly>
           </aside>
          <!-- <aside class="form-group">
            <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control">
          </aside> -->
          <aside class="form-group">
            <textarea required class="form-control" name="message" id="message1" placeholder="Message*" rows="5"></textarea>
          </aside>
          <aside class="form-group mb-0 text-center">
          <div id="div_captcha_error">
                  <? $this->load->view('partials/vwRecaptcha'); ?></div>
          </aside>
          <aside class="form-group enq_btn">
            <input type="hidden" name="product_category" value="<?= $product_details->id ?>">
            <input type="hidden" name="prodName" value="<?= $product_details->product_name ?>">
          <!-- <a href="javascript:;" class="btn btn-submit">Send Message</a> -->

          <aside class="form-group btn-send-message">
					<button type="submit" value="save" class="btn btn-submit save-btn">Send Message</button>
					</aside>
          </aside>
          </form>
          <p>We respect your privacy and only use your data to contact you about your enquiry.</p>
          </section>
      </section>
    </section>
  </section>
</section>





<section class="modal fade product-popup" id="productid" role="dialog">
    <section class="modal-dialog modal-dialog-centered">

      <!-- Modal content-->
      <section class="modal-content">

        <section class="modal-body">
          <section class="product-name">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <ul>
              <li><figure><img src="<?= base_url() . $product_details->image_path; ?>" class="img-fluid" /></figure> </li>
              <!-- <li><figure><img src="<?= base_url() . $product_details->image_path; ?>" class="img-fluid" /></figure> </li>
              <li><figure><img src="<?= base_url() . $product_details->image_path; ?>" class="img-fluid" /></figure> </li> -->
            </ul>
          </section>

      </section>
    </section>
  </section>
</section>



</body>
</html>



<script>
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  if(value==100000){
    value--;
  }
  document.getElementById('number').value = value;
  $("#submit").attr('qty',value);
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  if(value==0){
    value++;
  }
  document.getElementById('number').value = value;
  $("#submit").attr('qty',value);
}
</script>
<script type="text/javascript">
function minmax(value, min, max)
{
    if(parseInt(value) < min || isNaN(parseInt(value)))
        return min;
    else if(parseInt(value) > max)
        return max;
    else return value;
}
</script>
