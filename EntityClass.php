<?php
 class Product 
{
 var $images=Array();
	function Product($productId,$name,$price,$discount,$shopName,$idShop,$images,$detail)
	{
		$this->productId=$productId;
		$this->name=$name;
		$this->price=$price;
		$this->discount=$discount;
		$this->shopName=$shopName;
		$this->idShop=$idShop;
		$this->images=$images;
		$this->detail=$detail;

                
	}
}

class OrderShop

{

	function OrderShop($oderId, $AccountId, $date_created, $totalPrice,$totaldiscount, $name, $address, $phone_number, $orderitem,$statusId)
	{
		$this->oderId=$oderId;
		$this->AccountId=$AccountId;
		$this->date_created=$date_created;
		$this->totalPrice=$totalPrice;
		$this->totaldiscount=$totaldiscount;
		$this->name=$name;
		$this->address=$address;
		$this->phone_number=$phone_number;
		$this->orderitem=$orderitem;
		$this->statusId=$statusId;

	}
}
class OrderCustomer

{

	function OrderCustomer($oderId,$idShop, $shopName, $date_created, $totalPrice, $totaldiscount,$name, $address, $phone_number, $orderitem,$statusId)
	{

		$this->oderId=$oderId;
		$this->idShop=$idShop;
		$this->shopName=$shopName;
		$this->date_created=$date_created;
		$this->totalPrice=$totalPrice;
		$this->totaldiscount=$totaldiscount;
		$this->name=$name;
		$this->address=$address;
		$this->phone_number=$phone_number;
		$this->orderitem=$orderitem;
		$this->statusId=$statusId;
	}
}
class Order_item

{

	function Order_item($productId,$amount,$total)
	{
		$this->productId=$productId;
		$this->amount=$amount;
		$this->total=$total;

	}
}
class Order_itemDetail



{

	function Order_itemDetail($productId,$name,$image,$amount,$price,$total,$discount)
	{
		$this->productId=$productId;
		$this->name=$name;
		$this->image=$image;
		$this->amount=$amount;
		$this->price=$price;
		$this->total=$total;
		$this->discount=$discount;

	}
}
class Account
{

	function Account($AccountId,$roleId, $idShop, $usename, $password, $name, $phone_number, $address, $gender, $email, $DateOfBirth, $accountStatus)
	{
		$this->AccountId=$AccountId;
		$this->roleId = $roleId;
		$this->idShop = $idShop;
		$this->usename = $usename;
		$this->password = $password;
		$this->name = $name;
		$this->phone_number = $phone_number;
		$this->address = $address;
		$this->gender = $gender;
		$this->email = $email;
		$this->DateOfBirth = $DateOfBirth;
		$this->accountStatus = $accountStatus;

	}
}
class News

{

	function News($newsId,$newstitle,$detailNews,$imageNews,$dateCreated)
	{
		$this->newsId=$newsId;
		$this->newstitle=$newstitle;
		$this->detailNews=$detailNews;
		$this->imageNews=$imageNews;
		$this->dateCreated=$dateCreated;

	}
}

class Shop

{

	function Shop($idShop,$shopName,$introduce,$address,$phone,$email)
	{
		$this->idShop=$idShop;
		$this->shopName=$shopName;
		$this->introduce=$introduce;
		$this->address=$address;
		$this->phone=$phone;
		$this->email=$email;

	}
}
class Revenue

{

	function Revenue($date_created,$revenue)
	{
		$this->date_created=$date_created;
		$this->revenue=$revenue;


	}
}

?>
