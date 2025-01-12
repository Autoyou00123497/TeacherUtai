<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $p_id = $_POST['p_id'];
    $p_name = $_POST['txtp_name'];
    $c_id = $_POST['txtc_id'];
    $p_quantity = $_POST['txtp_quantity'];
    $p_price = $_POST['txtp_price'];

    // อัปเดตรูปภาพ
    $p_img = null;
    if (isset($_FILES['txtp_img']) && $_FILES['txtp_img']['error'] === UPLOAD_ERR_OK) {
        $p_img = 'uploads/' . basename($_FILES['txtp_img']['name']);
        move_uploaded_file($_FILES['txtp_img']['tmp_name'], $p_img);
    }

    // อัปเดตข้อมูลสินค้า
    $sql = "UPDATE tbl_product SET p_name = ?, c_id = ?, p_quantity = ?, p_price = ?" . ($p_img ? ", p_img = ?" : "") . " WHERE p_id = ?";
    $stmt = $conn->prepare($sql);
    if ($p_img) {
        $stmt->bind_param("ssids", $p_name, $c_id, $p_quantity, $p_price, $p_img, $p_id);
    } else {
        $stmt->bind_param("ssids", $p_name, $c_id, $p_quantity, $p_price, $p_id);
    }
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "อัปเดตข้อมูลสำเร็จ!";
    } else {
        echo "ไม่มีการเปลี่ยนแปลงข้อมูล.";
    }
}
?>
