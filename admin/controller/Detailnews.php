<?php
session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}
$newsId=$_GET['newsId'];
include("../../config/dbcon.php");
$query = "SELECT * FROM news WHERE newsId=$newsId";

$data= mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<?php
include("../module/header.php");
?>

<body>
<section id="container">
    <!--header start-->
    <?php
    include("../module/header-body.php");
    ?>
    <!--header end-->
    <!--sidebar start-->
    <?php
    include("../module/sidebar.php");
    ?>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
    
        <section class="wrapper " style="width: 90%; ">
            <!--nội dung chính-->
            <a href="NewsInsert.php" class="btn btn-success"> Thêm tin tức</a>
            <div class="table-agile-info">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh sách tin tức
                    </div>
                    <div >

                            <?php
                            while ($row = mysqli_fetch_assoc($data)) {

                                        echo $row['detailNews'] ;



                            }
                            ?>



                    </div>
                </div>
            </div>


            <!--            End nội dung chính-->

        </section>


    </section>

    <!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text