<?php
include 'config/dbcon.php';
$idShop='1'; // set cứng, khi code thì truyền biến
 $query="select * from Oder inner join Oder_Item on Oder.oderId = Oder_Item.oderId
					inner join Product on Oder_Item.productId=Product.productId
					where Product.idShop=".$idShop;
 $data= mysqli_query($conn, $query);
 $array=array(); 
while ($row=mysqli_fetch_assoc($data)) {
	array_push($array, new Order(
		$row['oderId'],	
                $row['AccountId'],	
                $row['statusId'],	
                $row['date_created'],	
                $row['totalPrice'],	
                $row['name'],	
                $row['address'],                
		$row['phone_number']));
}
echo json_encode($array);
class Order 
{
	
	function Order($oderId,$AccountId,$statusId,$date_created,$totalPrice,$name,$address,$phone_number)
	{
		$this->oderId=$oderId;
		$this->AccountId=$AccountId;
                $this->statusId=$statusId;
                $this->date_created=$date_created;
                $this->totalPrice=$totalPrice;
                $this->name=$name;
                $this->address=$address;
                $this->phone_number=$phone_number;
	}
}
 
?>

