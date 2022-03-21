<?php
include('config.php');
session_start();
$fp = "onlinemember.txt";
$fo = fopen($fp, 'r');
$fr = fread($fo, filesize($fp));
$fc = fclose($fo);
$fpv = "soluongtruycap.txt";
$fov = fopen($fpv, 'r');
$frv = fread($fov, filesize($fpv));
$fcv = fclose($fov);
$id_product = $_GET['id'];
$sql = "SELECT * FROM sanpham s 
JOIN hangsanxuat h ON s.hangsanxuat = h.id_hangsanxuat 
JOIN tinhtrangsanpham t ON t.id_tinhtrang = s.tinhtrang 
JOIN mausanpham m ON m.id_mau = s.mau 
JOIN led l ON l.id_led = s.led WHERE id = $id_product";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_array($result);

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
                        <input type="text" name="" placeholder="Nhập mã hoặc tên sản phẩm . . ." class="search-bar" id="">
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
                        <a class="feature-button" href="cart.php">
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
    <div class="main">
        <div class="info-product">
            <div class="img-product">
                <img src="<?php echo $data['hinhanh'] ?>" class="main-img" alt="">

            </div>
            <div class="info-detail">
                <div class="title-product"><?php echo $data['tensanpham'] ?></div>

                <div class="general-name">Thông tin chung:</div>
                <ul>
                    <div class="line-info">
                        <li>Hãng sản xuất:</li>
                        <div class="info-general-product"><?php echo $data['tenhangsanxuat'] ?></div>
                    </div>
                    <div class="line-info">
                        <li>Tình trạng:</li>
                        <div class="info-general-product"><?php echo $data['tinhtrangsanpham'] ?></div>
                    </div>
                    <div class="line-info">
                        <li>Bảo hành:</li>
                        <div class="info-general-product"><?php echo $data['baohanh'] ?> tháng</div>
                    </div>
                    <div class="line-info">
                        <li>Màu:</li>
                        <div class="info-general-product"><?php echo $data['mausanpham'] ?></div>
                    </div>
                    <div class="line-info">
                        <li>LED:</li>
                        <div class="info-general-product"><?php echo $data['loai_led'] ?></div>
                    </div>
                </ul>
                <div class="price-product">
                    <div class="price-name">Giá tiền:</div>
                    <div class="price-value"><?php echo number_format($data['giatien'])?>₫</div>
                </div>
                <form action="cart.php?action=add&id=<?=$data['id']?>" method="POST">
                    <input type="hidden" value="<?=$data['tensanpham'] ?>"  name="tensanpham">
                    <input type="hidden" value="<?=$data['hinhanh'] ?>"  name="hinhanh">
                    <input type="hidden" value="<?=$data['giatien'] ?>"  name="giatien">
                    <input type="submit" name="add-to-cart" class="button-sell" value="Đặt hàng">
                </form>

            </div>
        </div>
        <div class="description-title">
            Mô tả sản phẩm
        </div>
        <hr size="10px" color="black" width="25%" align="left">
        <div class="description-content">
            <?php echo $data['motasanpham'] ?>
        </div>
    </div>
    <div class="footer">
        <div class="viewer">
            <div class="visitor">Số lượng người đã truy cập: <?php echo $frv ?></div>
            <div class="online">Thành viên đang hoạt động: <?php echo $fr ?></div>
        </div>
    </div>
</body>

</html>