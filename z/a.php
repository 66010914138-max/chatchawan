<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ฟอร์มบันทึกข้อมูลนักกีฬา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; margin-top: 50px; }
        .card { border-radius: 10px; }
    </style>
</head>
<body class="container">

    <h2 class="text-center mb-5">ฟอร์มบันทึกข้อมูลนักกีฬา</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <form action="save.php" method="POST">
                    <div class="mb-3">
                        <label>ชื่อ-นามสกุล (Textbox):</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>ประเภทกีฬา (Radio):</label><br>
                        <input type="radio" name="sport_type" value="ในร่ม" checked> ในร่ม
                        <input type="radio" name="sport_type" value="กลางแจ้ง"> กลางแจ้ง
                    </div>

                    <div class="mb-3">
                        <label>ข้อมูลเพิ่มเติม (Textarea):</label>
                        <textarea name="note" class="form-control" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">บันทึกข้อมูล</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>ID (PK)</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ประเภท</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");
                    // ดึงข้อมูลมาแสดงตามข้อ 4
                    $sql = "SELECT * FROM db_athlete ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td class='text-center'>".$row['id']."</td>";
                        echo "<td>".$row['fullname']."</td>";
                        echo "<td>".$row['sport_type']."</td>";
                        echo "<td>".$row['note']."</td>";
                        echo "</tr>";
                    }
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
