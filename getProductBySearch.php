<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$key = $_POST['key'];
$sortID = $_POST['sort'];
$key1 = $_POST['offset'];
//$key = 'ao';
$querya = "select productId,product.name,price,product.discount,shop.shopName,shop.idShop,product.detail from product inner join shop on product.idShop=shop.idShop 
inner join account on shop.idShop=account.idShop 
WHERE account.accountStatus=1 AND product.name like'%$key%' OR shop.shopName like '%$key%' ORDER BY product.productId DESC LIMIT 15 OFFSET $key1";
$queryb = "select productId,product.name,price,product.discount,shop.shopName,shop.idShop,product.detail from product inner join shop on product.idShop=shop.idShop 
inner join account on shop.idShop=account.idShop 
WHERE account.accountStatus=1 AND product.name like'%$key%' OR shop.shopName like '%$key%' ORDER BY product.price DESC LIMIT 15 OFFSET $key1";
$queryc = "select productId,product.name,price,product.discount,shop.shopName,shop.idShop,product.detail from product inner join shop on product.idShop=shop.idShop 
inner join account on shop.idShop=account.idShop 
WHERE account.accountStatus=1 AND product.name like'%$key%' OR shop.shopName like '%$key%' ORDER BY product.price ASC  LIMIT 15 OFFSET $key1";
$queryd = "select product.productId,product.name,price,product.discount,shop.shopName,shop.idShop,product.detail from product inner join shop on product.idShop=shop.idShop 
inner join account on shop.idShop=account.idShop
INNER JOIN oder_item ON product.productId=oder_item.productId
WHERE account.accountStatus=1 AND product.name like'%$key%' OR shop.shopName like '%$key%' ORDER BY oder_item.amount ASC  LIMIT 15 OFFSET $key1";

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
