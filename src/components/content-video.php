<?php
/**
 * Template part for displaying posts and pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC_Website
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<section class="section-video">
	<div class="section-wrapper">
		<?php the_field( 'video_url' ); ?>
	</div>
</section>

	<header class="header -entry -no-featured">
		<div class="header-outer">
			<div class="header-inner">
				<?php
					the_title( '<h1 class="header-title">', '</h1>' ); ?>
				<h2 class="header-summary"><?php the_excerpt(); ?></h2>
			</div>
		</div>
	</header>

	<?php
		$text = get_the_content();
		uwc_website_content_navigation( $text );
	?>

	<div class="entry-content">
		<?php

			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'uwc-wordpress' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'uwc-wordpress' ),
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
} ?>
	
</article><!-- #post-## -->
