<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataAnalyticsController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Load any necessary models or helpers
    }

    public function index() {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('DataAnalytics', $data);
        }
    }
}
