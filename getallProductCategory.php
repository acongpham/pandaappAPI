<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$key = $_POST['idcategory'];
$key1 = $_POST['offset'];
$sortID = $_POST['sort'];


$querya = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where idcategory='$key' ORDER BY product.productId DESC  LIMIT 15 OFFSET $key1";
$queryb = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where idcategory='$key' ORDER BY product.price DESC  LIMIT 15 OFFSET $key1";
$queryc = "select productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
where idcategory='$key' ORDER BY product.price ASC  LIMIT 15 OFFSET $key1";
$queryd = "select product.productId,name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
INNER JOIN oder_item ON product.productId=oder_item.productId
where idcategory='$key' ORDER BY product.price ASC  LIMIT 15 OFFSET $key1";

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

