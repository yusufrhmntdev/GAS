<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_m extends CI_Model{
    function get($id = null)
    {
        $this->db->from('karyawan');

        if($id != null){
            $this->db->where('karyawan_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){
        $params['nik'] = $post ['nik'];
        $params['name'] = $post ['name'];
        $params['gender'] = $post ['gender'];
        $this->db->insert('karyawan',$params);

    }
    public function edit($post){
        $params['nik'] = $post ['nik'];
        $params['name'] = $post ['name'];
        $params['gender'] = $post ['gender'];
  
        $this->db->where('karyawan_id',$post['karyawan_id']);
        $this->db->update('karyawan',$params);
    }
   
    public function del($id){
        $this->db->where('karyawan_id',$id);
        $this->db->delete('karyawan');
    }

}