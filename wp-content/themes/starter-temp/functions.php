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
function my_deregister_scripts()
{
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
add_theme_support('post-thumbnails', array('post'));          // Posts only
add_theme_support('post-thumbnails', array('page'));

// Allow SVG
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {

  global $wp_version;
  if ($wp_version !== '4.7.1') {
    return $data;
  }

  $filetype = wp_check_filetype($filename, $mimes);

  return [
    'ext'             => $filetype['ext'],
    'type'            => $filetype['type'],
    'proper_filename' => $data['proper_filename']
  ];
}, 10, 4);

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action('admin_head', 'fix_svg');

function add_file_types_to_uploads($file_types)
{
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

add_filter('big_image_size_threshold', '__return_false');

// ACF FIX OBJECT CACHING

add_filter('acf/save_post', 'acf_clear_object_cache');

/**
 * Intended to clear a post's cache
 */
function acf_clear_object_cache($post_id)
{
  if (empty($_POST['acf'])) {
    return;
  }

  // clear post related cache
  clean_post_cache($post_id);

  // clear ACF cache
  if (is_array($_POST['acf'])) {
    foreach ($_POST['acf'] as $field_name => $value) {
      $cache_slug = "load_value/post_id={$post_id}/name={$field_name}";
      wp_cache_delete($cache_slug, 'acf');
    }
  }
}

add_action(
  'after_setup_theme',
  function () {
    add_theme_support('html5', ['script', 'style']);
  }
);




// MD
//

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(array(
    'page_title'   => 'Theme Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}


// Clean menu output
function clean_custom_menus()
{
  $menu_name = 'main-nav'; // specify custom menu slug
  if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
    $menu = wp_get_nav_menu_object($locations[$menu_name]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    //$menu_list = '<nav>' ."\n";
    $menu_list .= "\t\t\t\t" . '<ul class="mainmenu">' . "\n";
    foreach ((array) $menu_items as $key => $menu_item) {
      $title = $menu_item->title;
      $url = $menu_item->url;
      $menu_list .= "\t\t\t\t\t" . '<li><a href="' . $url . '">' . $title . '</a></li>' . "\n";
    }
    $menu_list .= "\t\t\t\t" . '</ul>' . "\n";
    //$menu_list .= "\t\t\t". '</nav>' ."\n";
  } else {
    // $menu_list = '<!-- no list defined -->';
  }
  echo $menu_list;
}


// Deletes all CSS classes and ids, except for those listed in the array below
function custom_wp_nav_menu($var)
{
  //List of allowed menu classes
  return is_array($var) ? array_intersect($var, array('first', 'last', 'current_page_item', 'current_page_parent', 'current_page_ancestor', 'current-menu-ancestor', 'active', 'hide-on-mobile')) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');



// Replaces current-menu-item (and similar classes) with active
function current_to_active($text)
{
  $replace = array('current_page_item' => 'active', 'current_page_parent' => 'active', 'current_page_ancestor' => 'active', 'current-menu-ancestor' => 'active');
  $text = str_replace(array_keys($replace), $replace, $text);
  return $text;
}
add_filter('wp_nav_menu', 'current_to_active');



// Deletes empty classes and removes the sub menu class
function strip_empty_classes($menu)
{
  $menu = preg_replace('/ class=""| class="sub-menu"/', '', $menu);
  return $menu;
}
add_filter('wp_nav_menu', 'strip_empty_classes');
