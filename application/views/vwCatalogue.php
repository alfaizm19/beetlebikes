<section class="wrapper-main">
<section class="inner-banner">
    <figure><img src="<?= base_url($page->banner_image_path); ?>" alt="<?= $page->title; ?>"/> 
     
      </figure>
  </section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url();?>">Home</a></li>
          <li class="active">Catalogues</li>
        </ol>
  </aside>
  
  
      
       <section class="disclaimer-block">
      <section class="container">
			
			<div class="product-title text-center titleStyle">		
			<h1><span>Catalogues</span></h1>
		</div>
			
			
       <section class="catalogues-content">
       <section class="catalogues-left">
        <figure><img src="<? echo base_url($page->catalogue_image); ?>" alt="<?= $page->title; ?>"></figure>
        <aside class="text">
        <?= $page->description; ?>
        </aside>
       </section>
       <section class="catalogues-right">
       <ul>
	   
                            <?
                            if (isset($catalogues)):
                                foreach ($catalogues as $key => $catalogue):
                                    ?>
       <a href="<? echo base_url($catalogue['catalogue_pdf']); ?>" download><li><figure><div><img src="<? echo base_url($catalogue['catalogue_image']); ?>" alt="<? echo $catalogue['catalogue']; ?>"><span class="pdf-icon2"></span><span class="pdf-icon"></span></div></figure>
                                            <p class="catalogues-para"><? echo $catalogue['catalogue']; ?></p>
                                        </li></a>      <?
                                endforeach;
                            endif;
                            ?>
       </ul>
       </section>
       </section>
      </section>
    </section>
     
  </section>
</section>


       