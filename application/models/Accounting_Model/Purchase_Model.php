<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Purchase_Model extends CI_Model
{

    public function getProductsById($Category)
    {
        $this->db->where('Category', $Category);
        $this->db->where('Quantity !=', 0);
        $this->db->order_by('Product_id', 'ASC'); 
        $query = $this->db->get('product');
        return $query->result();
    }

    public function getTotalProductExpenses()
    {
        $this->db->select('Product_id, TotalProductExpenses');
        $this->db->where('Quantity !=', 0);
        $this->db->order_by('Product_id', 'ASC'); 
        $query = $this->db->get('product');
        return $query->result();
    }



}

?>
