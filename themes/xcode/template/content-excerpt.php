<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xcode
 * @since 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-section' ); ?>>
    <div class="sw-wrapper clearfix">
    	<?php
        		the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
    	?>
        
        <div class="clearfix post-info">
    		<?php xcode_post_meta_date(); ?>
    	</div> <!--  .clearfix -->

    	<div class="post-detail">
    		<?php
        		the_excerpt();
    		?>
    	</div><!-- .post-detail -->
    </div>
</article><!--  .post-section -->
