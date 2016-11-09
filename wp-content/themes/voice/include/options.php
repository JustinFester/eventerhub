<?php

/* Load the embedded Redux Framework */

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/options/ReduxCore/framework.php' ) ) {
    require_once dirname( __FILE__ ) . '/options/ReduxCore/framework.php';
}

if ( ! class_exists( 'Redux' ) ) {
    return;
}

/**
 * Redux params
 */

$opt_name = 'vce_settings';

$args = array(
    'opt_name'             => $opt_name,
    'display_name'         => sprintf( __('Voice Options%sTheme Documentation%s', THEME_SLUG),'<a href="http://demo.mekshq.com/voice/documentation" target="_blank">','</a>'),
    'display_version'      => vce_get_update_notification(),
    'menu_type'            => 'menu',
    'allow_sub_menu'       => true,
    'menu_title'           => __( 'Theme Options', THEME_SLUG ),
    'page_title'           => __( 'Voice Options', THEME_SLUG ),
    'google_api_key'       => 'AIzaSyDHZdAin5P3eou7euXXiEN1k075buveWT4',
    'google_update_weekly' => true,
    'async_typography'     => true,
    'admin_bar'            => true,
    'admin_bar_icon'       => 'dashicons-admin-generic',
    'admin_bar_priority'   => '100',
    'global_variable'      => '',
    'dev_mode'             => false,
    'update_notice'        => false,
    'customizer'           => false,
    'allow_tracking' => false,
    'ajax_save' => false,
    'page_priority'        => '27.11',
    'page_parent'          => 'themes.php',
    'page_permissions'     => 'manage_options',
    'menu_icon'            => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCAzMDAgMzAwIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzMDAgMzAwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+PGc+PHBhdGggZD0iTTIwOS40LDYxLjZsLTE5LjctM1YzOS41aDY5djE5LjFMMjQxLjIsNjFsLTczLjQsMTk3LjVoLTMxLjIiLz48L2c+PGc+PHBhdGggZD0iTTE0NS44LDIwMWwtMTQuOSw0MC4yTDU4LDYxbC0xNy42LTIuNFYzOS41aDY5djE5LjFsLTE5LjcsMyIvPjwvZz48L3N2Zz4=',
    'last_tab'             => '',
    'page_icon'            => 'icon-themes',
    'page_slug'            => 'vce_options',
    'save_defaults'        => true,
    'default_show'         => false,
    'default_mark'         => '',
    'show_import_export'   => true,
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => false,
    'output_tag'           => true,
    'database'             => '',
    'system_info'          => false,
);

$GLOBALS['redux_notice_check'] = 1;

/* Documentation link */
$args['admin_bar_links'][] = array(
    'id'    => 'vce-docs',
    'href'  => 'http://demo.mekshq.com/voice/documentation',
    'title' => __( 'Documentation', THEME_SLUG ),
);


/* Footer social icons */
$args['share_icons'][] = array(
    'url'   => 'https://www.facebook.com/mekshq',
    'title' => 'Like us on Facebook',
    'icon'  => 'el-icon-facebook'
);
$args['share_icons'][] = array(
    'url'   => 'http://twitter.com/mekshq',
    'title' => 'Follow us on Twitter',
    'icon'  => 'el-icon-twitter'
);


$args['intro_text'] = '';
$args['footer_text'] = '';

Redux::setArgs( $opt_name, $args );


/* Initialize options/sections */
include_once 'sections.php';


/* Append custom css to redux framework */
if ( !function_exists( 'vce_redux_custom_css' ) ):
    function vce_redux_custom_css() {
        wp_register_style( 'vce-redux-custom-css', CSS_URI.'/theme-options-custom.css', array( 'redux-admin-css' ), THEME_VERSION, 'all' );
        wp_enqueue_style( 'vce-redux-custom-css' );
    }
endif;

add_action( 'redux/page/vce_settings/enqueue', 'vce_redux_custom_css' );



/* Filter demo importer description text */
if ( !function_exists( 'vce_wbc_filter_desc' ) ):
    function vce_wbc_filter_desc( $description ) {

        $message = __( 'Use this section to import content from Voice demo website. Note: Images on demo website can be only used for demo purposes and they are not included in demo package.', THEME_SLUG );
        return $message;
    }
endif;

add_filter( 'wbc_importer_description', 'vce_wbc_filter_desc' );


/* Filter title of demo importer preview */
if ( !function_exists( 'vce_wbc_filter_demo_title' ) ):
    function vce_wbc_filter_demo_title( $title ) {
        return __( 'Voice Demo Content', THEME_SLUG );
    }
endif;

add_filter( 'wbc_importer_directory_title', 'vce_wbc_filter_demo_title' );


/* Change demo directory path */
if ( !function_exists( 'vce_wbc_change_demo_directory_path' ) ):
    function vce_wbc_change_demo_directory_path( $demo_directory_path ) {

        $demo_directory_path = str_replace( '\\', '/', THEME_DIR.'demo/');

        return $demo_directory_path;

    }
endif;

add_filter( 'wbc_importer_dir_path', 'vce_wbc_change_demo_directory_path' );

/* Assign menus and home page after demo import */
if ( !function_exists( 'vce_wbc_after_import' ) ) :
    function vce_wbc_after_import( $demo_active_import , $demo_directory_path ) {

        /* Set Menus */

        $top_menu = get_term_by( 'name', 'Top Bar Menu', 'nav_menu' );
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
        $social_menu = get_term_by( 'name', 'Social Menu', 'nav_menu' );
        $fourofour_menu = get_term_by( 'name', '404 Menu', 'nav_menu' );
        $menus = array();

        if ( isset( $top_menu->term_id ) ) {
            $menus['vce_top_navigation_menu'] = $top_menu->term_id;
        }

        if ( isset( $main_menu->term_id ) ) {
            $menus['vce_main_navigation_menu'] = $main_menu->term_id;
        }

        if ( isset( $footer_menu->term_id ) ) {
            $menus['vce_footer_menu'] = $footer_menu->term_id;
        }

        if ( isset( $social_menu->term_id ) ) {
            $menus['vce_social_menu'] = $social_menu->term_id;
        }

        if ( isset( $fourofour_menu->term_id ) ) {
            $menus['vce_404_menu'] = $fourofour_menu->term_id;
        }

        if ( !empty( $menus ) ) {
            set_theme_mod( 'nav_menu_locations', $menus );
        }


        /* Home Page */

        $home_page_title = 'Home';

        $page = get_page_by_title( $home_page_title );

        if ( isset( $page->ID ) ) {
            update_option( 'page_on_front', $page->ID );
            update_option( 'show_on_front', 'page' );
        }

        /* Add sidebars from theme options */

        delete_option('sidebars_widgets');
    
        for ( $i = 1; $i <= 5; $i++ ) {
            register_sidebar(
                array(
                    'id' => 'vce_sidebar_'.$i,
                    'name' => __( 'Sidebar', THEME_SLUG ).' '.$i,
                    'description' => '',
                    'before_widget' => '<div id="%1$s" class="widget %2$s">',
                    'after_widget' => '</div>',
                    'before_title' => '<h4 class="widget-title"><span>',
                    'after_title' => '</span></h4>'
                )
            );
        }
        
    }

endif;


add_action( 'wbc_importer_after_theme_options_import', 'vce_wbc_after_import', 10, 2 );

/* Remove redux framework admin page to avoid confusion of our users and unnecesarry support questions */
if ( !function_exists( 'vce_remove_redux_page' ) ):
    function vce_remove_redux_page() {
        remove_submenu_page( 'tools.php', 'redux-about' );
    }
endif;

add_action( 'admin_menu', 'vce_remove_redux_page', 99 );


?>