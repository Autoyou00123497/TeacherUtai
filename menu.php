<?php
// require_once 'information.php';
?>
<?php
require_once 'role_check.php';

?>

<div class="d-flex justify-content-between mb-2">
  <div class="d-flex align-items-center">
    <!-- เพิ่มรูปภาพ -->
    <img src="img/users/<?php echo $u_img; ?>" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
    <p style="color: black; margin-bottom: 0;">ขอต้อนรับคุณ: <?php echo $u_fname . " " . $u_lname; ?></p>
  </div>

  <div id="button-container">
    <?php if (isset($u_status))  ?>
    <?php if ($u_status === 'A'): ?>
      <button type="button" class="btn btn-info">Admin</button>
    <?php elseif ($u_status === 'M'): ?>
      <button type="button" class="btn btn-light">Member</button>
    <?php endif; ?>
  </div>
</div>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
    
       

        <?php if (isset($u_status)) ?>
    <?php if ($u_status === 'A'): ?>
      <li class="nav-item">
          <a class="nav-link" href="admin-member.php">จัดการข้อมูล</a>

        </li>  

        <li class="nav-item">
          <a class="nav-link" href="Food_list.php">จัดการรายการอาหารและเครื่องดื่ม</a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="order.php">จัดการอาหาร</a>

        </li>  

        
        
        <?php elseif ($u_status === 'M'): ?>
          <li class="nav-item">
          <a class="nav-link" href="order.php">สั่งอาหาร</a>
        </li>        <?php endif; ?>




      </ul>

   





      <!-- ฟอร์มค้นหา -->
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>

        <!-- เพิ่มปุ่มที่จะแสดงข้างๆ ปุ่มค้นหา -->
        <div id="button-container" class="ms-2"></div> <!-- ใช้ ms-2 เพื่อให้มีระยะห่างระหว่างปุ่มค้นหากับปุ่ม -->

        <a href="Logout.php" class="btn btn-outline-danger" role="button">Logout</a>
      </form>
    </div>
  </div>
</nav>





</form>
</div>
</div>
</nav>

<div class="container-fluid content">


</div>