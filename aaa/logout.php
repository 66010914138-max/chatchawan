<?php
    session_start(); // เริ่มต้น session เพื่อให้ระบบรู้จักว่าใครจะออก

    // 1. ล้างค่าตัวแปร Session ทั้งหมด
    session_unset(); 

    // 2. ทำลาย Session ในระบบทิ้ง
    session_destroy(); 

    // 3. แจ้งเตือนผู้ใช้และส่งกลับไปหน้า Login (index.php)
    echo "<script>
        alert('ออกจากระบบเรียบร้อยแล้ว');
        window.location='index.php';
    </script>";
?>