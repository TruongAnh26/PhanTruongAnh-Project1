const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)
const btnCategoryAdd = $('.btn-add')
const modalCategoryAdd = $('.modal-add-category')
const btnCloseAdd = $('.close-icon-add')

// xử lý khi nhấn Enter sẽ tìm kiếm
const searchBtn = $('.input-search')
const searchForm = $('#search-form')
searchBtn.keypress = (e) => {
    if (e.keycode === 13) {
        searchForm.submit();
    }
}


btnCategoryAdd.onclick = () => {
    btnCategoryAdd.preventDefault
    modalCategoryAdd.classList.add('open')
}


btnCloseAdd.onclick = () => {
    modalCategoryAdd.classList.remove('open')
}

modalCategoryAdd.onclick = (e) => {
    if (e.target.closest('.modal-add-category-container')) {
        e.stopProgapation
    } else {
        modalCategoryAdd.classList.remove('open')

    }
}


