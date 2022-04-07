<section class="wrapper-main">
<section class="inner-banner">
    <figure> <img src="<?=base_url($page->banner_image_path);?>" alt="<?=$page->title;?>"/> 
     
      </figure>
  </section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active"><?=$page->title;?></li>
        </ol>
  </aside>
  
  
      
       <section class="about-block client-block cmsPage">
      <section class="aboutslidermain-block">
      <section class="container">
      <aside class="text">
	  <div class="product-title text-center titleStyle">		
				<h1><span><?= $page->page_name; ?></span></h1>
			</div>
      <?= $page->description; ?>
      </aside>
       </section>
      </section>
    </section>
     
  </section>
</section>