/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.logo a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.logo a' ).attr( 'title', to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {

			if ( '' != to ) {
				console.log(to);
				$( '.logo a, .wp-menu > li > a' ).css( {
					'color': to
				} );
			} else {
				$( '.logo a, .wp-menu > li > a' ).css( {
					'color': '#000000'
				} );
			}
		} );
	} );
} )( jQuery );
