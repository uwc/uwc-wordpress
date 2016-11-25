<?php
/**
 * Template part for displaying posts and pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<div class="content-entry">
	<?php echo '<p><a href="' . esc_url( get_field( 'link_url' ) ) . '" rel="bookmark" target="_blank">' . esc_html__( 'Continue reading', 'uwc' ) . '...</a></p>'; ?>
</div>

<?php if ( $tags = get_the_tags() ) {
	echo '<p class="post-tags">';
	foreach ( $tags as $tag ) {
		$sep = ( end( $tags ) === $tag ) ? '' : ', ';
		echo '<a href="' . esc_url( get_term_link( $tag, $tag->taxonomy ) ) . '">#' . esc_html( $tag->name ) . '</a>' . esc_html( $sep );
	}
	echo '</p>';
}
