<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบจัดการข้อมูลนักกีฬา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2 class="text-center mb-4">ฟอร์มบันทึกข้อมูลนักกีฬา</h2>

    <div class="row">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
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
                        <textarea name="note" class="form-control" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">บันทึกข้อมูล</button>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-striped table-hover border">
                <thead class="table-dark">
                    <tr>
                        <th>ID (PK)</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>ประเภท</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // เชื่อมต่อฐานข้อมูล
                    $conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");
                    
                    // คำสั่งดึงข้อมูล
                    $sql = "SELECT * FROM db_athlete ORDER BY id DESC";
                    $result = mysqli_query($conn, $sql);

                    // วนลูปแสดงข้อมูล 5 แถวหรือมากกว่าตามที่มีใน DB (โจทย์ข้อ 3)
                    while($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['sport_type']; ?></td>
                            <td><?php echo $row['note']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
