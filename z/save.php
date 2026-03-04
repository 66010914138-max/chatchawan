<?php
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// ตั้งค่าภาษาไทยให้ดึงข้อมูลมาไม่เป็นตัวต่างดาว
mysqli_set_charset($conn, "utf8mb4");

// รับค่าจากฟอร์ม
$name   = $_POST['fullname'];
$phone  = $_POST['phone'];
$team   = $_POST['team_name'];
$type   = $_POST['sport_type'];
$detail = $_POST['note'];

// คำสั่ง SQL สำหรับบันทึกข้อมูล
$sql = "INSERT INTO db_athlete (fullname, phone, team_name, sport_type, note) 
        VALUES ('$name', '$phone', '$team', '$type', '$detail')";

if (mysqli_query($conn, $sql)) {
    // แก้ไขตรงนี้: เปลี่ยนจาก a.php เป็น b.php
    header("location: b.php"); 
    exit(); // ใส่ exit ไว้เพื่อให้หยุดการทำงานของสคริปต์ทันทีหลัง redirect
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
