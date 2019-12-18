<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$idShop = $_POST['idShop'];
$date = $_POST['date'];

//$idShop = 142;
//$date = "2019-12-11";

$query = "SELECT SUM(oder.totalPrice) AS total FROM oder
            INNER JOIN oder_item ON oder.oderId=oder_item.oderId
            INNER JOIN product ON oder_item.productId=product.productId
            INNER JOIN shop ON product.idShop=shop.idShop WHERE shop.idShop=$idShop AND oder.statusId=3 AND date_created LIKE '%$date%'";
$data = mysqli_query($conn, $query);

if ($data){
     $row=mysqli_fetch_assoc($data);
    if ($row["total"]=="" or  $row==null){
        echo 0;
    } else{

        echo $row["total"];
    }
}



?>



