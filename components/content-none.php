<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="no-results not-found">

	<?php if ( is_search() ) : ?>

	<header class="box-4">
		<div class="box-4-2">
			<?php get_search_form(); ?>
		</div>
		<h1 class="search-title box-2-2"><?php printf( esc_html__( 'Search results for &#x201c;%s&#x201d;:', 'uwc' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
	</header>

	<?php endif; ?>

	<div class="content-entry box-2-2">
		<h1><?php esc_html_e( 'Nothing Found', 'uwc' ); ?></h1>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'uwc' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'uwc' ); ?></p>
		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'uwc' ); ?></p>
		<?php endif; ?>
	</div>
</section><!-- .no-results -->
