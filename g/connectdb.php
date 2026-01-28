<?php
		$host = "localhost";
		$user = "root";
		$pwd = "Golf@2004";
		$db = "4138db";
		$conn = mysqli_connect($host, $user, $pwd, $db) or die ("เชื่SASSอมต่อฐานข้อมูลไม่ได้");
		mysqli_query($conn, "SET NAMES utf8");
?>