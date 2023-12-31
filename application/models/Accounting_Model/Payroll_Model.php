<?php
class Payroll_Model extends CI_Model
{
    public function getEmployeesWithSalary()
    {
        $this->db->select('employee.Employee_id, employee.Name AS Employee_name, employee.Position AS Employee_position, employee.Hire_date, employee.Address AS Employee_address, payroll.Salary, payroll.Date_received');
        $this->db->from('employee');
        $this->db->join('payroll', 'employee.Employee_id = payroll.Employee_id', 'left');
        $this->db->order_by('employee.Employee_id', 'asc');
        return $this->db->get()->result_array();
    }
    

    public function insertSalary($employeeId, $salary, $dateReceived)
    {
        $data = array(
            'Employee_id' => $employeeId,
            'Salary' => $salary,
            'Date_received' => $dateReceived,
            'Type' => 'Cash',
            'Status' => 'Paid',
        );
        return $this->db->insert('payroll', $data);
    }

    public function updateSalary($employeeId, $data)
    {
        $this->db->where('Employee_id', $employeeId);
        $this->db->update('payroll', $data);

        return $this->db->affected_rows() > 0;
    }

    public function get_payroll(){
        $this->db->order_by('Payroll_ID', 'asc');
        $query = $this->db->get('payroll');
        return $query->result_array();
    }
}
?>