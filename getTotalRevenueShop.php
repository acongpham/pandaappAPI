<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$idShop = $_POST['idShop'];
$fromdate = $_POST['fromdate'];
$todate = $_POST['todate'];
//$idShop = 142;
//$fromdate = '2019-12-11';
//$todate = '2019-12-12';

$query = "SELECT SUM(oder.totalPrice) AS total FROM oder
            INNER JOIN oder_item ON oder.oderId=oder_item.oderId
            INNER JOIN product ON oder_item.productId=product.productId
            INNER JOIN shop ON product.idShop=shop.idShop WHERE shop.idShop=$idShop AND oder.statusId=3 AND oder.date_created>= '$fromdate' AND date_created <='$todate'";
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



