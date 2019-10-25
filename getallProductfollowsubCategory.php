<?php
include 'config/dbcon.php';
include 'EntityClass.php';



$key=$_POST['id_subcate'];
 $query="select productId,name,price,product.discount,shop.shopName,shop.idShop from Product 
INNER JOIN shop on shop.idShop=product.idShop
where id_subcate='$key'";
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

