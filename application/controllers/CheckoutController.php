<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckoutController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Checkout_Model');
        // Load any necessary models or helpers
    }

    public function index() {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['check'] = $this->Checkout_Model->getCheckout();
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('CheckoutManagement', $data);
        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/CashierNavbar";
            $this->load->view('Dashboard', $data);
        }
    }

    public function addCheckout()
    {
       

        $data = array(
            'Payment_id' => $this->input->post('Payment_id'),
            'Product' => $this->input->post('Product'),
            'Description' => $this->input->post('Description'),
            'Total_payment' => $this->input->post('Total_payment'),
            'Payment_method' => $this->input->post('Payment_method'),
            'Payment_date' => $this->input->post('Payment_date'),
        );

        $this->ProductModel->addCheckout($data);

        redirect('CheckoutController');
    }

}
