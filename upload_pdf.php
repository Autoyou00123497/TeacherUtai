<?php
require_once 'role_check.php';
require_once 'conn.php'; // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdf_file"])) {
    $upload_dir = "uploads/";

    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $filename = basename($_FILES["pdf_file"]["name"]);
    $filetype = pathinfo($filename, PATHINFO_EXTENSION);
    $uploaded_by = $_SESSION["u_id"];  // ดึง UserID จาก Session
    $U_status = isset($_SESSION["u_status"]) ? $_SESSION["u_status"] : "M";  // ค่าเริ่มต้นเป็น Member

    if (strtolower($filetype) == "pdf") {
        $destination = $upload_dir . $filename;
        if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $destination)) {
            // เพิ่มการบันทึกวันที่ upload_date
            $sql = "INSERT INTO tbl_file (filename, filepath, uploaded_by, u_status, upload_date) 
                    VALUES ('$filename', '$destination', '$uploaded_by', '$U_status', NOW())";
                    
            if (mysqli_query($con, $sql)) {
                echo "<script>
                        alert('อัปโหลดไฟล์สำเร็จ!');
                        window.location.href='files_manage.php';
                      </script>";
            } else {
                echo "<script>
                        alert('เกิดข้อผิดพลาดในการบันทึกข้อมูลไฟล์');
                        window.location.href='files_manage.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์');
                    window.location.href='files_manage.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('อนุญาตให้อัปโหลดเฉพาะไฟล์ PDF เท่านั้น');
                window.location.href='files_manage.php';
              </script>";
    }
} else {
    header("Location: files_manage.php");
    exit();
}
?>
