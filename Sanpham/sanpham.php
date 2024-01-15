<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../asset/main.css">
    <script src="https://kit.fontawesome.com/502650a7cc.js" crossorigin="anonymous"></script>
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        echo '<style>.btn-sign-in {display: none;}</style>';
    } else {
        echo '<style>.btn-sign-out {display: none;}</style>';
    }
    ?>
</head>

<body>
    <?php
    include('../ketnoi.php');
    $sql_all_product = "select * from sanpham where 1 = 1";
    $sql_get_category = "select * from loai_san_pham where 1 = 1";
    $sql_name_category = "select * from loai_san_pham where MALSP = 1";
    if (isset($_GET['loai'])) {
        $loai = $_GET['loai'];
        $sql_all_product = "select * from sanpham where MALSP = $loai";
        $sql_name_category = "select * from loai_san_pham where MALSP = $loai";
    }
    $result_all_product = $connect->query($sql_all_product);
    $result_get_category = $connect->query($sql_get_category);
    $result_name_category = $connect->query($sql_name_category);
    $row_one = $result_name_category->fetch_array();
    if(isset($_POST['sign-up'])) {
        $fullname = $_POST['fullname'];
        $account = $_POST['account'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql_check_guest = "SELECT TAI_KHOAN FROM khach_hang WHERE TAI_KHOAN = '$fullname'";
        $res_check_guest = $connect->query($sql_check_guest);
    
        if ($res_check_guest->num_rows > 0) {
            echo "<script>alert('Tài khoản đã tồn tại hãy đăng ký tài khoản khác'); window.location.href = '../index.php';</script>";
            die();
        }
    
       
        $sql_add_guest = "INSERT khach_hang VALUES (null,'$fullname','$account','$password','$email',0)";
        // echo $sql_add_guest;
        // die();
        if ($connect->query($sql_add_guest)) {
            echo "<script>alert('Đăng ký thành công'); window.location.href = '../index.php';</script>";
            
            
        } else {
            $err = "Lỗi không thể thêm";
        }
    }
    ?>
    <div id="page-container">
        <header id="header">
            <div class="logo-container">
                <a href="../index.php" class="logo-link">
                    <img src="../asset/image/logo.png" alt="logo" class="logo-img">
                </a>
            </div>
            <div class="menu-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="../index.php">Trang chủ</a></li>
                    <li class="nav-item"><a href="../Gioithieu/gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item"><a href="#">Sản phẩm</a></li>
                    <li class="nav-item"><a href="../Lienhe/lienhe.php">Liên hệ</a></li>
                </ul>
            </div>
            <div class="header-option">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="../quantri/logout.php" class="btn-sign-out">Đăng xuất</a>';
                } else {
                    echo '<span class="btn-sign-in" onclick ="showSignIn()">Đăng nhập</span>';
                }
                ?>
            </div>
        </header>
        <div class="collection">
            <div class="sidebar-menu__wrap">
                <aside class="sidebar-menu">
                    <ul class="sidebar-product">
                        <?php
                        while ($row_category = $result_get_category->fetch_array()) {
                        ?>
                            <li class="product-item"><a href="sanpham.php?loai=<?php echo $row_category['MALSP'] ?>"><?php echo $row_category['TEN_LOAI'] ?></a></li>

                        <?php
                        }
                        ?>
                    </ul>
                </aside>

            </div>
            <div class="menu-wrap">
                <h3 class="menu-item-title"><?php echo $row_one['TEN_LOAI'] ?></h3>
                <div class="menu-container">
                    <?php

                    while ($row = $result_all_product->fetch_array()) {

                    ?>
                        <div class="menu-item" data-id=<?php echo $row['MASP'] ?>>
                            <div class="menu-item__image">
                                <img src="<?php echo "../quantri/" . $row['HINH_ANH']; ?>" alt="">
                            </div>
                            <div class="menu-item__info">
                                <h3>
                                    <a href="#"><?php echo $row['TEN_SP']; ?></a>
                                </h3>
                                <div class="price-product">
                                    <?php echo $row['GIA'] . ".000đ"; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>

    </div>
    <div class="product-detail-modal">

    </div>
    <div class="sign-in-modal">
        <div class="sign-in-container">

            <form action="../quantri/process-login.php" method="POST" class="form-sign-in" id="form-sign-in">
                <i class="fa-solid fa-xmark close-icon"></i>
                <h3 class="heading">Đăng nhập</h3>
                <div class="spacer"></div>

                <div class="form-group">
                    <label for="account" class="form-label">Tài khoản</label>
                    <input placeholder="Nhập tài khoản" name="account" type="text" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input placeholder="Nhập mật khẩu" name="password" type="password" class="form-control">
                    <span class="form-message"></span>
                </div>
                <span class="sign-up-link">Chưa có tài khoản?
                    <a class="change-sign-up" href="">Đăng ký</a>
                </span>
                <input type="submit" name="sign-in" class="form-submit" value="Đăng nhập"></input>
            </form>
        </div>

    </div>
    <div class="sign-up-modal">
        <div class="sign-up-container">

            <form action="" method="POST" class="form-sign-up" id="form-sign-up">
                <i class="fa-solid fa-xmark close-icon"></i>
                <h3 class="heading">Đăng ký</h3>
                <div class="spacer"></div>

                <div class="form-group">
                    <label for="account" class="form-label">Tài khoản</label>
                    <input id="account" placeholder="abc123" name="account" type="text" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="fullname" class="form-label">Họ và tên</label>
                    <input id="fullname" name="fullname" type="text" placeholder="Nguyen Van A" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" placeholder="abc@gmail.com" name="email" type="email" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" placeholder="Nhập mật khẩu" name="password" type="password" class="form-control">
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="password-comfirm" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password-comfirm" placeholder="Nhập lại mật khẩu" name="password-comfirm" type="password" class="form-control">
                    <span class="form-message"></span>
                </div>
                <span class="sign-up-link">Đã có tài khoản?
                    <a class="change-sign-in" href="">Đăng nhập</a>
                </span>
                <input type="submit" name="sign-up" class="form-submit" value="Đăng ký"></input>
            </form>
        </div>

    </div>
    <div class="purchase-success-modal">
        <div class="purchase-success-container">
            <span>Mua thành công</span>
            <i class="fa-solid fa-check"></i>
        </div>
    </div>
    <script src="../modal.js"></script>
    <script>
        validator({
            form: 'form-sign-up',
            formGroupInput: '.form-group',
            errorSelector: '.form-message',
            rules: [
                validator.isRequired('#account'),
                validator.isRequired('#fullname'),
                validator.isEmail('#email'),
                validator.isRequired('#password'),
                validator.isMinLength('#password', 6),
                validator.isRequired('#password-comfirm'),
                validator.isConfirm('#password-comfirm', function() {
                    return document.querySelector('#form-sign-up #password').value
                }),
            ]
        })
    </script>
    <script>
        function showPurchaseSuccessModal() {
            var purchaseSuccessModal = document.querySelector('.purchase-success-modal');
            hideDetail()
            purchaseSuccessModal.style.display = 'flex';
            setTimeout(function() {
                purchaseSuccessModal.style.display = 'none';
            }, 1500);
        }
    </script>
    <script src="./sanpham.js"></script>
</body>

</html>