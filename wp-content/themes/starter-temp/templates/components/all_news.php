<?php 
   $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
   $the_query = new WP_Query( array(
      'post_type' => 'post',
      'posts_per_page' => 2,
      'paged' => $paged
   )); 
?>
<div  class="container no-pad section">
	
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
    <div class="col-12 section">
    <div class="pagination">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $the_query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Newer Posts', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Older Posts', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
</div>
    </div>
</div>