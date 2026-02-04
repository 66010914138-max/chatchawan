<?php
	session_start(); 
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>ชัชวาล สิงห์เทศ (แบงค์)</title>
</head>
<body>
    <h1>หน้าเข้าสู่ระบบ</h1>
    <form method="post" action="">
        Username <input type="text" name="auser" autofocus required> <br>
        Password <input type="password" name="apwd" required><br>
        <button type="submit" name="Submit">LOGIN</button>
    </form>

<?php
if(isset($_POST['Submit'])){
    include_once("connectdb.php");
    
    
    $sql = "SELECT * FROM admin WHERE a_username='{$_POST['auser']}' AND a_password='{$_POST['apwd']}' LIMIT 1";
    
    $rs = mysqli_query($conn, $sql);
    
    if($rs){
        $num = mysqli_num_rows($rs); 
        if($num == 1){
            $data = mysqli_fetch_array($rs);
            $_SESSION['aid'] = $data['a_id'];
            $_SESSION['aname'] = $data['a_name'];
            echo "<script>window.location='index2.php';</script>";
        } else {
            echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
        }
    }
}
?>
</body>
</html>