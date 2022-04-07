<section class="wrapper-main">
  <section class="inner-banner">
    <figure> <img src="<?= base_url($page->banner_image_path); ?>" alt=""/> </figure>
  </section>
  <section class="inner-wrapper">
    <aside class="breadcrumb-main">
      <ol class="breadcrumb">
        <li><a href="<?=base_url();?>">Home</a></li>
        <li class="active"><?= $page->title; ?></li>
      </ol>
    </aside>
    <section class="about-block client-block">
      <section class="aboutslidermain-block">
      <section class="container">
      <aside class="text">
	  <div class="product-title text-center titleStyle">
				<h1><span><?= $page->title; ?></span></h1>
			</div>
      <p><?= $page->description; ?></p>
      </aside>
      <aside class="clientslider">
				<div class="col-md-12">
					<!--div class="logos">
					<?
                           // if (isset($clients)):
                              //  foreach ($clients as $key => $client):
                                    ?>

							<img src="<--? echo base_url($client['logo']); ?>" alt="" class="img-repsonsive">
					<?
                               // endforeach;
                           // endif;
                            ?>
						</div-->



						<ul>
						 <?
						if (isset($clients)):
							foreach ($clients as $key => $client_val):
								?>
						 <li>
						 <aside class="sliderimg">
						 <figure><img src="<? echo base_url($client_val['logo']); ?>" alt="<? echo $client_val['name']; ?>"></figure>
						 </aside>
						 </li>
						<?
							endforeach;
						endif;
						?>
						 </ul>



					</div>


      </aside>
      </section>
      </section>
    </section>
  </section>
</section>
