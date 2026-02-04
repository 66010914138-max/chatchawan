<?php session_start(); ?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>เข้าสู่ระบบ - ชัชวาล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .login-card { width: 100%; max-width: 400px; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); background: white; }
        .btn-login { background-color: #0d6efd; border: none; width: 100%; padding: 10px; border-radius: 8px; color: white; transition: 0.3s; }
        .btn-login:hover { background-color: #0b5ed7; }
    </style>
</head>
<body>

<div class="login-card">
    <h2 class="text-center mb-4">เข้าสู่ระบบหลังบ้าน</h2>
    <p class="text-center text-muted">ชัชวาล สิงห์เทศ (แบงค์)</p>
    
    <form method="post" action="">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="auser" class="form-control" placeholder="กรอกชื่อผู้ใช้" autofocus required>
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="apwd" class="form-control" placeholder="กรอกรหัสผ่าน" required>
        </div>
        <button type="submit" name="Submit" class="btn-login">LOGIN</button>
    </form>

    <?php
    if (isset($_POST['Submit'])) {
        include_once("connectdb.php");
        $user = mysqli_real_escape_string($conn, $_POST['auser']);
        $pwd = mysqli_real_escape_string($conn, $_POST['apwd']);

        $sql = "SELECT * FROM admin WHERE a_username = '$user' AND a_password = '$pwd' LIMIT 1";
        $rs = mysqli_query($conn, $sql);
        
        if ($rs && mysqli_num_rows($rs) == 1) {
            $data = mysqli_fetch_array($rs);
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            echo "<script>alert('เข้าสู่ระบบสำเร็จ'); window.location='index2.php';</script>";
        } else {
            echo "<div class='alert alert-danger mt-3 text-center'>Username หรือ Password ไม่ถูกต้อง</div>";
        }
    }
    ?>
</div>

</body>
</html>