<?php
/**
 * Gateway functions and definitions
 *
 * @link https://iamrazvan.com/
 *
 * @package WordPress
 * @subpackage Gateway
 * @since 1.0
 * @version 1.0
 **/

 if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
 	require get_template_directory() . '/inc/back-compat.php';
 	return;
 }


//function used to add css assets

function gateway_load_styles(){

//loads the boostrap css
wp_register_style('bootstrap', get_stylesheet_directory_uri(). '/includes/css/bootstrap.min.css', array(), '4.0.2','all' );
wp_enqueue_style('bootstrap');
//loads the custom theme css
wp_register_style( 'gateway',get_template_directory_uri().'/includes/css/gateway.css' , array(),'0.0.1', 'all' );
wp_enqueue_style( 'gateway' );
//loads default style css file
wp_register_style( 'style', get_template_directory_uri().'/style.css');
wp_enqueue_style('style');

}

//function used to add js assets

function gateway_load_scripts(){
//Deregister current jquery version from WP
wp_deregister_script( 'jquery' );
//adds an external jquery source
wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1',  false );
wp_enqueue_script( 'jquery' );
//loads theme js file
wp_register_script( 'gatewayJs', get_template_directory_uri().'/includes/js/gateway.js', array(), '0.0.1',  false );
wp_enqueue_script( 'gatewayJs' );

//add requirement for boostrap
wp_register_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' , array(), '1.12.9' ,  false );
wp_enqueue_script( 'popper' );
//after all req add, we add boostrap
wp_register_script( 'bootstrap', get_template_directory_uri().'/includes/js/bootstrap.min.js', array(), '1.0.0',  false );
wp_enqueue_script( 'bootstrap' );

wp_register_script( 'customizer_settings', get_template_directory_uri().'/admin/customizer/customizer.js', array( 'jquery','customize-preview' ), '', true );
wp_enqueue_script( 'customizer_settings');

wp_register_script( 'Velocity_js', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js', array(), '1.2.3', true );
wp_enqueue_script( 'Velocity_js');

wp_register_script( 'Velocity_ui_js', 'https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js', array(), '1.2.3', true );
wp_enqueue_script( 'Velocity_ui_js');


}

//hooks used to load scripts and styles listed above
add_action( 'wp_enqueue_scripts', 'gateway_load_scripts');
add_action( 'wp_enqueue_scripts', 'gateway_load_styles' );




//front page enqueue

function gateway_enqueue_front_page_scripts() {
    if( is_front_page() )
    {
      wp_register_style( 'slider_header', get_template_directory_uri().'/includes/header-slider/dep/header-style.css', array(), '0.0.1' ,  'all' );
      wp_enqueue_style( 'slider_header' );
      //Function that adds the js dep for the header slider and checks if the current page is the front page then it loads the scripts

      wp_register_script( 'slider_header_hammer', get_template_directory_uri().'/includes/header-slider/dep/hammer.min.js', array('jquery'), '0.0.1', true );
      wp_enqueue_script ( 'slider_header_hammer' );


      wp_register_script( 'slider_header_main', get_template_directory_uri().'/includes/header-slider/dep/header-script.js', array('jquery'), '0.0.1', true );
      wp_enqueue_script ( 'slider_header_main' );

    }
}
add_action( 'wp_enqueue_scripts', 'gateway_enqueue_front_page_scripts' );

//A custom WordPress nav walker class to fully implement the Twitter Bootstrap 4.x navigation style in a custom theme using the WordPress built in menu manager
require get_template_directory() . '/bootstrap-navwalker.php';

//Registers the custom menu support for the current theme
register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'theme-textdomain' ),
) );

//Register custom Image sizes

add_theme_support( 'post-thumbnails' );
function gecko_imagesize_setup() {
add_theme_support( 'post-thumbnails' );
add_image_size( 'large-1220px', 1200, 300, true);
add_image_size( 'medium-600px', 600, 550, true);
add_image_size( 'small-300px', 300, 250, true);
add_image_size( 'logo-120px', 120, 100, true );
}

add_action( 'after_setup_theme', 'gecko_imagesize_setup' );

//Image size in media selectos
add_filter( 'image_size_names_choose', 'gateway_custom_image_sizes' );

function gateway_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'large-1220px' => __( 'Large Image '),
        'medium-600px' => __( 'Medium Image '),
        'small-300px' => __( 'Small Image '),
        'logo-120px' => _('Extra Small Image')
    ) );
}

//register custom logo support
function gateway_custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'gateway_custom_logo_setup' );

//injects additional classes to the custom logo by replacing the old class with the new bootstrap classes
add_filter('get_custom_logo','change_logo_class');
function change_logo_class($html)
{
	$html = str_replace('custom-logo', ' navbar-brand custom-logo align-top d-block justify-content-center', $html);
	return $html;
}

//header image set-up
$defaults = array(
	'default-image'          => '',
	'width'                  => 1900,
	'height'                 => 300,
	'flex-height'            => true,
	'flex-width'             => true,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);
//adds support for the custom header with the parameters listed above
add_theme_support( 'custom-header', $defaults );


//includes the customizer php file which enables the customizer options for the theme
require get_template_directory() . '/admin/customizer/customizer.php';










?>
