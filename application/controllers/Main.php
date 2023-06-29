<?php
class Main extends CI_Controller {
    public function index()
    {
        $this->load->model('User_model'); // Load the User_model

        $data['user'] = $this->User_model->get_user(); // Call the get_user() method from the User_model and assign the result to $data['user']
        $this->load->view('show_user', $data); // Load the 'show_user' view and pass the $data array
    }
}
?>
