<?php
/**
 * Element to output the Video module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="section section-video pure-ctnr">
	<div class="video-container pure-g">
		<div class="pure-u-1-1 pure-u-md-2-3 pure-u-lg-2-3 box-2-2">
			<div class="video-wrapper">
				<?php the_sub_field( 'video' ); ?>
			</div>
		</div>
		<div class="pure-u-1-1 pure-u-md-1-3 pure-u-lg-1-3 box-2-2">
			<h2 class="video-headline"><?php the_sub_field( 'vd_headline' ) ?></h2>
		</div>
	</div>
</section>
