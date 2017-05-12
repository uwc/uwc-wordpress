<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package UWC
 */

if (! function_exists('uwc_page_navigation')) :
    /**
     * Prints HTML with links to previous and next pages for the current page.
     */
    function uwc_page_navigation()
    {
        $menu_location = 'primary';
        $locations = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($locations[ $menu_location ]);
        $pagelist = wp_get_nav_menu_items($menu->term_id, array( 'order' => 'DESC' ));

        $current = array_search(get_the_ID(), array_column($pagelist, 'object_id'));

        $previous = $current - 1;
        $next = $current + 1;

        echo '<nav class="entry-navigation">';
        echo '<h2 class="screen-reader-text">Beitragsnavigation</h2>';
        if (! empty($previous)) {
            echo '<div class="nav-previous">';
            echo '<a href="' . esc_url($pagelist[ $previous ]->url) . '" title="' . esc_html($pagelist[ $previous ]->title) . '">' . esc_html($pagelist[ $previous ]->title) . '</a>';
            echo '</div>';
        }
        if (! empty($next)) {
            echo '<div class="nav-next">';
            echo '<a href="' . esc_url($pagelist[ $next ]->url) . '" title="' . esc_html($pagelist[ $next ]->title) . '">' . esc_html($pagelist[ $next ]->title) . '</a>';
            echo '</div>';
        }
        echo '</nav>';
    }
endif;

if (! function_exists('uwc_paginated')) :
    /**
     * Pagination for archive, taxonomy, category, tag and search results pages.
     *
     * @global $wp_query http://codex.wordpress.org/Class_Reference/WP_Query
     */
    function uwc_paginated()
    {
        global $wp_query;
        $big = 99999999; // This needs to be an unlikely integer.

        // For more options and info view the docs for paginate_links(): http://codex.wordpress.org/Function_Reference/paginate_links.
        $paginate_numbers = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query -> max_num_pages,
            'prev_next' => false,
            'mid_size' => 1,
        ));

        $paginate_previous = get_previous_posts_link(__('Previous page', 'uwc'));

        $paginate_next = get_next_posts_link(__('Next page', 'uwc'));

        // Display the pagination if more than one page is found.
        if ($paginate_numbers) {
            echo '<nav class="post-navigation">';
            echo '<h2 class="screen-reader-text">Beitragsnavigation</h2>';
            if (! empty($paginate_previous)) {
                echo '<div class="nav-previous">' . wp_kses($paginate_previous, array(
                    'a' => array(
                    'href' => array(),
                    'title' => array(),
                    ),
                )) . '</div>';
            }
            echo '<div class="nav-numbers">' . wp_kses($paginate_numbers, array(
                'a' => array(
                    'href' => array(),
                    'title' => array(),
                ),
            )) . '</div>';
            if (! empty($paginate_next)) {
                echo '<div class="nav-next">' . wp_kses($paginate_next, array(
                    'a' => array(
                    'href' => array(),
                    'title' => array(),
                    ),
                )) . '</div>';
            }
            echo '</nav>';
        }
    }
endif;

if (! function_exists('uwc_content_navigation')) :
    /**
     * Adds content navigation to pages and posts that have anchor tags.
     *
     * @param string $text The page/post content to be parsed.
     */
    function uwc_content_navigation($text)
    {
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom -> loadHTML('<?xml encoding="utf-8" ?>' . $text);
        libxml_clear_errors();
        $nodes = $dom->getElementsByTagName('a');
        $items = array();
        foreach ($nodes as $node) {
            if ($node -> hasAttribute('id') === true) {
                $id = $node -> getAttribute('id');
                $items[] = html_entity_decode($id);
            }
        }
        if (count($items) !== 0) {
            echo '<nav class="widget anchors"><h2 class="widget-title">', esc_html__('In This Section', 'uwc'), '</h2><ol class="anchors-list">';
            foreach ($items as $item) {
                echo '<li class="anchors-link"><a class="anchors-item" href="#', esc_html(urlencode($item)), '" title="', esc_html($item), '" data-scroll>', esc_html($item), '</a></li>';
            }
            echo '</ol></nav>';
        }
    }
endif;

if (! function_exists('uwc_post_thumbnail')) :
    /**
     * Display Image from the_post_thumbnail or the first image of a post else display a default image.
     *
     * @param string $size Choose the thumbnail size from "thumbnail", "medium", "large", "full" or your own defined size using filters.
     */
    function uwc_post_thumbnail($size = 'full')
    {
        // Check for built-in post thumbnail. If it exists, return its url.
        if (has_post_thumbnail()) {
            $image_id = get_post_thumbnail_id();
            $image = wp_get_attachment_image_src($image_id, $size);
            $image_url = $image[0];
            return $image_url;
        }

        // Get the first image in the post. If one exists, return its url.
        global $post;
        $image_url = '';
        ob_start();
        ob_end_clean();
        preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
        if (! empty($matches[1][0])) {
            $image_url = $matches[1][0];
            return $image_url;
        }

        // Check for a gallery. If one exists, return the url of its first image.
        if (get_post_gallery()) {
            $gallery = get_post_gallery(get_the_ID(), false);
            $image_url = $gallery['src'][0];
            return $image_url;
        }

        if (get_theme_mod('featured')) {
            $image_url = get_theme_mod('featured');
            return $image_url;
        }

        // If we have gotten this far, no image is associated with the post, so we return the url of the default image.
        $image_url = get_template_directory_uri() . '/images/featured-default.jpg';
        return $image_url;
    }
endif;
