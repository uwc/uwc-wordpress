<?php
/**
 * Element to output the Video module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="section section-video">
	<div class="section-videoOuter">
		<div class="section-videoInner">
			<?php the_sub_field( 'video' ); ?>
		</div>
	</div>
</section>
