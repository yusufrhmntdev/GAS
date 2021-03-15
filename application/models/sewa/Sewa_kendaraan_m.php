<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa_kendaraan_m extends CI_Model{
    // function get($id = null)
    // {
    //     $this->db->from('sewa_kendaraan');

    //     if($id != null){
    //         $this->db->where('id_sewa_kendaraan', $id); 
    //     }
    //     $query =$this->db->get();
    //     return $query;
    // }

    function get($id = null)
    {   
        $this->db->select('sewa_kendaraan.*,lokasi.nama_lokasi as lokasi_name,supplier.name as nama_supplier');
        $this->db->from('sewa_kendaraan');
        $this->db->join('lokasi','sewa_kendaraan.lokasi_id = lokasi.lokasi_id');
        $this->db->join('supplier','sewa_kendaraan.supplier_id = supplier.supplier_id');

        if($id != null){
            $this->db->where('id_sewaKendaraan', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){

        $params['status'] = $post ['status'];
        $params['no_kontrak'] = $post ['no_kontrak'];
        $params['lokasi_id'] = $post ['lokasi_name'];
        $params['supplier_id'] = $post ['supplier_name'];
        $params['tanggal_awalSewa'] = $post ['tanggal_awalSewa'];
        $params['tanggal_akhirSewa'] = $post ['tanggal_akhirSewa'];
        $params['file'] = $this->_uploadImage();
        // var_dump($params);
        // exit;

        $this->db->insert('sewa_kendaraan',$params);

    }
    public function edit($post){
        $params['status'] = $post ['status'];
        $params['no_kontrak'] = $post ['no_kontrak'];
        $params['lokasi_id'] = $post ['lokasi_name'];
        $params['supplier_id'] = $post ['supplier_name'];
        $params['tanggal_awalSewa'] = $post ['tanggal_awalSewa'];
        $params['tanggal_akhirSewa'] = $post ['tanggal_akhirSewa'];
        if (!empty($_FILES["file"]["name"])) {
            $params['file'] = $this->_uploadImage();
           
        } else {
            $params['file']= $post["old_file"];
           
        }
        $params['updated'] = date('Y-m-d H:i:s');
        // var_dump($params);
        // exit;
        $this->db->where('id_sewaKendaraan',$post['id_sewaKendaraan']);
        $this->db->update('sewa_kendaraan',$params);
    }
   
    public function del($id){
        $this->db->where('id_sewaKendaraan',$id);
        $this->db->delete('sewa_kendaraan');
    }
    private function _uploadImage()
   
    {
        // $params = $this->file;
        $config['upload_path']          = './uploads/sewa_kendaraan';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['file_name']            = 'fileSewaKendaraan-'.date('y-m-d').'-'.substr(md5(rand()),0,10);
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
        exit;
        // return "default.jpg";
    }

}