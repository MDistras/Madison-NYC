<?php
$block_id = "";
$block_name = "availability_block";

$prepend_title = get_sub_field('prepend_title');
$title = get_sub_field('title');
$image = get_sub_field('image'); // SVG code output
$image_mobile = get_sub_field('image_mobile'); // SVG code output


// Spacing
$padding_top = "padding-top-" . get_sub_field('spacing_padding_top');
$padding_bottom = "padding-bottom-" . get_sub_field('spacing_padding_bottom');
$margin_top = "margin-top-" . get_sub_field('spacing_margin_top');
$margin_bottom = "margin-bottom-" . get_sub_field('spacing_margin_bottom');
$spacing = $padding_top . " " . $padding_bottom . " " . $margin_top . " " . $margin_bottom;
?>

<div class="<?php echo $block_name; ?>">
    <div class="container <?php echo $spacing; ?>">
        <?php if (!empty($prepend_title)) { ?>
            <p class="prepend-title text-header-xl text-center"><?php echo $prepend_title; ?></p>
        <?php } ?>
        <?php if (!empty($title)) { ?>
            <p class="title text-header-xl text-center"><?php echo $title; ?></p>
        <?php } ?>
        <?php if (!empty($image)) { ?>
            <div class="svg-container desktop">
                <?php echo $image; ?>
            </div>
        <?php } ?>
        <?php if (!empty($image_mobile)) { ?>
            <div class="svg-container mobile">
                <?php echo $image_mobile; ?>
            </div>
        <?php } ?>
        <?php if (have_rows('image_modals')) {
            while (have_rows('image_modals')) : the_row();
                $modal_id = "image-modal-" . get_sub_field('id');
                $title = get_sub_field('title');
                $image = get_sub_field('image');
        ?>
                <div class="image-modal-container" id="<?php echo $modal_id; ?>">
                    <div class="modal-inner container">
                        <div class="content">
                            <?php if (!empty($title)) { ?>
                                <p class="title text-header-xl"><?php echo $title; ?></p>
                            <?php } ?>
                            <?php if (have_rows('statistics')) { ?>
                                <div class="statistics-container">
                                    <?php
                                    while (have_rows('statistics')) : the_row();
                                        $statistic = get_sub_field('statistic');
                                        $number = get_sub_field('number');
                                    ?>
                                        <p class="statistic"><?php echo $statistic; ?></p>
                                        <p class="number"><?php echo $number; ?></p>
                                    <?php endwhile; ?>
                                </div>
                            <?php
                            } ?>
                        </div>

                        <div class="maps">
                            <figure>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </figure>
                            <?php if (have_rows('ctas')) { ?>
                                <div class="cta-container">
                                    <?php
                                    while (have_rows('ctas')) : the_row();
                                        $icon = get_sub_field('icon');
                                        $cta = get_sub_field('link');
                                        if ($cta) {
                                            $cta_url = $cta['url'];
                                            $cta_title = $cta['title'];
                                            $cta_target = $cta['target'] ? $cta['target'] : '_self';
                                        }
                                    ?>
                                        <a class="cta" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>">
                                            <?php if (!empty($icon)) { ?>
                                                <figure class="icon">
                                                    <img src="<?php echo $icon['url']; ?>" alt="" class="inline-svg" />
                                                </figure>
                                            <?php } ?>
                                            <?php echo esc_html($cta_title); ?>
                                        </a>
                                    <?php endwhile; ?>
                                </div>
                            <?php
                            } ?>
                        </div>
                    </div>
                    <figure class="close">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/icons/icon-modal-close.svg" alt="Close modal" />
                    </figure>
                </div>
        <?php endwhile;
        } ?>
    </div>
</div>

<script>
    <?php if (have_rows('image_modals')) {
        while (have_rows('image_modals')) : the_row();
            $svg_id = get_sub_field('id');
            $modal_id = "image-modal-" . get_sub_field('id');
    ?>

            <?php if (get_sub_field('disable_floor')) { ?>
                $(function() {
                    jQuery("#<?php echo $svg_id; ?>").addClass("unavailable");
                });
            <?php } ?>

            jQuery(".desktop #<?php echo $svg_id; ?>, .mobile #<?php echo $svg_id; ?>").on("click", function() {
                jQuery("#<?php echo $modal_id; ?>").addClass("active");
                jQuery("body").addClass("modal-active");
            });

    <?php endwhile;
    } ?>

    jQuery(".image-modal-container .close").on("click", function() {
        jQuery(this).parent().removeClass("active");
        jQuery("body").removeClass("modal-active");
    });
</script>