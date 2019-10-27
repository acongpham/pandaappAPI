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
class Shop
{

	function Shop($idShop,$shopName)
	{
		$this->idShop=$idShop;
		$this->shopName=$shopName;
			}
}
class Account
{

	function Account($roleId, $idShop, $usename, $password, $name, $phone_number, $address, $gender, $email, $DateOfBirth, $accountStatus)
	{
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

?>
