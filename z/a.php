<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ลงทะเบียนนักกีฬา</title>
    <style>
        /* ตกแต่งแบบง่ายๆ ให้ดูเป็นระเบียบ */
        body { font-family: sans-serif; line-height: 1.6; padding: 20px; color: #333; }
        .form-box { width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h2 { text-align: center; }
        
        /* ตกแต่งปุ่มสมัครสมาชิกให้มีสีสันตามโจทย์ (2 คะแนน) */
        .btn-submit { 
            background-color: #0056b3; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            border-radius: 4px; 
            cursor: pointer;
            width: 100%;
        }
        .btn-submit:hover { background-color: #004494; }
        
        input[type="text"], textarea { width: 100%; padding: 8px; margin-top: 5px; border: 1px solid #ddd; box-sizing: border-box; }
    </style>
</head>
<body>

<div class="form-box">
    <h2>ลงทะเบียนนักกีฬา</h2>

    <form action="save.php" method="POST">
        <p>
            ชื่อ-นามสกุล: <br>
            <input type="text" name="fullname" required>
        </p>

        <p>
            ประเภทกีฬา: <br>
            <input type="radio" name="sport_type" value="ประเภทเดี่ยว" checked> ประเภทเดี่ยว
            <input type="radio" name="sport_type" value="ประเภททีม"> ประเภททีม
        </p>

        <p>
            ประวัติ/หมายเหตุ: <br>
            <textarea name="note" rows="4"></textarea>
        </p>

        <button type="submit" class="btn-submit">สมัครสมาชิกนักกีฬา</button>
    </form>
</div>

</body>
</html>
