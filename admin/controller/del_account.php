<?php
include("../../config/dbcon.php");
$accountID=$_GET['AccountId'];
$query = "UPDATE `account` SET `accountStatus`=0 WHERE AccountId=$accountID";
if ($data = mysqli_query($conn, $query)) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {

}
?>
