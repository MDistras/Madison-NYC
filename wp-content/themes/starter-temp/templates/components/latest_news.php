<?php 
   // the query
   $the_query = new WP_Query( array(
      'post_type' => 'post',
      'posts_per_page' => 3,
   )); 
?>
<div  class="container no-pad section">
	<div class="row flex-center">
        <div class="col-12 col-sm-5 text-center">
            <h3><?php echo get_sub_field('title'); ?></h3>
            <?php if(get_sub_field('text')): ?>
                <p><?php echo get_sub_field('text'); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="row section">
            <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-12 col-sm-4">
                        <a href="<?php echo get_the_permalink(); ?>">
                             <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()), 'thumbnail' ); ?>">
                        </a>
                        <div class="font-upper-text p-top-20">
                                <?php echo get_the_title(); ?>
                            </div>
                            <p><?php echo get_the_excerpt(); ?></p>
                    </div>

   

                <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

            <?php else : ?>
                    <p><?php __('No News'); ?></p>
            <?php endif; ?>
     
    </div>
</div>