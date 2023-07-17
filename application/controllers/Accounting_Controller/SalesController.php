<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Accounting_Model/Sales_Model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $data['Sales'] = $this->Sales_Model->GetAllSales();
        $data['Total'] = $this->Sales_Model->CalcTotal();

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Accounting/SalesView', $data);
        } else if ($user['role'] == "Accounting") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $this->load->view('Accounting/SalesView', $data);
        }
    }
}