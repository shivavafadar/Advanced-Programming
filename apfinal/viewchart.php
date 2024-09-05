<!DOCTYPE html>
<html>
<head>
    <title>View Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 50%;">
            <canvas id="salesChart" width="400" height="400"></canvas>
        </div>
        <div style="width: 50%;">
            <canvas id="salesPieChart" width="400" height="400"></canvas>
        </div>
    </div>

    <script>
        <?php
        // Read product names from the CSV file
        $productNames = array();
        $file = fopen('commodities.csv', 'r');
        while (($data = fgetcsv($file)) !== FALSE) {
            $productNames[] = $data[0];
        }
        fclose($file);

        // Generate random sales data for demonstration
        // Replace this with your actual sales data retrieval logic
        $salesData = array();
        foreach ($productNames as $product) {
            $salesData[] = rand(10, 100);
        }
        ?>

        // Retrieve product names and sales data from PHP variables
        var productNames = <?php echo json_encode($productNames); ?>;
        var salesData = <?php echo json_encode($salesData); ?>;

        // Create a new bar chart
        var ctx = document.getElementById('salesChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: productNames, // X-axis labels (product names)
                datasets: [{
                    label: 'Sales',
                    data: salesData, // Y-axis data (sales amount)
                    backgroundColor: 'rgba(172, 38, 83, 0.6)', // Bar color
                    borderColor: 'rgba(172, 38, 83, 0.6)', // Border color
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true // Start Y-axis at zero
                    }
                }
            }
        });

        // Create a new pie chart
        var pieCtx = document.getElementById('salesPieChart').getContext('2d');
        var pieChart = new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: productNames, // Product names
                datasets: [{
                    label: 'Sales',
                    data: salesData, // Sales data
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 129, 200, 0.6)',
                        'rgba(54, 162, 30, 0.6)',
                        'rgba(10, 20, 200, 0.6)',
                        'rgba(75, 92, 12, 0.6)',
                        'rgba(75, 12, 192, 0.6)',
                        'rgba(75, 255, 192, 0.6)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 129, 200, 0.6)',
                        'rgba(54, 162, 30, 0.6)',
                        'rgba(10, 20, 200, 0.6)',
                        'rgba(75, 92, 12, 0.6)',
                        'rgba(75, 12, 192, 0.6)',
                        'rgba(75, 255, 192, 0.6)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>
