<div id="carouselExampleIndicators" class="carousel slide homeSlider " data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
				$bannerCount = 1;
				foreach($banners as $banner)
				{
			?>
					<li data-target="#carouselExampleIndicators" data-slide-to="0" <?php if($bannerCount == 1) { ?>class="active"<?php } ?>><span><?=$bannerCount?></span></li>
			<?php
					$bannerCount++;
				}
			?>
		</ol>
		<div class="carousel-inner" role="listbox">
				<?
            if (!empty($banners)):
								$bannerCount = 0;
                foreach ($banners as $banner):
									$active = ($bannerCount == 0) ? "active" : "";
			  ?>
		  <div class="carousel-item <?= $active; ?>" style="background-image: url('<? echo base_url($banner['banner_image']); ?>')">
				<div class="carousel-caption banner_text">
				<div class="boxborder"></div>
				<p class="lead"><?= substr($banner['banner_title'],0,60) ?></p>
				<h2 class="lead2"><?= $banner['description'] ?></h2>
				<div class="slider-content-btn">
					<a class="btn11" href="<?=$banner["external_link"]?>"><?= $banner['button_text']; ?><div class="transition"></div></a>
				</div>
				</div>
		    </div>
		        <?
							$bannerCount++;
                endforeach;
            endif;
			?>
			</div>
	</div>

	<section id="categories_section" class="clearfix">
		<div class="container text-center">
			<div class="product-title text-center titleStyle">
				<h2><span>
					<?php
						foreach($allPages as $page)
						{
							if($page['id'] == '14')
							{
								echo $page['title'];
							}
						}
					?>
				</span></h2>
			</div>

			<ul class="nav nav-tabs justify-content-center">
				<li class="nav-item">
				  <a class="nav-link product_cart active" data-toggle="tab" href="#trending">Offers</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link product_cart" data-toggle="tab" href="#newarrival">New Arrival</a>
				</li>

			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div id="trending" class="container tab-pane active"><br>



				  <div class="product-carousel owl-carousel owl-theme bottom-nav">


				  	<?
							$Tproducts = $this->db->query("select * from product join product_country_details on product_country_details.product_id = product.id where product_country_details.country_id =".country_id." and is_active=1 and trending = '1' order by display_order asc limit 1, 24");
							$i=0;
							echo "<div class ='row'>";

				      foreach($Tproducts->result() as $product) {
				        $attr=$sale="";
						$i=$i+1;

							if ($i%8==0)
							{
							$divclose="</div><div class ='row'>";

							}
							else
							{
					        $divclose="";

							}
							$priceLabel = ((country_id == 1) ? "AED" : ((country_id == 2) ? "QAR" : "OMR"));
				      ?>
						<div class="col-md-3 col-sm-12 col-xs-12 thumb d-block ">
							<div class="thumbnail productGrid">
								<a href="<?=base_url()?>product/product_details/<?=$product->product_url;?>">

								<div class="proImage">
								<img src="<? echo base_url().$product->medium_image_path; ?>" class="img-responsive img-fluid" alt="" >

								<div class="hoverDiv"><i class="fa fa-link" aria-hidden="true"></i></div>
								</div>
								</a>
								<div class="product-dit bg-color">
								<p><a href="<?=base_url()?>product/product_details/<?=$product->product_url;?>"><? echo $product->product_name; ?></a></p>
								<h2>
									<?
									if($product->discount_price != "")
									{
										echo "<del style='color:#999999;'>".$priceLabel." ".$product->price."</del> ".$priceLabel." ".$product->discount_price;
									}
									else
									{
											echo $priceLabel." ".$product->price;
									}
										// echo $priceLabel." ".$product->price;
									?>
								</h2>
								<button  zone="" qty=1 date=""  price=<? echo $product->price; ?> product-id="<? echo $product->product_id; ?>" onclick="addToCart(this);" class="add_cart_product addtpcartBtn">Add to Cart</button>
								</div>
							</div>
						</div>
						<?php
						echo $divclose;
				              }
							echo "</div>";
				              ?>



					 <!--Duplicate -->




					</div>


				</div>

				<!--New Arrival-->
				<div id="newarrival" class="container tab-pane fade"><br>


				  <div class="product-carousel owl-carousel owl-theme bottom-nav">




				<?
							$Nproducts = $this->db->query("select * from product join product_country_details on product_country_details.product_id = product.id where product_country_details.country_id =".country_id." and is_active=1 and new_arrival = '1' order by display_order asc limit 1, 24");
				      		echo "<div class ='row'>";
					        $j=0;
				      foreach($Nproducts->result() as $product) {
				        $attr=$sale="";
						$j=$j+1;

							if ($j%8==0)
							{
							$divclose="</div><div class ='row'>";

							}
							else
							{
					        $divclose="";

							}

				      ?>
					<div class="col-md-3 col-sm-12 col-xs-12 thumb d-block ">
									<div class="thumbnail productGrid">
										<a href="<?=base_url()?>product/product_details/<?=$product->product_url;?>">
										<div class="proImage">
											<img src="<? echo base_url().$product->medium_image_path; ?>" class="img-responsive img-fluid" alt="" >

											<div class="hoverDiv"><i class="fa fa-link" aria-hidden="true"></i></div>
											</div>

										</a>

										<div class="product-dit bg-color">
										<p><a href="<?=base_url()?>product/product_details/<?=$product->product_url;?>"><? echo $product->product_name; ?></a></p>
										<h2>$<? echo $product->price; ?></h2>
										<button  zone="" qty=1 date=""  price=<? echo $product->price; ?> product-id="<? echo $product->product_id; ?>" onclick="addToCart(this);" class="add_cart_product addtpcartBtn">Add to Cart</button>		</div>
									</div>
								</div>
				<?php
						echo $divclose;
				              }
							echo "</div>";
				              ?>

				</div>


				</div>






			  </div>


			</div>
		</div>
	</section>



	<div id="about">
		<div class="about_left">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="message-box">
							<h3>About Us</h3>
							<h4>Mission Statement</h4>
							<p class="lead"><img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/arrl.png"  alt=""> <?php echo $about_page->mission?> <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/arrr.png"  alt=""></p>
							<?php
							$a= $about_page->company_description;
							?>
							<p>  <?php echo substr($a,0,540); ?>...</p>
							<a class="lean_btn" href="<? echo base_url('about-us'); ?>" style="top: 0px;"><span>Read More</span></a>
						</div>
					</div>

					<div class="col-md-6 aboutmap">
						<img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/map_01.jpg" class="img-center" alt="">

					<div class="csp">
						<div class="text-center stat-wrap message-box-right">
							<div class="">
								<span class="global-radius icon_wrap"><img src= "<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_59.png"></span>
								<p class="stat_count">45000+</p>
								<h3 class="line-hv">Customers</h3>
							</div>
						</div>
						<div class="text-center stat-wrap message-box-right">
							<div class="">
								<span class="global-radius icon_wrap"><img src= "<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_62.png"></span>
								<p class="stat_count">215+</p>
								<h3 class="line-hv">Employees</h3>
							</div>
						</div>
						<div class="text-center stat-wrap message-box-right">
							<div class="">
								<span class="global-radius icon_wrap"><img src= "<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_66.png"></span>
								<p class="stat_count">65+</p>
								<h3 class="line-hv">Trucks & Vehicles</h3>
							</div>
						</div>
					</div>
				</div>

				</div>
			</div>
		</div>
	</div>

	<div id="client_block">
		<div class="container">
			<div class="product-title text-center titleStyle">
				<h2><span>
					<?php
						foreach($allPages as $page)
						{
							if($page['id'] == '3')
							{
								echo $page['title'];
							}
						}
					?>
				</span></h2>
			</div>

			<!-- Static data-->
			<div class="row">
				<div class="col-md-7">
					<div class="logos row testi-carousel owl-carousel owl-theme bottom-nav">
							<?php
							if (isset($reviews)):
						    $i=0;
									echo "<div class ='item'>";
					        foreach ($reviews as $key => $review):
						    $i=$i+1;

							if ($i%8==0)
							{
							$divclose="</div><div class ='item'>";

							}
							else
							{
					        $divclose="";

							}
							?>

							<a href="javascript:;" onclick="changeReview(<?php echo $review['id']; ?>);"><img src="<? echo base_url($review['logo']); ?>" alt="<? echo $review['client_name']; ?>" class="img-repsonsive"></a>

							<?
							echo $divclose;
							endforeach;
							echo "</div>";
							endif;
							?>


					</div>
					</div>
				<?php
				// print_r($testimonials);
				//die;
				   if (isset($testimonials)):
			       foreach ($testimonials as $key => $testimonial):

							 $isVideo = false;
				         if($testimonial['media_type'] == 2)
				         {
									 $isVideo = true;
				           // $videoData = "<div class='text-center videoFilePreview'><video controls='controls' preload='none' name='media' class='admin-grid-img'><source src='" . base_url() . $testimonial['video_file'] . "'  type='video/mp4'></video></div>";
									 $videoCode = '<video width="100%" height="565" controls autoplay>
										 <source src="'.base_url().$testimonial['video_file'].'" type="video/mp4">
							 </video>';
				         }
				         if($testimonial['media_type'] == 3)
				         {
									 $isVideo = true;
				           // $videoData = "<div class='text-center admin-embedcode videoPreview'>" . $testimonial['video_link'] . "</div>";
									 $videoCode = $testimonial['video_link'];
				         }
	            ?>

				<div class="col-md-5">
				 <div class="testimonial clearfix">
                            <div class="desc">
								<h4><span class="reviewTitle"><?php echo $testimonial['client_name'] ?></span><img class="quiteimg" src = "<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/quote.png" alt="">
									<?php
										if($isVideo)
										{
									?>
									<span class="desimg">
										<a class="btn" href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" ><img src = "<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_73.png" alt=""></a>
									</span>
									<!-- <input type="hidden" id="videoCode" name="videoCode" value='' /> -->
								<?php
								}
								?>
								<span class="videoIcon" style="display:none;">
									<a class="btn" href="javascript:;" data-toggle="modal" data-target="#exampleModalCenter" ><img src = "<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_73.png" alt=""></a>
								</span>
								<small class="reviewDesignation"><?php echo $testimonial['designation'] ?></small></h4>

                                <p class="lead reviewDesc"><?php echo $testimonial['testimonial'] ?></p>
                            </div>
                        </div>
						 </div>
			</div>
			<?php
					        endforeach;
					    endif;
					    ?>

			<!-- Static data end-->

		</div>
	</div>
	<div id="blog">
		<div class="container">

			<div class="product-title text-center titleStyle">
				<h2><span>Recent Blogs</span></h2>
			</div>


			<div class="row">
				<?php if($blogs){
				foreach($blogs as $b_val){
					?>
				<div class="col-lg-4 col-md-6">
					<div class="blog_block">
						<div class="blog-widget">
							<div class="post-media">
								<img src="<?php echo '../'.$b_val['blog_image'];?>" alt="">
							</div>
							<div class="content-dit">
								<h4><i class="fa fa-calender" aria-hidden="true"></i><?php echo date('F d, Y', strtotime($b_val['blog_date']));?></h4>
								<h2><a href="<? echo base_url('blog/blog-details/') . $b_val['blog_slug']; ?>" style="color:#0d706d;" onmouseover="this.style.color='#1f1f1f'" onMouseOut="this.style.color='#0d706d'"><?php echo substr($b_val['blog_title'],0,52);?>...</a></h2>
								<p><? echo $this->common->GetshortString(($b_val['description']), 130); ?></p>
								<!-- <a class="like_tag"href="#"><i class="fa fa-heart" aria-hidden="true"></i>1</a> -->
								<!--div class="read_tag"><a href="<? echo base_url('blog/blog-details/') . $b_val['blog_slug']; ?>">Read More</a></div-->
								</div>
								<div class="blog_footer">
									<?php
									$like_active_image = HTTP_ASSETS_PATH_CLIENT."images/icon-like-01.png";
									if($b_val['ip_address'] != NULL && $b_val['ip_address'] != "" ){
											$like_active_image = HTTP_ASSETS_PATH_CLIENT."images/add_like.png";
									}
									?>
									<!-- <a class="like_tag" href="" class="like_<?=$b_val['id']?>" onclick="blog_like(<?=$b_val['id'];?>,<?=$b_val['likes'];?>);"><i class="fa fa-heart" aria-hidden="true"></i><?=$b_val['likes'];?></a> -->
									<div class="like_tag">
											<span class="icon like_<?=$b_val['id']?>" onclick="blog_like_home(<?=$b_val['id']?>,<?=$b_val['likes']?>);" style="cursor: pointer;">
											<img src="<?= $like_active_image; ?>"  alt="<?=$b_val['blog_title']?>" class="blog_like_<?=$b_val['id']?>"/>
										</span> &nbsp;<span id="like_<?=$b_val['id']?>" class="like_count_<?=$b_val['id']?>"><?=$b_val['likes']; ?></span>
											</div>
									<div class="read_tag"><a href="<? echo base_url('blog/blog-details/') . $b_val['blog_slug']; ?>">Read More</a></div>
								</div>






						</div>
					</div>
				</div>
			<?php } }?>

			</div>
			<div class="text-center">
                <a href="<? echo base_url('blog'); ?>" class="btn12"><span>View All Blogs</span></a>
            </div>

		</div>
	</div>

<?php
foreach($allPages as $page)
{
	if($page['id'] == '12')
	{
		$companyDetails = (object)$page;
	}
}
?>
	<div id="adv_block">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="logo_tag">
						<img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_78.png" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="text_tag">
						<p>Download our company profile to know more about the
						latest product range and acquire detail that Dhofar Global offers.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="adv_tag">
						<a href="<?=base_url().$companyDetails->company_catalogue?>" download>
							<img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/home_81.png" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="enquirenow">
	<span href="#" class="becomedistributor" data-toggle="modal" data-target="#becomedistributorid">
		<!-- <img src="<? echo HTTP_ASSETS_PATH_CLIENT; ?>images/enquirenow.png" alt=""> -->
		<span class="enquire-now-text">Enquire Now</span><span class="enquire-now-image"></span>
	</span>
	</div>




	<!-- Modal content-->
	<section class="modal fade becomedistributorid-popup" id="becomedistributorid" role="dialog">
		<section class="modal-dialog modal-dialog-centered">

			<section class="modal-content">
				<section class="modal-body">
					<section class="becomedistributor-content">

					<button type="button" class="close" data-dismiss="modal"></button>
					<h2>Enquire Now</h2>
					<h4>Get in touch with us</h4>
					<div id="divMessage_distribute" class="sucess-message"></div>
				<form name="distributor_enquiry" id="distributor_enquiry" method="post" action="#" enctype="multipart/form-data">
					<aside class="form-group">
						<input type="text" required placeholder="*Name" id="company_name" name="company_name" class="form-control">
					</aside>
					<aside class="form-group">
					 <input type="email" required class="form-control" id="email" name="email" placeholder="* Email">
					</aside>
					<aside class="form-group">
						<input type="text"  maxlength="20"  minlength="10" required class="form-control" id="phone" name="phone" placeholder="* Phone/Mobile" onKeyDown="return validate_phonenumber(this, event);">
					</aside>
			<aside class="form-group cselect">
						<select class="form-control" id="product_category" name="product_category">
								<option value="">Select Product Category</option>
								<?  foreach ($categories as $categories_val) { ?>
									<option value="<?php echo $categories_val['id'];?>"><?php echo $categories_val['name'];?></option>
								<?php }?>
						</select>
					 </aside>

					<aside class="form-group">
						<textarea class="form-control" name="description" id="description" placeholder="Message" rows="5"></textarea>
					</aside>
					<aside class="form-group mb-0 text-center">
					<div id="div_captcha_error">
									<? $this->load->view('partials/vwRecaptcha'); ?></div>
					</aside>
					<aside class="form-group btn-send-message">
					<button type="submit" value="save" id="send_enquery" class="btn btn-submit save-btn">Send Message</button>
					</aside>
					</form>
					<p>We respect your privacy and only use your data to contact you about your enquiry.</p>
					</section>
			</section>
		</section>
	</section>
	</section>


	<div class="modal fade reviewpopup" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close lity-close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body videobody">
	        <!-- <iframe src="https://www.youtube.com/embed/Hfb72UbvplU?autoplay=1" frameborder="0" height="565" width="1000" allowfullscreen></iframe> -->
			<!--<video width="100%" height="565" controls autoplay>
			  <source src="movie.mp4" type="video/mp4">
			  <source src="movie.ogg" type="video/ogg">
	</video>-->
	<?php
	if($videoCode)
	{
		echo $videoCode;
	}
	 ?>
	      </div>
	    </div>
	  </div>
	</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" /> -->
<script>
/*$(document).ready(function(){
 $('#product_category').multiselect({
  nonSelectedText: 'Select product_category',
  enableFiltering: true,
  enableCaseInsensitiveFiltering: true,
  buttonWidth:'500px'
 });*/

function changeReview(reviewId)
{
	var url_path = "<?php echo base_url('reviews/get/'); ?>"+reviewId;
	var base_url = "<?php echo base_url(); ?>";
	$.ajax({
			url: url_path,
			type: "get",
			success: function (result) {
				// console.log(result);
					// var data = jQuery.parseJSON(result);
					console.log(result);
					var data = JSON.parse(JSON.stringify(result));
					console.log(data.reviewDetails.client_name);
					if (data.success == true) {
						// console.log("asdf");
							// console.log(data.reviews.client_name);
							$(".desimg").css("display","none");
							$(".reviewTitle").html(data.reviewDetails.client_name);
							$(".reviewDesignation").html(data.reviewDetails.designation);
							$(".reviewDesc").html('"'+data.reviewDetails.testimonial+'"');
							if(data.reviewDetails.media_type == "2" || data.reviewDetails.media_type == "3")
							{
								$(".videoIcon").css("display", "inline-block");
								if(data.reviewDetails.media_type == "2")
								{
									var videoCode = '<video width="100%" height="565" controls><source src="'+base_url+data.reviewDetails.video_file+'" type="video/mp4"></video>';
								}
								if(data.reviewDetails.media_type == "3")
								{
									var videoCode = data.reviewDetails.video_link;
								}
								$(".videobody").html(videoCode);
							}
							else
							{
								$(".videoIcon").css("display", "none");
							}
					}
					if (data.error == 'false') {

					}

			}
	});
}

</script>
