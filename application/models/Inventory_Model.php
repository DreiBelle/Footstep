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


    public function EditCheckout($PaymentId, $data) {
        $this->db->set($data);
        $this->db->where('Payment_id', $PaymentId);
        $this->db->update('payment');

        return $this->db->affected_rows() > 0;
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
}
    
?>

