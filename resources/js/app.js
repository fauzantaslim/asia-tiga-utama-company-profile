import "./bootstrap";

import Alpine from "alpinejs";
import Swiper from "swiper";
import { Autoplay, EffectFade, Navigation, Pagination } from "swiper/modules";

// Import Swiper styles
import "swiper/css";
import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";

// If you want Alpine's instance to be available globally.
window.Alpine = Alpine;

// Initialize Swiper for hero background
document.addEventListener("DOMContentLoaded", function () {
    // Check if we're on a page with hero section
    const heroSection = document.getElementById("hero");
    if (heroSection) {
        // Initialize hero background swiper if it exists
        const heroSwiper = new Swiper(".hero-background-swiper", {
            modules: [Autoplay, EffectFade, Navigation, Pagination],
            effect: "fade",
            fadeEffect: {
                crossFade: true,
            },
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            speed: 1000,
            allowTouchMove: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    }
});

// Initialize AOS (Animate On Scroll)
window.addEventListener("load", () => {
    if (typeof AOS !== "undefined") {
        AOS.init({
            duration: 1000,
            once: true,
        });
    }
});

Alpine.start();
