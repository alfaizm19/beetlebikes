    <!--footer start-->
    <div class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="single-footer footer-dec">
                            <div class="footer-logo">
                                <a href="#"><img src="<?php echo base_url();?>assets/front/img/logo/logo.png" alt=""></a>
                            </div>
                            <p class="dec">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                            </p>
                            <div class="social-icon">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-footer">
                            <div class="footer-title">
                                <h4>Pages</h4>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="#"><i class="fa fa-angle-right"></i> Home</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> About Us</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Blog</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> FAQs</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Delivery</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> delivery</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="single-footer">
                            <div class="footer-title">
                                <h4>My Account</h4>
                            </div>
                            <ul class="mainmenu">
                                <li><a target="_blank" href="my-account.html"><i class="fa fa-angle-right"></i> My Account</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> Wish List (3)</a></li>
                                <li><a target="_blank" href="cart-page.html"><i class="fa fa-angle-right"></i> Shopping Cart</a></li>
                                <li><a target="_blank" href="checkout.html"><i class="fa fa-angle-right"></i> Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="single-footer newsletter">
                            <div class="footer-title">
                                <h4>Newsletter</h4>
                            </div>
                            <p>Subscibe to the Shaeng mailing list to receive updates on new arrivals,offers and other discount information</p>
                            <form action="#">
                                <input type="text" placeholder="Write your e-mail here">
                                <button>Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-botton">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 col-sm-12">
                        <p>Copyright © dotbike 2020 | Design by <a target="_blank" href="http://dotthemes.com/">dotthemes.com</a> | All rights reserved</p>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-12">
                       <div class="master-card">
                           <a href="#"><img src="<?php echo base_url();?>assets/front/img/logo/cont.png" alt=""></a>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-area end-->
    
    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All js plugins included in this file. -->
    <script src="<?php echo base_url();?>assets/front/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/jquery.nivo.slider.pack.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/mail.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/plugins.js"></script>
    <script src="<?php echo base_url();?>assets/front/js/active.js"></script>

    <script type="text/javascript">        

        $(document).on('click', '.cart_add_quantity', function(e) {
            var productid = $(this).attr("data-productid");            
            $.ajax({
                  url: "<?php echo base_url('products/addCartProduct') ?>",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    product_id : productid,
                    cart_product_qty : $("#qty_"+productid).val(),
                  },
                  type: "POST",
                  dataType: "JSON",
                  cache: false,
                  success: function(response){
                    if(response.stock){
                        alert('Quantity avalaible only '+response.stock);
                        return false;
                    }
                    if(response.status == 'success'){
                         jQuery('#head_cart').html(response.cartList);
                    }
                  },

                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
           
        });        

        $(document).on('click', '.cart_add_signle', function(e) {
            var productid = $(this).attr("data-productid");            
            $.ajax({
                  url: "<?php echo base_url('products/addCartProduct') ?>",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    product_id : productid,
                  },
                  type: "POST",
                  dataType: "JSON",
                  cache: false,
                  success: function(response){
                    if(response.stock){
                        alert('Quantity avalaible only '+response.stock);
                        return false;
                    }
                    if(response.status == 'success'){
                        $(".cart_product_"+productid).css("display","none");
                        $(".remove_cart_"+productid).css("display","block");
                        jQuery('#head_cart').html(''); 
                        jQuery('#headCartCount').html(response.cartCount); 
                        if(response.cartList){
                            jQuery('#head_cart').html(response.cartList);
                        }   
                    }
                  },

                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
           
        });

        $(document).on('click', '.remove_cart_product', function(e) {
            var productid = $(this).attr("data-productid");            
            $.ajax({
                  url: "<?php echo base_url('products/removeCartProduct') ?>",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    product_id : productid,
                  },
                  type: "POST",
                  dataType: "json",
                  cache: false,
                  success: function(response){

                    if(response.status == 'success'){
                        jQuery('#head_cart').html(''); 
                        jQuery('#headCartCount').html(response.cartCount); 
                        if(response.cartList){
                            jQuery('#head_cart').html(response.cartList);
                            getCartData(productId = '',qty= '');
                        }   
                    }
                  },
                   error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
           
        });
        
        $(document).on('click', '.wishlist_add', function(e) {
            var productid = $(this).attr("data-productid");            
            $.ajax({
                  url: "<?php echo base_url('products/addWishlistProduct') ?>",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    product_id : productid,
                  },
                  type: "POST",
                  dataType: "json",
                  cache: false,
                  success: function(response){
                    if(response.status == 'success'){
                       $(".wishlist_add_"+productid).css("display","none");
                       $(".wishlist_remove_"+productid).css("display","block");
                        if( $('#wishlistCount').length )         // use this if you are using id to check
                        {
                            $('#wishlistCount').html('('+response.count+')');
                        }
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
           
        });

        $(document).on('click', '.wishlist_remove', function(e) {
            var productid = $(this).attr("data-productid");            
            $.ajax({
                  url: "<?php echo base_url('products/removeWishlistProduct') ?>",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    product_id : productid,
                  },
                  type: "POST",
                  dataType: "json",
                  cache: false,
                  success: function(response){
                    if(response.status == 'success'){
                       $(".wishlist_remove_"+productid).css("display","none");
                       $(".wishlist_add_"+productid).css("display","block");
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
           
        });

       $("#checkPincodeBtn").on( "click", function() { 
            if($("#pincode").val()){ 
                $(".pincodeError").html('');                   
                $.ajax({
                      url: "<?php echo base_url('product/checkPincode') ?>",
                      data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                        pincode : $("#pincode").val(),
                      },
                      type: "POST",
                      dataType: "json",
                      cache: false,
                      success: function(response){
                        if(response.status == 'success'){
                           $(".pincodeSuccess").html('Delivery avalaible in '+response.delivery_days+' days');
                        }
                      },
                      error: function (xhr, ajaxOptions, thrownError) {
                        alert('Something went wrong please try again');
                      }
                });
            } else{
                $(".pincodeError").html('Please enter pincode');
            }    
           
        });

        <?php 
    
        //if ($this->router->fetch_class() == 'product' && $this->router->fetch_method() == 'cart') { 
        ?>
            getCartData(productId = '',qty= '');

            function getHeaderCartData(){
                 $.ajax({
                  url: "<?php echo base_url() ?>products/cartHeader",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                  },
                  type: "POST",
                  dataType: "json",
                  cache: false,
                  success: function(response){
                        jQuery('#head_cart').html(''); 
                        jQuery('#headCartCount').html(response.cartCount); 
                        if(response.cartList){
                            jQuery('#head_cart').html(response.cartList);
                        }   
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                   // alert('Something went wrong please try again');
                  }
                });
            }

            function getCartData(productId ,qty){
                if(productId){
                   var cardStatus = 1;
                } else {
                     var cardStatus = 0;
                }

                $.ajax({
                  url: "<?php echo base_url() ?>products/cartUpdate",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    productId:productId,
                    qty : qty,
                    updateCart : cardStatus,
                  },
                  type: "POST",
                  dataType: "html",
                  cache: false,
                  success: function(response){
                    if(response){
                       $("#cartPage").html(response);
                       getHeaderCartData();                   
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    //alert('Something went wrong please try again');
                  }
                });
            }

            $(document).on('click', '.qtybutton', function(e) {

                var productId = $(this).data('productid');
                var qty = $("#updateQty_"+productId).val();
                getCartData(productId,qty);
            });    
        <?php
            //}
        ?>  
        <?php 
            if ($this->router->fetch_class() == 'blog' && $this->router->fetch_method() == 'index') { 
        ?>
            var page = 0;

            getBlogList(page);

            function getBlogList(page){


                $.ajax({
                      url: "<?php echo base_url() ?>blogListAjax/"+page,
                      data: {
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                        page:page,
                      },
                      type: "POST",
                      dataType: "html",
                      // dataType: "json",
                      cache: false,
                      success: function(response){
                        if(response){
                           $("#ajaxBlogContent").html(response);
                            
                        }
                      },
                      error: function (xhr, ajaxOptions, thrownError) {
                        alert('Something went wrong please try again');
                      }
                });
            }

           function getPaginationSegment(){
                var href = $('.pagination li.active a').attr('href');
                if(href){
                    var parts = href.split('/');
                    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
                    if(lastSegment){
                        return lastSegment;
                    } else {
                        return 0;
                    }
                }
                
            }

       
            $(document).on('click', '.pagination li a', function(e) {
                event.preventDefault();
                var page = $(this).data('ci-pagination-page');
                var href = $(this).attr('href');

                if(href != 'javascript:void(0)'){
                    if(page){
                        var parts = href.split('/');
                        var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

                        if(lastSegment){
                            getBlogList(lastSegment);
                            $([document.documentElement, document.body]).animate({
                                scrollTop: $("#ajaxBlogContent").offset().top
                            }, 1000);
                        } 
                    }
                }
                
               
            });

        <?php
            }
        ?>   
        <?php 
    
        if ($this->router->fetch_class() == 'product' && $this->router->fetch_method() == 'index') { 
        ?>
     
        var page = 0;

        getProductFilter(page);

        function getProductFilter(page){

            var catFilter = []; 
            $(".catFilter:checked").each(function(){
                catFilter.push($(this).val());
            });

            var attributesFilterData = []; 
            $(".attributeFilter:checked").each(function(){
                attributesFilterData.push($(this).val());
            });
           

            currentTab = getProductCurrentTab();
            price = [];
            var minPrice = $("#min-price").val();
            var maxPrice = $("#max-price").val();

            price.push(minPrice.replace("$", ""));
            price.push(maxPrice.replace("$", ""));

            $.ajax({
              url: "<?php echo base_url() ?>productsAjax/"+page,
              data: {
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                page:page,
                productName : $("#productSearchText").val(),
                sort : $("#productOrderBy").val(),
                perPage : $("#productOnPage").val(),
                price : price.toString(),
                category : catFilter.toString(),
                attribute : attributesFilterData.toString(),
              },
              type: "POST",
              dataType: "html",
              // dataType: "json",
              cache: false,
              success: function(response){
                if(response){
                   $("#ajaxProductFilter").html(response);
                    if(currentTab == 'listView'){
                       $("#productTabList").attr("class","active");
                       $("#list-view").attr("class","tab-pane active");
                       $("#productTabGrid").removeClass("active");
                       $("#grid-view").removeClass("active");
                       $('#productTabList a').attr("aria-expanded","true");
                       $('#productTabGrid a').attr("aria-expanded","false");
                    } 
                }
              },
              error: function (xhr, ajaxOptions, thrownError) {
                alert('Something went wrong please try again');
              }
            });
        }

    
        function getPaginationSegment(){
            var href = $('.pagination li.active a').attr('href');
            if(href){
                var parts = href.split('/');
                var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
                if(lastSegment){
                    return lastSegment;
                } else {
                    return 0;
                }
            }
            
        }

       
        $(document).on('click', '.pagination li a', function(e) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            var href = $(this).attr('href');

            if(href != 'javascript:void(0)'){
                if(page){
                    var parts = href.split('/');
                    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

                    if(lastSegment){
                        getProductFilter(lastSegment);
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $(".shop-item-filter").offset().top
                        }, 1000);
                    } 
                }
            }
            
           
        });

        $(document).on('change', '#productOrderBy', function(e) {
            lastSegment = getPaginationSegment();
            
            if(lastSegment != 'javascript:void(0)'){
                getProductFilter(lastSegment);
                    return lastSegment;
            } else {
                getProductFilter(0);
            }
        });

        $(document).on('change', '#productOnPage', function(e) {
            lastSegment = getPaginationSegment();
            getProductFilter(0);
        });
        

        $( "#price-slider" ).slider({
            slide: function(event, ui) {
                $( "#min-price" ).val('$' + ui.values[ 0 ] );
                $( "#max-price" ).val('$' + ui.values[ 1 ] );
                getProductFilter(0);
            }
        });

        function productSideFilter() {
            getProductFilter(0);
        }

        function attributeFilter() {
            getProductFilter(0);
        }



    <?php
        }
    ?>
    $(document).on('click', '#couponBtn', function(e) { 
        event.preventDefault();
        var couponCode = $('#couponCode').val();
        if(couponCode){
            $('#couponCodeError').html('');
             $.ajax({
                  url: "<?php echo base_url() ?>checkCouponCode",
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    couponCode : couponCode,
                  },
                  type: "POST",
                  dataType: "json",
                  cache: false,
                  success: function(response){
                    if(response.status == 'success'){
                        location.reload();
                    } else {
                        $('#couponCodeError').html('Coupon code not valid');
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
        } else {
            $('#couponCodeError').html('Please enter coupon code');
        }
    });

    function quantityNumberOnly(evt){
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }

    <?php 
        if ($this->router->fetch_class() == 'category' && $this->router->fetch_method() == 'subcategory') { 
    ?>
        var page = 0;

        getSubCategoriesFilter(page);

        function getSubCategoriesFilter(page){

            currentTab = getProductCurrentTab();

            $.ajax({
                  url: "<?php echo base_url() ?>subCategoryListAjax/"+page,
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    page:page,
                    perPage : $("#CategoiresOnPage").val(),
                    catId : <?php echo $this->session->userdata('subCategoryId'); ?>,
                  },
                  type: "POST",
                  dataType: "html",
                  // dataType: "json",
                  cache: false,
                  success: function(response){
                    if(response){
                       $("#ajaxSubCategoiresFilter").html(response);
                        if(currentTab == 'listView'){
                           $("#categoryTabList").attr("class","active");
                           $("#list-view").attr("class","tab-pane active");
                           $("#categoryTabGrid").removeClass("active");
                           $("#grid-view").removeClass("active");
                           $('#categoryTabList a').attr("aria-expanded","true");
                           $('#categoryTabGrid a').attr("aria-expanded","false");
                        } 
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('Something went wrong please try again');
                  }
            });
        }

       function getPaginationSegment(){
            var href = $('.pagination li.active a').attr('href');
            if(href){
                var parts = href.split('/');
                var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
                if(lastSegment){
                    return lastSegment;
                } else {
                    return 0;
                }
            }
                
        }

        $(document).on('click', '.pagination li a', function(e) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            var href = $(this).attr('href');

            if(href != 'javascript:void(0)'){
                if(page){
                    var parts = href.split('/');
                    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

                    if(lastSegment){
                        getSubCategoriesFilter(lastSegment);
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#ajaxSubCategoiresFilter").offset().top
                        }, 1000);
                    } 
                }
            }
            
           
        });


        $(document).on('change', '#subCategoiresOnPage', function(e) {
            getSubCategoriesFilter(0);
        });

    <?php
        }
    ?> 
    <?php 
        if ($this->router->fetch_class() == 'category' && $this->router->fetch_method() == 'index') { 
    ?>
        var page = 0;

        getCategoriesFilter(page);

        function getCategoriesFilter(page){

            currentTab = getProductCurrentTab();

            $.ajax({
                  url: "<?php echo base_url() ?>categoriesAjax/"+page,
                  data: {
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', 
                    page:page,
                    perPage : $("#CategoiresOnPage").val(),
                  },
                  type: "POST",
                  dataType: "html",
                  // dataType: "json",
                  cache: false,
                  success: function(response){
                    if(response){
                       $("#ajaxCategoiresFilter").html(response);
                        if(currentTab == 'listView'){
                           $("#categoryTabList").attr("class","active");
                           $("#list-view").attr("class","tab-pane active");
                           $("#categoryTabGrid").removeClass("active");
                           $("#grid-view").removeClass("active");
                           $('#categoryTabList a').attr("aria-expanded","true");
                           $('#categoryTabGrid a').attr("aria-expanded","false");
                        } 
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert('cccSomething went wrong please try again');
                  }
            });
        }

        function getPaginationSegment(){
            var href = $('.pagination li.active a').attr('href');
            if(href){
                var parts = href.split('/');
                var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash
                if(lastSegment){
                    return lastSegment;
                } else {
                    return 0;
                }
            }
                
        }

        $(document).on('click', '.pagination li a', function(e) {
            event.preventDefault();
            var page = $(this).data('ci-pagination-page');
            var href = $(this).attr('href');

            if(href != 'javascript:void(0)'){
                if(page){
                    var parts = href.split('/');
                    var lastSegment = parts.pop() || parts.pop();  // handle potential trailing slash

                    if(lastSegment){
                        getCategoriesFilter(lastSegment);
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#ajaxSubCategoiresFilter").offset().top
                        }, 1000);
                    } 
                }
            }
            
           
        });

        $(document).on('change', '#CategoiresOnPage', function(e) {
            getCategoriesFilter(0);
        });

    <?php
        }
    ?> 

    // Current tab for products and cateories
    function getProductCurrentTab(){
        var productTabList = $('#productTabList').attr('class');
        
        if(productTabList){
           var currentTab = 'listView';
        } else {
            var currentTab = 'gridView';
        }

        return currentTab;
    }

    <?php 
        if ($this->router->fetch_class() == 'profile') { 
    ?>
        $('#addaddress').click(function() {
            $('.append-form').show(2000);
            /*
                $('.form_submit').click(function(event) {
                    event.preventDefault();
                    $('.append-form').hide(2000);
                });
            */
        });
           
        $('.edit-form').click(function() {
            $('.append-form').show(2000);
            $('.form_submit').click(function(event) {
                event.preventDefault();
                $('.append-form').hide(2000);
            });
        });

        $(document).on('click', '#editProfile', function(e) {
            $('#profileArea').removeClass('disabledEdit');
            $("#profileBtn").removeAttr("disabled");
        });
            
    <?php
        }
    ?> 

    $(document).on('click', '#termsConditionCheckout', function(e) {
        if($('#termsConditionCheckout').prop("checked") == true){
            $("#rzp-button1").removeAttr("disabled");
        } else{
            $("#rzp-button1").prop('disabled', true);
        }
        
    });

    </script>

    <?php 
       // if ($this->router->fetch_class() == 'checkout') { 
          
    ?>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  

     <script>
        
        $(document).on('click', '#rzp-button1', function(e) {
            $('.error').html('');
            $.ajax({
                  url: "<?php echo base_url() ?>checkout/createRazorPayOrder",
                  data: $("#checkoutBillingForm").serialize(),//only input
                  type: "POST",
                  dataType: "json",
                  cache: false,
                  beforeSend: function() {
                       $("#rzp-button1").prop('disabled', true);
                  },
                  success: function(res){

                    if(res.status == 'success'){

                        var dataRazorpayOrder = res.data;
                       var options = {
                            "key": dataRazorpayOrder.key,
                            "amount": dataRazorpayOrder.amount,
                            "currency": "INR",
                            "name": "Drcyle",
                            "description": "Swiss Excellance. Made in India",
                            "image": "http://codzio.com/staging/mmtc_ci/uploads/site-setting/frontend/logo.png",
                            "order_id": dataRazorpayOrder.order_id,
                            "callback_url": dataRazorpayOrder.callback_url,
                            "prefill": {
                                "name": dataRazorpayOrder.name,
                                "email": dataRazorpayOrder.email,
                                "contact": dataRazorpayOrder.contact
                            },
                            "theme": {
                                "color": "#cfa04f"
                            }
                        };

                        trigger_razorpay(options);
                    } else if(res.status == 'fail'){
                        $("#rzp-button1").removeAttr("disabled");
                        if(res.message){
                            alert(res.message);
                            return false;
                        }
                       
                        if(res.billingAddressError.billing_first_name){
                            $('#error_billing_first_name').html(res.billingAddressError.billing_first_name);
                        }
                        if(res.billingAddressError.billing_last_name){
                             $('#error_billing_last_name').html(res.billingAddressError.billing_last_name);
                        }
                        if(res.billingAddressError.billing_email){
                             $('#error_billing_email').html(res.billingAddressError.billing_email);
                        }  
                        if(res.billingAddressError.billing_phone){
                             $('#error_billing_phone').html(res.billingAddressError.billing_phone);
                        }
                        if(res.billingAddressError.billing_address_1){
                             $('#error_billing_address_1').html(res.billingAddressError.billing_address_1);
                        }
                        if(res.billingAddressError.billing_city){
                             $('#error_billing_city').html(res.billingAddressError.billing_city);
                        }
                        if(res.billingAddressError.billing_state){
                             $('#error_billing_state').html(res.billingAddressError.billing_state);
                        }
                        if(res.billingAddressError.billing_pincode){
                             $('#error_billing_pincode').html(res.billingAddressError.billing_pincode);
                        }
                    }
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                     $("#rzp-button1").removeAttr("disabled");
                    alert('Something went wrong please try again');
                  }
            });
        }); 

        function trigger_razorpay(options) {

            var rzp1 = new Razorpay(options);
            rzp1.open();
        } 
        </script>
    <?php
       // }
    ?> 

</body>

</html>