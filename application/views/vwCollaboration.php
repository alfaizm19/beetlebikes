<div class="breadcrumb_content breadcrumb_collab">
	<h4>Collaborations</h4>
	<p><a href="<?php echo base_url(); ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;Collaborations</p>
</div>

<?php 
	$backgroundImage = $collab->banner;

	if (!empty($collab->crop_banner)) {
		$backgroundImage = $collab->crop_banner;		
	}
?>

<div class="collaboration_content pb-0">
	<div class="collaboration_banner text-center" <? echo !empty($backgroundImage)? 'style="background: url('.base_url($backgroundImage).');background-position: top center;background-size:cover;"':'' ?>>
	<div class="container">
		<h4>For <?= $collab->title ?></h4>
		<?php echo $collab->description ?>
	</div>
	</div>
	<?php if (!empty($gallery)): ?>
	<div class="collaboration_pattern">
		<div class="container">
			<div class="row">
				<?php foreach ($gallery as $gall): ?>
				<div class="col-md-4 col-sm-6">
					<img src="<?php echo base_url($gall->image_path) ?>">
				</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
	<?php endif ?>

	<?php if (!empty($collab->video)): ?>
	<div class="collaboration_video" <? echo !empty($collab->video_background_image)? 'style="background: url('.base_url($collab->video_background_image).');background-repeat: no-repeat;background-position: 54px 18px;"':'' ?>>
		<?php if (!empty($collab->video)): ?>
		    <div class="ratio ratio-16x9">
				<?php echo $collab->video ?>
			</div>	
		<?php endif ?>
	</div>
	<?php endif ?>
</div>