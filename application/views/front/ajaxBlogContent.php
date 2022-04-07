<?php 
    if($allBlog) { 
?>
<?php 
    foreach ($allBlog as $allBlogKey => $allBlogValue) {
?>
<div class="col-md-4">
    <div class="blog-entry">
        <div style="height:220px; overflow: hidden;">
        <a href="<?php echo base_url().'blog/'.$allBlogValue['link'];?>">
        <img src="<?php echo base_url().$allBlogValue['image'];?>">
        </a>
        </div>
        <div class="blog-content">
            <a href="<?php echo base_url().'blog/'.$allBlogValue['link'];?>">
            <h3><?php echo $allBlogValue['title'];?></h3>
            </a>
            <p><?php echo substr($allBlogValue['description'], 0, 100); ?></p>
            <div class="view-blog">
             <a href="<?php echo base_url().'blog/'.$allBlogValue['link'];?>">Read More</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

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