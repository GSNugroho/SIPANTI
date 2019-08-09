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
$pdf->SetFont('times', 11);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Author');
$pdf->SetTitle('Laporan Perbaikan Inventaris');

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

$html = '<br>
            <h4 align="center">Laporan Perbaikan Inventaris</h4><br><p></p>
			<table border="1">
						
							<tr>
                            <th align="center" width="5%">No</th>
                            <th align="center" width="14%">Tanggal Perbaikan</th>
                            <th align="center" width="13%">Kode Inventaris</th>
                            <th align="center" width="14%">Nama Barang</th>
                            <th align="center" width="12%">Ruang</th>
                            <th align="center" width="12%">Jenis Perbaikan</th>
                            <th align="center">Sparepart</th>
                            <th align="center" >Biaya</th>
                            <th align="center">Keterangan</th>
							</tr>
							
';
foreach ($report_p as $row) 
                {
                    $i++;
                    $html.='<tr >
                            <td align="center">'.$i.'</td>
                            <td>'.date('d-M-Y', strtotime($row->tgl_inv_pr)).'</td>
                            <td>'.$row->kd_inv.'</td>
                            <td>'.$row->nm_inv.'</td>
                            <td>'.$row->vc_n_gugus.'</td>';
                
                            $data = $row->jns_pr;
                            if($data=='1'){$html.= '<td>Pengecekan</td>';
                            }else if($data=='2'){$html.= '<td>Ganti Sparepart</td>';
                            }else{$html.= '<td>Service</td>';}                            
                    $html.='<td>'.$row->sp_gt.'</td>
                            <td>'.$row->sp_by.'</td>
                            <td>'.$row->ket_pr.'</td></tr>';
                }
                $html.='</table>';

$pdf->writeHTML($html, true, false, true, false, '');

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');
?>