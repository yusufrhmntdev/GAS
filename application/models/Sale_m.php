<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale_m extends CI_Model{

    // public function invoice_no(){
    //     $sql= "SELECT MAX(MID(invoice,9,4)) as invoice_no 
    //            FROM  t_sale 
    //            WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')";
    //     $query = $this->db->query($sql);
    //     if($query->num_rows() > 0){
    //         $row= $query->row();
    //         $n =((int) $row->invoice_no) +1;
    //         $no = sprintf("%'.02d",$n);

    //     } else{
    //         $no ="001";
    //     }
    //     $invoice ="/SR/"."GA/"."GDSK/".date('m/y').$no;

    //     return $invoice;

    // }
    public function invoice_no(){
        
       $query  = $this->db->query('SELECT max(LEFT(invoice,locate("/",invoice)-1)*1)+1 AS invoice FROM t_sale');
    //    var_dump($test);
    //    exit;
        $this->db->order_by('invoice','DESC');    
        $this->db->limit(1);    
         $this->db->get('t_sale');  //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() > 0){      
             //cek kode jika telah tersedia    
             $data = $query->row();     

             $kode = intval($data->invoice);
            //  var_dump($kode);
            //  exit;
        }
        else{      
             $kode = 1;  //cek jika kode belum terdapat pada table
        }
            // $tgl=date('dmY'); 
            $array_bln	= array(1=>"I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
            $batas = str_pad($kode,3,STR_PAD_LEFT);    
            $kodetampil =$batas."/SR/GA/GDSK/".$array_bln[date('n')].date('/y');  //format kode
            return $kodetampil;  
       }

    public function get_cart($params = null){

         $this->db->select('*,item.name as item_name');
        $this->db->from('t_chart');
        $this->db->join('item','t_chart.item_id = item.item_id');
        if($params != null){
            $this->db->where($params);
        }

        $this->db->where('user_id',$this->session->userdata('user_id'));
        $query = $this->db->get();
      
        return $query;
       


    }

    public function add_cart($post){


        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM t_chart");
        if($query->num_rows() > 0){
            $row = $query->row();
            $car_no = ((int) $row->cart_no) +1;
        } else {
            $car_no ="1";
        } 

        $params = array(

                  'cart_id' => $car_no,
                  'item_id' => $post['item_id'],
                  'price' => $post['price'],
                  'qty' => $post['qty'],
                  'total' =>($post['price'] * $post['qty']),
                  'user_id' => $this->session->userdata('user_id')

        );

        // var_dump($params);
        // exit;

       
        $this->db->insert('t_chart',$params);

    }

    function update_cart_qty($post){
        $sql = "UPDATE t_chart SET price = '$post[price]',
                qty = qty + '$post[qty]',
                total = '$post[price]' * qty
                 WHERE item_id = '$post[item_id]'";
        $this->db->query($sql);
    }
                

    public function del_cart($params = null){
        if($params != null){
            $this->db->where($params);
        }

        $this->db->delete('t_chart');
    }

    public function edit_cart($post){

        $params = array(
            'qty'  =>             $post['qty'],
        );

        $this->db->where('cart_id',$post['cart_id']);
        $this->db->update('t_chart',$params);
    }


    public function add_sale($post)
    {
        $params = array(
            'invoice' => $this->invoice_no(),
            'karyawan_id' => $post['karyawan_id'] == "" ? null : $post['karyawan_id'],
            'departement_id' => $post['departement'] == "" ? null : $post['departement'],
            'note' => $post['note'],
             'subtotal' => $post['sub_total'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('user_id')
        );


     
        $this->db->insert('t_sale', $params);
       
        return $this->db->insert_id();
    }
    function add_sale_detail($params) {
        $this->db->insert_batch('t_sale_detail', $params);
    }
}