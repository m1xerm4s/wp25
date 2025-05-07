<?php
/**
 * The template for displaying search results pages.
 */
// Initialise some variables.
$bsearch_settings = bsearch_get_settings();
$search_query     = get_search_query();

$limit = filter_input(
    INPUT_GET,
    'limit',
    FILTER_VALIDATE_INT,
    array(
        'options' => array(
            'default'   => $bsearch_settings['limit'],
            'min_range' => 1,
        ),
    )
);

$bydate = filter_input(
    INPUT_GET,
    'bydate',
    FILTER_VALIDATE_INT,
    array(
        'options' => array(
            'default'   => 0,
            'min_range' => 0,
        ),
    )
);

$current_page        = (int) get_query_var( 'paged', 1 );
$selected_post_types = 'any';

$post_types_param = filter_input( INPUT_GET, 'post_types', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
$post_type_param  = filter_input( INPUT_GET, 'post_type', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

if ( $post_types_param ) {
    $selected_post_types = sanitize_title( wp_unslash( $post_types_param ) );
} elseif ( $post_type_param ) {
    $selected_post_types = sanitize_title( wp_unslash( $post_type_param ) );
}

$post_types = ( 'any' === $selected_post_types ) ? bsearch_get_option( 'post_types' ) : $selected_post_types;
$post_types = wp_parse_list( $post_types );

// Reset wp_query temporary.
global $wp_query;
$tmp_wpquery = $wp_query;

// Set up Better_Search_Query to replace $wp_query.
$args = array(
    's'              => $search_query,
    'posts_per_page' => $limit,
    'paged'          => $current_page,
    'orderby'        => $bydate ? 'date' : 'relevance',
    'post_type'      => $post_types,
);

/**
 * Filter the arguments that are passed to Better_Search_Query.
 *
 * @since 3.1.0
 *
 * @param array $args Arguments array.
 */
$args = apply_filters( 'bsearch_template_query_args', $args );

$search_results = new Better_Search_Query( $args );
$wp_query       = $search_results; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$topscore       = $wp_query->topscore;
$total = $wp_query->max_num_pages;
get_header(); ?>
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
<?php }
?>
<section class="rs-search">
    <div class="rs-search__container">
        <h2>Поиск</h2>
        <div class="rs-search__field">
            <form action="<?php echo home_url('/') ?>" method="get" class="form" role="search">
                <div class="form__wrapper">
                    <div class="form__block">
                        <div class="form__line">
                            <input type="text" name="s" value="<?php echo get_search_query() ?>" required placeholder="Введите ваш запрос"
                                   class="rs-input">
                        </div>
                        <button type="submit" class="rs-btn _btn-primary">
                            Поиск
                        </button>
                    </div>
                </div>
            </form>
        </div>

    <?php if ( have_posts() ) : ?>
        <h4>Результаты поиска</h4>
        <div class="rs-search__result">
            <div class="rs-search__result_list">
    <?php
    get_template_part( 'loop' );
    ?>
            </div>
        </div>
        <div class="rs-search__actions">
    <?php

    rs_paginate_search_links($current_page,$total);
        ?>
        </div>
    <?php
    else :

    get_template_part( 'content', 'none' );

endif;
?>
    </div>
</section>
<?php

get_footer();
