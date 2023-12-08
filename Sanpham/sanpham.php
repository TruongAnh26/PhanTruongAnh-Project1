<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../asset/main.css">
    <script src="https://kit.fontawesome.com/502650a7cc.js" crossorigin="anonymous"></script>

</head>

<body>
    <div id="page-container">
        <header id="header">
            <div class="logo-container">
                <a href="#" class="logo-link">
                    <img src="../asset/image/logo.png" alt="logo" class="logo-img">
                </a>
            </div>
            <div class="menu-nav" style="margin-right:40px;">
                <ul class="nav-list">
                    <li class="nav-item"><a href="../index.php">Trang chủ</a></li>
                    <li class="nav-item"><a href="../Gioithieu/gioithieu.php">Giới thiệu</a></li>
                    <li class="nav-item"><a href="#">Sản phẩm</a></li>
                    <li class="nav-item"><a href="../Lienhe/lienhe.php">Liên hệ</a></li>
                </ul>
            </div>
            <!-- <div class="header-option">
                <span class="btn-sign-in">Đăng nhập</span>
                <span class="btn-sign-up">Đăng ký</span>
            </div> -->
        </header>
        <div class="collection">
            <div class="sidebar-menu__wrap">
                <aside class="sidebar-menu">
                    <ul class="sidebar-product">
                        <li class="product-item active"><a href="#">Tất cả</a></li>
                        <li class="product-item"><a href="#">Bánh kem</a></li>
                        <li class="product-item"><a href="#">Bánh mì</a></li>
                        <li class="product-item"><a href="#">Đồ uống</a></li>

                    </ul>
                </aside>

            </div>
            <div class="menu-wrap">
                <h3 class="menu-item-title">Tất cả</h3>
                <div class="menu-container">
                    <div class="menu-item">
                        <div class="menu-item__image">
                            <a href="#"><img src="./image/bmigayCaNgu.webp" alt=""></a>
                        </div>
                        <div class="menu-item__info">
                            <h3>
                                <a href="#">Bánh mì Cá Ngừ</a>
                            </h3>
                            <div class="price-product">
                                25.000đ
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item__image">
                            <a href="#">
                                <img src="./image/bmiQuePateCay.webp" alt="">
                            </a>
                        </div>
                        <div class="menu-item__info">
                            <h3>
                                <a href="#">Bánh mì Pate cay</a>
                            </h3>
                            <div class="price-product">
                                19.000đ
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item__image">
                            <a href="#">
                                <img src="./image/bmiVnThitNguoi.webp" alt="">
                            </a>
                        </div>
                        <div class="menu-item__info">
                            <h3>
                                <a href="#">Bánh mì Thịt Nguội</a>
                            </h3>
                            <div class="price-product">
                                30.000đ
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item__image">
                            <a href="#">
                                <img src="./image/CrossanTrungMuoi.webp" alt="">
                            </a>
                        </div>
                        <div class="menu-item__info">
                            <h3>
                                <a href="#">Bánh Trứng Muối</a>
                            </h3>
                            <div class="price-product">
                                50.000đ
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item__image">
                            <a href="#">
                                <img src="./image/banhMouseGau.webp" alt="">
                            </a>
                        </div>
                        <div class="menu-item__info">
                            <h3>
                                <a href="#">Bánh Mousse Gấu</a>
                            </h3>
                            <div class="price-product">
                                78.000đ
                            </div>
                        </div>
                    </div>
                    <div class="menu-item">
                        <div class="menu-item__image">
                            <a href="#">
                                <img src="./image/banhRed-velet.webp" alt="">
                            </a>
                        </div>
                        <div class="menu-item__info">
                            <h3>
                                <a href="#">Bánh Red Velet</a>
                            </h3>
                            <div class="price-product">
                                35.000đ
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="product-detail-modal">
        <div class="product-detail-wrap">
            <div class="product-detail__img">
                <img src="./image/banhRed-velet.webp" alt="" class="product-detail__img-item">
            </div>
            <div class="product-detail__info">
                <i class="fa-solid fa-xmark modal-detail-close"></i>
                <div class="product-detail__info-wrap">
                    <h3 class="product-detail__info-title">Bánh Red Velet</h3>
                    <p class="product-detail__info-desc">Được làm từ dâu với màu chủ đạo là màu đỏ, với 2 thành phần
                        chính là </p>
                    <span class="product-detail__info-price">35.000đ</span>

                </div>
                <button class="btn-buy">Mua</button>
            </div>
        </div>
    </div>
    <div class="sign-in-modal">
        <div class="sign-in-container">

            <form action="" method="POST" class="form-sign-in" id="form-sign-in">
                <i class="fa-solid fa-xmark close-icon"></i>
                <h3 class="heading">Đăng nhập</h3>
                <div class="spacer"></div>

                <div class="form-group">
                    <label for="account" class="form-label">Tài khoản</label>
                    <input id="account" placeholder="Nhập tài khoản" name="account" type="text"
                        class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" placeholder="Nhập mật khẩu" name="password" type="password"
                        class="form-control">
                    <span class="form-message"></span>
                </div>
                <span class="sign-up-link">Chưa có tài khoản?
                    <a class="change-sign-up" href="">Đăng ký</a>
                </span>
                <input type="submit" class="form-submit" value="Đăng nhập"></input>
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
                    <input id="fullname" name="fullname" type="text" placeholder="Nguyen Van A"
                        class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" placeholder="abc@gmail.com" name="email" type="email" class="form-control">
                    <span class="form-message"></span>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" placeholder="Nhập mật khẩu" name="password" type="password"
                        class="form-control">
                    <span class="form-message"></span>
                </div>
                <div class="form-group">
                    <label for="password-comfirm" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password-comfirm" placeholder="Nhập lại mật khẩu" name="password-comfirm"
                        type="password" class="form-control">
                    <span class="form-message"></span>
                </div>
                <span class="sign-up-link">Đã có tài khoản?
                    <a class="change-sign-in" href="">Đăng nhập</a>
                </span>
                <input type="submit" class="form-submit" value="Đăng ký"></input>
            </form>
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
                validator.isConfirm('#password-comfirm', function () {
                    return document.querySelector('#form-sign-up #password').value
                }),
            ],
            onSubmit: function (data) {
                console.log(data)
            }
        })
    </script>
    <script src="./sanpham.js"></script>
    
</body>

</html>