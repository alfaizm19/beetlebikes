<div class="page-content bg-white careers brd_crumb">
<div class="top-banner-bg"></div>
  <div class="breadcrumb-strap">
    <div class="container-lg">
      <div class="row justify-content-between">
        <div class="col-md-auto align-self-center">
          <h1 class="page-title">Careers</h1>
        </div>
        <div class="col-md-auto align-self-center">
          <div class="breadcrumb-row">
            <ul class="list-inline">
              <li><a href="<?php echo base_url() ?>">Home</a></li>
              <li>Careers</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- contact area -->
  <div class="content-block">
    <div class="section-full bg-white content-inner careers p-b0-i">
      <div class="container-lg">
        <div class="section-head text-center">
          <h2 class="title font_karla font-weight-700 font-36 text-dark-blue">Are you the one we're looking for? Apply now</h2>
          <p class="font_karla font-weight-700 font-16-i text-p-color max-100-p m-b0-i">Forever Tourism works hard to be recognized as a travel brand by bringing out the potentials, capabilities, and skills of our agents. We provide opportunities for you to showcase your talent and development to the fullest. The amazing part of working with US is that we do not work only as a colleague or a team, WE work as a FAMILY. Email us your CV to info@forevertourism.com
          </p>
        </div>
      </div>
    </div>
    <div class="section-full bg-light-gray content-inner careers">
      <div class="container-lg">
        <form id="careerForm" role="search" method="post" class="myprofile" action="<?php echo base_url('home/submit_career') ?>" enctype="multipart/form-data">
          <div class="row">
            <div class="offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-xs-12 m-b20">

              <div id="finalError"></div>

              <p class="font_karla font-weight-400 font-20 text-p-color max-100-p m-b0-i">Mandatory fields are marked *</p>

            </div>
            <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b20">
              <div class="input-group">
                <input name="name" type="text" class="form-control font-20-i font_karla_i nameErr removeErr" placeholder="Name*">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b20">
              <select name="position" id="archives-dropdown--1" class="bs-select-hidden positionErr removeErr">
                <option value="">Select Position</option>
                <?php 
                  if (!empty($positions)):
                    foreach($positions as $pos):
                ?>
                  <option value="<?php echo $pos->position_name ?>"><?php echo $pos->position_name ?></option>
                <?php endforeach; endif; ?>
              </select>
            </div>
            <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b20">
              <div class="input-group">
                <input name="email" type="text" class="form-control font-20-i font_karla_i emailErr removeErr" placeholder="Email*">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b20">
              <div class="input-group">
                <input name="experience" type="text" class="form-control font-20-i font_karla_i experienceErr removeErr" placeholder="Years of Experience*">
              </div>
            </div>
            <div class="offset-lg-2 col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b20">
              <div class="input-group">
                <input name="phone" type="text" class="form-control font-20-i font_karla_i phoneErr removeErr" placeholder="Phone*">
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 m-b20">
              <div class="input-group bg-white resumeErr removeErr">
                <input name="resume" type="file" class="form-control font-20-i font_karla_i resumeErr removeErr" placeholder="Upload CV*">
                <span class="file_text">Upload CV*</span>
                <span class="input-group-btn">
                    <button type="button" class="fa-rotate-90 ti-clip text-primary font-22"></button>
                </span>
              </div>
            </div>
            <div class="offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-xs-12 m-b20">
              <div class="input-group">
                <textarea name="message" rows="4" class="form-control" placeholder="Comments"></textarea>
              </div>
            </div>
            <div class="offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-xs-12 m-b20">
              <div class="g-recaptcha" data-sitekey="your_site_key"></div>
            </div>
            <div class="offset-lg-2 col-lg-8 col-md-12 col-sm-12 col-xs-12 m-b20">
              <input name="submit" type="submit" value="Submit" class="site-button btn-lg">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>