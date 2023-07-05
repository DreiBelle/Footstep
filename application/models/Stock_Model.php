<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Stock_Model extends CI_Model {
  
    public function GetSlippers()
    {
        $this->db->where('Category', 'Slippers');
        $query = $this->db->get('product');
        return $query->result();
    }

    public function GetBlackShoes()
    {
        $this->db->where('Category', 'Black Shoes');
        $query = $this->db->get('product');
        return $query->result();
    }

    public function GetRubberShoes()
    {
        $this->db->where('Category', 'Rubber Shoes');
        $query = $this->db->get('product');
        return $query->result();
    }
}
    
?>

