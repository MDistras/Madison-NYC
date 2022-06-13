<?php

// Nav walker for Bootstrap friendly navs.
//require 'inc/walker.php';


/*
** Hide the admin bar.
*/
show_admin_bar(false);

require 'classes/class.admin.php'; // includes post types & taxonomies
require 'classes/functions/acf-blocks.php';
require 'classes/functions/navigation.php';
require 'classes/functions/login.php';


// Run the Set up
$run = new WordsearchAdmin();
$run->run();

/**********************************************
** Clean-ups
**********************************************/

/*
** Remove wp-embed.js
*/
function my_deregister_scripts() {
  wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');

/*
** Removing window._wpemojiSettings from header.
*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/*
** Disable Gutenberg.
*/
add_filter('use_block_editor_for_post', '__return_false', 10);

// Let WordPress manage the document title.
add_theme_support('title-tag');
add_theme_support( 'post-thumbnails', array( 'post' ) );          // Posts only
add_theme_support( 'post-thumbnails', array( 'page' ) );

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
  if ( $wp_version !== '4.7.1' ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );

function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

add_filter( 'big_image_size_threshold', '__return_false' );

// ACF FIX OBJECT CACHING

add_filter( 'acf/save_post', 'acf_clear_object_cache' );

  /**
   * Intended to clear a post's cache
   */
function acf_clear_object_cache( $post_id ) {
    if ( empty( $_POST['acf'] ) ) {
      return;
    }
    
    // clear post related cache
    clean_post_cache( $post_id );
    
    // clear ACF cache
    if ( is_array( $_POST['acf'] ) ) {
      foreach ( $_POST['acf'] as $field_name => $value ) {
        $cache_slug = "load_value/post_id={$post_id}/name={$field_name}";
        wp_cache_delete( $cache_slug, 'acf' );
      }
    }
}

add_action(
    'after_setup_theme',
    function() {
        add_theme_support( 'html5', [ 'script', 'style' ] );
    }
);





