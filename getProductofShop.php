<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$key = $_POST['idShop'];
$limit = $_POST['limit'];
$offset = $_POST['offset'];
$sortID = $_POST['sort'];
//$key = 1;
$querya = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where product.idShop=$key ORDER BY product.productId DESC LIMIT $limit offset $offset";

$queryb = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where product.idShop=$key ORDER BY product.price DESC  LIMIT 15 OFFSET $offset";
$queryc = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where product.idShop=$key ORDER BY product.price ASC  LIMIT 15 OFFSET $offset";
$queryd = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where product.idShop=$key ORDER BY product.price ASC  LIMIT 15 OFFSET $offset";

switch ($sortID) {
    case 0:
        $data = mysqli_query($conn, $queryc);
        break;
    case 1:
        $data = mysqli_query($conn, $queryb);
        break;
    case 2:
        $data = mysqli_query($conn, $querya);
        break;
    case 3:
        $data = mysqli_query($conn, $queryd);
        break;
    default:
        $data = mysqli_query($conn, $queryc);
        break;


}

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

