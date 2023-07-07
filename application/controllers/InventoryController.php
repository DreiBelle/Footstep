<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Inventory_Model');
        // Load any necessary models or helpers
    }

    public function index() {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
           
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('InventoryManagement', $data);
        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Dashboard', $data);
        }
    }

    public function ViewProducts() {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        $data['check'] = $this->Inventory_Model->getProduct(); 

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Inventory/Product', $data);
        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Inventory/Product', $data);
        }
    }
    
    public function addProduct()
    {
        $ProductImage = $this->input->post('ProductImage');
        $ProductId = $this->input->post('ProductId');
        $ProductName = $this->input->post('ProductName');
        $Category = $this->input->post('Category');
        $Price = $this->input->post('Price');
        $Quantity = $this->input->post('Quantity');

        $data = array(
            'Product_image' => $ProductImage,
            'Product_id' => $ProductId,
            'Product_name' => $ProductName,
            'Category' => $Category,
            'Price' => $Price,
            'Quantity' => $Quantity,
        );

        $this->Inventory_Model->addProducttt($data);

        redirect('InventoryController/ViewProducts');
    }
}
