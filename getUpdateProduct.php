<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$limit = $_POST['limit'];
$offset = $_POST['offset'];
$query = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop ORDER BY product.productId DESC  LIMIT $limit offset $offset";
$data = mysqli_query($conn, $query);
$array = array();
while ($row = mysqli_fetch_assoc($data)) {
    $key2 = $row['productId'];
    $query2 = "SELECT image from images INNER JOIN product on product.productId=images.productId WHERE product.productId='$key2'";
    $dataimg = mysqli_query($conn, $query2);
    $arrayimg = array();
    while ($rowimg = mysqli_fetch_assoc($dataimg)) {

        array_push($arrayimg, $rowimg['image']);
    }
    array_push($array, new Product(
        $row['productId'],
        $row['name'],
        $row['price'],
        $row['discount'],
        $row['shopName'],
        $row['idShop'],
        $arrayimg,
        $row['detail']
    ));
}
echo json_encode($array);

?>

