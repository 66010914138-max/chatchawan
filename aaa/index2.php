<?php
    session_start();
    
    // ตรวจสอบว่าถ้าไม่มีค่า Session 'aid' (ไม่ได้ Login มา) ให้ดีดกลับไปหน้า index.php
    if(empty($_SESSION['aid'])){
        echo "Access Denied! กำลังกลับไปหน้าเข้าสู่ระบบ...";
        // แก้ไข http-equiv และปิดเครื่องหมายคำพูดให้ถูกต้องเพื่อให้ Meta Refresh ทำงาน
        echo "<meta http-equiv='refresh' content='3;url=index.php'>"; 
        exit;
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>หน้าหลักแอดมิน - ชัชวาล</title>
<style>
    /* ปรับแต่ง List ให้น่ากดมากขึ้น */
    ul { list-style: none; padding: 0; }
    li { background: #f0f0f0; margin: 5px; padding: 10px; width: 200px; border-radius: 4px; }
    a { text-decoration: none; color: #333; }
    li:hover { background: #e0e0e0; }
</style>
</head>

<body>
<h1>หน้าหลักแอดมิน - ชัชวาล</h1>
<p><strong>ยินดีต้อนรับแอดมิน:</strong> <?php echo $_SESSION['aname']; ?></p>
<hr>
<ul>
    <a href="products.php"><li>📦 จัดการสินค้า</li></a>
    <a href="orders.php"><li>📝 จัดการคำสั่งซื้อ</li></a>
    <a href="costomers.php"><li>👥 จัดการลูกค้า</li></a>
    <a href="logout.php"><li style="color:red;">🚪 ออกจากระบบ</li></a>
</ul>
</body>
</html>