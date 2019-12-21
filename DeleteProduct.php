<?php
include 'config/dbcon.php';
//$productId = $_POST['productId'];

$productId = 4674;
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
    echo "1xx1";
    foreach ($array as &$value) {
        unlink($value);
    }
} else {
    echo "0xx0";
}


?>