<?php
/**
 * 
 * @package xcode
 * @author CodeGear Themes
 * 
 */ 
function xcode_header_image(){
  $header_banner = get_header_image();
  return $header_banner;
}


function xcode_inner_header(){
 echo '<section class="sw-slider">';
 $single_banner = get_theme_mod( 'xcode_innerpage_header_banner', '' );
 echo '<div class="sw-innerbackground" style="background: url( '.$single_banner.' )">';
     echo '<div class="container">';
       xcode_entry_header();
     echo '</div>'; 
 echo '</div>'; 
 echo '</section>';
 
}    


function xcode_entry_header(){
    ?>
    <div class="sw-inner-header">
 		<div class="ps-container">
	 		<header class="entry-header">
				<?php
					if( is_archive() ) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					} elseif( is_single() && 'post' === get_post_type() ) {
						$post_category = get_the_category();
                        if( $post_category ){
						  $first_cat_name = $post_category[0]->name;
                          echo '<h1 class="page-title">'. $first_cat_name .'</h1>';
                        }
					} elseif( is_page() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif( is_search() ) {
				?>
						<header class="entry-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'xcode' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header>
				<?php
					}elseif ( is_404() ) { ?>
					   <header class="entry-header">
							<h1 class="page-title"><?php esc_html_e( '404 Error', 'xcode' ); ?></h1>
						</header>
					<?php }
				?>
			</header>
		</div>
 	</div>
    <?php
}


add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard ps-admin">' . get_the_author() . '</span>' ;
        }
    return $title;
});


function xcode_footer_text() {
    ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p class="copyright"><?php printf( __( 'Copyright  %1$s  %2$s', 'xcode' ), date('Y') , get_bloginfo( 'name' ) ); ?> | <a href="<?php echo esc_url( __( 'https://www.codegearthemes.com' , 'xcode' ) ); ?>"><?php printf( __( 'Designed by %s', 'xcode' ), 'CodeGearThemes' ); ?></a></p>
                    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'xcode' ) ); ?>"><?php printf( __( 'Powered by %s', 'xcode' ), 'WordPress' ); ?></a>
                </div>
            </div>
        </div>
    <?php
}
add_action( 'xcode_footer_text', 'xcode_footer_text' );


/**
* 
* Comment Form Filter
* @since Xcode 1.0.0
* 
*/
function xcode_comment( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}
add_filter( 'comment_form_fields', 'xcode_comment' ); 

/**
 * 
 * Social Function
 * 
 */
function xcode_social() {
	$xcode_facebook_link = get_theme_mod( 'xcode_facebook_link', '' );
	$xcode_twitter_link = get_theme_mod( 'xcode_twitter_link', '' );	
    $xcode_instagram_link = get_theme_mod( 'xcode_instagram_link', '' );
    $xcode_pinterest_link = get_theme_mod( 'xcode_pinterest_link', '' );	
	$xcode_linkedin_link = get_theme_mod( 'xcode_linkedin_link', '' );
	$xcode_googleplus_link = get_theme_mod( 'xcode_googleplus_link', '' );
	$xcode_youtube_link = get_theme_mod( 'xcode_youtube_link', '' );
    $xcode_vimeo_link = get_theme_mod( 'xcode_vimeo_link', '' );
?>
	<ul class="cgt-social-icons">
		<?php if( !empty ( $xcode_facebook_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_facebook_link ); ?>"> <span class="cgt-social-icon fa fa-facebook"></span></a></li> <?php } ?>
		<?php if( !empty ( $xcode_twitter_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_twitter_link ); ?>"> <span class="cgt-social-icon fa fa-twitter"></span></a></li> <?php } ?>
		<?php if( !empty ( $xcode_instagram_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_instagram_link ); ?>" > <span class="cgt-social-icon fa fa-instagram"></span></a></li> <?php } ?>
        <?php if( !empty ( $xcode_pinterest_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_pinterest_link ); ?>" > <span class="cgt-social-icon fa fa-pinterest"></span></a></li> <?php } ?>
        <?php if( !empty ( $xcode_linkedin_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_linkedin_link ); ?>" > <span class="cgt-social-icon fa fa-linkedin"></span></a></li> <?php } ?>
		<?php if( !empty ( $xcode_googleplus_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_googleplus_link ); ?>" > <span class="cgt-social-icon fa fa-google-plus"></span></a></li> <?php } ?>
        <?php if( !empty ( $xcode_youtube_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_youtube_link ); ?>" > <span class="cgt-social-icon fa fa-youtube"></span></a></li> <?php } ?>
        <?php if( !empty ( $xcode_vimeo_link ) ) { ?> <li class="text-center"><a href="<?php echo esc_url( $xcode_vimeo_link ); ?>" > <span class="cgt-social-icon fa fa-vimeo"></span></a></li> <?php } ?>
	</ul>
<?php
}


function xcode_footer_menu() {
   wp_nav_menu(
    array(
		'theme_location' => 'footer-menu',
		'container' => false,
		'menu_class' => 'footer-menu',
        'depth'          => 1,
		'echo' => true,
		'fallback_cb' => 'xcode_default_menu',
		)
	);
}


