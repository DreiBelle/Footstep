<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InventoryController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Inventory_Model');
        // Load any necessary models or helpers
    }

    public function index()
    {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['check'] = $this->Inventory_Model->getProduct();
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('InventoryManagement', $data);
        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Dashboard', $data);
        }
    }

    public function ViewProducts()
    {
        $user = $this->session->userdata('user');
        $searchid = $this->input->get('asd');

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;

            $data['navbar'] = "navbar/AdminNavbar";
            if (!empty($searchid)) {
                $data['check'] = $this->Inventory_Model->Search($searchid);
            } else {
                $data['check'] = $this->Inventory_Model->getProduct();
            }
            $this->load->view('Inventory/Product', $data);

        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Inventory/Product', $data);
        }

    }


    public function addProduct()
    {
        // Retrieve the uploaded image file
        $imageFile = $_FILES['ProductImage'];

        // Specify the destination folder to save the uploaded image
        $uploadPath = './assets/';
        $imageName = $imageFile['name'];
        $imagePath = $uploadPath . $imageName;

        // Move the uploaded image to the destination folder
        move_uploaded_file($imageFile['tmp_name'], $imagePath);

        // Retrieve other form data
        $ProductId = $this->input->post('ProductId');
        $ProductName = $this->input->post('ProductName');
        $Category = $this->input->post('Category');
        $Price = $this->input->post('Price');
        $Quantity = $this->input->post('Quantity');

        $data = array(
            'Product_image' => $imageName,
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