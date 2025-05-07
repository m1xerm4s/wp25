<?php
global $post;
$img = has_post_thumbnail()?get_the_post_thumbnail_url($post->ID,'post-thumbnails'):DEFAULT_IMAGE;
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
?>
<div class="rs-slider-block__item">
    <a href="<?php the_permalink() ?>" class="rs-slider-block__link">
        <div class="rs-slider-block__img">
            <img src="<?=$img; ?>" alt="">
        </div>
        <div class="rs-slider-block__desc">
            <h4><?php echo $title; ?></h4>
            <?php if(!empty(get_field('position'))):?>
            <p><?=get_field('position')?></p>
            <?php endif;?>
        </div>
    </a>
</div>