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
	echo '<section class="section section-news">';
	$index = 1;
	foreach ( $posts as $post ) {
		$featured = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
		$featured_url = $featured[0];

		if ( has_post_thumbnail( $post->ID ) ) {
			echo '<article class="news-post news-' . intval( $index ) . '"><div class="news-background" style="background-image: url(';
			echo esc_url( $featured_url );
			echo ')"></div>';
		} else {
			echo '<article class="news-post news-' . intval( $index ) . '"><div class="news-background"></div>';
		}
		echo '<div class="news-wrapper">';
		echo '<a href="' . esc_url( get_permalink( $post->ID ) ) . '"><h4 class="news-date">' . get_the_date( '', $post->ID ) . '</h4><h2 class="news-headline">' . get_the_title( $post->ID ) . '</h2></a></div></article>';
		$index++;
	}
	echo '</section>';
}
