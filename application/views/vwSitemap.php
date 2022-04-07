<section class="wrapper-main">
<section class="inner-banner">
    <figure> <img src="<?=base_url($page->banner_image_path);?>" alt="<?=$page->title;?>"/>

      </figure>
  </section>
  <section class="inner-wrapper">
  <aside class="breadcrumb-main">
   <ol class="breadcrumb">
          <li><a href="<?=base_url()?>">Home</a></li>
          <li class="active"><?=$page->title;?></li>
        </ol>
  </aside>



  <section id="categories_section" class="productListPage clearfix">
   <div class="container text-center">
     <div class="product-title text-center titleStyle">
       <h1><span>Sitemap</span></h1>
     </div>

     <!-- Product List Row Starts Here -->
<script type="text/javascript">
 $(document).ready(function() {
   $("#menu ul").hide();

   $("#menu > li > a").click(function() {

     $("#menu ul:visible").slideUp("normal");
     $(this).find('span').removeClass('expanded').addClass('collapsed');
     $("#menu > li > a").find('span').removeClass('expanded').addClass('collapsed');

     if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
       $(this).next().slideDown("normal");
       $(this).find('span').addClass('expanded').removeClass('collapsed');
     }
     if (($(this).next().is("ul")) && ($(this).next().is(":visible"))) {
         $("#menu > li > ul > li > a").find('span').removeClass('expanded').addClass('collapsed');
     }
   });
   $("#menu > li > ul > li > a").click(function() {

     $("#menu > li > ul > li > ul:visible").slideUp("normal");
     $(this).find('span').removeClass('expanded').addClass('collapsed');
     $("#menu > li > ul > li > a").find('span').removeClass('expanded').addClass('collapsed');

     if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
       $(this).next().slideDown("normal");
       $(this).find('span').addClass('expanded').removeClass('collapsed');
     }
     if (($(this).next().is("ul")) && (!$(this).next().is(":visible"))) {
         $("#menu > li > ul > li > a").find('span').removeClass('expanded').addClass('collapsed');
     }
   });
 });

</script>
     <div class="sitemap_cont">
       <div class="row">
         <div class="smap_lst">
           <ul id="menu">
             <li><a href="<? echo base_url('home/sitehome'); ?>">Home</a></li>
             <li><a href="<? echo base_url('about-us'); ?>">Company</a></li>
             <li><a href="javascript:void(0);"><span class="collapsed"></span> Product</a>
               <ul>
        					<?php

   						foreach ($menus as $menu)
   						{
   						?>
   						<li><a href="<?php echo (!empty($menu->subs)) ? "javascript:;" : base_url()."category/".$menu->url; ?>"><?php echo (!empty($menu->subs) ? '<span class="collapsed"></span>' : ''); ?><?php echo $menu->name; ?></a>
   						<?php
   						if(!empty($menu->subs)) {
                 echo '<ul>';
           				foreach ($menu->subs as $sub)  {
   									$subUrl = (!empty($sub->secondsubs)) ? "javascript:;" : "category/".$sub->url;
   									if($subUrl == "javascript:;")
   									{
   										echo '<li><a href="'.$subUrl.'"> '.(!empty($sub->secondsubs) ? '<span class="collapsed"></span>' : '').$sub->sub_category_name . '</a>';
   									}
   									else
   									{
   										echo '<li><a href="'.base_url().$subUrl.'"> '. $sub->sub_category_name . '</a>';
   									}
   												if(!empty($sub->secondsubs)) {
   													echo '<ul>';
   										foreach ($sub->secondsubs as $secondsub)  {
   												echo '<li><a href="'.base_url()."category/".$secondsub->url.'">' . $secondsub->second_sub_category_name . '</a></li>';
   											}
   												echo '</ul>';
   										}
   										echo '</li>';
   									}
               	echo '</ul>';
   						}
   						?>

   						</li>
   						<?php
   						}
   						?>
   					</ul>
             </li>
             <li><a href="<? echo base_url('catalogue'); ?>">2020 Catalogues</a></li>
             <li><a href="<? echo base_url('clients'); ?>">Clients</a></li>
             <li><a href="<? echo base_url('certificate'); ?>">Certifications</a></li>
             <li><a href="<? echo base_url('news'); ?>">News</a></li>
             <li><a href="<? echo base_url('reviews'); ?>">Reviews</a></li>
             <li><a href="<? echo base_url('contact_us'); ?>">Contact Us</a></li>
             <li><a href="<? echo base_url('blog'); ?>">Blog</a></li>
             <li><a href="<? echo base_url('career'); ?>">Careers</a></li>
             <li><a href="<? echo base_url('catalogue'); ?>">Download Catalogue</a></li>
             <li><a href="<? echo base_url('complaints'); ?>">Complaints & feedback</a></li>
             <li><a href="<? echo base_url('disclaimer'); ?>">Disclaimer</a></li>
             <li><a href="<? echo base_url('refund'); ?>">Refund Policy</a></li>
             <li><a href="<? echo base_url('term'); ?>">Terms & Condition</a></li>
             <li><a href="<? echo base_url('delivery'); ?>">Delivery info</a></li>
             <li><a href="<? echo base_url('faq'); ?>">FAQ</a></li>
             <li><a href="<? echo base_url('contact_us'); ?>">Enquiry</a></li>
           </ul>
         </div>
       </div>

     </div>
     <!-- Product List Row Ends Here -->

   </div>
 </section>

  </section>
</section>
