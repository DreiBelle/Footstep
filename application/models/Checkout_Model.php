<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Checkout_Model extends CI_Model {
  
    public function GetSlippers()
    {
        $this->db->where('Category', 'Slippers');
        $this->db->where('Quantity !=', 0);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function GetBlackShoes()
    {
        $this->db->where('Category', 'Black Shoes');
        $this->db->where('Quantity !=', 0);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function GetRubberShoes()
    {
        $this->db->where('Category', 'Rubber Shoes');
        $this->db->where('Quantity !=', 0);
        $query = $this->db->get('product');
        return $query->result();
    }
}
    
?>

