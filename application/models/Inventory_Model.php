<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Inventory_Model extends CI_Model
{
    public function addProducttt($data)
    {
        return $this->db->insert('product', $data);
    }

    public function BuyProduct($ProductId, $data)
    {
        $this->db->set($data);
        $this->db->where('Product_id', $ProductId);
        $this->db->update('product');

        return $this->db->affected_rows() > 0;
    }

    public function Search($id)
    {
        $this->db->like('Product_id', $id);
        return $this->db->get('product')->result_array();
    }

    public function get_all_product()
    {
        $this->db->order_by('Product_id', 'asc');
        $query = $this->db->get('product');
        return $query->result_array();
    }
    

    public function create_product($data)
    {
        $this->db->insert('product', $data);
    }

    public function getStocks($ProductId)
    {
        $this->db->select('Quantity');
        $this->db->where('Product_id', $ProductId);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            return $query->row()->Quantity;
        }
        else {
            return 0;
        }
    }

    public function getExpenses($ProductId)
    {
        $this->db->select('TotalProductExpenses');
        $this->db->where('Product_id', $ProductId);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            return $query->row()->TotalProductExpenses;
        } else {
            return 0;
        }
    } 
    public function getSales()
    {
        // Retrieve all orders from the tbl_order table
        $query = $this->db->get('product');
        return $query->result_array();
    }

    public function get_allstocks(){
        $this->db->select('inventory.* , product.Product_name, product.Product_image, product.Category,');
        $this->db->from('inventory');
        $this->db->join('product', 'inventory.Product_id = product.Product_id');
        $query = $this->db->get();
        return $query->result();
    }


}

?>