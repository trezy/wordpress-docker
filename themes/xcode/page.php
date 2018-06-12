<?php
/**
 * Template for Pages.
 *
 * This is the template file that shows all pages by default.
 * Learn more about page.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xcode
 * @author CodeGear Themes
 * 
 */

get_header(); ?>
<main class="primary <?php xcode_layout(); ?>" role="main">

	<?php while ( have_posts() ) : the_post();

		get_template_part( 'template/content', 'page' );
        
        // If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
        

	endwhile; ?>

</main> <!--  .primary -->

<?php xcode_sidebar(); ?>
<?php 
get_footer();
