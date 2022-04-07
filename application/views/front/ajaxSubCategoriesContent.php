<div class="row">
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="grid-view">
            <?php 
                if($allCategories) { 
                    foreach ($allCategories as $allCategoriesKey => $allCategoriesValue) {
            ?>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-product text-center">
                    <div class="single-product-inner">
                        <div class="product-img">
                           <a href="<?php echo base_url().'category/'.$allCategoriesValue['slug'];?>"><img src="<?php echo base_url().$allCategoriesValue['category_image']; ?>" alt=""></a>
                        </div>
                        <div class="product-details">
                            <h3>
                                <a href="<?php echo base_url().'category/'.$allCategoriesValue['slug'];?>"><?php echo $allCategoriesValue['category']; ?></a>
                            </h3>
                           
                        </div>
                    </div>
                </div>
            </div>
             <?php 
                    }
                }   else {
                        echo 'Not Found';
                    } 
            ?>

        </div>
        <div role="tabpanel" class="tab-pane" id="list-view">
           <?php 
                if($allCategories) { 
                    foreach ($allCategories as $allCategoriesKey => $allCategoriesValue) {
            ?>
            <div class="col-md-12 col-sm-12 col-xs-12 product-list">
                <div class="row">
                    <div class="col-md-4">
                        <div class="product-img">
                            <a href="<?php echo base_url().'category/'.$allCategoriesValue['slug'];?>"><img src="<?php echo base_url().$allCategoriesValue['category_image']; ?>" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="product-details">
                            <h3>
                                <a href="<?php echo base_url().'category/'.$allCategoriesValue['slug'];?>"><?php echo $allCategoriesValue['category']; ?></a>
                            </h3>
                           
                            <div class="producut-desc">
                                <p><?php echo $allCategoriesValue['content']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <?php 
                    }
                }   else {
                        echo 'Not Found';
                    } 
            ?>
        </div>
    </div>
</div>
<?php 
    if($allCategories) { 
?>
<div class="pagination-box">
    <div class="row">
        <div class="col-md-12">
            <div class="pagination-inner">
                <?php echo $links; ?>               
            </div>            
        </div>
    </div>
</div>
<?php } ?>