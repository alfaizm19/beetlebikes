<?
if (count($news_right) > 0 ) {
    ?>
<section class="col-sm-4 right-content">

          <section class="box blog-post-box">
           <h2 class="segoe-bold list">Recent News</h2>
            <ul class="list">
            <?
                foreach ($news_right as $key => $new_right_val):
                    ?>
              <li> <p> <a href="<? echo base_url('news/news-details/') . $new_right_val['blog_slug']; ?>"><? echo $this->common->GetshortString($new_right_val['blog_title'], 80); ?></a> </p>
                <p style="color: #666;font-size: 14px;font-family: Roboto Regular;letter-spacing: 0.5px; margin-top:10px;"> <? echo $this->common->GetshortString($new_right_val['description'], 85); ?> </p>
                <div class="meta-date"><? echo date('d M Y', strtotime($new_right_val['blog_date'])); ?></div>
              </li>
            <?
                endforeach;
                ?>
            </ul>
            <div class="read-more"><a href="<? echo base_url('news'); ?>">More News Posts</a></div>
          </section>

        </section>
<?
}
?>
