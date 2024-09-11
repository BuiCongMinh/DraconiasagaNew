const swiper = new Swiper('.mySwiper', {
    // Optional parameters
    loop: true,
    // If we need pagination
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    // Navigation arrowss
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

    autoplay: {
        delay: 3000,
        pauseOnMouseEnter: true
    },
    
    speed: 1000,

});


// Change tabs 
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabItems = $$('.tab-item')
const contents = $$('.content')

const tabActive = $('.tab-item.active')
const line = $('.tabs .line')

line.style.width = tabActive.offsetWidth + "px"
line.style.left = tabActive.offsetLeft + "px"

tabItems.forEach((tab, index) => {
    const content = contents[index]
    tab.onclick = function () {
        $('.tab-item.active').classList.remove('active')
        $('.content.active').classList.remove('active')

        line.style.width = this.offsetWidth + "px"
        line.style.left = this.offsetLeft + "px"

        this.classList.add('active')
        content.classList.add('active')
    }
});



