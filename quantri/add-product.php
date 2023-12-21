<?php 
    include('../ketnoi.php');
    if(isset($_POST['product-add'])) {
        $masp = $_POST['masp'];
        $productAddName = $_POST['product-add__name'];
        $productAddDesc = $_POST['product-add__desc'];
        $productAddPrice = $_POST['product-add__price'];
        $productAddCategory = $_POST['product-add__category'];
        $productAddState = $_POST['product-add__state'];

        $sql_check_prod = "SELECT MASP FROM sanpham WHERE MASP = '$masp'";
        $res_check_prod = $connect->query($sql_check_prod);

        if ($res_check_prod->num_rows > 0) {
            $err = "Lỗi trùng khóa chính";
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
    
?>