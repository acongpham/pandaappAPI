<?php
include "config/dbcon.php";

$AccountId= $_POST["AccountId"];
$totalPrice =$_POST["totalPrice"];
$name=$_POST["name"];
$address=$_POST["address"];
$phone_number=$_POST["phone_number"];
//$AccountId= 142;
//$totalPrice =1000;
//$name="Nguyer Tu2";
//$address="LA hieen";
//$phone_number="01234566";

$sql ="INSERT INTO oder VALUES (null,$AccountId,1,now(),$totalPrice,'$name','$address','$phone_number')" ;
 $data =mysqli_query($conn,$sql);
 if($data)
 {
     $last_id1 = $conn->insert_id;
     echo $last_id1;
     
 }else{
     echo 'Dat that bai';
 }

?>
