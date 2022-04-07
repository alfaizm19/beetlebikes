<div class="breadcrumb_content">
	<h4>SHIPS IN 24 HOURS</h4>
	<p><a href="<?php echo base_url() ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Ships in 24 hours</p>
</div>

<div class="category_content product_carousel pb-0">
	<div class="category_item_top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="dropdown d-inline-block">
					  <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
					    <?php 
					    	$order_by = $this->input->get('order_by');

					    	switch ($order_by) {
					    		case 'celebrity':
					    			echo "Celebrity Features";
					    			break;
					    		case 'low':
					    			echo "Price, Low to High";
					    			break;
					    		case 'high':
					    			echo "Price, High to Low";
					    			break;
					    		default:
					    			echo "Best Selling";
					    			break;
					    	}
					    ?>
					  </button>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					    <li><a class="dropdown-item" href="?order_by=best">Best Selling</a></li>
					    <li><a class="dropdown-item" href="?order_by=low">Price, Low to High</a></li>
					    <li><a class="dropdown-item" href="?order_by=high">Price, High to Low</a></li>
					    <li><a class="dropdown-item" href="?order_by=celebrity">Celebrity Features</a></li>
					  </ul>
					</div>						
					<span>|&nbsp;Showing <span id="min">1</span> - <span id="max"><?= $total >= $limit? $limit:$total ?></span> of <?= $total ?> results</span>
				</div>
			</div>
		</div>
	</div>
	<div class="category_item">
		<div class="container px-0">
			<div class="row" id="appendProducts">
				<?php if (!empty($products)): ?>
				<?php 
					foreach ($products as $prod):
						$curr = get_currency();
						if ($curr == 'AED') {
							$price = $prod->price_aed;
						} else {
							$price = $prod->price_usd;
						}
				?>
					<div class="col-lg-3 col-md-4 col-sm-6">
					    <div class="item">
					    	<div class="owl_image">

					    		<?php if ($prod->celeb_style): ?>
					    			<p class="celeb_card">celeb style</p>
					    		<?php endif ?>

					    		<a href="<?php echo base_url('products/'.$prod->slug) ?>">
					    			<img src="<?php echo base_url($prod->image_path) ?>" class="product_normal">
					    		</a>
					    		
					    		<?php if (!empty($prod->roll_image)): ?>
					    			<a href="<?php echo base_url('products/'.$prod->slug) ?>">
					    				<img src="<?php echo base_url($prod->roll_image) ?>" class="product_normal_hover">
					    			</a>
					    		<?php endif ?>

					    		<?php if (!$prod->stock): ?>
					    			<p><span>Sold out</span></p>
					    		<?php endif ?>

					    		<div class="owl_hover">
					    			<a class="prodWish<?= $prod->id ?>" id="prodWish<?= $prod->id ?>" data-id="<?= $prod->id ?>" data-currenturl="<?= current_url() ?>" onclick="wishlist('prodWish<?= $prod->id ?>')" href="javascript:void(0)"><img class="icon" src="<?php echo $this->Master_model->wishlist_icon($prod->id); ?>"></a>
					    			
					    			<a href="<?php echo base_url('products/'.$prod->slug) ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/icon-eye.svg"></a>
					    		</div>
					    		<div class="addtocart">
					    			<?php if ($prod->stock): ?>
					    			<button class="prod<?= $prod->id ?>" id="prod<?= $prod->id ?>" data-id="<?= $prod->id ?>" data-stock="<?= $prod->stock ?>" data-cart="<?= get_cart_stock($prod->id) ?>" onclick="addToCart('prod<?= $prod->id ?>')">Add to cart</button>
					    			<?php else: ?>
					    				<button>OUT OF STOCK</button>
					    			<?php endif; ?>
					    		</div>			    		
					    	</div>
					    	<a href="<?php echo base_url('products/'.$prod->slug) ?>" style="text-decoration: unset;">
						    	<h5><?php echo $prod->product_name ?></h5>
						    </a>
					    	<p><?php echo $curr ?> <?php echo check_num($price) ?></p>
					    </div>
					</div>
				<?php endforeach ?>
				<?php endif ?>
			</div>

			<?php if ($total > $limit): ?>
			<div class="row">
				<div class="col-md-12 text-center">
					<button data-limit="<?php echo $limit ?>" data-total="<?php echo $total ?>" data-offset="<?php echo $limit ?>" class="load_product load_more_product">Load more products</button>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>
</div>
