<?php /* Template Name: Contact us*/
get_header();
global $post;

$title = get_field("title");
$contact_image = get_field("contact_image");
?>

<div class="contact-us">
	<div class="container">
		<div class="title-container">
			<?php if (!empty($title)) { ?>
				<p class="title text-header-xl"><?php echo $title; ?></p>
			<?php } ?>
		</div>
		<div class="details-container">
			<?php if (have_rows('contact_details')) {
				while (have_rows('contact_details')) : the_row();
					$title = get_sub_field("title");
					$content = get_sub_field("content");
			?>

					<div class="item">
						<?php if (!empty($title)) { ?>
							<p class="title text-header-xl"><?php echo $title; ?></p>
						<?php } ?>
						<?php if (!empty($content)) { ?>
							<p class="text-body"><?php echo $content; ?></p>
						<?php } ?>
					</div>

			<?php endwhile;
			} ?>
		</div>
		<?php if (!empty($contact_image)) { ?>
			<div class="contact-image">
				<figure>
					<img src="<?php echo $contact_image['url']; ?>" alt="<?php echo $contact_image['alt']; ?>" />
				</figure>
			</div>
		<?php } ?>
	</div>
</div>

<?php get_footer(); ?>