<?php
	session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ชัชวาล สิงห์เทศ(แบงค์)</title>
</head>

<body>
<h1>ชัชวาล สิงห์เทศ(แบงค์)</h1>
<?php
	$_SESSION['name']."<br>";
    $_SESSION['nickname']."<br>";
    $_SESSION['p1']."<br>";
    $_SESSION['p2']."<br>";
?>
</body>
</html>
