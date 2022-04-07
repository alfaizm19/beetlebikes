     <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li>Register Bike</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs-area end -->
    
    <!-- account-details Area Start -->
        <div class="customer-login-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="customer-login my-account">
                            <form method="post" class="login">
                                <div class="form-fields">
                                    <h2>Register Your Beetle</h2>
                                    <p class="form-row form-row-wide">
                                        <label for="">Name<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="name" id="" value="<?php echo isset($registerBikeData['name']) ? $registerBikeData['name'] : '' ?>">
                                         <span class="error" style="color:red"><?php echo isset($registerBikeError['name']) ? $registerBikeError['name'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">Phone Number<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="phone" id="" value="<?php echo isset($registerBikeData['phone']) ? $registerBikeData['phone'] : '' ?>">
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['phone']) ? $registerBikeError['phone'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">Email<span class="required">*</span> <small>(To recieve Warranty Certificate)</small></label>
                                        <input type="email" class="input-text" name="email" id="" value="<?php echo isset($registerBikeData['email']) ? $registerBikeData['email'] : '' ?>">
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['email']) ? $registerBikeError['email'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">Invoice Date<span class="required">*</span></label>
                                        <input type="Date" class="input-text" name="invoiceDate" id="" value="<?php echo isset($registerBikeData['invoiceDate']) ? $registerBikeData['invoiceDate'] : '' ?>">
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['invoiceDate']) ? $registerBikeError['invoiceDate'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">Model<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="model" id="" value="<?php echo isset($registerBikeData['span']) ? $registerBikeData['span'] : '' ?>">
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['model']) ? $registerBikeError['model'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">Chassis No.<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="chassisNo" id="" value="<?php echo isset($registerBikeData['chassisNo']) ? $registerBikeData['chassisNo'] : '' ?>">
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['chassisNo']) ? $registerBikeError['chassisNo'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">City<span class="required">*</span></label>
                                        <input type="text" class="input-text" name="city" id="" value="<?php echo isset($registerBikeData['city']) ? $registerBikeData['city'] : '' ?>">
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['city']) ? $registerBikeError['city'] : '' ?></span>
                                    </p>
                                    <p class="form-row form-row-wide">
                                        <label for="">State<span class="required">*</span></label>
                                        <select class="state-dropdown" id="" name="states">
                                            <option selected disabled> Select your State</option>
                                          <?php 

                                            if (!empty($stateList)):
                                                foreach ($stateList as $stateL):
                                                    ?>

                                                <option value="<?php echo ucwords(strtolower($stateL->state)) ?>">
                                                    <?php echo ucwords(strtolower($stateL->state)) ?>
                                                </option>

                                                    <?php
                                                endforeach;
                                            endif;
                                          ?>
                                        </select>
                                        <span class="error" style="color:red"><?php echo isset($registerBikeError['states']) ? $registerBikeError['states'] : '' ?></span>
                                    </p>
                                    
                                </div>
                                <div class="form-action">
                                    <div class="actions-log">
                                        <input type="submit" class="button" name="registerBike" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- account-details Area end -->