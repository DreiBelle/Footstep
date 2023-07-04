<!-- Admin -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
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
        else if ($user['role'] == "Finance") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $this->load->view('Dashboard', $data);
        }
        else if ($user['role'] == "HR") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/HrNavbar";
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
