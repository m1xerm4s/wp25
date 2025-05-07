<?php
global $post;
setup_postdata( $post );
$title = !empty(get_field('reviews_title'))?get_field('reviews_title'):get_the_title();
$img = get_field('reviews_img');
$name = get_field('reviews_name');
$date = get_field('reviews_date');
?>
<div class="rs-reviews__item">
    <div class="rs-reviews__desc">
        <div class="rs-reviews__date"><?=$date?></div>
        <h4><?=$title?></h4>
        <?= get_the_content($post->ID); ?>
    </div>
    <div class="rs-reviews__footer">
        <?php if(!empty($img)):?>
        <div class="rs-reviews__img">
            <img src="<?=$img?>" alt="">
        </div>
        <?php endif; ?>
        <h5><?=$name?></h5>
    </div>
</div>
<?php wp_reset_postdata(); ?>