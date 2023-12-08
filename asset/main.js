const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)


// xử lý khi nhấn Enter sẽ tìm kiếm
const searchBtn = $('.input-search')
const searchForm = $('#search-form')
searchBtn.keypress = (e) => {
    if(e.keycode === 13) {
        

        searchForm.submit();
    }
}


