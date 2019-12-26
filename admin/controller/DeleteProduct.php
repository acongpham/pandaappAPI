<?php
include("../../config/dbcon.php");
$productId = $_GET['productId'];

//$productId = 4674;
$query1 = "SELECT image FROM images WHERE productId=$productId";
$data1=mysqli_query($conn, $query1);
$array = array();
while ($row=mysqli_fetch_assoc($data1)) {
    array_push($array,
        $row['image']

    );
}
$query = "DELETE FROM product WHERE productId=$productId;";
if ($data = mysqli_multi_query($conn, $query)) {
//    header('location:product.php');
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    foreach ($array as &$value) {
        unlink(dirname(__FILE__, 3)."/".$value);
    }
} else {

}


?>

