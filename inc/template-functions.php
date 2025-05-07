<?php
defined("_Rosait2025") or die("Доступ запрещён");

global $popups,$header_address,$header_emails, $header_phones,$table_phones,$header_socials,$header_works,$footer_address, $footer_emails, $footer_phones, $footer_works,$curent_lang;

$popups = get_field("popup_forms",'options');

$curent_lang = get_current_lang();
//Определение глобальных переменных для вывода в шапке и подвале
add_action( 'init', 'set_contacts', 100);
function set_contacts(){
    global $header_address,$header_emails, $header_phones,$table_phones,$footer_address,$header_socials, $header_works, $footer_emails, $footer_phones, $footer_socials, $footer_works;
    $phones = get_field('phones','options');
    $emails = get_field('emails','options');
    $socials = get_field('social','options');
    $full_address = get_field('full_address','options');
    $address=$full_address;
    if(!$address['on_header']) {
        $address = get_field('address','options');
    }
    $header_address = $address['on_header']?$address:false;

    $address=$full_address;
    if(!$address['on_footer']) {
        $address = get_field('address','options');
    }
    $footer_address = $address['on_footer']?$address:false;

    $works = get_field('working_hours','options');
    $header_works =$works['on_header']?$works['works']:false;
    $footer_works =$works['on_footer']?$works['works']:false;

    foreach ($emails as $email){
        if($email['on_header']) $header_emails[]=$email;
        if($email['on_footer']) $footer_emails[]=$email;
    }
    foreach ($phones as $phone){
        if($phone['on_header']) $header_phones[]=$phone;
        if($phone['on_footer']) $footer_phones[]=$phone;
        if($phone['on_table']) $table_phones[]=$phone;

    }
    foreach ($socials as $social){
        if($social['on_header']) $header_socials[]=$social;
        if($social['on_footer']) $footer_socials[]=$social;
    }
}

function get_current_lang(){
    $languages = get_field('language','options');
    $result=false;
    if(is_array($languages) && !empty($languages)):
        foreach ($languages as $language){
            if(!$language["default"]) continue;
            $result=$language;
        }
    endif;
    return $result;
}

function social_btn($socials,$class="social__list"){ ?>
    <ul class="<?=$class?>">
        <?php foreach ($socials as $social):?>
            <li>
                <a href="<?=$social["link"]??'#'; ?>" <?php if($social['target']):?>target="_blank"<?php endif; ?>>
                    <?php if($social["on_svg"]):?>
                        <?//=$social["svg"]?>
                        <?php parse_svg($social["svg_icon"]);?>
                    <?php else:?>
                        <img src="<?=$social["icon"]?>" alt="<?=$social["name"]?>">
                    <?php endif; ?>
                </a>
            </li>
        <?php endforeach;?>
    </ul>
<?php }

function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

// Размер файла
function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
    $arBytes = array(
        0 => array(
            "UNIT" => "tb",
            "VALUE" => pow(1024, 4)
        ),
        1 => array(
            "UNIT" => "gb",
            "VALUE" => pow(1024, 3)
        ),
        2 => array(
            "UNIT" => "mb",
            "VALUE" => pow(1024, 2)
        ),
        3 => array(
            "UNIT" => "kb",
            "VALUE" => 1024
        ),
        4 => array(
            "UNIT" => "b",
            "VALUE" => 1
        ),
    );

    $unit = 0;
    do {
        $result = $bytes / $arBytes[$unit]["VALUE"];
        $unit++;
    }  while  ($result<1) ;


    $result = number_format($result, 2,'.', ' ').' '.$arBytes[$unit-1]["UNIT"];

    return $result;
}

// Подключение обработчика дополнительных типов записей
function add_post_type($name, $label, $args = array()) {
    add_action('init', function() use($name, $label, $args) {
        $upper = ucwords($name);
        $name = strtolower(str_replace(' ', '_', $name));

        $args = array_merge(
            array(
                'public' => true,
                'label' => "$label",
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'capability_type' => 'post',
                'has_archive' => true,
                'labels' => array('add_new_item' => 'Add New'),
                'supports' => array('comments', 'title', 'editor', 'excerpt', 'thumbnail' ),
                'taxonomies' => array('post_tag', 'category'),
            ),
            $args
        );
        register_post_type($name, $args);
    });
}
function add_taxonomy($name, $label, $post_type, $args=array()) {
    $name = strtolower($name);
    add_action('init', function() use($name, $label, $post_type, $args) {
        $args = array_merge(
            array (/*'hierarchical' => true,*/
                'label' => __($label),
                'singular_label' => $name,
                'show_ui'       => true,
                'query_var' => $name),
            $args
        );
        register_taxonomy($name, $post_type, $args);
    }, 0);
}

//Количество записей на страницах - переопределение
add_action( 'pre_get_posts', 'get_posts_per_page');
function get_posts_per_page( $query ){
    if ( !is_admin() && $query->is_search ) {
        $query->set( 'posts_per_page', 10 );
    }
    if ( ! is_admin() && is_post_type_archive('news') ) {
       // $count=get_field('news_posts_per_page',"options");
      //  $query->set( 'posts_per_page', 8);
    }
    if ( ! is_admin() && is_category() ) {
        $query->set( 'posts_per_page', 24 );
    }
}

// поправим html пагинации для функции paginate_links()
add_filter( 'paginate_links_output', 'fix_paginate_links' );
function fix_paginate_links( $html ){

    $html = preg_replace_callback( '/ class=[\'"][^\'"]+[\'"]/', static function( $mm ){

        return strtr( $mm[0], [
            'current'      => '_active',
            'prev'         => 'pagging__arrow pagging__prev',
            'next'         => 'pagging__arrow pagging__next',
            'dots'         => 'pagging__more',
            'page-numbers' => 'pagging__item',
        ] );

    }, $html );

    return $html;
}

function rs_paginate_links($paged=1,$total=1,$pagenum_link=''){
    if ( $total < 2 ) {
        return;
    }
    // Setting up default values based on the current URL.
    $pagenum_link = !empty($pagenum_link)?html_entity_decode( $pagenum_link ):html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    $prev=$paged>1?$paged-1:1;
    $next=$paged<$total?$paged+1:$total;

    $args = [
        'base'         => $pagenum_link,
        'format'       => '?page=%#%',
        'total'        => $total,
        'current'      => max( 1, $paged),
        'show_all'     => 0,
        'end_size'     => 2,
        'mid_size'     => 3,
        'prev_next'    => 0,
        'type' => 'list',
    ];
    ?>
    <div class="pagging">
        <a href="?page=<?=$prev?>" class="pagging__arrow pagging__prev">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M6.66667 9.1665L2.5 4.99984L6.66667 0.83317" stroke="var(--primary-color)"
                      stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <div class="pagging__list">
            <?php $paginate_links = paginate_links( $args );
            if ( $paginate_links )
            echo str_replace("ul class='pagging__item'", "ul class='pagging__list'", $paginate_links);
            ?>
        </div>
        <a href="?page=<?=$next?>" class="pagging__arrow pagging__next">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M2.49935 9.1665L6.66602 4.99984L2.49935 0.833171"
                      stroke="var(--primary-color)" stroke-width="1.66667" stroke-linecap="round"
                      stroke-linejoin="round" />
            </svg>
        </a>
    </div>
<?php }

function rs_paginate_search_links($paged=1,$total=1,$pagenum_link=''){
    if ( $total < 2 ) {
        return;
    }
    // Setting up default values based on the current URL.
    $pagenum_link = !empty($pagenum_link)?html_entity_decode( $pagenum_link ):html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    $prev=$paged>1?$paged-1:1;
    $next=$paged<$total?$paged+1:$total;

    $args = [
        'base'         => $pagenum_link,
        'format'       => 'page/%#%/',
        'total'        => $total,
        'current'      => max( 1, get_query_var('paged')),
        'show_all'     => 0,
        'end_size'     => 2,
        'mid_size'     => 3,
        'prev_next'    => 0,
        'type' => 'list',
    ];
    ?>
    <div class="pagging">
        <a href="page/<?=$prev?>/" class="pagging__arrow pagging__prev">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M6.66667 9.1665L2.5 4.99984L6.66667 0.83317" stroke="var(--primary-color)"
                      stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <div class="pagging__list">
            <?php $paginate_links = paginate_links( $args );
            if ( $paginate_links )
                echo str_replace("ul class='pagging__item'", "ul class='pagging__list'", $paginate_links);
            ?>
        </div>
        <a href="page/<?=$next?>/" class="pagging__arrow pagging__next">
            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M2.49935 9.1665L6.66602 4.99984L2.49935 0.833171"
                      stroke="var(--primary-color)" stroke-width="1.66667" stroke-linecap="round"
                      stroke-linejoin="round" />
            </svg>
        </a>
    </div>
<?php }

function parse_svg($url){
    $svg_file = $url;
    $content = content_url();
    $svg = explode($content, $svg_file);
    $new_url = $_SERVER['DOCUMENT_ROOT'].'/wp-content'.$svg[1];
    if(file_exists($new_url)){
        $svg_content = file_get_contents($new_url);
        echo wp_kses($svg_content,array(
            'svg'=>  array(
                'xmlns'  => array() ,
                'viewBox'=> array() ,
                'width'=> array() ,
                'height'=> array() ,
                'fill'=> array() ,
                'class'=> array() ,
            ),
            'g'=>  array(
                'clip-path'  => array() ,
            ),
            'path'=>  array(
                'd' => array() ,
                'fill' => array() ,
                'fill-rule' => array() ,
                'clip-rule' => array() ,
                'stroke'=> array() ,
                'stroke-width'=> array() ,
                'stroke-linecap'=> array() ,
                'stroke-linejoin'=> array() ,

            ),
            'defs'=>  array(),
            'clipPath'=>  array(
                'id'  => array() ,
            ),
            'rect'=>  array(
                'width'=> array() ,
                'height'=> array() ,
                'fill'=> array() ,
            ),
        ));
    }
}

// Register shortcode
//Ссылка на Россайт
add_shortcode('develop_link', 'shortcode_develop_link');
function shortcode_develop_link ($atts){
    $params = shortcode_atts(
        array(
            'anchor' => 'Разработано в Россайт',
            'url' => 'https://rosait.ru/',
            'class' => '',
            'target' => '_blank'
        ),
        $atts
    );
    $url      = esc_url( $params['url'] );

    return '<a href="' . $url . '" class="' . $params[ 'class' ] . '" target="' . $params[ 'target' ] . '" >' . $params[ 'anchor' ] . '</a>';
}

//Ссылка на сайт
add_shortcode('site_link', 'shortcode_site_link');
function shortcode_site_link ($atts){
    $params = shortcode_atts(
        array(
            'anchor' => $_SERVER['HTTP_HOST'],
            'url' => FRONT_PAGE_LINK,
            'class' => '',
            'target' => '_blank'
        ),
        $atts
    );
    $url      = esc_url( $params['url'] );

    return '<a href="' . $url . '" class="' . $params[ 'class' ] . '" target="' . $params[ 'target' ] . '" >' . $params[ 'anchor' ] . '</a>';
}

//Название  сайта
add_shortcode('site_name', 'shortcode_site_name');
function shortcode_site_name ($atts){
    $params = shortcode_atts(
        array(
            'name' => get_option('blogname'),
            'class' => '',
        ),
        $atts
    );

    return '<strong  class="' . $params[ 'class' ] . '"  >' . $params[ 'name' ] . '</strong>';
}

/* Shortcode: btn_modal
 * Usage:
 * [btn_modal anchor="title" url="#modalID" class="btn_class"]
 */
add_shortcode('btn_modal', 'shortcode_btn_modal');
function shortcode_btn_modal($atts){
    $params = shortcode_atts(
        array(
            'anchor' => 'Оставить заявку',
            'url' => '#feedback',
            'class' => '_btn-primary',
        ),
        $atts
    );

    return '<a href="#" class="rs-btn ' . $params[ 'class' ] . '" data-popup="' . $params[ 'url' ] . '" >' . $params[ 'anchor' ] . '</a>';
}

/* Shortcode: btn_link
 * Usage:
 * [btn_link anchor="title" url="url" class="btn_class" target="_blank"]
 */
add_shortcode('btn_link', 'shortcode_btn_link');
function shortcode_btn_link($atts){
    $params = shortcode_atts(
        array(
            'anchor' => 'Подробнее',
            'url' => '#',
            'class' => '_btn-primary',
            'target' => '_self'
        ),
        $atts
    );
    return '<a href="' . $params[ 'url' ] . '" class="rs-btn ' . $params[ 'class' ] . '" target="' . $params[ 'target' ] . '" >' . $params[ 'anchor' ] . '</a>';
}

/* Shortcode: tabs
 * Usage:
 *  [tabs]
 *    [tab title="title 1"]Your content goes here...[/tab]
 *    [tab title="title 2"]Your content goes here...[/tab]
 *  [/tabs]
 */
function tab_func( $atts, $content = null ) {
    // Извлекаем атрибуты шорткода, устанавливаем значение по умолчанию для title
    extract(shortcode_atts(array(
        'title'  => '',
    ), $atts));
    // Получаем глобальный массив для хранения данных о вкладках
    global $single_tab_array;
    // Добавляем информацию о текущей вкладке в массив
    $single_tab_array[] = array('title' => $title,  'content' => trim(apply_shortcodes($content)));
    // Возвращаем массив с данными о вкладке
    return $single_tab_array;
}
add_shortcode('tab', 'tab_func');
function tabs_func( $atts, $content = null ) {
    // Получаем глобальный массив для хранения данных о вкладках
    global $single_tab_array;
    $single_tab_array = array(); // Очищаем массив перед началом обработки новых вкладок

    // Инициализируем переменные для навигации и контента вкладок
    $tabs_nav = '';
    $tabs_content = '';
    $tabs_output = '';

    $tabs_nav .= '<div data-tabs="991.98,max" data-tabs-animate="500" class="tabs">';
    $tabs_nav .= '<nav data-tabs-titles class="tabs__navigation">';


    // Выполняем шорткод [tab], чтобы получить заголовки и контент вкладок
    apply_shortcodes($content);

    // Обрабатываем данные каждой вкладки из массива
    foreach ($single_tab_array as $tab => $tab_attr_array) {
        $default = ( $tab == 0 ) ? ' class="tabs__title _tab-active"' : ' class="tabs__title"';
        $tabs_nav .= '<button type="button"'.$default.'>'.$tab_attr_array['title'].'<i class="tabs__icon"><svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8.82082 1.91016L5 5.73098L1.17918 1.91016L0 3.0893L5 8.0893L10 3.0893L8.82082 1.91016Z" fill="#fff" /></svg></i></button>';
        $tabs_content .= '<div class="tabs__body">'.$tab_attr_array['content'].'</div>';
    }

    $tabs_nav .= '</nav>';
    $tabs_output = $tabs_nav . '<div data-tabs-body class="tabs__content">' . $tabs_content . '</div>';
    $tabs_output .= '</div>';
    // Возвращаем HTML-код для отображения вкладок
    return $tabs_output;
}
add_shortcode('tabs', 'tabs_func');