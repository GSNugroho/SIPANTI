<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class pdf{
	function pdf(){
	$CI = & get_instance();
	log_message('Debug', 'mPDF class is loaded.');
	}
	
	function load($param=NULL)
	{
		include_once APPPATH.'/third_party/mpdf/mpdf.php';
		if ($param == NULL)
		{
			$param = "'c', 'A4-L'";
		}
		
		return new mPDF($param);
	}
}

class mpdf{
	
	function __construct(){
		
	}
}
?>
