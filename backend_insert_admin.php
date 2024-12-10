<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "restaurant"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงหมายเลขสูงสุดจาก p_id และคำนวณหมายเลขถัดไป
$sql = "SELECT p_id FROM tbl_product ORDER BY CAST(SUBSTRING(p_id, 2) AS UNSIGNED) DESC LIMIT 1"; 
$result = $conn->query($sql);

$next_id = "P0001"; // ค่าเริ่มต้นหากยังไม่มีข้อมูล
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // เอาตัวเลขจาก p_id และเพิ่ม 1
    $last_id_number = (int)substr($row['p_id'], 1); // เอาตัวเลขหลัง "P"
    $next_id = "0" . str_pad($last_id_number + 1, 0, "0", STR_PAD_LEFT); // สร้างหมายเลขถัดไป
}

// ดึงข้อมูลจากฟอร์ม
$p_name = $_POST['txtp_name'];
$c_id = $_POST['txtc_id'];
$p_quantity = $_POST['txtp_quantity'];
$p_price = $_POST['txtp_price'];
$p_img = $_FILES['txtp_img'];

// ตรวจสอบและอัปโหลดไฟล์รูปภาพ
$target_dir = ""; // กำหนดโฟลเดอร์สำหรับอัปโหลด
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true); // สร้างโฟลเดอร์ถ้าไม่มี
}

$target_file = $target_dir . basename($p_img["name"]);
if (move_uploaded_file($p_img["tmp_name"], $target_file)) {
    $img_path = $target_file; // เส้นทางของรูปภาพ
} else {
    $img_path = null; // กรณีอัปโหลดไม่สำเร็จ
}

// สร้างคำสั่ง SQL สำหรับการแทรกข้อมูล
$sql = "INSERT INTO tbl_product (p_id, p_name, c_id, p_quantity, p_price, p_img) 
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssids", $next_id, $p_name, $c_id, $p_quantity, $p_price, $img_path);

// บันทึกข้อมูลลงฐานข้อมูล
if ($stmt->execute()) {
    echo "เพิ่มข้อมูลสำเร็จ";
    header("Location: index.php");
    exit(); // หยุดการทำงานเพื่อป้องกัน output เพิ่มเติม
} else {
    echo "เกิดข้อผิดพลาด: " . $stmt->error;
}

// ปิดการเชื่อมต่อ
$stmt->close();
$conn->close();
?>
