<?php
$servername = "localhost";
$username = "root"; // ปกติจะเป็น root
$password = "Golf@2004";     // ปกติจะว่างไว้ถ้าใช้ XAMPP
$dbname = "4138db"; // ชื่อฐานข้อมูลที่คุณสร้างไว้

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>