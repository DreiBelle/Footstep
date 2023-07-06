<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAnalyticsController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('DataAnalytics_Model'); // Load the model
    }

    public function index() {
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('DataAnalytics', $data);
        }
    }

    public function AccountingReport()
    {
        $user = $this->session->userdata('user');
        $data['result'] = $this->DataAnalytics_Model->GetSalesData();
        $data['Expenses'] = $this->DataAnalytics_Model->GetExpensesData();
        $data['Payroll'] = $this->DataAnalytics_Model->GetPayrollData();
        $data['Overall'] = $this->DataAnalytics_Model->GetOverall();

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('DataAnalytics', $data); // Load the correct view file
        }
    }
}
?>
