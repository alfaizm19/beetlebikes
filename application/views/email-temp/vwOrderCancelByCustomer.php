<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true"
        href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <title>Order Cancel</title>
    <meta property="og:title" content="Email template">

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style type="text/css">
        table{width: 100%;padding: 10px;}
        a {
            text-decoration: underline;
            color: inherit;
            font-weight: bold;
            color: #253342;
        }

        h1 {
            font-size: 56px;
            padding: 0;
            margin: 0;
        }

        h2 {
            font-size: 22px;
            font-weight: 900;
            padding: 0;
            margin: 0;
        }

        h3{
            font-size: 18px;
            padding: 0;
            margin: 0;
        }

        p {
            font-size: 16px;
            font-weight: 100;
            padding: 0;
            margin: 0;
        }

        td {
            vertical-align: top;
        }

        #email {
            margin: auto;
            width: 600px;
            background-color: white;
        }
        .social_icons{
            float: right;
            position: relative;
            z-index: 1;
            margin-top: -40px;
        }
        .tw{
            right: 94px;
        }
        .fb{
            right: 70px;
        }
        .lnk{
            right: 37px;
        }
        .button{
            background: dodgerblue;
            border: 1px solid dodgerblue;
            padding: 10px;
            border-radius: 5px;
            color: white;
            margin-top: 7px;
        }
        .plr10{padding-left: 10px;padding-right: 10px;}
    </style>

</head>

<body bgcolor="#F5F8FA"
    style="width: 100%; margin: auto 0; padding:0; font-family:Lato, sans-serif; font-size:18px; color:#33475B; word-break:break-word">

    <! View in Browser Link -->

        <div id="email">
            <table style="background-color: #2baadb;">
                <tbody>
                    <tr style="display: flex;justify-content: space-between;align-items: center;">
                        <td style="width: 30%;">
                            <img src="<?php echo base_url('assets/front/') ?>img/logo/logo.png" alt="" style="width: 120px;">
                        </td>
                        <td style="width: 70%;">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <table>
                <tr>
                    <td>
                        <h2 style="color: #2ba8db;">Hello <?php echo $orderInfo->billing_first_name ?>,</h2>
                        <p>Cancellation for your order #<?php echo strtoupper($orderInfo->custom_orderid) ?> has been processed. You can track your refund status on the MY ORDERS section of the website.</p>
                    </td>
                </tr>
            </table>
            <table style="border-top: 2px solid #2ba8db;">
                <tr>
                    <td style="width: 50%;">
                        <p><b>The following item(s) were cancelled:</b></p>
                    </td>
                </tr>
            </table> 

            <table style="padding-left: 0;padding-right: 0;">
                <tr>
                    <td colspan="3" style="padding-bottom: 10px;">
                        <h3 class="plr10" style="color: #2ba8db;">Order Details</h3>
                        <hr>
                        <p class="plr10"><b>Order #</b><?php echo strtoupper($orderInfo->custom_orderid) ?></p>
                        <p class="plr10">Placed on <?php echo date('l, F, d, Y', strtotime($orderInfo->created_at)) ?></p>
                    </td>
                </tr>
                <?php if (!empty($orderDetails)): ?>
                    <?php foreach ($orderDetails as $order): ?>
                        
                    <tr>
                        <td style="width: 25%;padding-left: 10px;text-align: center;vertical-align: middle;">
                            <img src="<?php echo base_url($order->image_path) ?>" width="100" alt="">
                        </td>
                        <td style="width: 60%;">
                            <p style="color: #2ba8db;"><b>
                                <?php echo $order->product_name ?>
                            </b></p>
                            <p>Beetle Product</p>
                            <p>Sold by <b>Beetle Bikes</b></p>
                            <p>Rs. <?php echo $order->quantity ?>*<?php echo $order->price ?></p>
                        </td>
                        <td style="padding-right: 10px;">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <span style="display: block;border-bottom: 1px solid lightgray;width: 90%;margin: 0 auto;"></span>
                        </td>
                    </tr>

                <?php endforeach ?>

                <?php endif ?>
                <tr>
                    <td colspan="2" style="text-align: right;padding-right: 40px;">
                        <p>Item Subtotal:</p>
                        <p>Shipping & Handing:</p>
                        <p><b>Order Total:</b></p>
                    </td>
                    <td>
                        <p>Rs.<?php echo $orderInfo->sub_total ?></p>
                        <p>Rs.<?php echo !empty($orderInfo->discount)? $orderInfo->discount:0.00; ?></p>
                        <p><b>Rs.<?php echo $orderInfo->paid_amount ?></b></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span style="display: block;border-bottom: 1px solid lightgray;width: 90%;margin: 0 auto;"></span>
                    </td>
                </tr>
            </table>      

            <table>
                <tr>
                    <td>
                        <p style="padding-bottom: 15px;">We have initiated a refund of the amount paid to the source account. It should reflect in your source account with the next 5-7 business days.</p>
                        <p style="padding-bottom: 15px;">Please note if you paid using EMI on credit card, this refund may cause a change in the terms of your EMI with your credit card issuer. Kindly check with your Credit Card issuer on how your EMI will be affected. </p>
                        <p style="padding-bottom: 15px;">If you have any feedback or questions you can contact us at-<a href="#" style="text-decoration: none;color: #2ba8db;">support@beetlebikes.in</a></p>
                        <p style="padding-bottom: 15px;">Thank you for shopping with us!</p>
                        <div style="display: flex;justify-content: space-between;align-items: center;padding-bottom: 8px;">
                            <p style="color: #2ba8db;"><b>Team Beetle Bikes</b></p>
                            <div style="width:20%;display: flex;justify-content: space-around;align-items: center;">
                                <a href="https://www.facebook.com/BeetleBikes/">
                                    <img src="<?php echo base_url('assets/front/img/') ?>fb.png" alt="" width="25">
                                </a>
                                <a href="https://www.instagram.com/beetle_bikes_india/">
                                    <img src="<?php echo base_url('assets/front/img/') ?>insta.png" alt="" width="25">
                                </a>
                                <a href="https://www.youtube.com/channel/UCy_Z7AemC7LwoVCo34-msZA">
                                    <img src="<?php echo base_url('assets/front/img/') ?>youtube.png" alt="" width="30">
                                </a>
                            </div>
                        </div>
                        <hr style="border: 1px solid #2ba8db;">
                    </td>
                </tr>
            </table>   
        </div>
</body>

</html>