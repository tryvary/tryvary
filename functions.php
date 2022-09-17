<?php
/**
 * TryVary functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TryVary
 */

if ( ! defined( '_TRYVARY_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_TRYVARY_VERSION', '1.0.0' );
}
define('TRYVARY_BLOG_DIR', get_template_directory().'/');
define('TRYVARY_BLOG_URI', get_template_directory_uri().'/');

if ( ! function_exists( 'tryvary_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tryvary_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TryVary, use a find and replace
		 * to change 'tryvary' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tryvary', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'tryvary-thumb', 796, 450, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'tryvary' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( "html5", array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Set up the WordPress core custom background feature.
		add_theme_support(
			"custom-background",
			apply_filters(
				'tryvary_custom_background_args',
				array(
					'default-color' => 'fbfbfb',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 150;
		$logo_height = 40;

		add_theme_support(
			"custom-logo",
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);


		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for experimental link color control.
		add_theme_support( 'experimental-link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

	}
endif;
add_action( 'after_setup_theme', 'tryvary_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $tryvary_content_width
 */
function tryvary_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tryvary_content_width', 900 );
}
add_action( 'after_setup_theme', 'tryvary_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tryvary_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'tryvary' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'tryvary' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'tryvary_widgets_init' );

/**
 * Register custom fonts.
 */
function tryvary_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
 
	$fonts[] = 'PT Serif:400';
	$fonts[] = 'Roboto:700';
 
	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'display' => urlencode( "swap" ),
		), 'https://fonts.googleapis.com/css' );
	}
	return $fonts_url;
}
/**
 * Enqueue scripts and styles.
 */
function tryvary_scripts() {

	wp_enqueue_style( 'tryvary-google-fonts', tryvary_fonts_url(), array(), null );
	wp_enqueue_style( 'tryvary-style', get_stylesheet_uri(), array(), _TRYVARY_VERSION );
	
	wp_enqueue_script( 'tryvary-bootstrap', TRYVARY_BLOG_URI.'assets/js/bootstrap.bundle.min.js', array(), null);
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tryvary_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


add_filter( 'tryvary_nav_menu_link_attributes', 'tryvary_bootstrap5_dropdown_fix' );
function tryvary_bootstrap5_dropdown_fix( $atts ) {
    if ( array_key_exists( 'data-toggle', $atts ) ) {
        unset( $atts['data-toggle'] );
        $atts['data-bs-toggle'] = 'dropdown';
    }
    return $atts;
}