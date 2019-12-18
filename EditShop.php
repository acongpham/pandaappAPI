<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$idShop = $_POST['idShop'];
$shopName = $_POST['shopName'];
$introduce = $_POST['introduce'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];


$query = "UPDATE shop SET shop.shopName='$shopName'
            ,shop.introduce='$introduce',shop.address='$address',shop.phone='$phone'
            ,shop.email='$email' WHERE shop.idShop='$idShop'";

if ($data1 = mysqli_query($conn, $query)) {

    echo "1xx1";

} else {
    echo "0xx0";
}


?>



