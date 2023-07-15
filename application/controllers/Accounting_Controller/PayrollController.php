<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PayrollController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Accounting_Model/Payroll_Model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $data['employees'] = $this->Payroll_Model->getEmployeesWithSalary();
            $this->load->view('Accounting/PayrollView', $data);
        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $this->load->view('Dashboard', $data);
        }
    }

    public function insertSalary()
    {
        $Employee_id = $this->input->post('Employee_id');
        $Salary = $this->input->post('Salary');
    
        if ($this->Payroll_Model->insertSalary($Employee_id, $Salary)) {
            // Salary added successfully
            redirect('Accounting_Controller/PayrollController');
        } else {
           
        }
    }
    
}
