<?php

/**
 * Full Image inc parallax option.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$image = get_sub_field('image');
$parallax = get_sub_field('parallax');
$full = get_sub_field('full_width');

if($full == 'yes'){
    $class = 'container-fluid no-pad';
}else{
    $class = 'container';
}

?>

<?php if($parallax){ ?>
<div class="hero-holding <?php echo $class; ?>">
    <div class="background-image parallax" style="background:url('<?php echo $image; ?>');"></div>
</div>
<?php }else{ ?>
    <div class="full-image <?php echo $class; ?>">
        <img src="<?php echo $image; ?>">
    </div>
<?php } ?>

