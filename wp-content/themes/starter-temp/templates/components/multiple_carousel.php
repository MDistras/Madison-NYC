<?php
$data_num = rand(1, 1990);
?>
<div  class="container no-pad">
	<div class="row flex-center section">
        <div class="col-12  no-pad-x multiple_carousel" id="carousel-<?php echo $data_num; ?>">
            <?php if(have_rows('carousel')):?>
                <?php while(have_rows('carousel')): the_row(); 
                    $img = get_sub_field('icon'); ?>
                        <div class="col-12  col-sm-4">
                            
                            <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                            <?php if(get_sub_field('title')): ?>
                            <div class="font-upper-text p-top-20">
                                <?php echo get_sub_field('title'); ?>
                            </div>
                            <p><?php echo get_sub_field('text'); ?></p>
                            <?php endif; ?>
                            
                        </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        
	</div>
</div>