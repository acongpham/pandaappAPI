<?php
include 'config/dbcon.php';
 $query='SELECT * FROM category';
 $data= mysqli_query($conn, $query);
 $arrCategory=array();
while ($row=mysqli_fetch_assoc($data)) {
	array_push($arrCategory, new Category(
		$row['cateId'],		
		$row['categoryName']));
}
     echo json_encode($arrCategory);
 class Category 
{
	
	function Category($cateId,$categoryName)
	{
		$this->cateId=$cateId;
		$this->categoryName=$categoryName;		
	}
}
?>