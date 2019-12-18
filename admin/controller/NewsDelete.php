<?php

session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}

include("../../config/dbcon.php");


?>