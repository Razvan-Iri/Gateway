/**
 * File used in conjuction with  customizer.php in order to provide a live refresh of the changes
 *
 * @link https://iamrazvan.com/
 *
 * @package WordPress
 * @subpackage Gateway
 * @since 1.0
 * @version 1.0
 */

( function( $ ) {
// function used to live refresh the bg color
  wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'background-color', newval );
		} );
	} );
  // wp.customize( 'blogname', function( value ) {
  //   value.bind( function( newval ) {
  //     $( '#intro h1' ).html( newval );
  //     $( '#intro h1' ).css('color', newval );
  //   } );
  // } );
  //
  // wp.customize( 'blogdescription', function( value ) {
  //   value.bind( function( newval ) {
  //     $( '#intro h2' ).html( newval );
  //   } );
  // } );

  // functions used to live refresh each section of the slider and its contents
  //1
  wp.customize( 'slider_heading_one', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-heading-one' ).html( newval );
    } );
  } );
  wp.customize( 'slider_linkText_one', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-link-one' ).html( newval );
    } );
  } );
  wp.customize( 'slider_description_one', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-description-one' ).html( newval );
    } );
  } );
  //2
  wp.customize( 'slider_heading_two', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-heading-two' ).html( newval );
    } );
  } );
  wp.customize( 'slider_linkText_two', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-link-two' ).html( newval );
    } );
  } );
  wp.customize( 'slider_description_two', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-description-two' ).html( newval );
    } );
  } );
  //3
  wp.customize( 'slider_heading_three', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-heading-three' ).html( newval );
    } );
  } );
  wp.customize( 'slider_linkText_three', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-link-three' ).html( newval );
    } );
  } );
  wp.customize( 'slider_description_three', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-description-three' ).html( newval );
    } );
  } );
  //4
  wp.customize( 'slider_heading_four', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-heading-four' ).html( newval );
    } );
  } );
  wp.customize( 'slider_linkText_four', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-link-four' ).html( newval );
    } );
  } );
  wp.customize( 'slider_description_four', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-description-four' ).html( newval );
    } );
  } );
  //5
  wp.customize( 'slider_heading_five', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-heading-five' ).html( newval );
    } );
  } );
  wp.customize( 'slider_linkText_five', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-link-five' ).html( newval );
    } );
  } );
  wp.customize( 'slider_description_five', function( value ) {
    value.bind( function( newval ) {
      $( '#o-slider-description-five' ).html( newval );
    } );
  } );

} )( jQuery );
