<?php
include 'config/dbcon.php';
$statusId=$_POST['statusId'];
$oderId=$_POST['oderId'];
    $query="UPDATE oder SET statusId='$statusId'
WHERE oderId='$oderId'";
    $data1=mysqli_query($conn,$query);
    if ($data1){
        echo "Success";
    } else{
        echo "Fail";
    }


?>
