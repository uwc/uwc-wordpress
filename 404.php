<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package UWC
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="main" role="main">

			<section class="error-404 not-found">
				<header class="header -entry -no-featured">
					<div class="header-outer">
						<h1 class="header-title"><?php esc_html_e( '404: Page not found.', 'uwc' ); ?></h1>
						<h2 class="header-summary"><p><?php
							echo esc_html_e( 'Sorry, the page you&#8217;re looking for doesn&#8217;t exist. Check the URL for errors or try searching for it below.', 'uwc' );
						?></p></h2>
					</div>
				</header>

				<div class="entry-content">

					<?php get_search_form(); ?>

				</div>
			</section>
		</main>
	</div>
<?php
get_footer();
