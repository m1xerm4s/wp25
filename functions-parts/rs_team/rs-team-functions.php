<?php
defined("_Rosait2025") or die("Доступ запрещён");
//Добавление acf полей к записям типа team
if( function_exists('acf_add_local_field_group') ):
    //ACF для записи
    acf_add_local_field_group(array(
        'key' => 'group_67a602efe94e0',
        'title' => 'Информация о сотруднике',
        'fields' => array(
            array(
                'key' => 'field_67a602efeff59',
                'label' => 'Полное ФИО',
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
                'key' => 'field_67a605ba8ccff',
                'label' => 'Должность',
                'name' => 'position',
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
                'key' => 'field_67a606058cd00',
                'label' => 'Стаж работы',
                'name' => 'workexperience',
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
                'key' => 'field_67a6090e4b24a',
                'label' => 'Фото',
                'name' => 'photo',
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
            array(
                'key' => 'field_67a6093f2eca8',
                'label' => 'Содержимое',
                'name' => 'blocks',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_675ae28d076e8',
                'min' => 0,
                'max' => 0,
                'layout' => 'block',
                'button_label' => 'Добавить блок',
                'sub_fields' => array(
                    array(
                        'key' => 'field_67a6093f2eca9',
                        'label' => 'Тип',
                        'name' => 'type_blocks',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'content' => 'Содержимое страницы',
                            'text-block' => 'Текстовый блок',
                            'accordion' => 'Аккордеон',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'value',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_67a6093f2ecaa',
                        'label' => 'Настройки блока',
                        'name' => '',
                        'type' => 'accordion',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_67a6093f2eca9',
                                    'operator' => '!=',
                                    'value' => 'content',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'open' => 0,
                        'multi_expand' => 1,
                        'endpoint' => 0,
                    ),
                    array(
                        'key' => 'field_67a6093f2ecac',
                        'label' => 'Текст',
                        'name' => 'text',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_67a6093f2eca9',
                                    'operator' => '==',
                                    'value' => 'text-block',
                                ),
                            ),
                        ),
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
                    array(
                        'key' => 'field_67a6093f2eccf',
                        'label' => 'Аккордеон',
                        'name' => 'items',
                        'type' => 'repeater',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_67a6093f2eca9',
                                    'operator' => '==',
                                    'value' => 'accordion',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'collapsed' => '',
                        'min' => 0,
                        'max' => 0,
                        'layout' => 'block',
                        'button_label' => 'Добавить элемент',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_67a6093f2ecd0',
                                'label' => 'Заголовок спойлера',
                                'name' => 'spollers_title',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_67a6093f2eca9',
                                            'operator' => '==',
                                            'value' => 'accordion',
                                        ),
                                    ),
                                ),
                                'wrapper' => array(
                                    'width' => '30',
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
                                'key' => 'field_67a60c415818e',
                                'label' => 'Тип содержимого',
                                'name' => 'type',
                                'type' => 'select',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'acfbs_allow_search' => 0,
                                'choices' => array(
                                    'txt' => 'Текст',
                                    'txt_img' => 'Текст и картинка',
                                ),
                                'default_value' => false,
                                'allow_null' => 0,
                                'multiple' => 0,
                                'ui' => 0,
                                'return_format' => 'value',
                                'ajax' => 0,
                                'placeholder' => '',
                            ),
                            array(
                                'key' => 'field_67a60d6058190',
                                'label' => 'Заголовок',
                                'name' => 'title',
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_67a6093f2eca9',
                                            'operator' => '==',
                                            'value' => 'accordion',
                                        ),
                                    ),
                                ),
                                'wrapper' => array(
                                    'width' => '30',
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
                                'key' => 'field_67a6093f2ecd1',
                                'label' => 'Текст',
                                'name' => 'content',
                                'type' => 'wysiwyg',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '70',
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
                            array(
                                'key' => 'field_67a60d8758191',
                                'label' => 'Изображение',
                                'name' => 'image',
                                'type' => 'image',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => array(
                                    array(
                                        array(
                                            'field' => 'field_67a60c415818e',
                                            'operator' => '==',
                                            'value' => 'txt_img',
                                        ),
                                    ),
                                ),
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
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'team',
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
    //ACF для страницы Наша команда
    acf_add_local_field_group(array(
        'key' => 'group_teams',
        'title' => 'Настройки страницы Наша команда',
        'fields' => array (
            array(
                'key' => 'field_67a6022f5188f',
                'label' => 'Заголовок страницы',
                'name' => 'team_title',
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
                'default_value' => 'Наша команда',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_67a6029a51890',
                'label' => 'Количество записей на странице',
                'name' => 'team_posts_per_page',
                'type' => 'number',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => 8,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'min' => '',
                'max' => '',
                'step' => '',
            ),
            array(
                'key' => 'field_67a602b151891',
                'label' => 'Количество в ряд',
                'name' => 'team_count',
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
        'menu_order' => 4,
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
add_action( 'template_redirect', 'rs_template_team_include' );
function rs_template_team_include(){
    global $post;
    if(is_post_type_archive('team') && !is_search()){
        add_action( 'wp_print_scripts', 'rs_grid_block_style', 12);
    }
    if(isset($post->post_type) && $post->post_type == 'team' && !is_search()){
        add_action( 'wp_print_scripts', 'rs_team_style', 12);
    }
}
//Изменение шаблонов
add_filter('template_include', 'my_template_team');
function my_template_team( $template ) {
    # шаблон для архива произвольного типа "team"
    global $posts;
    if( is_post_type_archive('team') && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_team/archive-team.php';
    }
    # шаблон для страниц произвольного типа "team"
    global $post;
    if(isset($post->post_type) && $post->post_type == 'team' && !is_search()){
        return get_stylesheet_directory() . '/template-parts/rs_team/single-team.php';
    }
    return $template;
}

//Добавление типа записи
add_post_type('team', 'Команда', array(
    'supports'   => array( 'title', 'thumbnail', 'editor','page-attributes' ),
    'taxonomies' => array( 'post_tag' ),
    'menu_icon' => 'dashicons-admin-page'
));
add_taxonomy('team_tag', "Отдел", 'team', $args=array('hierarchical'  => true,));

add_action( 'init', 'team_unregister_tags', 99 );
function team_unregister_tags(){
    unregister_taxonomy_for_object_type( 'post_tag', 'team' );
}
add_filter('post_type_labels_team', 'rename_posts_labels_team');
function rename_posts_labels_team ( $labels ){
    $team = array(
        'name'                  => 'Команда',
        'singular_name'         => 'Команда',
        'add_new'               => 'Добавить',
        'add_new_item'          => 'Добавить',
        'edit_item'             => 'Редактировать',
        'new_item'              => 'Новая запись',
        'view_item'             => 'Просмотреть',
        'search_items'          => 'Поиск',
        'not_found'             => 'Не найдено.',
        'not_found_in_trash'    => 'Не найдено.',
        'parent_item_colon'     => '',
        'all_items'             => 'Вся команда',
        'archives'              => 'Команда',
        'insert_into_item'      => 'Вставить в запись',
        'uploaded_to_this_item' => 'Загруженные для записи',
        'featured_image'        => 'Изображение (страница Наша команда)',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список',
        'menu_name'             => 'Команда',
        'name_admin_bar'        => 'Команда', // пункте "добавить"
    );
    return (object) array_merge( (array) $labels, $team );
}

//Блок Сотрудники
function rs_team($content,$key=0){
    global $post;
    add_action( 'wp_footer', 'rs_slider_block_style');
    if($content['on_select_items']){
        $args = array(
            'post_type'	=> 'team',
            'publish' => true,
            'include'=> $content['select_items'],
            'orderby'   => 'post__in',
        );
    } else {
        $args = array(
            'post_type' => 'team',
            'posts_per_page' => $content['posts_per_page'],
            'publish' => true,
            'order' => 'ASC',
            'orderby' => 'menu_order',
        );
    }
    $myposts = get_posts( $args );
    $background = $content["on_background"]?$content["blocks_background"]:false;
    $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
    ?>
    <section id="<?=$anchor?>" class="rs-slider-block <?=$background?'_blue-block':''?>" <?php if($background):?> style="background-color:<?=$background?> " <?php endif; ?>>
        <div class="rs-slider-block__block">
            <div class="rs-slider-block__container">
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
                        <a href="<?=get_post_type_archive_link( 'team' );?>" class="rs-btn _btn-border-black">
                            <?= $content['txt_button']?>
                        </a>
                    <?php endif; ?>
                </div>

                <div class="rs-slider-block__slider swiper">
                    <div class="rs-slider-block__swiper swiper-wrapper">
    <?php if(is_array($myposts)):
        foreach( $myposts as $post ) {
            setup_postdata( $post );
            ?>
            <div class="rs-slider-block__slide swiper-slide">
                <?php get_template_part('template-parts/rs_team/content', $post->post_type);?>
            </div>
            <?php
            wp_reset_postdata();
        } endif;
    ?>
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
                        <a href="<?=get_post_type_archive_link( 'team' );?>" class="rs-btn _btn-border-primary">
                            <?= $content['txt_button']?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php }

//Функции вывода содержимого для страницы сотрудника
add_action('template_on_team_content', 'team_content',100,2);
function team_content($content,$key=0){
echo get_the_content();
}

add_action('template_on_team_text-block', 'team_text_block',100,2);
function team_text_block($content,$key=0){
    echo $content['text'];
}

add_action('template_on_team_accordion', 'team_accordion',100,2);
function team_accordion($content,$key=0){
    $accordion = $content['items'];
    if(is_array($accordion)):?>
        <div data-spollers data-one-spoller class="rs-accordion__spollers">
        <?php foreach($accordion as $key=>$item):
            $class=$key == 0?'_spoller-active':'';
            ?>
            <div class="rs-accordion__spollers_item">
            <button type="button" data-spoller  class="rs-accordion__spollers_title <?=$class?>">
                <?=$item['spollers_title']?>
                <i class="rs-accordion__spollers_icon">
                    <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                                d="M8.82082 1.91016L5 5.73098L1.17918 1.91016L0 3.0893L5 8.0893L10 3.0893L8.82082 1.91016Z"
                                fill="#33354D" />
                    </svg>
                </i>
                </button>
                <div class="rs-accordion__spollers_body">
                    <?php switch ($item['type']):
                        case 'txt':?>
                            <div class="rs-accordion__spollers_body">
                                <?=$item['content']?>
                            </div>
                            <?php break ;
                        case 'txt_img':  ?>
                            <div class="rs-accordion__spollers_body">
                                <div class="rs-accordion__spollers_wrapper">
                                    <div class="rs-accordion__spollers_text">
                                        <?=$item['content']?>
                                    </div>
                                    <div class="rs-accordion__spollers_img">
                                        <img src="<?=$item['image']?>" alt="">
                                    </div>
                                </div>
                            </div>
                            <?php break ;?>
                        <?php endswitch;?>
                </div>
                </div>
        <?php endforeach;?>
        </div>
    <?php  endif;
}