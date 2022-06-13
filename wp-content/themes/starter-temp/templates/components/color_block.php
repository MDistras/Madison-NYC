<?php

/**
 * Hero Padding Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$color     = get_sub_field('color');
$main_text = get_sub_field('title');
$mini_text = get_sub_field('text');

?>
<div class="color-block container-fluid section" style="background:<?php echo $color; ?>;">
	<div class="row" >
      <div class="col-sm-12 no-pad ">
       
                <div class="h1-wrapper" data-aos="fade-in">
                     <h3><?php echo $main_text; ?></h3>
                     <p><?php echo $mini_text; ?></p>
                </div>
   

                
            </div>
            <a href="#next"><div class="arrow-down"></div></a>
    </div>
</div>


<div id="next"></div>