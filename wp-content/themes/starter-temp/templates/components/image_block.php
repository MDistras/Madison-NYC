<?php
$block_id = "";
$block_name = "image_block";

$img_acf = get_sub_field('image');
$img_acf_size = 'full';
$img_acf_src = wp_get_attachment_image_src($img_acf, $img_acf_size);
$img_acf_srcset = wp_get_attachment_image_srcset($img_acf, $img_acf_size);
$img_acf_srcset_sizes = wp_get_attachment_image_sizes($img_acf, $img_acf_size);
$img_acf_alt_text = get_post_meta($img_acf, '_wp_attachment_image_alt', true);
// $img_acf_meta = wp_get_attachment_metadata($img_acf);
$img_acf_title = get_the_title($img_acf);
// $img_acf_caption = get_the_excerpt($img_acf);

$width = get_sub_field('width');
$image_sizing = get_sub_field('image_sizing');


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<?php if (!empty($img_acf)) { ?>
    <div class="<?php echo $block_name . " " . $spacing; ?>">
        <?php if ($width == "contained") {
            echo "<div class='container'>";
        } ?>

        <picture class="<?php echo $image_sizing; ?>">
            <img src="<?php echo esc_url($img_acf_src[0]); ?>" title="<?php echo esc_attr($img_acf_title); ?>" srcset="<?php echo esc_attr($img_acf_srcset); ?>" sizes="<?php echo esc_attr($img_acf_srcset_sizes); ?>" alt="<?php echo $img_acf_alt_text ?>" />
        </picture>

        <?php if ($width == "contained") {
            echo "</div>";
        } ?>
    </div>
<?php } ?>