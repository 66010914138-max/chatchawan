<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>จัดการจังหวัด -- ชัชวาล สิงห์เทศ 66010914138</title>
</head>
<body>
<h1>งาน i -- จัดการจังหวัด (b.php)</h1>

<form method="post" action="" enctype="multipart/form-data">
    ชื่อจังหวัด: <input type="text" name="pname" autofocus required><br>
    รูปภาพ: <input type="file" name="pimage" required><br>
    ภาค: 
    <select name="rid" required>
        <option value="">-- เลือกภาค --</option>
        <?php 
        include_once("connectdb.php");
        // เชื่อมโยงข้อมูลภาคจากหน้า a.php
        $sql_reg = "SELECT * FROM `regions` ORDER BY r_name ASC";
        $rs_reg = mysqli_query($conn, $sql_reg);
        while ($data_reg = mysqli_fetch_array($rs_reg)){
            echo "<option value='".$data_reg['r_id']."'>".$data_reg['r_name']."</option>";
        }
        ?>
    </select>
    <br><br>
    <button type="submit" name="Submit">บันทึก</button>
</form> 
<br><hr>

<?php
if(isset($_POST['Submit'])){
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $rid = $_POST['rid'];
    $ext = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
    
    $sql_ins = "INSERT INTO `provinces` (`p_id`, `p_name`, `p_ext`, `r_id`) VALUES (NULL, '$pname', '$ext', '$rid')";
    
    if(mysqli_query($conn, $sql_ins)){
        $last_id = mysqli_insert_id($conn);
        if(!file_exists("img")) { mkdir("img"); }
        move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$last_id.".".$ext);
        
        echo "<script>alert('บันทึกสำเร็จ'); window.location='b.php';</script>";
    }
}
?>

<h3>รายการจังหวัด</h3>
<table border="1" width="700">
    <tr bgcolor="#cccccc">
        <th>รหัสจังหวัด</th>
        <th>ชื่อจังหวัด</th>
        <th>ชื่อภาค</th> <th>รูปจังหวัด</th>
        <th>ลบ</th>
    </tr>

<?php
// เชื่อมตาราง provinces กับ regions เพื่อเอาชื่อภาค (r_name) มาแสดง
$sql_show = "SELECT provinces.*, regions.r_name 
             FROM `provinces` 
             LEFT JOIN `regions` ON provinces.r_id = regions.r_id 
             ORDER BY provinces.p_id DESC";
             
$rs_show = mysqli_query($conn, $sql_show);
while ($data = mysqli_fetch_array($rs_show)){
?>
    <tr>
        <td align="center"><?php echo $data['p_id']; ?></td>
        <td><?php echo $data['p_name']; ?></td>
        <td align="center"><?php echo $data['r_name']; ?></td> <td align="center">
            <img src="img/<?php echo $data['p_id'].".".$data['p_ext']; ?>" width="100" height="100" style="object-fit:cover" onerror="this.src='img/no-image.png'">
        </td>
        <td align="center">
            <a href="remove_province.php?id=<?php echo $data['p_id']; ?>" onclick="return confirm('ยืนยันการลบจังหวัดนี้?');">
                <img src="img/delete.jpg" width="40" alt="ลบ">
            </a>
        </td>
    </tr>
<?php } ?>
</table>
<br>
<a href="a.php"><- กลับไปหน้าจัดการภาค</a>
</body>
</html>
<?php mysqli_close($conn); ?>
