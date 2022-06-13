<?php

/**
 * Gallery.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */



$full = get_sub_field('full_width');
$col  = get_sub_field('columns'); 

if($full == 'yes'){
    $class = 'container-fluid no-pad';
}else{
    $class = 'container';
}


?>
<div  class="<?php echo $class; ?> ">
    <div class="row flex-center section">
        <div class="col-12 col-sm-5 text-center">
            <h3><?php echo get_sub_field('title'); ?></h3>
            <?php if(get_sub_field('text')): ?>
                <p><?php echo get_sub_field('text'); ?></p>
            <?php endif; ?>
        </div>
    </div>
	<div class="row gallery section">
        
            <?php if(have_rows('gallery')):?>
                <?php while(have_rows('gallery')): the_row(); 
                
                    $img = get_sub_field('image'); ?>
                    <div class="col-12 col-sm-<?php echo $col; ?>">
                        <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                    </div>
                           
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
	</div>
</div>