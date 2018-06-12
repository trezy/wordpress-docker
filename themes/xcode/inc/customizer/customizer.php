<?php
/**
 * [xcode_customize_options description]
 *
 * @param  [array] $wp_customize [description].
 * @return [type]               [description].
 */
function xcode_customize_options( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->get_control( 'background_color' )->section   = 'background_image';
	$wp_customize->get_section( 'background_image' )->title     = __( 'Background', 'xcode' );
	// $wp_customize->get_section( 'header_image' )->title     = __( 'Header Image', 'xcode' );
}

add_action( 'customize_register', 'xcode_customize_options' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function xcode_customize_preview_js() {
	wp_enqueue_script( 'xcode_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'xcode_customize_preview_js' );
?>
