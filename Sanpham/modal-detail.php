<?php
session_start();
include('../ketnoi.php');
if (isset($_GET['detailId'])) {
    $masp = $_GET['detailId'];
    $sql = "SELECT * FROM sanpham WHERE MASP = $masp";
    $row = ($connect->query($sql))->fetch_array();
}
?>

<div class="product-detail-wrap">
    <div class="product-detail__img">
        <img src="<?php echo "../quantri/" . $row['HINH_ANH'] ?>" alt="" class="product-detail__img-item">
    </div>
    <div class="product-detail__info">
        <i class="fa-solid fa-xmark modal-detail-close" onclick="hideDetail()"></i>
        <div class="product-detail__info-wrap">
            <h3 class="product-detail__info-title"><?php echo $row['TEN_SP'] ?></h3>
            <p class="product-detail__info-desc"><?php echo $row['MO_TA'] ?></p>
            <span class="product-detail__info-price"><?php echo $row['GIA'] . "000đ" ?></span>

        </div>
        <button class="btn-buy" <?php
                                if (!isset($_SESSION['username'])) {
                                    echo "onclick='showSignIn()'";
                                } else {
                                    echo "onclick='showPurchaseSuccessModal()'";
                                }
                                ?>>Mua</button>
    </div>
</div>