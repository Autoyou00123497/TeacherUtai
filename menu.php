<?php require_once 'role_check.php'; ?>

<div class="d-flex justify-content-between mb-2">
    <div class="d-flex align-items-center">
        <img src="img/users/<?php echo $u_img; ?>" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
        <p style="color: black; margin-bottom: 0;">ขอต้อนรับคุณ: <?php echo $u_fname . " " . $u_lname; ?></p>
    </div>

    <div id="button-container">
        <?php if ($u_status === 'A'): ?>
            <button type="button" class="btn btn-info">Admin</button>
        <?php elseif ($u_status === 'M'): ?>
            <button type="button" class="btn btn-light">Member</button>
        <?php endif; ?>
    </div>
</div>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
            <?php if ($u_status === 'A'): ?>
                <li class="nav-item"><a class="nav-link" href="admin-member.php">จัดการข้อมูล</a></li>
                <li class="nav-item"><a class="nav-link" href="Food_list.php">จัดการรายการอาหารและเครื่องดื่ม</a></li>
                <li class="nav-item"><a class="nav-link" href="order.php">จัดการอาหาร</a></li>
                <li class="nav-item"><a class="nav-link" href="table_form.php">เพิ่มโต๊ะอาหาร</a></li>
                <li class="nav-item"><a class="nav-link" href="files_manage.php">อัปโหลดไฟล์</a></li>

            <?php elseif ($u_status === 'M'): ?>
                <li class="nav-item"><a class="nav-link" href="order.php">สั่งอาหาร</a></li>
            <?php endif; ?>
        </ul>

 




    </div>
</nav>
