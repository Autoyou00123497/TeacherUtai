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

    <!-- Search Bar Section -->
    <div class="container mt-3">
        <form action="" method="GET" class="d-flex justify-content-center">
            <input class="form-control me-2 w-50" type="text" name="query" placeholder="ค้นหารายการอาหารหรือเครื่องดื่ม..." value="<?php echo htmlspecialchars($search_query); ?>">
            <button class="btn btn-primary" type="submit">ค้นหา</button>
        </form>
    </div>

    <div class="container-fluid">
        <marquee>*** ยินดีต้อนรับสู่เว็บไซต์ แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง ***</marquee>

        <!-- Product List -->
        <?php if ($stmt->rowCount() > 0): ?>
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>รายการอาหาร</th>
                        <th>รหัสประเภทสินค้า</th>
                        <th>จำนวน</th>
                        <th>ราคา/ต่อชิ้น</th>
                        <th>รูปอาหาร</th>
                        <th>การจัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $row['p_id']; ?></td>
                            <td><?php echo $row['p_name']; ?></td>
                            <td><?php echo $row['c_id'] ?? 'ไม่ระบุ'; ?></td>
                            <td><?php echo $row['p_quantity'] ?? '0'; ?></td>
                            <td><?php echo isset($row['p_price']) ? $row['p_price'] : 'N/A'; ?></td>
                            <td>
                                <?php if (!empty($row['p_img'])): ?>
                                    <img src="<?php echo $row['p_img']; ?>" class="circle" alt="รูปอาหาร">
                                <?php else: ?>
                                    <span>ไม่มีรูปภาพ</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="admin_form_edit_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-warning">แก้ไข</a>
                                <a href="delete_product.php?id=<?php echo $row['p_id']; ?>" class="btn btn-danger" onclick="return confirm('ยืนยันการลบรายการนี้?');">ลบ</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-warning text-center" role="alert">
                ไม่พบรายการที่ตรงกับ "<?php echo htmlspecialchars($search_query); ?>"
            </div>
        <?php endif; ?>

        <a href="Food_List.php" class="btn btn-secondary mt-3">แสดงทั้งหมด</a>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>

<?php
$conn = null; // ปิดการเชื่อมต่อฐานข้อมูล
?>
