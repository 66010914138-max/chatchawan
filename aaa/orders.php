<?php
    session_start();
    include_once("../connectdb.php"); // เช็ก path ให้ดีตามโครงสร้างโฟลเดอร์ของคุณ
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
    <style>
        .status-pending { color: #ffc107; fw-bold; } /* รอชำระเงิน */
        .status-paid { color: #198754; fw-bold; }    /* ชำระแล้ว */
        .status-shipped { color: #0d6efd; fw-bold; } /* ส่งแล้ว */
    </style>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index2.php">⬅️ กลับหน้า Dashboard</a>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">📋 รายการคำสั่งซื้อจากลูกค้า</h2>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>เลขที่ใบสั่งซื้อ</th>
                            <th>วันที่สั่งซื้อ</th>
                            <th>ชื่อลูกค้า</th>
                            <th>ยอดรวมสุทธิ</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // สมมติชื่อตาราง orders เชื่อมกับตาราง members เพื่อเอาชื่อลูกค้า
                            $sql = "SELECT orders.*, members.m_name 
                                    FROM orders 
                                    LEFT JOIN members ON orders.m_id = members.m_id 
                                    ORDER BY orders.oid DESC";
                            $rs = mysqli_query($conn, $sql);

                            if ($rs && mysqli_num_rows($rs) > 0) {
                                while($row = mysqli_fetch_array($rs)) {
                                    // กำหนดสีตามสถานะ
                                    $status_class = "";
                                    if($row['o_status'] == 0) $status_class = "status-pending";
                                    if($row['o_status'] == 1) $status_class = "status-paid";
                        ?>
                        <tr>
                            <td>#<?php echo str_pad($row['oid'], 5, "0", STR_PAD_LEFT); ?></td>
                            <td><?php echo $row['o_date']; ?></td>
                            <td><?php echo $row['m_name']; ?></td>
                            <td><?php echo number_format($row['o_total'], 2); ?> ฿</td>
                            <td class="<?php echo $status_class; ?>">
                                <?php 
                                    if($row['o_status'] == 0) echo "⏳ รอชำระเงิน";
                                    else if($row['o_status'] == 1) echo "✅ ชำระแล้ว";
                                    else echo "🚚 ส่งสินค้าแล้ว";
                                ?>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm text-white">ดูรายละเอียด</button>
                                <button class="btn btn-outline-primary btn-sm">อัปเดตสถานะ</button>
                            </td>
                        </tr>
                        <?php 
                                }
                            } else {