<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="wrapper">
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open();

?>
<div class="wrapper">
    <header>
        <?php
        do_action( 'rs_action_header' );
        ?>
    </header>
    <main class="page">