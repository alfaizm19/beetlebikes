<section class="wrapper-main">
<section class="inner-banner">
  <figure> <img src="<?= base_url($page->banner_image_path); ?>" alt=" <?= $page->title; ?>"/> </figure>
</section>
<section class="inner-wrapper">
  <aside class="breadcrumb-main">
    <ol class="breadcrumb">
      <li><a href="<?=base_url();?>">Home</a></li>
      <li class="active"><?= $page->title; ?></li>
    </ol>
  </aside>
  <section class="disclaimer-block">
    <section class="container">
      <h1><span><?= $page->title; ?></span></h1>
      <p class="ptext"><?= $page->description; ?></p>
          <? if (!empty($brands)){ ?>
      <section class="produccts-content">
        <section class="row">
            
        <? foreach ($brands as $key => $brand_val): ?>  
          <section class="col-lg-3">
              <? 
                $disableed = "not-active";
                $link = "JavaScript:Void(0)";
              if($brand_val['image']!=""){
                  $disableed = "";
                 $link = base_url().$brand_val['brand_slug'];
              }?>
            <section class="industries-list1"> <a href="<? echo $link; ?>" class="<?=$disableed ?>" >
              <aside class="industries-list">
                <figure class="first">
                  <aside class="industries-img"><img src="<? echo base_url($brand_val['logo']); ?>" alt="<? echo $brand_val['name']; ?>"></aside>
                  <!--<label class="new"></label>-->
                </figure>
                <?  if($brand_val['image']!=""){ ?>  
                <aside class="industries-main">
                  <figure><img src="<? echo base_url($brand_val['roll_over_logo']); ?>" alt="<? echo $brand_val['name']; ?>"></figure>
                  <aside class="industries-text">
                    <aside class="industries-te">
                      <p> View Products</p>
                    </aside>
                  </aside>
                </aside>
                <? } ?>  
              </aside>
              <span><? echo $brand_val['name']; ?></span> </a> </section>
          </section>
         <?  endforeach; ?>   
        </section>
      </section>
          <? } else { ?>
               <p class="text-center-no-products">Sorry,no brands & products found.</p>
          <? } ?>
    </section>
  </section>
</section>
</section>