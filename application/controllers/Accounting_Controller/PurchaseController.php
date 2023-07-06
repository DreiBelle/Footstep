<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PurchaseController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Accounting_Model/Purchase_Model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');

        $data['Slippers'] = $this->Purchase_Model->getProductsById('Slippers');
        $data['BlackShoes'] = $this->Purchase_Model->getProductsById('Black Shoes');
        $data['RubberShoes'] = $this->Purchase_Model->getProductsById('Rubber Shoes');
        $data['TotalProductExpenses'] = $this->Purchase_Model->getTotalProductExpenses();

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Accounting/PurchaseView', $data);
        } else if ($user['role'] == "Accounting") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $this->load->view('Accounting/PurchaseView', $data);
        }
    }



}