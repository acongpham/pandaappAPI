<?php
include "config/dbcon.php";
$oderId= $_POST["oderId"];
$productId =$_POST["productId"];
$amount =$_POST["amount"];
$total = $_POST["total"];
//$oderId= 22;
//$productId =1;
//$amount =1;
//$total = 100;

$sql ="INSERT INTO oder_item VALUES ($oderId,$productId,$amount,$total)" ;
$data =mysqli_query($conn,$sql);
if($data)
{
    echo 'Success';
}else{
   // echo "'.$oderId.','.$productId.','.$amount.','.$total.'";
    echo 'Error';
}
?>
