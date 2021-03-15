<?php
defined('BASEPATH') OR exit('No direct script access allowed');

error_reporting(E_ALL && E_NOTICE && E_ERROR);
class Legal extends CI_Controller {



	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		// check_admin();
        $this->load->model('legal_m');
       
        

	}
	public function index()
	{
		
		$data['row'] = $this->legal_m->get();
		$this->template->load('template', 'legal/legal_data',$data);
	}
	public function add(){
        $legal = new stdClass();
        $legal->legal_id=null;
        $legal->nama_doc=null;
        $legal->file=null;
        $data = array(
            'page' => 'add',
            'row' => $legal
        );
			$this->template->load('template', 'legal/legal_form',$data);
    }
    public function proses(){
        
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->legal_m->add($post);
         } else if (isset ($_POST['edit'])){
            $this->legal_m->edit($post);
           // echo "gagal";
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('legal');
        }
       
    }
    public function edit($id)
	{
		$query = $this->legal_m->get($id);
		if($query->num_rows() > 0) {
			$legal = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $legal,
			);
			$this->template->load('template','legal/legal_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('legal')."';</script>";
		}
	}
	public function del($id){
	
        $this->legal_m->del($id);
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('legal');
	
	}
}
