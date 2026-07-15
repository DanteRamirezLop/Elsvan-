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

//paquete para ver imagesn en galeria
import 'lightbox2/dist/css/lightbox.min.css';
import '../css/app.css';

import lightbox from 'lightbox2';

//SweeAlert2
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
window.Swal = Swal;

document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuToggle = document.querySelector('#mobile-menu-toggle');
    const mobileMenu = document.querySelector('#mobile-menu-2');
    const mobileMenuIconOpen = document.querySelector('#mobile-menu-icon-open');
    const mobileMenuIconClose = document.querySelector('#mobile-menu-icon-close');

    if (mobileMenuToggle && mobileMenu) {
        mobileMenuToggle.addEventListener('click', () => {
            const isOpen = mobileMenu.classList.toggle('hidden') === false;

            mobileMenu.classList.toggle('flex', isOpen);
            mobileMenuIconOpen.classList.toggle('hidden', isOpen);
            mobileMenuIconClose.classList.toggle('hidden', !isOpen);
            mobileMenuToggle.setAttribute('aria-expanded', isOpen);
        });
    }

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

    const estadisticaNumeros = document.querySelectorAll('.estadistica-numero');

    if (estadisticaNumeros.length) {
        const animateCount = (el) => {
            const target = parseInt(el.dataset.countTarget, 10) || 0;
            const duration = 800;
            const start = performance.now();

            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                el.textContent = Math.floor(progress * target);

                if (progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    el.textContent = target;
                }
            };

            requestAnimationFrame(step);
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animateCount(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        estadisticaNumeros.forEach((numero) => observer.observe(numero));
    }

    const observeFadeIn = (selector, { threshold = 0.15, staggerStep = 0, staggerSize = 1 } = {}) => {
        const elements = document.querySelectorAll(selector);

        if (!elements.length) {
            return;
        }

        const fadeInObserver = new IntersectionObserver((entries, obs) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    if (staggerStep) {
                        const index = [...elements].indexOf(entry.target);
                        entry.target.style.transitionDelay = `${(index % staggerSize) * staggerStep}s`;
                    }

                    entry.target.classList.add('is-visible');
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold });

        elements.forEach((el) => fadeInObserver.observe(el));
    };

    observeFadeIn('.fade-zoom-img', { threshold: 0.2 });
    observeFadeIn('.project-card', { staggerStep: 0.15, staggerSize: 3 });
    observeFadeIn('.article-card', { staggerStep: 0.15, staggerSize: 3 });
    observeFadeIn('.mission-vision-card', { threshold: 0.2, staggerStep: 0.15, staggerSize: 2 });
    observeFadeIn('.info-fade', { threshold: 0.2 });

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


lightbox.option({
    resizeDuration: 300,
    wrapAround: true,
    disableScrolling: true,
    albumLabel: 'Imagen %1 de %2',

});
