<div class="breadcrumb_content">
	<h4>THE DESIGNER</h4>
	<p><a href="<?php echo base_url() ?>">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;The Designer</p>
</div>

<div class="profile_content">
	<div class="container">
		<div class="row align-items-lg-center">
			<div class="col-md-6 pe-md-0">
				<img src="<? echo base_url($data->banner_image_path) ?>" class="img-fluid">
			</div>
			<!-- <div class="col-md-1 px-0"></div> -->
			<div class="col-md-6 px-lg-5 px-3">
				<h5>
					<?php echo $data->title ?>
				</h5>
				<? echo $data->description ?>
			</div>
		</div>
	</div>
</div>