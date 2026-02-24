<?php
// 1. เชื่อมต่อฐานข้อมูล (ใช้ข้อมูลจากภาพที่คุณส่งมา)
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

// เช็คการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. รับค่าจากฟอร์ม
$fullname = $_POST['athlete_name'];
$sport_type = $_POST['sport_type'];
$note = $_POST['description'];

// 3. คำสั่ง SQL สำหรับเพิ่มข้อมูล
$sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$fullname', '$sport_type', '$note')";

if (mysqli_query($conn, $sql)) {
    echo "บันทึกข้อมูลนักกีฬาเรียบร้อยแล้ว!";
    echo "<br><a href='register.php'>กลับหน้าหลัก</a>";
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
