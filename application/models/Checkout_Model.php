<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Checkout_Model extends CI_Model {
    public function addCheckouttt($data) {
        return $this->db->insert('payment', $data);
    }


    public function getCheckouts($id) {
        return $this->db->get_where('payment', array('Payment_id' => $id))->row_array();
    }


    public function getCheckout() {
        return $this->db->get('payment')->result_array();
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
}
    
?>

