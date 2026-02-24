<?php
// 1. ส่วนเชื่อมต่อฐานข้อมูล (รวมจาก connect.php มาไว้ที่นี่)
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

// 2. รับค่าจากหน้าฟอร์ม a.php
$name = $_POST['fullname'];
$type = $_POST['sport_type'];
$detail = $_POST['note'];

// 3. คำสั่ง SQL เพิ่มข้อมูลลงตาราง db_athlete
$sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$name', '$type', '$detail')";

// 4. สั่งให้บันทึกและแจ้งผล
if (mysqli_query($conn, $sql)) {
    echo "<h3>บันทึกข้อมูลลงฐานข้อมูลสำเร็จ!</h3>";
    echo "<a href='a.php'>กลับไปหน้าลงทะเบียน</a>";
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

// ปิดการเชื่อมต่อ
mysqli_close($conn);
?>

