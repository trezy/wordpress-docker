<?php
/**
 * Template for Single posts.
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * 
 * @package Xcode
 * @author CodeGear Themes
 * 
 */

get_header(); ?>
<main class="primary <?php xcode_layout(); ?>" role="main">
    <?php 
        while ( have_posts() ) : the_post();
        
            get_template_part( 'template/content' , 'single' );
         
    		if ( comments_open() || get_comments_number() ) :
    			comments_template();
    		endif;
        
    endwhile; ?>
</main> <!--  .primary -->
<?php xcode_sidebar(); ?>
<?php get_footer(); ?>
