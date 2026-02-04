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
    <title>Management - ชัชวาล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --accent-color: #4cc9f0;
            --bg-body: #f8f9fc;
        }
        body { 
            font-family: 'Sarabun', sans-serif; 
            background-color: var(--bg-body);
            color: #2b2d42;
        }
        /* Navbar Design */
        .navbar {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        /* Card & Table Style */
        .main-card {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            overflow: hidden;
        }
        .table thead {
            background-color: #f8f9fa;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }
        .product-img {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        /* Badges */
        .badge-price {
            background: #eef2ff;
            color: var(--primary-color);
            padding: 8px 12px;
            border-radius: 10px;
            font-weight: 600;
        }
        .badge-stock {
            background: #f0fdf4;
            color: #16a34a;
            padding: 5px 10px;
            border-radius: 8px;
        }
        .stock-low {
            background: #fff1f2;
            color: #e11d48;
        }
        /* Buttons */
        .btn-add {
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            border: none;
            color: white;
            padding: 10px 25px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-add:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index2.php">
            <span style="color: var(--primary-color);">ADMIN</span> PANEL
        </a>
        <div class="ms-auto d-flex align-items-center">
            <div class="me-3 d-none d-md-block">
                <small class="text-muted">สวัสดี,</small>
                <span class="fw-600"><?php echo $_SESSION['aname']; ?></span>
            </div>
            <a href="logout.php" class="btn btn-light btn-sm rounded-pill border">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container pb-5">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="fw-bold mb-0">📦 จัดการสต็อกสินค้า</h3>
            <p class="text-muted mb-0 small">ตรวจสอบข้อมูลสินค้า ประเภท ราคา และจำนวนคงเหลือ</p>
        </div>
        <div class="col-auto">
            <button class="btn btn-add">+ เพิ่มรายการใหม่</button>
        </div>
    </div>

    <div class="main-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">สินค้า</th>
                        <th>หมวดหมู่</th>
                        <th>ราคาขาย</th>
                        <th>คลังสินค้า</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM products ORDER BY p_id DESC";
                        $rs = mysqli_query($conn, $sql);

                        if ($rs && mysqli_num_rows($rs) > 0) {
                            while($data = mysqli_fetch_array($rs)) {
                                $low_stock = ($data['p_stock'] <= 5) ? 'stock-low' : '';
                    ?>
                    <tr>
                        <td class="ps-4">
                            <div class="d-flex align-items-center">
                                <img src="../img/<?php echo $data['p_img']; ?>" class="product-img me-3">
                                <div>
                                    <div class="fw-bold"><?php echo $data['p_name']; ?></div>
                                    <small class="text-muted">รหัส: <?php echo $data['p_id']; ?></small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-muted small">📂 <?php echo $data['p_type']; ?></span>
                        </td>
                        <td>
                            <span class="badge-price">฿<?php echo number_format($data['p_price'], 2); ?></span>
                        </td>
                        <td>
                            <span class="badge-stock <?php echo $low_stock; ?>">
                                <?php echo $data['p_stock']; ?> ชิ้น
                            </span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-link text-warning p-0 me-2">แก้ไข</button>
                            <button class="btn btn-link text-danger p-0">ลบ</button>
                        </td>
                    </tr>
                    <?php 
                            }
                        } else {
                            // การแสดงผลหากไม่มีข้อมูล
                            echo "<tr><td colspan='5' class='text-center py-5'>
                                    <img src='https://cdn-icons-png.flaticon.com/512/7486/7486744.png' width='80' class='mb-3 opacity-25'><br>
                                    <span class='text-muted'>ไม่พบรายการสินค้าในฐานข้อมูล</span>
                                  </td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>