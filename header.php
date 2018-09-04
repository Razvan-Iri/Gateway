<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until #main div
 *
 * @link https://iamrazvan.com/
 *
 * @package WordPress
 * @subpackage Gateway
 * @since 1.0
 * @version 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(  ); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <!-- Function that displays the stie title if the title if the active page is category page, tag page, for the front page it displays the Description fo the site, for a standard page it displays the page title, custom search title, for a post page it displays the tags, and the post title, custom 404 title + the site title-->
    <title>
      <?php
  if (is_category()) {
	echo 'Category: '; wp_title(''); echo ' |';

} elseif (function_exists('is_tag') && is_tag()) {
	single_tag_title('Tag Archive for &quot;'); echo '&quot; | ';

} elseif (is_archive()) {
	wp_title(''); echo ' | ';

}elseif (is_front_page()) {
  bloginfo('description');  echo ' | ';
}
elseif (is_page()) {
	 wp_title('');echo ' | ';

} elseif (is_search()) {
	echo 'Search for &quot;'.wp_specialchars($s).'&quot; | ';

}elseif (is_single()) {
 echo  single_post_title('', true); echo ' | ';

} elseif (!(is_404()) || (is_page())) {
	wp_title(''); echo ' | ';
} elseif (is_404()) {
	echo 'Not Found | ';

}
bloginfo('name');
?>
</title>

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Loads the default js script in the head -->
    <?php wp_head(); ?>
  </head>

<!-- BODY SECTION -->
<body <?php body_class( );?>>
<!-- inserts the slider header -->
  <div class="wraopper">
    <?php
      if ( is_front_page() ) {
          get_template_part( 'slider', 'header' );
         }
    ?>
  </div>

          <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'depth'          => 2,
                'menu_class'     => 'menu',
                'walker'         => new Bootstrap_NavWalker(),
                'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
            ) );
          ?>




<div id="body-content" class="container-fluid">
