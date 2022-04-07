<div class="page-content bg-white">
	<div class="breadcrumb-strap">
		<div class="container-lg">
			<div class="row justify-content-between">
				<div class="col-md-auto align-self-center">
					<h1 class="page-title">Dashboard</h1>
				</div>
				<div class="col-md-auto align-self-center">
					<div class="breadcrumb-row">
						<ul class="list-inline">
							<li><a href="javascript:void(0);">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- contact area -->
	<div class="content-block">
		<div class="section-full bg-white content-inner home-tabs">
			<div class="container-lg">
				<div class="row">
					<?php echo $user_menu ; ?>
					<div class="col-lg-9 col-md-6 col-sm-12 col-xs-12">
						<h2 class="font_nunito font-weight-700 font-34 m-b30">My Dashboard</h2>
						<span class="font_nunito font-weight-700 font-18 theme_secondary_text">Hello! <span class="theme_color"><?php echo $this->session->userdata('user')->first_name ?></span> Welcome to Forever Tourism</span>
						<div class="row m-t20">
							<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12">
								<div class="dashboardblack1 p-a20 font_nunito font-weight-700 font-26 text-white text-center m-b20">
									<i class="fa fa-globe-uae"></i> Total Visas
									<span>0</span>
								</div>
							</div>
							<div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
								<div class="dashboardblack2 p-a20 font_nunito font-weight-700 font-26 text-white text-center m-b20">
									<i class="fa fa-tour"></i> Total Dubai Tours
									<span>0</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>