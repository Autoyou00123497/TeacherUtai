<?php
require_once('conn.php');

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT p_id, p_name, c_name, p_price, p_img FROM tbl_category 
        RIGHT JOIN tbl_product ON tbl_category.c_id = tbl_product.c_id";
$result = mysqli_query($con, $sql);
?>



<div class="container">
        <div class="row">
            <?php while ($data = mysqli_fetch_array($result)) { ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?php echo $data['p_img']; ?>" class="card-img-top" alt="<?php echo $data['p_name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data['p_name']; ?></h5>
                            <p class="card-text">ประเภท: <?php echo $data['c_name']; ?></p>
                            <p class="card-text">ราคา: <?php echo $data['p_price']; ?> บาท</p>

                            <?php if (isset($u_status)): ?>
    <?php if ($u_status === 'A'): ?>
        <a href="#" class="btn btn-warning">จัดการสินค้าตัวนี้</a>
   
    <?php elseif ($u_status === 'M'): ?>

            <a href="#" class="btn btn-success">สั่งซื้อ</a>
    <?php endif; ?>
<?php endif; ?>


                            
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>