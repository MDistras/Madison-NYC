<?php
$block_id = "";
$block_name = "text_block";
$style  = "style-" . get_sub_field('style');
$content  = get_sub_field('content');

// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<?php if ($content) { ?>
    <div class="flex-block <?php echo $block_name . " " . $spacing . " " . $style; ?>">
        <p class="body-copy">
            <?php echo $content; ?>
        </p>
    </div>
<?php } ?>