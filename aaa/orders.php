<?php
    session_start();
    
    // ตรวจสอบพาธไฟล์เชื่อมต่อ
    $include_path = "../connectdb.php"; 
    
    // ถ้าหาชั้นเดียวไม่เจอ ให้ลองถอยออกไปอีกชั้น (กันเหนียว)
    if (!file_exists($include_path)) {
        $include_path = "../../connectdb.php";
    }

    if (file_exists($include_path)) {
        include_once($include_path);
    } else {
        // หากยังไม่เจออีก ให้แจ้งเตือนพร้อมบอกตำแหน่งปัจจุบันที่ระบบหาอยู่
        die("<div style='color:red; padding:20px; border:1px solid red; background:#fff;'>
                <b>Error:</b> ไม่พบไฟล์เชื่อมต่อฐานข้อมูล<br>
                ตำแหน่งปัจจุบันของไฟล์นี้: " . __FILE__ . "
             </div>");
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

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">⬅️ กลับหน้า Dashboard</a>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 รายการคำสั่งซื้อ</h2>
        <span class="badge bg-primary text-wrap">แอดมิน: <?php echo $_SESSION['aname']; ?></span>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>เลขที่สั่งซื้อ</th>
                            <th>ยอดรวมสุทธิ</th>
                            <th>สถานะการชำระ</th>
                            <th class="text-center">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // ตรวจสอบชื่อตัวแปรเชื่อมต่อใน connectdb.php ด้วย (ปกติคือ $conn หรือ $con)
                            // ในที่นี้ใช้ $conn ตามโค้ดที่คุณส่งมา
                            $sql = "SELECT * FROM orders ORDER BY oid DESC";
                            $rs = @mysqli_query($conn, $sql);

                            if ($rs && mysqli_num_rows($rs) > 0) {
                                while($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td class="fw-bold">#<?php echo str_pad($row['oid'], 5, "0", STR_PAD_LEFT); ?></td>
                            <td><?php echo number_format($row['o_total'], 2); ?> ฿</td>
                            <td>
                                <?php if($row['o_status'] == 1): ?>
                                    <span class="badge bg-success">✅ ชำระเงินแล้ว</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">⏳ รอการตรวจสอบ</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-outline-info btn-sm">รายละเอียด</button>
                                <button class="btn btn-outline-danger btn-sm">ลบ</button>
                            </td>
                        </tr>
                        <?php 
                                }
                            } else {
                                if (!$rs) {
                                    echo "<tr><td colspan='4' class='alert alert-danger'>SQL Error: " . mysqli_error($conn) . " (เช็คชื่อตารางใน DB)</td></tr>";
                                } else {
                                    echo "<tr><td colspan='4' class='text-center py-5 text-muted'>ไม่มีรายการสั่งซื้อในขณะนี้</td></tr>";
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