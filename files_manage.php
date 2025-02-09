<?php
require_once 'role_check.php';
require_once 'conn.php'; // เชื่อมต่อฐานข้อมูล

// การจัดการการค้นหา
$search_query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM tbl_product";
if (!empty($search_query)) {
    $sql .= " WHERE BINARY p_name LIKE :query";
}

$stmt = $conn->prepare($sql);
if (!empty($search_query)) {
    $stmt->bindValue(':query', '%' . $search_query . '%');
}
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 2024</title>

    <style>
        marquee {
            font-size: 30px;
            font-weight: 800;
            color: #FF0000;
            font-family: TH SarabunPSK;
        }

        img.circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid">
        <?php include("banner.php"); ?>
    </div>

    <div class="container-fluid">
        <?php include("menu.php"); ?>
    </div>

    <div class="container">
        <h5 class="mt-4">อัปโหลดไฟล์ PDF</h5>
        <form action="upload_pdf.php" method="post" enctype="multipart/form-data">
            <input type="file" name="pdf_file" class="form-control" accept=".pdf" required>
            <button type="submit" name="upload" class="btn btn-success mt-2">อัปโหลด</button>
        </form>

        <h5 class="mt-4">รายการไฟล์ PDF</h5>
        <table class="table table-striped text-center">
            <thead class="table-dark">
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อไฟล์</th>
                    <th>อัปโหลดโดย</th>
                    <th>สถานะ</th>
                    <th>วันที่อัปโหลด</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql_files = "SELECT * FROM tbl_file ORDER BY upload_date DESC"; // แก้จาก tbl_files เป็น tbl_file
                $stmt_files = $conn->prepare($sql_files);
                $stmt_files->execute();
                $result_files = $stmt_files->fetchAll(PDO::FETCH_ASSOC);
                $index = 1;

                if ($result_files && count($result_files) > 0) {
                    foreach ($result_files as $row) {
                        $status_label = ($row['U_status'] == 'A') ? 'Admin' : 'User';
                        echo "<tr>";
                        echo "<td>{$index}</td>";
                        echo "<td>{$row['filename']}</td>";
                        echo "<td>{$row['uploaded_by']}</td>";
                        echo "<td>{$status_label}</td>";
                        echo "<td>{$row['upload_date']}</td>";
                        echo "<td>
                                <a href='{$row['filepath']}' target='_blank' class='btn btn-primary btn-sm mb-1'>ดูไฟล์</a>
                                <a href='download_pdf.php?file={$row['filepath']}' class='btn btn-success btn-sm mb-1'>ดาวน์โหลด</a>
                                <a href='delete_pdf.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"ยืนยันการลบไฟล์?\")'>ลบ</a>
                              </td>";
                        echo "</tr>";
                        $index++;
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>ไม่มีไฟล์ที่อัปโหลด</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>

<?php
$conn = null; // ปิดการเชื่อมต่อฐานข้อมูล
?>
