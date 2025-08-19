import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Первый слайдер
new Swiper('.js-cases-swiper', {
  modules: [Navigation, Pagination],
  loop: true,
	effect: 'slide',
  slidesPerView: 1,
  spaceBetween: 16,
	autoHeight: true, // подгон высоты под активный слайд
  pagination: {
    el: '.razion-cases-slider .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.razion-cases-slider .swiper-button-next',
    prevEl: '.razion-cases-slider .swiper-button-prev',
  },
  breakpoints: {
    992: { slidesPerView: 2 },
		0: { slidesPerView: 1 },
  },
});

// Второй слайдер (отзывы)
new Swiper('.js-reviews-swiper', {
  modules: [Navigation, Pagination],
  loop: true,
  slidesPerView: 1,
  spaceBetween: 0,
  pagination: {
    el: '.razion-reviews-slider .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.razion-reviews-slider .swiper-button-next',
    prevEl: '.razion-reviews-slider .swiper-button-prev',
  },
});