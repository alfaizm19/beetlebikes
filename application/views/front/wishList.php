
    <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li>Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs-area end -->
    
 
    <form action="" method="POST">
    <div class="cart-page-area page-bg page-ptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 col-sm-12">
                        <?php
                            if($this->session->flashdata('add_cart_product')){
                        ?>
                                <div class="alert alert-success">
                                   <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> 
                                  <strong>Success!</strong> Product has been added in cart
                                </div>
                        <?php
                                unset($_SESSION['add_cart_product']);
                            }
                            else if($this->session->flashdata('error_add_cart_product')){
                                ?>
                                <div class="alert alert-danger">
                                  <strong>Error!</strong> Somthing went wrong try again..
                                </div>
                                <?php
                                 unset($_SESSION['error_add_cart_product']);
                            } 
                            
                        ?>

                        <?php
                            if($this->session->flashdata('remove_wishlist_product')){
                        ?>
                                <div class="alert alert-success">
                                   <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a> 
                                  <strong>Success!</strong>  Product has been removed
                                </div>
                        <?php
                                unset($_SESSION['remove_wishlist_product']);
                            }
                            else if($this->session->flashdata('error_remove_wishlist_product')){
                                ?>
                                <div class="alert alert-danger">
                                  <strong>Error!</strong> Somthing went wrong try again..
                                </div>
                                <?php
                                 unset($_SESSION['error_remove_wishlist_product']);
                            } 
                            
                        ?>
                    <div class="table-responsive">
                         <?php  if($wishlist_data){  ?>
                        <table class="table-content">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>name</th>
                                    <th>Add to cart</th>
                                    <th>Remove Wishlist</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   
                                        $subTotal = [];
                                        foreach ($wishlist_data as $wishlist_data_key => $wishlist_data_value) {
                                ?>
                                   <tr>
                                        <td class="cart-product">
                                            <a href="<?php echo base_url().'product/'.$wishlist_data_value['slug']; ?>"><img src="<?php echo base_url().$wishlist_data_value['image_path']; ?>" alt=""></a>
                                        </td>
                                       <td class="cart-name">
                                           <h3><a href="<?php echo base_url().'product/'.$wishlist_data_value['slug']; ?>"><?php echo $wishlist_data_value['product_name']; ?></a></h3>
                                           <div class="revew">
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star"></i></a>
                                                <a href="#"><i class="fa fa-star-o"></i></a>
                                                <span>(17)</span>
                                            </div>
                                        </td>
                                      
                                       <td>
                                           <a href="<?php echo base_url(); ?>product/wishlistAddCartProduct/<?php echo $wishlist_data_value['id']; ?>">Add to cart</a>
                                       </td>
                                      
                                       
                                       <td class="cart-remove">
                                            <a href="<?php echo base_url(); ?>product/removeWishlistListProduct/<?php echo $wishlist_data_value['id']; ?>"><i class="fa fa-times"></i></a>
                                       </td>
                                   </tr>
                                <?php } ?>   
                               
                            </tbody>
                        </table>
                      <?php } else { echo 'Not Found'; } ?>   
                    </div>
                </div>
            </div>
           
        </div>
    </div>
     
  
  