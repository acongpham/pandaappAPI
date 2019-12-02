<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$key = $_POST['AccountId'];
$statusId = $_POST['statusId'];


$query = "SELECT oder.oderId,oder.date_created,oder.totalPrice,oder.name,oder.address,oder.phone_number,shop.shopName,shop.idShop 
		from oder INNER JOIN oder_item on oder_item.oderId=oder.oderId
		 INNER JOIN product ON product.productId=oder_item.productId 
		 INNER JOIN shop ON shop.idShop=product.idShop 
 		WHERE oder.AccountId='$key' AND oder.statusId='$statusId'
 		 GROUP BY oder.oderId,oder.date_created,oder.totalPrice,oder.name,oder.address,oder.phone_number";
$data = mysqli_query($conn, $query);
$array = array();
while ($row = mysqli_fetch_assoc($data)) {
    $key2 = $row['oderId'];
    $query2 = "SELECT * from oder_item WHERE oderId='$key2'";
    $data2 = mysqli_query($conn, $query2);
    $array2 = array();
    while ($rowitem = mysqli_fetch_assoc($data2)) {

        array_push($array2, new Order_item(
            $rowitem['productId'],
            $rowitem['amount'],
            $rowitem['total']
        ));
    }
    array_push($array, new OrderCustomer(
        $row['oderId'],
        $row['idShop'],
        $row['shopName'],
        $row['date_created'],
        $row['totalPrice'],
        $row['name'],
        $row['address'],
        $row['phone_number'],
        $array2

    ));
}
echo json_encode($array);

?>

