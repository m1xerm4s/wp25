<?php
define("_Rosait2025", 1);
//Кастомизация темы
require get_template_directory() . '/inc/customizer.php';

//Функции для админской части сайта
require get_template_directory() . '/inc/admin.php';

// Подключение сервисных функций
require get_template_directory() .'/inc/template-functions.php';

// Подключение Стилей и скриптов темы
require get_template_directory() .'/inc/enqueue_scripts.php';

// Подключение функционала для хедера
require 'functions-parts/rs-header-functions.php';

// Подключение функционала для футера
require 'functions-parts/rs-footer-functions.php';

// Подключение функционала блоков шаблонов страниц
require 'functions-parts/rs-page-functions.php';

//Подключение функционала блоков Преимуществ / «Как мы работаем»
require 'functions-parts/rs-features/rs-features-functions.php';

//Подключение функционала текстовых блоков /Блок «Таблица»
require 'functions-parts/rs-text/rs-text-functions.php';

//Подключение функционала блока  Parallax / Фоновое видео /Блок «Цитата» /Блок «Цифры»/«До окончания акции осталось»
require 'functions-parts/rs-parallax/rs-parallax-functions.php';

//Подключение функционала блока  «Адаптивная фотогалерея»/«Фотогалерея c подписями»/«Логотипы клиентов»/галерея «Видео»
require 'functions-parts/rs-gallery/rs-gallery-functions.php';

// Подключение функционала блока «Блок с переключателями» / Блок «Аккордеон»
require 'functions-parts/rs-tabs/rs-tabs-functions.php';

// Подключение функционала для ФОРМ
require 'functions-parts/rs-forms/rs-forms-functions.php';

//Подключение функционала Новостей
require 'functions-parts/rs_news/rs-news-functions.php';

//Подключение функционала Команда
require 'functions-parts/rs_team/rs-team-functions.php';

//Подключение функционала Альбомы
require 'functions-parts/rs_alboms/rs-alboms-functions.php';

//Подключение функционала Отзывы
require 'functions-parts/rs_reviews/rs-reviews-functions.php';

//Подключение функционала Отзывы
require 'functions-parts/rs_slider/rs-slider-functions.php';

//Подключение функционала Услуги/Каталог
require 'functions-parts/rs_services/rs-services-functions.php';


function __extend_http_request_timeout( $timeout ) {
    return 60; // seconds
}
add_filter( 'http_request_timeout', '__extend_http_request_timeout' );