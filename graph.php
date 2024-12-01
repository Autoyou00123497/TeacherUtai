<?php
require_once 'conn.php';

// Corrected SQL query
$stmt = $conn->prepare("
    SELECT SUM(total) AS total, DATE_FORMAT(datesave, '%Y') AS datesave 
    FROM tblsale
    GROUP BY DATE_FORMAT(datesave, '%Y')
    ORDER BY DATE_FORMAT(datesave, '%Y') DESC
");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Prepare data for JavaScript
$datesave = [];
$total = [];
foreach ($result as $rs) {
    $datesave[] = '"' . $rs['datesave'] . '"';
    $total[] = $rs['total'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report of Sale Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <!-- Chart.js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h4>Report</h4>
            <canvas id="myChart" width="800px" height="300px"></canvas>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [<?php echo implode(',', $datesave); ?>],
            datasets: [{
                label: 'Report Sale Document by Year (Baht)',
                data: [<?php echo implode(',', $total); ?>],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
</body>
</html>
