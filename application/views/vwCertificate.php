<section class="wrapper-main">
<section class="inner-banner">
    <figure> <img src="<?= base_url($page->banner_image_path); ?>" alt=""/>

      </figure>
  </section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url();?>">Home</a></li>
          <li class="active">Certifications</li>
        </ol>
  </aside>



    <section class="disclaimer-block">
		<section class="container">
			<aside class="text">
	  <div class="product-title text-center titleStyle">
				<!--<h1><span><?= $page->page_name; ?></span></h1>-->
				<h1><span>Certifications</h1>
			</div>
      <p><?= $page->description; ?></p>
      </aside>



       <section class="certificate-content">
			<section class="certificate-block">
			<ul>
			<?
                            if (isset($certificates)):
                                foreach ($certificates as $key => $certificate):
                                    ?>
			   <li style="border-bottom: 0px !important;"><p><? echo $certificate['name']; ?></p>
			   <figure><div><a class="btn" href="<? echo base_url($certificate['image']); ?>" data-lity><img src="<? echo base_url($certificate['image']); ?>" alt="" ><span class="pdf-icon2"></span></a></div></figure>
			   <div class="certificate-block-below-para"><?=  $certificate['description']?></div>
			   </li>
			   <?
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
