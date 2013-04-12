<?php

include dirname(__file__) . '/inc/functions/child_hooks.php';
include dirname(__file__) . '/inc/functions/custom_post_types.php';

//////////// SCRIPTS /////////////

// Call the google CDN version of jQuery for the frontend
// Make sure you use this with wp_enqueue_script('jquery'); in your header

function otis_scripts() {
  wp_register_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), 'version', true );
  wp_register_script( 'custom-scripts', get_stylesheet_directory_uri() . '/inc/js/script.js', array( 'jquery' ), 'version', true );

  wp_enqueue_script( 'easing' );
  wp_enqueue_script( 'custom-scripts' );

}

add_action( 'wp_enqueue_scripts', 'otis_scripts' );


//////////// NAVIGATIONS /////////////

if (function_exists('register_nav_menu')) {
  register_nav_menu('primary', __('Primary Menu'));
  register_nav_menu('footer', __('Footer Menu'));
}

//////////// WYSIWYG /////////////

// Adding a styles dropdown to the Wordpress editor

function themeit_mce_buttons_2( $buttons ) {
  array_unshift( $buttons, 'styleselect' );
  return $buttons;
}
add_filter( 'mce_buttons_2', 'themeit_mce_buttons_2' );
function themeit_tiny_mce_before_init( $settings ) {
  $settings['theme_advanced_blockformats'] = 'p,a,div,address,span,h1,h2,h3,h4,h5,h6,tr,';
  $style_formats = array(
      array( 'title' => 'Button', 'inline' => 'span',  'classes' => 'custom-button' ),
  );
  $settings['style_formats'] = json_encode( $style_formats );
  return $settings;
}
add_filter( 'tiny_mce_before_init', 'themeit_tiny_mce_before_init' );

/////////////////////////////////////////////////////////

// For Responsive Images in Wordpress (that aren't background images), reomove width and height.
/**
 * This is a modification of image_downsize() function in wp-includes/media.php
 * we will remove all the width and height references, therefore the img tag
 * will not add width and height attributes to the image sent to the editor.
 *
 * @param bool false No height and width references.
 * @param int $id Attachment ID for image.
 * @param array|string $size Optional, default is 'medium'. Size of image, either array or string.
 * @return bool|array False on failure, array on success.
 */

//////////// REMOVE ADMIN MENU ITEMS /////////////
function remove_menus () {
global $menu;
  $restricted = array(__('Links'), __('Comments'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
  }
}
add_action('admin_menu', 'remove_menus');

// Stop images getting wrapped up in p tags when they get dumped out with the_content() for easier theme styling
function wpfme_remove_img_ptags($content){
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'wpfme_remove_img_ptags');

?>