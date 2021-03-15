<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atk_report extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		// check_admin();
        $this->load->model(['karyawan_m','departement_m']);
        // $this->load->model('lokasi_m');

	}
	public function index()
	{
		
		$data['row'] = $this->sale_m->get();
		$this->template->load('template', 'atk_report/atk_report_data',$data);
	}
	
    
    
}
