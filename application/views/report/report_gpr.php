<?php

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('times', 'B', 20);
        // // Title
        // $this->Cell(0, 15, 'Rumah Sakit', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        // // $this->Cell(0, 15, 'Panti Waluyo', 0, false, 'C', 0, '', 0, false, 'M', 'M');

        $this->SetY(10);
        $isi_header="<table align=\"center\">
              <tr>
                <td>Rumah Sakit Panti Waluyo</td>
              </tr>
              <tr>
                <td>____________________________________________</td>
              </tr>
            </table>";
        $this->writeHTML($isi_header, true, false, false, false, '');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('times', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author');
$pdf->SetTitle('Laporan Grafik Perawatan');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$i=0;
// add a page
$pdf->AddPage();

$i=0;
foreach ($report_g as $row) 
{
    $x['$row->status_p'] = $row->total;

}
$xc = 10;
$yc = 100;
$r = 50;

$pdf->SetFillColor(0, 0, 255);
$pdf->PieSector($xc, $yc, $r, 20, 120, 'FD', false, 0, 2);

$pdf->SetFillColor(0, 255, 0);
$pdf->PieSector($xc, $yc, $r, 120, 250, 'FD', false, 0, 2);

$pdf->SetFillColor(255, 0, 0);
$pdf->PieSector($xc, $yc, $r, 250, 20, 'FD', false, 0, 2);

// write labels
$pdf->SetTextColor(255,255,255);
$pdf->Text(105, 65, 'BLUE');
$pdf->Text(60, 95, 'GREEN');
$pdf->Text(120, 115, 'RED');

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');
?>