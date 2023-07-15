<?php
class Payroll_Model extends CI_Model
{
    public function getEmployeesWithSalary()
    {
        $this->db->select('employee.Employee_id, employee.Name AS Employee_name, employee.Position AS Employee_position, employee.Hire_date, employee.Address AS Employee_address, payroll.Salary');
        $this->db->from('employee');
        $this->db->join('payroll', 'employee.Employee_id = payroll.Employee_id', 'left');
        return $this->db->get()->result_array();
    }

    public function insertSalary($Employee_id, $Salary)
    {
        $data = array(
            'Employee_id' => $Employee_id,
            'Salary' => $Salary
        );
        return $this->db->insert('payroll', $data);
    }
    
}
