<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ลงทะเบียนนักกีฬา</title>
    <style>
        body { font-family: "Tahoma", sans-serif; padding: 40px; background-color: #f9f9f9; }
        .box { width: 350px; margin: auto; padding: 20px; border: 1px solid #ddd; background: #fff; border-radius: 8px; }
        h2 { text-align: center; color: #333; }
        
        /* แก้ไข class ปุ่มจาก "red" เป็น "btn" เพื่อให้สีแสดงผลตาม CSS ที่ตั้งไว้ */
        .btn-info{ 
            background-color: #f34612; 
            color: white; 
            border: none; 
            padding: 10px; 
            width: 100%; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .btn:hover { background-color: #af1b08; }
        
        input[type="text"], textarea { width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="box">
    <h2>ข้อมูลนักกีฬา</h2>
    <form action="save.php" method="POST">
        ชื่อ-นามสกุล:
        <input type="text" name="fullname" required>
        เบอร์โทรศัพท์:
        <input type="text" name="phone" required>

        สังกัด / จังหวัด:
        <input type="text" name="team_name" placeholder="เช่น สโมสร A หรือ กรุงเทพฯ">

        ประเภทกีฬา: <br>
        <input type="radio" name="sport_type" value="เดี่ยว" checked> ประเภทเดี่ยว 
        <input type="radio" name="sport_type" value="ทีม"> ประเภททีม <br><br>

        รายละเอียดเพิ่มเติม:
        <textarea name="note" rows="3"></textarea>

        <button type="button" class="btn btn-info">สมัคร</button>
    </form>
</div>

</body>
</html>






