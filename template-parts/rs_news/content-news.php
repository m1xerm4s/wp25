<?php
global $post;
setup_postdata( $post );
$posttags = get_the_terms( $post, 'news_tag' );
$img = has_post_thumbnail()?get_the_post_thumbnail_url($post->ID,'news-thumbnails'):DEFAULT_IMAGE;
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
?>
<div class="rs-news__item">
    <a href="<?php the_permalink() ?>" class="rs-news__link">
        <div class="rs-news__img">
            <img src="<?=$img; ?>" alt="">
        </div>
        <div class="rs-news__desc">
            <div class="rs-news__date"><?php echo get_the_date("d.m.Y");  ?></div>
            <h4><?php echo $title; ?></h4>
        </div>
    </a>
</div>
<?php
wp_reset_postdata();
?>