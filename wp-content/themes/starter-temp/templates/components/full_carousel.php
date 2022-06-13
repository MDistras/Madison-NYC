<?php

/**
 * Slider Full Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$data_num = rand(1, 1990);

$full = get_sub_field('full_width');

if($full == 'yes'){
    $class = 'container-fluid no-pad';
}else{
    $class = 'container';
}


?>
<div  class="<?php echo $class; ?> section">
	<div class="row flex-center">
        <div class="col-12 full_carousel" id="carousel-<?php echo $data_num; ?>">
            <?php if(have_rows('full_carousel')):?>
                <?php while(have_rows('full_carousel')): the_row(); 
                    $img = get_sub_field('image'); ?>
                       
                            <div>
                                <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                                <div class="caption"><?php echo get_sub_field('caption'); ?></div>
                            </div>
                            
                            
                 
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
	</div>
</div>