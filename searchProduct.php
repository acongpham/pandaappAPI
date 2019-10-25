<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$keysearch='ao'; // set cứng, khi code thì truyền biến
$query="select product.productId,product.name,product.price,product.discount,shop.shopName,product.idShop from Product inner join Shop on Product.idShop=Shop.idShop 
        inner join account on shop.idShop=account.idShop 
        INNER JOIN sub_category ON product.id_subcate=sub_category.id_subcate 
        INNER JOIN category on category.cateId=sub_category.cateId WHERE account.accountStatus=1 AND category.categoryName LIKE '%".$keysearch."%' OR shop.shopName LIKE '%".$keysearch."%'  OR product.name LIKE '%".$keysearch."%' OR sub_category.subCateName LIKE '%".$keysearch."%'";
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

