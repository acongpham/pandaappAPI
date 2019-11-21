<?php
session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}

include("../../config/dbcon.php");
$query = "SELECT * FROM category";
$data = mysqli_query($conn, $query);


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
        <section class="wrapper">
            <!--nội dung chính-->

            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Danh mục sản phẩm
                    </div>
                    <div align="center">
                        <table  border="1" >

                            <tr align="center">
                                <th width="100" bgcolor="#ff56de" align="center" ><font color="white">Số thứ tự</font></th>
                                <th width="150"
                                    bgcolor="ff56de"><font color="white">idcategory</font></th>
                                <th width="300" bgcolor="ff56de"><font color="white">Tên danh mục</font></th>
                                <th width="200" bgcolor="ff56de" align="center"><font color="white">Ảnh mô tả</font></th>
                                <th bgcolor="ff56de" width="100"></th>


                            </tr>
                            </thead>
                            <tbody align="center">
                            <?php
                            $stt = 1;
                            while ($row = mysqli_fetch_assoc($data)) {
                                ?>
                                <tr data-expanded="true">
                                    <td>
                                        <?php
                                        echo $stt; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['idcategory']; ?>
                                    </td>
                                    <td>
                                        <?php


                                        echo $row['categoryName'];

                                        ?>
                                    </td>
                                    <td>


                                        <img alt="1fd" src="<?php
                                        echo "../../" . $row['thumbnailCate'] ?>" width="100" height="100">
                                    </td>

                                    <td>

                                        <a href="del_account.php">
                                            <img border="0" alt="" src="../../image/image/del.png" width="20"
                                                 height="20">
                                        </a>
                                        <a href="edit_account.php">
                                            <img border="0" alt="" src="../../image/image/edit.png" width="20"
                                                 height="20">
                                        </a>

                                    </td>
                                </tr>
                                <?php
                                $stt++;
                            }
                            ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!--            End nội dung chính-->

        </section>
        <?php
        include("../module/footer.php");
        ?>
    </section>
    <!--main content end-->
</section>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
<!-- morris JavaScript -->
<script>
    $(document).ready(function () {
        //BOX BUTTON SHOW AND CLOSE
        jQuery('.small-graph-box').hover(function () {
            jQuery(this).find('.box-button').fadeIn('fast');
        }, function () {
            jQuery(this).find('.box-button').fadeOut('fast');
        });
        jQuery('.small-graph-box .box-close').click(function () {
            jQuery(this).closest('.small-graph-box').fadeOut(200);
            return false;
        });

        //CHARTS
        function gd(year, day, month) {
            return new Date(year, month - 1, day).getTime();
        }

        graphArea2 = Morris.Area({
            element: 'hero-area',
            padding: 10,
            behaveLikeLine: true,
            gridEnabled: false,
            gridLineColor: '#dddddd',
            axes: true,
            resize: true,
            smooth: true,
            pointSize: 0,
            lineWidth: 0,
            fillOpacity: 0.85,
            data: [
                {period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
                {period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
                {period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
                {period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
                {period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
                {period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
                {period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
                {period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
                {period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},

            ],
            lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
            xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });


    });
</script>
<!-- calendar -->
<script type="text/javascript" src="js/monthly.js"></script>
<script type="text/javascript">
    $(window).load(function () {

        $('#mycalendar').monthly({
            mode: 'event',

        });

        $('#mycalendar2').monthly({
            mode: 'picker',
            target: '#mytarget',
            setWidth: '250px',
            startHidden: true,
            showTrigger: '#mytarget',
            stylePast: true,
            disablePast: true
        });

        switch (window.location.protocol) {
            case 'http:':
            case 'https:':
                // running on a server, should be good.
                break;
            case 'file:':
                alert('Just a heads-up, events will not work when run locally.');
        }

    });
</script>
<!-- //calendar -->
</body>
</html>
