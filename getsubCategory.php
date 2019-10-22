<?php
include 'config/dbcon.php';
$idCategory='1'; // set cứng, khi code thì truyền biến
 $query='SELECT * FROM `sub_category` WHERE cateId='.$idCategory;
 $data= mysqli_query($conn, $query);
 $arrSub_Category=array(); 
while ($row=mysqli_fetch_assoc($data)) {
	array_push($arrSub_Category, new SubCategory(
		$row['id_subcate'],	
                $row['cateId'],	
		$row['subCateName']));
}
     echo json_encode($arrSub_Category);
 class SubCategory 
{
	
	function SubCategory($id_subcate,$cateId,$subCateName)
	{
		$this->id_subcate=$id_subcate;
		$this->cateId=$cateId;
                $this->subCateName=$subCateName;
	}
}
?>