<?php
session_start();

if (!isset($_SESSION['admin_login'])) {
    header('location:login.php');

}

include("../../config/dbcon.php");



if(isset($_POST['uploadnews']))
{
    if (isset($_FILES['avatar']))
    {
        // Nếu file upload không bị lỗi,
        // Tức là thuộc tính error > 0
        if ($_FILES['avatar']['error'] > 0)
        {
            echo 'File Upload Bị Lỗi';
        }
        else{
            // Upload file
            $file_path = "image/news/";
            move_uploaded_file($_FILES['avatar']['tmp_name'], '../../image/news/'.$_FILES['avatar']['name']);
            $file_path = $file_path.basename($_FILES['avatar']['name']);
            
        }
    }
    else{
        echo 'Bạn chưa chọn file upload';
    }

    $titleNews = $_POST['titleNews'] ;
    $detailNews = $_POST['detailNews'];
    $query = "INSERT INTO `news`(`newstitle`, `detailNews`, `imageNews`, `dateCreated`) VALUES ('$titleNews','$detailNews','$file_path',NOW())";
    $data = mysqli_query($conn,$query);
}else{
    echo 'loi';
}



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
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Thêm tin tức</div>
                    <div class="panel-body">
                        <form action="newsinsert.php" enctype="multipart/form-data" method="post">


                            <div class="form-group">
                                <label>Tiêu đề tin tức:</label>
                                <input type="text" class="form-control" name="titleNews" value="">
                            </div>
                            <div class="form-group">
                                <label>Ảnh tiêu đề: </label>
                               
                            <input type="file" class="form-control" name="avatar"  >
                            </div>
                            <script src="../ckeditor/ckeditor.js" type="text/javascript"></script>
                            <div class="form-group">
                                <label>Nội dung tin tức</label>
                                <textarea id="editor1" name="detailNews" class="ckeditor"></textarea>
                                <script>
                                    CKEDITOR.replace( 'editor1' );
                                </script>
                            </div>

                            <button type="submit" class="btn btn-default" name="uploadnews">Thêm</button>


                        </form>
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

