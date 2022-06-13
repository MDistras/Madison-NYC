<?php

/*
** Register navigations (comment out below if not needed).
*/
function onewallstreet_custom_new_menu() {
  register_nav_menus(
    array(
      'main-navigation' => __( 'Main Navigation' ),
      'footer-navigation' => __( 'Footer Navigation' ),
      'smaller-navigation' => __( 'Smaller Navigation' ),
     
    )
  );
 

}
add_action( 'init', 'onewallstreet_custom_new_menu' );

/*
** Add BS active class to active nav elements.
*/
function onewallstreet_special_nav_class($classes, $item) {
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active ';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'onewallstreet_special_nav_class', 10, 2);