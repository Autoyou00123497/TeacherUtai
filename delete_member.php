<?php
include('conn.php');

// ตรวจสอบว่ามีการส่ง u_id มาหรือไม่
if (isset($_GET['u_id'])) {
    $u_id = $_GET['u_id'];

    // สร้างคำสั่ง SQL เพื่อลบข้อมูล
    $sql = "DELETE FROM tbl_member WHERE u_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $u_id);

    // ลบข้อมูล
    if ($stmt->execute()) {
        echo "<script>
            alert('ลบข้อมูลสำเร็จ');
            window.location.href = 'admin-member.php';
        </script>";
    } else {
        echo "<script>
            alert('ไม่สามารถลบข้อมูลได้');
            window.location.href = 'admin-member.php';
        </script>";
    }

    $stmt->close();
}
$con->close();
?>
