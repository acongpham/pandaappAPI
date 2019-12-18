<?php
include "config/dbcon.php";

$AccountId = $_POST["AccountId"];
$productId = $_POST["productId"];
//$AccountId = 155;
//$productId = 4668;


$sql = "SELECT * FROM favorite WHERE AccountId=$AccountId AND productId=$productId";
$data = mysqli_query($conn, $sql);
$row=mysqli_num_rows($data);
if ($row==0) {
    echo "no";

} else {
    echo "yes";
}

?>
