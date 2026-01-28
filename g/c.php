<?php
// 1. เชื่อมต่อฐานข้อมูล (ตรวจสอบชื่อไฟล์ให้ถูกต้อง)
include_once("connectdb.php");

// ตรวจสอบว่าตัวแปร $conn ใช้งานได้ไหม
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `popsupermarket` ";
$rs = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการข้อมูลสินค้า - ชัชวาล</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <style>
        body { background-color: #f4f7f6; font-family: 'Sarabun', sans-serif; }
        .main-container { margin-top: 40px; margin-bottom: 40px; }
        .table-card { background: white; border-radius: 10px; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); }
        .header-section { background: #0d6efd; color: white; padding: 20px; border-radius: 10px 10px 0 0; }
    </style>
</head>
<body>

<div class="container main-container">
    <div class="table-card">
        <div class="header-section">
            <h2 class="mb-0">ชัชวาล สิงห์เทศ (แบงค์)</h2>
            <small>ระบบแสดงรายการสินค้า Pop Supermarket</small>
        </div>
        
        <div class="p-4">
            <table id="example" class="table table-hover w-100">
                <thead class="table-light">
                    <tr>
                        <th>Order ID</th>
                        <th>ชื่อสินค้า</th>
                        <th>ประเภท</th>
                        <th>วันที่</th>
                        <th>ประเทศ</th>
                        <th class="text-end">จำนวนเงิน</th>
                        <th class="text-center">รูปภาพ</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                if ($rs && mysqli_num_rows($rs) > 0) {
                    while ($data = mysqli_fetch_array($rs)) {
                ?>
                    <tr>
                        <td><?php echo $data['p_order_id'];?></td>
                        <td><strong><?php echo $data['p_product_name'];?></strong></td>
                        <td><span class="badge bg-secondary"><?php echo $data['p_category'];?></span></td>
                        <td><?php echo date('d/m/Y', strtotime($data['p_date']));?></td>
                        <td><?php echo $data['p_country'];?></td>
                        <td class="text-end text-primary fw-bold"><?php echo number_format($data['p_amount'], 2);?></td>
                        <td class="text-center">
                            <?php 
                                $img_path = "images/" . $data['p_product_name'] . ".jfif";
                                // ตรวจสอบว่ามีไฟล์รูปจริงไหม ถ้าไม่มีใช้รูป default
                                if (!file_exists($img_path)) {
                                    $img_path = "https://via.placeholder.com/50x50.png?text=No+Image";
                                }
                            ?>
                            <img src="<?php echo $img_path; ?>" width="50" class="img-thumbnail">
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>ไม่พบข้อมูลในฐานข้อมูล</td></tr>";
                }
                mysqli_close($conn);
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/th.json"
            },
            "responsive": true
        });
    });
</script>

</body>
</html>