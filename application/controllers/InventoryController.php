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
            $data['check'] = $this->Inventory_Model->get_all_product();
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('InventoryManagement', $data);
        } else if ($user['role'] == "Inventory/Product") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('InventoryManagement', $data);
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
                $data['check'] = $this->Inventory_Model->get_all_product();
            }
            $this->load->view('Inventory/Product', $data);

        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Inventory/Product', $data);
        }

    }


    public function goprod(){
        $this->load->view('Inventory/Product');
    }

    public function add_prod()
    {
        if (!empty($_FILES['Product_image']['name'])) {
            $imageFileName = $_FILES['Product_image']['name'];
    
            $config['upload_path'] = './assets/uploads/'; 
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
            $config['max_size'] = 2048; 
    
            $this->load->library('upload', $config);
    
            if ($this->upload->do_upload('Product_image')) {
                $imageFilePath = $config['upload_path'] . $imageFileName;
            } else {
                $uploadError = $this->upload->display_errors();
                // redirect('InventoryController/add_prod?error=' . urlencode($uploadError));

                echo $uploadError;
                return; 
            }
        } else {
            // redirect('InventoryController/add_prod?error=' . urlencode('No image file uploaded.'));
            $uploadError = "No image uploaded";
            echo $uploadError;
            return; // Stop further execution
        }
    
        $data = array(
            'Product_image' => $imageFileName,
            'Product_id' => $this->input->post('ProductId'),
            'Product_name' => $this->input->post('ProductName'),
            'Category' => $this->input->post('Category'),
            'Price' => $this->input->post('Price'),
            'Size' => $this->input->post('Size'),
            'Quantity' => 0,

        );
    
        $this->Inventory_Model->create_product($data);
    
        redirect('InventoryController/ViewProducts');
    }
    public function create() {
        // Retrieve form data
        $Product_image = $this->input->post('Product_image');
        $ProductId = $this->input->post('ProductId');
        $ProductName = $this->input->post('ProductName');
        $Category = $this->input->post('Category');
        $Price = $this->input->post('Price');
        $Size = $this->input->post('Size');
        $Quantity = $this->input->post('Quantity');
        
        $this->Inventory_Model->create_product($Product_image, $ProductId, $ProductName, $Category, $Price, $Size ,$Quantity);
        redirect('InventoryController');
    }

    
    public function PurchaseProducts()
    {
        $ProductId = $this->input->post('ProductIdInput');
        $ProductName = $this->input->post('ProductNameInput');
        $Category = $this->input->post('CategoryInput');
        $Price = $this->input->post('PriceInput');
        $Quantity = $this->input->post('QuantityInput');

        $currentStocks = (int) $this->Inventory_Model->getStocks($ProductId);
        $getCurrentExpenses = (int) $this->Inventory_Model->getExpenses($ProductId);

        $newStocks = $currentStocks + $Quantity;
        $expenses = $Price * $Quantity;
        $getTotalExpenses = $expenses + $getCurrentExpenses;

        $data = array(
            'Product_id' => $ProductId,
            'Product_name' => $ProductName,
            'Category' => $Category,
            'Price' => $Price,
            'Quantity' => $newStocks,
            'TotalProductExpenses' => $getTotalExpenses,
        );

        $this->Inventory_Model->BuyProduct($ProductId, $data);

        redirect('/InventoryController/ViewProducts');
    }
    
    public function show_stocks()
    {
        $user = $this->session->userdata('user');
        if ($user) {
            // Pass the user data to the view
            $data['user'] = $user;;
            $this->load->model('Inventory_Model');
            $data['navbar'] = "navbar/AdminNavbar";
            $stocks = $this->Inventory_Model->get_allstocks();
            // Pass the stocks data to the view
            $data['stocks'] = $stocks;
            $this->load->view('Inventory/Stock', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('LoginController');
        }
    }



    // STOCK
    public function ViewStocks()
    {
        $user = $this->session->userdata('user');
        $searchid = $this->input->get('asd');

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;

            $data['navbar'] = "navbar/AdminNavbar";
            if (!empty($searchid)) {
                $data['check'] = $this->Inventory_Model->Search($searchid);
            } else {
                $data['check'] = $this->Inventory_Model->getSales();
            }
            $this->load->view('Inventory/Stock', $data);

        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Inventory/Stock', $data);
        }

    }

}