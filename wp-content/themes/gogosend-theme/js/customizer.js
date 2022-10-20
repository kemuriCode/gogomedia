/* global wp, jQuery */
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
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );
}( jQuery ) );
( function( $ ) {
	$( function() {
		$( 'nav ul li > a:not(:only-child)' ).click( function( e ) {
			$( this ).siblings( '.nav-dropdown' ).slideToggle();
			$( '.nav-dropdown' ).not( $( this ).siblings() ).hide();
			e.stopPropagation();
		} );
		$( 'html' ).click( function() {
			$( '.nav-dropdown' ).hide();
		} );
		// Toggle open and close nav styles on click
		$( '#nav-toggle' ).click( function() {
			$( 'nav ul' ).slideToggle();
		} );
		$( '#nav-toggle' ).on( 'click', function() {
			this.classList.toggle( 'active' );
		} );
	} );
}( jQuery ) );
