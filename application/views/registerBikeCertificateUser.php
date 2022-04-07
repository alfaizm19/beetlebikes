<!DOCTYPE html>
<html>
<head>
	<title>Certificate</title>
	<style>
		
		.main{padding: 3.5rem 3rem;}
		.certificate{
			/*display: flex;
			justify-content: center;
			align-items: center;*/
			padding-top: 1rem;
			border: 1px solid black;
			height: 600px;
			position: relative;
			z-index: 1;
		}
		
		.certificate h1{
			color: #00000021;
			font-size: 8rem;
			transform: rotate(-20deg);
			margin: 0;
		}
		.top{
			width: 100%;
			display: flex;
			align-items: center;
			margin-bottom: 2rem;
			position: relative;
		}
		.top h2{
			font-size: 1.8rem;
		}
		.main-head{
			width: 100%;
			text-align: center;
			text-transform: uppercase;
			font-weight: 600;
		}
		.logo{
			width: 15%;
			position: absolute;
			right: 10px;
		}
		.logo img{width: 90%;}
		.label{
			display: flex;
			justify-content: center;
		}
		.input{
			margin-bottom: 1.5rem;
		}
		input{
			border: none;
			border-bottom: 1px dashed;
			width: 100%;
			background-color: transparent;
		}
		input:hover{outline: none;}
		input:focus{outline: none;}
		label{
			font-size: 1.2rem;
			padding-right: 3rem;
			color:black;
		}

		@media print {
	          #printPageButton {
	            display: none !important;
	          }
	        }

	    #printPageButton{
	        margin: 0 auto;
	        display: block;
	        font-size: 25px;
	        margin-top: 15px;
	        padding: 0 15px;
	        cursor: pointer;
	    }
	    .fields{
	        margin-left:1rem;
	    }
	    p{
	        color:black;
	    }
	</style>
	<script type="text/javascript">
        function openPrint() {
            window.print();
        }

        openPrint();
    </script>
</head>
<body>

		<div class="main">
			<div class="certificate">
				<!-- <h1>Fun In The Boxs</h1> -->
				<div class="top">
					<div class="main-head"><h2>Warranty Certificate</h2></div>
					<div class="logo"><img src="<?php echo base_url('assets/front/img/logo/logo.png') ?>" alt=""></div>
				</div>
				<div class="fields">
					<div class="input">
						<div class="label">
							<div style="width: 21%;">
								<label for="name">Customer Name:</label>
							</div>
							<div style="width: 50%;">
								<input type="text" value="<?php echo $registerBikeData['name'] ?>" readonly>
							</div>
						</div>
					</div>
					<div class="input">
						<div class="label">
							<div style="width: 20%;">
								<label for="name">Model Name:</label>
							</div>
							<div style="width: 50%;">
								<input type="text" value="<?php echo $registerBikeData['model'] ?>" readonly>
							</div>
						</div>
					</div>
					<div class="input">
						<div class="label">
							<div style="width: 20%;">
								<label for="name">Chassis Name:</label>
							</div>
							<div style="width: 50%;">
								<input type="text" value="<?php echo $registerBikeData['chassis_no'] ?>" readonly>
							</div>
						</div>
					</div>
					<div class="input">
						<div class="label">
							<div style="width: 20%;">
								<label for="name">Date of Purchase:</label>
							</div>
							<div style="width: 50%;display: flex
							">
								<div style="width: 30%;">
									<input type="text" value="<?php echo $registerBikeData['invoice_date'] ?>" readonly>
								</div>
								<div style="margin-left:1rem; width: 40%;text-align: center;">
									<label for="name">Mobile No:</label>
								</div>
								<div style="width: 40%;">
									<input type="text" value="<?php echo $registerBikeData['phone'] ?>" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="input">
						<div class="label">
							<div style="width: 20%;">
								<label for="name">Email ID:</label>
							</div>
							<div style="width: 50%;">
								<input type="text" value="<?php echo $registerBikeData['email'] ?>" readonly>
							</div>
						</div>
					</div>
					<div class="input">
						<div class="label">
							<div style="width: 20%;">
								<label for="name">City:</label>
							</div>
							<div style="width: 50%;display: flex
							">
								<div style="width: 30%;">
									<input type="text" value="<?php echo $registerBikeData['city'] ?>" readonly>
								</div>
								<div style="width: 30%;text-align: center;">
									<label for="name">State:</label>
								</div>
								<div style="width: 40%;">
									<input type="text" value="<?php echo $registerBikeData['state'] ?>" readonly>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="label">
					<div style="width: 70%; margin-left:2rem;">
						<p style="font-size: 1.3rem;">
							This Warranty Certificate covers the Beetle Bike frame with the above details for a period of 18 months from date of purchase.   
						</p>
						<p>
							<i>For warranty claims, contact Beetle Bikes at: <a href="support@BeetleBikes.in">support@BeetleBikes.in</a></i>
						</p>
						<p>
							<i>For detailed warranty conditions and exclusions, refer to <a href="www.BeetleBikes.in">www.BeetleBikes.in</a></i>
						</p>	
					</div>
				</div>
				<div>
					<p style="padding-left: 1rem;">
						<i>Correctness of data on the Warranty certificate is the customer’s responsibility. Incorrect data may lead to voiding the warranty on the bike.</i>
					</p>
				</div>
			</div>
		</div>

</body>
</html> 