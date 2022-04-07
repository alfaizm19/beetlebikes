<?php
$icons = array('phone' => 'phone', 'pencil' => 'pencil', 'female' => 'female', 'motorcycle' => 'motorcycle', 'lock' => 'lock', 'male' => 'male', 'wifi' => 'wifi', 'apple' => 'apple', 'camera' => 'camera', 'car' => 'car', 'home' => 'home', 'eye' => 'eye', 'folder' => 'folder', 'flag' => 'flag');
$rand_keys = array_rand($icons, 5);
$id = rand(0,4);
?>
<div class="row">
    
    <div class="col-sm-12 captcha">
    <input type="hidden" name="hiddenRecaptcha" class="hiddenRecaptcha" required id="hiddenRecaptcha" value="">
        <div class="visualCaptcha-text"> Click or touch the <strong id="txt_val"> <?php echo $icons[$rand_keys[$id]] ?> </strong></div>
        <span id="captcha-error"></span>
        <div class="visualCaptcha-image"> 
            <?php
            foreach ($rand_keys as $key => $value) {
                ?>
                <span class="captcha-option">
                    <span id="icon_size" data-icon="<?php echo $value; ?>" onclick="visualCaptchaImageClick(this)" class="visualCaptchaImage fa fa-<?php echo $value; ?>"></span>
                </span>
                <?php
            }
            ?>
            <span  onclick="divRefresh(this)" class="visualCaptchaImage fa fa-refresh refresh_btn"></span>
        </div>
    </div>
</div>