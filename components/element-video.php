<?php
/**
 * Template part for displaying posts and pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<?php if ( is_sticky() ) : ?>
	<span class="featured"><?php echo esc_html__( 'Featured', 'uwc' ); ?></span>
<?php endif; ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'feed-post pure-g' ); ?>>
	<div class="video-container pure-g">
		<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-2-3 box-2-2">
			<div class="video-wrapper">
				<?php the_field( 'video_url' ); ?>
			</div>
		</div>
		<div class="pure-u-1-1 pure-u-md-1-3 pure-u-lg-1-3 box-2-2">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
				<h2 class="feed-headline"><?php the_title(); ?></h2>
			</a>
			<p class="feed-text"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="feed-link"><?php echo esc_html__( 'Watch video', 'uwc' ); ?></a>
		</div>
	</div>
</article> <!-- // post-## -->
