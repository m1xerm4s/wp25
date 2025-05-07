<?php
/**
 *  The template for displaying front page.
 *
 */
get_header();
?>
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