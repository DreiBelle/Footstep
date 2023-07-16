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
        $employeeId = $this->input->post('employeeId');
        $salary = $this->input->post('salary');
        $dateReceived = date('Y-m-d'); 

        if ($this->Payroll_Model->insertSalary($employeeId, $salary, $dateReceived)) {
            redirect('Accounting_Controller/PayrollController');
        } else {
    
        }
    }

    public function updateSalary()
    {
        $employeeId = $this->input->post('employeeId');
        $salary = $this->input->post('salary');
        $dateReceived = $this->input->post('dateReceived');
        
        $data = array(
            'Salary' => $salary,
            'Date_received' => $dateReceived
        );
        
        if ($this->Payroll_Model->updateSalary($employeeId, $data)) {
            redirect('Accounting_Controller/PayrollController');
        } else {
            // Handle error
        }
    }
    
}
?>
