<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package UWC
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="main" role="main">
			<div class="content-main pure-ctnr">

		<?php
		if ( have_posts() ) : ?>

			<header class="box-4">
				<div class="box-4-2">
					<?php get_search_form(); ?>
				</div>
				<h1 class="search-title box-2-2"><?php printf( esc_html__( 'Search results for &#x201c;%s&#x201d;:', 'uwc' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header>
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'components/content', 'search' );

			endwhile;

			uwc_website_paginated();

		else :

			get_template_part( 'components/content', 'none' );

		endif; ?>
			</div>
		</main>
	</section>
<?php
get_footer();
