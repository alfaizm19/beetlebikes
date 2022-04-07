<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Invoice</title>
	<style>
		page {
		  background: white;
		  display: block;
		  margin: 0 auto;
		  margin-bottom: 0.5cm;
		}
		page[size="A4"] {  
		  width: 21cm;
		  height: 29.7cm; 
		}
		.main{padding: 3.5rem 3rem;}
		table{
			border: 1px solid gray;
			width: 100%;
			border-collapse: collapse;
		}
		thead{
			display: block;
			border-bottom: 1px solid gray;
			border-collapse: separate;
		}
		.head{
			text-align: left;
			padding-left: 20px;
		}
		p{font-size: .8rem;}
		.head h3{margin: 0;font-weight: 600;}
		.head p{margin-bottom: 0;margin-top: 5px;font-weight: lighter;}
		.head2 h2{
			margin: 0;
			padding-top: 60px;
			text-align: right;
		}
		tbody{
			display: block;
		}
		tbody p{margin: 0;}
		.address p{
			line-height: 1.5;
			padding-left: 5px;
		}
		.name1{
			width: 367px;
		    padding-left: 5px;
		    border-right: 1px solid gray;
		    padding-top: 10px;
		    padding-bottom: 10px;
		}
		.name2{
			padding-left: 5px;
			padding-bottom: 15px;
		}
		.width1{
			width: 30px;
    		border-right: 1px solid gray;
		}
		.width2{
			width: 180px;
    		border-right: 1px solid gray;
		}
		.width3{
			width: 70px;
		    border-right: 1px solid gray;
		}
		.width4{
			width: 60px;
    		border-right: 1px solid gray;
		}
		.width5{
			    width: 70px;
    			border-right: 1px solid gray;
		}
		.width6{
			width: 130px;
    		border-right: 1px solid gray;
    		border-bottom: 1px solid gray;
    		text-align: center;
		}
		.width7{
			width: 90px;
			border-right: none!important;
		}
		.detailed{border-top: none;border-bottom: none;}
		.detailed td{border-right: 1px solid gray;font-size: .8rem;padding-left: 5px;padding-right: 5px;}
		.border-top td{
			border-top: 1px solid gray;
		}
	</style>
</head>
<body>
	<page size="A4">
		<div class="main">
			<table>
				<thead>
					<tr>
						<th style="width: 20%;"><img src="<?php echo base_url('assets/front/') ?>img/logo/logo.png" alt="" width="100"></th>
						<th class="head" style="width: 56.3%;">
							<h3>Movetime Technologies Pvt Ltd</h3>
							<p>
								Cassia Marg,
								<br>
								DLF Phase II,
								<br>
								Gurgaon, Haryana 122002
								<br>
								GSTIN: 06AALCM7497F1ZY
							</p>
						</th>
						<th class="head2" style="width: 25%;">
							<h2>TAX INVOICE</h2>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="address" style="width:30.5%;">
							<p>Invoice Number</p>
							<p>Invoice Date</p>
							<p>Terms</p>
							<p>Due Date</p>
							<p>P.O.#</p>
						</td>
						<td style="width: 27.6%;font-weight: 600;line-height: 1.5;">
							<p>:<?php echo $orderInfo->invoice_number ?></p>
							<p>:<?php echo date('d/m/Y', strtotime($orderInfo->created_at)); ?></p>
							<p>:Advance payment</p>
							<p>:<?php echo date('d/m/Y', strtotime($orderInfo->created_at)); ?></p>
							<p>:<?php echo $orderInfo->custom_orderid ?></p>
						</td>
						<td style="width: 25%;border-left: 1px solid gray;">
							<p style="padding-bottom: 75px;padding-left: 5px;">Place Of Supply</p>
						</td>
						<td style="font-weight: 600;">
							<p style="padding-bottom: 75px;">:<?php echo $orderInfo->billing_state; ?> (<?php echo $this->db->get_where('states', array('state' => $orderInfo->billing_state))->row('tin_number'); ?>)</p>
						</td>
					</tr>
					<tr style="border-top: 1px solid gray;border-bottom: 1px solid gray;display: block;background: rgb(220 220 220 / 40%);">
						<td style="width: 88.4%;border-right: 1px solid gray;padding-left: 5px;">
							<p style="font-weight: 600;">Bill To</p>
						</td>
						<td style="padding-left: 5px;">
							<p style="font-weight: 600;">Ship To</p>
						</td>
					</tr>
					<tr>
						<td class="name1">
							<p style="font-weight: 600;">Mr. <?php echo $orderInfo->billing_first_name.' '.$orderInfo->billing_last_name; ?>
							</p>

							<p><?php echo $orderInfo->billing_address_1 ?></p>

							<?php if (!empty($orderInfo->billing_address_2)): ?>
								<p><?php echo $orderInfo->billing_address_2; ?>,</p>
							<?php endif ?>

							<p><?php echo $orderInfo->billing_city ?>,</p>
							
							<p><?php echo $orderInfo->billing_pincode ?> <?php echo $orderInfo->billing_state ?></p>

							<p>India</p>
						</td>
						<td class="name2">
							<p><?php echo $orderInfo->billing_address_1 ?></p>

							<?php if (!empty($orderInfo->billing_address_2)): ?>
								<p><?php echo $orderInfo->billing_address_2; ?>,</p>
							<?php endif ?>

							<p><?php echo $orderInfo->billing_city ?>,</p>

							<p><?php echo $orderInfo->billing_pincode ?> <?php echo $orderInfo->billing_state ?></p>

							<p>India</p>
						</td>
					</tr>

					<?php if ($orderInfo->billing_state == 'Haryana'): ?>
					
					<tr>
						<table class="detailed">
							<tr style="background: rgb(220 220 220 / 40%);font-weight: 600;">
								<td class="width1">&nbsp;</td>
								<td class="width2">&nbsp;</td>
								<td class="width3">&nbsp;</td>
								<td class="width4">&nbsp;</td>
								<td class="width5">&nbsp;</td>
								<td class="width6" colspan="2">GST</td>
								<td class="width7">&nbsp;</td>
							</tr>
							<tr style="background: rgb(220 220 220 / 40%);font-weight: 600;">
								<td style="text-align: center;">#</td>
								<td>Item & Description</td>
								<td>HSN/SAC</td>
								<td style="text-align: right;">Qty</td>
								<td style="text-align: right;">Rate</td>
								<td style="text-align: right;">CGST</td>
								<td style="text-align: right;">SGST</td>
								<td style="text-align: right;">Amount</td>
							</tr>

							<?php 
								$totalTaxableAmnt = 0;
								$totalTax = 0;
								$i=1; 
								foreach ($orderDetails as $od):

									$price = $od->price;
									$gst = clean_num($od->gst);
									$calGst = ($gst/100)+1;
									$qty = $od->quantity;

									$amntBefTax = round($price/$calGst,2);
									$tax = $price - $amntBefTax;

									$totalTaxableAmnt += $amntBefTax*$qty;

									$totalTax += $tax*$qty;

							?>
							<tr class="border-top">
								<td style="text-align: center;">
									<?php echo $i; ?>
								</td>
								<td><?php echo $od->product_name ?></td>
								<td><?php echo $od->hsn_code ?></td>
								<td style="text-align: right;"><?php echo $qty; ?></td>
								<td style="text-align: right;"><?php echo number_format($price, 2); ?></td>
								<td style="text-align: right;"><?php echo $tax*$qty/2; ?></td>
								<td style="text-align: right;"><?php echo $tax*$qty/2; ?></td>
								<td style="text-align: right;"><?php echo $amntBefTax*$qty; ?></td>
							</tr>

							<?php $i++; endforeach; ?>

						</table>
					</tr>

					<?php else: ?>

						<tr>
							<table class="detailed">
								<tr style="background: rgb(220 220 220 / 40%);font-weight: 600;">
									<td class="width1">&nbsp;</td>
									<td class="width2">&nbsp;</td>
									<td class="width3">&nbsp;</td>
									<td class="width4">&nbsp;</td>
									<td class="width5">&nbsp;</td>
									<td class="width6" colspan="2">IGST</td>
									<td class="width7">&nbsp;</td>
								</tr>
								<tr style="background: rgb(220 220 220 / 40%);font-weight: 600;">
									<td style="text-align: center;">#</td>
									<td>Item & Description</td>
									<td>HSN/SAC</td>
									<td style="text-align: right;">Qty</td>
									<td style="text-align: right;">Rate</td>
									<td style="text-align: right;">%</td>
									<td style="text-align: right;">Amt.</td>
									<td style="text-align: right;">Amount</td>
								</tr>

								<?php 
									$totalTaxableAmnt = 0;
									$totalTax = 0;
									$i=1; 
									foreach ($orderDetails as $od):

										$price = $od->price;
										$gst = clean_num($od->gst);
										$calGst = ($gst/100)+1;
										$qty = $od->quantity;

										$amntBefTax = round($price/$calGst,2);
										$tax = $price - $amntBefTax;

										$totalTaxableAmnt += $amntBefTax*$qty;

										$totalTax += $tax*$qty;

								?>
								<tr class="border-top">
									<td style="text-align: center;">
										<?php echo $i; ?>
									</td>
									<td><?php echo $od->product_name ?></td>
									<td><?php echo $od->hsn_code ?></td>
									<td style="text-align: right;"><?php echo $qty; ?></td>
									<td style="text-align: right;"><?php echo number_format($price, 2); ?></td>
									<td style="text-align: right;"><?php echo $gst; ?>%</td>
									<td style="text-align: right;"><?php echo $tax*$qty; ?></td>
									<td style="text-align: right;"><?php echo $amntBefTax*$qty; ?></td>
								</tr>
								<?php $i++; endforeach; ?>

							</table>
						</tr>

					<?php endif ?>


					<tr>
						<div style="display: flex;width: 99.6%;border: 1px solid gray;">
							<table style="width: 57%;font-size: .8rem;border-right: none;border: none;">
								<tr>
									<td style="padding-top: 5px;padding-left: 5px;padding-bottom: 10px;">Items in Total <?php echo count($orderDetails); ?></td>
								</tr>
								<tr>
									<td style="padding-left: 5px;">Total In Words</td>
								</tr>
								<tr>
									<td style="padding-left: 5px;padding-bottom: 25px;"><i><b><?php echo numToWord($orderInfo->paid_amount); ?></b></i></td>
								</tr>
								<tr style="display: grid;">
									<td style="padding-left: 5px;">Thank you for your business.</td>
									<td style="padding-left: 5px;padding-bottom: 450px;">This is a system generated invoice and doesnt require a signature.</td>
								</tr>
							</table>
							<table style="width: 43%;border-left: none;font-size: .8rem;text-align: right;border-right: none;border-top: none;">
								<tr>
									<td style="padding-right: 30px;padding-left: 5px;padding-top: 5px;width: 175px;border-left: 1px solid gray;">Total Taxable Amount</td>
									<td style="padding-right: 5px;padding-left: 5px;padding-top: 5px;width: 103px;"><?php echo round($totalTaxableAmnt,2); ?></td>
								</tr>

								<?php if ($orderInfo->billing_state == 'Haryana'): ?>
								<tr>
									<td style="padding-right: 30px;padding-left: 5px;border-left: 1px solid gray;">CGST</td>
									<td style="padding-right: 5px;padding-left: 5px;"><?php echo $totalTax/2 ?></td>
								</tr>
								<tr>
									<td style="padding-right: 30px;padding-left: 5px;border-left: 1px solid gray;">SGST</td>
									<td style="padding-right: 5px;padding-left: 5px;"><?php echo $totalTax/2 ?></td>
								</tr>
								<?php else: ?>
								<tr>
									<td style="padding-right: 30px;padding-left: 5px;border-left: 1px solid gray;">IGST</td>
									<td style="padding-right: 5px;padding-left: 5px;"><?php echo $totalTax ?></td>
								</tr>
								<?php endif; ?>


								<tr>
									<td style="padding-right: 30px;padding-left: 5px;border-left: 1px solid gray;"><b>Total</b></td>
									<td style="padding-right: 5px;padding-left: 5px;"><b>Rs. <?php echo number_format($orderInfo->paid_amount, 2); ?></b></td>
								</tr>
								<tr>
									<td style="padding-right: 30px;padding-left: 5px;border-left: 1px solid gray;">Payment Made</td>
									<td style="padding-right: 5px;padding-left: 5px;color: red;">(-) <?php echo number_format($orderInfo->paid_amount, 2); ?></td>
								</tr>
								<tr>
									<td style="padding-right: 30px;padding-left: 5px;border-left: 1px solid gray;border-bottom: 1px solid gray;"><b>Balance Due</b></td>
									<td style="padding-right: 5px;padding-left: 5px;border-bottom: 1px solid gray;"><b>Rs.0.00</b></td>
								</tr>
								<!-- <tr>
									<td style="border-left: 1px solid gray;padding-top: 70px;">Authorized Signature</td>
									<td style="padding-right: 5px;padding-left: 5px;">&nbsp;
									</td>
								</tr> -->
							</table>
						</div>
					</tr>
				</tbody>
			</table>
		</div>
	</page>
</body>
</html>