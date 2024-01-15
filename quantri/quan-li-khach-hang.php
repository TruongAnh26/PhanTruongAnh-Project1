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
    $rowsPerPage = isset($_GET['rowsPerPage']) ? $_GET['rowsPerPage'] : 10;
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($currentPage - 1) * $rowsPerPage;
    $sqlCheckRows = "select * from khach_hang where 1 = 1";
    $resultCheckRows = $connect->query($sqlCheckRows);
    $totalRow = $resultCheckRows->num_rows;
    $sql = "select * from khach_hang LIMIT $offset, $rowsPerPage";
    $totalPage = ceil($totalRow / $rowsPerPage);
    //search 

    if (isset($_GET['keyword'])) {
        $keyword = $_GET['keyword'];

        $sql = "SELECT * FROM khach_hang WHERE HO_TEN LIKE '%$keyword%' LIMIT $offset, $rowsPerPage;";
    }


    $result = $connect->query($sql);
    ?>
    <header class="app-header">
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li>
                <a class="app-nav__item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>

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
            <li><a class="app-menu__item primary" href="tongquan.php"><i class='app-menu__icon fa-solid fa-cart-shopping'></i>
                    <span class="app-menu__label">Cửa hàng</span></a></li>
            <li><a class="app-menu__item" href="quan-li-san-pham.php">
                    <i class="app-menu__icon fa-solid fa-tag"></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
            </li>
            <li><a class="app-menu__item active" href="#"><i class='app-menu__icon fa-solid fa-user-pen'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
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
                <li class="breadcrumb-item"><a href="#"><b>Danh sách khách hàng</b></a></li>
            </ul>
            <div id="clock"></div>
        </div>

        <div class="tile">
            <div class="tile-body">
                <div class="element-button">
                    <div class="button-action">

                        <a class="btn btn-add btn-sm guest" href="#" title="Thêm"><i class="fas fa-plus"></i>
                            Thêm khách hàng</a>
                    </div>
                    <div class="button-action">
                        <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập"><i class="fas fa-file-upload"></i> Tải từ file</a>
                    </div>

                    <div class="button-action">
                        <a class="btn btn-delete btn-sm print-file" type="button" title="In"><i class="fas fa-print"></i> In dữ liệu</a>
                    </div>
                    <div class="button-action">
                        <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
                    </div>

                    <div class="button-action">
                        <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
                    </div>
                    <div class="button-action">
                        <a class="btn btn-delete btn-sm pdf-file" type="button" title="In"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                    </div>
                    <div class="button-action">
                        <a class="btn btn-delete btn-sm" type="button" title="Xóa"><i class="fas fa-trash-alt"></i> Xóa tất cả </a>
                    </div>
                </div>
                <div class="extension">
                    <div class="extension-show-wrap <?php echo $isSearch; ?> ">
                        <div class="extension-show">
                            <label>
                                Hiện
                                <select class="show-option" onchange="location.href = 'quan-li-khach-hang.php?page=1&rowsPerPage=' + this.value;">
                                    <?php
                                    $options = [10, 25, 50, 100];
                                    foreach ($options as $option) {
                                        $selected = ($option == $rowsPerPage) ? "selected" : "";
                                        echo "<option value='$option' $selected>$option</option>";
                                    }
                                    ?>
                                </select>
                                danh mục
                            </label>
                        </div>
                    </div>
                    <form action="" method="get" id="search-form">
                        <div class="extention-search-wrap">
                            <div class="extention-search">
                                <label for="input-search">Tìm kiếm:
                                    <input type="search" class="input-search" name="keyword" id="input-search" placeholder="">
                                </label>
                            </div>
                        </div>

                    </form>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Mã khách hàng</th>
                            <th>Họ và tên</th>
                            <th>Tài khoản</th>
                            <th>Mật khẩu</th>
                            <th>Email</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stt = 0;

                        if ($totalRow > 0) {
                            $rowLimit = 10;
                            while ($row = $result->fetch_array()) {
                                $stt++;
                                $isMode = ($row['TRANG_THAI'] == 0) ? 'bg-success' : 'bg-error';
                        ?>
                                <tr>
                                    <td><?php echo $row['MAKH']; ?></td>
                                    <td><?php echo $row['HO_TEN']; ?></td>
                                    <td><?php echo $row['TAI_KHOAN']; ?></td>
                                    <td><?php echo $row['MAT_KHAU']; ?></td>
                                    <td><?php echo $row['EMAIL']; ?></td>
                                    <td><span class="badge <?php echo $isMode; ?>"><?php echo $row['TRANG_THAI'] == 0 ? "Hoạt động" : "Bị cấm"; ?></span></td>
                                    <td><button class="btn btn-primary btn-sm delete " type="submit" title="Xóa" data-id-delete="<?php echo $row['MAKH']; ?>"><i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button class="btn btn-primary btn-sm edit" type="submit" title="Sửa" id="show-emp" data-id="<?php echo $row['MAKH']; ?>"><i class="fas fa-edit"></i></button>

                                    </td>
                                </tr>
                        <?php

                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <?php
            if ($totalRow > $rowsPerPage && empty($_GET['keyword'])) {
            ?>
                <footer>
                    <div class="change-table">
                        <?php
                        for ($i = 1; $i <= $totalPage; $i++) {
                            $isCurrentPage = ($currentPage == $i) ? 'active' : '';
                            echo "<a class='table-page $isCurrentPage' href='./quan-li-khach-hang.php?&page=$i'>$i</a>";
                        }
                        ?>

                    </div>

                </footer>
            <?php
            }
            ?>
        </div>
    </main>

    <!-- modal add guest -->
    <div class="modal-add-guest">
        <div class="modal-add-guest-container-wrap">
            <div class="modal-add-guest-container">

                <h3 class="modal-add-guest-title">Thêm khách hàng</h3>
                <i class="fa-solid fa-xmark close-icon-add close-icon"></i>

                <form action="add-process.php" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group-add">
                        <label for="guest-add__name" class="control-label">Họ và tên</label>
                        <input class="control-input" type="text" name="guest-add__name" id="guest-add__name">
                    </div>
                    <div class="form-group-add">
                        <label for="guest-add__account" class="control-label">Tài khoản</label>
                        <input class="control-input" name="guest-add__account" id="guest-add__account" type="text"></input>
                    </div>
                    <div class="form-group-add">
                        <label for="guest-add__password" class="control-label">Mật khẩu</label>
                        <input class="control-input" type="password" name="guest-add__password" id="guest-add__password">
                    </div>
                    <div class="form-group-add">
                        <label for="guest-add__email" class="control-label">Email</label>
                        <input class="control-input" type="email" name="guest-add__email" id="guest-add__email">
                    </div>
                    <div class="form-group-add">
                        <label for="guest-add__state" class="control-label">Trạng thái</label>
                        <select class="control-input" name="guest-add__state" id="guest-add__state">
                            <option>Chọn tình trạng</option>
                            <option value="1">Bị cấm</option>
                            <option value="0">Hoạt động</option>
                        </select>
                    </div>
                    <div class="guest-add-btn">
                        <input type="submit" value="Thêm" name="guest-add" id="guest-add">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal guest edit -->
    <div class="modal-edit-guest"></div>
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
    <script src="../asset/quanlikhachhang.js"></script>
</body>

</html>