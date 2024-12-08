<?php
//require_once 'role_check.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร 24_11_2024</title>

    <style>
        .card {
            height: 400px; /* กำหนดความสูงคงที่ */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 15px 0;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
        }

        .card-body {
            flex: 1; /* ยืดขยายตามพื้นที่ที่เหลือ */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-text {
            font-size: 0.9rem;
            text-align: center;
        }

        .card-footer {
            text-align: center;
        }

        body {
            background-color: #EBB;
        }
    </style>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <!-- ปุ่มที่จะปรากฏตามสถานะผู้ใช้ -->


    <!-- เนื้อหาของเว็บไซต์ -->
    <div class="container-fluid content">
        <?php include("banner.php"); ?>
    </div>

    <div class="container-fluid content">
        <?php include("menu.php"); ?>
    </div>

    <div class="container-fluid content">
        <?php include("detail_admin_insert.php"); ?>
    </div>

    <div class="container-fluid content">
        <marquee>*** ยินดีตอนรับสู่เว็บไซต์ แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง ***</marquee>
    </div>
    

   






    <?php if (isset($u_status)) ?>
    <?php if ($u_status === 'A'): ?>
        <div class="container-fluid content">
    </div>
        </li>    <?php elseif ($u_status === 'M'): ?>

            
        </li>        <?php endif; ?>

        <div class="container-fluid content">
    </div>



    
    <div class="container-fluid content" align="center">
        <div class="p-3 mb-2 bg-secondary text-white">เว็บไซต์แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง</div>
    </div>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>