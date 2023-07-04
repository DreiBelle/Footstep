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
        $PaymentId = $this->input->post('PaymentId');
        $Product = $this->input->post('Product');
        $Description = $this->input->post('Description');
        $TotalPayment = $this->input->post('TotalPayment');
        $PaymentMethod = $this->input->post('PaymentMethod');
        $PaymentDate = $this->input->post('PaymentDate');

        $data = array(
            'Payment_id' => $PaymentId,
            'Product' => $Product,
            'Description' => $Description ,
            'Total_payment' =>  $TotalPayment,
            'Payment_method' => $PaymentMethod,
            'Payment_date' => $PaymentDate,
        );

        $this->Checkout_Model->addCheckouttt($data);

        redirect('CheckoutController');
    }

    public function DeleteCheckout()
    {
        $PaymentId = $this->input->post('PaymentId');
        $Product = $this->input->post('Product');
        $Description = $this->input->post('Description');
        $TotalPayment = $this->input->post('TotalPayment');
        $PaymentMethod = $this->input->post('PaymentMethod');
        $PaymentDate = $this->input->post('PaymentDate');

        $data = array(
            'Payment_id' => $PaymentId,
            'Product' => $Product,
            'Description' => $Description ,
            'Total_payment' =>  $TotalPayment,
            'Payment_method' => $PaymentMethod,
            'Payment_date' => $PaymentDate,
        );

        $this->Checkout_Model->DeleteCheckouttt($data);

        redirect('CheckoutController');
    }

}
