<?php
include('config.php');
session_start();
$fp = "onlinemember.txt";
$fo = fopen($fp, 'r');
$fr = fread($fo, filesize($fp));
$fpv = "soluongtruycap.txt";
$fov = fopen($fpv, 'r');
$frv = fread($fov, filesize($fpv));
$fcv = fclose($fov);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexcss.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <title>GEAR VN</title>
</head>

<body>
    <div class="header">
        <div class="header-line">
            <div class="header-content">
                <img src="img/logo.png" class="content-icon" alt="">
                <div class="content-intro">
                    <div class="block-search">
                        <input type="text" name="" placeholder="Nhập mã hoặc tên sản phẩm . . ." class="search-bar"
                            id="">
                        <div class="search-icons">
                            <i class="material-icons">search</i>
                        </div>
                    </div>
                    <div class="block-feature">
                    <?php 
                            if (isset($_SESSION['username'])) {
                                echo '<a class="feature-button" href="">
                                <i class="material-icons">account_circle</i> '.$_SESSION['username'].'
                            </a>
                            <a class="feature-button" href="logout.php">
                                <i class="material-icons">logout</i> ĐĂNG XUẤT
                            </a>';
                            }
                            else{
                                echo '<a class="feature-button" href="register.php">
                                <i class="material-icons">description</i> ĐĂNG KÝ
                            </a>
                            <a class="feature-button" href="login.php">
                                <i class="material-icons">login</i> ĐĂNG NHẬP
                            </a>';
                            }
                        ?>
                        <a class="feature-button" href="update.php">
                            <i class="material-icons">sell</i> KHUYẾN MÃI
                        </a>
                        <a class="feature-button" href="update.php">
                            <i class="material-icons">shopping_cart</i> GIỎ HÀNG
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-list">
            <div class="list-button-menu">
                <i class="material-icons">menu</i> Danh mục sản phẩm
            </div>
            <div class="list-button" onclick="window.location='index.php'">
                <i class="material-icons">home</i> TRANG CHỦ
            </div>
            <div class="list-button" onclick="window.location='update.php'">
                <i class="material-icons">info</i> GIỚI THIỆU
            </div>
            <div class="list-button" onclick="window.location='update.php'">
                <i class="material-icons">newspaper</i> TIN TỨC
            </div>
            <div class="list-button" onclick="window.location='update.php'">
                <i class="material-icons">call</i> LIÊN HỆ
            </div>
        </div>
    </div>
    <div class="mainupdate">
        TRANG BẠN ĐANG TRUY CẬP HIỆN ĐANG CẬP NHẬT . . .
    </div>
    <div class="footer">
        <div class="viewer">
            <div class="visitor">Số lượng người đã truy cập: <?php echo $frv ?></div>
            <div class="online">Thành viên đang hoạt động: <?php echo $fr ?></div>
        </div>
    </div>                       
</body>

</html>