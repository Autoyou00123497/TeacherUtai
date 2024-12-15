<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost"; // ชื่อเซิร์ฟเวอร์
$username = "root";        // ชื่อผู้ใช้
$password = "";            // รหัสผ่าน
$dbname = "restaurant"; // ชื่อฐานข้อมูล

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$c_id = $_POST['c_id'];
$c_name = $_POST['c_name'];

// เตรียมคำสั่ง SQL สำหรับเพิ่มข้อมูล
$sql = "INSERT INTO tbl_category (c_id, c_name) VALUES (?, ?)";

// ใช้ prepared statement เพื่อป้องกัน SQL Injection
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $c_id, $c_name); // "ss" หมายถึงข้อมูล 2 ค่าเป็น string ทั้งคู่

// ตรวจสอบว่าเพิ่มข้อมูลสำเร็จหรือไม่
if ($stmt->execute()) {
    echo "เพิ่มข้อมูลเรียบร้อยแล้ว!";
    header("Location: index.php"); // เปลี่ยนเป็นชื่อไฟล์ล็อกอินของคุณ

} else {
    echo "เกิดข้อผิดพลาด: " . $stmt->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
