<?php
include('../ketnoi.php');

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Sử dụng câu lệnh SQL DELETE
    $sql_delete = "DELETE FROM sanpham WHERE MASP = $delete_id";

    if ($connect->query($sql_delete)) {
        echo "Dòng đã được xóa thành công.";
    } else {
        echo "Lỗi khi xóa dòng: " . $connect->error;
    }
}
?>
