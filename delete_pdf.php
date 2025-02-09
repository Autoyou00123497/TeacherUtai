<?php
session_start();

// ตรวจสอบว่าเข้าสู่ระบบหรือไม่
if (!isset($_SESSION["u_id"])) {
    header("Location: index.php");
    exit();
}

require_once("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ดึงข้อมูลไฟล์จากฐานข้อมูล
    $sql = "SELECT * FROM tbl_file WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $file = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($file) {
        $file_path = $file['filepath']; // ตำแหน่งไฟล์ในโฟลเดอร์ uploads/
        $deleted_dir = "deleted/";     // โฟลเดอร์สำหรับเก็บไฟล์ที่ถูกลบ

        // ตรวจสอบว่าโฟลเดอร์ deleted/ มีอยู่หรือไม่ หากไม่มีให้สร้าง
        if (!file_exists($deleted_dir)) {
            mkdir($deleted_dir, 0777, true);
        }

        // ย้ายไฟล์ไปยังโฟลเดอร์ deleted/
        $new_path = $deleted_dir . basename($file_path); // เก็บไฟล์ใน deleted/ ด้วยชื่อเดิม
        if (rename($file_path, $new_path)) {
            // ลบข้อมูลไฟล์ออกจากฐานข้อมูล
            $delete_sql = "DELETE FROM tbl_file WHERE id = :id";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bindParam(':id', $id, PDO::PARAM_INT);

            if ($delete_stmt->execute()) {
                echo "<script>
                        alert('ลบไฟล์สำเร็จ!');
                        window.location.href='files_manage.php';
                      </script>";
            } else {
                echo "<script>
                        alert('เกิดข้อผิดพลาดในการลบข้อมูลในฐานข้อมูล!');
                        window.location.href='files_manage.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('ไม่สามารถย้ายไฟล์ไปยังโฟลเดอร์ deleted ได้!');
                    window.history.back();
                  </script>";
        }
    } else {
        echo "<script>
                alert('ไม่พบไฟล์ในระบบ!');
                window.location.href='files_manage.php';
              </script>";
    }
} else {
    header("Location: files_manage.php");
    exit();
}
?>