<?php
include 'config/dbcon.php';
 $query='SELECT * FROM category';
 $data= mysqli_query($conn, $query);
 $arrCategory=array();
while ($row=mysqli_fetch_assoc($data)) {
	array_push($arrCategory, new Category(
		$row['idcategory'],
		$row['categoryName'],
        $row['thumbnailCate']
    ));
}
     echo json_encode($arrCategory);
 class Category 
{
	
	function Category($idcategory,$categoryName,$thumbnailCate)
	{
		$this->idcategory=$idcategory;
		$this->categoryName=$categoryName;
		$this->thumbnailCate=$thumbnailCate;
	}
}
?>