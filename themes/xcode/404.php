<?php
/**
 * The template page for display 404 Pages.
 *
 * @package Xcode
 * @author CodeGear Themes
 */

get_header(); ?>
<div class="page404 col-md-12">
	<div class="wrapper">
		<h1><?php esc_html_e( '404', 'xcode' ); ?></h1>
		<p><?php esc_html_e( 'This isn&#39;t good. Seems like...', 'xcode' ); ?></p>
		<h3><?php esc_html_e( 'You got lost .... Maybe try a search the links below?', 'xcode' ); ?></h3>
		<?php get_search_form(); ?>
	</div>
</div>
<?php get_footer(); ?>
