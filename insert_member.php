<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$u_id = $_POST['u_id'];
$u_fname = $_POST['u_fname'];
$u_lname = $_POST['u_lname'];
$u_sex = $_POST['u_sex'];
$u_phone = $_POST['u_phone'];
$u_address = $_POST['u_address'];
$u_status = $_POST['u_status'];
$u_password = $_POST['u_password']; // ไม่เข้ารหัสรหัสผ่าน
$u_img = "";

// จัดการกับการอัปโหลดไฟล์รูปภาพ
if (isset($_FILES['u_img']) && $_FILES['u_img']['error'] == 0) {
    $target_dir = "";
    $target_file = $target_dir . basename($_FILES['u_img']['name']);
    if (move_uploaded_file($_FILES['u_img']['tmp_name'], $target_file)) {
        $u_img = $target_file; // เก็บ path ไฟล์รูปภาพ
    } else {
        echo "เกิดข้อผิดพลาดในการอัปโหลดรูปภาพ";
        exit;
    }
}

// เตรียมคำสั่ง SQL
$sql = "INSERT INTO tbl_member (u_id, u_fname, u_lname, u_sex, u_phone, u_address, u_status, u_password, u_img) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssss", $u_id, $u_fname, $u_lname, $u_sex, $u_phone, $u_address, $u_status, $u_password, $u_img);

// ตรวจสอบว่าการเพิ่มข้อมูลสำเร็จหรือไม่
if ($stmt->execute()) {
    echo "เพิ่มข้อมูลสมาชิกสำเร็จ!";
    header("Location: index.php"); // เปลี่ยนเป็นชื่อไฟล์ล็อกอินของคุณ

} else {
    echo "เกิดข้อผิดพลาด: " . $stmt->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
