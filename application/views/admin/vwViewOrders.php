<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
  </div>
  <a href="<? echo base_url('admin/orders') ?>" class="btn btn-success m-btn m-btn--icon">
      <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
  </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

    <div class="m-portlet__body pb-2">
        <table class="table table-bordered tableformat">
            <thead>
                <tr>
                    <th width="30%">Order Id</th>
                    <th width="70%"><?php echo $orderInfo->custom_orderid ?></th>
                </tr>
                <tr>
                    <th width="30%">Invoice Number</th>
                    <th width="70%"><?php echo $orderInfo->invoice_number ?></th>
                </tr>
                <tr>
                    <th width="30%">Name</th>
                    <th width="70%"><?php echo $orderInfo->first_name.' '.$orderInfo->last_name ?></th>
                </tr>
                <tr>
                    <th width="30%">Email</th>
                    <th width="70%"><?php echo $orderInfo->email ?></th>
                </tr>
                <tr>
                    <th width="30%">Mobile</th>
                    <th width="70%"><?php echo $orderInfo->phone_number ?></th>
                </tr>
                <!-- <tr>
                    <th width="30%">Shipping Name</th>
                    <th width="70%"><?php echo $orderInfo->shipping_first_name.' '.$orderInfo->shipping_last_name; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Email</th>
                    <th width="70%"><?php echo $orderInfo->shipping_email; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Phone</th>
                    <th width="70%"><?php echo $orderInfo->shipping_phone; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping State</th>
                    <th width="70%"><?php echo $this->db->get_where('states', array('id' => $orderInfo->shipping_state))->row('state'); ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Country</th>
                    <th width="70%"><?php echo ucwords($orderInfo->shipping_country); ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Address 1</th>
                    <th width="70%">
                        <textarea data-id="<?php echo hash('SHA256', $orderInfo->id) ?>" id="shipping_address_1" class="form-control" name="shipping_address_1"><?php echo $orderInfo->shipping_address_1; ?></textarea>
                        <span id="shipping_address_1_Err"></span>
                    </th>
                </tr>
                <tr>
                    <th width="30%">Shipping Address 2</th>
                    <th width="70%">
                        <textarea data-id="<?php echo hash('SHA256', $orderInfo->id) ?>" id="shipping_address_2" class="form-control" name="shipping_address_2"><?php echo $orderInfo->shipping_address_2; ?></textarea>
                        <span id="shipping_address_2_Err"></span>
                    </th>
                </tr> -->

                <tr>
                    <th width="30%">Shipping Name</th>
                    <th width="70%"><?php echo $orderInfo->billing_first_name.' '.$orderInfo->billing_last_name; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Email</th>
                    <th width="70%"><?php echo $orderInfo->billing_email; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Phone</th>
                    <th width="70%"><?php echo $orderInfo->billing_phone; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping State</th>
                    <th width="70%"><?php echo $orderInfo->billing_state; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping City</th>
                    <th width="70%"><?php echo $orderInfo->billing_city; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Country</th>
                    <th width="70%">India</th>
                </tr>
                <tr>
                    <th width="30%">Shipping Address 1</th>
                    <th width="70%"><?php echo $orderInfo->billing_address_1; ?></th>
                </tr>
                <tr>
                    <th width="30%">Shipping Address 2</th>
                    <th width="70%"><?php echo $orderInfo->billing_address_2; ?></th>
                </tr>

                <tr>
                    <th width="30%">Shipping Pincode</th>
                    <th width="70%"><?php echo $orderInfo->billing_pincode; ?></th>
                </tr>

                <tr>
                    <th width="30%">Is Billing Address Same</th>
                    <th width="70%"><?php echo $orderInfo->is_billing_same? 'Yes':'No'; ?></th>
                </tr>
                <?php if (!$orderInfo->is_billing_same): ?>
                <tr>
                    <th width="30%">Billing Name</th>
                    <th width="70%"><?php echo $orderInfo->billing_first_name.' '.$orderInfo->billing_last_name; ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing Email</th>
                    <th width="70%"><?php echo $orderInfo->billing_email; ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing Phone</th>
                    <th width="70%"><?php echo $orderInfo->billing_phone; ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing State</th>
                    <th width="70%"><?php echo $this->db->get_where('states', array('id' => $orderInfo->billing_state))->row('state'); ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing Country</th>
                    <th width="70%"><?php echo ucwords($orderInfo->billing_country); ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing Address 1</th>
                    <th width="70%"><?php echo $orderInfo->billing_address_1; ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing Address 2</th>
                    <th width="70%"><?php echo $orderInfo->billing_address_2; ?></th>
                </tr>
                <tr>
                    <th width="30%">Billing Pincode</th>
                    <th width="70%"><?php echo $orderInfo->billing_pincode; ?></th>
                </tr>
                <?php endif ?>
                
                <tr>
                    <th width="30%"><strong>PAN</strong></th>
                    <th width="70%"><?php echo ucwords($orderInfo->pan); ?></th>
                </tr>

                <!-- <tr>
                    <th width="30%">Gift Message</th>
                    <th width="70%"><?php echo ucwords($orderInfo->gift_message); ?></th>
                </tr> -->

                <tr>
                    <th width="30%">Order Status</th>
                    <th width="70%"><?php echo ucwords($orderInfo->order_status); ?></th>
                </tr>
                <tr>
                    <th width="30%">Order Date</th>
                    <th width="70%"><?php echo date('d-m-Y h:i:s A', strtotime($orderInfo->created_at)); ?></th>
                </tr>
                <tr>
                    <th width="30%">Delivery Charges</th>
                    <th width="70%"><?php echo $orderInfo->delivery_charges; ?></th>
                </tr>
                <tr>
                    <th width="30%">Discount</th>
                    <th width="70%"><?php echo $orderInfo->discount; ?></th>
                </tr>
                <tr>
                    <th width="30%">Promo Code</th>
                    <th width="70%"><?php echo $orderInfo->promo_code; ?></th>
                </tr>
                <tr>
                    <th width="30%">Sub Total</th>
                    <th width="70%"><?php echo $orderInfo->sub_total; ?></th>
                </tr>
                <tr>
                    <th width="30%">GST</th>
                    <th width="70%"><?php echo $orderInfo->gst; ?></th>
                </tr>
                <tr>
                    <th width="30%">Paid Amount</th>
                    <th width="70%"><?php echo $orderInfo->paid_amount; ?></th>
                </tr>
                <tr>
                    <th width="30%">IP Address</th>
                    <th width="70%"><?php echo $orderInfo->ip_address; ?></th>
                </tr>
                <tr>
                    <th width="30%">Razorpay Payment Id</th>
                    <th width="70%"><?php echo $orderInfo->razorpay_payment_id; ?></th>
                </tr>
                <tr>
                    <th width="30%">Razorpay Order Id</th>
                    <th width="70%"><?php echo $orderInfo->razorpay_order_id; ?></th>
                </tr>
                <tr>
                    <th width="30%">Razorpay Payment Status</th>
                    <th width="70%">
                        <?php 

                            $razorData = $this->Master_model->razorpay_payment_status($orderInfo->razorpay_payment_id);

                            if (!empty($razorData)) {
                                echo "<b>Paid Amount: </b>".($razorData->amount/100)."<br>";
                                echo "<b>Status: </b>".ucwords($razorData->status)."<br>";
                                echo "<b>Amount Refund: </b>".$razorData->amount_refunded."<br>";
                                echo "<b>Refund Status: </b>".$razorData->refund_status."<br>";
                                echo "<b>Fees: </b>".($razorData->fee/100)."<br>";
                                echo "<b>Tax: </b>".($razorData->tax/100);
                            }

                        ?>
                    </th>
                </tr>
                <tr>
                    <th width="30%">Change Order Status</th>
                    <th width="70%">
                        <form method="post" id="changeOrderStatusForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select name="order_status" class="form-control">

                                            <?php 
                                                $odrStat = $orderInfo->order_status;
                                            ?>

                                            <option <?= $odrStat == 'Order Confirmed'? 'selected':''; ?> value="order_confirmed">Order Confirmed</option>

                                            <option <?= $odrStat == 'Approved'? 'selected':''; ?> value="approved">Approved</option>

                                            <option <?= $odrStat == 'Hold'? 'selected':''; ?> value="hold">Hold</option>

                                            <option <?= $odrStat == 'Order Shipped'? 'selected':''; ?> value="order_shipped">Order Shipped</option>

                                            <option <?= $odrStat == 'Order Delivered'? 'selected':''; ?> value="order_delivered">Order Delivered</option>

                                            <option <?= $odrStat == 'Order Delivery Attempt Failed - RTO'? 'selected':''; ?> value="order_delivery_attempt_failed_rto">Order Delivery Attempt Failed - RTO</option>

                                            <option <?= $odrStat == 'Order Delivery Attempt Failed- Refund Processed'? 'selected':''; ?> value="order_delivery_attempt_failed_refund_processed">Order Delivery Attempt Failed- Refund Processed</option>

                                            <option <?= $odrStat == 'Order Cancellation'? 'selected':''; ?> value="order_cancellation">Order Cancellation</option>

                                            <option <?= $odrStat == 'Order Cancelled - Refund Processed'? 'selected':''; ?> value="order_cancelled_refund_processed">Order Cancelled - Refund Processed</option>

                                            <option <?= $odrStat == 'Customer Return Initiated - RVP'? 'selected':''; ?> value="customer_return_initiated_rvp">Customer Return Initiated - RVP</option>

                                            <option <?= $odrStat == 'Reverse Pickup Done'? 'selected':''; ?> value="reverse_pickup_done">Reverse Pickup Done</option>

                                            <option <?= $odrStat == 'Reverse Pickup Delivered'? 'selected':''; ?> value="reverse_pickup_delivered">Reverse Pickup Delivered</option>

                                            <option <?= $odrStat == 'RVP Refund Processed'? 'selected':''; ?> value="rvp_refund_processed">RVP Refund Processed</option>

                                            <option <?= $odrStat == 'RVP Refund Denied'? 'selected':''; ?> value="rvp_refund_denied">RVP Refund Denied</option>

                                            <option <?= $odrStat == 'Order Cancellation - By Customer'? 'selected':''; ?> value="order_cancellation_by_customer">Order Cancellation - By Customer</option>
                                        </select>
                                        <span id="order_statusErr" class="removeErr text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea rows="1" name="order_notes" class="form-control" placeholder="Order Note"><?php echo $orderInfo->order_notes ?></textarea>
                                        <span id="order_notesErr" class="removeErr text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="awb_number" class="form-control" placeholder="Enter AWB Number" value="<?php echo $orderInfo->awb_number ?>">
                                        <span id="awb_numberErr" class="removeErr text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <textarea rows="1" name="tracking_link" class="form-control" placeholder="Enter Tracking Link"><?php echo $orderInfo->tracking_link ?></textarea>
                                        <span id="tracking_linkErr" class="removeErr text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" name="order_id" value="<?php echo hash('SHA256', $orderInfo->id); ?>">
                                    <button id="btnOrderStatus" type="submit" class="btn btn-primary">Save</button>
                                </div>
                                <div class="col-md-12">
                                    <div id="orderStatusMsg"></div>
                                </div>
                            </div>
                        </form>
                    </th>
                </tr>
                <tr>
                    <th width="30%">Order Status History</th>
                    <th width="70%">
                        <table>
                            <tbody id="orderStatusHistoryData">
                                <?php 
                                    if (!empty($orderStatusHistory)):
                                        foreach($orderStatusHistory as $history):
                                ?>
                                <tr>
                                    <td width="360px">
                                        <?php echo $history->order_status ?>
                                    </td>
                                    <td width="360px">
                                        <?php echo $history->order_notes ?>
                                    </td>
                                    <td width="250px">
                                        <?php echo date('d-m-Y h:i:s A', strtotime($history->created_at)) ?>
                                    </td>
                                </tr>
                                <?php endforeach; endif; ?>
                            </tbody>
                        </table>
                    </th>
                </tr>
            </thead>
        </table>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product QTY</th>                
                    <th>Product Total</th>
                </thead>
                <tbody>
                <?php 
                    if (!empty($orders)):
                        foreach($orders as $order):
                ?>
                  <tr>
                    <td>
                        <img style="max-width: 80px" src="<?php echo base_url($order->image_path) ?>">
                    </td>
                    <td>
                        <a target="_blank" href="<?php echo base_url($order->slug) ?>"><?php echo $order->product_name ?></a>
                    </td>
                    <td><?php echo $order->price ?></td>
                    <td><?php echo $order->quantity ?></td>
                    <td><?php echo number_format($order->price*$order->quantity,2) ?></td>
                  </tr>
                <?php endforeach; endif; ?>
              </tbody>
          </table>
      </div>

  </div>

</div>
</div>
