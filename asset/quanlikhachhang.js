const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const btnGuestAdd = $('.btn-add')
const modalGuestAdd = $('.modal-add-guest')
const btnCloseAdd = $('.close-icon-add')
const modalGuestEdit = $('.modal-edit-guest')

// xử lý khi nhấn Enter sẽ tìm kiếm
const searchBtn = $('.input-search')
const searchForm = $('#search-form')
searchBtn.keypress = (e) => {
    if (e.keycode === 13) {
        searchForm.submit();
    }
}


btnGuestAdd.onclick = () => {
    btnGuestAdd.preventDefault
    modalGuestAdd.classList.add('open')
}


btnCloseAdd.onclick = () => {
    modalGuestAdd.classList.remove('open')
}


function closeEditModal() {
    modalGuestEdit.classList.remove('open')
}

modalGuestAdd.onclick = (e) => {
    if (e.target.closest('.modal-add-guest-container')) {
        e.stopProgapation
    } else {
        modalGuestAdd.classList.remove('open')

    }
}

modalGuestEdit.onclick = (e) => {
    if (e.target.closest('.modal-edit-guest-container')) {
        e.stopProgapation
    } else {
        modalGuestEdit.classList.remove('open')

    }
}



console.log(modalGuestEdit)

// sửa của guest
$$('.edit').forEach(function (button) {
    button.addEventListener('click', function () {
        modalGuestEdit.classList.add('open')
        var guestId = this.getAttribute('data-id');
        // Gọi hàm thực hiện AJAX ở đây và truyền guestId cho PHP
        performAjaxGuest(guestId)
    });
});
function performAjaxGuest(guestId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            
            modalGuestEdit.innerHTML = this.responseText
            console.log(this.responseText);
        }
    };
    // Gửi yêu cầu AJAX với data-id
    xhttp.open("GET", "edit-guest.php?guestId=" + guestId, true);
    xhttp.send();
}

// xóa của guest
document.addEventListener('DOMContentLoaded', function () {
    
    $$('.delete').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var guestId = this.getAttribute('data-id-delete');
            console.log(guestId)
            if (confirm('Bạn có chắc chắn muốn xóa khách hàng có mã ' + guestId + ' không?')) {
                // Gửi yêu cầu xóa đến server
                deleteGuest(guestId);
            }
        });
    });

    // Hàm gửi yêu cầu xóa đến server
    function deleteGuest(guestId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'delete-guest.php?delete_id=' + guestId, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                
                window.location.reload();
            }
        };
        xhr.send();
    }
});
