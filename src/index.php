<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="main" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();
			?>

			<div class="content-main pure-ctnr">

				<?php

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
				if ( is_page() && $post->post_parent > 0 ) {
					get_template_part( 'components/element', 'section' );
				} else {
					$format = get_post_format() ? : 'standard';
					get_template_part( 'components/element', $format );
				}

				endwhile;

				uwc_website_paginated();

			else :

				get_template_part( 'components/content', 'none' );

			endif; ?>
			</div>
		</main>
	</div>
<?php
get_sidebar();
get_footer();
