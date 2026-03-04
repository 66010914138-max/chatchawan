<?php
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

$name = $_POST['fullname'];
$type = $_POST['sport_type'];
$detail = $_POST['note'];

// ข้อ 7: บันทึกข้อมูลลงตาราง
$sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$name', '$type', '$detail')";

if (mysqli_query($conn, $sql)) {
    // บันทึกเสร็จแล้วให้กลับไปหน้า a.php ทันที
    header("location: a.php");
} else {
    echo "เกิดข้อผิดพลาด: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
