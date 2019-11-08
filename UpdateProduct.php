<?php
include 'config/dbcon.php';

$productId=$_POST['productId'];
$idcategory=$_POST['idcategory'];
$idShop=$_POST['idShop'];
$name=$_POST['name'];
$price=$_POST['price'];
$detail=$_POST['detail'];
$discount=$_POST['discount'];


if (strlen($idcategory)>0 &&strlen($name)>0&&strlen($price)>0&&strlen($detail)>0) {
    $query="UPDATE product SET idcategory='$idcategory', name='$name',price='$price',detail='$detail',discount='$discount'
WHERE productId='$productId'";
    $data1=mysqli_query($conn,$query);
    if ($data1){

        echo "Success";
    } else{
        echo "Fail";
    }

} else{
    echo "Null";
}

?>