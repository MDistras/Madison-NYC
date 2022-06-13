<div class="header-menu">
	<div class="container-fluid margin-32">
		<div class="row">
			<div class="col-12 col-sm-2 mobile-hide">
				<a href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/starter-temp/img/logos/logo.svg" alt="" height="50px"></a>
			</div>
			<div class="col-12 col-sm-10">
				<?php 
				wp_nav_menu( array(
				    'menu'           => 'Main Menu',
				    'theme_location' => 'main-menu',
				    'fallback_cb'    => false // Do not fall back to wp_page_menu()
				) );
				?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid header-top" id="top">
	<div class="row flex-center">
		<div class="col-sm-12 text-right">
			<div class="burger-menu dark burger-menu--closed">
				  <div class="bar"></div>
				  <div class="bar"></div>
				  <div class="bar"></div>
			</div>
		</div>
		
	</div>
</div>



