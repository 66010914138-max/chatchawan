<?php
// เปิดการแสดง Error ทั้งหมด (เผื่อเอาไว้ดูว่าผิดบรรทัดไหน)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. เชื่อมต่อฐานข้อมูล (อิงตามรูป phpMyAdmin ของคุณ)
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . mysqli_connect_error());
}

// 2. รับค่าจากฟอร์ม (ต้องมั่นใจว่าชื่อในฟอร์มตรงกัน)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['athlete_name'];
    $sport_type = $_POST['sport_type'];
    $note = $_POST['description'];

    // 3. คำสั่ง SQL (ชื่อตารางของคุณคือ db_athlete)
    $sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$fullname', '$sport_type', '$note')";

    if (mysqli_query($conn, $sql)) {
        echo "<h1>บันทึกข้อมูลสำเร็จ!</h1>";
        echo "<p>ข้อมูลนักกีฬา $fullname ถูกบันทึกลงฐานข้อมูลเรียบร้อย</p>";
        echo "<a href='register.php'>กลับหน้าลงทะเบียน</a>";
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึก: " . mysqli_error($conn);
    }
} else {
    echo "กรุณาส่งข้อมูลผ่านฟอร์มเท่านั้น";
}

mysqli_close($conn);
?>
