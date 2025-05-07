<?php
/**
 * The template for displaying contacts pages.
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
do_action( 'template_on_contacts_page');
?>
<?php get_footer(); ?>