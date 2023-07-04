<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Checkout_Model extends CI_Model {
    public function addCheckout($data) {
        return $this->db->insert('payment', $data);
    }


    public function getCheckouts($id) {
        return $this->db->get_where('payment', array('Payment_id' => $id))->row_array();
    }


    public function getCheckout() {
        return $this->db->get('payment')->result_array();
    }


    public function updateCheckout($id, $data) {
        $this->db->where('Payment_id', $id);
        $this->db->update('payment', $data);
    }


    public function deleteCheckout($id) {
        $this->db->delete('payment', array('Payment_id' => $id));
    }
}
?>

