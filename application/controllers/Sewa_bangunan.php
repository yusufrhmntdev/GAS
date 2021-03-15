<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa_bangunan extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		// check_admin();
        $this->load->model(['sewa/sewa_bangunan_m','lokasi_m','supplier_m']);
        // $this->load->model('lokasi_m');

	}
	public function index()
	{
		
		$data['row'] = $this->sewa_bangunan_m->get();
		$this->template->load('template', 'sewa/sewa_bangunan/sewa_bangunan_data',$data);
	}
	public function add(){
        $sewa_bangunan = new stdClass();
        $sewa_bangunan->id_sewa_bangunan=null;
        $sewa_bangunan->status=null;
        $sewa_bangunan->no_kontrak=null;
        $sewa_bangunan->lokasi_id=null;
        $query_lokasi = $this->lokasi_m->get();
        $sewa_bangunan->supplier_id=null;
        $query_supplier = $this->supplier_m->get();
        $sewa_bangunan->luas_bangunan=null;
        $sewa_bangunan->price=null;
        $sewa_bangunan->price=null;
        $sewa_bangunan->tanggal_awal_sewa=null;
        $sewa_bangunan->tanggal_akhir_sewa=null;
        $sewa_bangunan->tanggal_kontrak=null;
        $data = array(
            'page' => 'add',
            'lokasi' =>$query_lokasi,
            'supplier' =>$query_supplier,
            'row' => $sewa_bangunan
        );


        


			$this->template->load('template', 'sewa/sewa_bangunan/sewa_bangunan_form',$data);
		
        
    }
    public function proses(){
        
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->sewa_bangunan_m->add($post);
         } else if (isset ($_POST['edit'])){
            $this->sewa_bangunan_m->edit($post);
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('sewa_bangunan');
        }
       
    }
    public function edit($id)
	{
		$query = $this->sewa_bangunan_m->get($id);
		if($query->num_rows() > 0) {
			$sewa_bangunan = $query->row();
			$query_lokasi = $this->lokasi_m->get();
            $query_supplier = $this->supplier_m->get();
		
			$data = array(
				'page' => 'edit',
				'row' => $sewa_bangunan,
				'lokasi' => $query_lokasi,
                'supplier' => $query_supplier,
			);
			$this->template->load('template','sewa/sewa_bangunan/sewa_bangunan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('item')."';</script>";
		}
	}
	public function del($id){
	
        $this->sewa_bangunan_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak bisa di hapus karena sudah berelasi dengan tabel lain');
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('sewa_bangunan');
	
	}
}
