<?php
/**
 * Element to output the Logo module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="section section-logo pure-ctnr box-2-2">

<?php
$headline = get_sub_field( 'lo_headline' );

if ( ! empty( $headline ) ) : ?>

	<h2 class="logo-headline"><?php the_sub_field( 'lo_headline' ); ?></h2>

<?php endif; ?>

	<div class="logo-wrapper">

		<?php while ( have_rows( 'lo_logos' ) ) : the_row();

			$image = get_sub_field( 'lo_logo' );

			if ( ! empty( $image ) ) : ?>

				<a class="logo-link" href="<?php echo esc_url( the_sub_field( 'lo_url' ) ); ?>" title="<?php echo esc_attr( $image['alt'] ); ?>">

					<img class="logo-image" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />

				</a>

			<?php endif; ?>

		<?php endwhile; ?>

	</div>
</section>
