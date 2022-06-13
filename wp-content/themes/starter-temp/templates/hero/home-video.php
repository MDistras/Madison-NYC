<?php

/**
 * Hero Video Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$image = get_field('image');
$main_text = get_field('main_text');
$mini_text = get_field('mini_text');

?>
<div class="hero-holding container-fluid">
    <video autoplay loop muted playsinline id="videoHero">
      <source src="<?php echo site_url(); ?>/wp-content/themes/kensington/img/heros/place.mp4" type="video/mp4">
    </video>
    <div class="border-gradient"></div>
	<div class="row" >
      <div class="col-sm-12 no-pad text-center">
                <div class="h1-wrapper" data-aos="fade-in">
                     <h1><?php echo $main_text; ?></h1>
                     <span><?php echo $mini_text; ?></span>
                </div>

                
            </div>
            <div class="button">
                <div class="open-gallery btn btn-white" id="1" >Watch the Video</div>
            </div>
            <a href="#next"><div class="arrow-down"></div></a>
    </div>
</div>

                        <div class="modal darken" id="modal-gallery-1">
                                <div class="close"><img src="<?php echo site_url(); ?>/wp-content/themes/kensington/img/icons/close.svg"></div>
                                <div class="modal-bg">
                                    
                                    <div class="modal-inner video">
                                        <?php echo get_field('video'); ?>
                                    </div>
                                </div>
                         </div>


<div id="next"></div>