<?php
session_start();

include '../../config/dbcon.php';
if (!empty($_POST['useName']) && !empty($_POST['password'])) {
    $usname = $_POST['useName'];
    $password = MD5($_POST['password']);

    $query = "SELECT * FROM admin WHERE  useName='$usname' && password='$password'";
    $data = mysqli_query($conn, $query);
    if (mysqli_num_rows($data) == 1) {
        $acc = mysqli_fetch_assoc($data);
        $_SESSION['admin_login'] = $acc;

        header('location: index.php');

    } else {

    }

}


?>

<!DOCTYPE html>
<head>
    <title>Panda - Quản trị</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href="css/style-responsive.css" rel="stylesheet"/>
    <!-- font CSS -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="css/font.css" type="text/css"/>
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <script src="js/jquery2.0.3.min.js"></script>
    <link rel="icon" href="../../image/image/logo.png">
</head>
<body>
<div class="log-w3">
    <div class="w3layouts-main">
        <h2>ĐĂNG NHẬP TRANG QUẢN TRỊ</h2>
        <form action="#" method="post">
            <input type="" class="ggg" name="useName" placeholder="Tên đăng nhập" required="">
            <input type="password" class="ggg" name="password" placeholder="Mật khẩu" required="">

            <div class="clearfix"></div>
            <input type="submit" value="Đăng nhập" name="login">
        </form>

    </div>
</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>



