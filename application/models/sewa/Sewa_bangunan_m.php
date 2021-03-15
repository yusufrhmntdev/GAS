<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa_bangunan_m extends CI_Model{
    // function get($id = null)
    // {
    //     $this->db->from('sewa_bangunan');

    //     if($id != null){
    //         $this->db->where('id_sewa_bangunan', $id); 
    //     }
    //     $query =$this->db->get();
    //     return $query;
    // }

    function get($id = null)
    {   
        $this->db->select('sewa_bangunan.*,lokasi.nama_lokasi as lokasi_name,supplier.name as nama_supplier');
        $this->db->from('sewa_bangunan');
        $this->db->join('lokasi','sewa_bangunan.lokasi_id = lokasi.lokasi_id');
        $this->db->join('supplier','sewa_bangunan.supplier_id = supplier.supplier_id');

        if($id != null){
            $this->db->where('id_sewa_bangunan', $id); 
        }
        $query =$this->db->get();
        return $query;
    }
    public function add($post){

        $params['status'] = $post ['status'];
        $params['no_kontrak'] = $post ['no_kontrak'];
        $params['lokasi_id'] = $post ['lokasi_name'];
        $params['supplier_id'] = $post ['supplier_name'];
        $params['luas_bangunan'] = $post ['luas_bangunan'];
        $params['price'] = $post ['price'];
        $params['tanggal_awal_sewa'] = $post ['tanggal_awal_sewa'];
        $params['tanggal_akhir_sewa'] = $post ['tanggal_akhir_sewa'];
        $params['tanggal_kontrak'] = $post ['tanggal_kontrak'];
        // var_dump($params);
        // exit;

        $this->db->insert('sewa_bangunan',$params);

    }
    public function edit($post){
        $params['status'] = $post ['status'];
        $params['no_kontrak'] = $post ['no_kontrak'];
        $params['lokasi_id'] = $post ['lokasi_name'];
        $params['supplier_id'] = $post ['supplier_name'];
        $params['luas_bangunan'] = $post ['luas_bangunan'];
        $params['price'] = $post ['price'];
        $params['tanggal_awal_sewa'] = $post ['tanggal_awal_sewa'];
        $params['tanggal_akhir_sewa'] = $post ['tanggal_akhir_sewa'];
        $params['tanggal_kontrak'] = $post ['tanggal_kontrak'];
        $params['updated'] = date('Y-m-d H:i:s');
        $this->db->where('id_sewa_bangunan',$post['id_sewa_bangunan']);
        $this->db->update('sewa_bangunan',$params);
    }
   
    public function del($id){
        $this->db->where('id_sewa_bangunan',$id);
        $this->db->delete('sewa_bangunan');
    }

}