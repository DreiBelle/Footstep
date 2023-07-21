<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Checkout_Model extends CI_Model
{
    public function GetData()
    {
        $query = $this->db->get('product');
        return $query->result();
    }



    public function AddStock($ID, $data)
    {
        $this->db->where('Product_id', $ID);
        $this->db->update('product', $data);

        return $this->db->affected_rows() > 0;
    }

    public function GetDatabaseStock($ID)
    {
        $this->db->select('Quantity');
        $this->db->where('Product_id', $ID);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            return $query->row()->Quantity;
        } else {
            return 0;
        }
    }

    public function InsertExpense($data)
    {
        return $this->db->insert('purchase', $data);
    }

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
        $this->db->where('Quantity >', 0);
        $query = $this->db->get('product');
        $results = $query->result();
        foreach ($results as $row) {
            $row->Price *= 1.01;
        }
        return $results;
    }

    public function GetRubberShoes()
    {
        $this->db->where('Category', 'Rubber Shoes');
        $this->db->where('Quantity !=', 0);
        $query = $this->db->get('product');
        return $query->result();
    }

    public function GetLastestID()
    {
        $query = $this->db->query("SELECT MAX(id) AS max_id FROM sales");
        $row = $query->row();
        $maxID = $row->max_id;
        $nextID = $maxID + 1;
        return $nextID;
    }
}

?>