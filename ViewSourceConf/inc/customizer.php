<?php
/**
 * View Source Conference Theme Customizer
 *
 * @package ViewSource
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vs_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*--------------------------------------------------------------
	// SOCIAL MEDIA SECTION
	--------------------------------------------------------------*/

	$wp_customize->add_section( 'vs_social_media', array(
		'title'             => __( 'Social Media', 'view_source' ),
		'priority'          => 40,
		'description'       => __( 'Enter the URL to your account for each service for the icon to appear.', 'view_source' ),
	) );

	// Add Facebook Setting
	$wp_customize->add_setting( 'facebook' , array( 'default' => '', 'sanitize_callback' => 'esc_url_raw', ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
		'label'             => __( 'Facebook', 'view_source' ),
		'section'           => 'vs_social_media',
		'settings'          => 'facebook',
		'sanitize_callback' => 'esc_url_raw',
	) ) );

	// Add Twitter Setting
	$wp_customize->add_setting( 'twitter' , array( 'default' => '', 'sanitize_callback' => 'esc_url_raw', ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
		'label'             => __( 'Twitter', 'view_source' ),
		'section'           => 'vs_social_media',
		'settings'          => 'twitter',
		'sanitize_callback' => 'esc_url_raw',
	) ) );
}
add_action( 'customize_register', 'vs_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function vs_customize_preview_js() {
	wp_enqueue_script( 'vs_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'vs_customize_preview_js' );
