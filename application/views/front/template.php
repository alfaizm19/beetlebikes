<?php if(!isset($meta_title)) { $meta_title = '';  } ?>    
<?php if(!isset($meta_key_words)) { $meta_key_words = ''; } ?>
<?php if(!isset($meta_description)) { $meta_description = ''; } ?>
<?php
	$this->load->view('front/includes/header',$pageTitle, $meta_title, $meta_key_words, $meta_description);
	$this->load->view($middleContent);
	$this->load->view('front/includes/footer');
?>