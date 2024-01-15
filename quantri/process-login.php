<?php
session_start();
include('../ketnoi.php');
if (isset($_POST['sign-in'])) {
    
    
    $account = $_POST['account'];
    $password = $_POST['password'];

    $sql_check_admin = "SELECT * FROM quan_tri WHERE TAI_KHOAN = ? AND MATKHAU = ?";
    $stmt_admin = $connect->prepare($sql_check_admin);
    $stmt_admin->bind_param("ss", $account, $password);
    $stmt_admin->execute();
    $result_check_admin = $stmt_admin->get_result();

    $sql_check_guest = "SELECT * FROM khach_hang WHERE TAI_KHOAN = ? AND MAT_KHAU = ?";
    $stmt_guest = $connect->prepare($sql_check_guest);
    $stmt_guest->bind_param("ss", $account, $password);
    $stmt_guest->execute();
    $result_check_guest = $stmt_guest->get_result();

    if ($result_check_admin->num_rows > 0) {
        $_SESSION['username'] = $account;
        $_SESSION['role'] = 'admin';
        header("Location: ./tongquan.php");
        exit();
    }elseif($result_check_guest->num_rows > 0) {
        $_SESSION['username'] = $account;
        $_SESSION['role'] = 'guest';
        header("Location: ../index.php");
        exit();
    }else {
        $error_message = "Tài khoản hoặc mật khẩu không chính xác";
        echo '<script type="text/javascript">alert("' . $error_message . '"); window.location.href="../index.php";</script>';
        exit();
    }
}
?>
