<div class="contact-area">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <i class="fa fa-check-circle" style=" font-size: 10rem; color: green; "></i>
                <p></p>
               <h1>Thank You!</h1>
               <h3>Your Order is Placed Successfully</h3>
            </div>
            <div class="col-md-12 text-center">
                <div style="background:white; padding:1rem;width:80%;margin-top:2rem;margin-bottom:2rem; margin-left:auto;margin-right:auto;" >
                    
                    <div style="font-size: 2rem; padding-top: 1rem;">                        
                        <p><strong>Order Id :</strong> <span><?php echo $orderData['custom_orderid'] ?></span></p>
                        <p>Date: <span><?php echo date('d-M-Y') ?></span></p>
                    </div>
                    
                    <hr>
                    <div>
                        <p>Your order is placed successfully. An email has been sent to you with further details.</p>
                    </div>
                    
                </div>
                
            </div>
            
            
            
            <div class="col-md-12">
                <div class="all-product text-center">
                <a href="<?php echo base_url('profile') ?>">Visit Profile</a>
                </div>
            </div>
           
        </div>
    </div>
</div>

<script type="text/javascript">
    paidAmount = '<?php echo $orderData["paid_amount"]; ?>'
    fbq('track', 'Purchase', {value: paidAmount, currency: 'INR'});

    dataLayer.push({ ecommerce: null });  // Clear the previous ecommerce object.
    dataLayer.push({
      event: "purchase",
      ecommerce: <?php echo $items; ?>
    });
</script>