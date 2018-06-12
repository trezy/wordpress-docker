<?php
/**
 * Template for Search results pages.
 * Learn more about search.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xcode
 * @author CodeGear Themes
 * 
 */

get_header(); ?>
<main class="primary <?php xcode_layout(); ?>" role="main">
<?php
	if ( have_posts() ) :

		while ( have_posts() ) : the_post();

			get_template_part( 'template/content', 'excerpt' );

		endwhile;
		xcode_pagination();

	else : ?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'xcode' ); ?></p>
		<?php
		get_search_form();

	endif; 
 ?>
</main> <!--  .primary -->
<?php xcode_sidebar(); ?>
<?php 
get_footer();


