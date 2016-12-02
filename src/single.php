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

			<?php
			get_template_part( 'components/site', 'hero' );
			?>

				<div class="content-main pure-ctnr">
					<div class="content-sidebar">

					<?php
					$text = get_the_content();
					uwc_content_navigation( $text );
					?>

					</div>

				<?php
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
