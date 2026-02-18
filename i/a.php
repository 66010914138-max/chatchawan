<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>จัดการภาค -- ชัชวาล สิงห์เทศ</title>
</head>
<body>
    <h1>จัดการภาค (a.php)</h1>

    <form method="post" action="">
        ชื่อภาค: <input type="text" name="rname" autofocus required>
        <button type="submit" name="Submit">บันทึก</button>
    </form>
    <br>

    <?php
    include_once("connectdb.php");
    if(isset($_POST['Submit'])){
        $rname = mysqli_real_escape_string($conn, $_POST['rname']); 
        $sql = "INSERT INTO `regions` (`r_id`, `r_name`) VALUES (NULL, '$rname')";
        if(mysqli_query($conn, $sql)){
            echo "<script>alert('บันทึกภาคสำเร็จ'); window.location='a.php';</script>";
        }
    }
    ?>

    <table border="1" width="500">
        <tr bgcolor="#eeeeee">
            <th>รหัสภาค</th>
            <th>ชื่อภาค</th>
            <th>ลบ</th> 
        </tr>
        <?php
        $sql = "SELECT * FROM `regions` ORDER BY r_id DESC";
        $rs = mysqli_query($conn, $sql); 
        while ($data = mysqli_fetch_array($rs)) {
        ?>
            <tr>
                <td align="center"><?php echo $data['r_id']; ?></td>
                <td><?php echo $data['r_name']; ?></td>
                <td align="center">
                    <a href="delete.php?id=<?php echo $data['r_id']; ?>" onclick="return confirm('ลบภาคนี้ข้อมูลจังหวัดจะหายไปด้วย?');">
                        <img src="img/delete.jpg" width="30" alt="ลบ">
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="b.php">ไปหน้าจัดการจังหวัด -></a>
</body>
</html>
