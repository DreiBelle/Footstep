<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Inventory_Model extends CI_Model {
    public function addProducttt($data) {
        return $this->db->insert('inventory', $data);
    }


    public function getCheckouts($id) {
        return $this->db->get_where('inventory', array('Product_id' => $id))->row_array();
    }


    public function getProduct() {
        return $this->db->get('inventory')->result_array();
    }



    public function deleteRecords($paymentId)
    {
        $this->db->where('Payment_id', $paymentId);
        $this->db->delete('payment');
        
        return $this->db->affected_rows() > 0;
    }

    public function Search($id){
        $this->db->like('Product_id', $id);
        return $this->db->get('inventory')->result_array();
    }

    public function get_all_product() {
        // Retrieve all orders from the tbl_order table
        $query = $this->db->get('inventory');
        return $query->result_array();
    }


    public function create_product($data) {
        $this->db->insert('inventory', $data);
    }

    
}
    
?>

