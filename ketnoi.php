<?php
    $connect = new mysqli("localhost", "root", "", "project");
    if(!$connect) {
        echo "Lỗi kết nối".mysqli_error($connect);
    }

?>