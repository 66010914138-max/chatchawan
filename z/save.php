<?php
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// ตั้งค่าภาษาไทย
mysqli_set_charset($conn, "utf8mb4");

// รับค่าจากฟอร์ม
$name   = $_POST['fullname'];
$phone  = $_POST['phone'];
$team   = $_POST['team_name'];
$type   = $_POST['sport_type'];
$detail = $_POST['note'];

// คำสั่ง SQL
$sql = "INSERT INTO db_athlete (fullname, phone, team_name, sport_type, note) 
        VALUES ('$name', '$phone', '$team', '$type', '$detail')";

if (mysqli_query($conn, $sql)) {
    // ใช้ JavaScript เพื่อโชว์ Popup ก่อนเด้งกลับ
    echo "<script>
            alert('บันทึกข้อมูลสำเร็จแล้ว!');
            window.location.href='a.php'; 
          </script>";
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
