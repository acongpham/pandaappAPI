<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$file_path = "image/ImageProduct/";
$file_path = $file_path . basename($_FILES['upload_file']['name']);
if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $file_path)) {
    $linkimage = $_FILES['upload_file']['name'];
    echo $linkimage;

} else {
    echo "Add Image Error";

}

?>
