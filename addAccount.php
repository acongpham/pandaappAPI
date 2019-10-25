<?php
include 'config/dbcon.php';
include 'EntityClass.php';
//$shopName='432';
$txtusername = $_POST['txtusername'];
$querycheckexistaccount = "select * from account where account.usename='$txtusername'";
$result = mysqli_query($conn, $querycheckexistaccount);
$row = mysqli_num_rows($result);
if ($row === 0) {
    $shopName = $_POST['shopName'];// set cứng, khi code thì truyền biến
    $queryaddshop = "INSERT INTO shop (shopName) VALUES ('$shopName')";
    if ($conn->query($queryaddshop) === TRUE) {
        $last_id = $conn->insert_id;

    } else {
        $last_id = 0;
    }
    $idrole = $_POST['idrole'];
    $idShop = $last_id;
    $txtusername = $_POST['txtusername'];
    $txtpassword = $_POST['txtpassword'];
    $txtnamefull = $_POST['txtnamefull'];
    $txtphone = $_POST['txtphone'];
    $txtaddress = $_POST['txtaddress'];
    $gioitinh = $_POST['gender'];
    $txtemail = $_POST['txtemail'];
    $txtdateofbirth = $_POST['DateOfBirth'];
    $queryaddaccount = "INSERT INTO account (roleId,idShop,usename,password,name,phone_number,address,gender,email,DateOfBirth,accountStatus) VALUES ('$idrole','$idShop','$txtusername','$txtpassword','$txtnamefull','$txtphone','$txtaddress',$gioitinh,'$txtemail','$txtdateofbirth',1)";
    if ($conn->query($queryaddaccount) === TRUE) {
        $last_id_account = $conn->insert_id;

    } else {
        $last_id_account = 0;
    }
    echo $last_id_account;
} else {
    echo "xxx001"; //mã lỗi tài khoản tồn tại

}

?>


