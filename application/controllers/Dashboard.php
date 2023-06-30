<!-- Admin -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        // Load any necessary models or helpers
    }

    public function index() {
        // Load the dashboard view
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $this->load->view('Dashboard', $data);
        }
        else {
            redirect('LoginController');
        }
    }
}
