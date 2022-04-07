<section class="wrapper-main">
<section class="inner-banner">
    <figure> <img src="<?=base_url().$page->banner_image_path;?>" alt="<?=$page->title?>"/>

      </figure>
  </section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active"><? echo ($page->title); ?></li>
        </ol>
  </aside>

  <section class="blogwrapper-block">
      <section class="container">


	   <div class="product-title text-center titleStyle">
			 <h1><span><? echo ($page->title); ?></span></h1>
		</div>



        <section class="news-content">
          <aside class="col12 news blog-page">
      <div class="row">
        <section class="col-sm-8">
                <article>
                  <h2 class="entry-title"> <? echo ($blog_detail->blog_title); ?> </h2>
                  <div class="meta-date"><? echo date('d M Y', strtotime($blog_detail->blog_date)) . ' / ' . ucfirst($blog_detail->category_name); ?></div>
                  <div class="meta-date-area">
                  <div class="meta-author mt-3">Author: <? echo ucfirst($blog_detail->blog_author); ?></div>
                  <div class="like-share">
                    <?php
                        $like_active_image = HTTP_ASSETS_PATH_CLIENT."images/icon-like-01.png";
                        if($blog_detail->ip_address != NULL && $blog_detail->ip_address != "" ){
                            $like_active_image = HTTP_ASSETS_PATH_CLIENT."images/add_like.png";
                        }
                    ?><div class="blog-like">
                        <span class="icon like_<?=$blog_detail->id?>" onclick="blog_like(<?=$blog_detail->id?>,<?=$blog_detail->likes?>);" style="cursor: pointer;">
                        <img src="<?=$like_active_image?>"  alt="<?=$blog_detail->blog_title?>" class="blog_like_<?=$blog_detail->id?>"/>
                        </span> &nbsp;<span id="like_<?=$blog_detail->id?>" class="like_count_<?=$blog_detail->id?>">Like&nbsp;(<?=$blog_detail->likes; ?>)</span>
                        </div>
                        <a href="javascript:void(0);" class="st_sharethis_large" st_image="<?=base_url().$blog_detail->blog_image?>">
                        <img src="<?=HTTP_ASSETS_PATH_CLIENT?>images/icon-share.png" alt="<?php echo $blog_detail->blog_title ?>" class="stButton" st_processed="yes">
                        <span class="st_sharethis_large" st_processed="yes">Share</span></a>
                    </div>
                  </div>
                  <div class="thumb blogslider">
                    <?
                    $results = get_all_blog_media_front($blog_detail->id);
                        if (isset($results) && !empty($results)):
                    ?>
                    <? foreach ($results as $result_val) { ?>
                        <? if ($result_val['blog_media_type_id'] == "1"): ?>
                        <div class="item-img">
                        <figure><img src="<? echo base_url() . $result_val['image_path']; ?>" alt="<? echo $result_val['caption']; ?>"/></figure>
                        </div>
                    <? endif; ?>
                    <? if ($result_val['blog_media_type_id'] == "2"): ?>
                        <figure><div class="item-video iframe">
                        <? echo $result_val["video_link"]; ?>
                        </div></figure>
                    <? endif; ?>
                    <? if ($result_val['blog_media_type_id'] == "3"): ?>
                        <figure><div class="item-video">
                        <video width="100%" src="<?= base_url() . $result_val["video_file"] ?>" controls ></video>
                        </div></figure>
                    <? endif; ?>
                    <? } ?>
                    <? else:
                    ?>
                    <figure><img src ="<? echo base_url($blog_detail->blog_image); ?>" alt = "<? echo ($blog_detail->image_caption); ?>"/></figure>
                    <?
                        endif;
                    ?>
                  </div>
                  <div class="entry-content">
                    <? echo ($blog_detail->description);?>
                  </div>
                </article>
                <section class="tag"> <div class="row"> <div class="col-sm-12">
                <?php foreach ($blog_tag as $key => $value) { ?>
                <a href="<?php echo base_url('blog/tag/') . $value->tag_url; ?>"> <span class="label label-primary"><?php echo $value->tag_name; ?></span> </a>
                <?php } ?>
                </section>
                <div class="pagination">
                  <ul>
                  <?php if (!empty($prev_blog_url)): ?>
              <li><a href="<? if(count((array)$prev_blog_url) > 0 && $prev_blog_url->blog_slug != ""){ echo $prev_blog_url->blog_slug;} else { echo "javascript:void(0);";}?>"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span>Previous</a></li>
            <?php endif; ?>
            <?php if (!empty($next_blog_url) > 0): ?>
              <li class="float-right"><a href="<? if(count((array)$next_blog_url) > 0 && $next_blog_url->blog_slug != ""){ echo $next_blog_url->blog_slug;} else { echo "javascript:void(0);";}?>" >Next<span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
            <?php endif; ?>
                </ul>
            </div>
              </section>
        <!-- Sidebar -->
        <? $this->load->view('partials/_right_blog'); ?>
        <!-- End Sidebar --> </div>
         </aside>
        </section>
      </section>
    </section>
  </section>
</section>
