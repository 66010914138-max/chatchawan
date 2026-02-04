<?php
    session_start();
    
    // 1. ตรวจสอบพาธไฟล์เชื่อมต่อ (ลองใช้แบบระบุตำแหน่งให้ชัดเจน)
    $include_path = "../connectdb.php";
    if (file_exists($include_path)) {
        include_once($include_path);
    } else {
        die("Error: ไม่พบไฟล์ connectdb.php ในตำแหน่ง $include_path");
    }

    if(empty($_SESSION['aid'])){
        echo "<meta http-equiv='refresh' content='0;url=index.php'>"; 
        exit;
    }
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จัดการคำสั่งซื้อ - ชัชวาล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index2.php">⬅️ กลับหน้า Dashboard</a>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">📋 รายการคำสั่งซื้อ</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>เลขที่สั่งซื้อ</th>
                            <th>ยอดรวม</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // 2. เช็กชื่อตาราง: ตรวจสอบใน phpMyAdmin ว่าคุณมีตารางชื่อ orders หรือไม่
                            $sql = "SELECT * FROM orders ORDER BY oid DESC";
                            $rs = mysqli_query($conn, $sql);

                            if ($rs && mysqli_num_rows($rs) > 0) {
                                while($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>#<?php echo $row['oid']; ?></td>
                            <td><?php echo number_format($row['o_total'], 2); ?> ฿</td>
                            <td>
                                <?php echo ($row['o_status'] == 1) ? "✅ ชำระแล้ว" : "⏳ รอชำระเงิน"; ?>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm text-white">ดูรายละเอียด</button>
                            </td>
                        </tr>
                        <?php 
                                }
                            } else {
                                // ถ้า Query ล้มเหลว ให้แสดง error เพื่อจะได้รู้ว่าพังที่จุดไหน
                                if (!$rs) {
                                    echo "<tr><td colspan='4' class='text-danger'>SQL Error: " . mysqli_error($conn) . "</td></tr>";
                                } else {
                                    echo "<tr><td colspan='4' class='text-center py-4 text-muted'>ยังไม่มีรายการสั่งซื้อ</td></tr>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>