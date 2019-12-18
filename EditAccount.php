<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$AccountId = $_POST['AccountId'];
$txtnamefull = $_POST['txtnamefull'];
$txtphone = $_POST['txtphone'];
$txtaddress = $_POST['txtaddress'];
$gioitinh = $_POST['gender'];
$txtemail = $_POST['txtemail'];
$txtdateofbirth = $_POST['DateOfBirth'];

$query = "UPDATE account SET account.name='$txtnamefull'
            ,account.phone_number='$txtphone',account.address='$txtaddress',account.gender='$gioitinh'
            ,account.email='$txtemail',account.DateOfBirth='$txtdateofbirth' WHERE AccountId='$AccountId'";

if ($data1 = mysqli_query($conn, $query)) {

    echo "1xx1";

} else {
    echo "0xx0";
}


?>


