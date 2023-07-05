<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CheckoutController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Checkout_Model');
        // Load any necessary models or helpers
    }

    public function index()
    {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');

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