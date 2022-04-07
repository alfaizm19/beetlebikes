 <div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li><?php echo $blogDetails['title']; ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--breadcrumbs-area end -->
<div class="elements">
    <div class="typhography text-left">
        <div class="container">
            <div class="row blog-block">
                <div class="col-md-8 blog-cont">
                    <div class="blog-top-image">
                        <img src="<?php echo base_url().$blogDetails['image'];?>">
                    </div>
                   
                    <h1><?php echo $blogDetails['title']; ?></h1>

                    <div style="margin-top:15px;margin-bottom: 15px;">
                        <span><strong>Date:</strong> <?php echo $blogDetails['date']; ?></span>
                        <span><strong>Posted by:</strong> <?php echo $blogDetails['author_name']; ?></span>
                    </div>
                    
                    <div class="post-text">
                        <?php echo $blogDetails['description']; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="post-side">
                    <h2>Latest Articles</h2>
                        <?php if($recentBlogs) { ?>
                            <?php 
                                foreach ($recentBlogs as $recentBlogsKey => $recentBlogsValue) {                       
                            ?>
                                <h4><a href="<?php echo base_url().'blog/'.$recentBlogsValue['link'];?>"><?php echo $recentBlogsValue['title']; ?></a></h4>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>     
        </div>
    </div>
</div>    
<!--elements end--> 
