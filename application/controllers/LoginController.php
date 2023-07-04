
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $data['error'] = 'Invalid username or password';
        echo '<script></script>';
        $this->load->view('LoginView');
    }

    public function authenticate() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->get_user($username, $password);

        if ($user) {
            $userData = array(
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'password' => $user->password,
                'role' => $user->role,
            );

            $this->session->set_userdata('user', $userData);

            redirect('Dashboard');
        } 
        else {
            // Invalid username or password
            $data['error'] = 'Invalid username or password';
            echo '<script>alert("' . $data['error'] . '");</script>';
            $this->load->view('LoginView');
        }
    }
}
?>
