<?php
/**
 * 
 * 
 * @package xcode
 * @author CodeGear Themes
 * 
 */  
function xcode_general_settings( $wp_customize ) {
    $wp_customize->add_panel(
        'xcode_general_settings_panel', 
        	array(
                'title'          => esc_html__( 'General Settings', 'xcode' ),
        		'priority'       => 1,
            	'capability'     => 'edit_theme_options',
            	'theme_supports' => ''
            ) 
    );
    $wp_customize->get_section( 'title_tagline' )->panel = 'xcode_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->panel = 'xcode_general_settings_panel';
    $wp_customize->get_section( 'colors' )->panel = 'xcode_general_settings_panel';
    $wp_customize->get_section( 'static_front_page' )->panel = 'xcode_general_settings_panel'; 
    $wp_customize->get_section( 'header_image' )->panel = 'xcode_general_settings_panel';   
}
add_action( 'customize_register', 'xcode_general_settings' );
