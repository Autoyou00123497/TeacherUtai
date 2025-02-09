<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost"; // หรือชื่อ host ของคุณ
$username = "root";         // ชื่อผู้ใช้ฐานข้อมูล
$password = "";             // รหัสผ่านฐานข้อมูล
$dbname = "restaurant";  // ชื่อฐานข้อมูลของคุณ

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับค่าจากฟอร์มค้นหา
$search_query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

// คำสั่ง SQL สำหรับการค้นหา (ค้นหาแบบ case-sensitive)
$sql = "SELECT * FROM tbl_product WHERE BINARY p_name LIKE '%$search_query%'";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>ผลการค้นหา: "<?php echo htmlspecialchars($search_query); ?>"</h2>
    
    <?php if ($result->num_rows > 0): ?>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['p_id']; ?></td>
                        <td><?php echo $row['p_name']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning mt-3" role="alert">
            ไม่พบผลลัพธ์ที่ตรงกับ "<?php echo htmlspecialchars($search_query); ?>"
        </div>
    <?php endif; ?>

    <a href="index.php" class="btn btn-secondary mt-3">กลับหน้าหลัก</a>
</div>

<script src="./js/bootstrap.bundle.js"></script>
</body>
</html>

<?php
$conn->close();
?>
