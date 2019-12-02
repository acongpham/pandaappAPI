<?php
include 'config/dbcon.php';
$accountID=9; // set cứng, khi code thì truyền biến
$query="select oder.oderId,product.name,oder_item.amount, shop.shopName,statusId,date_created, totalPrice from oder inner join oder_Item on oder.oderId = oder_Item.oderId
					inner join product on  oder_Item.productId=product.productId
                    INNER JOIN shop on shop.idShop=product.idShop
					where oder.AccountId='".$accountID."'";
;
$data= mysqli_query($conn, $query);
$array=array();
while ($row=mysqli_fetch_assoc($data)) {
    array_push($array, new OrderCustomer(
        $row['oderId'],
        $row['name'],
        $row['amount'],
        $row['shopName'],
        $row['statusId'],
        $row['date_created'],
        $row['totalPrice']
    ));
}
echo json_encode($array);
class OrderCustomer
{

    function OrderCustomer($oderId,$name,$amount,$shopName,$statusId,$date_created,$totalPrice)
    {
        $this->oderId=$oderId;
        $this->name=$name;
        $this->amount=$amount;
        $this->shopName=$shopName;
        $this->statusId=$statusId;
        $this->date_created=$date_created;
        $this->totalPrice=$totalPrice;

    }
}

?>

