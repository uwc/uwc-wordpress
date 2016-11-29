<?php
/**
 * Element to output the Quote module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

$image = get_sub_field( 'qu_image' );
$size = 'large'; // (thumbnail, medium, large, full or custom size)
$url = wp_get_attachment_image_src( $image, $size );
?>

<section class="section section-quote box-2" data-color="<?php the_sub_field( 'qu_colors' ); ?>">

	<?php echo '<div class="quote-background"' . ( esc_url( $url[0] ) ? ' style="background-image: url('
	. esc_url( $url[0] ) . ')"' : '' ) . '>'; ?>
		<div class="pure-ctnr box-2-2">
			<div class="quote-wrapper">
				<blockquote class="quote-blockquote"><p>&ldquo;<?php the_sub_field( 'quote' ); ?>&rdquo;</p>
					<?php
					if ( get_sub_field( 'citation' ) ) {
						echo '<cite class="quote-citation">' . esc_html( get_sub_field( 'citation' ) ) . '</cite>';
					}
					?>
				</blockquote>
			</div>
		</div>
	</div>
</section>
