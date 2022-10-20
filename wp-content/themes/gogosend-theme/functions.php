<?php
/**
 * gogosend-theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gogosend-theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function gogosend_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on gogosend-theme, use a find and replace
		* to change 'gogosend-theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'gogosend-theme', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'gogosend-theme' ),
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
			'gogosend_theme_custom_background_args',
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
add_action( 'after_setup_theme', 'gogosend_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gogosend_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'gogosend_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'gogosend_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function gogosend_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'gogosend-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'gogosend-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'gogosend_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function gogosend_theme_scripts() {
	wp_enqueue_style( 'gogosend-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'gogosend-theme-style', 'rtl', 'replace' );

	wp_enqueue_script( 'gogosend-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gogosend_theme_scripts' );

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

function add_file_types_to_uploads($file_types){
	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );
	return $file_types;
	}
add_filter('upload_mimes', 'add_file_types_to_uploads');

function load_scripts(){
    //Load scripts:
    wp_enqueue_script('jquery'); # Loading the WordPress bundled jQuery version.
    //may add more scripts to load like jquery-ui
}
add_action('wp_enqueue_scripts', 'load_scripts');

function acf_portfolio_item_block() {
	
	if( function_exists('acf_register_block') ) {
		
		acf_register_block(array(
			'name'				=> 'slider-gogomedia',
			'title'				=> __('Slider'),
			'description'		=> __('Slider'),
			'render_template'	=> 'template-parts/blocks/slider/slider.php',
			'category'			=> 'layout',
			'icon'				=> 'slides',
			'keywords'			=> array( 'slider' ),
		));
	}
}

add_action('acf/init', 'acf_portfolio_item_block');

function my_login_logo_one() { 
	?> 
	<style type="text/css"> 
	body.login div#login h1 a {
	 background-image: url(https://kemuri.codes/wp-content/uploads/2021/12/logo_kemuri_codes-1.svg);
	padding-bottom: 30px; 
	} 
	</style>
	 <?php 
	} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
	

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
  add_filter('upload_mimes', 'cc_mime_types');

  function wpb_remove_version() {
	return '';
	}
	add_filter('the_generator', 'wpb_remove_version');

	function wpb_custom_logo() {
	  echo '
	  <style type="text/css">
	  #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
	  background-image: url(' . get_bloginfo('stylesheet_directory') . '/images/kemuri-admin-wordpress.png) !important;
	  background-position: 0 0;
	  color:rgba(0, 0, 0, 0);
	  }
	  #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
	  background-position: 0 0;
	  }
	  </style>
	  ';
	  }
	  //hook into the administrative header output
	  add_action('wp_before_admin_bar_render', 'wpb_custom_logo');
	   
	   
function remove_footer_admin () {
 
			echo '<p>Autor: <b>KemuriCodes</b></p>';
			 
			}
			 
			add_filter('admin_footer_text', 'remove_footer_admin');

			function fb_disable_feed() {
				}
				 
				add_action('do_feed', 'fb_disable_feed', 1);
				add_action('do_feed_rdf', 'fb_disable_feed', 1);
				add_action('do_feed_rss', 'fb_disable_feed', 1);
				add_action('do_feed_rss2', 'fb_disable_feed', 1);
				add_action('do_feed_atom', 'fb_disable_feed', 1);
	
add_filter('xmlrpc_enabled', '__return_false');

remove_action('wp_head', 'wp_generator');

add_filter( 'login_headertext', 'customize_login_headertext' );

function customize_login_headertext( $headertext ) {
  $headertext = esc_html__( 'kemuri login page', 'plugin-textdomain' );
  return $headertext;
}

//remove wp version
function theme_remove_version() {
	return '';
}

add_filter('the_generator', 'theme_remove_version');

add_filter('admin_footer_text', 'remove_footer_admin');

// Remove default Dashboard widgets
if ( !function_exists( 'disable_default_dashboard_widgets' ) ) {
	function disable_default_dashboard_widgets() {

		//remove_meta_box('dashboard_right_now', 'dashboard', 'core');
		remove_meta_box('dashboard_activity', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
		remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
		remove_meta_box('dashboard_plugins', 'dashboard', 'core');

		remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
		remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
		remove_meta_box('dashboard_primary', 'dashboard', 'core');
		remove_meta_box('dashboard_secondary', 'dashboard', 'core');
	}
}
add_action('admin_menu', 'disable_default_dashboard_widgets');

remove_action('welcome_panel', 'wp_welcome_panel');

// Disable the emoji's
if ( !function_exists( 'disable_emojis' ) ) {
	function disable_emojis() {
		remove_action('wp_head', 'print_emoji_detection_script', 7);
		remove_action('admin_print_scripts', 'print_emoji_detection_script');
		remove_action('wp_print_styles', 'print_emoji_styles');
		remove_action('admin_print_styles', 'print_emoji_styles');
		remove_filter('the_content_feed', 'wp_staticize_emoji');
		remove_filter('comment_text_rss', 'wp_staticize_emoji');
		remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

		// Remove from TinyMCE
		add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	}
}
add_action('init', 'disable_emojis');

// Filter out the tinymce emoji plugin.
function disable_emojis_tinymce($plugins) {
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

add_action('admin_head', 'custom_logo_guttenberg');

if ( !function_exists( 'custom_logo_guttenberg' ) ) {
	function custom_logo_guttenberg() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('stylesheet_directory').
		'/admin-custom.css" />';
	}
}
add_action( 'admin_init', 'my_remove_menu_pages' );

function my_remove_menu_pages() {
  remove_menu_page( 'edit.php?post_type=team' );
  remove_menu_page( 'edit.php?post_type=clients' );
  remove_menu_page( 'edit.php?post_type=testimonials' );
  remove_menu_page( 'laurits_core_dashboard' );
  remove_menu_page( 'laurits_core_menu' );
  }
	// Usuń funkcje
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'parent_post_rel_link', 10);
remove_action('wp_head', 'adjacent_posts_rel_link', 10);
// --------------------------------------------
	// Usuń Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// --------------------------------------------
	// Wyłącz pomiar stanu witryny
add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
		wp_deregister_script('heartbeat');
}
// --------------------------------------------
// Załaduj JS asynchronicznie
if (!is_admin()){
	function add_defer_attribute($tag, $handle) {
		return str_replace(' src', ' defer src', $tag);	
	}
	add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);
}
// --------------------------------------------
	function defer_parsing_of_js($url)
{
if (is_admin()) return $url; //don't break WP Admin
if (false === strpos($url, '.js')) return $url;
if (strpos($url, 'jquery.js')) return $url;
return str_replace(' src', ' defer src', $url);
}
add_filter('script_loader_tag', 'defer_parsing_of_js', 10);

add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );

function my_set_image_meta_upon_image_upload( $post_ID ) {

// Check if uploaded file is an image, else do nothing

if ( wp_attachment_is_image( $post_ID ) ) {

	$my_image_title = get_post( $post_ID )->post_title;

	// Sanitize the title:  remove hyphens, underscores & extra spaces:
	$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

	// Sanitize the title:  capitalize first letter of every word (other letters lower case):
	$my_image_title = ucwords( strtolower( $my_image_title ) );

	// Create an array with the image meta (Title, Caption, Description) to be updated
	// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
	$my_image_meta = array(
		'ID'		=> $post_ID,			// Specify the image (ID) to be updated
		'post_title'	=> $my_image_title,		// Set image Title to sanitized title
		'post_content'	=> $my_image_title,		// Set image Description (Content) to sanitized title
	);

	// Set the image Alt-Text
	update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title );

	// Set the image meta (e.g. Title, Excerpt, Content)
	wp_update_post( $my_image_meta );

} 
}

function my_custom_pagination_base() {
global $wp_rewrite;
$wp_rewrite->pagination_base = 's'; //where new-slug is the slug you want to use 
$wp_rewrite->flush_rules();
}
add_action('init', 'my_custom_pagination_base', 1);