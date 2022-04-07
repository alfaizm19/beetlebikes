<section class="wrapper-main">
    <section class="inner-banner">
        <figure> <img src="<?= base_url($brand->banner_image); ?>" alt="<?= $brand->name; ?>"/> </figure>
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
                <h1><span><?= $brand->name; ?></span></h1>
                <? if(!empty($brand->short_description)){ ?>
                    <br/><p class="text-center"><?=$brand->short_description?></p>
                <? } ?>
                <section class="producctdetails-content">
                    <section class="row ">
                        <aside class="col-lg-3 leftmenumain">
                             <? if (!empty($categories)): ?>
                            <aside class="leftmenus">
                                <aside class="leftmenus-list active">
                                    <h3><a href="javascript:;">CATEGORIES</a></h3>
                                        <aside class="leftmenussup">
                                            <ul>
                                                <? foreach ($categories as $key => $category): ?>  
                                                    <li><a onClick="filterProduct(<?= $category['id'] ?>,<?= $category['brand_id'] ?>);" id="category_<?=$category['id'];?>" href="javascript:;"><? echo $category['name'] ?></a></li>
                                                <? endforeach; ?>
                                            </ul>
                                        </aside>
                                </aside>
                            </aside>
                             <? endif; ?>
                        <!-- <a href="javascript:;" class="pbtn branddescription">Brand Description</a> -->
                        <a href="javascript:;" class="pbtn brandcertificates">Brand Certificates</a>
                        </aside>
                        <section class="col-lg-9">
                            <section class="row">
                                <div class="col-lg-12">
                                 
                                <section class="col-lg-12 productFilter">
                                <? if (!empty($products)) {
                                    foreach ($products as $key => $products):
                                        ?>
                                        <section class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                            <section class="industries-list1">
                                                <aside class="industries-list">
                                                    <figure class="first">
                                                        <aside class="industries-img"><img src="<? echo base_url($products['image']); ?>" alt="<? echo $products['name']; ?>"></aside>
                                                    </figure>
                                                    <? 
                                                    if($products['is_new_product'] == 1 && $products['start_date'] <= date('Y-m-d') && $products['end_date'] >= date('Y-m-d') ){?>
                                                    <label class="new"></label>
                                                    <? } ?>
                                                    <aside class="industries-main">
                                                        <aside class="industries-text">
                                                            <aside class="industries-te">
                                                            <? echo $this->common->GetshortString(($products['description']), 235); ?>
                                                            </aside>
                                                        </aside>
                                                    </aside>
                                                </aside>
                                                <span><? echo $products['name']; ?></span> </section>
                                        </section>
                                    <? endforeach; ?>
                                <? } else { ?>
                                      <p class="text-center-no-products">Sorry,no product found.</p>
                                <? } ?> 
                           </section></div>
                                <section class="col-lg-12 btmgroups">
                                    <a href="<?php echo base_url($brand->catalogue_pdf); ?>" download class="down2">Download Catalogue</a>
                                    <a href="<?=base_url('contact-us');?>" class="down3">Enquire Now</a>
                                </section>
                                <section class="col-lg-12 producttext">
                                    <? if($brand->description): ?>
                                    <h3>Product Description</h3>
                                    <?= $brand->description ?>
                                    <? endif; ?>
                                    <h3 class="brandcertificatesmain">Brand Certificates</h3>
                                    <ul>
                                        <?
                                        $certificate = explode(',', $brand->certification);
                                        foreach ($certificates as $key => $certificates_val):

                                            if (in_array($certificates_val['id'], $certificate)) {
                                                ?>
                                                <li><img src="<? echo base_url($certificates_val['image']); ?>" alt="<? echo $certificates_val['name']; ?>"></li>
                                                <?
                                            }
                                        endforeach;
                                        ?>
                                    </ul>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>