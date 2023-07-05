<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class HR_Model extends CI_Model {
    public function addEmployees($data) {
        return $this->db->insert('employee', $data);
    }


    public function getEmployees($id) {
        return $this->db->get_where('employee', array('Employee_id' => $id))->row_array();
    }


    public function getEmployee()
    {
        $this->db->order_by('Employee_id', 'asc');
        return $this->db->get('employee')->result_array();
    }
    

    public function EditEmployee($employeeId, $data) {
        $this->db->set($data);
        $this->db->where('Employee_id', $employeeId);
        $this->db->update('employee');

        return $this->db->affected_rows() > 0;
    }


    public function deleteRecords($employeeId)
    {
        $this->db->where('Employee_id', $employeeId);
        $this->db->delete('employee');
        
        return $this->db->affected_rows() > 0;
    }

    public function Search($id){
        $this->db->like('Employee_id', $id);
        return $this->db->get('employee')->result_array();
    }
}
    
?>

