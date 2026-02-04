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
    <title>จัดการลูกค้า - ชัชวาล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index2.php">กลับหน้าหลัก (Admin Panel)</a>
    </div>
</nav>

<div class="container">
    <h2 class="mb-4">👥 รายชื่อลูกค้าสมาชิก</h2>

    <div class="row">
        <?php
            $sql = "SELECT * FROM members ORDER BY m_id ASC";
            $rs = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($rs) > 0) {
                while($member = mysqli_fetch_array($rs)) {
        ?>
        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                        <?php echo substr($member['m_name'], 0, 1); ?>
                    </div>
                    <div>
                        <h6 class="mb-0"><?php echo $member['m_name']; ?></h6>
                        <small class="text-muted"><?php echo $member['m_email']; ?></small>
                    </div>
                </div>
            </div>
        </div>
        <?php 
                }
            } else {
                echo "<div class='col-12 text-center text-muted'>ไม่พบข้อมูลลูกค้า</div>";
            }
        ?>
    </div>
</div>

</body>
</html>