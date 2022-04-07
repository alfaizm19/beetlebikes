<div class="breadcrumb_content">
	<h4>Press</h4>
	<p><a href="<?php echo site_url() ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;The Designer&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Press</p>
</div>


<div class="press_images_content">
	<div class="container container_1">
		<div class="row">
			<?php 
				if (!empty($press)):
					foreach($press as $pr):
						$image_path = $pr->image_path;
						if (!empty($pr->image_path_crop_image)) {
							$image_path = $pr->image_path_crop_image;
						}
			?>
			<div class="col-lg-3 col-md-4 col-sm-6 text-center">
				<div class="press_images">
				<img src="<?= base_url($image_path) ?>">
				<div class="press_hover">
					<h4>
						<a href="<?php echo base_url('press/'.$pr->slug); ?>">
							<?php echo $pr->press_name ?> - <?php echo $pr->title ?>
						</a>
					</h4>
				</div>
				</div>
			</div>
			<?php endforeach; endif; ?>
		</div>
	</div>
</div>