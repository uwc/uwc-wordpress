<?php
/**
 * Element to output the Call To Action module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="section section-cta pure-ctnr"  data-color="<?php the_sub_field( 'cta_color' ); ?>">
	<div class="box-2-2">
		<a class="cta-button" href="<?php the_sub_field( 'cta_url' ) ?>"><?php the_sub_field( 'cta_text' ) ?></a>
	</div>
</section>
