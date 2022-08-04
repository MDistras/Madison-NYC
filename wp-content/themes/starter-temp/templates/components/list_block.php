<?php
$block_id = "";
$block_name = "list_block";

$include_cutout = get_sub_field('include_cutout');

$subtitle = get_sub_field('subtitle');
$subtitle_line_1 = $subtitle['line_1'];
$subtitle_line_2 = $subtitle['line_2'];

$include_cutout = get_sub_field('include_cutout');

$list_columns = "list-column-" . get_sub_field('list_columns');


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="flex-block <?php echo $block_name . " " . $spacing; ?>">
    <?php if (!empty($subtitle)) { ?>
        <div class="container">
            <div class="subtitle-container <?php echo $padding_bottom; ?>">
                <?php if (!empty($subtitle_line_1)) { ?>
                    <p class="subtitle subtitle_one"><?php echo $subtitle_line_1; ?></p>
                <?php } ?>
                <?php if (!empty($subtitle_line_2)) { ?>
                    <p class="subtitle subtitle_two"><?php echo $subtitle_line_2; ?></p>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
    <div class="container list-items <?php echo $list_columns; ?>">
        <?php if (have_rows('list_items')) { ?>
            <?php while (have_rows('list_items')) : the_row();
                $image = get_sub_field("image");
                $title = get_sub_field("title");
                $content = get_sub_field("content"); ?>

                <div class="list-item">
                    <?php if (!empty($image)) { ?>
                        <figure>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                        </figure>
                    <?php } ?>

                    <?php if (!empty($title)) { ?>
                        <p class="title text-header-m"><?php echo $title; ?></p>
                    <?php } ?>

                    <?php if (!empty($content)) { ?>
                        <div class="content-wrapper">
                            <?php echo $content; ?>
                        </div>
                    <?php } ?>
                </div>

        <?php endwhile;
        } ?>

        <button class="cta show-all">View more</button>

        <?php if ($include_cutout) { ?>
            <div class="cutout"></div>
        <?php } ?>

    </div>
</div>