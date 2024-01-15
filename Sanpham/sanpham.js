const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const menuItems = document.querySelectorAll('.menu-item')
const modalProductDetail = document.querySelector('.product-detail-modal')


const showDetail = () => {
    modalProductDetail.classList.add('open')
}
const hideDetail = () => {
    modalProductDetail.classList.remove('open')
}
for (let menuItem of menuItems) {
    menuItem.onclick = () => {
        showDetail()
    }
}


modalProductDetail.onclick = (e) => {
    if (e.target.closest('.product-detail-wrap')) {
        e.stopProgapation
    } else {
        hideDetail()

    }
}

const formMessages = document.querySelectorAll('.form-message')
const closeIcons = document.querySelectorAll('.close-icon')
const formGroups = document.querySelectorAll('.form-group')
const signInModal = document.querySelector('.sign-in-modal')
const signUpModal = document.querySelector('.sign-up-modal')
// const signInBtn = document.querySelector('.btn-sign-in')
const signInContainer = document.querySelector('.sign-in-container')
const changeSignIn = document.querySelector('.change-sign-in')
const changeSignUp = document.querySelector('.change-sign-up')
const btnBuy = document.querySelector('.btn-buy')
function showSignIn() {
    signInModal.classList.add('open')
}

// signInBtn.onclick = () => {
//     showSignIn()
// }


function hideSignIn() {
    signInModal.classList.remove('open')
}
function showSignUp() {
    signUpModal.classList.add('open')
}

function hideSignUp() {
    signUpModal.classList.remove('open')
}

// btnBuy.onclick = () => {
//     showSignIn()
// }


for (const closeIcon of closeIcons) {
    closeIcon.onclick = () => {
        hideSignIn()
        hideSignUp()
    }
}

changeSignIn.onclick = (e) => {
    e.preventDefault()
    hideSignUp()
    showSignIn()
}

changeSignUp.onclick = (e) => {
    e.preventDefault()
    hideSignIn()
    showSignUp()
    for (const formMessage of formMessages) {
        formMessage.innerHTML = ''
    }
    for (const formGroup of formGroups) {
        formGroup.classList.remove('invalid')
    }
}

signInModal.onclick = (e) => {
    if (e.target.closest('.form-sign-in')) {
        e.stopProgapation
    } else {
        hideSignIn()
    }
}

signUpModal.onclick = (e) => {
    if (e.target.closest('.form-sign-up')) {
        e.stopProgapation
    } else {
        hideSignUp()
        for (const formMessage of formMessages) {
            formMessage.innerHTML = ''
        }
        for (const formGroup of formGroups) {
            formGroup.classList.remove('invalid')
        }
    }
}

menuItems.forEach(function (item) {
    item.addEventListener('click', function () {
        modalProductDetail.classList.add('open')
        var detailId = this.getAttribute('data-id');
        // Gọi hàm thực hiện AJAX ở đây và truyền detailId cho PHP
        performAjax(detailId)
    });
});
function performAjax(detailId) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            modalProductDetail.innerHTML = this.responseText
            console.log(this.responseText);
        }
    };
    // Gửi yêu cầu AJAX với data-id
    xhttp.open("GET", "modal-detail.php?detailId=" + detailId, true);
    xhttp.send();
}



