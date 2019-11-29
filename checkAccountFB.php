<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$useraccount = $_POST['usernameaccount'];




$query = "SELECT * FROM account WHERE usename='$useraccount' AND accountStatus=1";
$data = mysqli_query($conn, $query);
$arrAccount = array();
while ($row = mysqli_fetch_assoc($data)) {
    array_push($arrAccount, new Account(
        $row['AccountId'],
        $row['roleId'],
        $row['idShop'],
        $row['usename'],
        $row['password'],
        $row['name'],
        $row['phone_number'],
        $row['address'],
        $row['gender'],
        $row['email'],
        $row['DateOfBirth'],
        $row['accountStatus']
    ));
}
echo json_encode($arrAccount);


?>


