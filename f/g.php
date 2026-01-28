<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ(แบงค์)</title>
</head>

<body>
<h1>ชัชวาล สิงห์เทศ(แบงค์) - โปรแกรมสูตรคุณ</h1>

<form method="post" action="">
    	แม่สูตร <input type="number" min="2" max="1000" name="a" autofocus required>
    <button type="submit" name="Submit">OK</button>
</form>
<hr>

<?php
if(isset($_POST['Submit'])){
	$m = $_POST['a'];
for ($i = 1; $i <= 12; $i++) {
	$o = $m * $i ;
    echo "{$m}x{$i}={$o}<br>" ;
}
}
?>




</body>
</html>
