<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Legal_m extends CI_Model{
    // function get($id = null)
    // {
    //     $this->db->from('legal');

    //     if($id != null){
    //         $this->db->where('id_legal', $id); 
    //     }
    //     $query =$this->db->get();
    //     return $query;
    // }

    function get($id = null)
    {   
       
        $this->db->from('legal');
        if($id != null){
            $this->db->where('legal_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){

        $params['nama_doc'] = $post ['nama_doc'];
        $params['file'] = $this->_uploadImage();
        // var_dump($params);
        // exit;

        $this->db->insert('legal',$params);

    }
     public function edit($post){
        $params['nama_doc'] = $post ['nama_doc'];
        if (!empty($_FILES["file"]["name"])) {
            $params['file'] = $this->_uploadImage();
           
        } else {
            $params['file']= $post["old_file"];
           
        }
        $params['updated'] = date('Y-m-d H:i:s');
        // var_dump($params);
        // exit;
        $this->db->where('legal_id',$post['legal_id']);
        $this->db->update('legal',$params);
    }
   
    public function del($id){
        $this->db->where('legal_id',$id);
        $this->db->delete('legal');
    }
    private function _uploadImage()
   
    {
        $config['upload_path']          = './uploads/legal';
        $config['allowed_types']        = 'pdf|jpg';
        $config['file_name']            = 'fileLegal'.date('y-m-d').'-'.substr(md5(rand()),0,10);
        $config['overwrite']            = true;
        $config['max_size']             = 204800;// 1MB
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
        exit;
        // return "default.jpg";
    }

}