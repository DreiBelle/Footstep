<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HRController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('HR_Model');
        // Load any necessary models or helpers
    }

    public function index() {
        $user = $this->session->userdata('user');
        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['check'] = $this->HR_Model->getEmployee();
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('HRManagement', $data);
        } else if ($user['role'] == "HR") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/HrNavbar";
            $this->load->view('Dashboard', $data);
        }
    }

    public function addEmployee()
    {
        $EmployeeId = $this->input->post('EmployeeId');
        $Name = $this->input->post('Name');
        $Position = $this->input->post('Position');
        $HireDate = $this->input->post('HireDate');
        $Address = $this->input->post('Address');
    
        $data = array(
            'Employee_id' => $EmployeeId,
            'Name' => $Name,
            'Position' => $Position,
            'Hire_date' => date('Y-m-d', strtotime($HireDate)), // Convert date to datetime format
            'Address' => $Address,
        );
    
        $this->HR_Model->addEmployees($data);
    
        redirect('HRController');
    }

    public function viewEmployee()
    {
        // Load the CheckoutManagement view
        $user = $this->session->userdata('user');
        $searchid = $this->input->get('asd');

        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
         
            $data['navbar'] = "navbar/AdminNavbar";
            if(!empty($searchid)){
                $data['check'] = $this->HR_Model->Search($searchid);
            }
            else{
                $data['check'] = $this->HR_Model->getEmployee();
            }
            $this->load->view('HRManagement', $data);
        } else if ($user['role'] == "Hr") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/HrNavbar";
            $this->load->view('HRManagement', $data);
        }
    }

    
    public function editEmployee()
    {
        $EmployeeId = $this->input->post('EmployeeIdInput');
        $Name = $this->input->post('NameInput');
        $Position = $this->input->post('PositionInput');
        $HireDate = $this->input->post('HireDateInput');
        $Address= $this->input->post('AddressInput');

        $data = array(
            'Employee_id' => $EmployeeId,
            'Name' => $Name,
            'Position' => $Position,
            'Hire_date' => $HireDate,
            'Address' => $Address,
        );

        $this->HR_Model->EditEmployee($EmployeeId, $data);

        redirect('HRController');
    }

    public function deleteRecord($id)
    {
        $this->HR_Model->deleteRecords($id);
        redirect('HRController');
    }
}
