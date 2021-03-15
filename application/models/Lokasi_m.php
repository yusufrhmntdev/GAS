<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lokasi_m extends CI_Model{
    function get($id = null)
    {
        $this->db->from('lokasi');

        if($id != null){
            $this->db->where('lokasi_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){
        $params['nama_lokasi'] = $post ['nama_lokasi'];

        $this->db->insert('lokasi',$params);

    }
    public function edit($post){
        $params = [

            'nama_lokasi' => $post['nama_lokasi'],
            'updated' => date('Y-m-d H:i:s')
        ];
        // $params['name'] = $post ['name'];
        // $params['updated'] = date('Y-m-d H:i:s');
   
       
        $this->db->where('lokasi_id',$post['lokasi_id']);
        $this->db->update('lokasi',$params);
    }
   
    public function del($id){
        $this->db->where('lokasi_id',$id);
        $this->db->delete('lokasi');
    }

}