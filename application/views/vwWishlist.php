<section class="section">
	<div class="container">
	  <div>
	    <ol class="breadcrumb">
	      <li><a class="icon icon-sm fa-home text-primary" href="<?php echo base_url(); ?>"></a></li>
	      <li class="active">Wishlist
	      </li>
	    </ol>
	  </div>
	</div>
</section>

<section id="wishlist" class="section">
	<div class="container">
		<div class="container section-bottom-60 offset-top-4">
		  <form class="shoping-cart" action="#">
			<div class="table-responsive">
			  <table class="table">
				<thead>
				  <tr class="text-center">
					<th></th>
					<th>Image</th>
					<th>Product</th>
					<th>Price</th>
					<th>Stock Status</th>
					<th>Add to cart</th>
				  </tr>
				</thead>
				<tbody id="tbody">
				<?php 
					if (!empty($wishlist)):
						foreach($wishlist as $wish):
							$wishId = $wish->wishlist_id;
							$hash = hash('SHA256', $wishId);
							$mrp = $wish->mrp;
            				$sp = $wish->selling_price;
            				$pId  = hash('SHA256', $wish->id);
				?>
				  	
				  	<tr class="cart_item text-center" id="row_<?php echo $hash ?>">
						<td class="product-remove">
							<a id="icon_<?php echo $hash ?>" class="icon icon-xs text-primary fa fa-close" href="javascript:void(0)" onclick="remove_wishlist('<?php echo $hash ?>')"></a>
						</td>
						<td class="product-thumbnail"><a class="d-inline-block" href="single-product.html"><img src="<?php echo base_url($wish->image_path) ?>" width="100" height="100" alt=""></a></td>
						<td class="product-name">
						  <p><a class="text-base link-default" href="<?php echo base_url($wish->slug) ?>"><?php echo $wish->product_name ?></a></p>
						</td>
						<td class="product-price">
						  <?php 
						  	if (!empty(!empty($sp) && $sp > 0)) {

						  		if ($sp <= $mrp) {
					            echo '<p class="big text-primary">
								  	₹'.check_num($sp).'</p>';
					            echo '<p><span class="big product-details-price-small text-strike text-muted">₹'.check_num($mrp).'</span></p>';
					            }

						  	} else {
						  		echo '<p class="big text-primary">
								  	₹'.check_num($mrp).'</p>';
						  	}
						  ?>
						</td>
						<td class="text-center">
						  <?php echo $wish->stock? 'In Stock':'Out of Stock'; ?>
						</td>
						<td class="product-subtotal text-center pr-0">
						  <?php if ($wish->stock): ?>
						  	<button type="button" class="btn btn-primary" id="btn_<?php echo $pId; ?>" onclick="addFromWishlist('<?php echo $pId ?>')">Add to cart</button>
						  <?php else: ?>
						  	<button type="button" class="btn btn-primary">Out of stock</button>
						  <?php endif ?>
						  <p id="msg_<?php echo $pId ?>" class="text-center"></p>
						  <p id="msg_<?php echo $hash ?>" class="text-center"></p>
						</td>
				  	</tr>

				  	<?php endforeach; else: ?>
				  		<tr>
				  			<td colspan="10" class="text-center">There is no wishlist data</td>
				  		</tr>
				  	<?php endif ?>
				</tbody>
			  </table>
			</div>
			
		  </form>
		</div>
	</div>
</section>