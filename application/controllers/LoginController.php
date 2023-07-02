
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
        $this->load->view('LoginView', $data);
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
         
            // Redirect based on the user role
            if ($user->role === 'Administrator') {
                redirect('Dashboard'); // Redirect to the admin dashboard
            } elseif ($user->role === 'Cashier') {
                redirect('CheckoutController'); // Redirect to the cashier dashboard
            } elseif ($user->role === 'Finance') {
                redirect('AccountingController'); // Redirect to the cashier dashboard
            }
            else {
                $data['error'] = 'Invalid username or password';
                echo '<script></script>';
                $this->load->view('LoginView', $data);
            }
        } 
    }
}
?>
