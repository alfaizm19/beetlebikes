<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true"
        href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <title>Reviews</title>
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
        /*  
         * Rating styles
         */
        .rating {
            direction: rtl;
            float: left;
            font-size: 45px;
            overflow:hidden;
        }
        .rating input {
          float: right;
          opacity: 0;
          position: absolute;
        }
        .rating a,
        .rating label {
            float:right;
            color: gainsboro;
            text-decoration: none;
            -webkit-transition: color .4s;
            -moz-transition: color .4s;
            -o-transition: color .4s;
            transition: color .4s;
        }
        .rating label:hover ~ label,
        .rating input:focus ~ label,
        .rating label:hover,
        .rating a:hover,
        .rating a:hover ~ a,
        .rating a:focus,
        .rating a:focus ~ a     {
            color: orange;
            cursor: pointer;
        }
        .rating2 a {
            float:none;
        }
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
                        <h2>How did this item meet your expectations?</h2>
                    </td>
                </tr>
            </table>  
            <table style="border-top: 2px solid #2ba8db;padding-bottom: 0;">
                <?php if (!empty($orderDetails)): ?>
                    
                <?php foreach ($orderDetails as $order): ?>    
                <tr>
                    <td style="width: 50%;padding-left: 15px;">
                        <img src="<?php echo base_url($order->image_path) ?>" width="120" alt="">
                    </td>
                    <td style="width: 50%;">
                        <p><?php echo $order->product_name ?></p>
                        <p style="padding-bottom: 20px;">Sold by <b>Beetle Bikes</p>
                        <p style="color: #2ba8db;">
                            <a href="<?php echo base_url('login') ?>">Start by rating it</a>
                        </p>
                        <p>
                           <div class="rating rating2"><!--
                                --><a href="#5" title="Give 5 stars">★</a><!--
                                --><a href="#4" title="Give 4 stars">★</a><!--
                                --><a href="#3" title="Give 3 stars">★</a><!--
                                --><a href="#2" title="Give 2 stars">★</a><!--
                                --><a href="#1" title="Give 1 star">★</a>
                            </div>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <?php endforeach; endif; ?>
            </table>  
            <table style="padding-left: 0;padding-right: 0;padding-top: 0;">
                <tr>
                    <td style="padding-bottom: 10px;">
                        <h3 class="plr10" style="color: #2ba8db;padding-left: 30px;padding-bottom: 20px;">Review your purchases</h3>
                        <p class="plr10" style="padding-left: 30px;">Check out beetle bikes to find past purchases to review.</p>
                    </td>
                </tr>
                    <td>
                        <span style="display: block;border-bottom: 1px solid lightgray;width: 90%;margin: 0 auto;"></span>
                    </td>
                </tr>
            </table>      
            <table>
                <tr>
                    <td>
                        <!-- <p style="padding-bottom: 10px;">We hope you found this message to be useful. If you'd rather not receive future e-mails of this sort from Beetle Bikes at <b>Email</b>, please opt-out <b>here.</b></p>
                        <p style="padding-bottom: 15px;"><b>Beetle Bikes</b> Marketplace platform: Products sold by a Marketplace seller are subject to that seller's terms and conditions of sale. See <b>Website</b> for details. Reference 66471421.</p> -->
                        <div style="display: flex;justify-content: space-between;align-items: center;padding-bottom: 8px;">
                            <p style="color: #2ba8db;"><b>Beetle Bikes</b></p>
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