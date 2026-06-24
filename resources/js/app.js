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
    const sliderHome = document.querySelector('.sliderHome');
    const sliderBlueprint =  document.querySelector('.sliderBlueprint');

    if (!sliderHome) {
        return;
    }

    new Swiper(sliderHome, {
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

    if (!sliderBlueprint) {
        return;
    }

     new Swiper(sliderBlueprint, {
        modules: [
            Navigation,
            EffectFade,
        ],

        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        effect: 'fade',
        speed: 600,
            fadeEffect: {
            crossFade: true,
        },

    });

});
