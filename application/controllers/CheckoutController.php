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
        $totalPrice = json_decode($this->input->raw_input_stream)->totalPrice;
        $try = json_decode($this->input->raw_input_stream)->additionalProperty;
    
        $data = array(
            'TotalBought' => $totalPrice,
            'try' => $try,
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

}