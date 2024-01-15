<?php
include("../ketnoi.php");
if (isset($_POST['guest-edit'])) {
    $makh = $_POST['makh'];
    $guestEditName = $_POST['guest-edit__name'];
    $guestEditAccount = $_POST['guest-edit__account'];
    $guestEditPassword = $_POST['guest-edit__password'];
    $guestEditEmail = $_POST['guest-edit__email'];
    $guestEditState = $_POST['guest-edit__state'];
    $sql_update = "UPDATE khach_hang SET HO_TEN = '$guestEditName',TAI_KHOAN = '$guestEditAccount',MAT_KHAU = '$guestEditPassword',EMAIL = '$guestEditEmail' ,TRANG_THAI = '$guestEditState' WHERE MAKH = '$makh'";
    
    if($connect-> query($sql_update)) {
      
      header('Location: quan-li-khach-hang.php');
    }
  }
?>