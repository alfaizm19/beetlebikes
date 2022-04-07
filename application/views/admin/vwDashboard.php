<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title ">
                Dashboard
            </h3>
        </div>
        <div>

            <?php
                $orderPerm = $this->Permission_model->checkPerm(get_admin_id(), 'order', 'read');
                $productPerm = $this->Permission_model->checkPerm(get_admin_id(), 'product', 'read');
                $productAttribPerm = $this->Permission_model->checkPerm(get_admin_id(), 'product_attribute', 'read');
                $catLv1Perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_1', 'read');
                $catLv2Perm = $this->Permission_model->checkPerm(get_admin_id(), 'category_level_2', 'read');
                $promoCodePerm = $this->Permission_model->checkPerm(get_admin_id(), 'promo_code', 'read');
                $pincodePerm = $this->Permission_model->checkPerm(get_admin_id(), 'pincode', 'read');
                $cartPerm = $this->Permission_model->checkPerm(get_admin_id(), 'cart', 'read');
                $settingPerm = $this->Permission_model->checkPerm(get_admin_id(), 'setting', 'read');
                $userPerm = $this->Permission_model->checkPerm(get_admin_id(), 'user_right', 'read');
                $auditPerm = $this->Permission_model->checkPerm(get_admin_id(), 'audit', 'read');
                $customersPerm = $this->Permission_model->checkPerm(get_admin_id(), 'customers', 'read');
                $blogPerm = $this->Permission_model->checkPerm(get_admin_id(), 'blog', 'read');
                $bannerPerm = $this->Permission_model->checkPerm(get_admin_id(), 'banner', 'read');
            ?>

            <span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
                <span class="m-subheader__daterange-label">
                    <span class="m-subheader__daterange-title">Today:</span>
                    <span class="m-subheader__daterange-date m--font-brand"><?= date("M d"); ?></span>
                </span>

            </span>
        </div>
    </div>
</div>

<div class="m-content" style="width:100%">

    <!--First Part-->
    <div class="m-portlet  m-portlet--unair">
        <div class="m-portlet__body  m-portlet__body--no-padding">
            <div class="row m-row--no-padding m-row--col-separator-xl">

                <div class="">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Order's Summary</h6>
                        </div>

                        <div class="container-fluid">
                            <?php 

                                $timestamp    = strtotime(date('M Y'));

                                $startingMonth = date('Y-01-01');

                                $startingDate = date('Y-m-01', $timestamp);
                                $lastMonthDate = date('Y-m-01', strtotime('-1 Month', $timestamp));
                                

                                $lastMonthDateEnd2 = date('Y-m-t', strtotime('-1 Month', strtotime(date('Y-m-d'))));

                                $lastDate = date('Y-m-d', strtotime(date('Y-m-d')));

                                $lastMonthDateEnd = date('Y-m-d', strtotime('-1 Month', strtotime(date('Y-m-d'))));
                                $lastMonthDateEnd = date('Y-m-d', strtotime($lastMonthDateEnd));

                                // $mtdSales = $this->db->query('SELECT SUM(tbl_order_products.variant_price * tbl_order_products.product_quantity) AS "Sale", count(*) AS "Qty" FROM `tbl_order_master` LEFT JOIN `tbl_customer_detail` ON `tbl_order_master`.`user_id` = `tbl_customer_detail`.`customer_id` LEFT JOIN `tbl_shipping_method` ON `tbl_order_master`.`payment_method_id` = `tbl_shipping_method`.`shipping_id` LEFT JOIN `tbl_coupon` ON `tbl_order_master`.`user_id` = `tbl_coupon`.`coupon_id` LEFT JOIN `tbl_order_products` ON `tbl_order_master`.`order_id` = `tbl_order_products`.`order_id` LEFT JOIN `tbl_product_master` ON `tbl_product_master`.`product_id` = `tbl_order_products`.`product_id` LEFT JOIN `tbl_order_status_master` ON `tbl_order_status_master`.`status_id` = `tbl_order_products`.`order_status` WHERE date(tbl_order_master.created_at) >= "'.$startingDate.'" AND date(tbl_order_master.created_at) <= "'.$lastDate.'"')->result_array()[0];

                                $mtdSales = $this->db->query('SELECT SUM(order_item.price * order_item.quantity) AS "Sale", count(*) AS "Qty" FROM orders
                                    LEFT JOIN user ON orders.user_id = user.id
                                    LEFT JOIN order_item ON orders.id = order_item.order_id
                                    LEFT JOIN product ON order_item.product_id = product.id
                                    WHERE date(orders.created_at) >= "'.$startingDate.'" AND date(orders.created_at) <= "'.$lastDate.'" ')->result_array()[0];

                                // $lmtdSales = $this->db->query('SELECT SUM(tbl_order_products.variant_price * tbl_order_products.product_quantity) AS "Sale", count(*) AS "Qty" FROM `tbl_order_master` LEFT JOIN `tbl_customer_detail` ON `tbl_order_master`.`user_id` = `tbl_customer_detail`.`customer_id` LEFT JOIN `tbl_shipping_method` ON `tbl_order_master`.`payment_method_id` = `tbl_shipping_method`.`shipping_id` LEFT JOIN `tbl_coupon` ON `tbl_order_master`.`user_id` = `tbl_coupon`.`coupon_id` LEFT JOIN `tbl_order_products` ON `tbl_order_master`.`order_id` = `tbl_order_products`.`order_id` LEFT JOIN `tbl_product_master` ON `tbl_product_master`.`product_id` = `tbl_order_products`.`product_id` LEFT JOIN `tbl_order_status_master` ON `tbl_order_status_master`.`status_id` = `tbl_order_products`.`order_status` WHERE date(tbl_order_master.created_at) >= "'.$lastMonthDate.'" AND date(tbl_order_master.created_at) <= "'.$lastMonthDateEnd.'"')->result_array()[0];

                                $lmtdSales = $this->db->query('SELECT SUM(order_item.price * order_item.quantity) AS "Sale", count(*) AS "Qty" FROM orders
                                    LEFT JOIN user ON orders.user_id = user.id
                                    LEFT JOIN order_item ON orders.id = order_item.order_id
                                    LEFT JOIN product ON order_item.product_id = product.id
                                    WHERE date(orders.created_at) >= "'.$lastMonthDate.'" AND date(orders.created_at) <= "'.$lastMonthDateEnd.'" ')->result_array()[0];

                                // $lmSales = $this->db->query('SELECT SUM(tbl_order_products.variant_price * tbl_order_products.product_quantity) AS "Sale", count(*) AS "Qty" FROM `tbl_order_master` LEFT JOIN `tbl_customer_detail` ON `tbl_order_master`.`user_id` = `tbl_customer_detail`.`customer_id` LEFT JOIN `tbl_shipping_method` ON `tbl_order_master`.`payment_method_id` = `tbl_shipping_method`.`shipping_id` LEFT JOIN `tbl_coupon` ON `tbl_order_master`.`user_id` = `tbl_coupon`.`coupon_id` LEFT JOIN `tbl_order_products` ON `tbl_order_master`.`order_id` = `tbl_order_products`.`order_id` LEFT JOIN `tbl_product_master` ON `tbl_product_master`.`product_id` = `tbl_order_products`.`product_id` LEFT JOIN `tbl_order_status_master` ON `tbl_order_status_master`.`status_id` = `tbl_order_products`.`order_status` WHERE date(tbl_order_master.created_at) >= "'.$lastMonthDate.'" AND date(tbl_order_master.created_at) <= "'.$lastMonthDateEnd2.'"')->result_array()[0];

                                $lmSales = $this->db->query('SELECT SUM(order_item.price * order_item.quantity) AS "Sale", count(*) AS "Qty" FROM orders
                                    LEFT JOIN user ON orders.user_id = user.id
                                    LEFT JOIN order_item ON orders.id = order_item.order_id
                                    LEFT JOIN product ON order_item.product_id = product.id
                                    WHERE date(orders.created_at) >= "'.$lastMonthDate.'" AND date(orders.created_at) <= "'.$lastMonthDateEnd2.'" ')->result_array()[0];

                                // $ytdSales = $this->db->query('SELECT SUM(tbl_order_products.variant_price * tbl_order_products.product_quantity) AS "Sale", count(*) AS "Qty" FROM `tbl_order_master` LEFT JOIN `tbl_customer_detail` ON `tbl_order_master`.`user_id` = `tbl_customer_detail`.`customer_id` LEFT JOIN `tbl_shipping_method` ON `tbl_order_master`.`payment_method_id` = `tbl_shipping_method`.`shipping_id` LEFT JOIN `tbl_coupon` ON `tbl_order_master`.`user_id` = `tbl_coupon`.`coupon_id` LEFT JOIN `tbl_order_products` ON `tbl_order_master`.`order_id` = `tbl_order_products`.`order_id` LEFT JOIN `tbl_product_master` ON `tbl_product_master`.`product_id` = `tbl_order_products`.`product_id` LEFT JOIN `tbl_order_status_master` ON `tbl_order_status_master`.`status_id` = `tbl_order_products`.`order_status` WHERE date(tbl_order_master.created_at) >= "'.$startingMonth.'" AND date(tbl_order_master.created_at) <= "'.$lastDate.'"')->result_array()[0];

                                $ytdSales = $this->db->query('SELECT SUM(order_item.price * order_item.quantity) AS "Sale", count(*) AS "Qty" FROM orders
                                    LEFT JOIN user ON orders.user_id = user.id
                                    LEFT JOIN order_item ON orders.id = order_item.order_id
                                    LEFT JOIN product ON order_item.product_id = product.id
                                    WHERE date(orders.created_at) >= "'.$startingMonth.'" AND date(orders.created_at) <= "'.$lastDate.'" ')->result_array()[0];
                                
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>GMV</th>
                                                        <th>MTD (<?php echo $startingDate.' - '.$lastDate; ?>)</th>
                                                        <th>LMTD (<?php echo $lastMonthDate.' - '.$lastMonthDateEnd; ?>) </th>
                                                        <th>LM (<?php echo $lastMonthDate.' - '.$lastMonthDateEnd2; ?>)</th>
                                                        <th>YTD (<?php echo $startingMonth.' - '.$lastDate; ?>)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Ecom</strong></td>
                                                        <td>
                                                            <?php echo $ecomMTDQty = !empty($mtdSales['Qty'])? number_format(round($mtdSales['Qty'],2)):0; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomLMTDQty = !empty($lmtdSales['Qty'])? number_format(round($lmtdSales['Qty'],2)):0; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomLMQty = !empty($lmSales['Qty'])? number_format(round($lmSales['Qty'],2)):0; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomYTDQty = !empty($ytdSales['Qty'])? number_format(round($ytdSales['Qty'],2)):0; ?>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><strong>Total</strong></td>
                                                        <td>
                                                            <?php echo ($ecomMTDQty);  ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($ecomLMTDQty);  ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($ecomLMQty);  ?>
                                                        </td>
                                                        <td>
                                                            <?php echo ($ecomYTDQty);  ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="panel">
                                        <div class="panel-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>GMV</th>
                                                        <th>MTD (<?php echo $startingDate.' - '.$lastDate; ?>)</th>
                                                        <th>LMTD (<?php echo $lastMonthDate.' - '.$lastMonthDateEnd; ?>) </th>
                                                        <th>LM (<?php echo $lastMonthDate.' - '.$lastMonthDateEnd2; ?>)</th>
                                                        <th>YTD (<?php echo $startingMonth.' - '.$lastDate; ?>)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Ecom</strong></td>
                                                        <td>
                                                            <?php echo $ecomMTD = !empty($mtdSales['Sale'])? number_format(round($mtdSales['Sale'],2)):0; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomLMTD = !empty($lmtdSales['Sale'])? number_format(round($lmtdSales['Sale'],2)):0; ?>                                 
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomLM = !empty($lmSales['Sale'])? number_format(round($lmSales['Sale'],2)):0; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomYTD = !empty($ytdSales['Sale'])? number_format(round($ytdSales['Sale'],2)):0; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Total</strong></td>
                                                        <td>
                                                            <?php echo $ecomMTD; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomLMTD;  ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomLM;  ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $ecomYTD; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if ($orderPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/orders'); ?>">Orders</a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('orders'); ?> 
                            </span>
                            <div class="m--space-40"></div>

                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($productPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/product'); ?>">Products</a>
                            </h4>
                            <br>
                            <span class="m-widget24__stats m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('product'); ?> 
                            </span>
                            <div class="m--space-40"></div>

                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($productAttribPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<?php echo base_url('admin/attribute') ?>">Product Attribute</a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('attribute_name'); ?> 
                            </span>
                            <div class="m--space-40"></div>

                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($catLv1Perm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<?php echo base_url('admin/category-level-1') ?>">Category Level 1</a>
                            </h4>
                            <br>
                            <span class="m-widget24__stats m--font-danger">
                                <?php echo "<br>".$this->db->get_where('category', array('parent' => 0))->num_rows(); ?>
                            </span>
                            <div class="m--space-40"></div>

                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($catLv2Perm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/category-level-2'); ?>">Category Level 2 </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-danger">
                                <?php echo "<br>".$this->db->get_where('category', array('parent !=' => 0))->num_rows(); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($promoCodePerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/promo-code'); ?>">Promo Code </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('promo_code'); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($pincodePerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/pincode'); ?>">Pincode </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('pincode'); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($customersPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/customers'); ?>">Customers </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('user'); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($bannerPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/banner'); ?>">Banner </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('banner'); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($userPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/user-rights'); ?>">Admin Users </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('admins'); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($auditPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="<? echo base_url('admin/audit'); ?>">Logs </a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".$this->common->CountByTable('audit'); ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

                <?php if ($orderPerm): ?>
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="m-widget24">
                        <div class="m-widget24__item">
                            <h4 class="m-widget24__title">
                                <a href="#">Payment Recieved</a>
                            </h4>
                            <br>

                            <span class="m-widget24__stats m--font-brand m--font-danger">
                                <? echo "<br>".
                                    $this->db->select('SUM(paid_amount) as paid_amount')->get('orders')->row('paid_amount');
                                ?>
                            </span>
                            <div class="m--space-40"></div>
                        </div>
                    </div>
                </div>
                <?php endif ?>

               
            </div>
        </div>
    </div>


</div>