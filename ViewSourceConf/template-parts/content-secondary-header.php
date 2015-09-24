<div class="secondary-header">
	<div class="branding">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<?php echo file_get_contents( get_template_directory_uri() . '/assets/images/branding.svg' );?>
		</a>
	</div>
	<nav id="site-navigation" class="main-navigation dark" role="navigation">
		<?php view_source_registration_link();?>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav>
</div>
<hr>