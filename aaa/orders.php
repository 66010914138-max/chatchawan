<?php
    session_start();
    
    // กำหนด Path การดึงไฟล์เชื่อมต่อให้ถูกต้อง (ถอยออก 1 ชั้นจากโฟลเดอร์ aaa)
    $include_path = "../connectdb.php"; 
    
    if (file_exists($include_path)) {
        include_once($include_path);
    } else {
        // ถ้าหาไม่เจอ ให้แจ้งเตือนแบบอ่านง่าย
        die("<div style='color:red; text-align:center; margin-top:50px;'>
                <h4>ไม่พบไฟล์เชื่อมต่อฐานข้อมูล!</h4>
                <p>ตรวจสอบว่าไฟล์ connectdb.php อยู่ในโฟลเดอร์หลัก (chatchawan) หรือไม่</p>
             </div>");
    }

    // ตรวจสอบสิทธิ์การเข้าใช้งาน
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
    <h2 class="mb-4 text-center">📋 รายการคำสั่งซื้อทั้งหมด</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>เลขที่ใบสั่งซื้อ</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>ยอดรวมสุทธิ</th>
                            <th>สถานะ</th>
                            <th class="text-center">การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // ดึงข้อมูลจากตาราง orders (ตรวจสอบชื่อตารางในฐานข้อมูลของคุณด้วย)
                            $sql = "SELECT * FROM orders ORDER BY oid DESC";
                            $rs = mysqli_query($conn, $sql);

                            if ($rs && mysqli_num_rows($rs) > 0) {
                                while($row = mysqli_fetch_array($rs)) {
                        ?>
                        <tr>
                            <td>#<?php echo str_pad($row['oid'], 5, "0", STR_PAD_LEFT); ?></td>
                            <td><?php echo $row['o_date']; ?></td>
                            <td class="fw-bold"><?php echo number_format($row['o_total'], 2); ?> ฿</td>
                            <td>
                                <?php 
                                    if($row['o_status'] == 1) echo "<span class='badge bg-success'>ชำระเงินแล้ว</span>";
                                    else echo "<span class='badge bg-warning text-dark'>รอชำระเงิน</span>";
                                ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-primary btn-sm">รายละเอียด</button>
                                <button class="btn btn-danger btn-sm">ลบ</button>
                            </td>
                        </tr>
                        <?php 
                                }
                            } else {
                                // กรณีไม่มีข้อมูลหรือชื่อตารางผิด
                                if (!$rs) {
                                    echo "<tr><td colspan='5' class='text-danger text-center'>SQL Error: กรุณาสร้างตาราง 'orders' ในฐานข้อมูลของคุณ</td></tr>";
                                } else {
                                    echo "<tr><td colspan='5' class='text-center py-4 text-muted'>ยังไม่มีรายการสั่งซื้อในขณะนี้</td></tr>";
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