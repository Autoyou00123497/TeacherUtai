<?php
require_once 'conn.php'; // รวมไฟล์ conn.php
// ตรวจสอบว่า session เริ่มต้นแล้วหรือยัง

// ตรวจสอบว่าผู้ใช้ได้ล็อกอินหรือไม่
if (!isset($_SESSION['u_id'])) {
    header("Location: Login.php"); // เปลี่ยนเป็นชื่อไฟล์ล็อกอินของคุณ
    exit();
}

$u_id = $_SESSION['u_id'];

// ดึงข้อมูลชื่อ-นามสกุล และ สิทธิ์
$stmt = $con->prepare("SELECT u_fname, u_lname, u_status FROM tbl_member WHERE u_id = ?");
$stmt->bind_param("s", $u_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $u_fname = $row['u_fname'];
  $u_lname = $row['u_lname'];
  $u_status = $row['u_status'];
} else {
  // Handle กรณีที่ไม่พบข้อมูลในฐานข้อมูล  เช่น redirect ไปยังหน้า error หรือ logout
  echo "Error: User data not found.";
  exit();
}

$stmt->close();
$con->close();
?>