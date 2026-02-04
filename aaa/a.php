<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ (แบงค์)</title>
<style>
    /* เพิ่ม CSS เล็กน้อยเพื่อให้ดูเป็นระเบียบ */
    form { line-height: 2.5; }
    input { margin-bottom: 5px; }
</style>
</head>

<body>
<h1>เข้าสู่ระบบหลังบ้าน - ชัชวาล </h1>

<form method="post" action="">
    Username: <input type="text" name="auser" autofocus required><br>
    Password: <input type="password" name="apwd" required><br>
    <button type="submit" name="Submit">LOGIN</button>
</form>

<?php
if (isset($_POST['Submit'])) {
    include_once("connectdb.php");
    
    // รับค่าจาก Form
    $user = $_POST['auser'];
    $pwd = $_POST['apwd']; // แนะนำว่าควรใช้รหัสผ่านแบบ Hash ในอนาคต

    // เตรียมคำสั่ง SQL
    $sql = "SELECT * FROM admin WHERE a_username = '$user' AND a_password = '$pwd' LIMIT 1";
    
    // รันคำสั่ง (ตรวจสอบตัวแปร $conn ในไฟล์ connectdb.php ด้วยว่าใช้ชื่อนี้หรือไม่)
    $rs = mysqli_query($conn, $sql);
    
    if ($rs) {
        $num = mysqli_num_rows($rs);
        if ($num == 1) {
            $data = mysqli_fetch_array($rs);
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            
            echo "<script>
                alert('เข้าสู่ระบบสำเร็จ');
                window.location='index2.php';
            </script>";
        } else {
            echo "<script>
                alert('Username หรือ Password ไม่ถูกต้อง');
            </script>";
        }
    } else {
        // กรณี Query พัง หรือเชื่อมฐานข้อมูลไม่ได้
        echo "Error: " . mysqli_error($conn);
    }
}
?>
</body>
</html>