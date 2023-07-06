<!DOCTYPE html>
<html>
<head>
    <title>Data Analytics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial", "Helvetica", sans-serif;
            background-color: #f9f9f9;
            color: black;
        }

        #contents {
            margin-left: 300px;
            padding-top: 80px;
        }
    </style>
</head>
<body>
    <?php $this->load->view($navbar) ?>
    <div id="contents">
        <h1 style="text-align: center; padding: 10px; font-size: 30px; font-weight: bold; margin: 0;">Data Analytics</h1>
        <div name="data analytics for sales">
            <table style="width: 95%; padding-left: 5%;">
                <tr>
                    <td colspan="2">
                        <p style="text-align: center; font-size: 20px; padding-top: 3%;">Sales Chart</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <canvas style="width: 100%;" id="salesChart"></canvas>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p style="text-align: center; font-size: 20px; padding-top: 3%;">Expenses Chart</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <canvas style="width: 100%;" id="expensesChart"></canvas>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p style="text-align: center; font-size: 20px; padding-top: 5%;">Payroll Graph</p>
                    </td>
                    <td>
                        <p style="text-align: center; font-size: 20px; padding-top: 5%;">Accounting Graph</p>
                    </td>
                </tr>
                <tr style="width: 100%;">
                    <td style="width: 50%;">
                        <canvas id="PayrollGraph"></canvas>
                    </td>
                    <td style="width: 50%;">
                        <canvas id="OverallGraph"></canvas>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <script>
        // Sales Chart
        var salesData = <?php echo json_encode($result); ?>;
        var salesDates = [];
        var salesPrices = [];

        for (var i = 0; i < salesData.length; i++) {
            salesDates.push(salesData[i].DATE);
            salesPrices.push(salesData[i].Price);
        }

        var salesChartCtx = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(salesChartCtx, {
            type: 'bar',
            data: {
                labels: salesDates,
                datasets: [{
                    label: 'Total Sales',
                    data: salesPrices,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Expenses Chart
        var expensesData = <?php echo json_encode($Expenses); ?>;
        var expensesNames = [];
        var expensesTotalPrices = [];

        for (var i = 0; i < expensesData.length; i++) {
            expensesNames.push(expensesData[i].Product_name);
            expensesTotalPrices.push(expensesData[i].TotalPrice);
        }

        var expensesChartCtx = document.getElementById('expensesChart').getContext('2d');
        var expensesChart = new Chart(expensesChartCtx, {
            type: 'bar',
            data: {
                labels: expensesNames,
                datasets: [{
                    label: 'Total Expenses',
                    data: expensesTotalPrices,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Payroll Graph
        var payrollData = <?php echo json_encode($Payroll); ?>;
        var employeeNames = [];
        var employeeSalaries = [];

        for (var i = 0; i < payrollData.length; i++) {
            employeeNames.push(payrollData[i].Name);
            employeeSalaries.push(payrollData[i].Salary);
        }

        var payrollGraphCtx = document.getElementById('PayrollGraph').getContext('2d');
        var payrollGraph = new Chart(payrollGraphCtx, {
            type: 'pie',
            data: {
                labels: employeeNames,
                datasets: [{
                    label: 'Salaries',
                    data: employeeSalaries,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Accounting Graph
        var overallData = <?php echo json_encode($Overall); ?>;
        var categories = [];
        var totals = [];

        for (var i = 0; i < overallData.length; i++) {
            categories.push(overallData[i].Category);
            totals.push(overallData[i].Total);
        }

        var overallGraphCtx = document.getElementById('OverallGraph').getContext('2d');
        var overallGraph = new Chart(overallGraphCtx, {
            type: 'pie',
            data: {
                labels: categories,
                datasets: [{
                    label: 'Total',
                    data: totals,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
