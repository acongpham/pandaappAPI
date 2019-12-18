<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$key1=$_POST['idShop'];


$query = "SELECT * FROM shop WHERE idShop=$key1";
$data = mysqli_query($conn, $query);
$array = array();
while ($row = mysqli_fetch_assoc($data)) {
    array_push($array, new Shop(

        $row['idShop'],
        $row['shopName'],
        $row['introduce'],
        $row['address'],
        $row['phone'],
        $row['email']
    ));
}
echo json_encode($array);

?>



