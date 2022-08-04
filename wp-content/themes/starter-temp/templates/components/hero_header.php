<?php
$block_id = "";
$block_name = "hero_header_block";

$img_acf = get_sub_field('hero_image');
$img_acf_size = 'full';
$img_acf_src = wp_get_attachment_image_src($img_acf, $img_acf_size);
$img_acf_srcset = wp_get_attachment_image_srcset($img_acf, $img_acf_size);
$img_acf_srcset_sizes = wp_get_attachment_image_sizes($img_acf, $img_acf_size);
$img_acf_alt_text = get_post_meta($img_acf, '_wp_attachment_image_alt', true);
// $img_acf_meta = wp_get_attachment_metadata($img_acf);
$img_acf_title = get_the_title($img_acf);
// $img_acf_caption = get_the_excerpt($img_acf);

$mob_img_acf = get_sub_field('hero_image_mobile');
$mob_img_acf_size = 'full';
$mob_img_acf_src = wp_get_attachment_image_src($mob_img_acf, $mob_img_acf_size);
$mob_img_acf_srcset = wp_get_attachment_image_srcset($mob_img_acf, $mob_img_acf_size);
$mob_img_acf_srcset_sizes = wp_get_attachment_image_sizes($mob_img_acf, $mob_img_acf_size);
$mob_img_acf_alt_text = get_post_meta($mob_img_acf, '_wp_attachment_image_alt', true);
// $img_acf_meta = wp_get_attachment_metadata($img_acf);
$mob_img_acf_title = get_the_title($mob_img_acf);
// $img_acf_caption = get_the_excerpt($img_acf);

$hero_overlay = get_sub_field('hero_overlay');
if ($hero_overlay) {
    $hero_class = "hero-overlay";
} else {
    $hero_class = "";
}

$prepend_text = get_sub_field('prepend_text');
$title = get_sub_field('title');
$content_image = get_sub_field('content_image');
$append_text = get_sub_field('append_text');


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<?php if (!empty($img_acf) || !empty($mob_img_acf)) { ?>
    <div class="<?php echo $block_name . " " . $spacing; ?>">

        <?php if (!empty($mob_img_acf)) { ?>
            <picture class="<?php echo $hero_class; ?> desktop">
                <img src="<?php echo esc_url($img_acf_src[0]); ?>" title="<?php echo esc_attr($img_acf_title); ?>" srcset="<?php echo esc_attr($img_acf_srcset); ?>" sizes="<?php echo esc_attr($img_acf_srcset_sizes); ?>" alt="<?php echo $img_acf_alt_text ?>" />
            </picture>
            <picture class="<?php echo $hero_class; ?> mobile">
                <img src="<?php echo esc_url($mob_img_acf_src[0]); ?>" title="<?php echo esc_attr($mob_img_acf_title); ?>" srcset="<?php echo esc_attr($mob_img_acf_srcset); ?>" sizes="<?php echo esc_attr($mob_img_acf_srcset_sizes); ?>" alt="<?php echo $mob_img_acf_alt_text ?>" />
            </picture>
        <?php } else { ?>
            <picture class="<?php echo $hero_class; ?>">
                <img src="<?php echo esc_url($img_acf_src[0]); ?>" title="<?php echo esc_attr($img_acf_title); ?>" srcset="<?php echo esc_attr($img_acf_srcset); ?>" sizes="<?php echo esc_attr($img_acf_srcset_sizes); ?>" alt="<?php echo $img_acf_alt_text ?>" />
            </picture>
        <?php } ?>


        <div class="content">
            <?php if (!empty($prepend_text)) {
                echo "<p class='prepend'>" . $prepend_text . "</p>";
            } ?>

            <?php if (!empty($title)) {
                echo "<p class='title'>" . $title . "</p>";
            } ?>

            <?php if (!empty($content_image)) {
                echo "<figure class='hero_logo'><img src='" . $content_image['url'] . "' /></figure>";
            } ?>

            <?php if (!empty($append_text)) {
                echo "<p class='append'>" . $append_text . "</p>";
            } ?>
        </div>
    </div>
<?php } ?>