<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FantaFood</title>
    <link rel="stylesheet" href="./asset/main.css">
    <link rel="stylesheet" href="./asset/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./asset/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
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
include('./ketnoi.php');
    if(isset($_POST['sign-up'])) {
        $fullname = $_POST['fullname'];
        $account = $_POST['account'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql_check_guest = "SELECT TAI_KHOAN FROM khach_hang WHERE TAI_KHOAN = '$fullname'";
        $res_check_guest = $connect->query($sql_check_guest);
    
        if ($res_check_guest->num_rows > 0) {
            echo "<script>alert('Tài khoản đã tồn tại hãy đăng ký tài khoản khác'); window.location.href = './index.php';</script>";
            die();
        }
    
       
        $sql_add_guest = "INSERT khach_hang VALUES (null,'$fullname','$account','$password','$email',0)";
        // echo $sql_add_guest;
        // die();
        if ($connect->query($sql_add_guest)) {
            echo "<script>alert('Đăng ký thành công'); window.location.href = './index.php';</script>";
            
            
        } else {
            $err = "Lỗi không thể thêm";
        }
    }
?>
    <div id="page-container">
        <header id="header">
            <div class="logo-container">
                <a href="./index.php" class="logo-link">
                    <img src="./asset/image/logo.png" alt="logo" class="logo-img">
                </a>
            </div>
            <div class="menu-nav">
                <ul class="nav-list">
                    <li class="nav-item"><a href="#">Trang chủ</a></li>
                    <li class="nav-item"><a href="./Gioithieu/gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item"><a href="./Sanpham/sanpham.php">Sản phẩm</a></li>
                    <li class="nav-item"><a href="./Lienhe/lienhe.php">Liên hệ</a></li>
                </ul>
            </div>
            <div class="header-option">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<a href="./quantri/logout.php" class="btn-sign-out">Đăng xuất</a>';
                } else {
                    echo '<span class="btn-sign-in">Đăng nhập</span>';
                }
                ?>
            </div>
        </header>
        <div class="owl-carousel">
            <div class="slide1 slide-image">
                <div class="product-infor animation1">
                    <h2 class="product-infor__mode">PRE-ORDER NOW</h2>
                    <h2 class="product-infor__desc">A DELICIOUS FOOD</h2>
                    <button class="product-infor__btn">
                        <a class="product-infor__btn-link" href="">Find out more</a>
                        <i class="fa-solid fa-angle-right btn-icon"></i>
                    </button>
                </div>
            </div>
            <div class="slide2 slide-image">
                <div class="product-infor animation2">
                    <h2 class="product-infor__mode">AVAILABLE NOW</h2>
                    <h2 class="product-infor__desc">CHRISMAS ICE CREAM CAKES</h2>
                    <button class="product-infor__btn">
                        <a class="product-infor__btn-link" href="">Find out more</a>
                        <i class="fa-solid fa-angle-right btn-icon"></i>
                    </button>
                </div>
            </div>
            <div class="slide3 slide-image">
                <div class="product-infor animation3">
                    <h2 class="product-infor__mode">INTRODUCING THE NEW</h2>
                    <h2 class="product-infor__desc">ULTRA BURGER SERIES</h2>
                    <button class="product-infor__btn">
                        <a class="product-infor__btn-link" href="">Find out more</a>
                        <i class="fa-solid fa-angle-right btn-icon"></i>
                    </button>
                </div>
            </div>

        </div>
        <div class="sign-in-modal">
            <div class="sign-in-container">

                <form action="./quantri/process-login.php" method="POST" class="form-sign-in" id="form-sign-in">
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
                    <input type="submit" class="form-submit" value="Đăng ký" name="sign-up"></input>
                </form>
            </div>

        </div>
    </div>


    <script src="./asset/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script src="./asset/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.min.js"></script>
    <script src="./showmodal.js"></script>
    <script src="./modal.js"></script>
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
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
    <script src="./asset/main.js"></script>

</body>

</html>