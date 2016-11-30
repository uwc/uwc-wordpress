<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

					/**
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					if ( is_page() && $post->post_parent <= 0 ) :
						get_template_part( 'components/content', 'section' );
					else : ?>
						<div class="content-main pure-ctnr">

						<?php
						$text = get_the_content();
						uwc_website_content_navigation( $text );

						$format = get_post_format() ?: 'standard';
						get_template_part( 'components/content', $format );

						uwc_website_page_navigation(); ?>

						</div>

					<?php
						// Only show comments if they are not disabled in customizer.
					if ( ! get_theme_mod( 'comments' ) ) :

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
							endif;
						endif;
					endif;

					endwhile; // End of the loop.
					?>

			</article><!-- #post-## -->
		</main>
	</div>
<?php
get_footer();
