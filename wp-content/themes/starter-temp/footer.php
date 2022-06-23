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
        <ul class="desktop">
          <li><a href="#">Legal</a></li>
          <li class="hide-on-mobile"><a href="#">Privacy Notice</a></li>
        </ul>
        <span class="hide-on-mobile"><?php echo $copyright_notice; ?></span>
      </nav>
      <nav class="footer secondary">
        <span class="bold"><?php echo $copyright_secondary; ?></span>
        <ul class="mobile">
          <li><a href="#">Privacy Notice</a></li>
        </ul>
        <span><?php echo $copyright_notice; ?></span>
      </nav>
    </div>
  </div>
</footer>



<?php wp_footer(); ?>


</body>

</html>