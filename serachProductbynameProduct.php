<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$keysearch='quan'; // set cứng, khi code thì truyền biến
$query="select product.productId,product.name,product.price,product.discount,shop.shopName,product.idShop from Product inner join Shop on Product.idShop=Shop.idShop inner join account on shop.idShop=account.idShop WHERE account.accountStatus=1 AND product.name like'%".$keysearch."%'";
$data= mysqli_query($conn, $query);
$array=array();
while ($row=mysqli_fetch_assoc($data)) {
    array_push($array, new Product(
        $row['productId'],
        $row['name'],
        $row['price'],
        $row['discount'],
        $row['shopName'],
        $row['idShop']
    ));
}
echo json_encode($array);



?>

