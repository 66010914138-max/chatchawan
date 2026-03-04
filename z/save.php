<?php
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// รับค่าจากฟอร์ม (แนะนำให้กรองข้อมูลเพื่อป้องกัน SQL Injection)
$name   = mysqli_real_escape_string($conn, $_POST['fullname']);
$phone  = mysqli_real_escape_string($conn, $_POST['phone']);
$team   = mysqli_real_escape_string($conn, $_POST['team_name']);
$type   = mysqli_real_escape_string($conn, $_POST['sport_type']);
$detail = mysqli_real_escape_string($conn, $_POST['note']);

// บันทึกข้อมูลลงตาราง (เพิ่มคอลัมน์ phone และ team_name ให้ตรงกับ Database ของคุณ)
$sql = "INSERT INTO db_athlete (fullname, phone, team_name, sport_type, note) 
        VALUES ('$name', '$phone', '$team', '$type', '$detail')";

if (mysqli_query($conn, $sql)) {
    // บันทึกเสร็จแล้วให้กลับไปหน้า a.php
    echo "<script>alert('ลงทะเบียนสำเร็จ'); window.location='a.php';</script>";
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
