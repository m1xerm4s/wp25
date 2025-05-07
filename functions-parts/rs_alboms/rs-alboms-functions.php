<?php
defined("_Rosait2025") or die("Доступ запрещён");

//Добавление acf полей к записям типа alboms
if( function_exists('acf_add_local_field_group') ):
    //ACF тип записи Альбом
    acf_add_local_field_group(array(
        'key' => 'group_67bd71d6ae34d',
        'title' => 'Содержимое альбома',
        'fields' => array(
            array(
                'key' => 'field_67bd71d6b52dd',
                'label' => 'Название альбома',
                'name' => 'title',
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
                'key' => 'field_67bd71d6b5383',
                'label' => 'Фотогалерея',
                'name' => 'gallery',
                'type' => 'gallery',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'min' => '',
                'max' => '',
                'insert' => 'append',
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
                'key' => 'field_67bd8a48f7dbd',
                'label' => 'Описание',
                'name' => 'description',
                'type' => 'wysiwyg',
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
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'alboms',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    //ACF options_page Настройки страницы Альбомы
    acf_add_local_field_group(array(
        'key' => 'group_alboms',
        'title' => 'Настройки страницы Альбомы',
        'fields' => array (
            array(
                'key' => 'field_67bd6fbc6dd3d',
                'label' => 'Заголовок страницы',
                'name' => 'alboms_title',
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
                'default_value' => 'Альбомы',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_67bd6ff26dd3e',
                'label' => 'Количество записей на странице',
                'name' => 'alboms_posts_per_page',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'default_value' => 8,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_67bd70286dd3f',
                'label' => 'Количество в ряд',
                'name' => 'alboms_count',
                'type' => 'number',
                'instructions' => 'максимально - 4',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'default_value' => 4,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 1,
                'max' => 4,
                'step' => '',
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
        'menu_order' => 5,
        'position' => 'normal',
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
add_action( 'template_redirect', 'rs_template_alboms_include' );
function rs_template_alboms_include(){
    //Подключение стилей/скриптов в зависимости от страницы
    global $post;
    if(is_post_type_archive('alboms') && !is_search()){
        add_action( 'wp_print_scripts', 'rs_grid_block_style', 12);
    }
    if(isset($post->post_type) && $post->post_type == 'alboms' && !is_search()){
        add_action( 'wp_print_scripts', 'rs_pagination_style', 12);
        add_action( 'wp_print_scripts', 'rs_grid_block_style', 12);
    }
}
//Изменение шаблонов
add_filter('template_include', 'my_template_alboms');
function my_template_alboms( $template ) {
    # шаблон для архива произвольного типа "alboms"
    global $posts;
    if( is_post_type_archive('alboms') && !is_search() ){
        return get_stylesheet_directory() . '/template-parts/rs_alboms/archive-alboms.php';
    }
    # шаблон для страниц произвольного типа "alboms"
    global $post;
    if(isset($post->post_type) && $post->post_type == 'alboms' && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_alboms/single-alboms.php';
    }
    return $template;
}

//Добавление типа записи
add_post_type('alboms', 'Альбомы', array(
    'supports'   => array( 'title', 'thumbnail', 'editor','excerpt','page-attributes' ),
    'menu_icon' => 'dashicons-admin-page',
));
//Добавить свою таксономию (раскомментировать строку ниже)
//add_taxonomy('alboms_tag', "Тема альбома", 'alboms', $args=array('hierarchical'  => true,));

add_action( 'init', 'alboms_unregister_tags', 99 );
function alboms_unregister_tags(){
    unregister_taxonomy_for_object_type( 'post_tag', 'alboms' );
    unregister_taxonomy_for_object_type( 'category', 'alboms' );
}

add_filter('post_type_labels_alboms', 'rename_posts_labels_alboms');
function rename_posts_labels_alboms ( $labels ){
    $alboms = array(
        'name'                  => 'Альбом',
        'singular_name'         => 'Альбом',
        'add_new'               => 'Добавить альбом',
        'add_new_item'          => 'Добавить альбом',
        'edit_item'             => 'Редактировать альбом',
        'new_item'              => 'Новый альбом',
        'view_item'             => 'Просмотреть альбом',
        'search_items'          => 'Поиск альбома',
        'not_found'             => 'Не найден альбом',
        'not_found_in_trash'    => 'Не найден альбом',
        'parent_item_colon'     => '',
        'all_items'             => 'Все альбомы',
        'archives'              => 'Альбомы',
        'insert_into_item'      => 'Вставить в альбом',
        'uploaded_to_this_item' => 'Загруженные для альбома',
        'featured_image'        => 'Изображение (страница Альбомы)',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список',
        'menu_name'             => 'Альбомы',
        'name_admin_bar'        => 'Альбом', // пункте "добавить"
    );
    return (object) array_merge( (array) $labels, $alboms );
}

//Блок Альбомы
function rs_alboms($content,$key=0){
    global $post;
    //подключение стиля блока
    add_action( 'wp_footer', 'rs_slider_block_style');
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    if($content['on_select_alboms']){
        $args = array(
        'post_type'	=> 'alboms',
        'publish' => true,
        'include'=> $content['select_alboms'],
        'orderby'   => 'post__in',
    );
    } else {
        $args = array(
        'post_type'	=> 'alboms',
        'posts_per_page' => $content['posts_per_page'],
        'publish' => true,
        'order'		=> 'ASC',
        'orderby' => 'menu_order',
    );
    }
    $myposts = get_posts( $args );
    ?>
    <section id="<?=$anchor?>" class="rs-slider-block <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-slider-block__block">
            <div class="rs-slider-block__container">

                <div class="section-header">
                    <div class="section-header__title">
                        <?php if(!empty($content["blocks_title"])):?>
                            <h2><?=$content["blocks_title"]?></h2>
                        <?php endif; ?>
                    </div>
                    <?php if($content['on_btn']):?>
                    <a href="<?=get_post_type_archive_link( 'alboms' );?>" class="rs-btn _btn-border-black"> <?= $content['txt_button']?></a>
                    <?php endif; ?>
                </div>

                <div class="rs-slider-block__slider swiper">
                    <div class="rs-slider-block__swiper swiper-wrapper">
                    <?php if(is_array($myposts)):
                        foreach( $myposts as $post ) {
                            setup_postdata( $post );
                            ?>
                        <div class="rs-slider-block__slide swiper-slide">
                            <?php get_template_part('template-parts/rs_alboms/content', $post->post_type);?>
                        </div>
                        <?php
                        wp_reset_postdata();
                    } endif; ?>
                    </div>
                    <div class="rs-slider-block__action swiper-action">
                        <div class="rs-slider-block__pagination swiper-pagination"></div>
                        <div class="rs-slider-block__navigation swiper-navigation">
                            <div class="rs-slider-block__button-prev swiper-button-prev">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="rs-slider-block__button-next swiper-button-next">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2"
                                          stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if($content['on_btn']):?>
                <div class="section-footer">
                    <a href="<?=get_post_type_archive_link( 'alboms' );?>" class="rs-btn _btn-white"><?= $content['txt_button']?></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php }