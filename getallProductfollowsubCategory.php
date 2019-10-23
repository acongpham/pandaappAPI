<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$id_subcate='9'; // set cứng, khi code thì truyền biến
 $query='select productId,name,price,product.discount,shop.shopName,shop.idShop from Product 
INNER JOIN shop on shop.idShop=product.idShop
where id_subcate='.$id_subcate;
 $data= mysqli_query($conn, $query);
 $array=array(); 
while ($row=mysqli_fetch_assoc($data)) {
	array_push($array, new Product(
		$row['productId'],	
                $row['name'],	
                $row['price'],	
		$row['discount'],
		$row['shopName'],
		$row['idShop']		
		));
}
     echo json_encode($array);
 
?>

<!--Lấy danh sách sản phẩm theo subcategory-->