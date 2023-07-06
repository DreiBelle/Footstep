<?php
class DataAnalytics_Model extends CI_Model
{
    public function GetSalesData()
    {
        $query = $this->db->query("SELECT DATE, SUM(TotalPrice) AS TotalPrice FROM sales GROUP BY DATE");
        return $query->result();
    }

    public function GetExpensesData()
    {
        $query = $this->db->query("SELECT Product_name, SUM(Quantity) AS TotalQuantity, SUM(Price) AS TotalPrice FROM expenses GROUP BY Product_name");
        return $query->result();
    }

    public function GetPayrollData()
    {
        $query = $this->db->query("SELECT e.Name, s.Salary
            FROM employee e
            INNER JOIN payroll s ON e.Employee_id = s.Employee_id");
        return $query->result();
    }

    public function GetOverall()
    {
        $query = $this->db->query("SELECT 'Expenses' AS Category, SUM(Price) AS Total FROM expenses
        UNION
        SELECT 'Sales' AS Category, SUM(TotalPrice) AS Total FROM sales
        UNION
        SELECT 'Salary' AS Category, SUM(Salary) AS Total FROM payroll");
        return $query->result();
    }
}
?>
