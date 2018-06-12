<?php
/**
 * Template for header.
 *
 * @package Xcode
 * @author CodeGear Themes
 * 
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php $xcode_src = xcode_header_image(); ?>
<?php 
if( is_active_sidebar( 'xcode-newsletter-sidebar' ) ){
   $class = 'slider-show'; 
}else{
   $class = 'slider-hidden';  
}?>
<div id="page" class="site <?php echo $class; ?>">
    <header class="site-header">
    	<div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-6 col-xs-6 text-left">
    	           <?php xcode_site_logo(); ?>
                </div>
                <div class="col-lg-10 col-md-9 col-sm-6 col-xs-6">   
  		      	<?php
        				// Display Main Navigation
        				wp_nav_menu( array(
        					'theme_location' => 'primary',
        					'container' => false,
        					'menu_class' => 'wp-menu',
        					'echo' => true,
        					'fallback_cb' => 'xcode_default_menu',
        					)
        				);
        			?>
                </div>
            </div>
    	</div>
    </header>
    
    <?php if( is_home() || is_front_page() ){ ?>
        <?php  if ( $xcode_src != '' ){ ?>
            <section class="sw-slider">
                    <div class="banner-section header-banner text-left float-left" <?php if( $xcode_src != '' ): ?>style="background: url(<?php echo esc_url( $xcode_src ); ?>);"<?php endif; ?>>
                        <div class="container">
                            <div class="widget-content">
                		      <?php
                              if ( is_active_sidebar( 'xcode-newsletter-sidebar' ) ):
            		              dynamic_sidebar( 'xcode-newsletter-sidebar' );
                              endif;
                              ?>
                              </div>
                        </div>
            	    </div>
            </section>
    <?php }
        }else{ xcode_inner_header(); } 
    ?>
    
    <div id="site_content">
        <div class="container">
          <div class="row">
