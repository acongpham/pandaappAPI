<?php
 class Product 
{
	
	function Product($productId,$name,$price,$discount,$shopName,$idShop)
	{
		$this->productId=$productId;
		$this->name=$name;
		$this->price=$price;
		$this->discount=$discount;
		$this->shopName=$shopName;
		$this->idShop=$idShop;
                
	}
}

?>
