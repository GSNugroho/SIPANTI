<?php

class Komponen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_komponen');
    }

    public function index()
    {
        $this->load->view('komponen/komponen');
    }

    public function update($id)
    {
        $row = $this->M_komponen->get_by_id($id);
        
        if($row)
        {
            $data = array(
                'kd_ko' => set_value('kd_ko', $row->kd_ko),
                'c_casing' => set_value('c_casing', $row->c_casing),
                'c_sekrup' => set_value('c_sekrup', $row->c_sekrup),
                'c_ksakelar' => set_value('c_ksakelar', $row->c_ksakelar),
                'c_kusb' => set_value('c_kusb', $row->c_kusb),
                'c_ksound' => set_value('c_ksound', $row->c_ksound),
                'c_klampu' => set_value('c_klampu', $row->c_klampu),
                'm_cpu' => set_value('m_cpu', $row->m_cpu),
                'm_fsb' => set_value('m_fsb', $row->m_fsb),
                'm_chipset' => set_value('m_chipset', $row->m_chipset),
                'm_memory' => set_value('m_memory', $row->m_memory),
                'm_onboardg' => set_value('m_onboardg', $row->m_onboardg),
                'm_audio' => set_value('m_audio', $row->m_audio),
                'm_lan' => set_value('m_lan', $row->m_lan),
                'm_pcie16' => set_value('m_pcie16', $row->m_pcie16),
                'm_pcie1' => set_value('m_pcie1', $row->m_pcie1),
                'm_agp' => set_value('m_agp', $row->m_agp),
                'm_ide' => set_value('m_ide', $row->m_ide),
                'm_sata' => set_value('m_sata', $row->m_sata),
                'm_usb' => set_value('m_usb', $row->m_usb),
                'm_12pmain' => set_value('m_12pmain', $row->m_12pmain),
                'm_4p12v' => set_value('m_4p12v', $row->m_4p12v),
                'm_idekonek' => set_value('m_idekonek', $row->m_idekonek),
                'm_cpufan' => set_value('m_cpufan', $row->m_cpufan),
                'm_sysfan' => set_value('m_sysfan', $row->m_sysfan),
                'm_fpanelh' => set_value('m_fpanelh', $row->m_fpanelh),
                'm_fpanelah' => set_value('m_fpanelah', $row->m_fpanelah),
                'm_cdinkonek' => set_value('m_cdinkonek', $row->m_cdinkonek),
                'm_spdif' => set_value('m_spdif', $row->m_spdif),
                'm_usb2' => set_value('m_usb2', $row->m_usb2),
                'm_chassisin' => set_value('m_chassisin', $row->m_chassisin),
                'm_powerled' => set_value('m_powerled', $row->m_powerled),
                'm_ps2key' => set_value('m_ps2key', $row->m_ps2key),
                'm_ps2mou' => set_value('m_ps2mou', $row->m_ps2mou),
                'm_paraport' => set_value('m_paraport', $row->m_paraport),
                'm_seriport' => set_value('m_seriport', $row->m_seriport),
                'm_displayport' => set_value('m_displayport', $row->m_displayport),
                'm_busb2' => set_value('m_busb2', $row->m_busb2),
                'm_sysvoltdetec' => set_value('m_sysvoltdetec', $row->m_sysvoltdetec),
                'm_cputempdetec' => set_value('m_cputempdetec', $row->m_cputempdetec),
                'm_cpusysfail' => set_value('m_cpusysfail', $row->m_cpusysfail),
                'm_cpufansp' => set_value('m_cpufansp', $row->m_cpufansp),
                'm_bios' => set_value('m_bios', $row->m_bios),
                'h_ata' => set_value('h_ata', $row->h_ata),
                'h_satah' => set_value('h_satah', $row->h_satah),
                'h_satas' => set_value('h_satas', $row->h_satas),
                'h_nvm' => set_value('h_nvm', $row->h_nvm),
                'r_ddr1' => set_value('r_ddr1', $row->r_ddr1),
                'r_ddr2' => set_value('r_ddr2', $row->r_ddr2),
                'r_ddr3' => set_value('r_ddr3', $row->r_ddr3),
                'r_ddr4' => set_value('r_ddr4', $row->r_ddr4),
                'p_cdrw' => set_value('p_cdrw', $row->p_cdrw),
                'p_dvdrw' => set_value('p_dvdrw'. $row->p_dvdrw),
                'p_atakabel' => set_value('p_atakabel', $row->p_atakabel),
                'p_satakabel' => set_value('p_satakabel', $row->p_satakabel),
                'p_keyboard' => set_value('p_keyboard', $row->p_keyboard),
                'p_mouse' => set_value('p_mouse', $row->p_mouse),
                'p_speaker' => set_value('p_speaker', $row->p_speaker),
                'p_monitorcrt' => set_value('p_monitorcrt', $row->p_monitorcrt),
                'p_monitorlcd' => set_value('p_monitorlcd', $row->p_monitorlcd),
                'p_vgakabel' => set_value('p_vgakabel', $row->p_vgakabel),
                'cr_lancard' => set_value('cr_lancard', $row->cr_lancard),
                'cr_vgacard' => set_value('cr_vgacard', $row->cr_vgacard),
                'cr_firecard' => set_value('cr_firecard', $row->cr_firecard),
                'cr_lptcard' => set_value('cr_lptcard', $row->cr_lptcard),
                'cr_rs232card' => set_value('cr_rs232card', $row->cr_rs232card),
                'l_powersupply' => set_value('l_powersupply', $row->l_powersupply),
                'l_kabelpower' => set_value('l_kabelpower', $row->l_kabelpower),
                'l_kabelpowermon' => set_value('l_kabelpowermon', $row->l_kabelpowermon),
                'l_kabelpowersata' => set_value('l_kabelpowersata', $row->l_kabelpowersata),
                'l_kabelmolexpow' => set_value('l_kabelmolexpow', $row->l_kabelmolexpow),
                'cek' => set_value('cek', $row->cek)
            );

            $this->load->view('komponen/komponen_input', $data);
        }
    }

    public function read($id)
    {
        $row = $this->M_komponen->get_by_id($id);

        if($row){
            $data = array(
                'kd_brg' => set_value('kd_brg', $row->kd_brg),
                'nm_inv' => set_value('nm_inv', $row->nm_inv),
                'vc_n_gugus' => set_value('vc_n_gugus', $row->vc_n_gugus),
                'vc_nm_pengguna' => set_value('vc_nm_pengguna', $row->vc_nm_pengguna),
                'kd_ko' => set_value('kd_ko', $row->kd_ko),
                'c_casing' => set_value('c_casing', $row->c_casing),
                'c_sekrup' => set_value('c_sekrup', $row->c_sekrup),
                'c_ksakelar' => set_value('c_ksakelar', $row->c_ksakelar),
                'c_kusb' => set_value('c_kusb', $row->c_kusb),
                'c_ksound' => set_value('c_ksound', $row->c_ksound),
                'c_klampu' => set_value('c_klampu', $row->c_klampu),
                'm_cpu' => set_value('m_cpu', $row->m_cpu),
                'm_fsb' => set_value('m_fsb', $row->m_fsb),
                'm_chipset' => set_value('m_chipset', $row->m_chipset),
                'm_memory' => set_value('m_memory', $row->m_memory),
                'm_onboardg' => set_value('m_onboardg', $row->m_onboardg),
                'm_audio' => set_value('m_audio', $row->m_audio),
                'm_lan' => set_value('m_lan', $row->m_lan),
                'm_pcie16' => set_value('m_pcie16', $row->m_pcie16),
                'm_pcie1' => set_value('m_pcie1', $row->m_pcie1),
                'm_agp' => set_value('m_agp', $row->m_agp),
                'm_ide' => set_value('m_ide', $row->m_ide),
                'm_sata' => set_value('m_sata', $row->m_sata),
                'm_usb' => set_value('m_usb', $row->m_usb),
                'm_12pmain' => set_value('m_12pmain', $row->m_12pmain),
                'm_4p12v' => set_value('m_4p12v', $row->m_4p12v),
                'm_idekonek' => set_value('m_idekonek', $row->m_idekonek),
                'm_cpufan' => set_value('m_cpufan', $row->m_cpufan),
                'm_sysfan' => set_value('m_sysfan', $row->m_sysfan),
                'm_fpanelh' => set_value('m_fpanelh', $row->m_fpanelh),
                'm_fpanelah' => set_value('m_fpanelah', $row->m_fpanelah),
                'm_cdinkonek' => set_value('m_cdinkonek', $row->m_cdinkonek),
                'm_spdif' => set_value('m_spdif', $row->m_spdif),
                'm_usb2' => set_value('m_usb2', $row->m_usb2),
                'm_chassisin' => set_value('m_chassisin', $row->m_chassisin),
                'm_powerled' => set_value('m_powerled', $row->m_powerled),
                'm_ps2key' => set_value('m_ps2key', $row->m_ps2key),
                'm_ps2mou' => set_value('m_ps2mou', $row->m_ps2mou),
                'm_paraport' => set_value('m_paraport', $row->m_paraport),
                'm_seriport' => set_value('m_seriport', $row->m_seriport),
                'm_displayport' => set_value('m_displayport', $row->m_displayport),
                'm_busb2' => set_value('m_busb2', $row->m_busb2),
                'm_sysvoltdetec' => set_value('m_sysvoltdetec', $row->m_sysvoltdetec),
                'm_cputempdetec' => set_value('m_cputempdetec', $row->m_cputempdetec),
                'm_cpusysfail' => set_value('m_cpusysfail', $row->m_cpusysfail),
                'm_cpufansp' => set_value('m_cpufansp', $row->m_cpufansp),
                'm_bios' => set_value('m_bios', $row->m_bios),
                'h_ata' => set_value('h_ata', $row->h_ata),
                'h_satah' => set_value('h_satah', $row->h_satah),
                'h_satas' => set_value('h_satas', $row->h_satas),
                'h_nvm' => set_value('h_nvm', $row->h_nvm),
                'r_ddr1' => set_value('r_ddr1', $row->r_ddr1),
                'r_ddr2' => set_value('r_ddr2', $row->r_ddr2),
                'r_ddr3' => set_value('r_ddr3', $row->r_ddr3),
                'r_ddr4' => set_value('r_ddr4', $row->r_ddr4),
                'p_cdrw' => set_value('p_cdrw', $row->p_cdrw),
                'p_dvdrw' => set_value('p_dvdrw'. $row->p_dvdrw),
                'p_atakabel' => set_value('p_atakabel', $row->p_atakabel),
                'p_satakabel' => set_value('p_satakabel', $row->p_satakabel),
                'p_keyboard' => set_value('p_keyboard', $row->p_keyboard),
                'p_mouse' => set_value('p_mouse', $row->p_mouse),
                'p_speaker' => set_value('p_speaker', $row->p_speaker),
                'p_monitorcrt' => set_value('p_monitorcrt', $row->p_monitorcrt),
                'p_monitorlcd' => set_value('p_monitorlcd', $row->p_monitorlcd),
                'p_vgakabel' => set_value('p_vgakabel', $row->p_vgakabel),
                'cr_lancard' => set_value('cr_lancard', $row->cr_lancard),
                'cr_vgacard' => set_value('cr_vgacard', $row->cr_vgacard),
                'cr_firecard' => set_value('cr_firecard', $row->cr_firecard),
                'cr_lptcard' => set_value('cr_lptcard', $row->cr_lptcard),
                'cr_rs232card' => set_value('cr_rs232card', $row->cr_rs232card),
                'l_powersupply' => set_value('l_powersupply', $row->l_powersupply),
                'l_kabelpower' => set_value('l_kabelpower', $row->l_kabelpower),
                'l_kabelpowermon' => set_value('l_kabelpowermon', $row->l_kabelpowermon),
                'l_kabelpowersata' => set_value('l_kabelpowersata', $row->l_kabelpowersata),
                'l_kabelmolexpow' => set_value('l_kabelmolexpow', $row->l_kabelmolexpow),
                'cek' => set_value('cek', $row->cek)
            );

            $this->load->view('komponen/komponen_read', $data);
        }
    }

    function tbl_list()
    {
        $draw = $_POST['draw'];
        $baris = $_POST['start'];
        $rowperpage = $_POST['length'];
		$columnIndex = $_POST['order'][0]['column'];
		$columnName = $_POST['columns'][$columnIndex]['data'];
		$columnSortOrder = $_POST['order'][0]['dir'];
		$searchValue = $_POST['search']['value'];

		## Search 
		$searchQuery = " ";
		
		if($searchValue != ''){
		$searchQuery .= " and (
		kd_brg like '%".$searchValue."%' or 
		kd_ko like '%".$searchValue."%' or 
		nm_inv like '%".$searchValue."%' or 
		vc_n_gugus like '%".$searchValue."%' or
		vc_nm_pengguna like '%".$searchValue."%' ) ";
		}

		## Total number of records without filtering
		$sel = $this->M_komponen->get_total_dt();
		// $records = sqlsrv_fetch_array($sel);
		foreach($sel as $row){
			$totalRecords = $row->allcount;
		}
		

		## Total number of record with filtering
		$sel = $this->M_komponen->get_total_fl($searchQuery);
		// $records = sqlsrv_fetch_assoc($sel);
		foreach($sel as $row){
			$totalRecordwithFilter = $row->allcount;
		}
		

		## Fetch records
		$empQuery = $this->M_komponen->get_total_ft($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage);
		$empRecords = $empQuery;
        $data = array();
        
        
		foreach($empRecords as $row){
            $button = ' 
            <a href="komponen/read/'.$row->kd_ko.'" class="btn btn-info btn-circle"><i class="fas fa-info-circle"></i></a>
            <a href="komponen/update/'.$row->kd_ko.'" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
            <a href="komponen/delete/'.$row->kd_ko.'" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>';

            $data[] = array( 
                "kd_brg" => $row->kd_brg,
                "kd_ko" => $row->kd_ko,
                "nm_inv" => $row->nm_inv,
                "vc_n_gugus" => $row->vc_n_gugus,
                "vc_nm_pengguna" => $row->vc_nm_pengguna,
                "action" => $button
            );
            }
    
            ## Response
            $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
            );
    
            echo json_encode($response);
    }
}
?>