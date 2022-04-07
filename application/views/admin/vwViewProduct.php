<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title">
                <?php echo $page_title; ?> </h3>
        </div>
        <a href="<?php echo base_url('admin/product'); ?>" class="btn btn-success m-btn m-btn--icon">
            <span>
                <i class="fa fa-arrow-circle-o-left"></i>
                <span></span>Back</span>
        </a>
    </div>
</div>
<?php if (empty($product)): ?>
    <?php $this->load->view('admin/partials/_admin_not_found'); ?>
    <?php return FALSE;
endif; ?>
<div class="col-sm-12">
    <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">


        <div class="m-portlet__body pb-2">
            <table class="table table-bordered tableformat">
                <thead>
                    <tr>
                        <th width="30%">Product Name</th>
                        <th width="70%"><?php echo $product->product_name; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Slug</th>
                        <th width="70%"><?php echo $product->slug; ?></th>
                    </tr>
                    <!-- <tr>
                        <th width="30%">BM Name</th>
                        <th width="70%"><?php echo $product->bm_name; ?></th>
                    </tr> -->
					<tr>
                        <th width="30%">SKU Code</th>
                        <th width="70%"><?php echo $product->sku_code; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Category Level 1</th>
                        <th width="70%"><?php echo $this->db->get_where('category', array('id' => $product->category_level_1))->row('category'); ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Category Level 2</th>
                        <th width="70%"><?php echo $this->db->get_where('category', array('id' => $product->category_level_2))->row('category'); ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Description</th>
                        <th width="70%"><?php echo $product->description; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">SKU Code</th>
                        <th width="70%"><?php echo $product->sku_code; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Dimension</th>
                        <th width="70%"><?php echo $product->dimension; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Net Weight</th>
                        <th width="70%"><?php echo $product->net_weight; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Deno (gm)</th>
                        <th width="70%"><?php echo $product->deno; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Stock</th>
                        <th width="70%"><?php echo $product->stock; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">MRP</th>
                        <th width="70%"><?php echo $product->mrp; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">SP</th>
                        <th width="70%"><?php echo $product->selling_price; ?></th>
                    </tr>   
                    <tr>
                        <th width="30%">Display Date</th>
                        <th width="70%"><?php echo !empty($product->available_date)? $product->available_date:''; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Display Time</th>
                        <th width="70%"><?php echo !empty($product->available_time)? date('h:i A', strtotime($product->available_time)):''; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Featured</th>
                        <th width="70%"><?php echo $product->featured? 'Yes':'No' ?></th>
                    </tr>
                    <!-- <tr>
                        <th width="30%">Popular</th>
                        <th width="70%"><?php echo $product->popular? 'Yes':'No' ?></th>
                    </tr> -->
                    <tr>
                        <th width="30%">Display on Home</th>
                        <th width="70%"><?php echo $product->display_on_home? 'Yes':'No' ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Image </th>
                        <th width="70%">
                            <?php
                            if (!empty($product->image_path)) {
                                ?>
                                <img width="200" src="<?php echo base_url($product->image_path); ?>" />
                                <?php
                            }else{
                                echo 'No image found';
                            }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <th width="30%">Meta Title</th>
                        <th width="70%"><?php echo $product->meta_title; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Meta Keywords</th>
                        <th width="70%"><?php echo $product->meta_key_words; ?></th>
                    </tr>
                    <tr>
                        <th width="30%">Meta Description</th>
                        <th width="70%"><?php echo $product->meta_description; ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
