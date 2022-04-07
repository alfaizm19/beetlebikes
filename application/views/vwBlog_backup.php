<section class="wrapper-main">
<section class="inner-banner">
    <figure> <img src="<? echo base_url().$page->banner_image_path; ?>" alt="<? echo ($page->title); ?>"/></figure>
</section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active">Blog</li>
        </ol>
  </aside>
  
  <section class="blogwrapper-block">
      <section class="container">
      <h1><span><? echo ($page->title); ?></span></h1>
        <section class="news-content">
          <aside class="col12 news blog-page">
      <div class="row">
        <section class="col-sm-8">
        <?
        if (isset($blogs) && count($blogs) > 0):
            foreach ($blogs as $blog):
        ?>
          <article>
            <figure><img src="<? echo base_url($blog['blog_image']); ?>" alt="<? echo ($blog['image_caption']); ?>"></figure>
                <aside class="blogtext">
                <aside class="blogtextdate">
                <span><? echo date('d', strtotime($blog['blog_date'])) ?></span>
                <p><? echo date('M', strtotime($blog['blog_date'])) ?></p>
                </aside>
                <aside class="content">
                  <h3><?= $this->common->GetshortString($blog['blog_title'], 135); ?></h3>
                  <? echo $this->common->GetshortString(($blog['description']), 245); ?>
                  </aside>
                  </aside>
            <div class="read-more"><a href="<? echo base_url('blog/blog-details/') . $blog['blog_slug']; ?>">Read More</a></div>
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
        <? $this->load->view('partials/_right_blog'); ?>
        <!-- End Sidebar --> </div>
         </aside>
        </section>
      </section>
    </section>
  </section>
</section>