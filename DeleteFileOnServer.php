<?php
include 'config/dbcon.php';
$File=$_POST['pathFile'];

$query="DELETE FROM images WHERE image='$File'";

if ($data = mysqli_query($conn, $query)){
    if(unlink($File)) {

        echo "Deleted";
    }
}



?>