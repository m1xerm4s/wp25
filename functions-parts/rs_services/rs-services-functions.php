<?php
defined("_Rosait2025") or die("Доступ запрещён");
//Добавление acf полей к записям типа services
if( function_exists('acf_add_local_field_group') ):
    //ACF для записи
    acf_add_local_field_group(array(
        'key' => 'group_services',
        'title' => 'Настройки страницы Услуги',
        'fields' => array(
            array(
                'key' => 'field_67d2dbd53cbb4',
                'label' => 'Заголовок страницы',
                'name' => 'services_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_67d2dc9dd7ed7',
                'label' => 'Каталог',
                'name' => '',
                'type' => 'accordion',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'open' => 0,
                'multi_expand' => 0,
                'endpoint' => 0,
            ),
            array(
                'key' => 'field_67d2dc2ee7b82',
                'label' => '',
                'name' => 'items_catalog',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => 'Добавить элемент',
                'sub_fields' => array(
                    array(
                        'key' => 'field_67d2dc2ee7b83',
                        'label' => 'Изображение',
                        'name' => 'image',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                    array(
                        'key' => 'field_67d2dc2ee7b84',
                        'label' => 'Ссылка',
                        'name' => 'link',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_67d2dc2ee7b85',
                        'label' => 'Размер',
                        'name' => 'size',
                        'type' => 'select',
                        'instructions' => '1/2 - соответствует размеру 2 в ряд;<br>
1/3 - соответствует размеру 3 в ряд;<br>
1/4 - соответствует размеру 4 в ряд;<br>
1/5 - соответствует размеру 5 в ряд;',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            2 => '1/2',
                            3 => '1/3',
                            4 => '1/4',
                            5 => '1/5',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-nastrojki',
                ),
            ),
        ),
        'menu_order' => 2,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
//ACF для страницы Услуги
    acf_add_local_field_group(array(
        'key' => 'group_67d2cb448b70c',
        'title' => 'Настройки страницы услуга',
        'fields' => array(
            array(
                'key' => 'field_67d2cb4490668',
                'label' => 'Вид шапки страницы',
                'name' => 'style_header',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'black' => 'на темном фоне',
                    'white' => 'на светлом фоне',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'white',
                'layout' => 'horizontal',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
            array(
                'key' => 'field_67d2cb7db9f55',
                'label' => 'Вывести меню в сайдбаре',
                'name' => 'on_sidebar',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_67d2cbd3b9f56',
                'label' => 'Меню',
                'name' => 'sidebar_menu',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_67d2cb7db9f55',
                            'operator' => '==',
                            'value' => '1',
                        ),
                    ),
                ),
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    3 => 'Main',
                    5 => 'Информация',
                    6 => 'О нас',
                    4 => 'Услуги',
                ),
                'default_value' => 4,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'services',
                ),
            ),
        ),
        'menu_order' => 10,
        'position' => 'acf_after_title',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
endif;

//Подключение стилей шаблонам
add_action( 'template_redirect', 'rs_template_services_include' );
function rs_template_services_include(){
    //Подключение стилей/скриптов в зависимости от страницы
    global $post;
    if(is_post_type_archive('services') && !is_search()){
     //   add_action( 'wp_print_scripts', 'rs_grid_block_style', 12);
    }
    if(isset($post->post_type) && $post->post_type == 'services' && !is_search()){
        add_action( 'wp_print_scripts', 'rs_services_style', 12);
    }
}
//Изменение шаблонов
add_filter('template_include', 'my_template_services');
function my_template_services( $template ) {
    # шаблон для архива произвольного типа "services"
    global $posts;
    if( is_post_type_archive('services') && !is_search()){
       return get_stylesheet_directory() . '/template-parts/rs_services/archive-services.php';
    }
    if( is_tax('services_cat') && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_services/tax-services.php';
    }
    # шаблон для страниц произвольного типа "services"
    global $post;
    if(isset($post->post_type) && $post->post_type == 'services' && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_services/single-services.php';
    }
    return $template;
}

//Добавление типа записи
add_post_type('services', 'Услуги', array(
    'supports'   => array( 'title', 'thumbnail', 'editor','excerpt','page-attributes' ),
    'menu_icon' => 'dashicons-admin-page',
));
//Добавить свою таксономию (раскомментировать строку ниже)
add_taxonomy('services_cat', "Вид услуги", 'services', $args=array('hierarchical'  => true,));

add_action( 'init', 'services_unregister_tags', 99 );
function services_unregister_tags(){
    unregister_taxonomy_for_object_type( 'post_tag', 'services' );
    unregister_taxonomy_for_object_type( 'category', 'services' );
}

add_filter('post_type_labels_services', 'rename_posts_labels_services');
function rename_posts_labels_services ( $labels ){
    $services = array(
        'name'                  => 'Услуги',
        'singular_name'         => 'Услуга',
        'add_new'               => 'Добавить услугу',
        'add_new_item'          => 'Добавить услугу',
        'edit_item'             => 'Редактировать услугу',
        'new_item'              => 'Новая услуга',
        'view_item'             => 'Просмотреть услугу',
        'search_items'          => 'Поиск услуги',
        'not_found'             => 'Не найдена услуга',
        'not_found_in_trash'    => 'Не найдена услуга',
        'parent_item_colon'     => '',
        'all_items'             => 'Все услуги',
        'archives'              => 'Услуги',
        'insert_into_item'      => 'Вставить в услугу',
        'uploaded_to_this_item' => 'Загруженные для услуги',
        'featured_image'        => 'Изображение (страница Услуг)',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список',
        'menu_name'             => 'Услуги',
        'name_admin_bar'        => 'Услуга', // пункте "добавить"
    );
    return (object) array_merge( (array) $labels, $services );
}

//Блок Каталог
function rs_catalog($content,$key=0){
    add_action( 'wp_footer', 'rs_catalog_style');
    $link=$content['on_btn']?$content['catalog_button']:false;
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-catalog <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-catalog__container">
            <div class="section-header">
            <?php if(!empty($content["blocks_title"])):?>
                <div class="section-header__title">
                        <h2><?=$content["blocks_title"]?></h2>

                </div>
            <?php endif; ?>
                <?php if($link):?>
                <a href="<?=$link['url']?>" class="rs-btn _btn-border-black">
                    <?=$link['title']?>
                </a>
                <?php endif; ?>
            </div>
            <div class="rs-catalog__slider swiper">
                <div class="rs-catalog__swiper swiper-wrapper">
                <?php foreach ($content["items_catalog"] as $item):
                    $item_link=$item['link'];
                    ?>
                    <div class="rs-catalog__slide swiper-slide rs-catalog__slide-<?=$item['size']?>">
                        <div class="rs-catalog__item">
                            <a href="<?=$item_link['url']?>" class="rs-catalog__link">
                                <div class="rs-catalog__img">
                                    <?php if(!empty($item['image'])):?>
                                        <img src="<?=$item['image']?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="rs-catalog__desc">
                                    <h4><?=$item_link['title']?></h4>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
            <?php if($link):?>
            <div class="section-footer">
                <a href="<?=$link['url']?>" class="rs-btn _btn-border-black">
                    <?=$link['title']?>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>
<?php }

//Блок на архивной странице услуг
function rs_services_page(){
    add_action( 'wp_footer', 'rs_catalog_style');
    $items_catalog = get_field("items_catalog",'option');
    ?>
    <section class="rs-catalog">
        <div class="rs-catalog__container">
            <div class="section-header">
                <?php if(!empty(get_field("services_title",'option'))):?>
                    <div class="section-header__title">
                        <h2><?=get_field("services_title",'option')?></h2>
                    </div>
                <?php endif; ?>
            </div>
            <div class="rs-catalog__slider swiper">
                <div class="rs-catalog__swiper swiper-wrapper">
                    <?php foreach ($items_catalog as $item):
                        $item_link=$item['link'];
                        ?>
                        <div class="rs-catalog__slide swiper-slide rs-catalog__slide-<?=$item['size']?>">
                            <div class="rs-catalog__item">
                                <a href="<?=$item_link['url']?>" class="rs-catalog__link">
                                    <div class="rs-catalog__img">
                                        <?php if(!empty($item['image'])):?>
                                            <img src="<?=$item['image']?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="rs-catalog__desc">
                                        <h4><?=$item_link['title']?></h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php }