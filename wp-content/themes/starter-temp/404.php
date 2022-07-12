<?php
get_header();
global $post;

$title = get_field("404_title", "option");
$content = get_field("404_content", "option");
$cta = get_field("404_cta", "option");
if ($cta) {
  $cta_url = $cta['url'];
  $cta_title = $cta['title'];
  $cta_target = $cta['target'] ? $cta['target'] : '_self';
}
?>

<div class="four-oh-four">
  <div class="container">
    <?php if (!empty($title)) { ?>
      <p class="title text-header-xl"><?php echo $title; ?></p>
    <?php } ?>

    <?php if (!empty($content)) { ?>
      <p class="text-body"><?php echo $content; ?></p>
    <?php } ?>

    <?php if (!empty($cta)) { ?>
      <a class="cta" href="<?php echo esc_url($cta_url); ?>" target="<?php echo esc_attr($cta_target); ?>"><?php echo esc_html($cta_title); ?></a>
    <?php } ?>
  </div>
</div>

<?php get_footer(); ?>