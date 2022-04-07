<section class="wrapper-main">

<section class="inner-banner productPage">
    <figure> <!--img src="<? echo base_url().$page->banner_image_path; ?>" alt="<? echo ($page->title); ?>"/--></figure>
</section>
    <section class="inner-wrapper">
    <aside class="breadcrumb-main">
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>">Home</a></li>
        <li class="active"><?=ucfirst(strtolower($page->title));?></li>
      </ol>
    </aside>

<section id="categories_section" class="productListPage clearfix">
		<div class="container text-center">
		<!-- <div class="product-title text-center titleStyle">
			<h1><span><?=$page->title?></span></h1>
		</div> -->
    <section id="categories_section" class="productListPage clearfix">
  		<div class="container text-center">
  			<div class="product-title text-center titleStyle">
  				<h1><span><?=ucfirst(strtolower($page->title));?></span></h1>
  			</div>
  			<!-- Product List Starts Here -->

  			<!-- Search Product Name & Filter Pod -->
  			<div class="grid_cnt fl_w100">
  				<div class="grd_row fl_w100">
  					<div class="srtby_sec fl">
  						You Searched for <span class="srch_kword">"<?php echo urldecode($searchWord); ?>"</span>
  					</div>
  					<div class="show_sec fr"><span class="show_txt">Showing results: </span>
  						<span class="show_count"><?php echo count($products); ?> of <?php echo $search_count; ?></span>
  					</div>
  				</div>
  			</div>
  			<!-- Search Product Name & Filter Pod -->


        <?php if(!empty($products)){

        foreach($products as $product):
          $productId = $product['id'];
          $priceDetails = $this->db->query("select * from product_country_details where product_id = '".$productId."' and country_id = '".country_id."'")->row();
          $priceLabel = ((country_id == 1) ? "AED" : ((country_id == 2) ? "QAR" : "OMR"));

          ?>

          <div class="media media_sec">
    				<div class="media-left media-middle">
    					<a href="<?=base_url()?>product/product_details/<?=$product['product_url'];?>"> <img class="media-object" src="<? echo base_url().$product['medium_image_path']; ?>" alt="<? echo $product['product_name']; ?>" style="max-width: 180px;"> </a>
    				</div>
    				<div class="media-body">
    					<h4 class="media-heading"><a href="<?=base_url()?>product/product_details/<?=$product['product_url'];?>"><? echo $product['product_name']; ?></a></h4>
    					<p><? echo $product['description']; ?></p>
    					<div class="prod_det">
    						<div class="prod_sku"><span class="psku_name">SKU:</span><span class="psku_id"><? echo $product['sku_code']; ?></span></div>
    						<div class="prod_price">
                  <?
                    if($priceDetails->discount_price != "")
                    {
                      // echo "<del>".$priceLabel." ".$priceDetails->price."</del> ".$priceLabel." ".$priceDetails->discount_price;
                      echo '<del style="color:#999;">'.$priceLabel.' <span class="rate">'.$priceDetails->price.'</span></del> '.$priceLabel.' <span class="rate">'.$priceDetails->discount_price;
                    }
                    else
                    {
                        echo $priceLabel.' <span class="rate">'.$priceDetails->price.'</span>';
                    }
                  ?>

                </div>
    					</div>
    				</div>
    			</div>



        <?php endforeach;
        // echo $links;
        ?>
        <div class="pagi_cont">
					<nav aria-label="Page navigation">
					  <ul class="pagination">
						<?php echo $links; ?>
					  </ul>
					</nav>
				</div>
        <?php
        }else{ ?>
          <p class="text-center-no-products">Sorry, no products found for your search</p>
        <? } ?>


  			<!-- Product List Row Ends Here -->
  			<!-- Product List Row Starts Here -->

  			<!-- Product List Row Ends Here -->

  			</div>
  			<!-- Product List Starts Here -->

  		</div>
  	</section>




    	</section>
    	</section>
    	</section>
