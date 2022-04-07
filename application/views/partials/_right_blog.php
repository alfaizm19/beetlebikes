<?
if (count($blog_right) > 0 && count($blog_categories) > 0) {
    ?>
<section class="col-sm-4 right-content">

          <section class="box blog-post-box">
           <h2 class="segoe-bold list">Recent Posts</h2>
            <ul class="list">
            <?
                foreach ($blog_right as $key => $blog_right_val):
                    ?>
              <li> <p> <a href="<? echo base_url('blog/blog-details/') . $blog_right_val['blog_slug']; ?>"><? echo $this->common->GetshortString($blog_right_val['blog_title'], 80); ?></a> </p>
                <p style="color: #666;font-size: 15px; font-family:'Roboto Regular'; letter-spacing: 0.5px; margin-top:10px;"> <? echo $this->common->GetshortString($blog_right_val['description'], 80); ?> </p>
                <div class="meta-date"><? echo date('d M Y', strtotime($blog_right_val['blog_date'])) . ' / ' . ucfirst($blog_right_val['category_name']); ?></div>
              </li>
            <?
                endforeach;
                ?>
            </ul>
            <div class="read-more"><a href="<? echo base_url('blog'); ?>">More Blog Posts</a></div>
          </section>
           <aside class="detail-list">
          <h2>Blog Categories</h2>
          <ul>
        <?
        if (isset($blog_categories)):
            foreach ($blog_categories as $key => $category):
        ?>
          <li><a href="<? echo base_url('blog/blog-category/') . $category['blog_category_id']; ?>"><? echo $category['category_name']; ?><span> <? echo '(' . $category['total_blog_cate'] . ')'; ?></span></a></li>
        <?
            endforeach;
        endif;
        ?>
        </ul>
          </aside>
           <aside class="tags-list">
          <h2>Tags</h2>
          <ul>
        <?
        if (isset($tags)):
            foreach ($tags as $key => $tags_val):
        ?>
          <li><a href="<? echo base_url('blog/tag/') . $tags_val['tag_url']; ?>"><? echo $tags_val['tag_name']; ?></a></li>
        <?
            endforeach;
        endif;
        ?>
          </ul>
          </aside>
        </section>
<?
}
?>
