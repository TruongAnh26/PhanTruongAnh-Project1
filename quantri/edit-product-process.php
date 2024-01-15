<?php
include("../ketnoi.php");
if (isset($_POST['product-edit'])) {
    $masp = $_POST['masp'];
    $productEditName = $_POST['product-edit__name'];
    $productEditDesc = $_POST['product-edit__desc'];
    $productEditPrice = $_POST['product-edit__price'];
    $productEditCategory = $_POST['product-edit__category'];
    $productEditState = $_POST['product-edit__state'];
    $sql_update = "UPDATE sanpham SET TEN_SP = '$productEditName',MO_TA = '$productEditDesc',GIA = '$productEditPrice',MALSP = '$productEditCategory' ,TRANGTHAI = '$productEditState' WHERE MASP = '$masp'";
    
    if($connect-> query($sql_update)) {
      
      header('Location: quan-li-san-pham.php');
    }
  }
?>