<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Sales_Model extends CI_Model
{

    // public function getProductsById($Category)
    // {
    //     $this->db->where('Category', $Category);
    //     $this->db->where('Quantity !=', 0);
    //     $this->db->order_by('Product_id', 'ASC'); 
    //     $query = $this->db->get('product');
    //     return $query->result();
    // }

    // public function getTotalProductExpenses()
    // {
    //     $this->db->select('Product_id, TotalProductExpenses');
    //     $this->db->where('Quantity !=', 0);
    //     $this->db->order_by('Product_id', 'ASC'); 
    //     $query = $this->db->get('product');
    //     return $query->result();
    // }

    public function GetAllSales()
    {
        $this->db->order_by('ID', 'asc');
        $query = $this->db->get('sales');
        return $query->result();
    }

    public function CalcTotal()
    {
        $query = $this->db->select('SUM(TotalPrice) AS Total')
            ->from('sales')
            ->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->Total;
        }

        return 0;
    }

    public function GetItems()
    {
        $query = $this->db->get('product_purchases');
        return $query->result();
    }
    
    public function GetItembyID($ID)
    {
        $this->db->like('ItemID', $ID);
        return $this->db->get('product_purchases')->result();
    }

}

?>