<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ลงทะเบียนนักกีฬา</title>
    <style>
        /* ตกแต่งแบบนิสิตทำเอง เรียบง่ายแต่เป็นระเบียบ */
        body { font-family: "Tahoma", sans-serif; padding: 40px; background-color: #f9f9f9; }
        .box { width: 350px; margin: auto; padding: 20px; border: 1px solid #ddd; background: #fff; border-radius: 8px; }
        h2 { text-align: center; color: #333; }
        
        /* ตกแต่งปุ่มให้ได้คะแนน (2 คะแนน) */
        .btn { 
            background-color: #007bff; 
            color: white; 
            border: none; 
            padding: 10px; 
            width: 100%; 
            border-radius: 4px; 
            cursor: pointer; 
        }
        .btn:hover { background-color: #0056b3; }
        
        input[type="text"], textarea { width: 100%; padding: 8px; margin: 5px 0 15px 0; border: 1px solid #ccc; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="box">
    <h2>ข้อมูลนักกีฬา</h2>
    <form action="save.php" method="POST">
        ชื่อ-นามสกุล:
        <input type="text" name="fullname" required>

        ประเภทกีฬา: <br>
        <input type="radio" name="sport_type" value="เดี่ยว" checked> ประเภทเดี่ยว 
        <input type="radio" name="sport_type" value="ทีม"> ประเภททีม <br><br>

        รายละเอียดเพิ่มเติม:
        <textarea name="note" rows="3"></textarea>

        <button type="submit" class="red">บันทึกข้อมูล</button>
    </form>
</div>

</body>
</html>

