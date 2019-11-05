<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$image=$_POST['image'];
$productId=$_POST['productId'];
if (strlen($image)>0 &&strlen($productId)>0) {
    $query = "INSERT INTO images VALUES ('','$image','$productId')";
    $data1=mysqli_query($conn,$query);

} else{
    echo "Null";
}

?>
