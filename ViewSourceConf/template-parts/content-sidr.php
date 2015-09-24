

<nav id="mobile-navigation" class="main-navigation" role="navigation">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<?php echo file_get_contents( get_template_directory_uri() . '/assets/images/branding.svg' );?>
	</a>
	<?php view_source_registration_link()?>
	<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
</nav><!-- #site-navigation -->

