<?php
/**
 * Element to output the Google Maps module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="section section-googleMaps pure-ctnr">
	<div class="box-2-2">
	<?php
	if ( get_sub_field( 'gm_headline' ) ) {
		echo '<h2 class="googleMaps-headline">' . esc_html( get_sub_field( 'gm_headline' ) ) . '</h2>';
	}
	if ( have_rows( 'locations' ) ) : ?>
		<div class="acf-map">
		<?php while ( have_rows( 'locations' ) ) : the_row();

			$location = get_sub_field( 'location' );

			?>
			<div class="marker" data-lat="<?php echo esc_html( $location['lat'] ); ?>" data-lng="<?php echo esc_html( $location['lng'] ); ?>">
				<?php
				if ( get_sub_field( 'link_url' ) ) {
					echo '<a href="' . esc_url( get_sub_field( 'link_url' ) ) . '"><h4 class="section-header">' . esc_html( get_sub_field( 'title' ) ) . '</h4></a>';
				} else {
					echo '<h4 class="googleMaps-header">' . esc_html( get_sub_field( 'title' ) ) . '</h4>';
				}
				?>
				<p class="googleMaps-body"><?php the_sub_field( 'description' ); ?></p>
			</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
	</div>
</section>
