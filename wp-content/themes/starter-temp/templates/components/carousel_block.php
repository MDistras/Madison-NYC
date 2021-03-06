<?php
$block_id = "";
$block_name = "carousel_block";

$style = "style-" . get_sub_field('style');

// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="flex-block <?php echo $block_name . " " . $spacing . " " . $style; ?>">
    <div class="container">
        <?php if (have_rows('carousel')) { ?>
            <?php while (have_rows('carousel')) : the_row();
                $img_acf = get_sub_field('image');
                $img_acf_size = 'full';
                $img_acf_src = wp_get_attachment_image_src($img_acf, $img_acf_size);
                $img_acf_srcset = wp_get_attachment_image_srcset($img_acf, $img_acf_size);
                $img_acf_srcset_sizes = wp_get_attachment_image_sizes($img_acf, $img_acf_size);
                $img_acf_alt_text = get_post_meta($img_acf, '_wp_attachment_image_alt', true);
                // $img_acf_meta = wp_get_attachment_metadata($img_acf);
                $img_acf_title = get_the_title($img_acf);
                $img_acf_caption = get_sub_field('caption');
            ?>
                <div class="slide">

                    <figure>
                        <img src="<?php echo esc_url($img_acf_src[0]); ?>" title="<?php echo esc_attr($img_acf_title); ?>" srcset="<?php echo esc_attr($img_acf_srcset); ?>" sizes="<?php echo esc_attr($img_acf_srcset_sizes); ?>" alt="<?php echo $img_acf_alt_text ?>" />

                        <?php if (!empty($img_acf_caption)) { ?>
                            <figcaption class="text-body"><?php echo $img_acf_caption; ?></figcaption>
                        <?php } ?>
                    </figure>
                </div>

            <?php endwhile; ?>
        <?php } ?>


    </div>
</div>