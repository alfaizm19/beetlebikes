<input type="hidden" id="current_url" value="<? echo base_url('admin/'.$this->router->fetch_class()); ?>" />
<input type="hidden" id="base_url" value="<? echo base_url(); ?>" />
<header class="m-grid__item    m-header " data-minimize-offset="200" data-minimize-mobile-offset="200">
<div class="m-container m-container--fluid m-container--full-height">
<div class="m-stack m-stack--ver m-stack--desktop">
<!-- BEGIN: Brand -->
<div class="m-stack__item m-brand  m-brand--skin-dark ">
<div class="m-stack m-stack--ver m-stack--general">
<div class="m-stack__item m-stack__item--middle m-brand__logo">
<a href="<? echo base_url('admin/dashboard'); ?>" class="m-brand__logo-wrapper">
<img alt="<? echo $setting->site_project_name; ?>"   src="<? echo base_url($setting->website_admin_logo); ?>" />
</a>
</div>

</div>
</div>
<!-- END: Brand -->
<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

<!-- END: Horizontal Menu -->
<!-- BEGIN: Topbar -->
<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
<div class="m-stack__item m-topbar__nav-wrapper">
<ul class="m-topbar__nav m-nav m-nav--inline">
<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
data-dropdown-toggle="click">
<a href="#" class="m-nav__link m-dropdown__toggle">
<span class="m-topbar__userpic">

<?php if (!empty($this->session->userdata('user_image'))): ?>
	<img src="<? echo file_exists_admin($this->session->userdata('user_image')); ?>" class="m--img-rounded m--marginless m--img-centered" alt="<? echo $this->session->userdata('first_name'); ?>" />
<?php else: ?>
	<img style="width: 50px" src="<?php echo base_url('assets/admin/images/user-icon.png') ?>" class="m--img-rounded m--marginless" alt="<? echo $this->session->userdata('first_name'); ?>" />
<?php endif ?>

</span>
<span class="m-topbar__username m--hide">
Nick
</span>
</a>
<div class="m-dropdown__wrapper">
<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--right"></span>
<div class="m-dropdown__inner">
<div class="m-dropdown__header m--align-center" >
	<div class="m-card-user m-card-user--skin-dark">
		<div class="m-card-user__pic">
			</div>
			
			<?php if (!empty($this->session->userdata('user_image'))): ?>
				<img style="width: 50px" src="<? echo file_exists_admin($this->session->userdata('user_image')); ?>" class="m--img-rounded m--marginless" alt="<? echo $this->session->userdata('first_name'); ?>" />
			<?php else: ?>
				<img style="width: 50px" src="<?php echo base_url('assets/admin/images/user-icon.png') ?>" class="m--img-rounded m--marginless" alt="<? echo $this->session->userdata('first_name'); ?>" />
			<?php endif ?>

		<div class="m-card-user__details">
			<span class="m-card-user__name m--font-weight-500 text-capitalize">
				<? echo $this->session->userdata('first_name'); ?>
			</span>
			<a href="" class="m-card-user__email m--font-weight-300 m-link text-secondary">
				<? echo $this->session->userdata('email'); ?>
			</a>
		</div>
	</div>
</div>
<div class="m-dropdown__body">
	<div class="m-dropdown__content">
		<ul class="m-nav m-nav--skin-light">
			<li class="m-nav__section m--hide">
				<span class="m-nav__section-text">
					Section
				</span>
			</li>
			<li class="m-nav__item">
				<a href="<? echo base_url('admin/profile'); ?>" class="m-nav__link">
					<i class="m-nav__link-icon flaticon-profile-1"></i>
					<span class="m-nav__link-title">
						<span class="m-nav__link-wrap">
							<span class="m-nav__link-text">
								My Profile
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-nav__item">
				<a href="<? echo base_url('admin/site-setting'); ?>" class="m-nav__link">
					<i class="m-nav__link-icon flaticon-share"></i>
					<span class="m-nav__link-text">
						Site Settings
					</span>
				</a>
			</li>
			
			<li class="m-nav__separator m-nav__separator--fit"></li>
			<li class="m-nav__item">
				<a href="<? echo base_url('admin/auth/logout') ?>" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">
					Logout
				</a>
			</li>
		</ul>
	</div>
</div>
</div>
</div>
</li>
</ul>
</div>
</div>
<!-- END: Topbar -->
</div>
</div>
</div>
</header>

