<?php if (isset($u_status)) ?>
    <?php if ($u_status === 'A'): ?>

      <div style = "display: flex; justify-content: flex-end">
        <a href="admin_form_insert_product.php" class="btn btn-success">เพิ่มอาหาร</a>
        <a href="insert_category_form.php" class="btn btn-success">เพิ่มประเภทอาหาร</a>
        <a href="import_product.php" class="btn btn-success">เพิ่มข้อมูล CSV</a>
      </div>    

    <?php elseif ($u_status === 'M'): ?>
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
      <th scope="col">การจัดการ</th>
    </tr>
  </thead>

  <?php 
  require_once('conn.php');
  $sql = "SELECT p_id, p_name, c_name, p_quantity, p_price, p_img FROM tbl_category 
          RIGHT JOIN tbl_product ON tbl_category.c_id = tbl_product.c_id";
  $result = mysqli_query($con, $sql);
  while ($data = mysqli_fetch_array($result)) { 
  ?>
  <tbody>
  <tr>
      <th scope="row"><?php echo $data['p_id']; ?></th>
      <th scope="row"><?php echo $data['p_name']; ?></th>
      <th scope="row"><?php echo $data['c_name']; ?></th>
      <th scope="row"><?php echo $data['p_quantity']; ?></th>
      <th scope="row"><?php echo $data['p_price']; ?></th>
      <th scope="row">
          <?php echo "<img src='img/" . $data['p_img'] . "' width='150' height='150' style='border-radius: 50%; object-fit: cover;'>"; ?>
      </th>
      <td> 
        <?php if (isset($u_status) && $u_status === 'A'): ?>
          <a href="admin_form_edit_product.php?p_id=<?php echo $data['p_id']; ?>" class="btn btn-warning">แก้ไข</a>
          <button type="button" class="btn btn-danger" onclick="deleteProduct('<?php echo $data['p_id']; ?>')">ลบ</button>
        <?php endif; ?>
      </td>
    </tr>
  </tbody>
  <?php } ?>
</table>

<script>
function deleteProduct(productId) {
    if (confirm("คุณต้องการลบสินค้านี้หรือไม่?")) {
        // ส่งคำขอ AJAX ไปยังไฟล์ PHP เพื่อลบข้อมูล
        fetch('delete_product.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ p_id: productId }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("ลบสินค้าเรียบร้อยแล้ว!");
                location.reload(); // โหลดหน้าใหม่
            } else {
                alert("เกิดข้อผิดพลาด: " + data.message);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}
</script>