<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 */
defined("_Rosait2025") or die("Доступ запрещён");
?>

	<div class="page-content">

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Готовы опубликовать свой первый пост? <a href="%1$s">Начните здесь</a>.', 'Rosait2025' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Извините, но ничего не соответствует вашим критериям поиска. Пожалуйста, попробуйте еще раз, используя другие ключевые слова.', 'rosait' ); ?></p>


		<?php else : ?>

			<p><?php _e( 'Кажется, мы не можем найти то, что вы ищете.', 'rosait' ); ?></p>
			

		<?php endif; ?>

	</div><!-- .page-content -->

