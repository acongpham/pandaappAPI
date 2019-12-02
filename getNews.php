<?php
include 'config/dbcon.php';
include 'EntityClass.php';

$key1=$_POST['offset'];

$query = "SELECT * FROM `news`LIMIT 15 OFFSET $key1";
$data = mysqli_query($conn, $query);
$array = array();
while ($row = mysqli_fetch_assoc($data)) {
        array_push($array, new News(
        $row['newsId'],
        $row['newstitle'],
        $row['detailNews'],
        $row['imageNews'],
        $row['dateCreated']

    ));
}
echo json_encode($array);

?>



