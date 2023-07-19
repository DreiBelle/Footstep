<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckoutController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Checkout_Model');
    }

    public function index()
    {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        $data['Slippers'] = $this->Checkout_Model->GetSlippers();
        $data['BlackShoes'] = $this->Checkout_Model->GetBlackShoes();
        $data['RubberShoes'] = $this->Checkout_Model->GetRubberShoes();
        $data['LatestID'] = $this->Checkout_Model->GetLastestID();

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('CheckoutManagement', $data);

        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/CashierNavbar";
            $this->load->view('CheckoutManagement', $data);
        }
    }

    public function ReduceStock()
    {
        $ProductId = $this->input->post('ProductIdInput');
        $CurrentInput = (int) $this->input->post('QuantityInput');
        $SizeInput = $this->input->post('SizeInput');
        $DatabaseStocks = (int) $this->Checkout_Model->GetDatabaseStock($ProductId);

        if ($CurrentInput > $DatabaseStocks) {
            echo json_encode(['status' => 'error', 'message' => 'Insufficient stock']);
            return;
        }

        $NewStocks = $DatabaseStocks - $CurrentInput;

        $data = array(
            'Quantity' => $NewStocks,
            'Size' => $SizeInput,
        );

        $this->Checkout_Model->AddStock($ProductId, $data);

        // Send a response back to the JavaScript code
        echo json_encode(['status' => 'success']);
    }

    public function InsertTotalExpense()
    {
        $requestBody = json_decode($this->input->raw_input_stream, true);
        $totalPrice = $requestBody['totalPrice'];
        $additionalProperty = $requestBody['additionalProperty'];

        $data = array(
            'TotalBought' => $totalPrice,
            'try' => $additionalProperty,
        );

        $this->Checkout_Model->InsertExpense($data);

        redirect('CheckoutController');
    }



    public function SaveSize()
    {
        $productId = $this->input->post('ProductIdInput');
        $size = $this->input->post('SizeInput');

        // Update the product table with the size for the specified product id
        $data = array(
            'Size' => $size
        );
        $this->db->where('Product_id', $productId);
        $this->db->update('product', $data);

        // Return a response
        $response = array(
            'success' => true,
            'message' => 'Size saved successfully'
        );
        echo json_encode($response);
    }

    public function Insert()
    {
        $itemID = $this->input->post('ItemID');
        $itemName = $this->input->post('ItemName');
        $quantity = $this->input->post('Quantity');

        $data = array(
            'ItemID' => $itemID,
            'ItemName' => $itemName,
            'ItemQuantity' => $quantity,
            'Date' => date('Y-m-d') // Assuming the sale date is the current date
        );

        // Assuming you have a "sales" table in your database
        $this->db->insert('product_purchases', $data);

        // You can perform any additional logic or return a response as needed
    }

}