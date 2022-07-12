<?php
$logo = get_field('logo_footer', 'option');
$copyright_notice = get_field('copyright_notice', 'option');
$copyright_secondary = get_field('copyright_secondary', 'option');
?>

<footer>
  <div class="inner">
    <div class="container">
      <figure class="footer-logo">
        <a href="/"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['title']; ?>" /></a>

      </figure>
      <nav class="footer primary">
        <span class="bold hide-on-mobile"><?php echo $copyright_secondary; ?></span>
        <?php
        if (has_nav_menu('footer-navigation')) {
          wp_nav_menu(array(
            'theme_location'    => "footer-navigation",
            'menu_class'        => "footer-navigation desktop",
            'menu_id'           => " ",
            'container'         => false,
          ));
        }
        ?>
        <span class="hide-on-mobile"><?php echo $copyright_notice; ?></span>
      </nav>
      <nav class="footer secondary">
        <?php
        if (has_nav_menu('footer-secondary-navigation')) {
          wp_nav_menu(array(
            'theme_location'    => "footer-secondary-navigation",
            'menu_class'        => "footer-secondary-navigation mobile",
            'menu_id'           => " ",
            'container'         => false,
          ));
        }
        ?>
        <span class="bold"><?php echo $copyright_secondary; ?></span>
        <span><?php echo $copyright_notice; ?></span>
      </nav>
    </div>
  </div>
</footer>



<?php wp_footer(); ?>


</body>

</html>