<?php
defined("_Rosait2025") or die("Доступ запрещён");

function add_rs_header(){
    // контейнер для шапки
    add_action( 'rs_action_header', 'rs_header_container', 0 );

    // контейнер для верхней части шапки
    add_action( 'rs_action_header', 'rs_header_top_container', 1 );
        //вывод адреса
        add_action( 'rs_action_header', 'rs_header_location', 5 );
        //вывод контактных данных
        add_action( 'rs_action_header', 'rs_header_contact', 10 );
        //вывод ссылок на соц.сети
        add_action( 'rs_action_header', 'rs_header_social', 20 );
    // закрытие контейнера для верхней части шапки
    add_action( 'rs_action_header', 'rs_header_top_container_close', 30 );

    // контейнер для основной части шапки
    add_action( 'rs_action_header', 'rs_header_body_container', 35 );
        //Вывод Лого
        add_action( 'rs_action_header', 'rs_header_logo', 40 );

        // контейнер для для основной части шапки - блок меню и кнопки
        add_action( 'rs_action_header', 'rs_header_block_container', 45 );

        //Вывод меню
        add_action( 'rs_action_header', 'rs_header_menu', 50 );

        //Вывод кнопок
        add_action( 'rs_action_header', 'rs_header_actions', 70 );

        // закрытие контейнера для основной части шапки - блок меню и кнопки
        add_action( 'rs_action_header', 'rs_header_block_container_close', 95 );
        // закрытие контейнера для основной части шапки
        add_action( 'rs_action_header', 'rs_header_body_container_close', 95 );

    // закрытие контейнера для шапки
    add_action( 'rs_action_header', 'rs_header_container_close', 100 );

}
add_action( 'init', 'add_rs_header', 2);

// контейнер для шапки
function rs_header_container(){
    $style_header = get_field('style_header');
    $header_class = $style_header=='black'?"_header-white":'';?>
    <div class="rs-header <?=$header_class?>">
<?php }
function rs_header_container_close(){ ?>
    </div> <!-- /rs-header -->
<?php }

// контейнер для верхней части шапки
function rs_header_top_container(){ ?>
    <div class="rs-header__top">
        <div class="rs-header__container">
<?php }
function rs_header_top_container_close(){ ?>
        </div> <!-- /rs-header__container -->
    </div> <!-- /rs-header__top -->
<?php }

// контейнер для для основной части шапки
function rs_header_body_container(){ ?>
    <div class="rs-header__body">
        <div class="rs-header__container">
<?php }
function rs_header_body_container_close(){ ?>
        </div> <!-- /rs-header__container -->
    </div> <!-- /rs-header__body -->
<?php }

// контейнер для для основной части шапки - блок меню и кнопки
function rs_header_block_container(){ ?>
    <div class="rs-header__block">
        <div class="rs-header__wrapper">
<?php }
function rs_header_block_container_close(){ ?>
        </div> <!-- /rs-header__wrapper -->
            <?php if(get_field('on_header_modal','options')):
                $header_btn = get_field('header_btn','options');
                $modal = $header_btn['modal'];
                ?>
                <a href="#" class="rs-btn _btn-primary" data-popup="#<?=$modal?>"> <?=$header_btn['title']?> </a>
            <?php endif;?>
    </div> <!-- /rs-header__block -->
<?php

}

//вывод адреса
if ( ! function_exists( 'rs_header_location' ) ) {
function rs_header_location(){
    global $header_address;
    $address ="";
    if(is_array($header_address)) $address = $header_address['address'];
    if(!empty($address)):?>
    <div class="rs-header__location">
        <div class="rs-header__location_text" data-quantity-symbol="70">
            <?=$address?>
        </div>
    </div>
<?php
    endif;
}
}

//вывод контактных данных
if ( ! function_exists( 'rs_header_contact' ) ) {
function rs_header_contact(){
    global  $header_emails, $header_phones;
    if(!empty($header_emails) && !empty($header_phones)):?>
    <div class="rs-header__contact contact">
        <ul class="contact__list">
            <?php if(!empty($header_emails) && is_array($header_emails)):
                foreach ($header_emails as $email):
            ?>
            <li>
                <a href="mailto:<?=$email['e-mail']?>"> <?=$email['e-mail']?> </a>
            </li>
                <?php endforeach;
                endif;
        if (!empty($header_phones) && is_array($header_phones)):
            foreach ($header_phones as $phone):
                ?>
            <li>
                <a href="tel:<?= preg_replace('/[^0-9\+]+/', '', $phone['phone']) ?>"> <?=$phone['phone']?> </a>
            </li>
            <?php endforeach;
                endif;
                ?>
        </ul>
    </div>
<?php
    endif;
}
}

//вывод ссылок на соц.сети
if ( ! function_exists( 'rs_header_social' ) ) {
    function rs_header_social(){
        global $header_socials;
        if(!empty($header_socials) && is_array($header_socials)):?>
        <div class="rs-header__social social">
            <?= social_btn($header_socials)?>
        </div>
   <?php
    endif;
    }
}

//Вывод Лого
if ( ! function_exists( 'rs_header_logo' ) ) {
    /**
     * The header logo
     */
    function rs_header_logo() {
        $logo_white = '';
        $logo_black = '';
        if (get_theme_mod('site_logo_white'))
            $logo_white = get_theme_mod('site_logo_white');
        if (get_theme_mod('site_logo_black'))
            $logo_black = get_theme_mod('site_logo_black');
        ?>
        <div class='rs-header__logo'><a href='<?=FRONT_PAGE_LINK?>'>
            <?php if($logo_white):?>
                <img src="<?=$logo_white?>" alt=''>
            <?php endif; ?>
            <?php if($logo_black):?>
                <img src="<?=$logo_black?>" alt=''>
            <?php endif; ?>
        </a></div>
    <?php }
}

if ( ! function_exists( 'rs_header_menu' ) ) {
    function rs_header_menu(){
        global $header_address, $header_emails, $header_phones, $curent_lang ;
        ?>
        <div class="rs-header__menu menu">
            <button type="button" class="menu__icon icon-menu">
                <span class="menu__icon_burger">
                <?php if(get_field('select_burger_icon','options')=='svg'):?>
                    <?php parse_svg(get_field('svg_burger','options'));?>
                <?php else: ?>
                    <img src="<?=get_field('svg_burger','options')?>" height="17" width="17" alt="burger">
                <?php endif; ?>
                </span>
                <?php if(!empty(get_field('title_btn_burger','options'))):?>
                    <span class="menu__icon_text">
                        <span><?=get_field('title_btn_burger','options')?></span>
                        <?php if(!empty(get_field('title_btn_burger_open','options'))):?>
                            <span><?=get_field('title_btn_burger_open','options')?></span>
                        <?php endif; ?>
                    </span>
                <?php endif; ?>
            </button>

            <div class="menu__block">
            <?php
            //Вывод основного меню
            wp_nav_menu( [
                'theme_location'  => '',//расположение меню в шаблоне
                'menu'            => 3,// id, слаг или название меню
                'container'       => 'nav',//Чем оборачивать ul тег
                'container_class' => 'menu__body', //class у контейнера меню
                'container_id'    => '', //id у контейнера меню
                'menu_class'      => 'menu__list', //class у тега ul
                'menu_id'         => '', //id у тега ul
                'echo'            => true, //Выводить на экран (true) или возвратить для обработки (false).
                'fallback_cb'     => false, // колбэк функция, если меню не существует,
                'before'          => '', //Текст перед тегом <a> в меню
                'after'           => '', //Текст после каждого тега </a> в меню
                'link_before'     => '', //Текст перед анкором каждой ссылки в меню
                'link_after'      => '', //Текст после анкора каждой ссылки в меню
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>', //Шаблон обёртки для элементов меню
                'depth'           => 0, // уровни вложенности. 0 - все уровни.
                'walker'          => '',//Класс, который будет использоваться для построения меню
            ] );
            ?>
            <?php /*Вывод формы поиска*/
                if (get_field('on_search', 'options')):?>
                <div class="rs-header__search search">
                    <div class="search__block">
                        <div class="search__wrapper">
                            <?php get_search_form(); ?>
                        </div>
                        <?php if(get_field('on_often_searched','options')):
                        //Вывод списка популярных поисковых запросов
                            $often_searched = get_field('often_searched','options');
                        ?>
                        <div class="search__result" hidden>
                            <div class="search__result_head"><?=$often_searched['title']?></div>
                            <?php if(is_array($often_searched['poiskovye_zaposy']) && !empty($often_searched['poiskovye_zaposy'])):?>
                            <div class="search__result_list">
                                <ul>
                                    <?php foreach ($often_searched['poiskovye_zaposy'] as $value):
                                        $link=$value['link'];
                                        if(empty($link)) $link = add_query_arg( 's', $value['search_txt'], FRONT_PAGE_LINK );
                                        ?>
                                    <li>
                                        <a href="<?=$link?>"><?=$value['search_txt']?>
                                            <?php if(!empty($value['type'])):?>
                                            <span><?=$value['type']?></span>
                                            <?php endif;?>
                                        </a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <?php endif;?>
                        </div>
                        <?php endif;?>
                    </div>
                </div>
                <?php endif;?>
                <?php if(!empty(get_field('on_header_modal','options')) || !empty($header_address) || !empty($header_emails) || !empty($header_phones)):
                    //Контактная информация (мобильные устройства)
                    ?>
                <div class="menu__contact">
                <?php if(!empty($header_address) || !empty($header_emails) || !empty($header_phones)):?>
                    <h6><?=get_field('title_contact_mobile','options')?></h6>
                    <ul class="menu__list">
                        <?php if (!empty($header_phones) && is_array($header_phones)):
                            foreach ($header_phones as $phone):
                                ?>
                                <li class="menu-item">
                                    <a href="tel:<?= preg_replace('/[^0-9\+]+/', '', $phone['phone']) ?>"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                                                                               xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                    d="M0 2.08333C0 9.21701 5.78299 15 12.9167 15C13.2385 15 13.5576 14.9882 13.8736 14.9651C14.2362 14.9385 14.4174 14.9253 14.5825 14.8302C14.7192 14.7516 14.8488 14.6121 14.9173 14.47C15 14.2985 15 14.0984 15 13.6983V11.3506C15 11.0141 15 10.8459 14.9446 10.7016C14.8957 10.5743 14.8163 10.4608 14.7133 10.3713C14.5966 10.27 14.4385 10.2125 14.1223 10.0975L11.45 9.12574C11.0821 8.99196 10.8981 8.92507 10.7236 8.93643C10.5697 8.94644 10.4216 8.99896 10.2958 9.08814C10.1531 9.18928 10.0524 9.35712 9.85098 9.69281L9.16667 10.8333C6.95845 9.83325 5.16825 8.04073 4.16667 5.83333L5.30719 5.14902C5.64288 4.94761 5.81072 4.8469 5.91186 4.70422C6.00104 4.5784 6.05356 4.43031 6.06357 4.27641C6.07493 4.10189 6.00804 3.91794 5.87426 3.55004L4.90249 0.877676C4.7875 0.561468 4.73001 0.403361 4.62868 0.286747C4.53918 0.183741 4.42575 0.10429 4.29835 0.0553761C4.15413 0 3.9859 0 3.64943 0H1.30168C0.901565 0 0.701509 0 0.529983 0.0827107C0.387919 0.151214 0.248448 0.280845 0.169752 0.417527C0.0747351 0.582555 0.0614592 0.763849 0.0349075 1.12644C0.0117715 1.44238 0 1.76148 0 2.08333Z"
                                                    fill="var(--icons-menu-color)" />
                                        </svg><?=$phone['phone']?> </a>
                                </li>
                            <?php endforeach;
                        endif; ?>
                        <?php if(!empty($header_emails) && is_array($header_emails)):
                        foreach ($header_emails as $email):
                        ?>
                        <li class="menu-item">
                            <a href="mailto:<?=$email['e-mail']?>"><svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M0.0464863 3.42582C0.235997 2.60943 0.98271 2 1.875 2H13.125C14.0173 2 14.764 2.60943 14.9535 3.42582L7.5 7.87953L0.0464863 3.42582ZM0 4.47233V10.9839L5.44049 7.72319L0 4.47233ZM6.33881 8.25996L0.179879 11.9512C0.480566 12.5712 1.12657 13 1.875 13H13.125C13.8734 13 14.5194 12.5712 14.8201 11.9512L8.66119 8.25996L7.5 8.95381L6.33881 8.25996ZM9.55951 7.72319L15 10.9839V4.47233L9.55951 7.72319Z"
                                            fill="var(--icons-menu-color)" />
                                </svg><?=$email['e-mail']?> </a>
                        </li>
                        <?php endforeach;
                        endif;?>
                        <?php
                        $address ="";
                        if(is_array($header_address)) $address = $header_address['address'];
                        if(!empty($address)):?>
                        <li class="menu-item">
                            <a href="#">
                                <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M7.32031 15C7.32031 15 13.3203 9.6691 13.3203 5.625C13.3203 2.5184 10.634 0 7.32031 0C4.0066 0 1.32031 2.5184 1.32031 5.625C1.32031 9.6691 7.32031 15 7.32031 15ZM7.32031 8.4375C5.66346 8.4375 4.32031 7.1783 4.32031 5.625C4.32031 4.0717 5.66346 2.8125 7.32031 2.8125C8.97717 2.8125 10.3203 4.0717 10.3203 5.625C10.3203 7.1783 8.97717 8.4375 7.32031 8.4375Z"
                                            fill="var(--icons-menu-color)" />
                                </svg>
                                <?=$address?>
                            </a>
                        </li>
                    <?php endif;?>
                    </ul>
                <?php endif;?>
                    <?php
                    //Вывод кнопки вызова формы обратной связи (мобильный)
                    if(get_field('on_header_modal','options')):
                        $header_btn = get_field('header_btn','options');
                        $modal = $header_btn['modal'];
                        ?>
                        <a href="#" class="rs-btn _btn-primary" data-popup="#<?=$modal?>"> <?=!empty($header_btn['title_mobile'])?$header_btn['title_mobile']:$header_btn['title']?> </a>
                    <?php endif;?>
                </div>
                <?php endif;?>
                <?php
                //вывод языковых версий (мобильный)
                    if($curent_lang):
                        $arg = array(
                            'class_container'=>'menu__language',
                            'class_ul'=>'menu__list',
                            'class_li'=>'menu-item',
                            'style_icon'=>true
                        );
                        header_language($arg);
                    endif;
                ?>
                <?php
                //вывод кнопок социальных сетей (мобильный)
                rs_header_social();
                ?>
            </div>
        </div>
<?php
    }
}
if ( ! function_exists( 'rs_header_actions' ) ) {
    function rs_header_actions(){
        global  $curent_lang,$table_phones ;
        ?>
        <div class="rs-header__actions">
            <?php if(!empty($table_phones) && is_array($table_phones)):
            //кнопка телефона (планшет)/
                foreach ($table_phones as $phone):?>
                    <a class="rs-header__phone" title="<?=$phone['phone']?>" href="tel:<?= preg_replace('/[^0-9\+]+/', '', $phone['phone']) ?>"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                                                                                            xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.2"
                                      d="M8.76608 12.0433C9.5215 13.5877 10.7734 14.8339 12.3212 15.5823C12.4345 15.636 12.5597 15.6592 12.6847 15.6498C12.8096 15.6403 12.93 15.5985 13.0339 15.5284L15.3129 14.0087C15.4137 13.9415 15.5297 13.9005 15.6504 13.8894C15.771 13.8783 15.8925 13.8975 16.0039 13.9452L20.2676 15.7725C20.4124 15.834 20.5333 15.941 20.6121 16.0772C20.6909 16.2134 20.7233 16.3715 20.7044 16.5278C20.5696 17.5823 20.0551 18.5515 19.2571 19.254C18.4592 19.9565 17.4326 20.3441 16.3695 20.3441C13.086 20.3441 9.93695 19.0398 7.61517 16.718C5.29338 14.3962 3.98901 11.2472 3.98901 7.96368C3.98907 6.90058 4.37663 5.87395 5.07911 5.07601C5.7816 4.27808 6.75085 3.76356 7.80538 3.62879C7.96161 3.60989 8.11974 3.64227 8.25597 3.72105C8.39219 3.79983 8.49912 3.92075 8.56065 4.06559L10.3895 8.33301C10.4369 8.44339 10.4561 8.56376 10.4457 8.68339C10.4352 8.80302 10.3953 8.91821 10.3295 9.01869L8.81507 11.3327C8.74614 11.4368 8.70539 11.557 8.69681 11.6816C8.68822 11.8061 8.71208 11.9308 8.76608 12.0433Z"
                                      fill="#6366F1" />
                                <path
                                        d="M8.76608 12.0433C9.5215 13.5877 10.7734 14.8339 12.3212 15.5823C12.4345 15.636 12.5597 15.6592 12.6847 15.6498C12.8096 15.6403 12.93 15.5985 13.0339 15.5284L15.3129 14.0087C15.4137 13.9415 15.5297 13.9005 15.6504 13.8894C15.771 13.8783 15.8925 13.8975 16.0039 13.9452L20.2676 15.7725C20.4124 15.834 20.5333 15.941 20.6121 16.0772C20.6909 16.2134 20.7233 16.3715 20.7044 16.5278C20.5696 17.5823 20.0551 18.5515 19.2571 19.254C18.4592 19.9565 17.4326 20.3441 16.3695 20.3441C13.086 20.3441 9.93695 19.0398 7.61517 16.718C5.29338 14.3962 3.98901 11.2472 3.98901 7.96368C3.98907 6.90058 4.37663 5.87395 5.07911 5.07601C5.7816 4.27808 6.75085 3.76356 7.80538 3.62879C7.96161 3.60989 8.11974 3.64227 8.25597 3.72105C8.39219 3.79983 8.49912 3.92075 8.56065 4.06559L10.3895 8.33301C10.4369 8.44339 10.4561 8.56376 10.4457 8.68339C10.4352 8.80302 10.3953 8.91821 10.3295 9.01869L8.81507 11.3327C8.74614 11.4368 8.70539 11.557 8.6968 11.6816C8.68822 11.8061 8.71208 11.9308 8.76608 12.0433V12.0433Z"
                                        stroke="#6366F1" stroke-width="1.94203" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                <path
                                        d="M14.8599 4.32227C16.0944 4.6543 17.2201 5.30489 18.1241 6.20889C19.0281 7.11289 19.6787 8.23856 20.0107 9.47314"
                                        stroke="#6366F1" stroke-width="1.94203" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                <path
                                        d="M14.1057 7.13672C14.8465 7.33594 15.5219 7.7263 16.0643 8.2687C16.6067 8.8111 16.997 9.4865 17.1962 10.2272"
                                        stroke="#6366F1" stroke-width="1.94203" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg></a>
                <?php endforeach;
            endif; ?>
            <?php
            if($curent_lang):
                //вывод языковых версий (десктоп)
                ?>
                <div class="rs-header__language">
                    <?php
                        $link=FRONT_PAGE_LINK;
                        if(is_array($curent_lang["link"])){
                            $link=$curent_lang["link"]["url"];
                        }
                        ?>
                        <a href="<?=$link?>" class="rs-header__language_current"><?=$curent_lang["cod"]?></a>
                    <?php
                        $arg = array(
                            'class_container'=>'rs-header__language_body',
                            'class_ul'=>'',
                            'class_li'=>'',
                            'style_icon'=>false
                        );
                        header_language($arg);
                    ?>
                </div>
            <?php endif; ?>
            <!--кнопка поиска (десктоп)-->
            <?php if(get_field('on_search','options')):?>
			<a href="#" class="rs-header__search-btn search-show">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <circle opacity="0.2" cx="10.8203" cy="10.5" r="7.5"
                            fill="var(--primary-color)" />
                    <path
                            d="M16.1158 15.8111L21.3203 21M18.3203 10.5C18.3203 14.6421 14.9624 18 10.8203 18C6.67818 18 3.32031 14.6421 3.32031 10.5C3.32031 6.35786 6.67818 3 10.8203 3C14.9624 3 18.3203 6.35786 18.3203 10.5Z"
                            stroke="var(--primary-color)" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                </svg>
            </a>
        <?php endif;?>
		</div>
<?php }
}

if ( ! function_exists( 'header_language' ) ) {
//Вывод языковых версий сайта
function header_language($arg=array()){
    $header_language = get_field('language','options');
    if(!empty($header_language) && is_array($header_language)):
        $default = array(
            'class_container'=>'',
            'class_ul'=>'',
            'class_li'=>'',
            'style_icon'=>false
        );
        if(!empty($arg)):  $arg =array_merge($default, $arg);
        endif;
        ?>
        <div class="<?=$arg['class_container']?>">
            <ul class="<?=$arg['class_ul']?>">
                <?php foreach ($header_language as $language):
                    $link=FRONT_PAGE_LINK;
                    if(is_array($language["link"])){
                        $link=$language["link"]["url"];
                    }
                    ?>
                <li class="<?=$arg['class_li']?><?php if($language["default"]): ?> current_menu_item<?php endif;?>" >
                    <a href="<?=$link?>" title="<?=$language["name"]?>">
                        <?php if($arg['style_icon']):?>
                            <?php if($language['select_lang_icon']=='svg'):?>
                                <?php parse_svg($language["svg"])?><?=$language["name"]?>
                            <?php else:?>
                                <img src="<?=$language["icon"]?>" alt="icon <?=$language["name"]?>" width="15" height="15"><?=$language["name"]?>
                            <?php endif;?>
                        <?php else:?>
                            <?=$language["cod"]?>
                        <?php endif;?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
<?php
endif;
}
}
// Фильтр классов ul выпадающего меню
add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu_child', 10, 3 );
function change_wp_nav_menu_child( $classes, $args, $depth ) {
   // var_dump($args->menu);
    if($args->menu==3){
        foreach ( $classes as $key => $class ) {
            if ( $class == 'sub-menu' ) {
                $classes[ $key ] = 'menu__dropdown_list';
            }
        }
    }
    if($args->menu==7){
        foreach ( $classes as $key => $class ) {
            if ( $class == 'sub-menu' ) {
               // $classes[ $key ] = 'menu__dropdown_list';
            }
        }
    }
    return $classes;
}
// Фильтр классов li меню
add_filter( 'nav_menu_css_class', 'change_menu_item_css_classes', 10, 4 );
function change_menu_item_css_classes( $classes, $item, $args, $depth ) {
    if($args->menu==3) {
        foreach ($classes as $key => $class) {
            if ($class == 'menu-item-has-children') {
                $classes[$key] = 'menu__dropdown';
            }
            if ($class == 'current-menu-item' || $class == 'current-menu-parent' || $class == 'current-menu-ancestor') {
                $classes[$key] = 'current_menu_item';
            }
        }
    }
    if($args->menu==7) {
        /*foreach ($classes as $key => $class) {
            if ($class == 'menu-item-has-children') {
                $classes[$key] = 'menu__dropdown';
            }
            if ($class == 'current-menu-item' || $class == 'current-menu-parent' || $class == 'current-menu-ancestor') {
                $classes[$key] = 'current_menu_item';
            }
        }*/
    }
    return $classes;
}