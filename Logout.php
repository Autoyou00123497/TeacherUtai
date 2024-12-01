<?php
session_start();
session_destroy(); // ล้าง session
header("Location: index_noauthen.php"); // เปลี่ยนเป็นชื่อไฟล์ล็อกอินของคุณ
exit();
?>  