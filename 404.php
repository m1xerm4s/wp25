<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package storefront
 */

get_header();
$key = get_field('select_404','options');
get_template_part('template-parts/rs_error/404', $key);
?>
<?php
get_footer();