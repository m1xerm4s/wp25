<?php
defined("_Rosait2025") or die("Доступ запрещён");
//Добавление acf полей к записям типа slider
if( function_exists('acf_add_local_field_group') ):
    //ACF поля для слайда
    acf_add_local_field_group(array(
        'key' => 'group_67c051d9dd9fa',
        'title' => 'Слайд',
        'fields' => array(
            array(
                'key' => 'field_67c051e528bf3',
                'label' => 'Заголовок',
                'name' => 'title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '85',
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
                'key' => 'field_67c051e528ss3',
                'label' => 'Заголовок h1',
                'name' => 'on_H1',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '15',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_67c051fc28bf4',
                'label' => 'Текст слайда',
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
            array(
                'key' => 'field_681223498380a',
                'label' => 'Положение текста',
                'name' => 'positon_txt',
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
                    'left' => 'слева',
                    'right' => 'справа',
                    'center' => 'по центру',
                ),
                'default_value' => 'left',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'return_format' => 'value',
                'placeholder' => '',
            ),
            array(
                'key' => 'field_67c0529886dd7',
                'label' => 'Кнопки',
                'name' => 'buttons',
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
                'max' => 2,
                'layout' => 'block',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_67c0529986dd8',
                        'label' => 'Тип кнопки',
                        'name' => 'type',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'link' => 'ссылка',
                            'modal' => 'Модальное окно с формой',
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
                        'key' => 'field_67c0529986dd9',
                        'label' => 'Ссылка',
                        'name' => 'link',
                        'type' => 'link',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_67c0529986dd8',
                                    'operator' => '==',
                                    'value' => 'link',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '60',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'array',
                    ),
                    array(
                        'key' => 'field_67c0529986dda',
                        'label' => 'Форма',
                        'name' => 'modal',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_67c0529986dd8',
                                    'operator' => '==',
                                    'value' => 'modal',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'feedback' => 'feedback (Свяжитесь с нами)',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'ajax' => 0,
                        'return_format' => 'value',
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_67c0529986ddb',
                        'label' => 'Текст кнопки',
                        'name' => 'btn_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_67c0529986dd8',
                                    'operator' => '==',
                                    'value' => 'modal',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '30',
                            'class' => '',
                            'id' => '',
                        ),
                        'acfbs_allow_search' => 0,
                        'default_value' => 'Оставить заявку',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_67c052f2fbe71',
                        'label' => 'Оформление кнопки',
                        'name' => 'design',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '20',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'solid' => 'Цветная',
                            'border' => 'Обводка',
                        ),
                        'default_value' => false,
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'value',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                ),
            ),
            array(
                'key' => 'field_67c053f1fbe72',
                'label' => 'Изображения',
                'name' => 'images',
                'type' => 'group',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'acfbs_allow_search' => 0,
                'layout' => 'block',
                'sub_fields' => array(
                    array(
                        'key' => 'field_67c05413fbe73',
                        'label' => 'Десктоп',
                        'name' => 'desktop',
                        'type' => 'image',
                        'instructions' => 'требуемый размер 1920х760',
                        'required' => 1,
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
                    array(
                        'key' => 'field_67c05453fbe74',
                        'label' => 'Планшет',
                        'name' => 'tablet',
                        'type' => 'image',
                        'instructions' => 'требуемый размер 768х573',
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
                    array(
                        'key' => 'field_67c05471fbe75',
                        'label' => 'Мобильное устройство',
                        'name' => 'mobile',
                        'type' => 'image',
                        'instructions' => 'требуемый размер 375х573',
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
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'slider',
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
endif;

//Добавление типа записи
add_post_type('slider', 'Слайдер', array(
    'supports'   => array( 'title',),
    'menu_icon' => 'dashicons-admin-page',
    'taxonomies' => array(),
));


//add_action( 'init', 'slider_unregister_tags', 99 );
function slider_unregister_tags(){
    unregister_taxonomy_for_object_type( 'post_tag', 'slider' );
}

add_filter('post_type_labels_slider', 'rename_posts_labels_slider');
function rename_posts_labels_slider ( $labels ){
    $slider = array(
        'name'                  => 'Слайды',
        'singular_name'         => 'Слайд',
        'add_new'               => 'Добавить слайд',
        'add_new_item'          => 'Добавить слайд',
        'edit_item'             => 'Редактировать слайд',
        'new_item'              => 'Новый слайд',
        'view_item'             => 'Просмотреть слайд',
        'search_items'          => 'Поиск слайда',
        'not_found'             => 'Не найден слайд',
        'not_found_in_trash'    => 'Не найден слайд',
        'parent_item_colon'     => '',
        'all_items'             => 'Все слайды',
        'archives'              => 'Слайды',
        'insert_into_item'      => 'Вставить в слайд',
        'uploaded_to_this_item' => 'Загруженные для слайда',
        'featured_image'        => 'Изображение (страница Слайды)',
        'filter_items_list'     => 'Фильтровать список',
        'items_list_navigation' => 'Навигация по списку',
        'items_list'            => 'Список',
        'menu_name'             => 'Слайды',
        'name_admin_bar'        => 'Слайды', // пункте "добавить"
    );
    return (object) array_merge( (array) $labels, $slider );
}

//Слайдер
function rs_slider($content,$key=0){
    global $post;
    //подключение стиля блока
    add_action( 'wp_footer', 'rs_slider_style');
    $args = array(
        'post_type'	=> 'slider',
        'publish' => true,
        'include'=> $content['select_slide'],
        'orderby'   => 'post__in',
    );
    $query = new WP_Query( $args);
    global $post;
    if ($query->have_posts()) :
        $anchor = $content['on_anchor']?$content["anchor"]:$content["type_blocks"].'-'.$key;
        ?>
    <section id="<?=$anchor?>" class="rs-slider _white-block">
        <div class="rs-slider__slider swiper">
            <div class="rs-slider__swiper swiper-wrapper">
            <?php while( $query->have_posts() ) : $query->the_post();
                  setup_postdata( $post ); ?>
                <div class="rs-slider__slide swiper-slide">
                    <div class="rs-slider__bg">
                        <?php $banner = get_field('images');?>
                        <?php if(!empty($banner['tablet']) || !empty($banner['mobile'])):?>
                        <picture>
                            <source srcset="<?=$banner['desktop']?>" media="(min-width: 991.98px)">
                            <?php if(!empty($banner['mobile'])):?>
                                <?php if(!empty($banner['tablet'])):?>
                                    <source srcset="<?=$banner['tablet']?>" media="(min-width: 767.98px)">
                                <?php endif;?>
                                <img src="<?=$banner['mobile']?>" alt="" height="600px" width="375px">
                            <?php else:?>
                                <img src="<?=$banner['tablet']?>" alt="" height="600px" width="375px">
                            <?php endif;?>
                        </picture>
                        <?php else:?>
                            <picture>
                                <img src="<?=$banner['desktop']?>" alt="" height="600px" width="375px">
                            </picture>
                        <?php endif;?>

                    </div>
                    <div class="rs-slider__container">
                        <div class="rs-slider__content _text-<?=get_field('positon_txt')?>">
                            <div class="rs-slider__desc">
                            <div class="rs-slider__body">
                                <?php if(!empty(get_field('title')) && get_field('on_H1')):?>
                                <h1><?=get_field('title')?></h1>
                                <?php endif; ?>
                                <?php if(!empty(get_field('title')) && !get_field('on_H1')):?>
                                    <h2><?=get_field('title')?></h2>
                                <?php endif; ?>
                                <?=get_field('description')?>
                            </div>
                            </div>
                            <?php
                            $buttons=get_field('buttons');
                            if(!empty($buttons)):?>
                            <div class="rs-slider__buttons">
                                <?php foreach ($buttons as $button):
                                    $design = $button['design'];
                                    $class = '';
                                    switch ($design):
                                        case 'solid': $class = '_btn-primary'; break;
                                        case 'border': $class = '_btn-border-white'; break;
                                    endswitch;

                                    if($button['type'] == 'link'):
                                        $link=$button['link'];
                                        ?>
                                        <a href="<?=$link['url']?>" class="rs-btn <?=$class?>"><?=$link['title']?></a>
                                    <?php endif;
                                    if($button['type'] == 'modal'):
                                        ?>
                                        <a href="#" class="rs-btn <?=$class?>" data-popup="#<?=$button['modal']?>"><?=$button['btn_title']?></a>
                                    <?php endif; ?>
                                <?php endforeach;?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php
                wp_reset_postdata();
            endwhile;
            ?>
            </div>
        </div>
        <div class="rs-slider__action swiper-action">
            <div class="rs-slider__pagination swiper-pagination"></div>
            <div class="rs-slider__navigation swiper-navigation">
                <div class="rs-slider__button-prev swiper-button-prev">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 6L9 12L15 18" stroke="white" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" />
                    </svg>
                </div>
                <div class="rs-slider__button-next swiper-button-next">
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
    </section>
    <?php endif; ?>
<?php }
