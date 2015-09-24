<div class="branding" style="width:243px;height: auto;">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<?php echo file_get_contents( get_template_directory_uri() . '/assets/images/branding.svg' );?>
	</a>
</div>
<nav>
	<?php view_source_registration_link()?>
	<?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
</nav>