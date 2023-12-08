const formMessages = document.querySelectorAll('.form-message')
const closeIcons = document.querySelectorAll('.close-icon')
const formGroups = document.querySelectorAll('.form-group')
const signInModal = document.querySelector('.sign-in-modal')
const signUpModal = document.querySelector('.sign-up-modal')
const signInBtn = document.querySelector('.btn-sign-in')
const signInContainer = document.querySelector('.sign-in-container')
const changeSignIn = document.querySelector('.change-sign-in')
const changeSignUp = document.querySelector('.change-sign-up')
const btnBuy = document.querySelector('.btn-buy')
function showSignIn () {
    signInModal.classList.add('open')
}

function hideSignIn () {
    signInModal.classList.remove('open')
}
function showSignUp () {
    signUpModal.classList.add('open')
}

function hideSignUp () {
    signUpModal.classList.remove('open')
}

signInBtn.onclick = () => {
    showSignIn()
}


for(const closeIcon of closeIcons) {
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
    for(const formMessage of formMessages) {
        formMessage.innerHTML=''
    }
    for(const formGroup of formGroups) {
        formGroup.classList.remove('invalid')
    }
}

signInModal.onclick = (e) => {
    if(e.target.closest('.form-sign-in')) {
        e.stopProgapation
    } else {
        hideSignIn()
    }
}

signUpModal.onclick = (e) => {
    if(e.target.closest('.form-sign-up')) {
        e.stopProgapation
    } else {
        hideSignUp()
        for(const formMessage of formMessages) {
            formMessage.innerHTML=''
        }
        for(const formGroup of formGroups) {
            formGroup.classList.remove('invalid')
        }
    }
}



