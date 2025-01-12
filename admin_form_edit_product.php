<?php
require_once('conn.php');

// ตรวจสอบว่า p_id ถูกส่งมาใน URL หรือไม่
if (isset($_GET['p_id'])) {
    $p_id = $_GET['p_id'];
    
    // ดึงข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT p_id, p_name, c_id, p_quantity, p_price, p_img FROM tbl_product WHERE p_id = '$p_id'";
    $result = mysqli_query($con, $sql);
    
    // ตรวจสอบว่ามีข้อมูลสินค้านี้หรือไม่
    if ($data = mysqli_fetch_array($result)) {
        $p_name = $data['p_name'];
        $c_id = $data['c_id'];
        $p_quantity = $data['p_quantity'];
        $p_price = $data['p_price'];
        $p_img = $data['p_img'];
    } else {
        echo "ไม่พบสินค้านี้!";
        exit;
    }
} else {
    echo "ไม่ได้เลือกสินค้าที่จะแก้ไข!";
    exit;
}

// ดึงข้อมูลประเภทสินค้า
$sql_categories = "SELECT c_id, c_name FROM tbl_category";
$result_categories = mysqli_query($con, $sql_categories);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* เพิ่มการตกแต่งตามที่ต้องการ */
        body {
            background-color: #f4f7f6;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
        }
        .form-container h2 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="file"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-container button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .form-container button:hover {
            background-color: #0056b3;
        }
        .img-preview {
            margin-top: 10px;
        }
        .img-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 50%;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>แก้ไขข้อมูลสินค้า</h2>

    <!-- ฟอร์มแก้ไขข้อมูลสินค้า -->
    <form action="update_product.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="p_id" value="<?php echo $p_id; ?>">

        <div class="mb-3">
            <label for="p_name" class="form-label">ชื่อสินค้า:</label>
            <input type="text" id="p_name" name="p_name" value="<?php echo $p_name; ?>" required>
        </div>

        <div class="mb-3">
            <label for="c_id" class="form-label">รหัสประเภทสินค้า:</label>
            <select name="c_id" class="form-control" required>
                <option value="">-เลือกหมวดหมู่สินค้า-</option>
                <?php while ($row = mysqli_fetch_array($result_categories)) { ?>
                    <option value="<?= $row['c_id']; ?>" <?php if ($row['c_id'] == $c_id) echo 'selected'; ?>>
                        <?= $row['c_name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="p_quantity" class="form-label">จำนวน:</label>
            <input type="number" id="p_quantity" name="p_quantity" value="<?php echo $p_quantity; ?>" required>
        </div>

        <div class="mb-3">
            <label for="p_price" class="form-label">ราคา:</label>
            <input type="number" id="p_price" name="p_price" value="<?php echo $p_price; ?>" required>
        </div>

        <div class="mb-3">
            <label for="p_img" class="form-label">เลือกรูปภาพ:</label>
            <input type="file" id="p_img" name="p_img">
            <div class="img-preview">
                <p>รูปภาพปัจจุบัน:</p>
                <img src="img/<?php echo $p_img; ?>" alt="Current Image">
            </div>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">บันทึกการแก้ไข</button>
        </div>
    </form>
</div>

</body>
</html>
