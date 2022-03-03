<?php
include('config.php');
error_reporting(0);
if (isset($_POST['submit'])) {
    $email = $_POST['email'] ;
    $username = $_POST['account'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['confirm-password']);
    if ($email != '' && $username != '' && $_POST['password'] != '') {
        if ($password == $cpassword) {
            $sql = "SELECT * FROM taikhoannguoidung WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO taikhoannguoidung(email, username, password) 
                VALUES ('$email', '$username', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Đăng ký thành công')</script>";
                    $email = "";
                    $username = "";
                    $_POST['password'] = "";
                    $_POST['confirm-password'] = "";
                }
                else{
                    echo "<script>alert('Đăng ký thất bại - Lỗi không xác định')</script>";
                }
            }
            else{
                echo "<script>alert('Email đã tồn tại')</script>";
            }
        }
        else{
            echo "<script>alert('Mật khẩu không khớp')</script>";
        }
    }
    else{
        echo "<script>alert('Vui lòng điền đầy đủ thông tin')</script>";
    }
}
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
    <div class="main">
        <div class="register">
            <form action="" method="post">
                <div class="title-register">TẠO TÀI KHOẢN</div>
                <div class="form-register">
                    <div class="icon-register"><i class="material-icons">email</i></div>
                    <input type="text" name="email" class="input-register" value="<?php echo $email ?>" placeholder="Email">
                </div>
                <div class="form-register">
                    <div class="icon-register"><i class="material-icons">person</i></div>
                    <input type="text" name="account" class="input-register" value="<?php echo $username ?>" placeholder="Họ và tên">
                </div>
                <div class="form-register">
                    <div class="icon-register"><i class="material-icons">lock</i></div>
                    <input type="password" name="password" class="input-register" value="<?php echo $_POST['password'] ?>" placeholder="Mật khẩu">
                </div>
                <div class="form-register">
                    <div class="icon-register"><i class="material-icons">lock</i></div>
                    <input type="password" name="confirm-password" class="input-register" value="<?php echo $_POST['confirm-password'] ?>" placeholder="Xác nhận mật khẩu">
                </div>
                <div class="button-form">
                    <button class="button-register"   type="submit" name="submit">Đăng ký</button>
                    <div class="button-register"  onclick="window.location='index.php'">Trở về</div>
                </div>
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="viewer">
            <div class="visitor">Số lượng người đã truy cập: <?php echo $frv ?></div>
            <div class="online">Thành viên đang hoạt động: <?php echo $fr ?></div>
        </div>
    </div>
</body>