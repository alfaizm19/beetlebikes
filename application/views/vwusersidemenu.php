
<div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
						<div class="tv-myaccount-content">
							<div class="text-center profile-img">
								<img src="<?php echo $this->session->userdata('user')->profile_picture ?>">
							</div>
							<ul class="tv-myaccount-list">
								<li><a href="dashboard" class="<?php if($this->uri->segment(1)=='dashboard'){echo 'active';} ?>">DashBoard</a></li>
								<li class=""><a href="profile"  class="<?php if($this->uri->segment(1)=='profile'){echo 'active';} ?>">Profile</a></li>
								<li class=""><a href="#">Booking History</a></li>
								<li ><a href="change_password" class="<?php if($this->uri->segment(1)=='change_password'){echo 'active';} ?>">Change Password</a></li>
								<li><a href="logout">Logout</a></li>
							</ul>
						</div>
					</div>