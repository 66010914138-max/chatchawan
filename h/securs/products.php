<?php
    session_start();
    include_once("connectdb.php");
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
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="index2.php">กลับหน้าหลัก</a>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📦 จัดการรายการสินค้า</h2>
        <button class="btn btn-success">+ เพิ่มสินค้าใหม่</button>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>รูปภาพ</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>สต็อก</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM products ORDER BY p_id DESC";
                        $rs = mysqli_query($conn, $sql);
                        // ถ้ายังไม่มีข้อมูลใน DB จะแสดงตัวอย่าง (Dummy Data)
                        if (mysqli_num_rows($rs) > 0) {
                            while($data = mysqli_fetch_array($rs)) {
                    ?>
                    <tr>
                        <td><img src="img/<?php echo $data['p_img']; ?>" width="50"></td>
                        <td><?php echo $data['p_name']; ?></td>
                        <td><?php echo number_format($data['p_price'], 2); ?> บาท</td>
                        <td><?php echo $data['p_stock']; ?> ชิ้น</td>
                        <td>
                            <button class="btn btn-warning btn-sm">แก้ไข</button>
                            <button class="btn btn-danger btn-sm">ลบ</button>
                        </td>
                    </tr>
                    <?php 
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-muted'>ยังไม่มีข้อมูลสินค้าในระบบ</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>