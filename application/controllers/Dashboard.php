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
    }

    // public function index() {
    //     $user = $this->session->userdata('user');
    //     if ($user) {
    //         $data['user'] = $user;
    //         $this->load->view('Dashboard', $data);
    //     }
    //     else {
    //         redirect('LoginController');
    //     }
    // }
//new
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
            $this->load->view('Dashboard', $data);
        }
    }
    public function Logout() {
        $this->session->unset_userdata('user');
        redirect('LoginController');
    }

}
