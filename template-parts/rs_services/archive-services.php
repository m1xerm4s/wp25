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
<?php
do_action( 'template_on_services_block');
?>

<?php get_footer(); ?>
