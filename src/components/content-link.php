<?php
/**
 * Template part for displaying posts and pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package UWC
 */

?>

<div class="content-entry box-2-2">
	<?php echo '<p><a href="' . esc_url( get_field( 'link_url' ) ) . '" rel="bookmark" target="_blank">' . esc_html__( 'Continue reading', 'uwc' ) . '...</a></p>'; ?>
</div>
