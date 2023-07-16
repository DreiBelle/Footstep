<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SettingController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Setting_Model');

        // Load any necessary models or helpers
    }

    // public function index() {
    //     // Load the CheckoutManagement view
    //     $user = $this->session->userdata('user');
    //     if ($user['role'] == "Administrator") {
    //         $data['user'] = $user;
    //         $data['navbar'] = "navbar/AdminNavbar";
    //         $this->load->view('SettingView', $data);
    //     } 
    // }

    public function index()
    {
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            // Pass the user data to the view
            $data['user'] = $user;
            $data['records'] = $this->Setting_Model->getRecords();
            // Load the view
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('SettingView', $data);
        } else {
            // User data not found in session, redirect to login
            redirect('LoginController');
        }
    }
}



