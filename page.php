<?php
/**
 * The template for displaying all pages.
 *
 * This is the templ ate that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 */
get_header();
do_action( 'template_on_parallax_top');
?>
<?php
if ( function_exists('bcn_display') && !is_front_page() && get_field('on_breadcrumbs')) {?>
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
<?php

$rows = get_field('blocks' );
if( is_array($rows) ) {
    foreach($rows as $index => $row){
        $type_blocks = $row["type_blocks"];
        do_action( 'template_on_'.$type_blocks, $row, $index);
    }
}
?>
<?php get_footer(); ?>