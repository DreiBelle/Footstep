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
            // $data['check'] = $this->Checkout_Model->getCheckout();
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('CheckoutManagement', $data);
            
        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/CashierNavbar";
            $this->load->view('Dashboard', $data);
        }
    }


}