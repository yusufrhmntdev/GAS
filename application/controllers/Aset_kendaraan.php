<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_kendaraan extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		// check_admin();
        $this->load->model(['aset/aset_kendaraan_m','lokasi_m']);
        // $this->load->model('lokasi_m');

	}
	public function index()
	{
		
		$data['row'] = $this->aset_kendaraan_m->get();
		$this->template->load('template', 'aset/aset_kendaraan/aset_kendaraan_data',$data);
	}
	public function add(){
        $aset_kendaraan = new stdClass();
        $aset_kendaraan->id_aset_kendaraan=null;
        $aset_kendaraan->plat_kendaraan=null;
        $aset_kendaraan->nama_kendaraan=null;
        $aset_kendaraan->merek_kendaraan=null;
        $aset_kendaraan->lokasi_id=null;
        $query_kendaraan = $this->lokasi_m->get();

        // var_dump($query_kendaraan);
        // exit;

        // var_dump($query_kendaraan);
        // exit;
        $aset_kendaraan->pic=null;
         $aset_kendaraan->keterangan=null;
        $data = array(
            'page' => 'add',
            'lokasi' =>$query_kendaraan,
            'row' => $aset_kendaraan
        );


        // var_dump($data);
        // exit;
         


			$this->template->load('template', 'aset/aset_kendaraan/aset_kendaraan_form',$data);
		
        
    }
    public function proses(){
        
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->aset_kendaraan_m->add($post);
         } else if (isset ($_POST['edit'])){
            $this->aset_kendaraan_m->edit($post);
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('aset_kendaraan');
        }
       
    }
    public function edit($id)
	{
		$query = $this->aset_kendaraan_m->get($id);
		if($query->num_rows() > 0) {
			$aset_kendaraan = $query->row();
			$query_lokasi = $this->lokasi_m->get();

		
			$data = array(
				'page' => 'edit',
				'row' => $aset_kendaraan,
				'lokasi' => $query_lokasi,
			);
			$this->template->load('template','aset/aset_kendaraan/aset_kendaraan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('item')."';</script>";
		}
	}
	public function del($id){
	
        $this->aset_kendaraan_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak bisa di hapus karena sudah berelasi dengan tabel lain');
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('aset_kendaraan');
	
	}
}
