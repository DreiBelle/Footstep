<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Accounting_Model/Sales_Model');
    }

    public function index()
    {
        $user = $this->session->userdata('user');
        $data['Sales'] = $this->Sales_Model->GetAllSales();
        $data['Total'] = $this->Sales_Model->CalcTotal();
        $data['Item'] = $this->Sales_Model->GetItems();


        if ($user['role'] == "Administrator") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/AdminNavbar";
            $this->load->view('Accounting/SalesView', $data);
        } else if ($user['role'] == "Accounting") {
            $data['user'] = $user;
            $data['navbar'] = "navbar/FinanceNavbar";
            $this->load->view('Accounting/SalesView', $data);
        }
    }

    public function getbyid()
    {
        $ID = $this->input->post("ItemID");
        $Items = $this->Sales_Model->GetItembyID($ID);

        echo "<table>
        <thead>
            <tr>
                <th>ItemID</th>
                <th>ItemName</th>
                <th>ItemQuantity</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>";
        foreach ($Items as $row) {
            echo "
                <tr>
                    <td>
                        " . $row->ItemID . "
                    </td>
                    <td>
                        " . $row->ItemName . "
                    </td>
                    <td>
                        " . $row->ItemQuantity . "
                    </td>
                    <td>
                        " . $row->Date . "
                    </td>
                </tr>
                ";
        }
        ;
        echo "
        </tbody>
    </table>";

    }
}