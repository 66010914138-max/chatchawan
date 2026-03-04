<?php
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// ตั้งค่าภาษาไทย
mysqli_set_charset($conn, "utf8mb4");

// รับค่าจาก Form ให้ครบทุกตัว (สำคัญมาก!)
$name   = $_POST['fullname'];
$phone  = $_POST['phone'];
$team   = $_POST['team_name'];
$type   = $_POST['sport_type'];
$detail = $_POST['note'];

// ปรับ SQL ให้ตรงกับชื่อคอลัมน์ในรูปที่คุณส่งมา
$sql = "INSERT INTO db_athlete (fullname, sport_type, note, phone, team_name) 
        VALUES ('$name', '$type', '$detail', '$phone', '$team')";

if (mysqli_query($conn, $sql)) {
    echo "บันทึกข้อมูลสำเร็จแล้ว!"; 
    echo "<br><a href='a.php'>กลับหน้าหลัก</a>";
    
    // ลองปิดบรรทัดนี้ชั่วคราวเพื่อไม่ให้มันเด้งหนีครับ
    // header("location: a.php"); 
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
