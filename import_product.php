<?php
require_once 'role_check.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การพัฒนาเว็บไซต์</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">

    <style>
        marquee{
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
  
  <!-- <div style="display: flex; justify-content: flex-end"> -->
<!-- <button type="button" class="btn btn-success">เพิ่มข้อมูล</button> -->
</div>

<div class="container">
    <h1>นำเข้าข้อมูลสินค้า</h1>
    <form action="importproduct.php" method="post" enctype="multipart/form-data">
    <input type="file" name="csv_file" accept=".csv" required id="csv_file">
    <button type="submit" name="submit">นำเข้าสินค้า</button>
</form>

</div>

  <!--   <table class="table">
    <thead class="table-dark">
    <tr>
      <th scope="col">รหัสสินค้า</th>
      <th scope="col">ชื่อสินค้า</th>
      <th scope="col">หมวดหมู่</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา</th>
      <th scope="col">รูปภาพ</th>
      <th scope="col">แก้ไข/ลบ</th>
    </tr>
  </thead>


  <tbody class="table-group-divider">

  <?php
include("conn.php");
$sql="SELECT P_id, P_name, C_name, P_quantity, P_price, P_img FROM tbl_category RIGHT JOIN tbl_product ON tbl_category.C_id=tbl_product.C_id";
$result=mysqli_query($con,$sql);
while($data=mysqli_fetch_array($result)){
 ?>

    <tr>
      <th scope="row"><?php echo $data['P_id']; ?></th>
      <td><?php echo $data['P_name'];?></td>
      <td><?php echo $data['C_name'];?></td>
      <td><?php echo $data['P_quantity'];?></td>
      <td><?php echo $data['P_price'];?></td>
     <td><?php echo"<img src='img/food/".$data["P_img"]."'width='100'>"; ?></td>
     <td><button type="button" class="btn btn-warning">แก้ไข</button>
        <button type="button" class="btn btn-danger">ลบ</button>
</td>
    </tr>

 
  <?php }?>
  </tbody>
    </table> -->
</div>

<div class="container-fluid" align="center">
<div class="p-3 mb-2 bg-primary text-white">เว็บไซต์วิชา</div>
</div>



<script src="./js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php

?>

