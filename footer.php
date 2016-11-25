<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UWC
 */

?></div>
			<footer id="colophon" class="footer" role="contentinfo">
			<div class="footer-metabar">
				<h3 class="footer-tagline"><?php bloginfo( 'description' ); ?></h3>
				<?php if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu( array(
						'theme_location'  => 'social',
						'container_class' => 'footer-social',
						'menu_class'      => 'menu-social',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => 'false',
					) );
} ?>
			</div>

			<?php get_sidebar( 'footer' ); ?>
			<div class="footer-info">
				<div class="footer-wrapper">
					<span class="footer-legal">&#xa9; <?php bloginfo( 'name' ); ?>. <?php echo esc_html__( 'All rights reserved.', 'uwc' ); ?></span>
					<span class="footer-author"><a href="<?php $my_theme = wp_get_theme();
					echo $my_theme->get( 'AuthorURI' ); ?>" rel="designer" target="_blank">Made by Connor.</a></span>
				</div>
			</div>
		</footer>
	</div>
<?php wp_footer(); ?>
</body>
</html>
