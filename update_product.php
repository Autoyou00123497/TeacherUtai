<?php
require_once('conn.php');

// ตรวจสอบว่า p_id และข้อมูลจากฟอร์มถูกส่งมา
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['p_id'])) {
    $p_id = $_POST['p_id'];
    $p_name = $_POST['p_name'];
    $c_id = $_POST['c_id'];
    $p_quantity = $_POST['p_quantity'];
    $p_price = $_POST['p_price'];

    // ตรวจสอบการอัปโหลดไฟล์ภาพ
    if (isset($_FILES['p_img']) && $_FILES['p_img']['error'] == 0) {
        // ถ้ามีการอัปโหลดไฟล์ภาพใหม่
        $target_dir = "img/";
        $target_file = $target_dir . basename($_FILES["p_img"]["name"]);
        if (move_uploaded_file($_FILES["p_img"]["tmp_name"], $target_file)) {
            $p_img = basename($_FILES["p_img"]["name"]);
        } else {
            // ถ้าไม่สามารถอัปโหลดได้ให้ใช้รูปเดิม
            $sql = "SELECT p_img FROM tbl_product WHERE p_id = '$p_id'";
            $result = mysqli_query($con, $sql);
            $data = mysqli_fetch_array($result);
            $p_img = $data['p_img'];
        }
    } else {
        // ถ้าไม่มีการอัปโหลดไฟล์ ให้ใช้รูปเดิม
        $sql = "SELECT p_img FROM tbl_product WHERE p_id = '$p_id'";
        $result = mysqli_query($con, $sql);
        $data = mysqli_fetch_array($result);
        $p_img = $data['p_img'];
    }

    // อัปเดตข้อมูลในฐานข้อมูล
    $sql_update = "UPDATE tbl_product SET p_name = '$p_name', c_id = '$c_id', p_quantity = '$p_quantity', p_price = '$p_price', p_img = '$p_img' WHERE p_id = '$p_id'";

    if (mysqli_query($con, $sql_update)) {
        echo "ข้อมูลสินค้าได้รับการอัปเดตแล้ว";
        header("Location: food_list.php"); // ไปยังหน้าแสดงข้อมูลสินค้า
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตข้อมูล: " . mysqli_error($con);
    }
} else {
    echo "ข้อมูลไม่ครบถ้วน!";
}
?>
