<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ(แบงค์)</title>
</head>

<body>
<h1>ชัชวาล สิงห์เทศ(แบงค์) - โปรแกรมสูตรคุณ</h1>

<form method="post" action="">
    ป้อนรหัสนักศึกษา: <input type="number" name="a" autofocus required>
    <button type="submit" name="Submit">ค้นหารูปภาพ</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])){
    $id = $_POST['a'];
    
    $y = substr($id, 0, 2);
    
   
    echo "<img src='http://202.28.32.211/picture/student/{$y}/{$id}.jpg' width='600' alt='รูปภาพนักศึกษา'>";
}
?>



</body>
</html>
