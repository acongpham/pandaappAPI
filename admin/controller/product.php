<?php
session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}

$key = $_GET['usename'];
include("../../config/dbcon.php");
$query = "select productId,product.name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
INNER JOIN account on shop.idShop=account.idShop
where account.usename='$key'";
$data = mysqli_query($conn, $query);
$totalAccount = mysqli_num_rows($data);
$limit = 5;
$getpage = !empty($_GET['page']) ? $_GET['page'] : 1;
$start = ($getpage - 1) * $limit;
$page = ceil($totalAccount / $limit);
$query1 = "select productId,product.name,price,product.discount,shop.shopName,shop.idShop,product.detail from product 
INNER JOIN shop on shop.idShop=product.idShop
INNER JOIN account on shop.idShop=account.idShop
where account.usename='$key' LIMIT $start,$limit";
$data1 = mysqli_query($conn, $query1);

?>


<!DOCTYPE html>
<?php
include("../module/header.php");
?>


    <section>
        <!--header start-->
        <?php
        include("../module/header-body.php");
        ?>
    </section>

    <!--header end-->
    <!--sidebar start-->
    <?php
    include("../module/sidebar.php");
    ?>

    <!--sidebar end-->
    <!--main content start-->
    <section id="container" style="width: 100%">
        <section id="main-content" style="width: 100%">
            <section class="wrapper" style="width: 85%">
                <!--nội dung chính-->

                <div class="table-agile-info" style="width: 100%">
                    <div class="panel panel-default" style="width: 100%">

                        Danh sách sản phẩm cửa hàng
                        <input width="100">
                        <button onclick="<?php echo 123; ?>">Tìm</button>
                    </div>
                    <div>
                        <table border="1" align="center" cellpadding="10" style="width:100%">
                            <thead >
                            <tr bgcolor="#ff1493" >
                                <th style="width: 5%" ><font color="white" align="right" >STT</font></th>
                                <th align="center" style="width: 5%"><font color="white">ID sản phẩm</font></th>
                                <th  style="width: 10%"><font color="white">Tên sản phẩm</font></th>
                                <th style="width: 10% " ><font color="white">Hình ảnh</font></th>
                                <th style="width: 45%"><font color="white">Mô tả</font></th>
                                <th style="width: 5%"><font color="white">Giá ()</font></th>
                                <th style="width: 5%"><font color="white">Khuyến mại(đồng)</font></th>


                                <th style="width: 5%"><font color="white">Thao tác</font></th>


                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $stt = 1;
                            while ($row = mysqli_fetch_assoc($data1)) {
                                ?>
                                <tr data-expanded="true" >
                                    <td height="100">
                                        <?php
                                        echo $stt; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['productId'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo substr($row['name'],0,100) ?>
                                    </td>
                                    <td>
                                        <?php

                                        $key2 = $row['productId'];
                                        $query2 = "SELECT image from images INNER JOIN product on product.productId=images.productId WHERE product.productId='$key2' LIMIT 1";
                                        $dataimg = mysqli_query($conn, $query2);
                                        $arrayimg = array();
                                        while ($rowimg = mysqli_fetch_assoc($dataimg)) {

                                            ?>

                                            <img border="0" alt="" src="../../<?php
                                            echo $rowimg['image']
                                            ?>" width="150"
                                            >


                                            <?php

                                        }

                                        ?>


                                    </td>
                                    <td>
                                        <?php
                                        echo substr($row['detail'],0,400); ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['price']; ?>
                                    </td>
                                    <td>
                                        <?php
                                        echo $row['discount']; ?>
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
                        <ul class="pagination">
                            <li><a href="#">&laquo;</a></li>
                            <?php for ($i = 1; $i <= $page; $i++) :
                                $active = $getpage == $i ? 'class="active"' : '';
                                ?>

                                <li <?php echo $active; ?>><a
                                            href="product.php?m=post&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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


