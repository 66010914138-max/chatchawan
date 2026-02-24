<?php
// เชื่อมต่อฐานข้อมูล (เปลี่ยนชื่อตามภาพของคุณ)
$conn = mysqli_connect("localhost", "root", "", "4138db");

// ถ้ามีการกดปุ่ม name="btn_save"
if(isset($_POST['btn_save'])) {
    $name = $_POST['fullname'];
    $type = $_POST['sport_type'];
    $note = $_POST['note'];

    $sql = "INSERT INTO db_athlete (fullname, sport_type, note) VALUES ('$name', '$type', '$note')";
    
    if(mysqli_query($conn, $sql)) {
        echo "<h3 style='color:green;'>บันทึกข้อมูลเรียบร้อยแล้ว!</h3>";
    } else {
        echo "ผิดพลาด: " . mysqli_error($conn);
    }
}
?>

<form method="post" action="a.php">
    ชื่อนักกีฬา: <input type="text" name="fullname" required> <br><br>
    
    ประเภท: 
    <input type="radio" name="sport_type" value="เดี่ยว" checked> เดี่ยว
    <input type="radio" name="sport_type" value="ทีม"> ทีม <br><br>
    
    หมายเหตุ: <br>
    <textarea name="note"></textarea> <br><br>
    
    <button type="submit" name="btn_save">บันทึกข้อมูล</button>
</form>
