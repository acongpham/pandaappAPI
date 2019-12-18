<?php
include "config/dbcon.php";

$AccountId = $_POST["AccountId"];
$productId = $_POST["productId"];
$isfavorite=$_POST["isfavorite"];


$sql1 = "INSERT INTO favorite(productId, AccountId) VALUES ($productId,$AccountId)";
$sql2 = "DELETE FROM `favorite` WHERE productId=$productId AND AccountId=$AccountId";


if ($isfavorite==1)
{
    $data1 = mysqli_query($conn, $sql1);
    if ($data1) {
        echo "122";

    } else {
        echo "111";
    }
} else{
    $data2 = mysqli_query($conn, $sql2);
    if ($data2) {
        echo "221";

    } else {
        echo "222";
    }

}
?>
