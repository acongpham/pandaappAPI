<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$key = $_POST['oderId'];


//$key = 89;

$query = "SELECT product.productId,product.name,images.image,oder_item.amount,product.price,oder_item.total,product.discount from oder_item
INNER JOIN product on oder_item.productId=product.productId 
INNER JOIN images on oder_item.productId=images.productId
WHERE oder_item.oderId=$key";
$data = mysqli_query($conn, $query);
$array = array();

    while ($rowitem = mysqli_fetch_assoc($data)) {

        array_push($array, new Order_itemDetail(
            $rowitem['productId'],
            $rowitem['name'],
            $rowitem['image'],
            $rowitem['amount'],
            $rowitem['price'],
            $rowitem['total'],
            $rowitem['discount']
        ));


}
echo json_encode($array);

?>

