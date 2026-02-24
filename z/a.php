<?php
// 1. ส่วนเชื่อมต่อฐานข้อมูล (เขียนแบบง่ายๆ บรรทัดเดียว)
$conn = mysqli_connect("localhost", "root", "", "4138db");

// 2. ส่วนเช็คการกดปุ่มส่งข้อมูล
if(isset($_POST['save_data'])) {
    $name = $_POST['fullname'];
    $type = $_POST['sport_type'];
    $detail = $_POST['note'];

    // คำสั่งเพิ่มข้อมูล
    $sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$name', '$type', '$detail')";
    
    if(mysqli_query($conn, $sql)) {
        echo "<script>alert('บันทึกสำเร็จ');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>ลงทะเบียนนักกีฬา</title>
</head>
<body>

    <h2>เพิ่มข้อมูลนักกีฬา</h2>
    
    <form method="post" action="">
        ชื่อ-นามสกุล: <br>
        <input type="text" name="fullname" required> <br><br>

        ประเภทกีฬา: <br>
        <input type="radio" name="sport_type" value="ประเภทเดี่ยว" checked> ประเภทเดี่ยว
        <input type="radio" name="sport_type" value="ประเภททีม"> ประเภททีม <br><br>

        รายละเอียด/หมายเหตุ: <br>
        <textarea name="note" rows="4" cols="30"></textarea> <br><br>

        <button type="submit" name="save_data">กดบันทึกข้อมูล</button>
    </form>

</body>
</html>
