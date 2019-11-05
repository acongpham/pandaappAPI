<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$idcategory=$_POST['idcategory'];
$idShop=$_POST['idShop'];
$name=$_POST['name'];
$price=$_POST['price'];
$detail=$_POST['detail'];
$discount=$_POST['discount'];

if (strlen($idcategory)>0 &&strlen($idShop)>0&&strlen($name)>0&&strlen($price)>0&&strlen($detail)>0) {
    $query1="INSERT INTO product VALUES ('','$idcategory','$idShop','$name','$price','$detail','$discount')";
    $data1=mysqli_query($conn,$query1);
    if ($data1){
        $last_id1 = $conn->insert_id;
        echo $last_id1;
    } else{
        echo "Fail";
    }

} else{
    echo "Null";
}

?>
