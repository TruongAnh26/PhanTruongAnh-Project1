const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const labelUpload = $('.file-upload')
const modalProductAdd = $('.modal-add-product')
const btnProductAdd = $('.btn-add')
const btnCloseAdd = $('.close-icon-add')
const modalProductEdit = $('.modal-edit-product')

// xử lý khi nhấn Enter sẽ tìm kiếm
const searchBtn = $('.input-search')
const searchForm = $('#search-form')
searchBtn.keypress = (e) => {
    if (e.keycode === 13) {
        searchForm.submit();
    }
}

function previewImage(e) {
    var input = e.target;
    var imagePreview = document.getElementById('product-add__image')

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        imagePreview.style.display = 'none'
    }
}

btnProductAdd.onclick = () => {
    btnProductAdd.preventDefault
    modalProductAdd.classList.add('open')
}


btnCloseAdd.onclick = () => {
    modalProductAdd.classList.remove('open')
}


function closeEditModal() {
    modalProductEdit.classList.remove('open')
}

modalProductAdd.onclick = (e) => {
    if (e.target.closest('.modal-add-product-container')) {
        e.stopProgapation
    } else {
        modalProductAdd.classList.remove('open')

    }
}

modalProductEdit.onclick = (e) => {
    if (e.target.closest('.modal-edit-product-container')) {
        e.stopProgapation
    } else {
        modalProductEdit.classList.remove('open')

    }
}


// Sự kiện click cho button Sửa
$$('.edit').forEach(function (button) {
    button.addEventListener('click', function () {
        modalProductEdit.classList.add('open')
        var productId = this.getAttribute('data-id');
        // Gọi hàm thực hiện AJAX ở đây và truyền productId cho PHP
        performAjax(productId)
    });
});

function performAjax(productId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Xử lý kết quả từ server nếu cần
            modalProductEdit.innerHTML = this.responseText
            console.log(this.responseText);
        }
    };
    // Gửi yêu cầu AJAX với data-id
    xhttp.open("GET", "edit-product.php?productId=" + productId, true);
    xhttp.send();
}

// sự kiện click vào nút xóa
document.addEventListener('DOMContentLoaded', function () {
    // Bắt sự kiện khi nút xóa được ấn
    $$('.delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var productId = this.getAttribute('data-id-delete');
            console.log(productId)
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm có mã ' + productId + ' không?')) {
                // Gửi yêu cầu xóa đến server
                deleteProduct(productId);
            }
        });
    });

    // Hàm gửi yêu cầu xóa đến server
    function deleteProduct(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'delete-product.php?delete_id=' + productId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Xóa thành công, cập nhật giao diện nếu cần
                window.location.reload();
            }
        };
        xhr.send();
    }
});
