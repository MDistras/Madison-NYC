<?php
$block_id = "";
$block_name = "text_carousel_block";
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
        <div class="text_carousel">
            <?php if (have_rows('carousel')) { ?>
                <?php while (have_rows('carousel')) : the_row();
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $content = get_sub_field('content');
                ?>

                    <div class="item">
                        <?php if ($image) { ?>
                            <figure>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </figure>
                        <?php } ?>

                        <?php if ($title) { ?>
                            <p class="title text-header-m"><?php echo $title; ?></p>
                        <?php } ?>

                        <?php if ($content) { ?>
                            <p class="text-body"><?php echo $content; ?></p>
                        <?php } ?>
                    </div>

            <?php endwhile;
            } ?>
        </div>
    </div>
</div>