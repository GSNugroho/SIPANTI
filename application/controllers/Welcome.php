<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$data = [];
		//load the view and saved it into $html variable
		//$html=$this->load->view('welcome_message', $data, true);

        //this the the PDF filename that user will get to download
		//$pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
		//$this->load->library('m_pdf');

       //generate the PDF from the given html
		//$this->m_pdf->pdf->WriteHTML($html);

        //download it.
		//$this->m_pdf->pdf->Output($pdfFilePath, "D");	
		$this->load->library('sector');
		$pdf = new PDF_Diag();
$pdf->AddPage();
$data = array('Men' => 1510, 'Women' => 1610, 'Children' => 1400);
//Pie chart
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, '1 - Pie chart', 0, 1);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 10);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->Cell(30, 5, 'Number of men:');
$pdf->Cell(15, 5, $data['Men'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Number of women:');
$pdf->Cell(15, 5, $data['Women'], 0, 0, 'R');
$pdf->Ln();
$pdf->Cell(30, 5, 'Number of children:');
$pdf->Cell(15, 5, $data['Children'], 0, 0, 'R');
$pdf->Ln();
$pdf->Ln(8);
$pdf->SetXY(90, $valY);
$col1=array(100,100,255);
$col2=array(255,100,100);
$col3=array(255,255,100);
$pdf->PieChart(100, 35, $data, '%l (%p)', array($col1,$col2,$col3));
$pdf->SetXY($valX, $valY + 40);

//Bar diagram
$pdf->SetFont('Arial', 'BIU', 12);
$pdf->Cell(0, 5, '2 - Bar diagram', 0, 1);
$pdf->Ln(8);
$valX = $pdf->GetX();
$valY = $pdf->GetY();
$pdf->BarDiagram(190, 70, $data, '%l : %v (%p)', array(255,175,100));
$pdf->SetXY($valX, $valY + 80);
$pdf->Output();
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>