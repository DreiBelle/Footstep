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


    // public function addProduct()
    // {
    //     print_r($_FILES);
    //     // Retrieve the uploaded image file
    //     $imageFile = $_FILES['ProductImage'];
    
    //     // Specify the destination folder to save the uploaded image
    //     $uploadPath = './assets/';
    //     $imageName = $imageFile['name'];
    //     $imagePath = $uploadPath . $imageName;
    
    //     // Move the uploaded image to the destination folder
    //     move_uploaded_file($imageFile['tmp_name'], $imagePath);
    
    //     // Retrieve other form data
    //     $ProductId = $this->input->post('ProductId');
    //     $ProductName = $this->input->post('ProductName');
    //     $Category = $this->input->post('Category');
    //     $Price = $this->input->post('Price');
    //     $Quantity = $this->input->post('Quantity');
    
    //     $data = array(
    //         'Product_image' => $imageName,
    //         'Product_id' => $ProductId,
    //         'Product_name' => $ProductName,
    //         'Category' => $Category,
    //         'Price' => $Price,
    //         'Quantity' => $Quantity,
    //     );
    
    //     $this->Inventory_Model->addProducttt($data);
    
    //     redirect('InventoryController/ViewProducts');
    // }

    public function goprod(){
        $this->load->view('Inventory/Product');
    }

    public function add_prod()
    {
        // Check if the file upload was successful
        if (!empty($_FILES['Product_image']['name'])) {
            $imageFileName = $_FILES['Product_image']['name'];
    
            // Configuration for file upload
            $config['upload_path'] = './assets/uploads/'; // Set your upload directory path
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Set allowed file types
            $config['max_size'] = 2048; // Set max file size in kilobytes
    
            $this->load->library('upload', $config);
    
            // Perform the file upload
            if ($this->upload->do_upload('Product_image')) {
                // File uploaded successfully, get the uploaded file path
                $imageFilePath = $config['upload_path'] . $imageFileName;
            } else {
                // File upload failed, handle the error
                $uploadError = $this->upload->display_errors();
                // Redirect or show an error message
                redirect('InventoryController/add_prod?error=' . urlencode($uploadError));
                return; // Stop further execution
            }
        } else {
            // No file uploaded, handle the error
            // Redirect or show an error message
            redirect('InventoryController/add_prod?error=' . urlencode('No image file uploaded.'));
            return; // Stop further execution
        }
    
        // Prepare data to be inserted in the database
        $data = array(
            'Product_image' => $imageFileName,
            'ProductId' => $this->input->post('ProductId'),
            'ProductName' => $this->input->post('ProductName'),
            'Category' => $this->input->post('Category'),
            'Price' => $this->input->post('Price'),
            'Quantity' => $this->input->post('Quantity')

        );
    
        // Call the model method to add the product
        $this->Inventory_Model->create_product($data);
    
        // Redirect to the product listing page or show a success message
        redirect('InventoryController/goprod');
    }
    public function create() {
        // Retrieve form data
        $Product_image = $this->input->post('Product_image');
        $ProductId = $this->input->post('ProductId');
        $ProductName = $this->input->post('ProductName');
        $Category = $this->input->post('Category');
        $Price = $this->input->post('Price');
        $Quantity = $this->input->post('Quantity');
        
        $this->Inventory_Model->create_product($Product_image, $ProductId, $ProductName, $Category, $Price ,$Quantity);
        redirect('InventoryController');
    }

    

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
                $data['check'] = $this->Inventory_Model->getProduct();
            }
            $this->load->view('Inventory/Stock', $data);

        } else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $this->load->view('Inventory/Stock', $data);
        }

    }

}