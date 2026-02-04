<?php
    session_start();
    if(empty($_SESSION['aid'])){
        echo "<div style='text-align:center; padding:50px; font-family:sans-serif;'>";
        echo "<h4>Access Denied!</h4><p>กำลังกลับไปหน้าเข้าสู่ระบบ...</p></div>";
        echo "<meta http-equiv='refresh' content='2;url=index.php'>"; 
        exit;
    }
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - ชัชวาล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; }
        .navbar { background-color: #ffffff; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .menu-card { transition: transform 0.2s; border: none; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .menu-card:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(0,0,0,0.1); }
        .menu-link { text-decoration: none; color: inherit; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg mb-4">
    <div class="container">
        <span class="navbar-brand fw-bold text-primary">Admin Panel</span>
        <div class="ms-auto">
            <span class="me-3 text-muted">ผู้ใช้งาน: <strong><?php echo $_SESSION['aname']; ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">ออกจากระบบ</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">ยินดีต้อนรับ, คุณชัชวาล</h2>
    
    <div class="row g-4">
        <div class="col-md-4">
            <a href="products.php" class="menu-link">
                <div class="card menu-card p-4 text-center">
                    <div class="display-5 mb-2">📦</div>
                    <h5>จัดการสินค้า</h5>
                    <small class="text-muted">เพิ่ม ลบ แก้ไข รายการสินค้า</small>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="orders.php" class="menu-link">
                <div class="card menu-card p-4 text-center">
                    <div class="display-5 mb-2">📝</div>
                    <h5>จัดการคำสั่งซื้อ</h5>
                    <small class="text-muted">ตรวจสอบรายการที่ลูกค้าสั่ง</small>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="costomers.php" class="menu-link">
                <div class="card menu-card p-4 text-center">
                    <div class="display-5 mb-2">👥</div>
                    <h5>จัดการลูกค้า</h5>
                    <small class="text-muted">ดูข้อมูลสมาชิกและผู้ใช้งาน</small>
                </div>
            </a>
        </div>
    </div>
</div>

</body>
</html>