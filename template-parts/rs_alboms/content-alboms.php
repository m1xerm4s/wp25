<?php
global $post;
$img = has_post_thumbnail()?get_the_post_thumbnail_url($post->ID,'post-thumbnails'):DEFAULT_IMAGE;
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
$excerpt = get_the_excerpt();
?>
<div class="rs-slider-block__item">
    <a href="<?php the_permalink() ?>" class="rs-slider-block__link">
        <div class="rs-slider-block__img">
            <img src="<?=$img; ?>" alt="">
        </div>
        <div class="rs-slider-block__desc">
            <h4><?php echo $title; ?></h4>
            <div class="rs-slider-block__desc-text">
               <?php if ( $excerpt ){
                echo '<p>'.wpautop( $excerpt ).'</p>';
                } ?>
                <div class="rs-btn _btn-border-white">Все фотографии</div>
            </div>
        </div>
    </a>
</div>