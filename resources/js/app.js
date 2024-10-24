import "./bootstrap";

import Swiper from "swiper/bundle";
import "swiper/css/bundle";

document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper-container", {
        loop: true,
        slidesPerView: 5, // Adjusts the number of slides shown based on container width
        centeredSlides: true,
        spaceBetween: 5, // Adjust this value for space between slides
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    console.log("Swiper initialized:", swiper);
});
