<?php
//gán biến
$server = "localhost";
$user = "root";
$pass = "";
$database  = "banhanggearvn";

//kết nối
$conn = mysqli_connect($server, $user, $pass, $database);

//kiểm tra

if (!$conn) {
    die("<script>alert('Lỗi kết nối với database')</script>");
}
mysqli_query($conn, "SET NAMES 'UTF8'");
