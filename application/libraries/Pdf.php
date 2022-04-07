<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	require_once APPPATH.'libraries/tcpdf/tcpdf.php';

 class Pdf extends TCPDF { 
 	function construct() { parent::construct(); } 
 }
?>