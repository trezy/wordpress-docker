<?php
/**
 * Sidebar that contain the main widget area.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xcode
 * @author CodeGear Themes
 * 
 */

?>
<aside id="secondary" class="right-sidebar widget-area  col-md-4 col-sm-12" role="complementary">
    <?php if( get_theme_mod( 'xcode_theme_author_widget' , false )): ?>
	<?php xcode_about_author(); ?>
    <?php endif; ?>

	<?php // Check if Sidebar has widgets.
	if ( is_active_sidebar( 'xcode-sidebar' ) ) :

		dynamic_sidebar( 'xcode-sidebar' );

		// Show hint where to add widgets.
		else : ?>

			<aside class="widget clearfix">
				<div class="widget-header"><h3 class="widget-title"><?php esc_html_e( 'Sidebar', 'xcode' ); ?></h3></div>
				<div class="textwidget">
					<p><?php esc_html_e( 'Please go to Appearance &#8594; Widgets and add some widgets to your sidebar.', 'xcode' ); ?></p>
				</div>
			</aside>

	<?php endif; ?>

</aside>
