<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="hero hero-noFeatured">
				<div class="pure-ctnr box-4-2">
					<div class="hero-outer">
						<h1 class="hero-title"><?php the_archive_title(); ?></h1>
						<h2 class="hero-summary"><?php the_archive_description(); ?></h2>
					</div>
				</div>
			</header>

			<div class="content-main pure-ctnr">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called element-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					$format = get_post_format() ? : 'standard';
					get_template_part( 'components/element', $format );

				endwhile;

				uwc_website_paginated();

			else :

				get_template_part( 'components/content', 'none' );

			endif; ?>
			</div>
		</main>
	</div>
<?php
get_footer();
