




<?php if (isset($u_status)) ?>
    <?php if ($u_status === 'A'): ?>

      <div style = "display: flex; justify-content: flex-end">

      <a href="admin_form_insert_product.php" class="btn btn-success">เพิ่มอาหาร</a>

</div>    <?php elseif ($u_status === 'M'): ?>

    <?php endif; ?>



  


<table class="table table-striped">
    <thead>
    <tr>
      <th scope="col">รหัสสินค้า</th>
      <th scope="col">รายการอาหาร</th>
      <th scope="col">รหัสประเภทสินค้า</th>
      <th scope="col">จำนวน</th>
      <th scope="col">ราคา/ต่อชิ้น</th>
      <th scope="col">รูปอาหาร</th>
 

    </tr>
  </thead>


  <?php 
require_once('conn.php');
$sql="SELECT p_id,p_name,c_name,p_quantity,p_price,p_img FROM tbl_category RIGHT JOIN tbl_product ON tbl_category.c_id=tbl_product.c_id";


$result=mysqli_query($con,$sql);
while($data=mysqli_fetch_array($result)){ ?>


  <tbody>

  <tr>
      <th scope="row"><?php echo $data['p_id'] ?></th>
      <th scope="row"><?php echo $data['p_name'] ?></th>
      <th scope="row"><?php echo $data['c_name'] ?></th>

      <th scope="row"><?php echo $data['p_quantity'] ?></th>

      <th scope="row"><?php echo $data['p_price'] ?></th>
      
      <th scope="row"><?php echo "<img src='img/" . $data["p_img"] . "' width='150' height='150' style='border-radius: 50%; object-fit: cover;'>"; ?></th>

      <td> 
        
<?php if (isset($u_status)) ?>
    <?php if ($u_status === 'A'): ?>
      <button type="button" class="btn btn-warning">แก้ไข</button>
      <button type="button" class="btn btn-danger">ลบ</button>
      <div style = "display: flex; justify-content: flex-end">
</div>    <?php elseif ($u_status === 'M'): ?>
  
    <?php endif; ?>

 
      </td>

      
    </tr>
    
  </tbody>

  <?php       } ?>








    </table>
    













