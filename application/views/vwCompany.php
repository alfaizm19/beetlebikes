<section class="wrapper-main">
  <section class="inner-banner">
    <figure> <img src="<?=base_url().$page->banner_image_path?>" alt="<?=$page->page_name?>"/></figure>
  </section>
  <section class="inner-wrapper">
    <aside class="breadcrumb-main">
      <ol class="breadcrumb">
        <li><a href="index.html">Home</a></li>
        <li class="active"><?php echo $page->title; ?></li>
      </ol>
    </aside>
    <section class="about-block">

      <section class="container">

		<div class="product-title text-center titleStyle">
			<h1><span><?php echo $page->title; ?></span></h1>

		</div>

        <aside class="abouttop-block">
          <aside class="abouttop-blockleft">

		   <!--aside class="abouttop-blockright">
            <figure> <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/about-1.png" alt=""/><div class="video"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/about-2.png" alt=""/><a href="http://www.youtube.com/watch?v=nrJtHemSPW4" data-rel="prettyPhoto[gal]" class="playbutton"><span class="video-icon"></span></a></div>  </figure>

          </aside-->

            <aside class="titlecontent">
              <h2><span><?=$page->company_title1?></span><?=$page->company_title2?></h2>
            </aside>
            <?=$page->company_description;?>
			<a class="download" href="<?=$page->company_catalogue;?>" download>Download Company Catalogue</a> </aside>

			<aside class="abouttop-blockright">
           <figure> <img class="hide-img-cust" src="<?=base_url().$page->company_image?>" alt="<?=$page->title?>"/>

               <div class="video video-size"><a class="btn" href="javascript:;"  data-toggle="modal" data-target="#exampleModalCenter"><img src="<?=base_url().$page->video_image?>" alt="<?=$page->title?>"/></a><div class="video-icon"  data-toggle="modal" data-target="#exampleModalCenter"></div></div>
            </figure>


            <!-- <input type="hidden" name="video_file" id="video_file" value='<?=(!empty($page->video_embed_code)) ?  '<div id="headerPopup"  > <button  type="button" class="close close-video-cust" >&times;</button>'.$page->video_embed_code .'</div>': '<div id="headerPopup" > <button type="button" class="close close-video-cust" >&times;</button>'.base_url().$page->page_video.'</div>'?> '> -->

          </aside>

        </aside>
      </section>


	  <section class="abouttext-block">
      <section class="container">
      <aside class="text">
      <h2>Mission</h2>
      <p class="abouttext-paragraph"><span class="larr"><img src="<?=HTTP_ASSETS_PATH_CLIENT?>images/arrl.png" alt=""/></span>
	  <?=$page->mission?><span class="rarr"><img src="<?=HTTP_ASSETS_PATH_CLIENT?>images/arrr.png" alt=""/></span></p>
      </aside>
       <aside class="text text2">
      <h2>Vision</h2>
      <p class="abouttext-paragraph"><span class="larr"><img src="<?=HTTP_ASSETS_PATH_CLIENT?>images/arrl.png" alt=""/></span>
	  <?=$page->vision?><span class="rarr"><img src="<?=HTTP_ASSETS_PATH_CLIENT?>images/arrr.png" alt=""/></span></p>
      </aside>
      </section>
      </section>


      <section class="aboutlist-block">
      <section class="container">
      <aside class="text">
      <h2><?=$page->company_advantage_title?></h2>
      <?=$page->company_advantage_description?>
     <ul>
	 <?php
        for ($x = 1; $x <= 6; $x++) {
          $icon_column='feature'.$x.'_icon';
          $title='feature'.$x.'_title';
          $description='feature'.$x.'_description';
        ?>
     <li>
     <figure><img alt="" src="<?php echo base_url($page->$icon_column); ?>" /></figure>

          <h3><?=$page->$title?></h3>

         <!-- <p><?=$page->$description?></p> -->
        </li>
      <?php } ?>
	 </ul>
      </aside>
      </section>
      </section>


      <section class="aboutslidermain-block">
      <section class="container">
	  <div class="product-title text-center titleStyle">
				<h2><span><?=$page->client_title?></span></h2>
			</div>
      <aside class="text">
      <p><?=$page->client_description?></p>
      </aside>
      <aside class="aboutslider">
		<div class="row">
				<div class="col-md-12">
					<div class="logos about-testi-carousel owl-carousel owl-theme bottom-nav">
					<?
					if (isset($clients)):
						foreach ($clients as $key => $client_val):
							?>

					 <img src="<? echo base_url($client_val['logo']); ?>" alt="<? echo $client_val['name']; ?>">
					<?
						endforeach;
					endif;
					?>



						</div>
					</div>
		</div>



      </aside>
      </section>
      </section>



    </section>
  </section>
</section>
<div class="modal fade reviewpopup" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close lity-close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body videobody">
        <!-- <iframe src="https://www.youtube.com/embed/Hfb72UbvplU?autoplay=1" frameborder="0" height="565" width="1000" allowfullscreen></iframe> -->
    <!--<video width="100%" height="565" controls autoplay>
      <source src="movie.mp4" type="video/mp4">
      <source src="movie.ogg" type="video/ogg">
</video>-->
<?php
echo $page->video_embed_code;
 ?>
      </div>
    </div>
  </div>
</div>
