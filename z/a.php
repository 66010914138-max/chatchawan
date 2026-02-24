<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบลงทะเบียนนักกีฬา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h3 class="card-title text-center mb-4">ลงทะเบียนนักกีฬา</h3>
            
            <form action="save.php" method="POST">
                <div class="mb-3">
                    <label class="form-label">ชื่อ-นามสกุล:</label>
                    <input type="text" name="athlete_name" class="form-control" placeholder="ระบุชื่อนักกีฬา" required>
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">ประเภทกีฬา:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sport_type" value="Individual" checked>
                        <label class="form-check-label">ประเภทเดี่ยว</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sport_type" value="Team">
                        <label class="form-check-label">ประเภททีม</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">ประวัติหรือข้อมูลเพิ่มเติม:</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="ระบุรายละเอียด..."></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">สมัครสมาชิกนักกีฬา</button>
                </div>
            </form>
            
        </div>
    </div>
</div>

</body>
</html>