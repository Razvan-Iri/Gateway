<?php
/**
 * File used to extend the customizer settings in the front-end
 *
 * It contains the following options:
 *  - background color chnage for the body + live refresh
 *  - font color chnage for the h1 tag + live refresh
 *  - background color chnage for the body + live refresh
 *  - option for the front-page slider
 *        * option to choose images
 *        * option to change slider text values
 * @link https://iamrazvan.com/
 *
 * @package WordPress
 * @subpackage Gateway
 * @since 1.0
 * @version 1.0
 */
// register additonal functionality to the customizer
add_action( 'customize_register', 'gateway_customizer_settings' );
function gateway_customizer_settings( $wp_customize ) {
//retrieves the settings for the blogname, blogdescriptiopn and the header font color, more specifically for the header color the transport is refresh so that we can see a live refresh if the color is changed
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
  $wp_customize->get_setting( 'header_textcolor' )->transport = 'refresh';

//file input sanitization function
  function gateway_sanitize_file( $file, $setting ) {
//allowed file types
  $mimes = array(
      'jpg|jpeg|jpe' => 'image/jpeg',
      'gif'          => 'image/gif',
      'png'          => 'image/png'
  );
//check file type from file name
  $file_ext = wp_check_filetype( $file, $mimes );
//if file has a valid mime type return it, otherwise return default
  return ( $file_ext['ext'] ? $file : $setting->default );
  }
//adds extra setting to change the background color
//----------------------------------------------------------------//
//adds an extra section called Background Color
  $wp_customize->add_section( 'bg_colors' , array(
        'title'      => 'Background Color',
        'priority'   => 30,
    ) );
  //sets the default color and the transport type for live refresh
  $wp_customize->add_setting( 'background_color' , array(
        'default'     => '#43C6E4',
        'transport'   => 'refresh',
    ) );
  //adds new customizer control with a label
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
      'label'      => 'Background Color',
      'section'    => 'bg_colors',
      'settings'   => 'background_color',
    ) ) );
//----------------------------------------------------------------//

//SLIDER CONTROLS

//----------------------------------------------------------------//

// Creates a new panel called slider controls, and displays it only if the user is on the front-page.
$wp_customize->add_panel( 'slider_panel', array(
    'title'             => 'Slider Controls',
    'description'       => 'Configure text and images for the Front Page Main Slider ',
    'priority'          => 10,
    'active_callback'   => 'is_front_page',
));

// Settings for first image in slider and containing text
//////////////////////////////////////////////////////////////
/*adds section for slider 1 */
$wp_customize->add_section('slider_control_one', array(
    "title"               => 'Slide One Controls',
    "priority"            => 28,
    "description"         => 'Configure the first Slide. Recommended image size 1980*1080.',
    'panel'               => 'slider_panel',
));
//settings for slide one
$wp_customize->add_setting('slider_image_one', array(
    'default'             => '',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'gateway_sanitize_file',
));
$wp_customize->add_setting( 'slider_linkText_one' , array(
    'default'             => 'Find out More',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_linkhref_one' , array(
    'default'             => '#',
    'transport'           => 'refresh',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'esc_url',
));
$wp_customize->add_setting( 'slider_heading_one' , array(
    'default'             => 'Heading',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_description_one' , array(
    'default'             => 'Description',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
//Controls for slide one
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image_one', array(
    'label'               => 'Image One',
    'section'             => 'slider_control_one',
    'settings'            => 'slider_image_one',
)));
$wp_customize->add_control( 'slider_linkText_one', array(
    'label'               => 'Link Text',
    'section'	            => 'slider_control_one',
    'type'	              => 'text',
));
$wp_customize->add_control( 'slider_linkhref_one', array(
    'label'               => 'Link URL',
    'section'	            => 'slider_control_one',
    'type'                => 'url',
));
$wp_customize->add_control( 'slider_heading_one', array(
    'label'               => 'Heading Slide One',
    'section'	            => 'slider_control_one',
    'type'                => 'text',
));
$wp_customize->add_control( 'slider_description_one', array(
    'label'               => 'Text Slide One',
    'section'	            => 'slider_control_one',
    'type'                => 'text',
));
//////////////////////////////////////////////////////////////
/*adds section for slide2 2 */
$wp_customize->add_section('slider_control_two', array(
    "title"               => 'Slide two Controls',
    "priority"            => 28,
    "description"         => 'Configure the second Slide. Recommended image size 1980*1080.',
    'panel'               => 'slider_panel',
));
//settings for slide two
$wp_customize->add_setting('slider_image_two', array(
    'default'             => '',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'gateway_sanitize_file',
));
$wp_customize->add_setting( 'slider_linkText_two' , array(
    'default'             => 'Find out More',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_linkhref_two' , array(
    'default'             => '#',
    'transport'           => 'refresh',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'esc_url',
));
$wp_customize->add_setting( 'slider_heading_two' , array(
    'default'             => 'Heading',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_description_two' , array(
    'default'             => 'Description',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
//controls for slode two
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image_two', array(
    'label'               => 'Image Two',
    'section'             => 'slider_control_two',
    'settings'            => 'slider_image_two',
)));
$wp_customize->add_control( 'slider_linkText_two', array(
    'label'               => 'Link Text',
    'section'	            => 'slider_control_two',
    'type'	              => 'text',
));
$wp_customize->add_control( 'slider_linkhref_two', array(
    'label'               => 'Link URL',
    'section'	            => 'slider_control_two',
    'type'                => 'url',
));
$wp_customize->add_control( 'slider_heading_two', array(
    'label'               => 'Heading Slide Two',
    'section'	            => 'slider_control_two',
    'type'                => 'text',
));
$wp_customize->add_control( 'slider_description_two', array(
    'label'               => 'Text Slide two',
    'section'	            => 'slider_control_two',
    'type'                => 'text',
));
//////////////////////////////////////////////////////////////
/*adds section for slide2 3 */
$wp_customize->add_section('slider_control_three', array(
    "title"               => 'Slide three Controls',
    "priority"            => 28,
    "description"         => 'Configure the thirds Slide. Recommended image size 1980*1080.',
    'panel'               => 'slider_panel',
));
//settings for slide 3
$wp_customize->add_setting('slider_image_three', array(
    'default'             => '',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'gateway_sanitize_file'
));
$wp_customize->add_setting( 'slider_linkText_three' , array(
    'default'             => 'Find out More',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_linkhref_three' , array(
    'default'             => '#',
    'transport'           => 'refresh',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'esc_url',
));
$wp_customize->add_setting( 'slider_heading_three' , array(
    'default'             => 'Heading',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses'
));
$wp_customize->add_setting( 'slider_description_three' , array(
    'default'             => 'Description',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses'
));
//Controls for slide 3
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image_three', array(
    'label'               => 'Image Three',
    'section'             => 'slider_control_three',
    'settings'            => 'slider_image_three',
)));
$wp_customize->add_control( 'slider_linkText_three', array(
    'label'               => 'Link Text',
    'section'	            => 'slider_control_three',
    'type'	              => 'text',
));
$wp_customize->add_control( 'slider_linkhref_three', array(
    'label'               => 'Link URL',
    'section'	            => 'slider_control_three',
    'type'                => 'url',
));
$wp_customize->add_control( 'slider_heading_three', array(
    'label'               => 'Heading Slide Three',
    'section'	            => 'slider_control_three',
    'type'                => 'text',
));
$wp_customize->add_control( 'slider_description_three', array(
    'label'               => 'Text Slide three',
    'section'	            => 'slider_control_three',
    'type'                => 'text',
));

//////////////////////////////////////////////////////////////
/*adds section for slide 4 */
$wp_customize->add_section('slider_control_four', array(
    "title"               => 'Slide four Controls',
    "priority"            => 28,
    "description"         => 'Configure the fourth Slide. Recommended image size 1980*1080.',
    'panel'               => 'slider_panel',
));
//settings for slide 4
$wp_customize->add_setting('slider_image_four', array(
    'default'             => '',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'gateway_sanitize_file'
));
$wp_customize->add_setting( 'slider_linkText_four' , array(
    'default'             => 'Find out More',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_linkhref_four' , array(
    'default'             => '#',
    'transport'           => 'refresh',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'esc_url',
));
$wp_customize->add_setting( 'slider_heading_four' , array(
    'default'             => 'Heading',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses'
));
$wp_customize->add_setting( 'slider_description_four' , array(
    'default'             => 'Description',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses'
));
//Controls for slide 4
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image_four', array(
    'label'               => 'Image Four',
    'section'             => 'slider_control_four',
    'settings'            => 'slider_image_four',
)));
$wp_customize->add_control( 'slider_linkText_four', array(
    'label'               => 'Link Text',
    'section'	            => 'slider_control_four',
    'type'	              => 'text',
));
$wp_customize->add_control( 'slider_linkhref_four', array(
    'label'               => 'Link URL',
    'section'	            => 'slider_control_four',
    'type'                => 'url',
));
$wp_customize->add_control( 'slider_heading_four', array(
    'label'               => 'Heading Slide Four',
    'section'	            => 'slider_control_four',
    'type'                => 'text',
));
$wp_customize->add_control( 'slider_description_four', array(
    'label'               => 'Text Slide Four',
    'section'	            => 'slider_control_four',
    'type'                => 'text',
));
//////////////////////////////////////////////////////////////
/*adds section for slide2 4 */
$wp_customize->add_section('slider_control_five', array(
    "title"               => 'Slide five Controls',
    "priority"            => 28,
    "description"         => 'Configure the fourth Slide. Recommended image size 1980*1080.',
    'panel'               => 'slider_panel',
));
//settings for slide 3
$wp_customize->add_setting('slider_image_five', array(
    'default'             => '',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'gateway_sanitize_file'
));
$wp_customize->add_setting( 'slider_linkText_five' , array(
    'default'             => 'Find out More',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses',
));
$wp_customize->add_setting( 'slider_linkhref_five' , array(
    'default'             => '#',
    'transport'           => 'refresh',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'esc_url',
));
$wp_customize->add_setting( 'slider_heading_five' , array(
    'default'             => 'Heading',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses'
));
$wp_customize->add_setting( 'slider_description_five' , array(
    'default'             => 'Description',
    'transport'           => 'refresh',
    'sanitize_callback'   => 'wp_filter_nohtml_kses'
));
//Controls for slide 3
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'slider_image_five', array(
    'label'               => 'Image Five',
    'section'             => 'slider_control_five',
    'settings'            => 'slider_image_five',
)));
$wp_customize->add_control( 'slider_linkText_five', array(
    'label'               => 'Link Text',
    'section'	            => 'slider_control_five',
    'type'	              => 'text',
));
$wp_customize->add_control( 'slider_linkhref_five', array(
    'label'               => 'Link URL',
    'section'	            => 'slider_control_five',
    'type'                => 'url',
));
$wp_customize->add_control( 'slider_heading_five', array(
    'label'               => 'Heading Slide Five',
    'section'	            => 'slider_control_five',
    'type'                => 'text',
));
$wp_customize->add_control( 'slider_description_five', array(
    'label'               => 'Text Slide Five',
    'section'	            => 'slider_control_five',
    'type'                => 'text',
));
/* retrieves the setttings configuired below for each image*/
        $wp_customize->get_setting( 'slider_image_one' )->transport = 'postMessage';
        $wp_customize->get_setting( 'slider_image_two' )->transport = 'postMessage';
        $wp_customize->get_setting( 'slider_image_three' )->transport = 'postMessage';
        $wp_customize->get_setting( 'slider_image_four' )->transport = 'postMessage';
        $wp_customize->get_setting( 'slider_image_five' )->transport = 'postMessage';

  }
//----------------------------------------------------------------//


// function used to customize the header and the background color
  add_action( 'wp_head', 'cd_customizer_css');
  function cd_customizer_css()
  {
      ?>
           <style type="text/css">
                #site-title { color: #<?php echo get_theme_mod('header_textcolor', '#43C6E4'); ?>; }
                body { background: #<?php echo get_theme_mod('background_color', '#43C6E4'); ?>; }
           </style>
      <?php
  }



?>
