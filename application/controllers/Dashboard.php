<!-- Admin -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Accounting_Model/Payroll_Model');
        $this->load->model('Accounting_Model/Purchase_Model');
        $this->load->model('HR_Model');
        $this->load->model('Checkout_Model');
        $this->load->model('Inventory_Model');
        $this->load->model('Stock_Model');
    }

    public function index() {
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Dashboard', $data);
        } else if ($user['role'] == "Cashier") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/CashierNavbar";
            $this->load->view('Dashboard', $data);
        }
        else if ($user['role'] == "Accounting") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $data['employees'] = $this->Payroll_Model->getEmployeesWithSalary();
            $this->load->view('Dashboard', $data);
        }
        else if ($user['role'] == "HR") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/HrNavbar";
            $data['check'] = $this->HR_Model->getEmployee();
            $this->load->view('Dashboard', $data);
        }
        else if ($user['role'] == "Inventory") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/InventoryNavbar";
            $data['check'] = $this->Inventory_Model->get_all_product();
            $this->load->view('Dashboard', $data);
        }
    }
    public function Logout() {
        $this->session->unset_userdata('user');
        redirect('LoginController');
    }

}
