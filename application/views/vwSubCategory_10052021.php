<section class="page-content">
	<div class="container">
		<div class="row mt-3">
			<div class="col-12">
				<div class="row category-banner m-0" style="background:url(<?php echo base_url($cat->banner_image) ?>); background-position:center;padding: 30px 0;position:relative;">
				    <div class="shadow-mask"></div>
<!-- <div class="col-9">
<?php 
if (!empty($cat->heading)): 
?>
<h1><?php echo $cat->heading ?></h1>
<?php 
if (!empty($cat->content)):
?>
<div class="collection_short_desc">
<?php echo $cat->content; ?>
</div>
<?php endif; endif; ?>
</div> -->
<div class="col-12">
    
<?php 
if (!empty($cat->heading)): 
	?>
	<h1>
		<?php echo $cat->heading ?>
	</h1>
	<?php if (!empty($cat->content)): ?>
		<div class="collection_short_desc">
			<?php echo $cat->content; ?>
		</div>
	<?php endif ?>
<?php endif; ?>
<!--<img class="img-responsive" alt="<?php //echo $cat->banner_image_alt ?>" src="<?php// echo base_url($cat->banner_image) ?>" />-->
</div>
</div>
</div>
</div>
<div class="row mt-4">
<div class="col-md-3">
<ol class="breadcrumb pt-0">
	<li><a class="icon icon-sm fa-home text-primary" href="<?php echo base_url(); ?>"></a></li>
	<li><a href="<?php echo base_url('category/'.$parent->slug); ?>"><?php echo $parent->category ?></a></li>
	<li class="active">
		<?php echo $cat->category ?>
	</li>
</ol>
</div>
<div class="col-md-6">

</div>
<div class="col-md-3">
<div class="form-wrap select-filter single-select">
	<select id="sortingOptions" data-placeholder="Select an option" data-minimum-results-for-search="Infinity">
		<option value="default">Default sorting</option>
		<option value="popularity">Sort by popularity</option>
		<option value="average">Sort by average rating</option>
		<option value="newness">Sort by newness</option>
		<option value="low-to-high">Sort by price: low to high</option>
		<option value="high-to-low">Sort by price: high to low</option>
	</select>
</div>
</div>
</div>
</div>
<div class="container section-bottom-60 mt-3">
<div class="row">
<div class="offset-top-45 offset-md-top-0 col-xl-3 text-left">
	<div class="row">
		<?php if (!empty($child)): ?>
			<div class="col-lg-12 col-md-6">
				<h4>Browse</h4>
				<!-- 09052021 Start -->
				<ul class="offset-top-20 list-dividers">
					<?php foreach ($child as $subCat): ?>
						<li><a href="<?php echo base_url($cat->parent_cat_slug.'/'.$subCat->slug) ?>"><?php echo $subCat->category ?></a></li>
					<?php endforeach ?>
				</ul>
				<!-- 09052021 End -->
				<hr class="divider divider-offset-lg divider-gray d-none d-lg-block">
			</div>
		<?php endif ?>

		<div class="col-lg-12 col-md-6 offset-top-45 offset-md-top-0">
			<h4>Filter by price</h4>

			<div class="offset-top-20">
				<div class="rd-range-container">
					<div class="rd-range" data-min="0" data-max="100000" data-start="[4000, 25000]" data-step="1000" data-tooltip="false" data-min-diff="10" data-input=".rd-range-input-value-2" data-input-2=".rd-range-input-value-3"></div>
					<div class="rd-range-input-container offset-top-20 justify-content-between d-flex align-items-center">
						<div><a id="filterBtn" class="btn btn-primary" href="javascript:void(0)">Filter</a></div>
						<div class="text-primary text-md-right">
							<label class="text-regular">Price:</label><span class="rd-range-input-value rd-range-input-value-2" id="range-2"></span><span class="rd-range-input-value rd-range-input-value-3" id="range-3"></span>
						</div>
					</div>
				</div>
			</div>


			<?php if (!empty($attributes)): ?>
				<h4>Sort</h4>
				
				<?php 
					foreach ($attributes as $attribName => $attribVal):

						$isMultiAttrib = $this->Master_model->is_multi_attrib($attribName);

						$newAttribVal = array();

						if ($isMultiAttrib) {
							$new = '';
							foreach ($attribVal as $data) {
								$new .= $data.',';
							}

							$newAttribVal = explode(',', $new);
							
						} else {
							$newAttribVal = $attribVal;
						}

						$newAttribVal = array_unique(array_filter($newAttribVal));

				?>
				<div class="offset-top-20">
					<label><strong><?php echo $this->Master_model->attrib_name_by_id($attribName) ?></strong></label>
					<?php 
						if (!empty($newAttribVal)):
							foreach($newAttribVal as $data):
					?>
					<div class="form-group offset-top-10">
						<?php echo $this->Master_model->attrib_value_by_id($data) ?>
						<input class="attributes" data-name="<?php echo $attribName ?>" data-value="<?php echo $data ?>" type="checkbox" name="attributes[<?php echo $attribName ?>]" value="<?php echo $data ?>">
					</div>
					<?php endforeach; endif; ?>
				</div>
				<?php endforeach ?>
			<?php endif ?>
			<!-- <hr class="divider divider-offset-lg divider-gray d-none d-lg-block"> -->
		</div>

		<!-- <div class="col-xl-12 col-md-6 offset-top-45 offset-md-top-0 text-left">
			<h4>Top Rated Products</h4>
			<div class="offset-top-20 unit flex-row unit-spacing-21">
				<div class="unit-left"><a href="single-product.html"><img alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/sidebar-01.jpg" width="100" height="100"></a></div>
				<div class="unit-body">
					<div class="p"><a href='category.html'>Necklaces</a></div>
					<div class="big offset-top-4"><a class="text-base" href="single-product.html">Amulette de Cartier long necklace</a></div>
					<div class="offset-top-4">
						<div class="product-price font-weight-bold">₹ XXX
						</div>
					</div>
					<div class="offset-top-4"><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star text-gray-light"></span></div>
				</div>
			</div>
			<div class="offset-top-30 unit flex-row unit-spacing-21">
				<div class="unit-left"><a href="single-product.html"><img alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/sidebar-02.jpg" width="100" height="100"></a></div>
				<div class="unit-body">
					<div class="p"><a href='category.html'>Earrings</a></div>
					<div class="big offset-top-4"><a class="text-base" href="single-product.html">Floral Vine Teardrop Natural Shell .925 Silver Earrings</a></div>
					<div class="offset-top-4">
						<div class="product-price font-weight-bold">₹ XXX
						</div>
					</div>
					<div class="offset-top-4"><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star text-gray-light"></span></div>
				</div>
			</div>
			<div class="offset-top-30 unit flex-row unit-spacing-21">
				<div class="unit-left"><a href="single-product.html"><img alt="" src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/sidebar-03.jpg" width="100" height="100"></a></div>
				<div class="unit-body">
					<div class="p"><a href='category.html'>Earrings</a></div>
					<div class="big offset-top-4"><a class="text-base" href="single-product.html">6-mm Round Birthstone Stud Earrings</a></div>
					<div class="offset-top-4">
						<div class="product-price font-weight-bold">₹ XXX
						</div>
					</div>
					<div class="offset-top-4"><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star text-gray-light"></span></div>
				</div>
			</div>
			<hr class="divider divider-offset-lg divider-gray d-none d-lg-block">
		</div> -->

		<!--<div class="col-xl-12 text-left offset-top-0 text-center text-lg-left order-lg-5">-->
			<!--  <h4>Compare</h4>-->
			<!--  <h4 class="offset-top-20">No products to compare</h4>-->
			<!--  <div class="elements-group-10 offset-top-20"><a class="btn btn-primary" href="#">Compare</a><a class="btn btn-white" href="#">Clear all</a></div>-->
			<!--</div>-->
		</div>
	</div>

	<div class="col-xl-9">

		<div class="row mt-1 appendProducts">
			<?php 
			if (!empty($products)):
				foreach($products as $product):
					$mrp = $product->mrp;
					$sp = $product->selling_price;

					$displayDate = $product->available_date;
					$displayTime = $product->available_time;

					$currentDate = strtotime(date('Y-m-d'));
					$currentTime = strtotime(date('Y-m-d H:i:s'));

					$isVisible = true;

					$productSlug = base_url(category_slug_by_id($product->category_level_1).'/'.category_slug_by_id($product->category_level_2).'/').$product->slug;

					if ( (empty($displayTime)) 
						&& !empty($displayDate) ) {

						if (strtotime($displayDate) > $currentDate) {
							$isVisible = false;
						} else {
							$isVisible = true;
						}

					} elseif ( (!empty($displayDate) && !empty($displayTime)) ) {

						$difference = ($currentTime - strtotime($displayTime))/60;

						if (strtotime($displayDate) > $currentDate) {
							$isVisible = false;
						} else {

							if(strtotime($displayDate) == $currentDate) {

								if (round($difference) > 0) {
									$isVisible = true;
								} else {
									$isVisible = false;
								}

							}

						}

					}

					if($isVisible):
						?>
						<div class="offset-top-45 offset-md-top-0 col-lg-4 col-md-6">
							<div class="product d-inline-block">
								<div class="product-media"><a href="<?php echo $productSlug; ?>"><img class="img-responsive" alt="" src="<?php echo base_url($product->image_path) ?>" width="290" height="389"></a>
									<div class="product-overlay"><a class="icon icon-circle icon-base fl-line-icon-set-shopping63" href="<?php echo $productSlug; ?>"></a></div>
									<?php if (!empty($product->product_tag)): ?>
										<div class="product-overlay-variant-2"><a class="label label-default" href="<?php echo $productSlug; ?>"><?php echo $product->product_tag ?></a></div>
									<?php endif ?>
									 <div class="quick-view-btn">
                                        <button class="btn btn-default btn-block">Quick View</button>
                                    </div>
								</div>
								<div class="offset-top-10">
									<p class="big"><a class="text-base" href="<?php echo $productSlug; ?>">
										<?php echo $product->product_name ?>
									</a></p>
								</div>
								<div class="product-price font-weight-bold">
									<?php 
									if (!empty($sp) && $sp > 0) {
										if ($sp <= $mrp) {
											echo '₹ '.check_num($sp);
											echo ' <span class="font-default text-light text-muted text-strike small">₹ '.check_num($mrp).'</span>';
										}
									} else {
										echo '₹ '.check_num($mrp);
									}
									?>
								</div>
								<div class="product-rating">
									<div><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star"></span><span class="icon icon-xs mdi mdi-star text-gray-light"></span></div>
								</div>
								<div class="product-actions elements-group-10"><a class="icon mdi mdi-heart-outline icon-gray icon-sm" href="#"></a><a class="icon mdi mdi-signal icon-gray icon-sm" href="#"></a></div>
							</div>
						</div>
					<?php endif; endforeach; endif; ?>

				</div>

				<div data-limit="<?php echo LIMIT ?>" data-total="<?php echo $total ?>" data-offset="<?php echo LIMIT ?>" class="load_product load_more_product offset-top-45">
				</div>

			</div>
		</div>

		<!-- 10052021 Start -->
		<?php if (!empty($cat->footer_content)): ?>
		<div class="row mt-1">
			<div class="offset-top-45 offset-md-top-0">
				<?php echo $cat->footer_content; ?>
			</div>
		</div>
		<?php endif ?>
		<!-- 10052021 End -->
		
	</div>
</section>

<script>
	$(window).scroll(function(){
	  if ($(window).scrollTop() == $(document).height()- $(window).height()) {

	  	var atttrib_name = [];
        var atttrib_value = [];

	  	total = $('.load_more_product').data('total');
		limit = $('.load_more_product').data('limit');
		offset = $('.load_more_product').data('offset');
		parent = "<?php echo $parent->id ?>";
		child = "<?php echo $cat->id ?>";

		minPrice = $("#range-2").text();
        maxPrice = $("#range-3").text();
        sort = $("#sortingOptions").find(':selected').val();

        $(".attributes:checked").each(function() {
        	atttrib_name.push($(this).data('name'));
            atttrib_value.push($(this).val());
        });

		loadMoreProducts(total, limit, offset, parent, child, minPrice, maxPrice, sort, atttrib_name, atttrib_value);
	  }
	});

	function loadMoreProducts(total, limit, offset, parent, child, minPrice, maxPrice, sort, atttrib_name, atttrib_value) {
		
		if (total > offset) {
			$.ajax({
				url: base_url+"load_more/child_cat_product",
				type: 'POST',
				dataType: 'json',
				data: {total: total, limit: limit, offset: offset, parent: parent, child: child, atttrib_name: atttrib_name, atttrib_value: atttrib_value, minPrice: minPrice, maxPrice: maxPrice, sort: sort},
				beforeSend: function () {
					$(".load_more_product").html(`
						<i class="fa fa-spinner fa-spin spinner"></i>
					`);
				}, 
				success: function(res) {
					if (res.error == false) {
						if (res.data != '') {
							$(".appendProducts").append(res.data);

							$(".load_more_product").data('offset', res.offset);

							$('html, body').animate({
							    scrollTop: $(window).scrollTop() - 600
							});
						}
					}

					$(".load_more_product").html('');
				}
			});
		} else {
			return false;
		}
		
	}

	$('.attributes').on('change', function() {
        var atttrib_name = [];
        var atttrib_value = [];

        parent = "<?php echo $parent->id ?>";
		child = "<?php echo $cat->id ?>";

        minPrice = $("#range-2").text();
        maxPrice = $("#range-3").text();
        sort = $("#sortingOptions").find(':selected').val();

        $(".attributes:checked").each(function() {
        	atttrib_name.push($(this).data('name'));
            atttrib_value.push($(this).val());
        });
        
        $.ajax({
        	url: base_url+'load_more/child_cat_product_by_filter',
        	type: 'POST',
        	dataType: 'json',
        	data: {atttrib_name: atttrib_name, atttrib_value: atttrib_value, parent: parent, child: child, minPrice: minPrice, maxPrice: maxPrice, sort: sort},
        	beforeSend: function () {
				$(".load_more_product").html(`
					<i class="fa fa-spinner fa-spin spinner"></i>
				`);
			}, 
			success: function(res) {
				if (res.error == false) {
					if (res.data != '') {
						$(".appendProducts").html(res.data);

						$(".load_more_product").data('offset', res.offset);

						// $('html, body').animate({
						//     scrollTop: $(window).scrollTop() - 600
						// });
					}
				}

				$(".load_more_product").html('');
			}
        });

    });

	$("#filterBtn").click(function(event) {
    	
    	parent = "<?php echo $parent->id ?>";
		child = "<?php echo $cat->id ?>";
    	minPrice = $("#range-2").text();
        maxPrice = $("#range-3").text();

        $.ajax({
        	url: base_url+'load_more/child_cat_product_by_price_filter',
        	type: 'POST',
        	dataType: 'json',
        	data: {minPrice: minPrice, maxPrice: maxPrice, parent: parent, child: child},
        	beforeSend: function () {
				$(".load_more_product").html(`
					<i class="fa fa-spinner fa-spin spinner"></i>
				`);
			}, 
			success: function(res) {
				if (res.error == false) {
					if (res.data != '') {
						$(".appendProducts").html(res.data);

						$(".load_more_product").data('offset', res.offset);

						// $('html, body').animate({
						//     scrollTop: $(window).scrollTop() - 600
						// });
					} else {
						$(".appendProducts").html('');
					}
				}

				$(".load_more_product").html('');
			}
        });
        

    });

	$("#sortingOptions").change(function(event) {

    	parent = "<?php echo $parent->id ?>";
		child = "<?php echo $cat->id ?>";
    	sort = $(this).val();

    	$.ajax({
        	url: base_url+'load_more/child_cat_product_by_sorting',
        	type: 'POST',
        	dataType: 'json',
        	data: {sort: sort, parent: parent, child: child},
        	beforeSend: function () {
				$(".load_more_product").html(`
					<i class="fa fa-spinner fa-spin spinner"></i>
				`);
			}, 
			success: function(res) {
				if (res.error == false) {
					if (res.data != '') {
						$(".appendProducts").html(res.data);

						$(".load_more_product").data('offset', res.offset);

						// $('html, body').animate({
						//     scrollTop: $(window).scrollTop() - 600
						// });
					}
				}

				$(".load_more_product").html('');
			}
        });

    });
</script>