<?php
session_start();
if (!isset($_SESSION["UserID"])) {
    header("Location: index_a.php");
    exit();
}
include("conn.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_product WHERE P_id = '$id'";
    $result = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขข้อมูลสินค้า</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .content-wrapper {
            min-height: calc(100vh - 150px); /* ลดความสูงของแบนเนอร์และเมนู */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-title {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }
        .btn-primary {
            width: 100%;
        }
        .btn-secondary {
            width: 100%;
            margin-top: 10px;
        }
        .form-label {
            font-weight: bold;
        }
        .marquee-wrapper {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- ส่วนแบนเนอร์ -->
<div class="container-fluid">
  <?php include("banner.php"); ?>
</div>

<!-- ส่วนเมนู -->
<div class="container-fluid">
  <?php include("menu_a.php"); ?>
</div>

<!-- ข้อความต้อนรับ -->
<div class="container-fluid marquee-wrapper">
  <marquee> **** ยินดีต้อนรับ **** </marquee>
</div>

<!-- ส่วนฟอร์ม -->
<div class="content-wrapper">
    <div class="form-container">
        <h3 class="form-title">แก้ไขข้อมูลสินค้า</h3>
        <form action="update_product.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="P_id" value="<?php echo $data['P_id']; ?>">

            <div class="mb-3">
                <label for="P_name" class="form-label">ชื่อสินค้า</label>
                <input type="text" class="form-control" id="P_name" name="P_name" value="<?php echo $data['P_name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="C_id" class="form-label">หมวดหมู่</label>
                <select class="form-select" id="C_id" name="C_id" required>
                    <?php
                    $categorySql = "SELECT * FROM tbl_category";
                    $categoryResult = mysqli_query($con, $categorySql);
                    while ($category = mysqli_fetch_assoc($categoryResult)) {
                        $selected = $category['C_id'] == $data['C_id'] ? 'selected' : '';
                        echo "<option value='{$category['C_id']}' $selected>{$category['C_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="P_quantity" class="form-label">จำนวน</label>
                <input type="number" class="form-control" id="P_quantity" name="P_quantity" value="<?php echo $data['P_quantity']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="P_price" class="form-label">ราคา</label>
                <input type="number" step="0.01" class="form-control" id="P_price" name="P_price" value="<?php echo $data['P_price']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="P_img" class="form-label">รูปภาพสินค้า (อัปโหลดใหม่ถ้าต้องการเปลี่ยน)</label>
                <input type="file" class="form-control" id="P_img" name="P_img">
            </div>

            <button type="submit" class="btn btn-primary">บันทึก</button>
            <a href="products2.php" class="btn btn-secondary">ยกเลิก</a>
        </form>
    </div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>
