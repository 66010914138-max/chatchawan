<!DOCTYPE html>
<html>
<head>
    <title>ลงทะเบียนนักกีฬา</title>
</head>
<body>
    <h2>ลงทะเบียนนักกีฬา</h2>

    <form action="save.php" method="POST">
        ชื่อ-นามสกุล: <br>
        <input type="text" name="fullname" required> <br><br>

        ประเภทกีฬา: <br>
        <input type="radio" name="sport_type" value="ประเภทเดี่ยว" checked> ประเภทเดี่ยว
        <input type="radio" name="sport_type" value="ประเภททีม"> ประเภททีม <br><br>

        รายละเอียด/หมายเหตุ: <br>
        <textarea name="note" rows="4" cols="30"></textarea> <br><br>

        <button type="submit" style="padding: 5px 15px; cursor: pointer;">บันทึกข้อมูล</button>
    </form>
</body>
</html>
