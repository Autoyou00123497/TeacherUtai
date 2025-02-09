<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];

    // ตรวจสอบว่าไฟล์มีอยู่ในโฟลเดอร์ uploads หรือไม่
    if (file_exists($file)) {
        // กำหนด Header สำหรับการดาวน์โหลด
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));

        // อ่านไฟล์และส่งให้ผู้ใช้
        readfile($file);
        exit();
    } else {
        echo "<script>
                alert('ไม่พบไฟล์ที่ต้องการดาวน์โหลด!');
                window.history.back();
              </script>";
    }
} else {
    echo "<script>
            alert('ไม่มีไฟล์ที่ระบุ!');
            window.history.back();
          </script>";
}
?>
