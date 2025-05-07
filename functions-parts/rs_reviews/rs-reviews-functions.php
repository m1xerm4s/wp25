<?php
defined("_Rosait2025") or die("Доступ запрещён");
//Добавление acf полей к записям типа reviews
if( function_exists('acf_add_local_field_group') ):
    //ACF для записи
    acf_add_local_field_group(array(
        'key' => 'group_67bf01564fc77',
        'title' => 'Отзыв',
        'fields' => array(
            array(
                'key' => 'field_67bf015f62563',
                'label' => 'Дата',
                'name' => 'reviews_date',
                'type' => 'date_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'display_format' => 'd.m.Y',
                'return_format' => 'd.m.Y',
                'first_day' => 1,
            ),
            array(
                'key' => 'field_67bf01cf86c14',
                'label' => 'Заголовок',
                'name' => 'reviews_title',
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
                'key' => 'field_67bf01cf86c15',
                'label' => 'Автор',
                'name' => 'reviews_name',
                'type' => 'text',
                'instructions' => '',
                'required' => 1,
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
                'key' => 'field_67bf01e886c15',
                'label' => 'Фото',
                'name' => 'reviews_img',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'return_format' => 'url',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'reviews',
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
//ACF для страницы Отзывы
    acf_add_local_field_group(array(
        'key' => 'group_reviews',
        'title' => 'Настройки страницы Отзывы',
        'fields' => array (
            array(
                'key' => 'field_67bf270721577',
                'label' => 'Заголовок страницы',
                'name' => 'reviews_title',
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
                'default_value' => 'Отзывы',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_67bf276a8895a',
                'label' => 'Описание',
                'name' => 'reviews_description',
                'type' => 'textarea',
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
                'maxlength' => '',
                'rows' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_67bf271f21578',
                'label' => 'Количество записей на странице',
                'name' => 'reviews_posts_per_page',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 4,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_67bf273c21579',
                'label' => 'Количество в ряд',
                'name' => 'reviews_count',
                'type' => 'number',
                'instructions' => 'максимально - 2',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 2,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => 1,
                'max' => 2,
                'step' => '',
            ),
            array(
                'key' => 'field_67bf27be7c183',
                'label' => 'Добавить блок с формой',
                'name' => 'on_reviews_form',
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
                'key' => 'field_67bf28007c184',
                'label' => '',
                'name' => 'reviews_form',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_67bf27be7c183',
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
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_67bf280f7c185',
                        'label' => 'Заголовок блока',
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
                        'key' => 'field_67bf282a7c186',
                        'label' => 'Подзаголовок блока',
                        'name' => 'subtitle',
                        'type' => 'textarea',
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
                        'maxlength' => '',
                        'rows' => '',
                        'new_lines' => '',
                    ),
                    array(
                        'key' => 'field_67bf28417c187',
                        'label' => 'Шорткод формы',
                        'name' => 'shortcode',
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
                        'key' => 'field_67bf28bd7c188',
                        'label' => 'Фон блока',
                        'name' => 'background_img',
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
        'menu_order' => 6,
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
add_action( 'template_redirect', 'rs_template_reviews_include' );
function rs_template_reviews_include(){
    //Подключение стилей/скриптов в зависимости от страницы
    global $post;
    if(is_post_type_archive('reviews') && !is_search()){
        add_action( 'wp_print_scripts', 'rs_grid_block_style', 12);
    }
    if(isset($post->post_type) && $post->post_type == 'reviews' && !is_search()){
      //  add_action( 'wp_print_scripts', 'rs_article_style', 12);
    }
}
//Изменение шаблонов
add_filter('template_include', 'my_template_reviews');
function my_template_reviews( $template ) {
    # шаблон для архива произвольного типа "reviews"
    global $posts;
    if( is_post_type_archive('reviews') && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_reviews/archive-reviews.php';
    }
    # шаблон для страниц произвольного типа "reviews"
    global $post;
    if(isset($post->post_type) && $post->post_type == 'reviews' && !is_search()){
      //  return get_stylesheet_directory() . '/template-parts/rs_reviews/single-reviews.php';
    }
    return $template;
}

//Добавление типа записи
add_post_type('reviews', 'Отзывы', array(
    'supports'   => array( 'title',  'editor','page-attributes' ),
    'menu_icon' => 'dashicons-admin-page',
));
//Добавить свою таксономию (раскомментировать строку ниже)
//add_taxonomy('reviews_tag', "Тема отзыва", 'reviews', $args=array('hierarchical'  => true,));

add_action( 'init', 'reviews_unregister_tags', 99 );
function reviews_unregister_tags(){
    unregister_taxonomy_for_object_type( 'post_tag', 'reviews' );
    unregister_taxonomy_for_object_type( 'category', 'reviews' );
}

add_filter('post_type_labels_reviews', 'rename_posts_labels_reviews');
function rename_posts_labels_reviews ( $labels ){
    $reviews = array(
        'name'                  => 'Отзывы',
        'singular_name'         => 'Отзыв',
        'add_new'               => 'Добавить отзыв',
        'add_new_item'          => 'Добавить отзыв',
        'edit_item'             => 'Редактировать отзыв',
        'new_item'              => 'Новый отзыв',
        'view_item'             => 'Просмотреть отзыв',
        'search_items'          => 'Поиск отзыва',
        'not_found'             => 'Не найден отзыв',
        'not_found_in_trash'    => 'Не найден отзыв',
        'parent_item_colon'     => '',
        'all_items'             => 'Все отзывы',
        'archives'              => 'Отзывы',
        'insert_into_item'      => 'Вставить в отзыв',
        'uploaded_to_this_item' => 'Загруженные для отзыва',
        'featured_image'        => 'Изображение (страница Отзывы)',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список',
        'menu_name'             => 'Отзывы',
        'name_admin_bar'        => 'Отзывы', // пункте "добавить"
    );
    return (object) array_merge( (array) $labels, $reviews );
}

//Блок Отзывы
function rs_reviews($content,$key=0){
    global $post;
    //подключение стиля блока
    add_action( 'wp_footer', 'rs_reviews_block_style');

    if($content['on_select_reviews']){
        $args = array(
        'post_type'	=> 'reviews',
        'publish' => true,
        'include'=> $content['select_reviews'],
        'orderby'   => 'post__in',
    );
    } else {
        $args = array(
        'post_type'	=> 'reviews',
        'posts_per_page' => $content['posts_per_page'],
        'publish' => true,
        'order'		=> 'ASC',
        'orderby' => 'menu_order',
    );
    }
    $myposts = get_posts( $args );
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-reviews">
        <div class="rs-reviews__container">
            <div class="section-header">
                <div class="section-header__title">
                    <?php if(!empty($content["blocks_title"])):?>
                        <h2><?=$content["blocks_title"]?></h2>
                    <?php endif; ?>
                    <?php if(!empty($content["description"])):?>
                        <p><?=$content['description']?></p>
                    <?php endif; ?>
                </div>
                <?php if($content['on_btn']):?>
                    <a href="<?=get_post_type_archive_link( 'news' );?>" class="rs-btn _btn-border-black">
                        <?= $content['txt_button']?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="rs-reviews__slider swiper">
                <div class="rs-reviews__swiper swiper-wrapper">
                    <?php if(is_array($myposts)):
                        foreach( $myposts as $post ) {
                            ?>
                            <div class="rs-reviews__slide swiper-slide">
                                <?php get_template_part('template-parts/rs_reviews/content', $post->post_type);?>
                            </div>
                            <?php
                        } endif; ?>
                </div>
                <div class="rs-reviews__action swiper-action">
                    <div class="rs-reviews__pagination swiper-pagination"></div>
                    <div class="rs-reviews__navigation swiper-navigation">
                        <div class="rs-reviews__button-prev swiper-button-prev">
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
                        <div class="rs-reviews__button-next swiper-button-next">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 18L15 12L9 6" stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <?php if($content['on_btn']):?>
                <div class="section-footer">
                    <a href="<?=get_post_type_archive_link( 'news' );?>" class="rs-btn _btn-border-primary">
                        <?= $content['txt_button']?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php }

//Блок Оставить отзыв на странице Отзывы
add_action('template_on_reviews_feedback', 'reviews_feedback',100,2);
function reviews_feedback($content,$key=0){
    add_action( 'wp_footer', 'rs_feedback_style');
    $bg_img = $content['background_img']?$content['background_img']:false;
    $shortcode = $content['shortcode'];
    ?>
    <section id="feedback-<?=$key?>" class="rs-feedback " >
        <?php if($bg_img):?>
            <div class="rs-feedback__bg">
                <img src="<?=$bg_img?>" alt="">
            </div>
        <?php endif;?>
        <div class="rs-feedback__container">
            <div class="rs-feedback__wrapper">
                <div class="section-header _center">
                    <div class="section-header__title">
                        <?php if(!empty($content["title"])):?>
                            <h2><?=$content["title"]?></h2>
                        <?php endif; ?>
                        <?php if(!empty($content["subtitle"])):?>
                            <p><?=$content['subtitle']?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="rs-feedback__form">
                    <?php echo apply_shortcodes( $shortcode ); ?>
                </div>
            </div>
        </div>
    </section>
<?php }