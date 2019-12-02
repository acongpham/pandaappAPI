
<?php
include 'config/dbcon.php';
include 'EntityClass.php';
$key = $_POST['accID'];
$query = "select *  from product INNER JOIN shop on shop.idShop=product.idShop inner join favorite on favorite.productId=product.productId where favorite.AccountId='$key'";
$data = mysqli_query($conn, $query);
$array = array();
while ($row = mysqli_fetch_assoc($data)) {
    $key2 = $row['productId'];
    $query2 = "SELECT image from images INNER JOIN product on product.productId=images.productId WHERE product.productId='$key2'";
    $dataimg = mysqli_query($conn, $query2);
    $arrayimg = array();
    while ($rowimg = mysqli_fetch_assoc($dataimg)) {

        array_push($arrayimg, $rowimg['image']);
    }
    array_push($array, new Product(
        $row['productId'],
        $row['name'],
        $row['price'],
        $row['discount'],
        $row['shopName'],
        $row['idShop'],
        $arrayimg,
        $row['detail']
    ));
}
echo json_encode($array);

?>

