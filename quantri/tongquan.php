<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {

    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <script src="https://kit.fontawesome.com/502650a7cc.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../asset/main.css">
</head>

<body>
    <?php
    include('../ketnoi.php');
    $sql_count_custom = "select count(*) from khach_hang where 1=1";
    $result_count_custom = $connect->query($sql_count_custom);
    $rowCountCustom = $result_count_custom->fetch_array();

    $sql_count_product = "select count(*) from sanpham where TRANGTHAI = 1";
    $result_count_product = $connect->query($sql_count_product);
    $rowCountProduct = $result_count_product->fetch_array();

    $sql_count_sold_out = "select count(*) from sanpham where TRANGTHAI = 0";
    $result_count_sold_out = $connect->query($sql_count_sold_out);
    $rowCountSoldOut = $result_count_sold_out->fetch_array();
    ?>
    <header class="app-header">
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li>
                <a class="app-nav__item" href="logout.php"><i class="fa-solid fa-right-from-bracket sign-out"></i></a>

            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../asset/image/anhcv1.jpg" width="50px" alt="User Image">
            <div>
                <p class="app-sidebar__user-name"><b><?php echo $_SESSION['username'] ?></b></p>
                <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
            </div>
        </div>
        <hr>
        <ul class="app-menu">
            <li><a class="app-menu__item primary" href="#"><i class='app-menu__icon fa-solid fa-cart-shopping'></i>
                    <span class="app-menu__label">Cửa hàng</span></a></li>
            <li><a class="app-menu__item" href="quan-li-san-pham.php">
                    <i class="app-menu__icon fa-solid fa-tag"></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item" href="quan-li-khach-hang.php"><i class='app-menu__icon fa-solid fa-user-pen'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
            <li><a class="app-menu__item" href="quan-li-danh-muc.php">
                    <i class="app-menu__icon fa-solid fa-paperclip"></i><span class="app-menu__label">Quản lý danh mục</span></a>
            </li>
            <li><a class="app-menu__item" href="#">
                    <i class="app-menu__icon fa-solid fa-clipboard"></i><span class="app-menu__label">Quản lý đơn hàng</span></a>
            </li>
        </ul>
    </aside>
    <main class="app-content">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><a href="#"><b>Tổng quan</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>


        <div class="overview">
            <div class="overview-child">
                <i class="fa-solid fa-user"></i>
                <div class="overview-child-info">
                    <h3>TỔNG KHÁCH HÀNG</h3>
                    <p><?php echo $rowCountCustom['count(*)']; ?> khách hàng</p>
                </div>
            </div>
            <div class="overview-child">
                <i class="fa-solid fa-tag"></i>
                <div class="overview-child-info">
                    <h3>TỔNG SẢN PHẨM</h3>
                    <p><?php echo $rowCountProduct['count(*)']; ?> sản phẩm</p>
                </div>
            </div>
            <div class="overview-child">
                <i class="fa-solid fa-fire pdf-file"></i>
                <div class="overview-child-info">
                    <h3>HẾT HÀNG</h3>
                    <p><?php echo $rowCountSoldOut['count(*)']; ?> sản phẩm</p>
                </div>
            </div>
        </div>






    </main>



    <!-- set thời gian -->
    <script>
        time()

        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + " giờ " + m + " phút " + s + " giây";
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<span class="date"> ' + today + ' - ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout(time, 1000);

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }
    </script>
    </script>
    <script src="../asset/main.js"></script>
</body>

</html>