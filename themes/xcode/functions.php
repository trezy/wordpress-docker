<?php
/**
* Xcode functions and definitions
*
* @package Xcode
* @author CodeGear Themes
* 
*/

if ( ! function_exists( 'xcode_setup' ) ){
	function xcode_setup() {

		#sMake theme available for translation.
		load_theme_textdomain( 'xcode', get_template_directory() . '/languages' );

		#Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		#Enable support for site title tag.
		add_theme_support( 'title-tag' );

		#Enable support for Post Thumbnails.
		add_theme_support( 'post-thumbnails' );

		#Register Navigation Menu.
		register_nav_menus( array(
    		'primary' => esc_html__( 'Primary Menu', 'xcode' ),
    		'footer-menu' => esc_html__( 'Footer Menu', 'xcode' ),
    	) );

		#Add Image Size for Widget thumbnail for recent posts.
		add_image_size( 'xcode-widget-thumb', 100, 100, true );
		add_image_size( 'xcode-thumbnail-medium', 628, 420, true );

		#Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'xcode_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		#Enable support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 100,
			'width'       => 400,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'Xcode', 'Best Theme for Blogs' ),
		) );

		#Enable support for HTML5.
		add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'gallery', 'caption' ) );

		$header_img_args = array(
		  'flex-width'    => true,
		  'width'         => 1500,
		  'flex-height'   => true,
		  'height'        => 480,
		  'default-text-color'     => '',
		  'default-image' => '',
	 	);

		add_theme_support( 'custom-header', $header_img_args );

		add_editor_style( 'assets/css/editor-style.css' );
	}
}
add_action( 'after_setup_theme', 'xcode_setup' );


/**
* Retrieve the register Google Fonts
*/
function xcode_google_font_url() {
	$font_families = array( 'Lato:400,400italic,700,700italic' );
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);
	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	return $fonts_url;
}

/**
* Enqueue Google Fonts on Front End
*
* @since Xcode 1.0
*/
function xcode_scripts_styles() {
	wp_enqueue_style( 'xcode-fonts', xcode_google_font_url(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'xcode_scripts_styles' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since Xcode 1.0
*/
function xcode_custom_header_fonts() {
	wp_enqueue_style( 'xcode-fonts', xcode_google_font_url(), array(), null );
}
add_action( 'admin_print_styles-appearance_page_custom-header', 'xcode_custom_header_fonts' );

/**
* Sets the content width in pixels, based on the theme's design and stylesheet.
*
* Priority 0 to make it available to lower priority callbacks.
*
* @global int $content_width
*
* @since Xcode 1.0.0
* 
*/
function xcode_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xcode_content_width', 900 );
}
add_action( 'after_setup_theme', 'xcode_content_width', 0 );

/**
* 
* Enqueue Scripts
* @since Xcode 1.0.0
* 
*/

if ( ! function_exists( 'xcode_enqueue_scripts' ) ) {
	function xcode_enqueue_scripts() {
	   
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/css/normalize.css', false, '3.0.3' );
        wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/css/bootstrap.css', false, '3.3.7' );
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/lib/font-awesome/css/font-awesome.css', false, '4.6.3' );
        wp_enqueue_style( 'xcode-style', get_template_directory_uri() . '/assets/css/styles.css', false, '1.0.0' );
		wp_enqueue_style( 'xcode-styles', get_stylesheet_uri(), false, '1.0.0' );

		$xcode_header_clr = esc_html( get_theme_mod( 'header_textcolor', '4a88c2' ) );
        $_xcode_header_clr = "
            .logo a, .wp-menu > li > a{
                    color: #{$xcode_header_clr};
            }";
        wp_add_inline_style( 'xcode-style', $_xcode_header_clr );

        wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/lib/bootstrap/js/bootstrap.js', array( 'jquery' ), '1.0' );
		wp_enqueue_script( 'xcode-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '1.0' );
		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', false, '2.8.3', true );
		wp_enqueue_script( 'xcode-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.5', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
}
add_action( 'wp_enqueue_scripts', 'xcode_enqueue_scripts' );

function xcode_excerpt_more( $link ) {
    if ( is_admin() ) {
		return $link;
	}
    return sprintf( '<a class="read-more more-link" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Continue reading', 'xcode' )
    );
}
add_filter( 'excerpt_more', 'xcode_excerpt_more' );

require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/widgets/xcode-posts-thumbnail.php';
require get_template_directory() . '/core/xcode-functions.php';
require get_template_directory() . '/inc/xcode-helper.php';

/**
* 
* Widget
* @since Xcode 1.0.0
* 
*/
function xcode_recent_post_widget() {
	register_widget( 'Xcode_Recent_Posts_Widget' );
}
add_action( 'widgets_init', 'xcode_recent_post_widget');

/**
* 
* Excerpt Length
* @since Xcode 1.0.0
* 
*/
function xcode_excerpt_length( $length ) {
     if ( is_admin() ) {
		return $length;
	}
    return 30;
}
add_filter( 'excerpt_length', 'xcode_excerpt_length', 100 );


