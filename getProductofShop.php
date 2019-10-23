<?php
include 'config/dbcon.php';
$idShop='1'; // set cứng, khi code thì truyền biến
 $query="SELECT product.productId,product.name,product.price,product.detail,product.discount FROM `product` WHERE idShop=".$idShop;
 $data= mysqli_query($conn, $query);
 $array=array(); 
while ($row=mysqli_fetch_assoc($data)) {
	array_push($array, new Order(
		$row['productId'],	
                $row['name'],	
                $row['price'],	
                $row['detail'],	
                $row['discount']	
                ));
}
echo json_encode($array);
class Order 
{
	
	function Order($productId,$name,$price,$detail,$discount)
	{
		$this->productId=$productId;
		$this->name=$name;
                $this->$price=$price;
                $this->$detail=$detail;
                $this->discount=$discount;
                
	}
}
 
?>

<!--//Cần lấy thông tin sản phẩm bao gồm: idproduct, tên sản phẩm, giá sản phẩm, mô tả sản phẩm, ảnh sản phẩm-->

