<?php
/**
 * UWC WordPress Theme Customizer.
 *
 * @package UWC
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uwc_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting( 'comments', array(
		'default' => false,
		'sanitize_callback' => 'esc_html',
	) );
	$wp_customize->add_setting( 'featured', array(
		'sanitize_callback' => 'esc_url',
	) );
	$wp_customize->add_section( 'uwc_theme_options' , array(
		'title'       => __( 'Theme Options', 'uwc' ),
		'priority'    => 30,
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'comments',
			array(
				'label'       => __( 'Disable Comments', 'uwc' ),
				'section'     => 'uwc_theme_options',
				'settings'    => 'comments',
				'type'        => 'checkbox',
				'description' => __( 'Check the box to hide comments on the website. Comments are NOT deleted from the database and can thus be unhidden at any time.', 'uwc' ),
			)
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'featured',
			array(
				'label'       => __( 'Placeholder Image', 'uwc' ),
				'section'     => 'uwc_theme_options',
				'settings'    => 'featured',
				'description' => __( 'Select or upload a placeholder image that is displayed on feed pages when a post contains no image.', 'uwc' ),
			)
		)
	);
}
add_action( 'customize_register', 'uwc_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uwc_customize_preview_js() {
	wp_enqueue_script( 'uwc_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'jquery', 'customize-preview' ), true );
}
add_action( 'customize_preview_init', 'uwc_customize_preview_js' );
