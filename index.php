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
        <marquee>*** ยินดีตอนรับสู่เว็บไซต์ แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง ***</marquee>
    </div>
    
    <?php if (isset($u_status)) ?>
    <?php if ($u_status === 'A'): ?>
        <div class="container-fluid content">
        <?php include("graph.php"); ?>
    </div>
        </li>    <?php elseif ($u_status === 'M'): ?>

            
        </li>        <?php endif; ?>

        <div class="container-fluid content">
        <?php include("card.php"); ?>
    </div>

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide content">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://instyledecoparis.com/wp-content/uploads/2022/08/Restaurant-Interior-Design-Pizzaria-inside-with-Bar-view-1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://assets.bonappetit.com/photos/631788f25635b01b337f6bb4/master/pass/220827_GuangXu_BA-UncleLou_014.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://servsuccess.com/NRAServSuccess/media/library/images/CRM.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid content" align="center">
        <div class="p-3 mb-2 bg-secondary text-white">เว็บไซต์แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง</div>
    </div>










    
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>