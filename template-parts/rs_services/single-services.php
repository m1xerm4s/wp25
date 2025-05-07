<?php
/*
* The template for displaying all Services
* Template Post Type: services
*/

get_header(); ?>
<?php
$title = !empty(get_field('title'))?get_field('title'):get_the_title();
$rows = get_field('blocks' );
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
<section class="rs-services">
	<div class="rs-services__container">
		<div class="rs-services__wrapper">
			<?php if(get_field('on_sidebar')):
                    $menu = get_field('sidebar_menu');
                    $args = [
                        'theme_location'  => '',
                        'menu'            => $menu,
                        'container'       => 'div',
                        'container_class' => 'container_class',
                        'container_id'    => '',
                        'menu_class'      => 'menu_class',
                        'menu_id'         => '',
                        'echo'            => true,
                        'fallback_cb'     => '',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          =>'',
                    ];
                    ?>
			<div class="rs-services__sidebar">
				<?php wp_nav_menu($args);?>
			</div>
			<?php endif;?>
			<div class="rs-services__content">
				<div class="rs-services__body">
					<h2><?= $title ?></h2>
                    <?php
                    $the_content = apply_filters( 'the_content', get_the_content() );
                    if(! empty( $the_content ) ) :
                        echo $the_content;?>
                    <?php else:?>
                        <?php if( is_array($rows) ) {
                            $type_blocks = $rows[0]["type_blocks"];
                            do_action( 'template_on_'.$type_blocks, $rows[0], 0);
                        }?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
if( is_array($rows) ) {
    foreach($rows as $index => $row){
        if ( empty( $the_content ) && $index==0) continue;
        $type_blocks = $row["type_blocks"];
            do_action( 'template_on_'.$type_blocks, $row, $index);
    }
}
?>
<?php get_footer(); ?>