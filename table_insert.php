<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$t_id = $_POST['t_id'];
$t_name = $_POST['t_name'];

// เตรียมคำสั่ง SQL
$sql = "INSERT INTO tbl_table (t_id, t_name) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $t_id, $t_name);

// ตรวจสอบว่าการเพิ่มข้อมูลสำเร็จหรือไม่
if ($stmt->execute()) {
    // เพิ่มข้อมูลสำเร็จ
    echo "เพิ่มข้อมูลสำเร็จ!";
    header("Location: index.php"); // ใช้รูปแบบที่ถูกต้อง
    exit(); // หยุดการประมวลผลเพิ่มเติมหลังเปลี่ยนเส้นทาง
} else {
    // เกิดข้อผิดพลาด
    echo "เกิดข้อผิดพลาด: " . $stmt->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
