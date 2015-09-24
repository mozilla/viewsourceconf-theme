<?php
	/**
	 * Template Name: Schedule
	 *
	 * Learn more: http://codex.wordpress.org/Template_Hierarchy
	 *
	 * @package view_source
	 */

	get_header(); ?>

<section id="schedule" class="schedule-inner">

<h2><?php _e( 'Schedule', 'view_source' );?></h2>
<p><?php echo esc_html( get_post_meta( get_the_ID(), 'vs_sessions_intro_text', true ) );?></p>

	<?php get_template_part( 'template-parts/content', 'schedule' );?>
</section>

<?php get_footer(); ?>
