<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExpensesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Accounting_Model/Expenses_Model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');

        $data['Slippers'] = $this->Expenses_Model->getProductsById('Slippers');
        $data['BlackShoes'] = $this->Expenses_Model->getProductsById('Black Shoes');
        $data['RubberShoes'] = $this->Expenses_Model->getProductsById('Rubber Shoes');
        $data['TotalProductExpenses'] = $this->Expenses_Model->getTotalProductExpenses();

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Accounting/ExpensesView', $data);
        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $this->load->view('Dashboard', $data);
        }
    }



}