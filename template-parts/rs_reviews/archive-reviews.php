<?php get_header();?>
<?php
if ( function_exists('bcn_display') && !is_front_page()) {?>
    <div class="rs-breadcrumbs">
        <div class="rs-breadcrumbs__container">
            <div class="rs-breadcrumbs__block">
                <nav class="rs-breadcrumbs__navigation">
                    <ul itemscope itemtype="http://schema.org/BreadcrumbList" class="rs-breadcrumbs__list">
                        <?php bcn_display();?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
<?php } ?>
    <section class="rs-grid-block rs-albom">
        <div class="rs-grid-block__container">
            <div class="section-header">
                <div class="section-header__title">
                    <h2><?= !empty(get_field('reviews_title',"options"))? get_field('reviews_title',"options"):get_the_archive_title() ?></h2>
                    <?php if(!empty(get_field('reviews_description',"options"))):?>
                    <p><?=get_field('reviews_description',"options")?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="rs-grid-block__wrapper">
                <?php
                $paged = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
                $per_page = get_field('reviews_posts_per_page',"options")?(int)get_field('reviews_posts_per_page',"options"):-1;
                $column = get_field('reviews_count',"options");
                $args = array(
                    'post_type'	=> 'reviews',
                    'post_status' => 'publish',
                    'order'		=> 'ASC',
                    'orderby' => 'menu_order',
                    'paged'          => $paged,
                    'posts_per_page'=>$per_page
                );
                $query = new WP_Query( $args);
                $posts = $query->get_posts();

                $total = $query->max_num_pages;
                $count = $query->found_posts;
                $last_count = $count - ($total-1)*$per_page;

                global $post;
                ?>
                <?php if ( $query->have_posts() ) :?>
                <div class="rs-grid-block__list" data-grid-column="<?=$column?>">
                    <div class="rs-grid-block__column">
                    <?php
                    foreach( $posts as $index => $post ){
                        if($index % 2 ==0) {
                            get_template_part('template-parts/rs_reviews/content', $post->post_type);
                        }
                    }
                    ?>
                    </div>
                    <div class="rs-grid-block__column">
                        <?php
                        foreach( $posts as $index => $post ){
                            if($index % 2 !=0) {
                                get_template_part('template-parts/rs_reviews/content', $post->post_type);
                            }
                        }
                        ?>
                    </div>

                </div>
                    <?php
                    rs_paginate_links($paged,$total);
                    ?>
                    <?php wp_reset_postdata(); ?>
                <?php else : get_template_part('content', 'none');
                endif; ?>
            </div>
        </div>
    </section>
<?php if(get_field('on_reviews_form',"options")):
    $row = get_field('reviews_form',"options");
    do_action( 'template_on_'.$post->post_type.'_feedback', $row);
 endif;?>
<?php get_footer(); ?>