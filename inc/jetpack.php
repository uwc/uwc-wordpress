<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package UWC
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function uwc_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'uwc_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

	// Add theme support for Social Menus.
	add_theme_support( 'jetpack-social-menu' );
}
add_action( 'after_setup_theme', 'uwc_jetpack_setup' );

/**
 * Return early if Social Menu is not available.
 */
function uwc_social_menu() {
	if ( ! function_exists( 'jetpack_social_menu' ) ) {
		return;
	}
	jetpack_social_menu();
}
