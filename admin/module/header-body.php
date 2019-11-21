<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">
        <a href="index.php" class="logo">
            PANDA
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">


    </div>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <li>

                <form action="search.php">
                    <input type="text" class="form-control search" placeholder=" Search">
                </form>
            </li>
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="../../image/image/logo.png">
                    <span class="username"><?php

                        $name = "admin";
                        if (isset($_SESSION['admin_login'])) {
                            $name = $_SESSION['admin_login']['useName'];
                            echo $name;

                        }
                        ?></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">

                    <li><a href="logout.php"><i class="fa fa-key"></i> Đăng xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>