<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
	<!-- this is the part responsible for hidding the bottom bar -->
	<meta name="apple-mobile-web-app-capable" content="yes" />

	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if (is_singular() && pings_open(get_queried_object())) : ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php endif; ?>
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/favicon.png" sizes="32x32">
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory'); ?>/img/favicons/favicon.png" sizes="16x16">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php
	$logo = get_field('logo', 'option');
	?>

	<header>
		<div class="container">
			<figure class="logo">
				<a href="/"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['title']; ?>" /></a>
			</figure>

			<nav class="desktop">
				<ul>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
					<li><a href="#">Link</a></li>
				</ul>
			</nav>

			<nav class="mobile">
				<div class="hamburger-container">
					<div class="nav-icon3">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
			</nav>
		</div>


	</header>