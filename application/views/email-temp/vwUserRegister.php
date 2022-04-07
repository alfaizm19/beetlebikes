<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:v="urn:schemas-microsoft-com:vml" lang="en">

<head>
    <link rel="stylesheet" type="text/css" hs-webfonts="true"
        href="https://fonts.googleapis.com/css?family=Lato|Lato:i,b,bi">
    <title>User Registration</title>
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
        					<img src="<?php echo base_url('assets/front/') ?>/img/logo/logo.png" alt="" style="width: 120px;">
        				</td>
        				<td style="width: 70%;">&nbsp;</td>
        			</tr>
        		</tbody>
        	</table>
        	<table>
        		<tr>
        			<td>
        				<h2 style="padding-bottom: 10px;">Hi <b><?php echo $name ?>,</b></h2>
                        <p style="padding-bottom: 40px;">Welcome to Beetle Bikes!</p>
                        <p>We are glad to have you in our family! 
                        Go ahead, make your first purchase.
                        <br>
                        <br>
                        Thank you!
                        </p>
                        <a href="<?php echo base_url('login') ?>"><button class="button" style="margin-bottom: 50px;">Click here to begin</button></a>
                        <div style="display: flex;justify-content: space-between;align-items: center;padding-bottom: 40px;">
                            <p>Team Beetle Bikes</p>
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
        			</td>
        		</tr>
        	</table>  
        	                          
        </div>
</body>

</html>