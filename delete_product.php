<?php
header('Content-Type: application/json');
require_once('conn.php'); // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $p_id = $data['p_id'];

    if ($stmt = $con->prepare("DELETE FROM tbl_product WHERE p_id = ?")) {
        $stmt->bind_param("s", $p_id); // กำหนดค่าตัวแปร
        if ($stmt->execute()) {
            echo json_encode(['success' => true]); // ลบสำเร็จ
        } else {
            echo json_encode(['success' => false, 'message' => 'ไม่สามารถลบข้อมูลได้']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'คำสั่งลบล้มเหลว']);
    }
}
$con->close();
?>
