<?php
/**
 * 
 * 
 * @package xcode
 * @author CodeGear Themes
 * 
 */ 
function xcode_theme_settings( $wp_customize ) {
	
    
	$wp_customize->add_panel( 'xcode_options_panel', array(
		'title'          => __( 'Theme Settings', 'xcode' ),
		'description'    => __( 'Customize theme using following settings.', 'xcode' ),
        'priority'       => 2,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
	   ) 
    );

	
	$wp_customize->add_section( 
        'xcode_header_bg' , 
        array(
    		'title'     => __( 'Header Banner', 'xcode' ),
    		'priority'  => 5,
    		'panel' 	=> 'xcode_options_panel',
    	) 
    );
	$wp_customize->add_section( 
        'xcode_innerpage_header_bg' , 
        array(
    		'title'     => __( 'Innerpage Banner', 'xcode' ),
    		'priority'  => 10,
    		'panel' 	=> 'xcode_options_panel',
    	) 
    );
    
    $wp_customize->add_section( 
        'xcode_innerpage_header_bg' , 
        array(
    		'title'     => __( 'Innerpage Banner', 'xcode' ),
    		'priority'  => 10,
    		'panel' 	=> 'xcode_options_panel',
    	) 
    );

	$wp_customize->add_section( 
        'xcode_theme_layout' ,
         array(
    		'title'     => __( 'Theme layout', 'xcode' ),
    		'priority'  => 15,
    		'panel' 	=> 'xcode_options_panel',
    	) 
    );

    #Custimizer Variables
	$xcode_default_header = array(
		get_template_directory_uri() . '/img/header_banner.png',
		get_template_directory_uri() . '/img/header_banner_innerpage.png',
        get_template_directory_uri() . '/img/author.png'
	);
    
    #Innepage Header Banner
    $wp_customize->add_setting( 
        "xcode_innerpage_header_banner", 
        array(
    		'default' 			=> '',
    		'sanitize_callback' => 'esc_url_raw',
    	) 
    );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        "xcode_innerpage_header_banner", 
        array(
    		'label' 	=> __( 'Header Banner' , 'xcode' ),
    		'section' 	=> "xcode_innerpage_header_bg",
    		'settings'	=> "xcode_innerpage_header_banner",
    		'priority'	=> 10,
            'description'    => __( 'Upload header banner for innerpage.', 'xcode' ),
    	   ) 
        ) 
    );

    #Author Widget
	$wp_customize->add_setting( 
        'xcode_theme_author_widget', 
        array(
    		'default' 			=> false,
    		'sanitize_callback' => 'xcode_sanitize_checkbox',
    	   ) 
    );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'xcode_theme_author_widget', 
        array(
    		'label'			=> __( 'Display the Author Widget?', 'xcode' ),
    		'section'		=> 'xcode_theme_layout',
    		'settings'		=> 'xcode_theme_author_widget',
    		'type'			=> 'checkbox',
    		'priority' 		=> 2,
    	   ) 
        ) 
    );
    
     #Header Banner
	$wp_customize->add_setting( 
        "xcode_author_image", 
        array(
    		'default' 			=> $xcode_default_header[2],
    		'sanitize_callback' => 'esc_url_raw',
    	) 
    );
    
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 
        "xcode_header_banner", 
        array(
    		'label' 	=> __( 'Author Image' , 'xcode' ),
    		'section' 	=> "xcode_theme_layout",
    		'settings'	=> "xcode_author_image",
    		'priority'	=> 1,
            'description'    => __( 'Upload author profile.', 'xcode' ),
    	   ) 
        ) 
    );

	#Theme Layout
	$wp_customize->add_setting( 
        'xcode_theme_layout_style', 
        array(
    		'default' 			=> 'sidebar',
    		'sanitize_callback' => 'xcode_sanitize_align',
    	) 
    );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
        'xcode_theme_layout_style', 
        array(
    		'type'		=> 'radio',
    		'label' 	=> __( 'Theme Layout', 'xcode' ),
    		'section' 	=> 'xcode_theme_layout',
    		'choices' 	=> array(
        		'sidebar' 		=> __( 'Sidebar', 'xcode' ),
        		'fullwidth' 	=> __( 'Full Width', 'xcode' ),
    		),
    		'priority' => 5,
    	) 
      ) 
    );
}
add_action( 'customize_register', 'xcode_theme_settings' );