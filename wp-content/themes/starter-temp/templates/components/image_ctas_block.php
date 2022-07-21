<?php
$block_id = "";
$block_name = "image_ctas_block";


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="flex-block <?php echo $block_name . " " . $spacing; ?>">
    <div class="container image-ctas">
        <?php if (have_rows('image_ctas')) { ?>
            <?php while (have_rows('image_ctas')) : the_row();
                $img_acf = get_sub_field('image');
                $img_acf_size = 'full';
                $img_acf_src = wp_get_attachment_image_src($img_acf, $img_acf_size);
                $img_acf_srcset = wp_get_attachment_image_srcset($img_acf, $img_acf_size);
                $img_acf_srcset_sizes = wp_get_attachment_image_sizes($img_acf, $img_acf_size);
                $img_acf_alt_text = get_post_meta($img_acf, '_wp_attachment_image_alt', true);
                // $img_acf_meta = wp_get_attachment_metadata($img_acf);
                $img_acf_title = get_the_title($img_acf);
                // $img_acf_caption = get_the_excerpt($img_acf);

                $prepend_text = get_sub_field("prepend_text");
                $title = get_sub_field("title");
                $link = get_sub_field('link');
                if ($link) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }
            ?>

                <div class="cta-item">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <figure>
                            <img src="<?php echo esc_url($img_acf_src[0]); ?>" title="<?php echo esc_attr($img_acf_title); ?>" srcset="<?php echo esc_attr($img_acf_srcset); ?>" sizes="<?php echo esc_attr($img_acf_srcset_sizes); ?>" alt="<?php echo $img_acf_alt_text ?>" />
                        </figure>
                        <div class="content-container">
                            <?php if (!empty($prepend_text)) { ?>
                                <p class="prepend"><?php echo $prepend_text; ?></p>
                            <?php } ?>
                            <?php if (!empty($title)) { ?>
                                <p class="title"><?php echo $title; ?></p>
                            <?php } ?>
                        </div>
                    </a>
                </div>

        <?php endwhile;
        } ?>
    </div>
</div>