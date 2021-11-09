<?php
/**
 * Coulson functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coulson
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'coulson_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function coulson_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on coulson, use a find and replace
		 * to change 'coulson' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'coulson', get_template_directory() . '/languages' );

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
				'menu-1'    => esc_html__( 'Primary', 'coulson' ),
				'secondary' => esc_html__( 'Footer Menu', 'coulson' ),
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
				'coulson_custom_background_args',
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
add_action( 'after_setup_theme', 'coulson_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coulson_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coulson_content_width', 640 );
}
add_action( 'after_setup_theme', 'coulson_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coulson_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coulson' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coulson' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'coulson_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coulson_scripts() {
	wp_enqueue_style(
		'coulson-googlefonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'coulson-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'coulson-code-style', get_template_directory_uri() . '/code-styles/an-old-hope.min.css', array(), _S_VERSION );

	wp_style_add_data( 'coulson-style', 'rtl', 'replace' );

	wp_enqueue_script( 'coulson-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'coulson-accordion', get_template_directory_uri() . '/js/accordion.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'coulson-code-highlight', get_template_directory_uri() . '/js/highlight.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'coulson-highlight-init', get_template_directory_uri() . '/js/highlight-init.js', array(), _S_VERSION, true );

	if ( is_archive() ) :
		wp_enqueue_script( 'coulson-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'coulson-isotope', 'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'coulson-isotope-init', get_template_directory_uri() . '/js/isotope-init.js', array(), _S_VERSION, true );
	endif;

	if ( is_front_page() ) :
		wp_enqueue_script( 'coulson-jquery', 'https://code.jquery.com/jquery-3.6.0.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'coulson-gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'coulson-gsap-text', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/TextPlugin.min.js', array(), _S_VERSION, true );

		wp_enqueue_script( 'coulson-gsap-settings', get_template_directory_uri() . '/js/gsap-settings.js', array(), _S_VERSION, true );
	endif;

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coulson_scripts' );

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

/** Requiring file that has custom post type functions. */
require get_template_directory() . '/inc/cpt-taxonomy.php';

/** Adding taxonomy slug as class name for isotope grid itms of projects archive page. */
function isotope_classes( $id ) {
	$terms = wp_get_post_terms( $id, 'coulson-project-type' );
	foreach ( $terms as $term ) :
		echo esc_html( $term->slug . ' ' );
	endforeach;
}
