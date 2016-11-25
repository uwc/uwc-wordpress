<?php
/**
 * Template part for displaying section pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

// Check if the flexible content field has rows of data.
if ( have_rows( 'modules' ) ) :

	// Loop through the rows of data.
	while ( have_rows( 'modules' ) ) : the_row();

		if ( get_row_layout() === 'text_image' ) :
			get_template_part( 'components/module', 'textImage' );

		elseif ( get_row_layout() === 'quote' ) :

			get_template_part( 'components/module', 'quote' );

		elseif ( get_row_layout() === 'call_to_action' ) :

			get_template_part( 'components/module', 'callToAction' );

		elseif ( get_row_layout() === 'video' ) :

			get_template_part( 'components/module', 'video' );

		elseif ( get_row_layout() === 'google_maps' ) :

			get_template_part( 'components/module', 'googleMaps' );

		endif;

	endwhile;

else :

	get_template_part( 'components/content', 'none' );

endif;

get_template_part( 'components/module', 'newsfeed' );
