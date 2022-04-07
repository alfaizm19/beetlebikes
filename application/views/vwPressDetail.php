<div class="breadcrumb_content blog_breadcrumb press_breadcrumb" style="<?= !empty($press->banner)? 'background: url('.base_url($press->banner).')':''; ?>">
		<h4><?php echo $press->press_name.' '. $press->title ?></h4>
	</div>


<?php if (!empty($images)): ?>
<div class="press_image_top">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div id="press_banner_slider" class="carousel slide" data-bs-ride="carousel">
				  <div class="carousel-inner">
				  	<?php $i=1; foreach ($images as $img): ?>
				    <div class="carousel-item <? echo $i==1? 'active':''; ?>">
				      <img src="<?php echo base_url($img->image_path) ?>" class="d-block w-100" alt="...">
				      <label data-bs-toggle="modal" data-bs-target=".exampleModal<?= $i ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/zoom.svg"></label>
				    </div>
				    <?php $i++; endforeach ?>
				  </div>
				  <?php if (count($images) > 1): ?>
				  <a class="carousel-control-prev" href="#press_banner_slider" role="button" data-bs-slide="prev">
				    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/angle_arw.png">
				  </a>
				  <a class="carousel-control-next" href="#press_banner_slider" role="button" data-bs-slide="next">
				    <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/angle_arw.png">
				  </a>	
				  <?php endif ?>			  
				</div>	
				<p class="text-center mb-5"><a href="<?php echo base_url('press') ?>"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>/images/dots.png"></a></p>
			</div>
		</div>
	</div>
</div>

<?php $k=1; foreach ($images as $img): ?>
	<div class="modal fade modal-common exampleModal<?= $k ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-xl">
	    <div class="modal-content">
	      <div class="modal-body text-center">
	         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	        <img src="<?php echo base_url($img->image_path) ?>">
	      </div>
	    </div>
	  </div>
	</div>
<?php $k++; endforeach; ?>

<?php endif ?>

<?php if (!empty($morePress)): ?>

<div class="press_images_content">
	<div class="container container_2">
		<h3 class="section_heading mb-0 pb-1">More Press</h3>
		<div class="owl-carousel owl-theme" id="more_portfolio">
			<?php 
				foreach ($morePress as $press):
					$image_path = $press->image_path;
					if (!empty($press->image_path_crop_image)) {
						$image_path = $press->image_path_crop_image;
					}
			?>
			<div class="item">
				<div class="press_images">
					<img src="<?php echo base_url($image_path) ?>">
					<div class="press_hover">
						<h4>
							<a href="<?= base_url('press/'.$press->slug) ?>">
								<?php echo $press->press_name ?> - <?php echo $press->title ?>
							</a>
						</h4>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	</div>
</div>

<?php endif ?>