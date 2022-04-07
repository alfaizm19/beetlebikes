 
  <div id="blog_slider">
    <div class="owl-carousel owl-theme">

<?php 


foreach ($slider_blog as $key => $value) {
  
  if (!empty($value['blog_crop_image'])) {
    $img = $value['blog_crop_image'];
  } else {
    $img = $value['blog_image'];
  }

?>

<a href="<?php echo base_url('blogs/'.$value["blog_slug"]) ?>">
  <div class="item" style="background-image: url(<?php echo base_url($img); ?>);">
    <div class="blog_hover">
      <span>By <?php echo $value['blog_author']; ?>&nbsp;&nbsp;&nbsp;<?php echo count_comment($value['id']) ?> comments</span>
      <h5 class="text-uppercase"><?php echo $value['blog_title']; ?></h5>
      <p><?php echo date('F d, Y', strtotime($value['blog_date'])) ?>
      </p>
    </div>
  </div>
</a>


<?php

}


?>
    </div>
  </div>

  <div class="blog_container">
  <div class="container container_2">
    <div class="row">
      <div class="col-md-9">
        <div class="blog_list">
          <ul class="ps-0">
            <?php

              foreach ($main_blog as $key => $value) {

                  if (!empty($value['blog_crop_image'])) {
                    $img = $value['blog_crop_image'];
                  } else {
                    $img = $value['blog_image'];
                  }

              ?>

            <li>
              <a style="text-decoration: none;color: unset;" href="<?php echo base_url('blogs/'.$value['blog_slug']) ?>">
              <div class="blog_bg" style="background-image: url(<?php echo base_url($img); ?>);">
                  <div class="blog_hover">
                    <span>By <?php echo $value['blog_author']; ?>  <?php echo count_comment($value['id']) ?> comments</span>
                    <h5 class="text-uppercase"><?php echo $value['blog_title']; ?></h5>
                     <p><?php echo date('F d, Y', strtotime($value['blog_date'])) ?>
                     </p>
                  </div>
                </div>
                </a>
                <div class="blog_content">
                  <?php if (strlen(strip_tags($value['description'])) >= 350): ?>
                    <p><?php echo substr(strip_tags($value['description']), 0, 290).'...'; ?></p>
                  <?php else: ?>
                    <p><?php echo strip_tags($value['description']); ?></p>
                  <?php endif ?>
                  <p class="mb-0"><a href="<?php echo base_url('blogs/'.$value['blog_slug']) ?>" class="btn-readmore">Read More</a></p>
                </div>
              </li>



              <?php
              }

            ?>

          </ul>
          <?php if (!empty($links)): ?>
          <nav class="pagination_content">
            <ul class="pagination-page page-numbers ps-0 d-flex align-items-center justify-content-center mb-3"> 
              <?php echo $links; ?>
              <!-- <li class="disabled" style="display:none"><span class="pagicon arrow_left"></span></li> 
              <li><span class="page-numbers current">1</span></li> 
              <li><a class="page-numbers">2</a> </li> 
              <li><a class="page-numbers">3</a> </li> 
              <li><span>...</span></li> 
              <li><a class="page-numbers">8</a> </li> 
              <li><a class="next page-numbers">Next</a></li>  -->
            </ul>
          </nav>
          <?php endif ?>
        </div>
      </div>
      <div class="col-md-3">
        <div class="sidebar_list">
          <h3 class="sidebar_heading">
            Categories
          </h3>
          <ul class="category_list">




            
            <?php

            foreach ($right_side_categories as $key => $value) {
            
              ?>

              <li><a href="<?php echo base_url('blogs-category/'.$value['blog_category_id']); ?>"><?php echo $value['category_name']; ?> (<?php echo $value['total_blog_cate']; ?>)</a></li>

              <?php

            }

            ?>
            
           
          </ul>
        </div>
        <?php 
          $feed = $this->Master_model->get_insta_feed();
          if(isset($feed->data) && !empty($feed->data)):
        ?>
        <div class="sidebar_list">
          <h3 class="sidebar_heading">
            Instagram
          </h3>
          <div class="instagram_list">
            <div class="row">
              <?php 
                  $data = $feed->data;
                  $i=1;
                  foreach($data as $fData):
                    $url = $fData->media_url;
                    if($i <= 15):
                    if($fData->media_type == 'IMAGE' OR 
                      $fData->media_type == 'CAROUSEL_ALBUM'):
              ?>
                <div class="col-4 pe-0">
                  <a target="_blank" href="<?php echo $fData->permalink ?>"><img src="<?php echo $fData->media_url ?>" class="w-100"></a>
                </div>
              <?php endif; $i++; endif; endforeach; ?>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="sidebar_list">
          <h3 class="sidebar_heading">
            Recent post
          </h3>
          <ul class="recent_post_list ps-0 list-inline">

            <?php

            foreach ($recent_post_blog as $key => $value) {
              
              ?>

            <li>
              <h5><a href="<?php echo base_url('blogs/'.$value['blog_slug']) ?>"><?php echo $value['blog_title']; ?></a></h5>
              <p class="mb-0"><?php $date =  DateTime::createFromFormat('Y-d-m',$value['blog_date'] );


            echo $date->format('M d, Y');


             ?></p>
              <span></span>
            </li>


            <?php

            }

            ?>

           
        </div>                
      </div>
    </div>
  </div>
  </div>