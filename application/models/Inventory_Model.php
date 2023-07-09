<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inventory_Model extends CI_Model {
    public function addProducttt($data) {
        return $this->db->insert('product', $data);
    }





    // public function getProduct() {
    //     return $this->db->get('product')->result_array();
    // }



    public function Search($id){
        $this->db->like('Product_id', $id);
        return $this->db->get('product')->result_array();
    }

    public function get_all_product() {
        // Retrieve all orders from the tbl_order table
        $query = $this->db->get('product');
        return $query->result_array();
    }


    public function create_product($data) {
        $this->db->insert('product', $data);
    }
    
}
    
?>

