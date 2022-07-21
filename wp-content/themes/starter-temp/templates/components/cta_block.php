<?php
$block_id = "";
$block_name = "cta_block";
$style = "style-" . get_sub_field('style');
$title = get_sub_field('title');


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="flex-block <?php echo $block_name . " " . $spacing . " " . $style; ?>">
    <div class="container">
        <?php if (!empty($title)) { ?>
            <p class="title text-header-xl text-center"><?php echo $title; ?></p>
        <?php } ?>
        <?php if (have_rows('ctas')) { ?>
            <div class="cta-container">

                <?php while (have_rows('ctas')) : the_row();
                    $cta = get_sub_field('cta');
                    if ($cta) {
                        $cta_url = $cta['url'];
                        $cta_title = $cta['title'];
                        $cta_target = $cta['target'] ? $cta['target'] : '_self';
                    }
                ?>
                    <a class="cta" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_title); ?></a>
                <?php endwhile; ?>

            </div>
        <?php
        } ?>
    </div>
</div>