
<!--breadcrumbs-area start -->
<div class="breadcrumbs-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs-area end -->

   <!--contact-area start-->
    <div class="contact-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-message">
                        <h4>Leave Message</h4>
                        <form id="contact-form" action="<?php echo base_url('ajax/contact') ?>" method="post">
                            
                            <div class="single-input">
                                <input name="name" type="text" placeholder="Full Name">
                            </div>
                            <div class="single-input input-pd">
                                <input name="email" type="text" placeholder="E-mail">
                            </div>

                            <span class="text-danger removeErr nameErr"></span>
                            <span class="text-danger removeErr emailErr pull-right"></span>

                            <div class="single-input">
                                <input name="city" type="text" placeholder="city">
                            </div>
                            <div class="single-input input-pd">
                                <input name="phone" type="text" placeholder="phone">
                            </div>

                            <span class="text-danger removeErr cityErr"></span>
                            <span class="text-danger removeErr phoneErr pull-right"></span>

                            <div class="single-input">
                                <textarea name="message" class="form_control" placeholder="Message"></textarea>
                            </div>

                            <span class="text-danger removeErr messageErr"></span>

                            <div id="contact-formMsg"></div>

                            <div class="send-button">
                                <button id="contact-formBtn" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="google-address">
                        
                        
                        <div class="single-service">
                            <div class="service-icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="service-cont">
                                <h5>E-mail Address</h5>
                                <p>support@beetlebikes.in
                                <br>www.beetlebikes.in</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact-area end-->
    <!-- map-area start -->
    
            
    <!-- map-area end -->

    <script type="text/javascript">
        $(document).ready(function() {
            
            $("#contact-form").submit(function(event) {
                event.preventDefault();

                formData = $(this).serialize();
                url      = $(this).attr('action');

                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    beforeSend: function() {
                        $("#contact-formBtn").html('Please wait...');
                        $("#contact-formMsg").html('');
                        $(".removeErr").text('');
                    }, success: function(res) {
                        
                        if (res.error == true) {
                            if (res.type == 'final') {
                                $("#contact-formMsg").html(`
                                    <div class="alert alert-danger">
                                    ${res.msg}</div>
                                `)
                            }

                            if (res.type == 'field') {
                                $.each(res, function(index, val) {
                                    $("."+index+"Err").text(val);
                                });
                            }
                        } else {
                            $("#contact-formMsg").html(`
                                <div class="alert alert-success">
                                ${res.msg}</div>
                            `);

                            fbq('track', 'Lead');

                            setTimeout(function() {
                                location.reload();
                            }, 4000);
                        }

                        $("#contact-formBtn").html('Submit');
                    }
                })
                


            });

        });
    </script>