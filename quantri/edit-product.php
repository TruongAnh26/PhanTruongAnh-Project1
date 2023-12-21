<?php
include('../ketnoi.php');
if (isset($_GET['productId'])) {
  $masp = $_GET['productId'];
  $sql = "SELECT * FROM SANPHAM WHERE 1 = 1";
  $row = ($connect->query($sql))->fetch_array();

  $sql_check_category = "select * from loai_san_pham where 1 = 1";
  $result_check_category = $connect->query($sql_check_category);
  $sql_get_product_id = "SELECT * FROM SANPHAM WHERE MASP = '$masp'";
  $result_get_product_id = $connect->query($sql_get_product_id);
  $row_product_id = $result_get_product_id->fetch_array();
  
}

?>

<div class="modal-edit-product-container-wrap">
  <div class="modal-edit-product-container">

    <h3 class="modal-edit-product-title">Sửa sản phẩm</h3>
    <i class="fa-solid fa-xmark close-icon-edit close-icon" onclick="closeEditModal()"></i>

    <form action="./edit-product-process.php" method="post">
      <div class="form-group-edit">
        <label for="product-edit__identity" class="control-label">Mã sản phẩm</label>
        <input class="control-input" type="number" value="<?php echo $row_product_id['MASP'] ?>" name="masp" id="masp" readonly>
      </div>
      <div class="form-group-edit">
        <label for="product-edit__name" class="control-label">Tên sản phẩm</label>
        <input class="control-input" value="<?php echo $row_product_id['TEN_SP'] ?>" type="text" name="product-edit__name" id="product-edit__name">
      </div>
      <div class="form-group-edit">
        <label for="product-edit__desc" class="control-label">Mô tả</label>
        <textarea class="control-input" name="product-edit__desc" id="product-edit__desc" cols="20" rows="4"><?php echo $row_product_id['MO_TA'] ?></textarea>
      </div>
      <div class="form-group-edit">
        <label for="product-edit__price" class="control-label">Giá</label>
        <input class="control-input" type="number" value="<?php echo $row_product_id['GIA'] ?>" name="product-edit__price" id="product-edit__price">
      </div>
      <div class="form-group-edit">
        <label for="product-edit__category" class="control-label">Loại sản phẩm</label>
        <select class="control-input" name="product-edit__category" id="product-edit__category">
          <option>Chọn loại sản phẩm</option>
          <?php
          while ($row_category = $result_check_category->fetch_array()) {
          ?>
            <option class="control-option" value="<?php echo $row_category['MALSP']; ?>" <?php echo $row_category['MALSP'] == $row_product_id['MALSP'] ? "selected" : ""; ?>><?php echo $row_category['TEN_LOAI']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="form-group-edit">
        <label for="product-edit__state" class="control-label">Trạng thái</label>
        <select class="control-input" name="product-edit__state" id="product-edit__state">
          <option <?php echo ($row_product_id['TRANGTHAI'] == '' || $row_product_id['TRANGTHAI'] == null) ? "selected" : ""; ?>>Chọn tình trạng</option>
          <option value="1" <?php echo $row_product_id['TRANGTHAI'] == 1 ? "selected" : ""; ?>>Còn hàng</option>
          <option value="0" <?php echo $row_product_id['TRANGTHAI'] == 0 ? "selected" : ""; ?>>Hết hàng</option>
        </select>
      </div>
      <div class="product-edit-btn">
        <input type="submit" value="Lưu" name="product-edit" id="product-edit">
      </div>
    </form>
  </div>
</div>