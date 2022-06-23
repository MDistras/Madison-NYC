<?php
$block_id = "";
$block_name = "cta_block";
$cta = get_sub_field('cta');
if ($cta) {
    $cta_url = $cta['url'];
    $cta_title = $cta['title'];
    $cta_target = $cta['target'] ? $cta['target'] : '_self';
}


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="<?php echo $block_name . " " . $spacing; ?>">
    <div class="container">
        <?php if ($cta) { ?>
            <div class="cta-container">
                <a class="cta cta-white" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_title); ?></a>
            </div>
        <?php } ?>
    </div>
</div>