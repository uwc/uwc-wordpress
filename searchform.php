<?php
/**
 * Template for displaying search forms in UWC WordPress.
 *
 * @package UWC
 */

?><form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php echo esc_attr_x( 'Search for:', 'label', 'uwc' ); ?></label>
	<input type="search" class="form-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'uwc' ); ?>" value="<?php echo get_search_query(); ?>" name="s"/>
	<span class="form-underline"></span>
</form>
