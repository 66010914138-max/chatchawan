<?php
// 1. เชื่อมต่อฐานข้อมูล
$conn = mysqli_connect("localhost", "root", "Golf@2004", "4138db");

if (!$conn) {
    die("เชื่อมต่อล้มเหลว: " . mysqli_connect_error());
}

// 2. รับค่าจากฟอร์ม และป้องกันการกรอกอักขระแปลกๆ
$name = mysqli_real_escape_string($conn, $_POST['fullname']);
$type = mysqli_real_escape_string($conn, $_POST['sport_type']);
$detail = mysqli_real_escape_string($conn, $_POST['note']);

// 3. คำสั่ง SQL เพิ่มข้อมูล (ข้อ 7)
$sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$name', '$type', '$detail')";

// 4. บันทึกและแจ้งผลด้วย JavaScript เพื่อความสวยงาม
if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('บันทึกข้อมูลสำเร็จ!');
            window.location.href='a.php';
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
