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
    <section class="rs-grid-block">
        <div class="rs-grid-block__container">
            <div class="section-header">
                <div class="section-header__title">
                    <h2><?= !empty(get_field('news_title',"options"))? get_field('news_title',"options"):get_the_archive_title() ?></h2>
                </div>
            </div>

            <div class="rs-grid-block__wrapper">
                <?php
                $paged = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
                $args = array(
                    'post_type'	=> 'news',
                    'post_status' => 'publish',
                    'order'		=> 'DESC',
                    'orderby' => 'date',
                    'paged'          => $paged,
                    'posts_per_page'=>get_field('news_posts_per_page',"options")??-1
                );
                $query = new WP_Query( $args);
                global $post;
                $total = $query->max_num_pages;
                ?>
                <?php if ( $query->have_posts() ) :?>
                <div class="rs-grid-block__list" data-grid-column="<?=get_field('news_count',"options")?>">
                        <?php
                        while( $query->have_posts() ) : $query->the_post();

                            get_template_part('template-parts/rs_news/content', $post->post_type);
                        endwhile;
                        ?>
                </div>
                <?php
                   rs_paginate_links($paged,$total);
                ?>
                <?php
                    else :
                        get_template_part('content', 'none');
                    endif;
                ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>