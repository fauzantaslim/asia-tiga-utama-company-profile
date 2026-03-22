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

// Make Swiper available globally
window.Swiper = Swiper;
window.SwiperModules = { Autoplay, EffectFade, Navigation, Pagination };

// Configure NProgress
NProgress.configure({
    showSpinner: false,
    speed: 500,
    minimum: 0.2,
});

// START ALPINE BEFORE TURBO EVENTS
Alpine.start();

// Turbo event listeners for NProgress
document.addEventListener("turbo:visit", () => {
    NProgress.start();
});

// Helper function to reset mobile menu
const resetMobileMenu = () => {
    const header = document.querySelector("header[x-data]");
    if (header && window.Alpine) {
        try {
            const data = window.Alpine.$data(header);
            if (data) {
                data.mobileMenuOpen = false;
                console.log("Mobile menu reset to: false");
            }
        } catch (e) {
            console.warn("Failed to reset mobile menu via Alpine:", e);
        }
    }
    // Fallback: force-hide the DOM element
    const mobileMenu = document.querySelector('[x-show="mobileMenuOpen"]');
    if (mobileMenu) {
        mobileMenu.style.display = 'none';
    }
};

// Close mobile menu before navigation
document.addEventListener("turbo:before-visit", resetMobileMenu);

document.addEventListener("turbo:load", () => {
    NProgress.done();
    
    // Explicitly reset menu on every page load
    resetMobileMenu();

    // Re-initialize Fancybox on every page load (Turbo doesn't re-run scripts)
    if (typeof Fancybox !== 'undefined') {
        Fancybox.unbind('[data-fancybox="gallery"]');
        Fancybox.bind('[data-fancybox="gallery"]', {
            Thumbs: { type: 'classic' },
        });
    }

    // Refresh AOS animations on page load
    if (typeof AOS !== "undefined") {
        AOS.refresh();
    }

    // Initialize Swiper for hero background
    const heroSection = document.getElementById("hero");
    if (heroSection) {
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

    // Initialize Flipbook if container exists
    const flipbookContainer = document.getElementById("flipbook-container");
    const pdfUrl = flipbookContainer?.dataset.pdfUrl;

    if (flipbookContainer && pdfUrl && !flipbookContainer.dataset.initialized) {
        flipbookContainer.dataset.initialized = 'true';
        import("./flipbook.js").then((module) => {
            module.initFlipbook(flipbookContainer, pdfUrl);
        }).catch(err => {
            console.error("Failed to load flipbook module", err);
        });
    }
});

document.addEventListener("turbo:submit-start", () => {
    NProgress.start();
});

document.addEventListener("turbo:submit-end", () => {
    NProgress.done();
});

document.addEventListener("turbo:before-cache", () => {
    // Destroy all Swiper instances before caching
    const swipers = document.querySelectorAll(".swiper");
    swipers.forEach((swiper) => {
        if (swiper.swiper) {
            swiper.swiper.destroy(true, true);
        }
    });

    // Force close mobile menu in the cached snapshot
    resetMobileMenu();
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
