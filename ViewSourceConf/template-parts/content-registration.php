<?php
	/*
	 * Template part of the registration portion of the front page.
	 */
?>
	<h2><?php _e ( 'Registration', 'view_source' ); ?></h2>
<?php

	$reg_intro_text = esc_html ( get_post_meta ( get_the_ID (), 'vs_reg_intro_text', true ) );
	if ( $reg_intro_text ) :
		echo '<p>' . $reg_intro_text . '</p>';
	endif;

	$registration_type = esc_html ( get_post_meta ( get_the_ID (), 'vs_registration_type', true ) );

	if ( $registration_type ) {
		echo '<ul>';
		for ( $i = 0; $i < $registration_type; $i++ ) {
			$title       = esc_html ( get_post_meta ( get_the_ID (), 'vs_registration_type_' . $i . '_title', true ) );
			$description = esc_html ( get_post_meta ( get_the_ID (), 'vs_registration_type_' . $i . '_description', true ) );
			$cost        = (int)get_post_meta ( get_the_ID (), 'vs_registration_type_' . $i . '_cost', true );
			$end_date    = esc_html ( get_post_meta ( get_the_ID (), 'vs_registration_type_' . $i . '_vs_on_sale_until', true ) );

			if ( $title ) :
				echo '<li><h2>' . $title . '</h2>';
			endif;
			if ( $description ) :
				echo '<p>' . $description . '<br>';
			endif;
			if ( $end_date ) :
				echo 'On sale until ' . date( 'm-d-Y', $end_date ) . '</p>';
			endif;
			if ( $cost ) :
				echo '<span class="cost">$ ' . $cost . '</span>';
			endif;
			echo '</li>';
		}
		echo '</ul>';
	}
	?>
<?php view_source_registration_btn_link();?>