<?php
/**
 * Base Theme WP functions and definitions
 *
 * @package Base Theme WP
 */

/**
 *
 * Paths
 *
 * @since  1.0
 *
 */
if ( !defined( 'AA_THEME_DIR' ) ){
    define('AA_THEME_DIR', ABSPATH . 'wp-content/themes/' . get_template());
}

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

if ( ! function_exists( 'neat_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function base_setup() {


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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'neat' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'neat_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // base_setup
add_action( 'after_setup_theme', 'base_setup' );



/**
 * Styles and scripts
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/functions/scripts-styles.php')) {
    require_once( dirname(__FILE__).'/functions/scripts-styles.php' );
}


/**
 * Widgets
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/functions/widgets.php')) {
    require_once( dirname(__FILE__).'/functions/widgets.php' );
}


/**
 * Extras: Custom functions that act independently of the theme templates.
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/functions/extras.php')) {
    require_once( dirname(__FILE__).'/functions/extras.php' );
}


/**
 * Template Functions for this theme.
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/functions/template-functions.php')) {
    require_once( dirname(__FILE__).'/functions/template-functions.php' );
}

/**
 *  Options tehma
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/functions/options-thema.php')) {
    require_once( dirname(__FILE__).'/functions/options-thema.php' );
}

/**
 * Template Functions for Breadcrumbs.
 * wp_custom_breadcrumbs();
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/functions/breadcrumbs.php')) {
    require_once( dirname(__FILE__).'/functions/breadcrumbs.php' );
}

/**
 *  Functions Cadastro 
 *
 * @since 1.0.0
 */
if (file_exists(dirname(__FILE__).'/cadastro/functions-cadastro.php')) {
    require_once( dirname(__FILE__).'/cadastro/functions-cadastro.php' );
}


/**
 *
 * Get Post-Types for LeKidsClub
 */
$postTypes = glob(dirname(__FILE__) . '/post-types/*.php');
foreach ($postTypes as $pst) {
    require_once($pst);   
}


/**
 *
 * Get Taxonomies for LeKidsClub
 */
$taxonomies = glob(dirname(__FILE__) . '/post-types/taxonomies/*.php');
foreach ($taxonomies as $taxonomy) {
    require_once($taxonomy);   
}