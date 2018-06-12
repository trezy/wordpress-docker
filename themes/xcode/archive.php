<?php
/**
 * Archive pages template.
 *
 * Learn more about archive.php : http://codex.wordpress.org/Template_Hierarchy
 *
 * @package xcode
 * @author CodeGear Themes
 * 
 */

get_header(); ?>
<main class="primary <?php xcode_layout(); ?>" role="main">		
    <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post();
    		get_template_part( 'template/content', 'archive' );
         endwhile;
         xcode_pagination();
      
        else :
			get_template_part( 'template/content', 'none' );
        endif; 
    ?>
</main> <!--  .primary -->
<?php 
xcode_sidebar();
get_footer();
