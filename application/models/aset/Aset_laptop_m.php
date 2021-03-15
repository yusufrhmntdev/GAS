<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class aset_laptop_m extends CI_Model{
    
    function get($id = null)
    {   
        $this->db->select('aset_laptop.*,lokasi.nama_lokasi as lokasi_name,karyawan.name as nama_karyawan,
                          departement.nama_dept as nama_departement,item.name as nama_item');
        $this->db->from('aset_laptop');
        $this->db->join('lokasi','lokasi.lokasi_id = aset_laptop.lokasi_id');
        $this->db->join('karyawan','karyawan.karyawan_id = aset_laptop.karyawan_id');
        $this->db->join('departement','departement.departement_id = aset_laptop.departement_id');
        $this->db->join('item','item.item_id = aset_laptop.item_id');

        if($id != null){
            $this->db->where('id_aset_laptop', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){

        $params['tanggal'] = $post ['tanggal'];
        $params['item_id'] = $post ['item_id'];
        $params['karyawan_id'] = $post ['karyawan_id'];
        $params['departement_id'] = $post ['departement_id'];
        $params['lokasi_id'] = $post ['lokasi_id'];
        $params['description'] = $post ['description'];
        $params['status'] = $post ['status'];
        $params['file'] = $this->_uploadImage();

        // var_dump($params);
        // exit;

        $this->db->insert('aset_laptop',$params);

    }
    public function edit($post){
        $params['tanggal'] = $post ['tanggal'];
        $params['karyawan_id'] = $post ['karyawan_id'];
        $params['departement_id'] = $post ['departement_id'];
        $params['lokasi_id'] = $post ['lokasi_id'];
        $params['description'] = $post ['description'];
        $params['status'] = $post ['status'];

        if (!empty($_FILES["file"]["name"])) {
            $params['file'] = $this->_uploadImage();
           
        } else {
            $params['file']= $post["old_file"];
           
        }
        $params['updated'] = date('Y-m-d H:i:s');
        // var_dump($params);
        // exit;
        $this->db->where('id_aset_laptop',$post['id_aset_laptop']);
        $this->db->update('aset_laptop',$params);
    }
   
    public function del($id){
        $this->db->where('id_aset_laptop',$id);
        $this->db->delete('aset_laptop');
    }
    private function _uploadImage()
        {
            $config['upload_path']          = './uploads/file_aset';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['file_name']            = 'file-'.date('ymd').'-'.substr(md5(rand()),0,10);
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