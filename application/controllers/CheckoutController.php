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
            'Description' => $Description,
            'Total_payment' => $TotalPayment,
            'Payment_method' => $PaymentMethod,
            'Payment_date' => $PaymentDate,
        );

        $this->Checkout_Model->addCheckouttt($data);

        redirect('CheckoutController');
    }

<<<<<<< HEAD

public function EditCheckout() {
    $PaymentId = $this->input->post('IdInput');
    $Product = $this->input->post('ProductInput');
    $Description = $this->input->post('DescriptionInput');
    $TotalPayment = $this->input->post('TotalPaymentInput');
    $PaymentMethod = $this->input->post('PaymentMethodInput');
    $PaymentDate = $this->input->post('PaymentDateInput');

    $data = array(
        'Payment_id' => $PaymentId,
        'Product' => $Product,
        'Description' => $Description,
        'Total_payment' => $TotalPayment,
        'Payment_method' => $PaymentMethod,
        'Payment_date' => $PaymentDate,
    );

    $this->Checkout_Model->EditCheckout($PaymentId, $data);

    redirect('CheckoutController');
}



public function deleteRecord($id)
{
    $this->Checkout_Model->deleteRecords($id);
    redirect('CheckoutController');
}

=======
    public function DeleteCheckout()
    {
        if ($this->input->is_ajax_request()) {
            $PaymentId = $this->input->post('PaymentId');
            if ($this->Checkout_Model->deleteCheckouttt($PaymentId)) {
                $response = array('success' => true);
                echo json_encode($response);
            } else {
                $response = array('success' => false, 'message' => 'Failed to delete the record.');
                echo json_encode($response);
            }
        } else {    
            show_error('Invalid request.', 400);
        }
    }
>>>>>>> 0fe21d09c150e1d46a0f0cc15fdeeb476e2e7d74
}