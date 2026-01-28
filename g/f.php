<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ (แบงค์)</title>

</head>

<body>
<h1>รายงานยอดขายรายเดือน</h1>

<table border="1">
    <tr>
        <th>เดือนที่</th>
        <th>ยอดขาย (บาท)</th>
    </tr>
    <?php
    include_once("connectdb.php");
 
 
    $sql = "SELECT 
                MONTH(p_date) AS Month_Num, 
                SUM(p_amount) AS Total_Sales
            FROM popsupermarket
            GROUP BY MONTH(p_date)
            ORDER BY Month_Num";
    
    $rs = mysqli_query($conn, $sql);
    
    
    if ($rs) {
        while ($data = mysqli_fetch_array($rs)) {
        ?>
        <tr>
            <td>เดือนที่ <?php echo $data['Month_Num']; ?></td>
            <td align="right"><?php echo number_format($data['Total_Sales'], 2); ?></td>
        </tr>
        <?php
        }
    } else {
        echo "<tr><td colspan='2'>ไม่พบข้อมูลหรือเกิดข้อผิดพลาดในการเชื่อมต่อ</td></tr>";
    }
    mysqli_close($conn);
    ?>
</table>
</body>
</html>