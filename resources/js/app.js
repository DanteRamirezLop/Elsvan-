import './bootstrap';

import Swiper from 'swiper';
import {
    Navigation,
    Pagination,
    Autoplay,
    EffectFade,
} from 'swiper/modules';




// Estilos generales
import 'swiper/css';

// Estilos de módulos
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/effect-fade';

document.addEventListener('DOMContentLoaded', () => {
    const slider = document.querySelector('.mySwiper');

    if (!slider) {
        return;
    }

    new Swiper(slider, {
        modules: [
            Navigation,
            Pagination,
            Autoplay,
            EffectFade,
        ],


        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,



        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },


        effect: 'fade',
        speed: 800,
            fadeEffect: {
            crossFade: true,
        },

    });
});
