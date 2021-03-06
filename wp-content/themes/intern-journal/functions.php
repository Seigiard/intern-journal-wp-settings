<?php
/**
 * Intern Journal functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Intern_Journal
 */

if ( ! function_exists( 'intern_journal_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function intern_journal_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Intern Journal, use a find and replace
		 * to change 'intern-journal' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'intern-journal', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'intern-journal' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'intern_journal_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'intern_journal_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function intern_journal_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'intern_journal_content_width', 640 );
}
add_action( 'after_setup_theme', 'intern_journal_content_width', 0 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function intern_journal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Anounce', 'intern-journal' ),
		'id'            => 'footer-anounce',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copyright', 'intern-journal' ),
		'id'            => 'footer-copyright',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Text', 'intern-journal' ),
		'id'            => 'footer-text',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'intern_journal_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function intern_journal_scripts() {
	wp_enqueue_style( 'intern-journal-style-normalize', get_template_directory_uri() . '/styles/normalize.css?20180512' );
	wp_enqueue_style( 'intern-journal-style-main', get_template_directory_uri() . '/styles/main.css?20180512' );
	wp_enqueue_style( 'intern-journal-style-article', get_template_directory_uri() . '/styles/article.css?20180512' );
	wp_enqueue_style( 'intern-journal-style-helvetica', get_template_directory_uri() . '/styles/helvetica/font.css?20180512' );

	wp_enqueue_script( 'intern-journal-vendor-jquery', get_template_directory_uri() . '/js/vendor/jquery-3.2.1.min.js', array(), '20151215', true );
	wp_enqueue_script( 'intern-journal-vendor-resizeObserver', get_template_directory_uri() . '/js/vendor/resizeObserver.js', array(), '20151215', true );
	wp_enqueue_script( 'intern-journal-plugins', get_template_directory_uri() . '/js/plugins.js', array(), '20151215', true );
	wp_enqueue_script( 'intern-journal-main', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );

	// wp_enqueue_script( 'intern-journal-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'intern-journal-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
}
function intern_journal_likely_scripts() {
	wp_enqueue_style( 'intern-journal-likely-style', get_template_directory_uri() . '/js/vendor/likely/likely.css' );
	wp_enqueue_script( 'intern-journal-likely-script', get_template_directory_uri() . '/js/vendor/likely/likely.js', array(), '20151215', true );
}
add_action( 'wp_enqueue_scripts', 'intern_journal_scripts' );
add_action( 'wp_enqueue_scripts', 'intern_journal_likely_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Typography and other stuffs
 */
require get_template_directory() . '/inc/beautypo/index.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }