<?php
/**
 *
 * @package     xcode 
 * @author      CodeGear Themes
 * @version     1.0.0
 * 
 */

if( ! function_exists( 'xcode_social_settings' ) ):
	function xcode_social_settings( $wp_customize ) {
        $xcode_social_links = array( 
			'xcode_facebook_link' => __( 'Facebook Url', 'xcode' ),
			'xcode_twitter_link' => __( 'Twitter Url', 'xcode' ),
            'xcode_instagram_link' => __( 'Instagram Url', 'xcode' ),
            'xcode_pinterest_link' => __( 'Pinterest Url', 'xcode' ),
			'xcode_linkedin_link' => __( 'Linkedin Url', 'xcode' ),
			'xcode_googleplus_link' => __( 'Google Plus Url', 'xcode' ),
			'xcode_youtube_link' => __( 'YouTube Url', 'xcode' )
		);
        
        #SOCIAL PANEL SETTINGS
		$wp_customize->add_panel(
	        'xcode_social_settings_panel', 
	        	array(
                    'title'          => esc_html__( 'Social Settings', 'xcode' ),
	        		'priority'       => 3,
	            	'capability'     => 'edit_theme_options',
	            	'theme_supports' => ''
	            ) 
	    );
        
        #SOCIAL SECTION SETTINGS
		$wp_customize->add_section(
	        'xcode_social_icons_section',
	        array(
	            'title'		=> esc_html__( 'Social Icons/Links', 'xcode' ),
	            'panel'     => 'xcode_social_settings_panel',
	            'priority'  => 5,
                'description' => __( 'leave empty to disable social icon' , 'xcode' )
	        )
	    );
        
        $wp_customize->add_setting(
        'xcode_social_enable',
            array(
                'default' => false,
                'sanitize_callback' => 'xcode_sanitize_checkbox',
                'transport' => 'refresh',
                )
        );
        
        $wp_customize->add_control(
            'xcode_social_enable',
            array(
                'label' => __( 'Enable', 'xcode' ),
                'description' => __( 'check to enable social icons' , 'xcode' ),
                'section' => 'xcode_social_icons_section',
                'type' => 'checkbox',
                'priority' => 1,
            )
        ); 
        
        #SOCIAL SETTINGS
	    $count = 2;
	    foreach ( $xcode_social_links as $cgt_key => $cgt_val ) {
	    	$wp_customize->add_setting(
		        $cgt_key,
		            array(
		                'default' => '',
		                'sanitize_callback' => 'esc_url_raw',
		                'transport' => 'refresh'
			       )
		    );    
		    $wp_customize->add_control(
		        $cgt_key,
		            array(
		            'type' => 'text',
		            'label' => $cgt_val,
		            'section' => 'xcode_social_icons_section',
		            'priority' => $count,
                    'description' => __( 'enter full social url' , 'xcode' )
		            )
		    );
		    $count++;
	    }
	    

	} 
endif;
add_action( 'customize_register', 'xcode_social_settings' );

