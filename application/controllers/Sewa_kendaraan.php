<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa_kendaraan extends CI_Controller {

	function __construct()
	{
		parent ::__construct();
	 
		check_not_login();
		// check_admin();
        $this->load->model(['sewa/sewa_kendaraan_m','lokasi_m','supplier_m']);
        // $this->load->model('lokasi_m');

	}
	public function index()
	{
		
		$data['row'] = $this->sewa_kendaraan_m->get();
		$this->template->load('template', 'sewa/sewa_kendaraan/sewa_kendaraan_data',$data);
	}
	public function add(){
        $sewa_kendaraan = new stdClass();
        $sewa_kendaraan->id_sewaKendaraan=null;
        $sewa_kendaraan->status=null;
        $sewa_kendaraan->no_kontrak=null;
        $sewa_kendaraan->lokasi_id=null;
        $query_lokasi = $this->lokasi_m->get();
        $sewa_kendaraan->supplier_id=null;
        $query_supplier = $this->supplier_m->get();
        $sewa_kendaraan->luas_bangunan=null;
        $sewa_kendaraan->tanggal_awalSewa=null;
        $sewa_kendaraan->tanggal_akhirSewa=null;
        $sewa_kendaraan->file=null;
        $data = array(
            'page' => 'add',
            'lokasi' =>$query_lokasi,
            'supplier' =>$query_supplier,
            'row' => $sewa_kendaraan
        );
			$this->template->load('template', 'sewa/sewa_kendaraan/sewa_kendaraan_form',$data);
    }
    public function proses(){
        
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->sewa_kendaraan_m->add($post);
         } else if (isset ($_POST['edit'])){
            $this->sewa_kendaraan_m->edit($post);
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('sewa_kendaraan');
        }
       
    }
    public function edit($id)
	{
		$query = $this->sewa_kendaraan_m->get($id);
		if($query->num_rows() > 0) {
			$sewa_kendaraan = $query->row();
			$query_lokasi = $this->lokasi_m->get();
            $query_supplier = $this->supplier_m->get();
		
			$data = array(
				'page' => 'edit',
				'row' => $sewa_kendaraan,
				'lokasi' => $query_lokasi,
                'supplier' => $query_supplier,
			);
			$this->template->load('template','sewa/sewa_kendaraan/sewa_kendaraan_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('sewa_kendaraan')."';</script>";
		}
	}
	public function del($id){
	
        $this->sewa_kendaraan_m->del($id);
        $error = $this->db->error();
        if($error['code'] != 0){
            $this->session->set_flashdata('error', 'Data tidak bisa di hapus karena sudah berelasi dengan tabel lain');
        }
        if($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('sewa_kendaraan');
	
	}
}
