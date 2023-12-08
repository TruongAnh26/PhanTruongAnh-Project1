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
  $sqlCheckRows = "select * from sanpham where 1 = 1";
  $resultCheckRows = $connect->query($sqlCheckRows);
  $totalRow = $resultCheckRows->num_rows;
  $sql = "select * from sanpham LIMIT $offset, $rowsPerPage";
  $totalPage = ceil($totalRow / $rowsPerPage);
  //search sản phẩm

  if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    
    $sql = "SELECT * FROM sanpham WHERE TEN_SP LIKE '%$keyword%' LIMIT $offset, $rowsPerPage;";
    
  }


  $result = $connect->query($sql);
  ?>
  <header class="app-header">
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
      <!-- User Menu-->
      <li>
        <a class="app-nav__item" href="../index.html"><i class="fa-solid fa-right-from-bracket"></i></a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../asset/image/anhcv1.jpg" width="50px" alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Trường Anh</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <li><a class="app-menu__item primary" href="phan-mem-ban-hang.html"><i class='app-menu__icon fa-solid fa-cart-shopping'></i>
          <span class="app-menu__label">Bán Hàng</span></a></li>
      <li><a class="app-menu__item active" href="table-data-product.html">
          <i class="app-menu__icon fa-solid fa-tag"></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon fa-solid fa-user-pen'></i><span class="app-menu__label">Quản lý khách hàng</span></a></li>
      <li><a class="app-menu__item" href="#">
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
        <li class="breadcrumb-item"><a href="#"><b>Danh sách sản phẩm</b></a></li>
      </ul>
      <div id="clock"></div>
    </div>

    <div class="tile">
      <div class="tile-body">
        <div class="element-button">
          <div class="button-action">

            <a class="btn btn-add btn-sm" href="form-add-san-pham.html" title="Thêm"><i class="fas fa-plus"></i>
              Tạo mới sản phẩm</a>
          </div>
          <div class="button-action">
            <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập" onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
          </div>

          <div class="button-action">
            <a class="btn btn-delete btn-sm print-file" type="button" title="In" onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
          </div>
          <div class="button-action">
            <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i class="fas fa-copy"></i> Sao chép</a>
          </div>

          <div class="button-action">
            <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất Excel</a>
          </div>
          <div class="button-action">
            <a class="btn btn-delete btn-sm pdf-file" type="button" title="In" onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
          </div>
          <div class="button-action">
            <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i> Xóa tất cả </a>
          </div>
        </div>
        <div class="extension">
          <div class="extension-show-wrap <?php echo $isSearch; ?> ">
            <div class="extension-show">
              <label>
                Hiện
                <select class="show-option" onchange="location.href = 'index.php?page=1&rowsPerPage=' + this.value;">
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
              <th>Mã sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Ảnh</th>
              <th>Mô tả</th>
              <th>Tình trạng</th>
              <th>Giá tiền</th>
              <th>Loại</th>
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
                $isMode = ($row['TRANGTHAI'] == 1) ? 'bg-success' : 'bg-error';
            ?>
                <tr>
                  <td><?php echo $row['MASP']; ?></td>
                  <td><?php echo $row['TEN_SP']; ?></td>
                  <td><img src="<?php echo $row['HINH_ANH'] ?>" alt="" width="100px;"></td>
                  <td><?php echo $row['MO_TA']; ?></td>
                  <td><span class="badge <?php echo $isMode; ?>"><?php echo $row['TRANGTHAI'] == 1 ? "Còn hàng" : "Hết hàng"; ?></span></td>
                  <td><?php echo $row['GIA']; ?></td>
                  <td><?php echo $row['MALSP']; ?></td>
                  <td><button class="btn btn-primary btn-sm trash" type="button" title="Xóa" onclick="myFunction(this)"><i class="fas fa-trash-alt"></i>
                    </button>
                    <button class="btn btn-primary btn-sm edit" type="button" title="Sửa" id="show-emp" data-toggle="modal" data-target="#ModalUP"><i class="fas fa-edit"></i></button>

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
              echo "<a class='table-page $isCurrentPage' href='./index.php?&page=$i'>$i</a>";
            }
            ?>

          </div>

        </footer>
      <?php
      }
      ?>
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