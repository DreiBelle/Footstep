<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Stock_Model');
    }

    public function index()
    {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        $data['Slippers'] = $this->Stock_Model->GetSlippers();
        $data['BlackShoes'] = $this->Stock_Model->GetBlackShoes();
        $data['RubberShoes'] = $this->Stock_Model->GetRubberShoes();

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            // $data['check'] = $this->Stock_Model->getCheckout();
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Inventory/Stock', $data);
            
        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/CashierNavbar";
            $this->load->view('Dashboard', $data);
        }
    }


}