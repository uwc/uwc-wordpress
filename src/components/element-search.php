<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'pure-g' ); ?>>
	<a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark">
		<h2 class="feed-headline"><?php the_title(); ?></h2>
		<p class="feed-text"><?php echo esc_html( get_the_excerpt() ); ?></p>
	</a>
</article>
