<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: https://codex.wordpress.org/The_Loop
 *
 */
while ( have_posts() ) :
	the_post();

	if(is_search()):
	    get_template_part( 'content', 'search' );
	else:
        get_template_part( 'content', get_post_format() );
	endif;
endwhile;