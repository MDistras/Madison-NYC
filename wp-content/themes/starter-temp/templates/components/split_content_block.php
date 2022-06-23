<?php
$block_id = "";
$block_name = "split_content";
$subtitle = get_sub_field('subtitle');
$subtitle_line_1 = $subtitle['line_1'];
$subtitle_line_2 = $subtitle['line_2'];
$content  = get_sub_field('content');

// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="<?php echo $block_name . " " . $spacing; ?>">
    <div class="container">
        <div class="subtitle-container">
            <?php if (!empty($subtitle_line_1)) { ?>
                <p class="subtitle subtitle_one"><?php echo $subtitle_line_1; ?></p>
            <?php } ?>
            <?php if (!empty($subtitle_line_2)) { ?>
                <p class="subtitle subtitle_two"><?php echo $subtitle_line_2; ?></p>
            <?php } ?>
        </div>
        <div class="content">
            <?php if (!empty($content)) { ?>
                <p class="body-copy"><?php echo $content; ?></p>
            <?php } ?>
        </div>
    </div>
</div>