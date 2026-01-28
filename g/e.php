<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>Dashboard - ชัชวาล สิงห์เทศ(แบงค์)</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f4f7f6;
            color: #333;
            margin: 0;
            padding: 40px;
        }
        .dashboard-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            padding: 30px;
            max-width: 900px;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .header { width: 100%; text-align: center; margin-bottom: 20px; }
        .table-section { flex: 1; min-width: 300px; }
        .chart-section { flex: 1; min-width: 300px; display: flex; align-items: center; }
        
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #6c5ce7;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }
        tr:hover { background-color: #f9f9ff; }
        
        canvas { max-width: 100% !important; height: auto !important; }
    </style>
</head>

<body>

<div class="dashboard-card">
    <div class="header">
        <h1 style="color: #2d3436; margin: 0;">ชัชวาล สิงห์เทศ (แบงค์)</h1>
        <p style="color: #636e72;">ผู้จัดทำ: ชัชวาล สิงห์เทศ (แบงค์)</p>
    </div>

    <div class="table-section">
        <table>
            <thead>
                <tr>
                    <th>ประเทศ</th>
                    <th style="text-align: right;">ยอดขาย</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("connectdb.php");
                $sql = "SELECT `p_country`, SUM(`p_amount`) AS total_sales FROM `popsupermarket` GROUP BY `p_country` ";
                $rs = mysqli_query($conn, $sql);

                $labels = []; $sales = [];
                while ($data = mysqli_fetch_array($rs)) {
                    $labels[] = $data['p_country'];
                    $sales[] = (float)$data['total_sales'];
                ?>
                <tr>
                    <td><strong><?php echo $data['p_country']; ?></strong></td>
                    <td align="right"><?php echo number_format($data['total_sales'], 0); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="chart-section">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut', // เปลี่ยนเป็น Doughnut จะดูสวยและทันสมัยกว่า Pie
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($sales); ?>,
                backgroundColor: [
                    '#6c5ce7', '#a29bfe', '#00cec9', '#fab1a0', '#ffeaa7', '#fd79a8'
                ],
                borderWidth: 2,
                hoverOffset: 20 // เพิ่มเอฟเฟกต์เวลาเอาเมาส์ไปชี้
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { font: { family: 'Kanit', size: 14 } }
                }
            }
        }
    });
</script>

</body>
</html>