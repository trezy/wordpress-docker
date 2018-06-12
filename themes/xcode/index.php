<?php
/**
 * The main template file.
 * This is the most general file in a WordPress template theme and require file.
 * This template is used when nothing matching with a specific query.
 * Learn more about index.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xcode
 * @author CodeGear Themes
 * 
 */
get_header(); ?>
<main class="primary <?php xcode_layout(); ?>" role="main">
	<?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
            get_template_part( 'template/content', get_post_format() );
        endwhile;
		// Display Pagination.
		xcode_pagination();
    else :
		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
</main> <!--  .primary -->
<?php xcode_sidebar(); ?>
<?php 
get_footer();
