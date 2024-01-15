<?php
include('../ketnoi.php');
if (isset($_POST['product-add'])) {
    $masp = $_POST['masp'];
    $productAddName = $_POST['product-add__name'];
    $productAddDesc = $_POST['product-add__desc'];
    $productAddPrice = $_POST['product-add__price'];
    $productAddCategory = $_POST['product-add__category'];
    $productAddState = $_POST['product-add__state'];

    $sql_check_prod = "SELECT MASP FROM sanpham WHERE MASP = '$masp'";
    $res_check_prod = $connect->query($sql_check_prod);

    if ($res_check_prod->num_rows > 0) {
        echo "<script>alert('Trùng mã sản phẩm không thể thêm'); window.location.href = 'quan-li-san-pham.php';</script>";
        // Dừng kịch bản PHP
        die();
    }

    $productAddDir = "uploads/";
    $productAddPath = $productAddDir . $_FILES["file-image"]["name"];
    // echo $productAddPath;
    // die();
    // Di chuyển tệp đã tải lên đến thư mục mong muốn
    move_uploaded_file($_FILES["file-image"]["tmp_name"], $productAddPath);

    // Lưu đường dẫn của file vào cơ sở dữ liệu
    $sql_add_product = "INSERT sanpham VALUES ('$masp','$productAddName','$productAddDesc','$productAddPrice','$productAddCategory','$productAddPath','$productAddState')";
    // echo $sql_add_product;
    // die();
    if ($connect->query($sql_add_product)) {
        header("Location: quan-li-san-pham.php");
    } else {
        $err = "Lỗi không thể thêm";
    }
}

if (isset($_POST['guest-add'])) {
    $guestAddName = $_POST['guest-add__name'];
    $guestAddAccount = $_POST['guest-add__account'];
    $guestAddPassword = $_POST['guest-add__password'];
    $guestAddEmail = $_POST['guest-add__email'];
    $guestAddState = $_POST['guest-add__state'];

    $sql_check_guest = "SELECT TAI_KHOAN FROM khach_hang WHERE TAI_KHOAN = '$guestAddAccount'";
    $res_check_guest = $connect->query($sql_check_guest);

    if ($res_check_guest->num_rows > 0) {
        echo "<script>alert('Tài khoản đã tồn tại'); window.location.href = 'quan-li-khach-hang.php';</script>";
        // Dừng kịch bản PHP
        die();
    }

   
    $sql_add_guest = "INSERT khach_hang VALUES (null,'$guestAddName','$guestAddAccount','$guestAddPassword','$guestAddEmail','$guestAddState')";
    // echo $sql_add_guest;
    // die();
    if ($connect->query($sql_add_guest)) {
        header("Location: quan-li-khach-hang.php");
    } else {
        $err = "Lỗi không thể thêm";
    }
}

if (isset($_POST['category-add'])) {
    $categoryAddName = $_POST['category-add__name'];
    $categoryAddIdentity = $_POST['category-add__identity'];
    $categoryAddState = $_POST['category-add__state'];

    $sql_check_category = "SELECT MALSP FROM loai_san_pham WHERE MALSP = '$categoryAddIdentity'";
    $res_check_category = $connect->query($sql_check_category);

    if ($res_check_category->num_rows > 0) {
        echo "<script>alert('Mã sản phẩm đã tồn tại'); window.location.href = 'quan-li-khach-hang.php';</script>";
        die();
    }

   
    $sql_add_category = "INSERT loai_san_pham VALUES ('$categoryAddIdentity','$categoryAddName','$categoryAddState')";
    // echo $sql_add_category;
    // die();
    if ($connect->query($sql_add_category)) {
        header("Location: quan-li-danh-muc.php");
    } else {
        $err = "Lỗi không thể thêm";
    }
}

?>
