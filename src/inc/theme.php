<?php
/**
 * UWC WordPress theme setup.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UWC
 */

if (! function_exists('uwc_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function uwc_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain('uwc', trailingslashit(get_template_directory()) . 'languages');
        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1440);

        // Enable support for custom header used for logo.
        add_theme_support('custom-header', array(
            'default-image'          => get_template_directory_uri() . '/images/header-uwc.png',
            'flex-width'             => true,
            'width'                  => 210,
            'flex-height'            => true,
            'height'                 => 32,
            'uploads'                => true,
        ));

        register_default_headers(array(
            'uwc' => array(
                'url'           => '%s/images/header-uwc.png',
                'thumbnail_url' => '%s/images/header-uwc-thumbnail.png',
                'description'   => __('UWC', 'uwc'),
            ),
            'uwcde' => array(
                'url'           => '%s/images/header-uwcde.png',
                'thumbnail_url' => '%s/images/header-uwcde-thumbnail.png',
                'description'   => __('UWC Germany', 'uwc'),
            ),
            'uwcat' => array(
                'url'           => '%s/images/header-uwcat.png',
                'thumbnail_url' => '%s/images/header-uwcat-thumbnail.png',
                'description'   => __('UWC Austria', 'uwc'),
            ),
        ));

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'uwc'),
            'social' => __('Social Links Menu', 'uwc'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'video',
            'link',
            'gallery',
        ));

        /*
         * Add support for Post Formats and Excerpts to pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_post_type_support
         */
        add_post_type_support('page', array( 'post-formats', 'excerpt' ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array( 'editor-style.css', uwc_fonts_url() ));
    }
endif;
add_action('after_setup_theme', 'uwc_setup');
