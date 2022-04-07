<div class="breadcrumb_content">
		<h4>Our Story</h4>
		<p><a href="<?php echo site_url() ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Our Story</p>
	</div>


<div class="our_story">
	<div class="container">
		<div class="row justify-content-md-between justify-content-center">
			<?php 
				if (!empty($stories)):
					$i=1;
					foreach($stories as $story):
			?>

				<?php if ($i % 2 === 1): ?>
					<div class="col-md-6">
				      <div class="ratio ratio-16x9">
						  <?php echo $story->video ?>
					  </div>				
					</div>
				<?php else: ?>
					<div class="col-md-6 d-flex justify-content-end">
				      <div class="ratio ratio-16x9">
						  <?php echo $story->video ?>
					  </div>
					</div>
				<?php endif ?>
				
			<?php $i++; endforeach; endif; ?>
		</div>
	</div>
</div>