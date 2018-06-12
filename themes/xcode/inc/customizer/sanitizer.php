<?php
/**
 * 
 * 
 * @package xcode
 * @author CodeGear Themes
 * 
 */  

#Sanitize Input Text
function xcode_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

#Sanitize Checkboxes.
function xcode_sanitize_checkbox( $checked ) {
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

#Sanitize Alignment.
function xcode_sanitize_align( $input ) {
$valid = array(
		'sidebar' 		=> __( 'Sidebar', 'xcode' ),
		'fullwidth' 	=> __( 'Full Width', 'xcode' ),
	);
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return 'sidebar';
    }
}