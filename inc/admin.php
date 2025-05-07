<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Удалить панель приветствия из панели администратора WordPress.
add_action(
    'admin_init',
    function () {
        remove_action( 'welcome_panel', 'wp_welcome_panel' );
    }
);

add_action('wp_dashboard_setup', 'clear_dash',9999);
function clear_dash(){
    $side = &$GLOBALS['wp_meta_boxes']['dashboard']['side']['core'];
    $normal = &$GLOBALS['wp_meta_boxes']['dashboard']['normal']['core'];

    //Скрываем meta_box WordPress
    unset($side['dashboard_quick_press']); //Быстрая публикация
    unset($side['dashboard_recent_drafts']); // Последние черновики
    unset($side['dashboard_primary']); //Блог WordPress
    unset($side['dashboard_secondary']); //Другие Новости WordPress

    unset($normal['dashboard_incoming_links']); //Входящие ссылки
    unset($normal['dashboard_right_now']); //Прямо сейчас
    unset($normal['dashboard_recent_comments']); //Последние комментарии
    unset($normal['dashboard_plugins']); //Последние Плагины

    unset($normal['dashboard_right_now']); //На виду
    unset($normal['dashboard_activity']); //Активность
    unset($normal['dashboard_site_health']); //Здоровье сайта

    unset($normal['duplicator_dashboard_widget']); //
    unset($normal['wpseo-dashboard-overview']); //
    unset($normal['wpseo-wincher-dashboard-overview']); //

    //Выводим свой meta_box
    wp_add_dashboard_widget(
        'help_widget', //Слаг виджета
        'Добро пожаловать в РСУ', //Заголовок виджета
        'help' //Функция вывода
    );

}
function help() {
    echo '<p><a href="https://rosait.ru/wordpress-instruktsiya/" target="_blank">Руководство по работе</a> с системой управления WordPress</p>';
    echo '<p>Техническая поддержка: support@rosait.ru<p>';
    echo '<p>Отдел продаж: +7 (800) 222-90-72 по всей России (бесплатно)<p>';
    echo '<hr/><p>РСУ - Россайт Система управления для Wordpress</p>';
}

## Удаление пунктов админ меню
function remove_menus(){
    remove_menu_page( 'edit-comments.php' );//Комментарии
    remove_menu_page( 'edit.php' );
}
add_action( 'admin_menu', 'remove_menus',9999 );

##  отменим показ выбранного термина наверху в checkbox списке терминов
add_filter( 'wp_terms_checklist_args', 'set_checked_ontop_default', 10 );
function set_checked_ontop_default( $args ) {
    // изменим параметр по умолчанию на false
    if( ! isset($args['checked_ontop']) )
        $args['checked_ontop'] = false;

    return $args;
}

## Позволяет удобно фильтровать (искать) элементы таксономии по назанию, когда их очень много
add_action( 'admin_print_scripts', 'my_admin_term_filter', 99 );
function my_admin_term_filter() {
    $screen = get_current_screen();

    if( 'post' !== $screen->base ) return; // только для страницы редактирования любой записи
    ?>
    <script>
        jQuery(document).ready(function($){
            var $categoryDivs = $('.categorydiv');

            $categoryDivs.prepend('<input type="search" class="fc-search-field" placeholder="фильтр..." style="width:100%" />');

            $categoryDivs.on('keyup search', '.fc-search-field', function (event) {

                var searchTerm = event.target.value,
                    $listItems = $(this).parent().find('.categorychecklist li');

                if( $.trim(searchTerm) ){
                    $listItems.hide().filter(function () {
                        return $(this).text().toLowerCase().indexOf(searchTerm.toLowerCase()) !== -1;
                    }).show();
                }
                else {
                    $listItems.show();
                }
            });
        });
    </script>
    <?php
}

//Скрыть плагины
add_filter(
    'all_plugins',
    function ( $plugins ) {
        $shouldHide = ! array_key_exists( 'show_all', $_GET );
        if ( $shouldHide ) {

            $hiddenPlugins = [
                'acf-gallery/acf-gallery.php',
                'acf-options-page/acf-options-page.php',
                'acf-repeater/acf-repeater.php',
            ];

            foreach ( $hiddenPlugins as $hiddenPlugin ) {
                unset( $plugins[ $hiddenPlugin ] );
            }

        }

        return $plugins;
    }
);

add_filter( 'plugin_action_links', 'disable_plugin_deactivation', 10, 2 );
function disable_plugin_deactivation( $actions, $plugin_file ) {
    // Удаляет действие "Редактировать" у всех плагинов
    unset( $actions['edit'] );

    // Удаляет действие "Деактивировать" у важных для сайта плагинов
    $important_plugins = array(
        'advanced-custom-fields/acf.php',
        'contact-form-7/wp-contact-form-7.php',
        //'better-search/better-search.php',
       // 'acf-better-search/acf-better-search.php',
    );
    if ( in_array( $plugin_file, $important_plugins ) ) {
        unset( $actions['deactivate'] );
        $actions[ 'info' ] = '<b class="musthave_js">Обязателен для сайта</b>';
    }

    return $actions;
}

// удаляем груповые действия: деактивировать и удалить
add_filter( 'admin_print_footer_scripts-plugins.php', 'disable_plugin_deactivation_hide_checkbox' );
function disable_plugin_deactivation_hide_checkbox( $actions ){
    ?>
    <script>
        document.querySelectorAll( '.musthave_js' ).forEach( function( element ){
            element.closest( 'tr' ).querySelector( 'input[type="checkbox"]' ).remove();
        } );
    </script>
    <?php
}

/* ОТКЛЮЧЕНИЕ АВТОСОХРАНЕНИЯ */
function disable_autosave() {
    wp_deregister_script("autosave");
}
//add_action("admin_init", "disable_autosave");