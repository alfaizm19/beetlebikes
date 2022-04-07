<div class="breadcrumb_content celeb_breadcrumb" <?= !empty($page->banner_image_path)? 'style="background: url('.base_url($page->banner_image_path).')"':''; ?>>
	<h4><?php echo $page->title ?></h4>
	<?php echo $page->description ?>
</div>
<div class="celebrity_style m-0">
	<div class="container container_2" id="showData">
		<?php 
			if(!empty($celebStyle)):
				$i=1;
				foreach($celebStyle as $celeb):
					$curr = get_currency();
					if ($curr == 'AED') {
						$price = $celeb->price_aed;
					} else {
						$price = $celeb->price_usd;
					}

					$link = '';

					if (!empty($celeb->link)) {
						$link = "onclick=window.location.href='".$celeb->link."'";
					}

					if ($celeb->background == 'white') {
						$bgColor = '#FFFFFF';					
					} elseif ($celeb->background == 'peach') {
						$bgColor = '#F4EFD1';
					} else {
						$bgColor = '#F2F2F2';
					}
		?>
			<?php if ($i % 2 == 0): ?>

				<div class="celeb_content" style="background-color: <?= $bgColor ?>">
					<div class="row align-items-center justify-content-center text-center">
						<div class="col-md-12 col-lg-4 ps-lg-1">
							<div class="celeb_item p-4">
							<h4><?php echo $celeb->title ?></h4>
							<hr>
							<h4><?= $curr ?>. <?= check_num($price) ?></h4>
							<?php echo $celeb->description ?>
							<p><button <?= $link ?>>shop now</button></p>
							</div>
						</div>
						<div class="col-md-6 col-lg-4 position-relative">
							<?php if(!empty($celeb->crop_product_image)): ?>
								<img src="<?php echo $celeb->crop_product_image ?>">
							<?php else: ?>
								<img src="<?php echo $celeb->product_image ?>">
							<?php endif; ?>
						</div>
						<div class="col-md-6 col-lg-4">
							<?php if (!empty($celeb->crop_celeb_image)): ?>
								<img src="<?php echo $celeb->crop_celeb_image ?>">
							<?php else: ?>
								<img src="<?php echo $celeb->celeb_image ?>">
							<?php endif ?>
						</div>
					</div>			
				</div>

			<?php else: ?>
				
				<div class="celeb_content" style="background-color: <?= $bgColor ?>">
					<div class="row align-items-center justify-content-center text-center">
						<div class="col-md-6 col-lg-4">
							<?php if (!empty($celeb->crop_celeb_image)): ?>
								<img src="<?php echo $celeb->crop_celeb_image ?>">
							<?php else: ?>
								<img src="<?php echo $celeb->celeb_image ?>">
							<?php endif ?>
						</div>
						<div class="col-md-6 col-lg-4">
							<?php if(!empty($celeb->crop_product_image)): ?>
								<img src="<?php echo $celeb->crop_product_image ?>">
							<?php else: ?>
								<img src="<?php echo $celeb->product_image ?>">
							<?php endif; ?>
						</div>
						<div class="col-md-12 col-lg-4 ps-lg-1"><div class="celeb_item p-4">
							<h4><?php echo $celeb->title ?></h4>
							<hr>
							<h4><?= $curr ?>. <?= check_num($price) ?></h4>
							<?php echo $celeb->description ?>
							
							<p><button <?= $link ?>>shop now</button></p>
							</div>
						</div>
					</div>
				</div>

			<?php endif ?>
		<?php $i++; endforeach; endif; ?>
	</div>	
</div>

	<?php if ($total > $limit): ?>
	<div class="row">
		<div class="col-md-12 text-center">
			<button type="button" data-total="<?= $total ?>" data-limit="<?= $limit ?>" class="load_product load_productceleb">Load more products</button>
		</div>
	</div>
	<?php endif ?>
</div>