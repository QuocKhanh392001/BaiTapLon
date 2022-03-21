<?php
include('config.php');

error_reporting(0);
session_start();
$fpv = "soluongtruycap.txt";
$fov = fopen($fpv, 'r');
$frv = fread($fov, filesize($fpv));
$fcv = fclose($fov);
$fp = "onlinemember.txt";
$fo = fopen($fp, 'r');
$fr = fread($fo, filesize($fp));
$fc = fclose($fo);
if (isset($_POST['add-to-cart'])) {
    if (isset($_SESSION['shopping_cart'])) {
        $item_array_id = array_column($_SESSION['shopping_cart'], 'item_id');
        if (!in_array($_GET['id'], $item_array_id)) {
          $count = count($_SESSION['shopping_cart']);
          $item_array = array(
            'item_id'   =>  $_GET['id'],
            'item_name' =>  $_POST['tensanpham'],
            'item_img'  =>  $_POST['hinhanh'],
            'item_price'=>  $_POST['giatien']
        );
        $_SESSION['shopping_cart'][$count] = $item_array;
    }
        else{
            echo '<script>alert("Sản phẩm đã có trong giỏ hàng")</script>';
            echo'<script>window.location="index.php"</script>';
        };
    }
    else{
        $item_array = array(
            'item_id'   =>  $_GET['id'],
            'item_name' =>  $_POST['tensanpham'],
            'item_img'  =>  $_POST['hinhanh'],
            'item_price'=>  $_POST['giatien']
        );
        $_SESSION['shopping_cart'][0] = $item_array;
        
    };
    
}
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
            if ($value['item_id'] == $_GET['id']) {
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
    }
}
if (isset($_POST['payment_click'])) {
    if ($_POST['username'] != '' && $_POST['email_user'] != '' && $_POST['phonenumber'] != '' && $_POST['address_user'] != '') {
        echo '<script>alert("Thanh toán thành công")</script>';
        echo '<script>alert("Sản phẩm sẽ giao hàng tận nhà và thanh toán trực tiếp")</script>';
        echo'<script>window.location="index.php"</script>';    
        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                unset($_SESSION['shopping_cart'][$key]);
        }
    }
    else{
        echo '<script>alert("Vui lòng điền đầy đủ thông tin")</script>';    
    }
}
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
        <form action="cart.php?action=submit" method="post">
            <table  class="table-cart">
                <tr >
                    <th class="col-one">Sản phẩm</th>
                    <th class="col-two">Tên sản phẩm</th>
                    <th class="col-three">Số lượng</th>
                    <th class="col-four">Thành tiền</th>
                    <th class="col-five">Xóa</th>
                </tr>
                <?php 
                if (!empty($_SESSION['shopping_cart'])) {
                    $total = 0;
                    if (isset($_POST['update_click'])) {
                        $price = 0;
                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                            $_SESSION['quantity'][$value['item_id']] = $_POST['quantity('.$value['item_id'].')'];
                            ?>
                            <tr class="rows-cart">
                                <td><img src="<?php echo $value['item_img'] ?>" class="img-cart" alt=""></td>
                                <td><a href="detail-product.php?id=<?php echo $value['item_id'] ?>" class="name-product-cart"><?php echo $value['item_name'] ?></a></td>
                                <td><input type="number" name="quantity(<?php echo $value['item_id']?>)" class="input-quantity" min="1" value="<?php echo $_SESSION['quantity'][$value['item_id']] ?>"></td>
                                <td class="price-product-cart"><?php echo number_format($price =  $_SESSION['quantity'][$value['item_id']] * $value['item_price']) ?>₫</td>
                                <td class="icon-delete"><a href="cart.php?action=delete&id=<?php echo $value['item_id'] ?>"><i class="material-icons">delete</i></a></td>
                            </tr>
                       
                            <?php
                                $total = $total + ($value['item_price'] * $_SESSION['quantity'][$value['item_id']]);
                            ?>
                            <?php
                        }
                    }
                    else{
                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                            ?>
                            <tr class="rows-cart">
                                <td><img src="<?php echo $value['item_img'] ?>" class="img-cart" alt=""></td>
                                <td><a href="detail-product.php?id=<?php echo $value['item_id'] ?>" class="name-product-cart"><?php echo $value['item_name'] ?></a></td>
                                <td><input type="number" name="quantity(<?php echo $value['item_id']?>)" class="input-quantity" min="1" value="1"></td>
                                <td class="price-product-cart"><?php echo number_format($value['item_price']) ?>₫</td>
                                <td class="icon-delete"><a href="cart.php?action=delete&id=<?php echo $value['item_id'] ?>"><i class="material-icons">delete</i></a></td>
                            </tr>
                       
                            <?php
                            
                            $total = $total + $value['item_price'];
                            ?>
                            <?php
                        }
                    }
                    
                }
                else{
                    echo '<script>alert("Không có sản phẩm trong giỏ hàng")</script>';
                    echo'<script>window.location="index.php"</script>';
                }
                ?>
                <tr>
                    <td class="sum-price" colspan="3">Tổng tiền:</td>
                    <td class="sum-price" colspan="2"><?php echo number_format($total) ?>₫</td>
                </tr>
            </table>
            <div class="div-button-update">
            <input type="submit" name="update_click" class="button-update" value="Cập nhật">
            </div>
            <hr>
            <div class="form-user">
                <div class="title-form">Thông tin thanh toán</div>
                <div class="user-name"><input type="text" placeholder="Họ và tên" name="username"></div>
                <div class="email-phone">
                    <div class="email-user">
                        <input type="text" placeholder="Email" name="email_user">
                    </div>
                    <div class="phone-user">
                        <input type="text" placeholder="Số điện thoại" name="phonenumber">
                    </div>
                </div>
                <div class="address-user"><input type="text" placeholder="Địa chỉ" name="address_user"></div>
                <textarea name="note_user" class="note-user" placeholder="Ghi chú" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="div-button-payment">
            <input type="submit" name="payment_click" value="Thanh toán">
            </div>
        </form>
    </div>
    <div class="footer">
        <div class="viewer">
            <div class="visitor">Số lượng người đã truy cập: <?php echo $frv ?></div>
            <div class="online">Thành viên đang hoạt động: <?php echo $fr ?></div>
        </div>
    </div>
</body>

</html>