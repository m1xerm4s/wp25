<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Подключение блоков

//Файл для редактирования /functions-parts/rs-text/rs-text-functions.php
//content
add_action('template_on_content', 'rs_content',100,2);
//Текстовый блок (текст + картинка)
add_action('template_on_text-block', 'rs_text_block',100,2);
//Блок «Таблица»
add_action('template_on_table', 'rs_table',100,2);

//Файл для редактирования /functions-parts/rs-features/rs-features-functions.php
// Преимущества (с иконками - главная страница)
add_action('template_on_features-custom', 'rs_features_custom',100,2);

// Преимущества (с иконками 3/4/5 в ряд)
add_action('template_on_features', 'rs_features',100,2);
// Преимущества с картинкой
add_action('template_on_features-img', 'rs_features_img',100,2);
// Блок «как мы работаем»
add_action('template_on_steps', 'rs_steps',100,2);

//Файл для редактирования /functions-parts/rs-parallax/rs-parallax-functions.php
// Параллакс - шапка
add_action('template_on_parallax_top', 'rs_parallax_top',100,2);
// Параллакс
add_action('template_on_parallax', 'rs_parallax',100,2);
// Блок «Цитата»
add_action('template_on_quote', 'rs_quote',100,2);
// Фоновое видео
add_action('template_on_bg-video', 'rs_bg_video',100,2);
//Блок «Цифры»
add_action('template_on_number', 'rs_number',100,2);
//Блок «До окончания акции осталось»
add_action('template_on_timer_act', 'rs_timer_act',100,2);

//Файл для редактирования /functions-parts/rs-gallery/rs-gallery-functions.php
// Блок «Адаптивная фотогалерея»
add_action('template_on_gallery', 'rs_gallery',100,2);
//Блок «Фотогалерея c подписями»
add_action('template_on_slider-block', 'rs_slider_block',100,2);
//Блок «Логотипы клиентов»
add_action('template_on_partners', 'rs_partners',100,2);
//Блок «Видео»
add_action('template_on_block-video', 'rs_block_video',100,2);

//Файл для редактирования functions-parts/rs-tabs/rs-tabs-functions.php
//Блок с переключателями
add_action('template_on_tabs', 'rs_tabs',100,2);
//Блок «Аккордеон»
add_action('template_on_accordion', 'rs_accordion',100,2);
//Блок «Документы»
add_action('template_on_documents', 'rs_documents',100,2);
//Блок «Прайс»
add_action('template_on_tariff', 'rs_tariff',100,2);

//Файл для редактирования functions-parts/rs-forms/rs-forms-functions.php
// Блок «Cвяжитесь с нами»
add_action('template_on_feedback', 'rs_feedback',100,2);
//Блок «Подписаться»
add_action('template_on_subscribe', 'rs_subscribe',100,2);
//Блок «Нужна консультация специалиста»
add_action('template_on_form', 'rs_form',100,2);
//Блок «Контакты»
add_action('template_on_contacts', 'rs_contacts',100,2);
add_action('template_on_contacts_page', 'rs_contacts_page',100,2);


//Файл для редактирования functions-parts/rs_news/rs-news-functions.php
//Новости
add_action('template_on_news', 'rs_news',100,2);

//Файл для редактирования functions-parts/rs_team/rs-team-functions.php
//Наша команда
add_action('template_on_team', 'rs_team',100,2);

//Файл для редактирования functions-parts/rs_alboms/rs-alboms-functions.php
//Альбомы
add_action('template_on_alboms', 'rs_alboms',100,2);

//Файл для редактирования functions-parts/rs_reviews/rs-reviews-functions.php
//Отзывы
add_action('template_on_reviews', 'rs_reviews',100,2);

//Файл для редактирования functions-parts/rs_slider/rs-slider-functions.php
//Слайдер
add_action('template_on_slider', 'rs_slider',100,2);

//Файл для редактирования functions-parts/rs_services/rs-services-functions.php
//Каталог
add_action('template_on_catalog', 'rs_catalog',100,2);
add_action('template_on_services_block', 'rs_services_page',100,2);
