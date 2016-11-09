<?php
/*-----------------------------------------------------------------------------------*/
/*	Define Theme Vars
/*-----------------------------------------------------------------------------------*/

define( 'THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'THEME_URI', trailingslashit( get_template_directory_uri() ) );
define( 'THEME_NAME', 'Voice' );
define( 'THEME_SLUG', 'voice' );
define( 'THEME_VERSION', '2.0.1' );
define( 'THEME_OPTIONS', 'vce_settings' );
define( 'JS_URI', THEME_URI . 'js' );
define( 'CSS_URI', THEME_URI . 'css' );
define( 'IMG_DIR', THEME_DIR . 'images' );
define( 'IMG_URI', THEME_URI . 'images' );

if ( !isset( $content_width ) ) {
	$content_width = 810;
}

//error_reporting(E_ALL);

/*-----------------------------------------------------------------------------------*/
/*	After Theme Setup
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'vce_theme_setup' );

function vce_theme_setup() {

	/* Load frontend scripts and styles */
	add_action( 'wp_enqueue_scripts', 'vce_load_scripts' );

	/* Load admin scripts and styles */
	add_action( 'admin_enqueue_scripts', 'vce_load_admin_scripts' );

	/* Register sidebars */
	add_action( 'widgets_init', 'vce_register_sidebars' );

	/* Register menus */
	add_action( 'init', 'vce_register_menus' );

	/* Register widgets */
	add_action( 'widgets_init', 'vce_register_widgets' );

	/* Add thumbnails support */
	add_theme_support( 'post-thumbnails' );


	/* Add image sizes */
	$image_sizes = vce_get_image_sizes();
	$image_sizes_opt = vce_get_option( 'image_sizes' );
	foreach ( $image_sizes as $id => $size ) {
		if ( isset( $image_sizes_opt[$id] ) && $image_sizes_opt[$id] ) {
			add_image_size( $id, $size['w'], $size['h'], $size['crop'] );
		}
	}

	/* Add post formats support */
	add_theme_support( 'post-formats', array(
			'audio', 'gallery', 'image', 'video'
		) );

	/* Support for HTML5 */
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery' ) );

	/* Automatic Feed Links */
	add_theme_support( 'automatic-feed-links' );

	/* Declare WooCpommerce support */
	add_theme_support( 'woocommerce' );

	/* Add theme support for title tag (since wp 4.1) */
	add_theme_support( 'title-tag' );
}


/* Load frontend styles */
function vce_load_styles() {

	//Load fonts
	$fonts = vce_generate_font_links();
	if ( !empty( $fonts ) ) {
		foreach ( $fonts as $k => $font ) {
			wp_register_style( 'vce_font_'.$k, $font, false, THEME_VERSION, 'screen' );
			wp_enqueue_style( 'vce_font_'.$k );
		}
	}

	if( !vce_get_option('min_css') ){
		
		//Load main css file
		wp_register_style( 'vce_style', CSS_URI . '/main.css', false, THEME_VERSION, 'screen, print' );
		wp_enqueue_style( 'vce_style' );

		//Enqueue font awsm icons
		wp_register_style( 'vce_font_awesome', CSS_URI . '/font-awesome.min.css', false, THEME_VERSION, 'screen' );
		wp_enqueue_style( 'vce_font_awesome' );

		//Load responsive css
		if ( vce_get_option( 'responsive_mode' ) ) {
			wp_register_style( 'vce_responsive', CSS_URI . '/responsive.css', array( 'vce_style' ), THEME_VERSION, 'screen' );
			wp_enqueue_style( 'vce_responsive' );
		}

	} else {
		wp_register_style( 'vce_style', CSS_URI . '/min.css', false, THEME_VERSION, 'screen, print' );
		wp_enqueue_style( 'vce_style' );
	}

	//Append dynamic css
	$vce_dynamic_css = vce_generate_dynamic_css();
	wp_add_inline_style( 'vce_style', $vce_dynamic_css );

	//WooCommerce style
	if( vce_is_woocommerce_active() ){
		wp_register_style( 'vce-woocommerce', CSS_URI . '/vce-woocommerce.css', array( 'vce_style' ), THEME_VERSION, 'screen, print' );
		wp_enqueue_style( 'vce-woocommerce' );	
	}

	//bbPress style
	if( vce_is_bbpress_active() ){
		wp_register_style( 'vce-bbpress', CSS_URI . '/vce-bbpress.css', array( 'vce_style' ), THEME_VERSION, 'screen, print' );
		wp_enqueue_style( 'vce-bbpress' );	
	}

	//Load RTL css
	if ( vce_get_option( 'rtl_mode' ) ) {

		global $vce_rtl;

		$vce_rtl = true;

		//Check if current language is excluded from RTL
		$rtl_lang_skip = explode( ",", vce_get_option( 'rtl_lang_skip' ) );
		if ( !empty( $rtl_lang_skip )  ) {
			$locale = get_locale();
			if ( in_array( $locale, $rtl_lang_skip ) ) {
				$vce_rtl = false;
			}
		}

		if ( $vce_rtl ) {
			wp_register_style( 'vce_rtl', CSS_URI . '/rtl.css', array( 'vce_style' ), THEME_VERSION, 'screen' );
			wp_enqueue_style( 'vce_rtl' );
		}
	}

	//Do not load font awesome from our shortcodes plugin
	wp_dequeue_style( 'mks_shortcodes_fntawsm_css' );

}


/* Load frontend scripts */
function vce_load_scripts() {

	vce_load_styles();

	if( !vce_get_option('min_js') ){
		wp_enqueue_script( 'vce_images_loaded', JS_URI . '/imagesloaded.pkgd.min.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_owl_slider', JS_URI . '/owl.carousel.min.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_sticky_kit', JS_URI . '/jquery.sticky-kit.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_match_height', JS_URI . '/jquery.matchHeight.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_fitvid', JS_URI . '/jquery.fitvids.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_responsivenav', JS_URI . '/jquery.sidr.min.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_magnific_popup', JS_URI . '/jquery.magnific-popup.min.js', array( 'jquery' ), THEME_VERSION, true );
		wp_enqueue_script( 'vce_custom', JS_URI . '/custom.js', array( 'jquery' ), THEME_VERSION, true );
	} else {
		wp_enqueue_script( 'vce_custom', JS_URI . '/min.js', array( 'jquery' ), THEME_VERSION, true );
	}

	$vce_js_settings = vce_get_js_settings();
	wp_localize_script( 'vce_custom', 'vce_js_settings', $vce_js_settings );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/* Load admin scripts and styles */
function vce_load_admin_scripts() {

	global $pagenow, $typenow;

	//Load amdin css
	wp_register_style( 'vce_admin_css', CSS_URI . '/admin.css', false, THEME_VERSION, 'screen' );
	wp_enqueue_style( 'vce_admin_css' );

	//Load category JS
	if ( in_array( $pagenow, array('edit-tags.php', 'term.php')) && isset( $_GET['taxonomy'] ) && $_GET['taxonomy'] == 'category' ) {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'vce_category', JS_URI.'/metaboxes-category.js', array( 'jquery', 'wp-color-picker' ), THEME_VERSION );
	}

	//Load post & page metaboxes css and js
	if ( $pagenow == 'post.php' || $pagenow == 'post-new.php' ) {
		if ( $typenow == 'post' ) {
			wp_enqueue_script( 'vce_post_metaboxes', JS_URI.'/metaboxes-post.js', array( 'jquery' ), THEME_VERSION );
		} elseif ( $typenow == 'page' ) {
			wp_enqueue_script( 'vce_post_metaboxes', JS_URI.'/metaboxes-page.js', array( 'jquery' ), THEME_VERSION );
		}
	}

}

/* Support localization */
load_theme_textdomain( THEME_SLUG, THEME_DIR . '/languages' );


/*-----------------------------------------------------------------------------------*/
/*	Theme Includes
/*-----------------------------------------------------------------------------------*/


/* Helpers and utility functions */
require_once 'include/helpers.php';

/* Modules functions */
require_once 'include/modules.php';

/* Menus */
require_once 'include/menus.php';

/* Sidebars */
require_once 'include/sidebars.php';

/* Widgets */
require_once 'include/widgets.php';

/* Add custom metaboxes for standard post types */
require_once 'include/metaboxes.php';

/* Snippets (modify/add some special features to this theme) */
require_once 'include/snippets.php';

/* Simple mega menu solution */
require_once 'include/mega-menu.php';

/* Include AJAX action handlers */
require_once locate_template('/include/admin/admin-ajax.php');

/* Include plugins (required or recommended for this theme) */
require_once 'include/plugins.php';

/* Theme Options */
require_once 'include/options.php';

/*-----------------------------------------------------------------------------------*/
/*	Guest Author Name with Custom Fields - Added by Marc S
/*-----------------------------------------------------------------------------------*/

add_filter( 'the_author', 'guest_author_name' );
add_filter( 'get_the_author_display_name', 'guest_author_name' );

function guest_author_name( $name ) {
global $post;

$author = get_post_meta( $post->ID, 'guest-author', true );

if ( $author )
$name = $author;

return $name;
}

?>