<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UWC
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
if ( is_singular() && ! get_theme_mod( 'comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
wp_head();
?>

<meta name="description" content="<?php if ( is_single() ) {
				single_post_title( '', true );
} else {
	bloginfo( 'name' );
	echo ' - ';
	bloginfo( 'description' );
}
		?>" />
</head>

<body id="js-body" <?php body_class(); ?>>

	<div class="site">

		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'uwc' ); ?></a>

		<header id="metabar" class="metabar" role="banner">

			<div id="brand" class="brand pure-ctnr box-1-2">

				<div class="brand-center">
					<?php get_template_part( 'components/site', 'logo' ); ?>
				</div>

				<?php if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu( array(
						'theme_location'  => 'social',
						'container_class' => 'brand-left',
						'menu_class'      => 'menu-social',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => 'false',
					) );
} ?>

				<div class="brand-right">

					<button id="js-search" class="brand-search"><span class="screen-reader-text"><?php esc_attr_e( 'Search', 'uwc' ) ?></span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path class="search-open" d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/><path class="search-close" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></button>
					<span class="brand-divider"></span>
					<button id="js-menu" class="navigation-button"><?php esc_html_e( 'Menu', 'uwc' ); ?></button>

				</div>

			</div>

			<div id="navigation" class="pure-ctnr" role="navigation">

				<?php if ( has_nav_menu( 'primary' ) ) {
					wp_nav_menu( array(
						'theme_location'  => 'primary',
						'depth'           => '2',
						'container'       => 'nav',
						'container_class' => 'navigation-links closed',
						'menu_class'      => 'menu-primary',
						'fallback_cb'     => 'false',
					) );
} ?>

			</div>

		</header>

		<div id="search" class="search-overlay">

			<div class="search-field">

				<?php get_search_form(); ?>

			</div>

		</div>

		<div id="content" class="content">
