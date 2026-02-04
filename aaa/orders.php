<?php
    session_start();
    // ระบุ Path ถอยกลับ 1 ชั้นเพื่อหาไฟล์เชื่อมต่อฐานข้อมูล
    include_once("../connectdb.php"); 
    
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
    <title>จัดการสินค้า - ชัชวาล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Sarabun', sans-serif; background-color: #f8f9fa; }
        .product-img { width: 60px; height: 60px; object-fit: cover; border-radius: 8px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .table thead { background-color: #0d6efd; color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-primary mb-4 shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">⬅️ กลับหน้าหลัก</a>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">📦 รายการสินค้าทั้งหมด</h2>
        <button class="btn btn-success rounded-pill px-4">+ เพิ่มสินค้าใหม่</button>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">รูปภาพ</th>
                            <th>ชื่อสินค้า</th>
                            <th>ประเภท</th>
                            <th>ราคา (บาท)</th>
                            <th>คงเหลือ</th>
                            <th class="text-center">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // ดึงข้อมูลสินค้าพร้อมชื่อประเภทสินค้า (สมมติว่ามีตาราง categories)
                            $sql = "SELECT * FROM orders ORDER BY p_id DESC";
                            $rs = mysqli_query($conn, $sql);

                            if ($rs && mysqli_num_rows($rs) > 0) {
                                while($data = mysqli_fetch_array($rs)) {
                        ?>
                        <tr class="align-middle">
                            <td class="ps-4">
                                <img src="../img/<?php echo $data['p_img']; ?>" class="product-img border" alt="สินค้า">
                            </td>
                            <td>
                                <div class="fw-bold"><?php echo $data['p_name']; ?></div>
                                <small class="text-muted">รหัส: #<?php echo $data['p_id']; ?></small>
                            </td>
                            <td>
                                <span class="badge bg-info text-dark">
                                    <?php echo $data['p_type']; // ดึงข้อมูลประเภทสินค้า ?>
                                </span>
                            </td>
                            <td class="fw-bold text-primary">
                                <?php echo number_format($data['p_price'], 2); ?>
                            </td>
                            <td>
                                <?php if($data['p_stock'] <= 5): ?>
                                    <span class="text-danger fw-bold"><?php echo $data['p_stock']; ?> (ใกล้หมด!)</span>
                                <?php else: ?>
                                    <?php echo $data['p_stock']; ?>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm">แก้ไข</button>
                                <button class="btn btn-danger btn-sm">ลบ</button>
                            </td>
                        </tr>
                        <?php 
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-5 text-muted'>ยังไม่มีข้อมูลสินค้าในระบบ</td></tr>";
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