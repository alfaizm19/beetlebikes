<section class="wrapper-main">
<section class="inner-banner">
    <figure> <img src="<? echo base_url().$page->banner_image_path; ?>" alt="<? echo ($page->title); ?>"/></figure>
</section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active"><?php echo $page->title; ?></li>
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
        <?
        if (isset($news) && count($news) > 0):
            foreach ($news as $new):
        ?>
          <article>
            <figure><img src="<? echo base_url($new['blog_image']); ?>" alt="<? echo ($new['image_caption']); ?>"></figure>
                <aside class="blogtext">
                <aside class="blogtextdate">
                <span><? echo date('d', strtotime($new['blog_date'])) ?></span>
                <p><? echo date('M', strtotime($new['blog_date'])) ?></p>
                </aside>
                <aside class="content">
                  <h3><a class="ref-custom" href="<? echo base_url('news/news-details/') . $new['blog_slug']; ?>"><?= $this->common->GetshortString($new['blog_title'], 135); ?></a></h3>
                <span class="mobile-hide">  <? echo $this->common->GetshortString(($new['description']), 275); ?> </span>
                  </aside>
                  </aside>
            <div class="read-more"><a href="<? echo base_url('news/news-details/') . $new['blog_slug']; ?>">Read More</a></div>
          </article>
        <? endforeach;
        else:
        echo " <p class='text-center textm mb-4 mr-4 blog_msg'>Sorry, no blog found</p>";
        endif; ?>
          <aside class="clearfix"></aside>
          <div class="pagination">
          <ul>
            <? echo $links; ?>
            </ul> </div>
        </section>

        <!-- Sidebar -->
        <? $this->load->view('partials/_right_news'); ?>
        <!-- End Sidebar --> </div>
         </aside>
        </section>
      </section>
    </section>
  </section>
</section>
