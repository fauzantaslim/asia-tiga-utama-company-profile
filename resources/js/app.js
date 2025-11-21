import "./bootstrap";

import Alpine from "alpinejs";
import Swiper from "swiper";
import { Autoplay, EffectFade, Navigation, Pagination } from "swiper/modules";

// Import Turbo and NProgress
import * as Turbo from "@hotwired/turbo";
import NProgress from "nprogress";

// Import Swiper styles
import "swiper/css";
import "swiper/css/effect-fade";
import "swiper/css/navigation";
import "swiper/css/pagination";

// Import NProgress styles
import "nprogress/nprogress.css";

// If you want Alpine's instance to be available globally.
window.Alpine = Alpine;

// Configure NProgress
NProgress.configure({
    showSpinner: false,
    speed: 500,
    minimum: 0.2,
});

// Turbo event listeners for NProgress
document.addEventListener("turbo:visit", () => {
    NProgress.start();
});

document.addEventListener("turbo:load", () => {
    NProgress.done();
    AOS.refresh(); // Refresh AOS animations on page load
});

document.addEventListener("turbo:submit-start", () => {
    NProgress.start();
});

document.addEventListener("turbo:submit-end", () => {
    NProgress.done();
});

document.addEventListener("turbo:before-cache", () => {
    // Clean up any Alpine components before caching
    if (typeof Alpine !== "undefined") {
        // Optional: Add any Alpine cleanup logic here if needed
    }
});

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
