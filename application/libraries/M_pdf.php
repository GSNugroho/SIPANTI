<?php
	if (!defined('BASEPATH')) exit('NO direct script access allowed');
	
	include_once APPPATH.'/third_party/mpdf/mpdf.php';
	
	class m_pdf{
		public $param;
		public $pdf;
		
		public function __construct($param = '"en-GB-x","A4","","",10,10,10,10,6,3')
		{
			$this->param = $param;
			$this->pdf = new mpdf($this->param);
		}
	}
?>