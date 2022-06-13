<?php

if( function_exists('acf_add_options_page') ) {
   acf_add_options_page();    
}

add_action('acf/init', 'kcs_init_block_types');
function kcs_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        acf_register_block_type(array(
            'name'              => 'gradient-change',
            'title'             => __('Gradient Change'),
            'description'       => __('Gradient Change.'),
            'render_template'   => 'templates/layout-blocks/gradient-change.php',
            'enqueue_assets'    => 'gradient-change-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Gradient Change'),
        ));
        acf_register_block_type(array(
            'name'              => 'white-block',
            'title'             => __('White Block Text'),
            'description'       => __('White Block Text.'),
            'render_template'   => 'templates/layout-blocks/white-block-text.php',
            'enqueue_assets'    => 'white-block-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'white block'),
        ));
     
        acf_register_block_type(array(
            'name'              => 'register-interest',
            'title'             => __('Register Interest'),
            'description'       => __('Register Interest.'),
            'render_template'   => 'templates/layout-blocks/register-interest.php',
            'enqueue_assets'    => 'register-interest-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'register interest'),
        ));
        acf_register_block_type(array(
            'name'              => 'hero-video',
            'title'             => __('Hero Video'),
            'description'       => __('Hero Video'),
            'render_template'   => 'templates/hero/home-video.php',
            'enqueue_assets'    => 'hero-video-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hero video'),
        ));
        acf_register_block_type(array(
            'name'              => 'map-block',
            'title'             => __('Map'),
            'description'       => __('Map.'),
            'render_template'   => 'templates/layout-blocks/map.php',
            'enqueue_assets'    => 'map-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'map'),
        ));
         acf_register_block_type(array(
            'name'              => 'lightbox-images',
            'title'             => __('Lightbox Images'),
            'description'       => __('Lightbox Images.'),
            'render_template'   => 'templates/layout-blocks/half-lightbox.php',
            'enqueue_assets'    => 'lightbox-images-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Lightbox Images'),
        ));
         acf_register_block_type(array(
            'name'              => 'team-contact',
            'title'             => __('Team Contact'),
            'description'       => __('Team Contact.'),
            'render_template'   => 'templates/layout-blocks/half-contact.php',
            'enqueue_assets'    => 'team-contact-text_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Team Contact'),
        ));
        acf_register_block_type(array(
            'name'              => 'half-availability',
            'title'             => __('Properties Availability'),
            'description'       => __('Properties Availability'),
            'render_template'   => 'templates/layout-blocks/half-availability.php',
            'enqueue_assets'    => ' half-availability_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'properties availability'),
        ));
        acf_register_block_type(array(
            'name'              => 'half-gradient',
            'title'             => __('Half text with label'),
            'description'       => __('Half text with label.'),
            'render_template'   => 'templates/layout-blocks/half-label.php',
            'enqueue_assets'    => 'half-gradient_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Half Gradient'),
        ));
        acf_register_block_type(array(
            'name'              => 'half-tabs',
            'title'             => __('Half image with tabs'),
            'description'       => __('Half image with tabs.'),
            'render_template'   => 'templates/layout-blocks/half-tabs.php',
            'enqueue_assets'    => 'half-tabs_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Half Tabs'),
        ));
        acf_register_block_type(array(
            'name'              => 'transport-links',
            'title'             => __('Transport Links'),
            'description'       => __('Transport Links.'),
            'render_template'   => 'templates/layout-blocks/transport-links.php',
            'enqueue_assets'    => 'transport-links_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Transport links'),
        ));
        acf_register_block_type(array(
            'name'              => 'half-white',
            'title'             => __('Half  Text mini'),
            'description'       => __('Half  Text mini.'),
            'render_template'   => 'templates/layout-blocks/half-white.php',
            'enqueue_assets'    => 'half-white_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Half Text White'),
        ));

        acf_register_block_type(array(
            'name'              => 'half-white-full-width',
            'title'             => __('Half text Full Width'),
            'description'       => __('Half text Full Width.'),
            'render_template'   => 'templates/layout-blocks/half-white-full-width.php',
            'enqueue_assets'    => 'half-white-full-width_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Half Text Full Width'),
        ));
        acf_register_block_type(array(
            'name'              => 'half-panel',
            'title'             => __('Half Panel Text'),
            'description'       => __('Half Panel Text.'),
            'render_template'   => 'templates/layout-blocks/half-panels.php',
            'enqueue_assets'    => 'half-panel_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Half Panel'),
        ));
        acf_register_block_type(array(
            'name'              => 'full-image',
            'title'             => __('Full Image'),
            'description'       => __('Full Image.'),
            'render_template'   => 'templates/layout-blocks/full-image.php',
            'enqueue_assets'    => 'full-image_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Full Image'),
        ));
        acf_register_block_type(array(
            'name'              => 'slide-items',
            'title'             => __('Slide Items'),
            'description'       => __('Slide Items.'),
            'render_template'   => 'templates/layout-blocks/slides.php',
            'enqueue_assets'    => 'slides_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Slide Items'),
        ));
        acf_register_block_type(array(
            'name'              => 'slide-items-full',
            'title'             => __('Full Slider Items'),
            'description'       => __('Full Slider Items.'),
            'render_template'   => 'templates/layout-blocks/full-slides.php',
            'enqueue_assets'    => 'slides_full_block_enqueue_assets',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'Full Slider Items'),
        ));
        

        
    }
}

?>