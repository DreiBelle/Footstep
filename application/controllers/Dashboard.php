<!-- Admin -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function index() {
        $user = $this->session->userdata('user');
        if ($user) {
            $data['user'] = $user;
            $this->load->view('Dashboard', $data);
        }
        else {
            redirect('LoginController');
        }
    }
    public function Logout() {
        $this->session->unset_userdata('user');
        redirect('LoginController');
    }
}
