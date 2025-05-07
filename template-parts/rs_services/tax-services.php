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
$id=get_queried_object()->term_id;

$rows = get_field('blocks','catalog_section_'.$id );
if( is_array($rows) ) {
    foreach($rows as $index => $row){
        $type_blocks = $row["type_blocks"];
        do_action( 'template_on_'.$type_blocks, $row, $index);
    }
}
?>

<?php get_footer(); ?>
