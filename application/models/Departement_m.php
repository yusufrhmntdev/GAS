<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departement_m extends CI_Model{
    function get($id = null)
    {
        $this->db->from('departement');

        if($id != null){
            $this->db->where('departement_id', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){
        $params['nama_dept'] = $post ['nama_dept'];

        $this->db->insert('departement',$params);

    }
    public function edit($post){
        $params = [

            'nama_dept' => $post['nama_dept'],
            'updated' => date('Y-m-d H:i:s')
        ];
        // $params['name'] = $post ['name'];
        // $params['updated'] = date('Y-m-d H:i:s');
   
       
        $this->db->where('departement_id',$post['departement_id']);
        $this->db->update('departement',$params);
    }
   
    public function del($id){
        $this->db->where('departement_id',$id);
        $this->db->delete('departement');
    }

}