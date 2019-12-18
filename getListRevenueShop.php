<?php
include 'config/dbcon.php';
include 'EntityClass.php';

date_default_timezone_set('UTC');
$idShop = $_POST['idShop'];
$date = $_POST['fromdate'];
$end_date = $_POST['todate'];

//$idShop = 142;
//$date = "2019-11-01";
//$end_date = "2019-12-30";
$array=array();
while (strtotime($date) <= strtotime($end_date)) {

    $query = "SELECT  SUM(oder.totalPrice) AS revenue FROM oder
            INNER JOIN oder_item ON oder.oderId=oder_item.oderId
            INNER JOIN product ON oder_item.productId=product.productId
            INNER JOIN shop ON product.idShop=shop.idShop WHERE shop.idShop=$idShop AND oder.statusId=3 AND date_created LIKE '%$date%'";
    $data = mysqli_query($conn, $query);

    if ($data){
        $row=mysqli_fetch_assoc($data);
        if ($row["revenue"]=="" or  $row==null){

            array_push($array,new Revenue( $date,0));
        } else{
            array_push($array,new Revenue($date,$row["revenue"]));

        }
    }
    $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));

}
echo json_encode($array);
?>