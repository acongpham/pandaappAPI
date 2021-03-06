<?php
session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}

include("../../config/dbcon.php");
$query = "SELECT * FROM news";
$data = mysqli_query($conn, $query);
$totalNews = mysqli_num_rows($data);
$limit = 10;
$getpage=!empty($_GET['page'])? $_GET['page']:1;
$start = ($getpage-1)*$limit;
$page = ceil($totalNews / $limit);
$query1 = "SELECT * FROM news LIMIT $start,$limit";
$data1 = mysqli_query($conn, $query1);
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
                        <table class="table-bordered table-hover" align="center">
                            <thead>
                            <tr>
                                <th align="center" style="width: 10%">ID</th>
                                <th  >Tiêu đề</th>

                                <th >Ảnh</th>
                                <th style="width: 10%">Ngày tạo</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($data1)) {
                                ?>
                                <tr data-expanded="true">
                                    <td>
                                        <?php
                                        echo $row['newsId'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['newstitle'] ;

                                         ?>
                                    </td>

                                    <td>
                                       <img src="<?php
                                        echo '../../'.$row['imageNews'] ?>" height="300px" width="300px" />
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['dateCreated'] ?>
                                    </td>

                                    <td>

                                        <a href="NewsDelete.php?newsId=<?php echo $row['newsId'] ?>" onclick="return confirm('Chắc chắn xóa tài khoản <?php
                                        echo $row['usename'];
                                        ?>?')">
                                            <img border="0" alt="" src="../../image/image/del.png" width="20"
                                                 height="20">
                                        </a>
                                        <a href="NewsEdit.php?newsId=<?php echo $row['newsId'] ?>">
                                            <img border="0" alt="" src="../../image/image/edit.png" width="20"
                                                 height="20">
                                        </a>
                                        <a href="Detailnews.php?m=post&newsId=<?php echo $row['newsId'] ?>">
                                            <img border="0" alt="" src="../../image/image/show.png" width="20"
                                                 height="20">
                                        </a>

                                    </td>
                                </tr>
                                <?php
                            }
                            ?>


                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li><a href="#">&laquo;</a></li>
                            <?php for ($i=1;$i<=$page;$i++) :
                                $active=$getpage==$i? 'class="active"': '';
                                ?>

                                <li <?php echo  $active;?>><a href="news.php?m=post&page=<?php echo $i;?>"><?php echo $i;?></a></li>
                            <?php endfor; ?>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
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