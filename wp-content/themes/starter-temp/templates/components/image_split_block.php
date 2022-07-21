<?php
$block_id = "";
$block_name = "image_split_block";
$style  = "style-" . get_sub_field('style');
$image_one  = get_sub_field('image_one');
$image_two  = get_sub_field('image_two');

// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<?php if ($image_one) { ?>
    <div class="flex-block <?php echo $block_name . " " . $spacing . " " . $style; ?>">
        <div class="container">
            <?php if (!empty($image_one)) { ?>
                <figure>
                    <img src="<?php echo $image_one['url']; ?>" alt="<?php echo $image_one['alt']; ?>" />
                </figure>
            <?php } ?>
            <?php if (!empty($image_two)) { ?>
                <figure>
                    <img src="<?php echo $image_two['url']; ?>" alt="<?php echo $image_two['alt']; ?>" />
                </figure>
            <?php } ?>
        </div>
    </div>
<?php } ?>