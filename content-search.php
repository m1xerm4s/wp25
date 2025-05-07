<?php
global $post;
?>
<div class="rs-search__result_item">
    <a href="<?php the_bsearch_permalink( $post ); ?>">
        <h5><?php the_title(); ?></h5>
        <ul class="rs-search__result_breadcrumbs">
            <?php if($post->ID === (int)FRONT_PAGE):?>
                <li><span>Главная</span></li>
            <?php else:?>
                <li>Главная</li>
                <?php if($post->post_type!='page'):?>
                    <?php
                    $object = get_post_type_object( $post->post_type);
                    ?>
                <li><?=$object->label?></li>
                <?php endif; ?>
                <li><span><?php the_title(); ?></span></li>
            <?php endif; ?>
        </ul>
        <div class="rs-search__result_about"><?php the_bsearch_excerpt(); ?></div>
        <div class="rs-search__result_change">Изменен: <?php the_bsearch_date(); ?></div>
    </a>
</div>
