<?php
/**
 * Template part for displaying the hero.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

if ( has_post_thumbnail() ) : ?>
<header class="hero hero-featured" style="background-image: url(<?php the_post_thumbnail_url( 'large' ); ?>)">
<?php else : ?>
<header class="hero hero-noFeatured">
<?php endif; ?>
	<div class="pure-ctnr box-4-2">
		<div class="hero-outer">
			<div class="hero-inner">
				<?php
				if ( is_page() || is_single() ) {
					the_title( '<h1 class="hero-title">', '</h1>' );
				} else {
					the_title( '<h2 class="hero-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				} ?>
				<h2 class="hero-summary"><?php the_excerpt(); ?></h2>
			</div>
		</div>
	</div>
</header>
