<?php
// เชื่อมต่อกับฐานข้อมูล
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "restaurant"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงหมายเลขสูงสุดจาก p_id
$sql = "SELECT p_id FROM tbl_product ORDER BY CAST(p_id AS UNSIGNED) DESC LIMIT 1"; // แปลง p_id เป็นตัวเลข
$result = $conn->query($sql);

$next_id = "1"; // ค่าเริ่มต้นหากยังไม่มีข้อมูล
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $next_id = (string)((int)$row['p_id'] + 1); // เพิ่ม 1 เพื่อหาค่าถัดไป
}

// ดึงข้อมูลหมวดหมู่สินค้า
$sql = "SELECT c_id, c_name FROM tbl_category";
$result = $conn->query($sql);
$rs = $stmt->fetchAll();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $rs[] = $row;
    }
}
?>


<div class="container" align="center">
    <form action="backend_insert_admin.php" method="post" enctype="multipart/form-data">
        <div class="col-md-4">
            <!-- รหัสสินค้า -->
            <div class="form-floating mb-3">
                <fieldset disabled>
                    <input type="text" id="disabledTextInput" class="form-control" value="รหัสสินค้า : <?= $next_id; ?>">
                </fieldset>
            </div>

            <!-- ชื่อสินค้า -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="txtp_name" name="txtp_name" placeholder="ชื่อสินค้า" required>
                <label for="txtp_name">ชื่อสินค้า</label>
            </div>

            <!-- หมวดหมู่สินค้า -->
            <select name="txtc_id" class="form-control" required>
    <option value="">-เลือกหมวดหมู่สินค้า-</option>
    <?php foreach ($rs as $row) { ?>
        <option value="<?= $row['c_id']; ?>"><?= $row['c_name']; ?></option>
    <?php } ?>
</select>
            <br>

            <!-- จำนวนสินค้า -->
            <div class="form-floating mb-3">
                <input type="number" class="form-control" id="txtp_quantity" name="txtp_quantity" placeholder="จำนวน" required>
                <label for="txtp_quantity">จำนวน</label>
            </div>

            <!-- ราคา -->
            <div class="form-floating mb-3">
                <input type="number" step="0.01" class="form-control" id="txtp_price" name="txtp_price" placeholder="ราคา" required>
                <label for="txtp_price">ราคา</label>
            </div>

            <!-- รูปภาพ -->
            <div class="form-floating mb-3">
                <input type="file" class="form-control" id="txtp_img" name="txtp_img" required>
                <label for="txtp_img">รูปภาพ</label>
            </div>

            <!-- ปุ่มเพิ่มสินค้า -->
            <button type="submit" class="btn btn-success">เพิ่มสินค้า</button>
        </div>
    </form>
</div>

