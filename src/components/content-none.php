<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC_Website
 */

?>

<section class="no-results not-found">
	<div class="entry-content">
		<h1><?php esc_html_e( 'Nothing Found', 'uwc-wordpress' ); ?></h1>
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'uwc-wordpress' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) :
			get_search_form(); ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'uwc-wordpress' ); ?></p>
		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'uwc-wordpress' ); ?></p>
		<?php endif; ?>
	</div>
</section><!-- .no-results -->
