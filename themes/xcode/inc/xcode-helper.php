<?php
/**
 * 
 * 
 * @package xcode
 * @author CodeGear Themes
 * 
 */  
 require get_template_directory() . '/inc/customizer/general-settings.php';
 require get_template_directory() . '/inc/customizer/theme-settings.php';
 require get_template_directory() . '/inc/customizer/social-settings.php';
 require get_template_directory() . '/inc/customizer/sanitizer.php';
 
 
 
 if ( ! function_exists( 'xcode_site_logo' ) ) :
	function xcode_site_logo() {

		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			the_custom_logo();

		} else {
			?>
			<div class="logo-container">
				<h1 class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php echo  esc_html( get_bloginfo( 'description' ) ); ?>"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</h1>
			</div>
			<?php
		}

	}
endif;

if ( ! function_exists( 'xcode_default_menu' ) ) :
	function xcode_default_menu() {
		echo '<ul id="" class="wp-menu">'. wp_list_pages( 'title_li=&echo=0' ) .'</ul>';
	}
endif;

if ( ! function_exists( 'xcode_layout' ) ) :
	function xcode_layout() {

		'fullwidth' === get_theme_mod( 'xcode_theme_layout_style' ) ?
		$xcode_layout = 'sw-fullwidth col-md-12' : $xcode_layout = 'col-md-8 col-sm-12';
		echo $xcode_layout;
	}
endif;

if ( ! function_exists( 'xcode_sidebar' ) ) :
	function xcode_sidebar() {
		if ( 'sidebar' === get_theme_mod( 'xcode_theme_layout_style' , 'sidebar' ) ) :
			echo get_sidebar();
		endif;
	}
endif;

if ( ! function_exists( 'xcode_post_meta_author' ) ) :
	function xcode_post_meta_author() {

		$author_string = sprintf( '<a href="%1$s" class="author" title="%2$s" rel="author"><i class="fa fa-user-o" aria-hidden="true"></i>%3$s</a>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'xcode' ), esc_html( get_the_author() ) ) ),
		esc_html( get_the_author() )
	);
	echo wp_kses( $author_string, array( 'a' => array( 'href' => array(), 'class' => array(), 'title' => array(), 'rel' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ) ) );

}
endif;

if ( ! function_exists( 'xcode_post_meta_date' ) ) :
	function xcode_post_meta_date() {

		$time_string = sprintf( '<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i><time class="entry-date published updated" datetime="%3$s"><a href="%1$s">%4$s</a></time></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	echo wp_kses( $time_string, array( 'span' => array( 'class' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ), 'time' => array( 'class' => array( 'entry-date', 'published', 'updated' ), 'datetime' => array() ), 'a' => array( 'href' => array() ) ) );
}
endif;

if ( ! function_exists( 'xcode_post_meta_category' ) ) :
	function xcode_post_category() {
	   $categories = get_the_category();
       if ( ! empty( $categories ) ) {
            echo '<span class="categories">' . esc_html( $categories[0]->name ) . '</span>';   
       }
	}
endif;

if ( ! function_exists( 'xcode_post_meta_tag' ) ) :
	function xcode_post_meta_tag() {
		echo '<span class="categories">' . get_the_tag_list( '', ', ' ) . '</span>';
	}
endif;

if ( ! function_exists( 'xcode_author_fullname' ) ) :
	function xcode_author_fullname() {
		$author_fname = strtoupper( esc_html( get_the_author_meta( 'first_name' ) ) );
		$author_lname = strtoupper( esc_html( get_the_author_meta( 'last_name' ) ) );
		if ( $author_fname and $author_lname ) {
			$author_fullname = $author_fname . ' ' . $author_lname;
		} else {
			$author_fullname = strtoupper( esc_html( get_the_author_meta( 'display_name' ) ) );
		}
		echo '<h2>' . $author_fullname . '</h2>';
	}
endif;

if ( ! function_exists( 'xcode_author_bio' ) ) :
	function xcode_author_bio() {
		$xcode_auth_avat = get_avatar( sanitize_email( get_the_author_meta( 'user_email' ) ), 64 );
		$xcode_auth_desc = esc_html( get_the_author_meta( 'description' ) );

		$xcode_auth_bio = '<div class="authorimg">' . $xcode_auth_avat . '</div>';
		if ( ! empty( $xcode_auth_desc ) ) :
			$xcode_auth_bio .= ' <div class="author-meta-data">';
			$xcode_auth_bio .= '</h6>' .__( 'About Author', 'xcode' ) . '</h6>';
			$xcode_auth_bio .= '<p>' . wp_kses_post( $xcode_auth_desc ) . '</p></div>';
		endif;

		echo wp_kses( $xcode_auth_bio, array( 'div' => array( 'class' => array() ), 'p' => array( 'class' => array() ), 'h6' => array(), 'img' => array( 'src' => array(), 'srcset' => array(), 'class' => array(), 'alt' => array(), 'height' => array(), 'width' => array() ) ) );

	}
endif;

if ( ! function_exists( 'xcode_about_author' ) ) :
	function xcode_about_author() {
		$author_fname 	= strtoupper( esc_html( get_the_author_meta( 'first_name' ) ) );
		$author_lname 	= strtoupper( esc_html( get_the_author_meta( 'last_name' ) ) );
		if ( $author_fname and $author_lname ) {
			$author_fullname = $author_fname . ' ' . $author_lname;
		} else {
			$author_fullname = strtoupper( esc_html( get_the_author_meta( 'display_name' ) ) );
		}
		$author_image 	= get_theme_mod( 'xcode_author_image' , get_template_directory_uri() . '/img/author.png' );

		$author_shabout  = get_the_author_meta( 'description' ) ? get_the_author_meta( 'description' ) : __( 'Add Short Descriptiop From Users > Your Profile > Biographical Info', 'xcode' );
		if (  get_theme_mod( 'xcode_theme_admin_widget', true ) ||
		checked( get_theme_mod( 'xcode_theme_admin_widget' ), true, false ) ) :
		$author_about_wid = '<div class="widget-box widget">';
		$author_about_wid .= '<h5>' . __( 'About', 'xcode' ) . '</h5>';
		$author_about_wid .= '<div class="authorinfo">';
		$author_about_wid .= '<div class="authorimg">';
		$author_about_wid .= '<img src="'.$author_image.'"/>';
		$author_about_wid .= '</div>';
		$author_about_wid .= '<h3>' . $author_fullname . '</h3>';

		$author_about_wid .= '<p>' . esc_html( $author_shabout ) . '</p>';
		$author_about_wid .= '</div></div>';

		echo wp_kses( $author_about_wid, array( 'div' => array( 'class' => array() ), 'h5' => array(), 'h3' => array(), 'ul' => array( 'class' => array() ), 'li' => array(), 'a' => array( 'href' => array(), 'class' => array() ), 'i' => array( 'class' => array(), 'aria-hidden' => array() ), 'p' => array(), 'img' => array( 'src' => array(), 'srcset' => array(), 'class' => array(), 'alt' => array(), 'height' => array(), 'width' => array() ) ) );
	endif;
}
endif;

if ( ! function_exists( 'xcode_post_thumbnail' ) ) :
	function xcode_post_thumbnail() {
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'xcode-thumbnail-medium' );
		endif;
	}

endif;

if ( ! function_exists( 'xcode_post_comment_count' ) ) :
	function xcode_post_comment_count() {
		echo comments_number( __( 'Leave a Comment.', 'xcode' ), __( 'One comment', 'xcode' ), __( '% comments', 'xcode' ) );
	}
endif;

if ( ! function_exists( 'xcode_pagination' ) ) :
	function xcode_pagination() {

		the_posts_pagination( array(
		    'mid_size' 	=> 2,
		    'prev_text' => '&laquo',
		    'next_text' => '&raquo;'
			) );
	}
endif;



if ( ! function_exists( 'xcode_widgets_init' ) ) :
	function xcode_widgets_init() {
		register_sidebar( array(
			'name' => __( 'Sidebar', 'xcode' ),
			'id' => 'xcode-sidebar',
			'description' => __( 'Appears in sidebar of post , pages etc', 'xcode' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' => '<h5>',
			'after_title' => '</h5>',
		));
        
        register_sidebar( array(
			'name' => __( 'Newsletter', 'xcode' ),
			'id' => 'xcode-newsletter-sidebar',
			'description' => __( 'newsletter area in homepage banner', 'xcode' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
	}
endif;
add_action( 'widgets_init', 'xcode_widgets_init' );


 