<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบลงทะเบียนนักกีฬา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; font-family: 'Tahoma', sans-serif; }
        .container { max-width: 500px; margin-top: 50px; }
        .card { padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h4 class="text-center mb-4">ลงทะเบียนนักกีฬา</h4>
        
        <form action="save.php" method="POST">
            
            <div class="mb-3">
                <label class="form-label">ชื่อ-นามสกุล:</label>
                <input type="text" name="fullname" class="form-control" placeholder="ระบุชื่อของคุณ" required>
            </div>

            <div class="mb-3">
                <label class="form-label d-block">ประเภทกีฬา:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sport_type" value="ประเภทเดี่ยว" checked>
                    <label class="form-check-label">ประเภทเดี่ยว</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sport_type" value="ประเภททีม">
                    <label class="form-check-label">ประเภททีม</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">ประวัติหรือข้อมูลเพิ่มเติม:</label>
                <textarea name="note" class="form-control" rows="3" placeholder="กรอกข้อมูล..."></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">สมัครสมาชิกนักกีฬา</button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
