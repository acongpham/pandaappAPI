<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$shopName = $_POST['shopName'];
$introduceshop = $_POST['introduceshop'];
$addressshop = $_POST['addressshop'];
$phoneshop = $_POST['phoneshop'];
$emailshop = $_POST['emailshop'];
$AccountId = $_POST['AccountId'];

//$shopName ='congkaka';
//$introduceshop ='congkaka';
//$addressshop ='congkaka';
//$phoneshop ='congkaka';
//$emailshop ='congkaka';
//$AccountId =197;

$querry = "INSERT INTO shop (idShop,shopName,introduce,address,phone,email) VALUES (null,'$shopName','$introduceshop','$addressshop','$phoneshop','$emailshop')";
$data = mysqli_query($conn, $querry);
if ($data) {
    $last_id_shop = $conn->insert_id;

    $querry1 = "UPDATE account SET roleId=2,idShop=$last_id_shop WHERE AccountId=$AccountId";

    $t=1;
    while ($t) {
       if ( $data1 = mysqli_query($conn, $querry1)){
           $t=0;
       }
        echo "1xx1";
    }
} else {
    echo "0xx0";
}


?>


