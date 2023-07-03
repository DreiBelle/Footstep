<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InventoryController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Load any necessary models or helpers
    }

    public function index() {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $this->load->view('InventoryManagement', $data);
        } else {
            redirect('LoginController');
        }
    }
}
