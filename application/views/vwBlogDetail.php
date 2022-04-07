<?php 
  $bannerImg = '';

  if (!empty($blog_detail->blog_image)) {
    $bannerImg = 'style="background-image: url('.base_url($blog_detail->blog_image).');"';
  }
?>
<div class="breadcrumb_content blog_breadcrumb" <?= $bannerImg ?>>
  <h5><?php echo $blog_detail->blog_title ; ?></h5>
  <div><span><?php echo date('F d, Y', strtotime($blog_detail->blog_date)) ?></span><span>In <?php echo $blog_detail->category_name ?>  <?= !empty($comments)? count($comments):0; ?> comments</span></div>
</div>


<div class="blog_container blog_detail_container">
<div class="container container_2">
  <div class="row">
    <div class="col-md-9"><div class="blog_left">
      <?php

echo $blog_detail->description ;

      ?>
      <ul class="ps-0 d-flex align-items-center list-inline blog_social justify-content-center mt-md-4 pt-md-5 pb-md-0 pb-2">
        <li><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo current_url() ?>"><i class="fa fa-facebook"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo current_url() ?>"><i class="fa fa-twitter"></i></a></li>
        <li><a target="_blank" href="mailto:?subject=Check this <?php echo current_url() ?>"><i class="fa fa-envelope"></i></a></li>
        <li><a target="_blank" href="https://www.pinterest.com/pin/create/button/?url=<?php echo current_url() ?>"><i class="fa fa-pinterest"></i></a></li>
      </ul>
    </div></div>
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
            <h5><a href="<?php echo base_url('blogs/').$value['blog_slug'] ?>"><?php echo $value['blog_title']; ?></a></h5>
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
  <div class="row">
    <div class="col-md-12">
      <div class="comment_section">
        <h2>User Comments</h2>
      </div>
      <div class="commentblog_form">
        <div class="commentblog_form_content">
          <div class="d-flex justify-content-between">
            <span><?= $total_comments ?> Comments Available</span>
            <span>Write a Comment</span>
          </div>

          <div id="appendComments">

          <?php 
            if (!empty($comments)):
              foreach($comments as $comm):
          ?>
            
          <div class="comment_list">
            <h5><?php echo $comm->name ?></h5>
            <p class="mb-2">
              <?php echo $comm->title ?>
            </p>
            <label><?php echo $comm->comment ?></label> 
          </div>

          <?php endforeach; endif ?>

          </div>
          
          <a href="javascript:void(0)" data-id="<?= $blog_detail->id ?>"  data-limit="3" data-total="<?php echo $total_comments ?>" data-offset="3" class="readmore_link read_more_comment" <?php echo $total_comments>0? '':'style="display:none"'; ?>>Read More Comments</a>

          <?php 
            $userSess = $this->session->userdata('user_sess');
            if (!empty($userSess)):
              $userData = user_info($userSess["userId"]);
          ?>
          <form id="comment" class="comment_frm common-form">

            <div id="resetFinalError">
            </div>

            <h4>LEAVE A REPLY</h4>
            <span>Logged in as <?= $userData->first_name.' '.$userData->last_name ?> <a href="<?php echo base_url('logout') ?>">Log Out?</a></span>
            <p>
              <label>Comment Title<span class="required">*</span></label>
              <input type="text" name="title" class="form-control titleErr removeErr">
            </p>
            <p>
              <label>Body of the Comment (1500)<span class="required">*</span></label>
              <textarea name="comment" class="form-control commentErr removeErr"></textarea>
            </p>

            <p>
              <div class="captcha_blk">
                <div class="form-group">
                  <div class="g-recaptcha g-recaptcha-responseErr removeErr" data-sitekey="<?php echo captcha_site_key ?>"></div>
                </div>
              </div>
            </p>
            
            <input type="hidden" name="id" value="<?= $blog_detail->id ?>">


            <p><button id="btnSubmit" type="submit" class="btn-default">Submit comment</button></p>
          </form>
          <?php else: ?>
          <form id="comment" class="comment_frm common-form">

            <div id="resetFinalError">
            </div>

            <p>
              <label>Name<span class="required">*</span></label>
              <input type="text" name="name" class="form-control nameErr removeErr">
            </p>
            <p>
              <label>Email<span class="required">*</span></label>
              <input type="text" name="email" class="form-control nameErr removeErr">
            </p>
            <p>
              <label>Comment Title<span class="required">*</span></label>
              <input type="text" name="title" class="form-control titleErr removeErr">
            </p>
            <p>
              <label>Body of the Comment (1500)<span class="required">*</span></label>
              <textarea maxlength="1500" name="comment" class="form-control commentErr removeErr"></textarea>
            </p>  

            <p>
              <div class="captcha_blk">
                <div class="form-group">
                  <div class="g-recaptcha g-recaptcha-responseErr removeErr" data-sitekey="<?php echo captcha_site_key ?>"></div>
                </div>
              </div>
            </p>

            <input type="hidden" name="id" value="<?= $blog_detail->id ?>">
            <p><button id="btnSubmit" type="submit" class="btn-default">Submit comment</button></p>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>    
</div>
</div>