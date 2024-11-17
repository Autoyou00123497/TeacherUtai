<?php
session_start(); // เริ่มต้น session เพื่อเก็บข้อมูลผู้ใช้

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบว่า session สำหรับ user login ถูกตั้งค่าแล้วหรือไม่
if (!isset($_SESSION['u_id'])) {
    header("Location: Login.php"); // เปลี่ยนไปที่หน้า Login.php ถ้ายังไม่ได้ login
    exit();
}

$u_id = $_SESSION['u_id'];

// ตรวจสอบว่า $u_id มีค่าหรือไม่
if (!$u_id) {
    die("ไม่พบข้อมูลผู้ใช้ใน session");
}

// ใช้ Prepared Statement เพื่อดึงข้อมูลชื่อ-นามสกุล และ สิทธิ์
$stmt = $conn->prepare("SELECT u_img, u_fname, u_lname, u_status FROM tbl_member WHERE u_id = ?");

$stmt->bind_param("s", $u_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $u_img = !empty($row['u_img']) ? $row['u_img'] : 'default.png'; // ถ้าไม่มีรูปในฐานข้อมูล ใช้ default.png

    $u_fname = $row['u_fname'];
    $u_lname = $row['u_lname'];
    $u_status = $row['u_status'];

} else {
    // กรณีที่ไม่พบข้อมูลในฐานข้อมูล
    $u_img = 'default.png';

    echo "Error: User data not found.";
    exit();
}

// ปิดการทำงานของ Prepared Statement และการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
