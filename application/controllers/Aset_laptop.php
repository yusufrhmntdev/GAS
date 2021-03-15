<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_laptop extends CI_Controller {

	function __construct()
	{

		parent ::__construct();
		// check_not_login();
		// // check_admin();
        $this->load->model(['aset/aset_laptop_m','lokasi_m','karyawan_m','departement_m','item_m']);
	}
	public function index()
	{
		
		$data['row'] = $this->aset_laptop_m->get();
		$this->template->load('template', 'aset/aset_laptop/aset_laptop_data',$data);
	}
	public function add(){
        $aset_laptop = new stdClass();
        $aset_laptop->id_aset_laptop=null;
        $aset_laptop->tanggal=null;
        $aset_laptop->item_id=null;
        $aset_laptop->karyawan_id=null;
        $aset_laptop->departement_id=null;
        $aset_laptop->lokasi_id=null;
        $aset_laptop->description=null;
        $aset_laptop->status=null;
        $aset_laptop->file =null;
        $query_lokasi = $this->lokasi_m->get();
        $query_karyawan = $this->karyawan_m->get();
        $query_departement = $this->departement_m->get();
        $query_item = $this->item_m->get();
        $data = array(
            'page' => 'add',
            'lokasi' =>$query_lokasi,
            'karyawan' => $query_karyawan,
            'departement'=> $query_departement,
            'item' => $query_item,
            'row' => $aset_laptop
        );
			$this->template->load('template', 'aset/aset_laptop/aset_laptop_form',$data);
    }
    public function proses(){
        $post =$this->input->post(null,TRUE);
        if(isset ($_POST['add'])){
            $this->aset_laptop_m->add($post);
            $this->item_m->update_stock_laptop_dipinjam($post);
         }
        else if (isset ($_POST['edit'])){
            $this->aset_laptop_m->edit($post);
            $this->item_m->update_stock_laptop_kembali($post);
         }
            if($this->db->affected_rows() > 0 ){
                $this->session->set_flashdata('success', 'Data Berhasil Disimpan');
            
            redirect('aset_laptop');
        }
       
 }
    public function edit($id)
	{
		$query = $this->aset_laptop_m->get($id);
		if($query->num_rows() > 0) {
			$aset_laptop = $query->row();
			 $query_lokasi = $this->lokasi_m->get();
            $query_karyawan = $this->karyawan_m->get();
            $query_departement = $this->departement_m->get();
            $query_item = $this->item_m->get();

		
			$data = array(
				'page' => 'edit',
				'lokasi' =>$query_lokasi,
                'karyawan' => $query_karyawan,
                'departement'=> $query_departement,
                'item' => $query_item,
                'row' => $aset_laptop
			);
			$this->template->load('template','aset/aset_laptop/aset_laptop_form', $data);
		} else {
			echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='".site_url('item')."';</script>";
		}
	}
	// public function del($id){
	
    //     $aset_laptop = $this->aset_laptop_m->get($id)->row();
    //     if($aset_laptop->file != null){
    //          $target_file ='./uploads/file_aset/'.$aset_laptop->file;
    //          unlink($target_file);
    //     }
    //     $this->aset_laptop_m->del($id);
    //     // $this->item_m->update_stock_laptop_kembali($id);
    //     if($this->db->affected_rows() > 0 ){
    //         $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
    //     }
    //     redirect('aset_laptop');
    // }

}