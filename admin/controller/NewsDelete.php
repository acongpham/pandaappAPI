<?php

session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}

include("../../config/dbcon.php");
$newsId = $_GET["newsId"];
$sql = "DELETE FROM `news` WHERE newsId=$newsId";
$data = mysqli_query($conn,$sql);
header('location:news.php');

?>