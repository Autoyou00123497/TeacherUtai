<?php
require_once 'role_check.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านอาหาร 2024 61111111111</title>

    <style>
        .video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .content {
            position: relative;
            z-index: 1;
            color: white;
        }

        marquee {
            font-size: 30px;
            font-weight: 800;
            color: #FF0000;
            font-family: TH SarabunPSK;
        }

        .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            margin: 0 auto;
        }

        body {
            margin: 0;
            background-color: #EBB;
        }

        .lightbox {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, .5);
            z-index: 9999;
        }

        .toolbarLB {
            text-align: right;
            padding: 3px;
        }

        .closeLB {
            color: red;
            cursor: pointer;
        }

        .lightbox .iframeContainer {
            vertical-align: middle;
            background: #CCC;
            padding: 20px;
        }

        .lightbox.closed {
            display: none;
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