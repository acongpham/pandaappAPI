<?php
include 'config/dbcon.php';
include 'EntityClass.php';

date_default_timezone_set('UTC');
$idShop = $_POST['idShop'];
$date = $_POST['fromdate'];
$end_date = $_POST['todate'];
$array=array();
while (strtotime($date) <= strtotime($end_date)) {

    $query = "SELECT  date_created,SUM(oder.totalPrice) AS total FROM oder
            INNER JOIN oder_item ON oder.oderId=oder_item.oderId
            INNER JOIN product ON oder_item.productId=product.productId
            INNER JOIN shop ON product.idShop=shop.idShop WHERE shop.idShop=$idShop AND oder.statusId=3 AND date_created LIKE '%$date%'";
    $data = mysqli_query($conn, $query);

    if ($data){
        $row=mysqli_fetch_assoc($data);
        if ($row["total"]=="" or  $row==null){

            array_push($array,new Revenue( $date,0));
        } else{
            array_push($array,new Revenue($date,$row["total"]));

        }
    }
    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));

}
echo json_encode($array);
?>