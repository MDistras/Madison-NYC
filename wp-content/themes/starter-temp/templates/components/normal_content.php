<?php
/**
 * Normal Content Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$content = get_sub_field('content');

?>
<div class="container section">
	<div class="row" >
        <div class="col-sm-12 no-pad normal-content">
            <?php echo $content; ?>
        </div>
    </div>
</div>
