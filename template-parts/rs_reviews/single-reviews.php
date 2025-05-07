<?php get_header(); ?>
<?php
global $post;
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
$gallery = get_field('gallery');
$sources=[];
foreach ($gallery as $item):
$sources[] = array(
    'full'=>  $item["url"],
    'thumbnail'=> $item["sizes"]["post-thumbnail"]
);
endforeach;
if ( function_exists('bcn_display') && !is_front_page()) {?>
    <div class="rs-breadcrumbs">
        <div class="rs-breadcrumbs__container">
            <nav class="rs-breadcrumbs__navigation">
                <ul itemscope itemtype="http://schema.org/BreadcrumbList" class="rs-breadcrumbs__list">
                    <?php bcn_display();?>
                </ul>
            </nav>
        </div>
    </div>
<?php } ?>
    <section class="rs-article">
        <div class="rs-article__container">
            <div class="rs-article__wrapper">
                <div class="rs-article__title">
                    <div class="rs-article__title_body">
                        <div class="rs-article__date"><?php echo get_the_date("j.m.Y"); ?></div>
                        <h2><?= $title ?></h2>

                        <a href="<?=get_post_type_archive_link( 'reviews' );?>" class="back-link">
                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M11.6962 16.9138L7.78417 13.0017M7.78417 13.0017L11.6962 9.0897M7.78417 13.0017H18.2163M1.2641 13.0017C1.2641 19.4834 6.51854 24.7378 13.0002 24.7378C19.4819 24.7378 24.7363 19.4834 24.7363 13.0017C24.7363 6.52006 19.4819 1.26562 13.0002 1.26562C6.51854 1.26562 1.2641 6.52006 1.2641 13.0017Z"
                                        stroke="#9397AD" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                            </svg>
                            <span>Назад к отзывам</span>
                        </a>
                    </div>
                </div>

                <div class="rs-article__text">
                    <?php the_content() ?>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>