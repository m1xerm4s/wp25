<?php
defined("_Rosait2025") or die("Доступ запрещён");
//Добавление acf полей к записям типа news
if( function_exists('acf_add_local_field_group') ):
    //ACF для записи
    acf_add_local_field_group(array(
        'key' => 'group_67a4b8bc28467',
        'title' => 'Новости',
        'fields' => array(
            array(
                'key' => 'field_67a4b8f12ae3f',
                'label' => 'Полное название новости',
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
                'key' => 'field_67a4b91b2ae40',
                'label' => 'Вывести Блок Поделиться',
                'name' => 'on_share',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 1,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_67a4b9592ae41',
                'label' => '',
                'name' => 'share',
                'type' => 'group',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => array(
                    array(
                        array(
                            'field' => 'field_67a4b91b2ae40',
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
                'acfbs_allow_search' => 0,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_67a4b9772ae42',
                        'label' => 'Текст блока',
                        'name' => 'tekst_bloka',
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
                        'default_value' => 'Поделиться:',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_67a4b9932ae43',
                        'label' => 'Выводимые сервисы',
                        'name' => 'ya-share2',
                        'type' => 'text',
                        'instructions' => 'Сервисы из Яндекс API Блок «Поделиться»',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'acfbs_allow_search' => 0,
                        'default_value' => 'messenger,vkontakte,odnoklassniki,telegram,twitter,viber,whatsapp,moimir,pinterest',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'news',
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
    //ACF для страницы Новости
    acf_add_local_field_group(array(
        'key' => 'group_news',
        'title' => 'Настройки страницы Новости',
        'fields' => array (
            array(
                'key' => 'field_67a4cebaed621',
                'label' => 'Заголовок страницы',
                'name' => 'news_title',
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
                'default_value' => 'Новости',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_67a4cedded622',
                'label' => 'Количество записей на странице',
                'name' => 'news_posts_per_page',
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
                'key' => 'field_67a4cf40ed623',
                'label' => 'Количество в ряд',
                'name' => 'news_count',
                'type' => 'number',
                'instructions' => 'максимально - 4',
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
        'menu_order' => 3,
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
add_action( 'template_redirect', 'rs_template_news_include' );
function rs_template_news_include(){
    global $post;
    if(is_post_type_archive('news') && !is_search()){
        add_action( 'wp_print_scripts', 'rs_grid_block_style', 12);
    }
    if(isset($post->post_type) && $post->post_type == 'news' && !is_search()){
        add_action( 'wp_print_scripts', 'rs_article_style', 12);
    }
}

add_filter('template_include', 'my_template_news');
function my_template_news( $template ) {
    # шаблон для архива произвольного типа "news"
    global $posts;
    if( is_post_type_archive('news') && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_news/archive-news.php';
    }
    # шаблон для страниц произвольного типа "news"
    global $post;
    if(isset($post->post_type) && $post->post_type == 'news' && !is_search() ){
        return get_stylesheet_directory() . '/template-parts/rs_news/single-news.php';
    }
    return $template;
}

//Добавление типа записи
add_post_type('news', 'Новости', array(
    'supports'   => array( 'title', 'thumbnail', 'editor'/*,'excerpt'*/ ),
    'taxonomies' => array( 'post_tag' ),
    'menu_icon' => 'dashicons-admin-page'
));
add_taxonomy('news_tag', "Раздел", 'news', $args=array('hierarchical'  => true,));

add_action( 'init', 'news_unregister_tags', 99 );
function news_unregister_tags(){
    unregister_taxonomy_for_object_type( 'post_tag', 'news' );
    unregister_taxonomy_for_object_type( 'category', 'news' );
}
add_filter('post_type_labels_news', 'rename_posts_labels_news');
function rename_posts_labels_news ( $labels ){
    $news = array(
        'name'                  => 'Новости',
        'singular_name'         => 'Новость',
        'add_new'               => 'Добавить новость',
        'add_new_item'          => 'Добавить новость',
        'edit_item'             => 'Редактировать новость',
        'new_item'              => 'Новая новость',
        'view_item'             => 'Просмотреть новость',
        'search_items'          => 'Поиск новости',
        'not_found'             => 'Новостей не найдено.',
        'not_found_in_trash'    => 'Новостей в корзине не найдено.',
        'parent_item_colon'     => '',
        'all_items'             => 'Все новости',
        'archives'              => 'Все новости',
        'insert_into_item'      => 'Вставить в новость',
        'uploaded_to_this_item' => 'Загруженные для этого новости ',
        'featured_image'        => 'Изображение (страница Все новости)',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список новостей',
        'menu_name'             => 'Новости',
        'name_admin_bar'        => 'Новость', // пункте "добавить"
    );
    return (object) array_merge( (array) $labels, $news );
}

function rs_news($content,$key=0){
    global $post;
    add_action( 'wp_footer', 'rs_news_style');

    $args = array(
        'post_type'	=> 'news',
        'posts_per_page' => $content['posts_per_page'],
        'publish' => true,
        'order'		=> 'DESC',
        'orderby' => 'date',
    );
    $myposts = get_posts( $args );
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-news <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-news__container">
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

            <div class="rs-news__slider swiper">
                <div class="rs-news__swiper swiper-wrapper">
                    <?php if(is_array($myposts)):
        foreach( $myposts as $post ) {
            setup_postdata( $post );
            ?>
                    <div class="rs-news__slide swiper-slide">
                        <div class="rs-news__item">
                            <a href="<?php the_permalink() ?>" class="rs-news__link">
                               <div class="rs-news__img">
                                   <?php if(get_the_post_thumbnail_url(get_the_ID())):?>
                                       <img src="<?=get_the_post_thumbnail_url(get_the_ID(),'news-thumbnails'); ?>" alt="">
                                   <?php else: ?>
                                       <img src="<?=DEFAULT_IMAGE ?>" alt="">
                                   <?php endif; ?>
                              </div>
                              <div class="rs-news__desc">
                                <div class="rs-news__date"><?php echo get_the_date("d.m.Y");  ?></div>
                                <h3><?= !empty(get_field('title',get_the_ID()))?get_field('title',get_the_ID()):get_the_title() ?></h3>
                              </div>
                            </a>
                        </div>
                    </div>
            <?php
            wp_reset_postdata();
        } endif;
            ?>
            </div>
                <div class="rs-news__action swiper-action">
                    <div class="rs-news__pagination swiper-pagination"></div>
                    <div class="rs-news__navigation swiper-navigation">
                        <div class="rs-news__button-prev swiper-button-prev">
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
                        <div class="rs-news__button-next swiper-button-next">
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
        <div class="cursor">
            <div class="cursor__point-zero">
                <div class="cursor__wrapper">
                    <div class="cursor__circle">
                        <svg width="75" height="75" viewBox="0 0 75 75" fill="none"
                             xmlns="http://www.w3.org/2000/svg" class="astro-OFXTMV4X" style="--tint:white">
                            <path class="indicator astro-OFXTMV4X" id="nav"
                                  d="M46 30C46 29.4477 45.5523 29 45 29L36 29C35.4477 29 35 29.4477 35 30C35 30.5523 35.4477 31 36 31H44V39C44 39.5523 44.4477 40 45 40C45.5523 40 46 39.5523 46 39V30ZM30.7071 45.7071L45.7071 30.7071L44.2929 29.2929L29.2929 44.2929L30.7071 45.7071Z"
                                  fill="#fff"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php }