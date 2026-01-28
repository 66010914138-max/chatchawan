<?php
$host = "localhost";
$user = "root";
$pwd  = "";
$pb   = "4138db";

$conn = mysqli_connect($host, $user, $pwd, $pb)
        or die("เชื่อมต่อฐานข้อมูลไม่ได้");

mysqli_query($conn, "SET NAMES utf8");
?>
