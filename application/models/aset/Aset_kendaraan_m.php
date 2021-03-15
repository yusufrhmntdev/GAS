<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aset_kendaraan_m extends CI_Model{
    // function get($id = null)
    // {
    //     $this->db->from('aset_kendaraan');

    //     if($id != null){
    //         $this->db->where('id_aset_kendaraan', $id); 
    //     }
    //     $query =$this->db->get();
    //     return $query;
    // }

    function get($id = null)
    {   
        $this->db->select('aset_kendaraan.*,lokasi.nama_lokasi as lokasi_name');
        $this->db->from('aset_kendaraan');
        $this->db->join('lokasi','lokasi.lokasi_id = aset_kendaraan.lokasi_id');
      

        if($id != null){
            $this->db->where('id_aset_kendaraan', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){

        $params['plat_kendaraan'] = $post ['plat_kendaraan'];
        $params['nama_kendaraan'] = $post ['nama_kendaraan'];
        $params['merek_kendaraan'] = $post ['merek_kendaraan'];
        $params['lokasi_id'] = $post ['lokasi'];
        $params['pic'] = $post ['pic'];
        $params['keterangan'] = $post ['keterangan'];

        // var_dump($params);
        // exit;

        $this->db->insert('aset_kendaraan',$params);

    }
    public function edit($post){
        $params['plat_kendaraan'] = $post ['plat_kendaraan'];
        $params['nama_kendaraan'] = $post ['nama_kendaraan'];
        $params['merek_kendaraan'] = $post ['merek_kendaraan'];
        $params['lokasi_id'] = $post ['lokasi'];
        $params['pic'] = $post ['pic'];
        $params['keterangan'] = $post ['keterangan'];
        $params['updated'] = date('Y-m-d H:i:s');
        $this->db->where('id_aset_kendaraan',$post['id_aset_kendaraan']);
        $this->db->update('aset_kendaraan',$params);
    }
   
    public function del($id){
        $this->db->where('id_aset_kendaraan',$id);
        $this->db->delete('aset_kendaraan');
    }

}