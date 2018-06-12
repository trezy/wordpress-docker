<?php
/**
 * Template part for displaying content none.
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package xcode
 * @author CodeGear Themes
 * 
 */
?>
<article class="no-results not-found">

	<h1 class=""><?php esc_html_e( 'No matches', 'xcode' ); ?></h1>

	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'xcode' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'xcode' ); ?></p>
			<?php
				get_search_form();

		endif; ?>

	</div>

</article>
