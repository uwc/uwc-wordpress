<?php
/**
 * UWC WordPress functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UWC
 */

/**
 * UWC WordPress has only been tested in WordPress 4.4 and later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
require get_template_directory() . '/inc/theme.php';

/**
 * Sets the maximum media width for embed media in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function uwc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'uwc_content_width', 1280 );
}
add_action( 'after_setup_theme', 'uwc_content_width', 0 );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function uwc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'uwc' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'uwc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'uwc' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'uwc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'uwc' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'uwc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title footer-widgetTitle">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'uwc' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'uwc' ),
		'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title footer-widgetTitle">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'uwc_widgets_init' );

/**
 * Register Foo_Widget widget.
 *
 * @link https://codex.wordpress.org/Widgets_API
 */
function register_uwc_widgets() {
	register_widget( 'UWC_Author_Widget' );
}
add_action( 'widgets_init', 'register_uwc_widgets' );

if ( ! function_exists( 'uwc_fonts_url' ) ) :
	/**
	 * Register Google fonts for UWC WordPress.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function uwc_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';
		/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'uwc' ) ) {
			$fonts[] = 'Source+Sans+Pro:400,600,700';
		}
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => implode( '|', $fonts ),
				'subset' => $subsets,
			), 'https://fonts.googleapis.com/css' );
		}
		return $fonts_url;
	}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function uwc_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>";
}
add_action( 'wp_head', 'uwc_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 */
function uwc_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'uwc-website-fonts', uwc_fonts_url(), array( 'jquery' ) );
	// Add Google Maps scripts, used in the main stylesheet.
	wp_enqueue_script( 'uwc-website-googlemaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBV8fzdHyCXxCzT7kCqc1UCRKx4mROcm64', array(), null, true );
	// Theme stylesheet.
	wp_enqueue_style( 'uwc-website-style', get_stylesheet_uri() );
	// Load the html5 shiv.
	wp_enqueue_script( 'uwc-website-html5', get_template_directory_uri() . '/js/html5.js' );
	wp_script_add_data( 'uwc-website-html5', 'conditional', 'lt IE 9' );
	// Theme scripts.
	wp_enqueue_script( 'uwc-website-script', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'uwc_scripts' );

/**
 * Register Google Maps API key to enable Google Maps embeds with Advanced Custom Fields.
 */
function uwc_acf_init() {
	acf_update_setting( 'google_api_key', 'AIzaSyBV8fzdHyCXxCzT7kCqc1UCRKx4mROcm64' );
}
add_action( 'acf/init', 'uwc_acf_init' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Custom widgets.
 */
require get_template_directory() . '/inc/widgets.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
