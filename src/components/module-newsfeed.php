<?php
/**
 * Element to output the Newsfeed preview on section pages.
 * Gets the 4 most recent posts belonging to the selected categories.
 * Outputs them with markup if at least one category is set and a minimum of 4 posts exist.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

$taxonomies = get_field( 'newsfeed' );

$posts = get_posts(array(
	'posts_per_page' => 3,
	'category'       => $taxonomies,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_status'    => 'publish',
));
$count = count( $posts );

if ( $taxonomies && $count >= 3 ) {
	echo '<section class="section section-news pure-g pure-ctnr box-1-1">';

	$index = 1;

	foreach ( $posts as $post ) {
		$featured = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		$featured_url = $featured[0];

		echo '<article class="news-post news-' . intval( $index ) . ( 1 === intval( $index ) ? ' pure-u-1-1 pure-u-md-1-2 pure-u-lg-1-2' : ' pure-u-1-1 pure-u-md-1-4 pure-u-lg-1-4' ) . ' box-1-1"><a href="' . esc_url( get_permalink( $post->ID ) ) . '">';
		echo '<div class="news-background"' . ( has_post_thumbnail( $post->ID ) ? ' style="background-image: url(' . esc_url( $featured_url ) . ')"' : '' ) . '>';
		echo '<div class="box-2-2 news-wrapper"><div class="news-outer"><div class="news-inner">';
		echo '<h4 class="news-date">' . get_the_date( '', $post->ID ) . '</h4><h2 class="news-headline">' . get_the_title( $post->ID ) . '</h2></div></div></div></div></a></article>';

		$index++;
	}
	echo '</section>';
}
