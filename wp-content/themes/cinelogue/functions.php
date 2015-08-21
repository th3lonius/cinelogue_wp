<?php
/**
 * cinelogue functions and definitions
 *
 * @package cinelogue
 */

if ( ! function_exists( 'cinelogue_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_filter( 'jpeg_quality', create_function( '', 'return 80;' ) );

function custom_excerpt_length( $length ) {
	return 16;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function posts_orderby_lastname ($orderby_statement) 
{
  $orderby_statement = "RIGHT(post_title, LOCATE(' ', REVERSE(post_title)) - 1) ASC";
    return $orderby_statement;
}

register_nav_menus(
    array(
    'primary-menu' => __( 'Primary Menu' ),
    'secondary-menu' => __( 'Secondary Menu' )
    )
);

/*-----------------------------------------------------------------------------------*/
/*  enable svg images in media uploader
/*-----------------------------------------------------------------------------------*/
function cc_mime_types( $mimes ){
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

add_action( 'init', 'issues_post_type' );

function issues_post_type() {

	register_post_type( 'issues', array(
		'labels' => array(
			'name' => __('Issues'),
			'singular_name' => __('Issue')
			),
		'public' => true,
        'capability_type' => 'page',
		'show_ui' => true,
        'menu_icon' => 'dashicons-video-alt',
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
		'rewrite' => array(
			'slug' => 'issues',
			'with_front' => false
			),
		'has_archive' => true
	) );
}

/* Plugin Name: jQuery to the footer! */
add_action( 'wp_enqueue_scripts', 'wcmScriptToFooter', 9999 );
function wcmScriptToFooter()
{
    global $wp_scripts;
    $wp_scripts->add_data( 'jquery', 'group', 1 );
}

function theme_js() {
    wp_register_script( 'main', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '', true );
    wp_register_script( 'superslides', get_template_directory_uri() . '/js/superslides.js', array( 'jquery' ), '', true );
    wp_register_script( 'flowtype', get_template_directory_uri() . '/js/flowtype.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'main' );
    wp_enqueue_script( 'superslides' );
    wp_enqueue_script( 'flowtype' );
}

add_action( 'wp_enqueue_scripts', 'theme_js');

function cinelogue_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on cinelogue, use a find and replace
	 * to change 'cinelogue' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cinelogue', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // cinelogue_setup
add_action( 'after_setup_theme', 'cinelogue_setup' );