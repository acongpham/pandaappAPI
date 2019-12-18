<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$key = $_POST['idShop'];
$statusId = $_POST['statusId'];

//$key = 1;
//$statusId = 1;
$query = "SELECT oder.oderId,oder.AccountId,oder.date_created,oder.totalPrice,SUM(product.discount) AS totaldiscount,oder.name,oder.address,oder.phone_number
             from oder INNER JOIN oder_item ON oder.oderId=oder_item.oderId INNER JOIN product ON oder_item.productId=product.productId 
            INNER JOIN shop ON shop.idShop=product.idShop WHERE shop.idShop='$key' AND oder.statusId='$statusId' 
            GROUP BY oder.oderId,oder.AccountId,oder.date_created,oder.totalPrice,oder.name,oder.address,oder.phone_number";
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
    array_push($array, new OrderShop(
        $row['oderId'],
        $row['AccountId'],
        $row['date_created'],
        $row['totalPrice'],
        $row['totaldiscount'],
        $row['name'],
        $row['address'],
        $row['phone_number'],
        $array2,
        $statusId


    ));
}
echo json_encode($array);

?>

