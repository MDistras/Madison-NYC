<?php
$block_id = "";
$block_name = "image_text_splitter_block";

$style = "style-" . get_sub_field('style');
$text_alignment = "text-alignment-" . get_sub_field('text_alignment');

$subtitle = get_sub_field('subtitle');
$subtitle_line_1 = $subtitle['line_1'];
$subtitle_line_2 = $subtitle['line_2'];

$content = get_sub_field('content');

// Primary Image
$primary_img_acf = get_sub_field('primary_image');
$primary_img_acf_size = 'full';
$primary_img_acf_src = wp_get_attachment_image_src($primary_img_acf, $primary_img_acf_size);
$primary_img_acf_srcset = wp_get_attachment_image_srcset($primary_img_acf, $primary_img_acf_size);
$primary_img_acf_srcset_sizes = wp_get_attachment_image_sizes($primary_img_acf, $primary_img_acf_size);
$primary_img_acf_alt_text = get_post_meta($primary_img_acf, '_wp_attachment_image_alt', true);
// $img_acf_meta = wp_get_attachment_metadata($img_acf);
$primary_img_acf_title = get_the_title($primary_img_acf);
// $img_acf_caption = get_the_excerpt($img_acf);

// Secondary Image
$secondary_img_acf = get_sub_field('secondary_image');
$secondary_img_acf_size = 'full';
$secondary_img_acf_src = wp_get_attachment_image_src($secondary_img_acf, $secondary_img_acf_size);
$secondary_img_acf_srcset = wp_get_attachment_image_srcset($secondary_img_acf, $secondary_img_acf_size);
$secondary_img_acf_srcset_sizes = wp_get_attachment_image_sizes($secondary_img_acf, $secondary_img_acf_size);
$secondary_img_acf_alt_text = get_post_meta($secondary_img_acf, '_wp_attachment_image_alt', true);
// $img_acf_meta = wp_get_attachment_metadata($img_acf);
$secondary_img_acf_title = get_the_title($secondary_img_acf);
// $img_acf_caption = get_the_excerpt($img_acf);
if (get_sub_field('offset_secondary_image')) {
    $offset_secondary_image = "offset";
} else {
    $offset_secondary_image = "";
}



// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="<?php echo $block_name . " " . $spacing . " " . $style . " " . $text_alignment; ?>">
    <div class='container'>

        <div class="content-container">
            <div class="subtitle-container">
                <?php if (!empty($subtitle_line_1)) { ?>
                    <p class="subtitle subtitle_one"><?php echo $subtitle_line_1; ?></p>
                <?php } ?>
                <?php if (!empty($subtitle_line_2)) { ?>
                    <p class="subtitle subtitle_two"><?php echo $subtitle_line_2; ?></p>
                <?php } ?>
            </div>
            <?php if (!empty($content)) { ?>
                <p class="text-body"><?php echo $content; ?></p>
            <?php } ?>
        </div>


        <picture class="primary-image">
            <img src="<?php echo esc_url($primary_img_acf_src[0]); ?>" title="<?php echo esc_attr($primary_img_acf_title); ?>" srcset="<?php echo esc_attr($primary_img_acf_srcset); ?>" sizes="<?php echo esc_attr($primary_img_acf_srcset_sizes); ?>" alt="<?php echo $primary_img_acf_alt_text ?>" />
        </picture>

        <picture class="secondary-image <?php echo $offset_secondary_image; ?>">
            <img src="<?php echo esc_url($secondary_img_acf_src[0]); ?>" title="<?php echo esc_attr($secondary_img_acf_title); ?>" srcset="<?php echo esc_attr($secondary_img_acf_srcset); ?>" sizes="<?php echo esc_attr($secondary_img_acf_srcset_sizes); ?>" alt="<?php echo $secondary_img_acf_alt_text ?>" />
        </picture>

    </div>
</div>