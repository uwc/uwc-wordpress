<?php
/**
 * Element to output the Text+Image module on section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<section class="section section-textImage pure-g pure-ctnr" data-color="<?php the_sub_field( 'ti_color' ); ?>">
	<div class="pure-u-1 pure-u-md-1-3 pure-u-lg-1-3 box-2-2">
		<div class="textImage-photo">
			<a class="textImage-image" href="<?php the_sub_field( 'link_url' ); ?>" style="background-image: url(<?php

			$image = get_sub_field( 'image' );
			$size = 'medium'; // (thumbnail, medium, large, full or custom size)
			$url = wp_get_attachment_image_src( $image, $size );

			if ( $image ) {

				echo esc_url( $url[0] );

			}

		?>)"></a>
		</div>
	</div>
	<div class="pure-u-1 pure-u-md-2-3 pure-u-lg-2-3  box-2-2">
		<div class="textImage-body">
			<h2 class="textImage-headline"><?php the_sub_field( 'headline' ); ?></h2>
			<p class="textImage-text"><?php the_sub_field( 'text' ); ?></p>

			<a href="<?php the_sub_field( 'link_url' ); ?>" class="textImage-link"><?php the_sub_field( 'link_text' ); ?></a>
		</div>
	</div>
</section>
