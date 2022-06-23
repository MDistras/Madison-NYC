<?php /* Template Name: All Modules / Default Page */
get_header();
global $post;
?>

<?php if (have_rows('all_components')) :  ?>
	<?php while (have_rows('all_components')) : the_row(); ?>
		<?php get_template_part('templates/components/' . get_row_layout()); ?>				 
	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>
