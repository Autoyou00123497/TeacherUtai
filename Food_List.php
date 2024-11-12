้<?php
require_once 'role_check.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 2024</title>

    <style>
        marquee{
            font-size: 30px;
            font-weight: 800;
            color: #FF0000;
            font-family: TH SarabunPSK;
            
        }
        img.circle {
        width: 150px; /* กำหนดความกว้างของภาพ */
        height: 150px; /* กำหนดความสูงของภาพ */
        border-radius: 50%; /* ทำให้ภาพเป็นวงกลม */
        object-fit: cover; /* ทำให้ภาพเต็มวงกลม */
    }
    </style>

    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>

    <div class="container-fluid">
        <?php include("banner.php"); ?>
    </div>

    <div class="container-fluid">
        <?php include("menu.php"); ?>
    </div>

    <div class="container-fluid">
        <marquee>*** ยินดีตอนรับสู่เว็บไซต์ แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง ***</marquee>
        <?php include("food_drink.php"); ?>

    </div>

    

    




    <div class="container-fluid" align="center">
        <div class="p-3 mb-2 bg-secondary text-white">เว็บไซต์แผนกวิชาเทคโนโลยีสารสนเทศ วิทยาลัยเทคนิคระยอง</div>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>