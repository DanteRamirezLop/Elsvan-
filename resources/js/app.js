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
    const sliderBlueprints = document.querySelectorAll('.sliderBlueprint');
    const sliderContact = document.querySelector('.sliderContact');


    if (sliderHome) {
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
    }

    if (sliderContact) {
        new Swiper(sliderContact, {
            modules: [
                Navigation,
                Pagination,
                Autoplay,
            ],

            slidesPerView: 1,
            spaceBetween: 16,
            loop: true,

            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 24,
                },
            },

            autoplay: {
                delay: 4000,
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

            speed: 600,
        });
    }

    sliderBlueprints.forEach((sliderBlueprint) => {
        new Swiper(sliderBlueprint, {
            modules: [
                Navigation,
                EffectFade,
            ],

            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,

            navigation: {
                nextEl: sliderBlueprint.querySelector('.swiper-button-next'),
                prevEl: sliderBlueprint.querySelector('.swiper-button-prev'),
            },

            effect: 'fade',
            speed: 600,
            fadeEffect: {
                crossFade: true,
            },

        });
    });

});
