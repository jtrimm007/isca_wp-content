<?php
/**
 * ISCA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ISCA
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'isca_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function isca_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ISCA, use a find and replace
		 * to change 'isca' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'isca', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'isca' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'isca_custom_background_args',
				array(
					'default-color' => 'ffffff',
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
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'isca_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function isca_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'isca_content_width', 640 );
}
add_action( 'after_setup_theme', 'isca_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function isca_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'isca' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'isca' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'isca_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function isca_scripts() {
	wp_enqueue_style( 'isca-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'isca-style', 'rtl', 'replace' );

	//wp_enqueue_script( 'isca-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'isca_scripts' );

/*************** LOAD THIS STUFF *************** */
/*
add_action( 'wp_enqueue_scripts', 'isca_theme_enqueue_styles' );
function isca_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}*/

/* Add additional 3rd Party stylesheets that ISC main site uses */
/* Google Fonts */
add_action( 'wp_enqueue_scripts', 'isc_add_googlefonts' );
function isc_add_googlefonts() {
    wp_enqueue_style( 'googlefonts','//fonts.googleapis.com/css?family=Merriweather%3A400%2C700%7CRoboto%3A300%2C400%2C700&ver=1.0');
//fonts.googleapis.com/css?family=Merriweather%3A400%2C700%7CRoboto%3A300%2C400%2C700&ver=1.0
}

/* Font Awesome 5 */
add_action( 'wp_enqueue_scripts', 'isc_add_font_awesome5' );
function isc_add_font_awesome5() {
    wp_enqueue_style( 'font-awesome', '//use.fontawesome.com/releases/v5.0.6/css/all.css?ver=5.0.6' );
}

/* PicNic.css */

/* LOCAL ISCA site-specific */
add_action( 'wp_enqueue_scripts', 'isca_add_styles' );
function isca_add_styles() {
	wp_enqueue_style( 'styles', 'https://cdn.jsdelivr.net/npm/picnic' );
    wp_enqueue_style( 'styles', get_stylesheet_directory_uri() . '/style.css' );
}

/* Custom User Role: Performer (technically a Subscriber role, can only edit their profile page) */
add_role( 'performer', __( 'Performer' ), array( 'read' => true ) );


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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

