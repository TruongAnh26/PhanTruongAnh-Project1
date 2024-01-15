<?php
include('../ketnoi.php');
if (isset($_GET['guestId'])) {
    $makh = $_GET['guestId'];
    $sql = "SELECT * FROM khach_hang WHERE 1 = 1";
    $row = ($connect->query($sql))->fetch_array();
    $sql_get_guest_id = "SELECT * FROM khach_hang WHERE MAKH = '$makh'";
    $result_get_guest_id = $connect->query($sql_get_guest_id);
    $row_guest_id = $result_get_guest_id->fetch_array();
}
?>

    <div class="modal-edit-guest-container-wrap">
        <div class="modal-edit-guest-container">

            <h3 class="modal-edit-guest-title">Sửa thông tin khách hàng</h3>
            <i class="fa-solid fa-xmark close-icon-edit close-icon" onclick="closeEditModal()"></i>

            <form action="./edit-guest-process.php" method="post" enctype="multipart/form-data">

                <div class="form-group-edit">
                    <label for="guest-edit__identity" class="control-label">Mã khách hàng</label>
                    <input class="control-input" readonly type="text" value="<?php echo $row_guest_id['MAKH']; ?>" name="makh" id="guest-edit__identity">
                </div>
                <div class="form-group-edit">
                    <label for="guest-edit__name" class="control-label">Họ và tên</label>
                    <input class="control-input" type="text" value="<?php echo $row_guest_id['HO_TEN']; ?>" name="guest-edit__name" id="guest-edit__name">
                </div>
                <div class="form-group-edit">
                    <label for="guest-edit__account" class="control-label">Tài khoản</label>
                    <input class="control-input" value="<?php echo $row_guest_id['TAI_KHOAN']; ?>" name="guest-edit__account" id="guest-edit__account" type="text"></input>
                </div>
                <div class="form-group-edit">
                    <label for="guest-edit__password" class="control-label">Mật khẩu</label>
                    <input class="control-input" value="<?php echo $row_guest_id['MAT_KHAU']; ?>" type="text" name="guest-edit__password" id="guest-edit__password">
                </div>
                <div class="form-group-edit">
                    <label for="guest-edit__email" class="control-label">Email</label>
                    <input class="control-input" value="<?php echo $row_guest_id['EMAIL']; ?>" type="email" name="guest-edit__email" id="guest-edit__email">
                </div>
                <div class="form-group-edit">
                    <label for="guest-edit__state" class="control-label">Trạng thái</label>
                    <select class="control-input" name="guest-edit__state" id="guest-edit__state">
                        <option <?php echo ($row_guest_id['TRANG_THAI'] == '' || $row_guest_id['TRANG_THAI'] == null) ? "selected" : ""; ?>>Chọn tình trạng</option>
                        <option value="1" <?php echo $row_guest_id['TRANG_THAI'] == 1 ? "selected" : ""; ?>>Bị cấm</option>
                        <option value="0" <?php echo $row_guest_id['TRANG_THAI'] == 0 ? "selected" : ""; ?>>Hoạt động</option>
                    </select>
                </div>
                <div class="guest-edit-btn">
                    <input type="submit" value="Sửa" name="guest-edit" id="guest-edit">
                </div>
            </form>
        </div>
    </div>
