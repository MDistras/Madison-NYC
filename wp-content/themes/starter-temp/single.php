<?php /* Template Name: Normal Pages with Title */
get_header(); 
global $post;
?>

<?php get_template_part('templates/general/navigation','top-black'); ?>
<?php get_template_part('templates/general/page','top'); ?>
<div class="container section">
	<div class="row" >
        <div class="col-sm-12 no-pad normal-content">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php  if( have_rows('all_components') ):  ?>
	<?php while ( have_rows('all_components') ) : the_row(); ?>
		<?php get_template_part('templates/components/' . get_row_layout()); ?>				 
	<?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('templates/general/footer','main'); ?>
<?php get_footer(); ?>
