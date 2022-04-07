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
    <section class="disclaimer-block">
      <section class="container">
        <h1><span><?= $page->title; ?></span></h1>
        <p class="ptext"><?= $page->description; ?></p>
         <? if (!empty($projects)){ ?>
        <section class="projects-content">
        <section class="industries-content">
          <section class="row">
           <? foreach ($projects as $key => $projects_val): ?>  
            <section class="col-lg-4">
              <aside class="industries-list">
                <figure><img src="<? echo base_url($projects_val['project_image_thumb']); ?>" alt="<? echo $projects_val['project_title']; ?>"><span class="zoomicon" data-toggle="modal" data-target="#productid" data-id="<?=$key?>"></span></figure>
                <aside class="industries-main">
                  <aside class="industries-text">
                    <aside class="industries-te">
                      <p><? echo $projects_val['project_title']; ?></p>
                    <h4><? echo $projects_val['location']; ?></h4>
                    </aside>
                  </aside>
                </aside>
              </aside>
            </section>
            <? endforeach; ?>  
          </section>
        </section>
        </section>
         <? } else { ?> 
         <p class="text-center-no-products">Sorry,no project found.</p>
         <? } ?>
    </section>
  </section>
</section>
</section>    
<section class="modal fade product-popup" id="productid" role="dialog">
    <section class="modal-dialog modal-dialog-centered"> 
      
      <!-- Modal content-->
      <section class="modal-content">
       
        <section class="modal-body">
          <section class="product-name">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <ul>
              <? if (!empty($projects)){ ?>
              <? foreach ($projects as $key => $projects_val): ?>
              <li><img  src="<? echo base_url($projects_val['project_image']); ?>" alt="<? echo $projects_val['project_title']; ?>" >
              <h3><? echo $projects_val['project_title']; ?><span><? echo $projects_val['location']; ?></span></h3>
              </li>
              <? endforeach; 
              } ?>
            </ul>
          </section>
        
      </section>
    </section>
  </section>
</section>