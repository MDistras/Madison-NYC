<?php /* Template Name: Default */ 
get_header(); 
global $post;
?>

<?php get_template_part('templates/general/navigation','top'); ?>
<?php  if( have_rows('all_components') ):  ?>
	<?php while ( have_rows('all_components') ) : the_row(); ?>
		<?php get_template_part('modules/' . get_row_layout()); ?>				 
	<?php endwhile; ?>
<?php endif; ?>
<?php get_template_part('templates/general/footer','main'); ?>
<?php get_footer(); ?>
