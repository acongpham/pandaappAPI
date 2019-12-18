<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$AccountId = $_POST['AccountId'];
$password = MD5($_POST['oldPass']);
$newPass = MD5($_POST['NewsPass']);
//$AccountId = 197;
//$password = "e10adc3949ba59abbe56e057f20f883e";
//$newPass = "e10adc3949ba59abbe56e057f20f883f";

$query1 = "select * from account where account.AccountId='$AccountId' && account.password='$password' ";
$result = mysqli_query($conn, $query1);
$row = mysqli_num_rows($result);
if ($row === 0) {
    echo "0000";
} else{
    $query2 = "UPDATE account SET account.password='$newPass' WHERE AccountId='$AccountId'";
    if ($data1 = mysqli_query($conn, $query2)) {

        echo "1xx1";

    } else {
        echo "0xx0";
    }

}






?>


