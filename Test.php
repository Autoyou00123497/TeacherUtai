<?php
session_start();
if (!isset($_SESSION["UserID"])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การพัฒนาเว็บไซต์</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"> <!-- Bootstrap Icons -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        marquee {
            font-size: 20px;
            font-weight: 800;
            color: #ffa500;
            font-family: sans-serif;
        }
    </style>
</head>
<body>

<div class="container-fluid">
  <?php include("banner.php"); ?>
</div>

<div class="container-fluid">
  <?php include("menu_a.php"); ?>
</div>

<div class="container-fluid">
  <marquee> ****ยินดีต้อนรับ****</marquee>

  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    
    <!-- ✅ ช่องค้นหาพร้อมไอคอน -->
    <div class="input-group" style="width: 300px;">
        <span class="input-group-text"><i class="bi bi-search"></i></span>
        <input type="text" id="searchProduct" class="form-control" placeholder="ค้นหาสินค้า...">
    </div>

    <!-- ปุ่มเพิ่มข้อมูล -->
    <a href="a_frminsertProduct.php" class="btn btn-success">เพิ่มข้อมูล</a>
  </div>

  <div class="row" id="productList">
    <?php
    include("conn.php");
    $sql = "SELECT P_id, P_name, C_name, P_quantity, P_price, P_img 
            FROM tbl_category 
            RIGHT JOIN tbl_product 
            ON tbl_category.C_id = tbl_product.C_id";
    $result = mysqli_query($con, $sql);

    while ($data = mysqli_fetch_array($result)) {
    ?>
    <div class="col-md-3 product-card">
      <div class="card mb-3">
        <img src="img/food/<?php echo $data['P_img']; ?>" class="card-img-top" alt="<?php echo $data['P_name']; ?>" style="height: 200px; object-fit: cover;">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['P_name']; ?></h5>
          <p class="card-text">หมวดหมู่: <?php echo $data['C_name']; ?></p>
          <p class="card-text">จำนวน: <?php echo $data['P_quantity']; ?></p>
          <p class="card-text">ราคา: <?php echo $data['P_price']; ?> บาท</p>
          <a href="frm_updateproduct.php?id=<?php echo $data['P_id']; ?>" class="btn btn-primary">แก้ไข</a>
          <a href="deleteProduct.php?id=<?php echo $data['P_id']; ?>" class="btn btn-danger" onclick="return confirm('คุณต้องการลบสินค้านี้หรือไม่?')">ลบ</a>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<script>
$(document).ready(function(){
    $("#searchProduct").on("keyup", function() {
        var searchText = $(this).val().toLowerCase();
        $(".product-card").each(function() {
            var itemText = $(this).text().toLowerCase();
            $(this).toggle(itemText.indexOf(searchText) > -1);
        });
    });
});
</script>

<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>