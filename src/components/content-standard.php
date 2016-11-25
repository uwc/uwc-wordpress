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
	<?php

		the_content( sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'uwc' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uwc' ),
			'after'  => '</div>',
		) );
	?>
</div>

<?php if ( $tags = get_the_tags() ) {
	echo '<p class="post-tags">';
	foreach ( $tags as $tag ) {
		$sep = ( end( $tags ) === $tag ) ? '' : ', ';
		echo '<a href="' . esc_url( get_term_link( $tag, $tag->taxonomy ) ) . '">#' . esc_html( $tag->name ) . '</a>' . esc_html( $sep );
	}
	echo '</p>';
}
