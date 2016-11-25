<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UWC
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<?php if ( has_post_thumbnail() ) : ?>
				<header class="header header-featured" style="background-image: url(<?php the_post_thumbnail_url( 'large' ); ?>)">
			<?php else : ?>
				<header class="header header-noFeatured">
			<?php endif; ?>
					<div class="header-outer">
						<div class="header-inner">
							<?php
							if ( is_page() || is_single() ) {
								the_title( '<h1 class="header-title">', '</h1>' );
							} else {
								the_title( '<h2 class="header-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
							} ?>
							<h2 class="header-summary"><?php the_excerpt(); ?></h2>
						</div>
					</div>
				</header>

				<div class="content-main">
				<?php
				$text = get_the_content();
				uwc_website_content_navigation( $text );

				/**
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				$format = get_post_format() ? : 'standard';
				get_template_part( 'components/content', $format );

				get_sidebar();

				the_post_navigation( array(
					'in_same_term' => true,
					'prev_text' => '%title',
					'next_text' => '%title',
				)); ?>

				</div>

				<?php
					// Only show comments if they are not disabled in customizer.
				if ( ! get_theme_mod( 'comments' ) ) :
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
						endif;
					endif;

				endwhile; // End of the loop.
				?>

			</article><!-- #post-## -->
		</main>
	</div>
<?php
get_footer();
