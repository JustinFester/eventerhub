<?php

//Generate option array for image sizes
$image_sizes = vce_get_image_sizes();
$image_sizes_opt = array();
$image_sizes_def = array();
foreach ( $image_sizes as $id => $size ) {
    $image_sizes_opt[$id] = $size['title'];
    $image_sizes_def[$id] = true;
}


/* General */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-wrench',
        'title'     => __( 'General', THEME_SLUG ),
        'desc'     => __( 'These are general theme settings', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'responsive_mode',
                'type'      => 'switch',
                'title'     => __( 'Responsive mode', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to make this theme compatible with smart phones and tablets or always use fixed width', THEME_SLUG ),
                'default'   => true,
            ),

            array(
                'id' => 'rtl_mode',
                'type' => 'switch',
                'title' => __( 'RTL mode (right to left)', THEME_SLUG ),
                'subtitle' => __( 'Enable this option if you are using right to left writing/reading', THEME_SLUG ),
                'default' => false
            ),
            array(
                'id' => 'rtl_lang_skip',
                'type' => 'text',
                'title' => __( 'Skip RTL for specific language(s)', THEME_SLUG ),
                'subtitle' => __( 'Paste specific WordPress language <a href="http://wpcentral.io/internationalization/" target="_blank">locale code</a> to exclude it from RTL mode', THEME_SLUG ),
                'desc' => __( 'i.e. If you are using Arabic and English versions on the same WordPress installation you should put "en_US" in this field and its version will not be displayed as RTL. Note: To exclude multiple languages, separate by comma: en_US, de_DE', THEME_SLUG ),
                'default' => '',
                'required' => array( 'rtl_mode', '=', true )
            ),

            array(
                'id' => 'add_sidebars',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Additional sidebars', THEME_SLUG ),
                'subtitle' => sprintf( __( 'Specify number of additional sidebars you want to use in this theme. You can manage your sidebars via <a href="%s">Appearance -> Widgets</a>', THEME_SLUG ), admin_url( 'widgets.php' ) ),
                'desc' => __( 'Note: Leave empty for no additional sidebars.', THEME_SLUG ),
                'default' => 5,
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'section_branding',
                'type'      => 'section',
                'title'     => __( 'Branding', THEME_SLUG ),
                'subtitle'  => __( 'These are your branding options', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id'        => 'default_fimg',
                'type'      => 'media',
                'url'       => true,
                'title'     => __( 'Default featured image', THEME_SLUG ),
                'subtitle'      => __( 'Upload your default featured image/placeholder which will be displayed for posts which do not have featured image set', THEME_SLUG ),
                'desc'  => __( 'Note: Allowed extensions are .jpg and .png', THEME_SLUG ),
                'default'   => array( 'url' => IMG_URI.'/voice_default.jpg' ),
            ),

            array(
                'id' => 'favicon',
                'type' => 'media',
                'url' => true,
                'title' => __( 'Favicon', THEME_SLUG ),
                'subtitle' => __( 'Upload your favicon here', THEME_SLUG ),
                'desc' => __( 'Supported formats: .ico .gif .png', THEME_SLUG ),
                'default' => array( 'url' => THEME_URI.'favicon.ico' )
            ),
            array(
                'id' => 'apple_touch_icon',
                'type' => 'media',
                'url' => true,
                'title' => __( 'Apple Touch Icon', THEME_SLUG ),
                'subtitle' => __( 'Upload icon for the Apple touch', THEME_SLUG ),
                'desc' => __( 'Size: 77x77', THEME_SLUG ),
                'default'   => array( 'url' => '' )

            ),
            array(
                'id' => 'metro_icon',
                'type' => 'media',
                'url' => true,
                'title' => __( 'Metro Icon', THEME_SLUG ),
                'subtitle' => __( 'Upload icon for the Metro interface', THEME_SLUG ),
                'desc' => __( 'Size: 144x144', THEME_SLUG ),
                'default'   => array( 'url' => '' )
            ),


            array(
                'id'        => 'section_advanced',
                'type'      => 'section',
                'title'     => __( 'Advanced', THEME_SLUG ),
                'subtitle'  => __( 'These are options for advanced users only. Use it with caution', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id'       => 'additional_css',
                'type'     => 'ace_editor',
                'title'    => __( 'Additional CSS', THEME_SLUG ),
                'subtitle' => __( 'Use this field to write or paste CSS code and modify default theme styling', THEME_SLUG ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'default'  => ''
            ),

            array(
                'id'       => 'additional_js',
                'type'     => 'ace_editor',
                'title'    => __( 'Additional JavaScript', THEME_SLUG ),
                'subtitle' => __( 'Use this field to write or paste additional JavaScript code to this theme', THEME_SLUG ),
                'desc' => __( 'Note: Use for clean JavaScript execution code without "script" tags', THEME_SLUG ),
                'mode'     => 'javascript',
                'theme'    => 'monokai',
                'default'  => ''
            ),

            array(
                'id'       => 'ga',
                'type'     => 'ace_editor',
                'title'    => __( 'Google Analytics tracking code', THEME_SLUG ),
                'subtitle' => __( 'Paste your google analytics tracking code (or any other javascript related tracking code)', THEME_SLUG ),
                'desc' => __( 'Note: Use with included "script" tags around the code', THEME_SLUG ),
                'mode'     => 'text',
                'theme'    => 'monokai',
                'default'  => ''
            ),

            array(
                'id'        => 'image_sizes',
                'type'      => 'checkbox',
                'multi'     => true,
                'title'     => __( 'Generate image sizes', THEME_SLUG ),
                'subtitle'  => __( 'Check what image sizes you want to generate i.e. if you dont want to use big featured image, uncheck this option  (if you are not sure, it is highly recommended to leave all sizes checked)', THEME_SLUG ),
                'options'   => $image_sizes_opt,
                'default'   => $image_sizes_def
            )


        ) )
);

/* Header */
Redux::setSection( $opt_name , array(
        'icon'      => ' el-icon-bookmark',
        'title'     => __( 'Header Styling', THEME_SLUG ),
        'desc'     => __( 'These are options to modify and style your header area', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'header_layout',
                'type'      => 'image_select',
                'title'     => __( 'Header layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose header layout', THEME_SLUG ),
                'options'   => array(
                    '1' => array( 'title' => __( '1 (centered)', THEME_SLUG ),  'img' => IMG_URI . '/admin/header_1.png' ),
                    '2' => array( 'title' => __( '2 (with ad space)', THEME_SLUG ),   'img' => IMG_URI . '/admin/header_2.png' ),
                    '3' => array( 'title' => __( '3 (minimal)', THEME_SLUG ),  'img' => IMG_URI . '/admin/header_3.png' )
                ),
                'default'   => 1
            ),

            array(
                'id' => 'header_height',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Header height', THEME_SLUG ),
                'subtitle' => __( 'Specify height for your header area', THEME_SLUG ),
                'desc' => __( 'Note: Height value is in px.', THEME_SLUG ),
                'default' => 150,
                'validate' => 'numeric'
            ),

            array(
                'id' => 'header_ad',
                'type' => 'editor',
                'title' => __( 'Header ad space', THEME_SLUG ),
                'subtitle' => __( 'This is a place for header banner ad', THEME_SLUG ),
                'default' => '',
                'desc' => __( 'Note: If you want to paste HTML or js code, use "text" mode in editor. Suggested size of an ad banner is 728x90', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                ),
                'required' => array( 'header_layout', '=', '2' )
            ),

            array(
                'id'        => 'logo',
                'type'      => 'media',
                'url'       => true,
                'title'     => __( 'Logo', THEME_SLUG ),
                'subtitle'      => __( 'Upload your logo image here, or leave empty to show website title instead', THEME_SLUG ),
                'default'   => array( 'url' => IMG_URI.'/voice_logo.png' ),
            ),

            array(
                'id'        => 'logo_retina',
                'type'      => 'media',
                'url'       => true,
                'title'     => __( 'Retina logo (2x)', THEME_SLUG ),
                'subtitle'      => __( 'Optionally upload another logo for devices with retina displays. It should be double size of your normal logo.', THEME_SLUG ),
                'default'   => array( 'url' => '' ),
            ),

            array(
                'id'        => 'logo_mobile',
                'type'      => 'media',
                'url'       => true,
                'title'     => __( 'Mobile logo', THEME_SLUG ),
                'subtitle'      => __( 'Optionally upload another logo which will be displayed only for mobiles and tablets', THEME_SLUG ),
                'default'   => array( 'url' => '' ),
            ),

            array(
                'id' => 'logo_position',
                'type' => 'spacing',
                'title' => __( 'Logo/title position', THEME_SLUG ),
                'subtitle' => __( 'Specify left and top positions for your logo/website title placement inside header', THEME_SLUG ),
                'top' => false,
                'left' => false,
                'default'            => array(
                    'padding-bottom'     => '15',
                    'padding-right'   => '0'
                )
            ),

            array(
                'id' => 'logo_custom_url',
                'type' => 'text',
                'title' => __( 'Logo/title custom URL', THEME_SLUG ),
                'subtitle' => __( 'Specify url if you want to link your logo/website title to some other URL address. By default it will lead to your home page.', THEME_SLUG ),
                'default' => '',
                'validate' => 'url'
            ),

            array(
                'id' => 'color_website_title',
                'type' => 'color',
                'title' => __( 'Site title color', THEME_SLUG ),
                'subtitle' => __( 'Specify color for your website title (if logo is not used)', THEME_SLUG ),
                'transparent' => false,
                'default' => '#232323',
            ),

            array(
                'id'        => 'header_description',
                'type'      => 'switch',
                'title'     => __( 'Display site description', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to display site description (below logo/title)', THEME_SLUG ),
                'desc'  => sprintf( __( 'Note: You can specify your site description inside <a href="%s">Settings -> General</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                'default'   => true,
            ),

            array(
                'id' => 'color_website_desc',
                'type' => 'color',
                'title' => __( 'Site description color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#aaaaaa',
                'required' => array( 'header_description', '=', true )
            ),

            array(
                'id'        => 'header_search',
                'type'      => 'switch',
                'title'     => __( 'Display search', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to display search icon after main navigation', THEME_SLUG ),
                'default'   => true,
            ),

            array(
                'id' => 'color_header_bg',
                'type' => 'color',
                'title' => __( 'Header background', THEME_SLUG ),
                'subtitle' => __( 'This option applies to your main header area', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id'        => 'sticky_header',
                'type'      => 'switch',
                'title'     => __( 'Sticky header', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to make main navigation always visible (sticky)', THEME_SLUG ),
                'default'   => true,
            ),

            array(
                'id'        => 'sticky_header_offset',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Sticky header offset', THEME_SLUG ),
                'subtitle'  => __( 'Specify after how many px of scrolling sticky header appears', THEME_SLUG ),
                'default'   => '700',
                'validate'  => 'numeric',
                'required' => array( 'sticky_header', '=', true )
            ),

            array(
                'id'        => 'sticky_header_logo',
                'type'      => 'media',
                'url'       => true,
                'title'     => __( 'Sticky header logo', THEME_SLUG ),
                'subtitle'      => __( 'Optionally upload your logo image if you want to have different logo in sticky header instead of main logo', THEME_SLUG ),
                'desc'  => __( 'Note: Optimal logo height is 40px. Allowed extensions are .jpg, .png and .gif', THEME_SLUG ),
                'default'   => array( 'url' => '' ),
                'required' => array( 'sticky_header', '=', true )
            ),

            array(
                'id'        => 'top_bar',
                'type'      => 'switch',
                'title'     => __( 'Enable header top bar', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to enable header top bar', THEME_SLUG ),
                'default'   => true,
            ),

            array(
                'id'        => 'top_bar_left',
                'type'      => 'select',
                'title'     => __( 'Top bar left', THEME_SLUG ),
                'subtitle'  => __( 'Choose what to display in top bar left area', THEME_SLUG ),
                'options' => vce_get_topbar_items(),
                'required' => array( 'top_bar', '=', true ),
                'default'   => 'top-navigation'
            ),
            array(
                'id'        => 'top_bar_center',
                'type'      => 'select',
                'title'     => __( 'Top bar center', THEME_SLUG ),
                'subtitle'  => __( 'Choose what to display in top bar center area', THEME_SLUG ),
                'options' => vce_get_topbar_items(),
                'required' => array( 'top_bar', '=', true ),
                'default'   => 0
            ),
            array(
                'id'        => 'top_bar_right',
                'type'      => 'select',
                'title'     => __( 'Top bar right', THEME_SLUG ),
                'subtitle'  => __( 'Choose what to display in top bar right area', THEME_SLUG ),
                'options' => vce_get_topbar_items(),
                'required' => array( 'top_bar', '=', true ),
                'default'   => 'social-menu'
            ),

            array(
                'id' => 'color_top_bar_bg',
                'type' => 'color',
                'title' => __( 'Top bar background color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#3a3a3a',
                'required' => array( 'top_bar', '=', true ),
            ),

            array(
                'id' => 'color_top_bar_txt',
                'type' => 'color',
                'title' => __( 'Top bar text color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
                'required' => array( 'top_bar', '=', true ),
            ),

            array(
                'id'        => 'nav_menu_section',
                'type'      => 'section',
                'title'     => __('Navigation options', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for the main nav menu', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'color_header_nav_bg',
                'type' => 'color',
                'title' => __( 'Navigation background', THEME_SLUG ),
                'subtitle' => __( 'This option applies to your navigation', THEME_SLUG ),
                'transparent' => false,
                'default' => '#fcfcfc',
                'required' => array( 'header_layout', '!=', 3 )
                
            ),

            array(
                'id' => 'color_header_txt',
                'type' => 'color',
                'title' => __( 'Navigation color', THEME_SLUG ),
                'subtitle' => __( 'This option applies to your navigation', THEME_SLUG ),
                'transparent' => false,
                'default' => '#4a4a4a',
            ),

            array(
                'id' => 'color_header_acc',
                'type' => 'color',
                'title' => __( 'Navigation accent color', THEME_SLUG ),
                'subtitle' => __( 'This option applies to your navigation links hover', THEME_SLUG ),
                'transparent' => false,
                'default' => '#cf4d35',
            ),

            array(
                'id' => 'color_navigation_cat',
                'type' => 'checkbox',
                'title' => __( 'Apply category colors as accent color', THEME_SLUG ),
                'subtitle' => __( 'Check this option if you want to show actual category colors instead of accent color if category link is added in navigation', THEME_SLUG ),
                'default' => false,
            ),

            array(
                'id' => 'color_header_submenu_bg',
                'type' => 'color',
                'title' => __( 'Navigation submenu background', THEME_SLUG ),
                'subtitle' => __( 'This option applies to your submenu items', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id'        => 'use_mega_menu',
                'type'      => 'switch',
                'title'     => __( 'Use mega menu navigation', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to use our built in mega menu system in navigation', THEME_SLUG ),
                'desc' => __( 'Note: You may want to set this option to off if you are using some other menu/navigation specific plugins and avoid possible conflicts', THEME_SLUG ),
                'default'   => true
            ),

            array(
                'id'        => 'ajax_mega_menu',
                'type'      => 'switch',
                'title'     => __( 'Use Ajax for mega menu', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to load mega menu via ajax', THEME_SLUG ),
                'desc' => __( 'Note: Enabling this options will cause a small delay when displaying mega menu', THEME_SLUG ),
                'default'   => true,
                'required' => array( 'use_mega_menu', '=', true )
            ),

            array(
                'id'        => 'mega_menu_subcats',
                'type'      => 'switch',
                'title'     => __( 'Show subcategories in mega menu', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to show subcategories instead of first post', THEME_SLUG ),
                'default'   => false,
                'required' => array( 'use_mega_menu', '=', true )
            ),

            array(
                'id'        => 'mega_menu_slider',
                'type'      => 'switch',
                'title'     => __( 'Activate slider for mega-menu-posts', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to show posts as a slider', THEME_SLUG ),
                'default'   => false,
                'required' => array( 'use_mega_menu', '=', true )
            ),

            array(
                'id' => 'mega_menu_slider_posts',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Number of posts in mega menu slider', THEME_SLUG ),
                'subtitle' => __( 'Specify number of posts to display in the mega menu', THEME_SLUG ),
                'default' => 8,
                'validate' => 'numeric',
                'required' => array( 'mega_menu_slider', '=', true )
            ),

        ) )
);

/* Content */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-file',
        'title'     => __( 'Content Styling', THEME_SLUG ),
        'desc'     => __( 'These are options to tyle your main content area', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'       => 'body_style',
                'type'     => 'background',
                'title'    => __( 'Body background', THEME_SLUG ),
                'subtitle' => __( 'Setup your body background color, image, pattern...', THEME_SLUG ),
                'default'  => array(
                    'background-color' => '#f0f0f0',
                )
            ),
            array(
                'id' => 'color_box_title_bg',
                'type' => 'color',
                'title' => __( 'Box/module headings background', THEME_SLUG ),
                'subtitle' => __( 'This option apply to module headings background', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
            ),
            array(
                'id' => 'color_box_title_txt',
                'type' => 'color',
                'title' => __( 'Box/module headings text', THEME_SLUG ),
                'subtitle' => __( 'This option apply to module headings text', THEME_SLUG ),
                'transparent' => false,
                'default' => '#232323',
            ),

            array(
                'id' => 'color_box_bg',
                'type' => 'color',
                'title' => __( 'Box/module background', THEME_SLUG ),
                'subtitle' => __( 'Specify main boxes background color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#f9f9f9',
            ),

            array(
                'id' => 'color_content_bg',
                'type' => 'color',
                'title' => __( 'Post/content background', THEME_SLUG ),
                'subtitle' => __( 'Specify background color for posts, pages, etc', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id' => 'color_content_title_txt',
                'type' => 'color',
                'title' => __( 'Post titles/h-elements', THEME_SLUG ),
                'subtitle' => __( 'Specify color for posts/page titles, h1,h2,h3,etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#232323',
            ),

            array(
                'id' => 'color_content_txt',
                'type' => 'color',
                'title' => __( 'Post/content text', THEME_SLUG ),
                'subtitle' => __( 'This color applies to standard post/content text', THEME_SLUG ),
                'transparent' => false,
                'default' => '#444444',
            ),

            array(
                'id' => 'color_content_acc',
                'type' => 'color',
                'title' => __( 'Accent color', THEME_SLUG ),
                'subtitle' => __( 'This color applies to links, buttons, special elements, etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#cf4d35',
            ),

            array(
                'id' => 'color_content_meta',
                'type' => 'color',
                'title' => __( 'Meta color', THEME_SLUG ),
                'subtitle' => __( 'This color applies to meta data such as date, comments link, views, etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#9b9b9b',
            ),

            array(
                'id' => 'color_pagination_bg',
                'type' => 'color',
                'title' => __( 'Pagination/actions background', THEME_SLUG ),
                'subtitle' => __( 'This color applies to third level/bottom area of boxes which has pagination, buttons, etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#f3f3f3',
            )

        ) )
);


/* Sidebar */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-th-list',
        'title'     => __( 'Sidebar Styling', THEME_SLUG ),
        'desc'     => __( 'These are styling settings for your sidebar/widgets', THEME_SLUG ),
        'fields'    => array(

            array(
                'id' => 'color_widget_title_bg',
                'type' => 'color',
                'title' => __( 'Widget title background', THEME_SLUG ),
                'subtitle' => __( 'Specify widget title background color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
            ),
            array(
                'id' => 'color_widget_title_txt',
                'type' => 'color',
                'title' => __( 'Widget title text', THEME_SLUG ),
                'subtitle' => __( 'Specify widget title text color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#232323',
            ),
            array(
                'id' => 'color_widget_bg',
                'type' => 'color',
                'title' => __( 'Widget background', THEME_SLUG ),
                'subtitle' => __( 'Specify widget background color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#f9f9f9',
            ),
            array(
                'id' => 'color_widget_txt',
                'type' => 'color',
                'title' => __( 'Widget text', THEME_SLUG ),
                'subtitle' => __( 'Specify widget text color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#444444',
            ),

            array(
                'id' => 'color_widget_acc',
                'type' => 'color',
                'title' => __( 'Widget accent', THEME_SLUG ),
                'subtitle' => __( 'This color will apply to link hovers, buttons, etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#cf4d35'
            ),

            array(
                'id' => 'color_widget_sub',
                'type' => 'color',
                'title' => __( 'Sub-level background', THEME_SLUG ),
                'subtitle' => __( 'This color will apply to additional area used at the bottom of some widgets', THEME_SLUG ),
                'transparent' => false,
                'default' => '#f3f3f3'
            )

        ) )
);

/* Footer */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-bookmark-empty',
        'title'     => __( 'Footer Styling', THEME_SLUG ),
        'desc'     => __( 'Manage settings for footer area', THEME_SLUG ),
        'fields'    => array(

            array(
                'id' => 'footer_display',
                'type' => 'switch',
                'switch' => true,
                'title' => __( 'Enable Footer', THEME_SLUG ),
                'desc' => sprintf( __( 'Check if you want to include footer area in your theme. You can manage footer area content in <a href="%s">Apperance -> Widgets</a> settings.', THEME_SLUG ), admin_url( 'widgets.php' ) ),
                'default' => true
            ),

            array(
                'id'        => 'footer_layout',
                'type'      => 'image_select',
                'title'     => __( 'Footer Columns', THEME_SLUG ),
                'subtitle'  => __( 'Choose number of columns in footer area', THEME_SLUG ),
                'desc'  => sprintf( __( 'Note: Each column represents one Footer Sidebar in <a href="%s">Apperance -> Widgets</a> settings.', THEME_SLUG ), admin_url( 'widgets.php' ) ),
                'options'   => array(
                    '1' => array( 'title' => __( '1 Column', THEME_SLUG ),       'img' => IMG_URI .'/admin/footer_full.png' ),
                    '2_2' => array( 'title' => __( '2 Columns (1/2 + 1/2)', THEME_SLUG ),       'img' => IMG_URI .'/admin/footer_half.png' ),
                    '3_23' => array( 'title' => __( '2 Columns (1/3 + 2/3)', THEME_SLUG ),       'img' => IMG_URI .'/admin/footer_one_two.png' ),
                    '23_3' => array( 'title' => __( '2 Columns (2/3 + 1/3)', THEME_SLUG ),       'img' => IMG_URI .'/admin/footer_two_one.png' ),
                    '3_3_3' => array( 'title' => __( '3 Columns', THEME_SLUG ),       'img' => IMG_URI .'/admin/footer_third.png' )
                ),
                'default'   => '3_3_3',
                'required' => array( 'footer_display', '=', true )
            ),

            array(
                'id' => 'color_footer_bg',
                'type' => 'color',
                'title' => __( 'Footer background', THEME_SLUG ),
                'subtitle' => __( 'Specify footer background color', THEME_SLUG ),
                'transparent' => false,
                'default' => '#373941',
            ),


            array(
                'id' => 'color_footer_title_txt',
                'type' => 'color',
                'title' => __( 'Headings text color', THEME_SLUG ),
                'subtitle' => __( 'This color will apply to footer widget titles, headings, etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#ffffff',
            ),

            array(
                'id' => 'color_footer_txt',
                'type' => 'color',
                'title' => __( 'Text color', THEME_SLUG ),
                'subtitle' => __( 'This is standard text color for footer', THEME_SLUG ),
                'transparent' => false,
                'default' => '#f9f9f9',
            ),

            array(
                'id' => 'color_footer_acc',
                'type' => 'color',
                'title' => __( 'Accent color', THEME_SLUG ),
                'subtitle' => __( 'This color will apply to buttons, links, etc...', THEME_SLUG ),
                'transparent' => false,
                'default' => '#cf4d35',
            ),


            array(
                'id' => 'enable_copyright',
                'type' => 'switch',
                'title' => __( 'Enable bottom bar / copyright area', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to include copyright area below footer', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'footer_copyright',
                'type' => 'editor',
                'title' => __( 'Copyright', THEME_SLUG ),
                'subtitle' => __( 'Specify some copyright text to show at the bottom of the website', THEME_SLUG ),
                'default' => __( 'Copyright &copy; 2014. Created by <a href="http://mekshq.com" target="_blank">Meks</a>. Powered by <a href="http://www.wordpress.org" target="_blank">WordPress</a>.', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 3  ,
                    'default_editor' => 'html'                          ),
                'required' => array( 'enable_copyright', '=', true )
            ),


            array(
                'id'        => 'footer_bar_left',
                'type'      => 'select',
                'title'     => __( 'Bottom bar left', THEME_SLUG ),
                'subtitle'  => __( 'Choose what to display in copyright bar left area', THEME_SLUG ),
                'options' => vce_get_copybar_items(),
                'required' => array( 'enable_copyright', '=', true ),
                'default'   => 'copyright-text'
            ),

            array(
                'id'        => 'footer_bar_center',
                'type'      => 'select',
                'title'     => __( 'Bottom bar center', THEME_SLUG ),
                'subtitle'  => __( 'Choose what to display in copyright bar center area', THEME_SLUG ),
                'options' => vce_get_copybar_items(),
                'required' => array( 'enable_copyright', '=', true ),
                'default'   => 0
            ),

            array(
                'id'        => 'footer_bar_right',
                'type'      => 'select',
                'title'     => __( 'Bottom bar right', THEME_SLUG ),
                'subtitle'  => __( 'Choose what to display in copyright bar right area', THEME_SLUG ),
                'options' => vce_get_copybar_items(),
                'required' => array( 'enable_copyright', '=', true ),
                'default'   => 'footer-menu'
            )


        ) )
);

/* Layout settings */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-th-large',
        'title'     => __( 'Post Layouts', THEME_SLUG ),
        'heading' => false,
        'fields'    => array(

            array(
                'id'        => 'section_layout_fa_big',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/featured_big.png"/>'.__( 'Featured area (big/full-width posts)', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for big post(s) displayed in featured area', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_fa_big_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for featured area main post', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_fa_big_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for featured area main posts', THEME_SLUG ),
                'desc' => __( 'Note: Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_big_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for featured area main posts', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date', 'author'))
            ),

            array(
                'id' => 'lay_fa_big_autoplay',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Autoplay slides', THEME_SLUG ),
                'subtitle' => __( 'Specify number of seconds if you want to enable automatic sliding for featured area main posts', THEME_SLUG ),
                'description' => __( 'i.e. Put "5" to auto slide each 5 seconds or leave empty for no autoplay', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),
            array(
                'id'        => 'lay_fa_big_opc',
                'type'      => 'slider',
                'title'     => __( 'Overlay opacity', THEME_SLUG ),
                'subtitle'  => __( 'Choose values for image overlay opacity', THEME_SLUG ),
                'description' => __( 'Note: First value is for initial opacity, second one is for image hover', THEME_SLUG ),
                "default" => array(
                    1 => .5,
                    2 => .7,
                ),
                'resolution' => 0.1,
                "min" => 0,
                "step" => .1,
                "max" => 1,
                'display_value' => 'label',
                'handles' => 2,
            ),


            array(
                'id'        => 'section_layout_fa_grid',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/featured_grid.png"/>'.__( 'Featured area (grid slider)', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for posts displayed in featured area grid/slider', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_fa_grid_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in featured area grid/slider', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_fa_grid_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for featured area grid/slider', THEME_SLUG ),
                'desc' => __( 'Note: Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_grid_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for posts in featured area grid/slider', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date'))
            ),

            array(
                'id' => 'lay_fa_grid_center',
                'type' => 'switch',
                'title' => __( 'Center text vertically', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to always center the text vertically over the image ', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id' => 'lay_fa_grid_autoplay',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Autoplay slides', THEME_SLUG ),
                'subtitle' => __( 'Specify number of seconds if you want to enable automatic sliding for featured area grid/slider', THEME_SLUG ),
                'description' => __( 'i.e. Put "5" to auto slide each 5 seconds or leave empty for no autoplay', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_fa_grid_opc',
                'type'      => 'slider',
                'title'     => __( 'Overlay opacity', THEME_SLUG ),
                'subtitle'  => __( 'Choose values for image overlay opacity', THEME_SLUG ),
                'description' => __( 'Note: First value is for initial opacity, second one is for image hover', THEME_SLUG ),
                "default" => array(
                    1 => .5,
                    2 => .8,
                ),
                'resolution' => 0.1,
                "min" => 0,
                "step" => .1,
                "max" => 1,
                'display_value' => 'label',
                'handles' => 2,
            ),

            array(
                'id'        => 'section_layout_a',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_a.png"/>'.__( 'Layout A', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for posts displayed in layout A', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_a_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in layout A', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_a_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout A', THEME_SLUG ),
                'desc' => __( 'Note: Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_a_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for posts in layout A', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts( array('date', 'author', 'comments'))
            ),

            array(
                'id' => 'lay_a_content_type',
                'type' => 'radio',
                'title' => __( 'Layout A content type', THEME_SLUG ),
                'subtitle' => __( 'Check how would you like to display post content for Layout A', THEME_SLUG ),
                'options'   => array(
                    'content' => __( 'Content (manually split with "<--more-->" tag)', THEME_SLUG ),
                    'excerpt' => __( 'Excerpt (automatically limit number of characters)', THEME_SLUG )
                ),
                'default' => 'excerpt'
            ),

            array(
                'id' => 'lay_a_excerpt',
                'type' => 'switch',
                'title' => __( 'Display excerpt', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display text excerpt for posts in layout A', THEME_SLUG ),
                'default' => true,
                'required'  => array( 'lay_a_content_type', '=', 'excerpt' )
            ),


            array(
                'id' => 'lay_a_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Excerpt limit', THEME_SLUG ),
                'subtitle' => __( 'Specify your excerpt limit if you are using excerpts on blog posts', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters', THEME_SLUG ),
                'default' => '230',
                'validate' => 'numeric',
                'required'  => array( array( 'lay_a_excerpt', '=', true ), array( 'lay_a_content_type', '=', 'excerpt' ) )
            ),

            array(
                'id' => 'lay_a_readmore',
                'type' => 'switch',
                'title' => __( 'Display read more link', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display "read more" link for posts in layout C', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id' => 'lay_a_icon',
                'type' => 'switch',
                'title' => __( 'Display post format icon', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post format icon (video, audio...) for posts in layout A', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id'        => 'section_layout_b',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_b.png"/>'.__( 'Layout B', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for layout B', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_b_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in layout B', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_b_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout B', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_b_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for layout B', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date', 'comments'))
            ),

            array(
                'id' => 'lay_b_excerpt',
                'type' => 'switch',
                'title' => __( 'Display excerpt', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display text excerpt for posts in layout B', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id' => 'lay_b_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Excerpt limit', THEME_SLUG ),
                'subtitle' => __( 'Specify your post excerpt limit for layout B', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters', THEME_SLUG ),
                'default' => '100',
                'validate' => 'numeric',
                'required'  => array( 'lay_b_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_b_icon',
                'type' => 'switch',
                'title' => __( 'Display post format icon', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post format icon (video, audio...) for posts in layout B', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id'        => 'section_layout_c',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_c.png"/>'.__( 'Layout C', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for layout C', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_c_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in layout C', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_c_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout C', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '65',
                'validate' => 'numeric'
            ),


            array(
                'id'        => 'lay_c_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for layout C', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date'))
            ),

            array(
                'id' => 'lay_c_excerpt',
                'type' => 'switch',
                'title' => __( 'Display excerpt', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display text excerpt for posts in layout C', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_c_readmore',
                'type' => 'switch',
                'title' => __( 'Display read more link', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display "read more" link for posts in layout A', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id' => 'lay_c_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Excerpt limit', THEME_SLUG ),
                'subtitle' => __( 'Specify your post excerpt limit for layout C', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters', THEME_SLUG ),
                'default' => '100',
                'validate' => 'numeric',
                'required'  => array( 'lay_c_excerpt', '=', true )
            ),


            array(
                'id' => 'lay_c_icon',
                'type' => 'switch',
                'title' => __( 'Display post format icon', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post format icon (video, audio...) for posts in layout C', THEME_SLUG ),
                'default' => true
            ),


            array(
                'id'        => 'section_layout_d',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_d.png"/>'.__( 'Layout D', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for layout D', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_d_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in layout D', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_d_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout D', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '55',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_d_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for layout D', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array(''))
            ),

            array(
                'id' => 'lay_d_icon',
                'type' => 'switch',
                'title' => __( 'Display post format icon', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post format icon (video, audio...) for posts in layout D', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id'        => 'section_layout_e',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_e.png"/>'.__( 'Layout E', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for layout E', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_e_title',
                'type' => 'switch',
                'title' => __( 'Display post title', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post title posts in layout E', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_e_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout E', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_e_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for layout E', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array(''))
            ),

            array(
                'id' => 'lay_e_icon',
                'type' => 'switch',
                'title' => __( 'Display post format icon', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post format icon (video, audio...) for posts in layout E', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id'        => 'section_layout_f',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_f.png"/>'.__( 'Layout F', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for layout F', THEME_SLUG ),
                'indent'    => false
            ),


            array(
                'id' => 'lay_f_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout F', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'section_layout_g',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_g.png"/>'.__( 'Layout G', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for posts displayed in layout G', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_g_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in layout G', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_g_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout G', THEME_SLUG ),
                'desc' => __( 'Note: Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'lay_g_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for posts in layout G', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date', 'author', 'comments'))
            ),

            array(
                'id' => 'lay_g_excerpt',
                'type' => 'switch',
                'title' => __( 'Display excerpt', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display text excerpt for posts in layout G', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id' => 'lay_g_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Excerpt limit', THEME_SLUG ),
                'subtitle' => __( 'Specify your post excerpt limit for layout G', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric',
                'required'  => array( 'lay_g_excerpt', '=', true )
            ),

            array(
                'id' => 'lay_g_icon',
                'type' => 'switch',
                'title' => __( 'Display post format icon', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display post format icon (video, audio...) for posts in layout G', THEME_SLUG ),
                'default' => true
            ),

            /** Layout H **/

            array(
                'id'        => 'section_layout_h',
                'type'      => 'section',
                'title'     => '<img src="'.IMG_URI . '/admin/layout_h.png"/>'.__( 'Layout H', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for layout H', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'lay_h_cat',
                'type' => 'switch',
                'title' => __( 'Display category', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display category link for posts in layout H', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_h_title_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post titles limit', THEME_SLUG ),
                'subtitle' => __( 'Specify number of characters to limit post titles for layout H', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters. Leave empty if you want to show full titles.', THEME_SLUG ),
                'default' => '65',
                'validate' => 'numeric'
            ),


            array(
                'id'        => 'lay_h_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for layout H', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date'))
            ),

            array(
                'id' => 'lay_h_excerpt',
                'type' => 'switch',
                'title' => __( 'Display excerpt', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display text excerpt for posts in layout H', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'lay_h_excerpt_limit',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Excerpt limit', THEME_SLUG ),
                'subtitle' => __( 'Specify your post excerpt limit for layout H', THEME_SLUG ),
                'desc' => __( 'Note: Value represents number of characters', THEME_SLUG ),
                'default' => '100',
                'validate' => 'numeric',
                'required'  => array( 'lay_h_excerpt', '=', true )
            )


        ) )
);

/* Single Post */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-pencil',
        'title'     => __( 'Single Post', THEME_SLUG ),
        'desc'     => __( 'Manage settings for single post template', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'single_layout',
                'type'      => 'image_select',
                'title'     => __( 'Single post layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose default layout for your single posts', THEME_SLUG ),
                'desc' => __( 'Note: You can override this option for each particular post', THEME_SLUG ),
                'options'   => vce_get_single_layout_opts(),
                'default'   => 'classic'
            ),

            array(
                'id'        => 'single_content_width',
                'type'      => 'slider',
                'title'     => __( 'Content width (with sidebar)', THEME_SLUG ),
                'subtitle'  => __( 'Choose post content width for posts which have sidebar included', THEME_SLUG ),
                'desc' => __( 'Note: Value is in px.', THEME_SLUG ),
                'min' => 600,
                'max' => 760,
                'step' => 10,
                'default'   => 600
            ),

            array(
                'id'        => 'single_content_width_full',
                'type'      => 'slider',
                'title'     => __( 'Content width (without sidebar)', THEME_SLUG ),
                'subtitle'  => __( 'Choose post content width for posts which don\'t have sidebar included (full width posts)', THEME_SLUG ),
                'desc' => __( 'Note: Value is in px.', THEME_SLUG ),
                'min' => 600,
                'max' => 1090,
                'step' => 10,
                'default'   => 600
            ),

            array(
                'id'        => 'single_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose default sidebar layout for single posts', THEME_SLUG ),
                'desc' => __( 'Note: You can override this option for each particular post', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'single_sidebar',
                'type'      => 'select',
                'title'     => __( 'Post standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose single post standard sidebar', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'single_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'single_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Post sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose single post sticky sidebar', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'single_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'single_meta',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Meta data', THEME_SLUG ),
                'subtitle'  => __( 'Check which meta data to show for single post', THEME_SLUG ),
                'options'   => vce_get_meta_opts(),
                'default' => vce_get_meta_opts(array('date', 'author','comments','views'))
            ),

            array(
                'id' => 'show_cat',
                'type' => 'switch',
                'title' => __( 'Display category link', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display category link', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'show_fimg',
                'type' => 'switch',
                'title' => __( 'Display featured image', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display featured image', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'show_fimg_cap',
                'type' => 'switch',
                'title' => __( 'Display featured image caption', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display caption/description on featured image', THEME_SLUG ),
                'default' => false,
                'required'  => array( 'show_fimg', '=', true )
            ),

            array(
                'id' => 'show_author_img',
                'type' => 'switch',
                'title' => __( 'Display author image', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display author image below featured image', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'show_headline',
                'type' => 'switch',
                'title' => __( 'Display headline (exceprt)', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display headline (post exceprt) before main post content', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'show_tags',
                'type' => 'switch',
                'title' => __( 'Display tags', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display tags below post content', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'show_share',
                'type' => 'switch',
                'title' => __( 'Display share buttons', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display social share buttons', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id'        => 'social_share',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Social share buttons', THEME_SLUG ),
                'subtitle'  => __( 'Check which social networks you want to use for sharing your posts', THEME_SLUG ),
                'options'   => array(
                    'facebook' => __( 'Facebook', THEME_SLUG ),
                    'twitter' => __( 'Twitter', THEME_SLUG ),
                    'gplus' => __( 'Google+', THEME_SLUG ),
                    'pinterest' => __( 'Pinterest', THEME_SLUG ),
                    'linkedin' => __( 'LinkedIN', THEME_SLUG )
                ),
                'default' => array(
                    'facebook' => 1,
                    'twitter' => 1,
                    'gplus' => 1,
                    'pinterest' => 1,
                    'linkedin' => 1
                ),
                'required'  => array( 'show_share', '=', true ),
            ),

            array(
                'id' => 'show_prev_next',
                'type' => 'switch',
                'title' => __( 'Display previous/next post links', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display previous and next post links for current post.', THEME_SLUG ),
                'default' => true
            ),
            array(
                'id' => 'prev_next_cat',
                'type' => 'checkbox',
                'title' => __( 'Previous/next links to posts from same category?', THEME_SLUG ),
                'subtitle' => __( 'Check if you want previous and next post links to display only posts from same category.', THEME_SLUG ),
                'default' => false,
                'required' => array( 'show_prev_next', '=', '1' )
            ),


            array(
                'id' => 'show_author_box',
                'type' => 'switch',
                'title' => __( 'Display author box', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display "about author" area below post content.', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'author_box_position',
                'type' => 'radio',
                'title' => __( 'Author box position', THEME_SLUG ),
                'subtitle' => __( 'Choose where to display author box', THEME_SLUG ),
                'options'   => array(
                    'up' => __( 'Above related posts', THEME_SLUG ),
                    'down' => __( 'Below related posts', THEME_SLUG )
                ),
                'default' => 'down',
                'required'  => array( 'show_author_box', '=', true ),
            ),

            array(
                'id' => 'comments_position',
                'type' => 'switch',
                'title' => __( 'Comment form on top', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display the comment form before comments', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id'        => 'section_related',
                'type'      => 'section',
                'title'     => __( 'Related Posts', THEME_SLUG ),
                'subtitle'  => __( 'Manage options for related posts area', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'show_related',
                'type' => 'switch',
                'title' => __( 'Display "related" posts box', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display additional area with related posts below post content', THEME_SLUG ),
                'default' => true
            ),


            array(
                'id'        => 'related_layout',
                'type'      => 'image_select',
                'title'     => __( 'Related area posts layout', THEME_SLUG ),
                'default'   => 'd',
                'options'   => vce_get_main_layouts(),
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_limit',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Related area posts number limit', THEME_SLUG ),
                'default'   => '6',
                'validate'  => 'numeric',
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_type',
                'type'      => 'radio',
                'title'     => __( 'Related area chooses from', THEME_SLUG ),
                'options'   => array(
                    'cat' => __( 'Posts located in same category', THEME_SLUG ),
                    'tag' => __( 'Posts tagged with at least one same tag', THEME_SLUG ),
                    'cat_or_tag' => __( 'Posts located in same category OR tagged with same tag', THEME_SLUG ),
                    'cat_and_tag' => __( 'Posts located in same category AND tagged with same tag', THEME_SLUG ),
                    'author' => __( 'Posts by same author', THEME_SLUG ),
                    '0' => __( 'All posts', THEME_SLUG )
                ),
                'default'   => 'cat',
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_order',
                'type'      => 'radio',
                'title'     => __( 'Related posts are ordered by', THEME_SLUG ),
                'options'   => vce_get_post_order_opts(),
                'default'   => 'date',
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'related_time',
                'type'      => 'radio',
                'title'     => __( 'Related posts are not older than', THEME_SLUG ),
                'options'   => vce_get_time_diff_opts( 'from' ),
                'default'   => '0',
                'required'  => array( 'show_related', '=', true ),
            ),

            array(
                'id'        => 'section_paginated',
                'type'      => 'section',
                'title'     => __( 'Paginated/Multipage Posts', THEME_SLUG ),
                'subtitle'  => __( 'These are options which apply to your posts split with "&lt;!--nextpage--&gt; tag"', THEME_SLUG ),
                'indent'    => false
            ),

            array(
                'id' => 'show_paginated',
                'type' => 'radio',
                'title' => __( 'Display navigation for paginated posts', THEME_SLUG ),
                'subtitle' => __( 'Choose where to display navigation for paginated/multi-page posts', THEME_SLUG ),
                'options'   => array(
                    'above' => __( 'Above post content', THEME_SLUG ),
                    'below' => __( 'Below post content', THEME_SLUG )
                ),
                'default' => 'above'
            ),

            array(
                'id' => 'show_paginated_fimg',
                'type' => 'switch',
                'title' => __( 'Display featured image on first page of paginated post', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display featured image/author image on the first page of paginated/multi page posts', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id' => 'show_paginated_headline',
                'type' => 'switch',
                'title' => __( 'Display headline/excerpt on first page of paginated post', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to display headline/excerp on the first page of paginated/multi page posts', THEME_SLUG ),
                'default' => false
            ),

        ) )
);

/* Page */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-file-edit',
        'title'     => __( 'Page Templates', THEME_SLUG ),
        'desc'     => __( 'Manage default settings for your pages (page templates)', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'page_content_width',
                'type'      => 'slider',
                'title'     => __( 'Page content width (with sidebar)', THEME_SLUG ),
                'subtitle'  => __( 'Choose page content width for pages which have sidebar included', THEME_SLUG ),
                'desc' => __( 'Note: Value is in px.', THEME_SLUG ),
                'min' => 600,
                'max' => 760,
                'step' => 10,
                'default'   => 600
            ),

            array(
                'id'        => 'page_content_width_full',
                'type'      => 'slider',
                'title'     => __( 'Page content width (without sidebar)', THEME_SLUG ),
                'subtitle'  => __( 'Choose page content width for pages which don\'t have sidebar included (full width pages)', THEME_SLUG ),
                'desc' => __( 'Note: Value is in px.', THEME_SLUG ),
                'min' => 600,
                'max' => 1090,
                'step' => 10,
                'default'   => 600
            ),

            array(
                'id'        => 'page_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose default sidebar layout for pages', THEME_SLUG ),
                'desc' => __( 'Note: You can override this option for each particular page', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'page_sidebar',
                'type'      => 'select',
                'title'     => __( 'Page standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose page standard sidebar', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'page_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'page_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Page sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose page sticky sidebar', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'page_use_sidebar', '!=', 'none' )
            ),

            array(
                'id' => 'page_show_fimg',
                'type' => 'switch',
                'title' => __( 'Display featured image', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display featured image on single pages', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'page_show_fimg_cap',
                'type' => 'switch',
                'title' => __( 'Display featured image caption', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display caption/description on featured image', THEME_SLUG ),
                'default' => false,
                'required'  => array( 'page_show_fimg', '=', true )
            ),

            array(
                'id' => 'page_show_comments',
                'type' => 'switch',
                'title' => __( 'Display comments', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display comments on single pages', THEME_SLUG ),
                'description' => __( 'Note: This is just an option to quickly hide the comments on pages. If you want to allow/disallow comments properly, you need to do it in "Discussion" box for each particular page.', THEME_SLUG ),
                'default' => true
            ),

            array(
                'id' => 'page_show_share',
                'type' => 'switch',
                'title' => __( 'Display share buttons', THEME_SLUG ),
                'subtitle' => __( 'Choose if you want to display social share buttons', THEME_SLUG ),
                'default' => false
            ),

            array(
                'id'        => 'page_social_share',
                'type'      => 'sortable',
                'mode'      => 'checkbox',
                'title'     => __( 'Social share buttons', THEME_SLUG ),
                'subtitle'  => __( 'Check which social networks you want to use for sharing your pages', THEME_SLUG ),
                'options'   => array(
                    'facebook' => __( 'Facebook', THEME_SLUG ),
                    'twitter' => __( 'Twitter', THEME_SLUG ),
                    'gplus' => __( 'Google+', THEME_SLUG ),
                    'pinterest' => __( 'Pinterest', THEME_SLUG ),
                    'linkedin' => __( 'LinkedIN', THEME_SLUG )
                ),
                'default' => array(
                    'facebook' => 1,
                    'twitter' => 1,
                    'gplus' => 1,
                    'pinterest' => 1,
                    'linkedin' => 1
                ),
                'required'  => array( 'page_show_share', '=', true ),
            ),
        ) )
);

/* Categories */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-folder',
        'title'     => __( 'Category Templates', THEME_SLUG ),
        'desc'     => __( 'Manage settings for category templates. Note: these are global category settings, you can optionally modify these settings for each category.', THEME_SLUG ),
        'fields'    => array(



            array(
                'id'        => 'category_fa',
                'type'      => 'switch',
                'title'     => __( 'Display featured area/slider', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to enable featured area for category templates', THEME_SLUG ),
                'default'   => false
            ),

            array(
                'id'        => 'category_fa_layout',
                'type'      => 'image_select',
                'title'     => __( 'Featured area layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose a layout for your featured area on category templates', THEME_SLUG ),
                'options'   => vce_get_featured_area_layouts(),
                'default'   => 'full_grid',
                'required' => array( 'category_fa', 'equals', true )
            ),

            array(
                'id'        => 'category_fa_limit',
                'class'     => 'small-text',
                'type'      => 'text',
                'title'     => __( 'Number of featured area posts', THEME_SLUG ),
                'subtitle'  => __( 'Specify how many posts you want to display inside featured area', THEME_SLUG ),
                'default'   => 8,
                'validate'  =>'numeric',
                'required'  => array( 'category_fa', 'equals', true )
            ),

            array(
                'id'        => 'category_fa_order',
                'type'      => 'radio',
                'title'     => __( 'Featured posts are ordered by', THEME_SLUG ),
                'options'   => vce_get_post_order_opts(),
                'default'   => 'date',
                'required'  => array( 'category_fa', '=', true ),
            ),

            array(
                'id'        => 'category_fa_time',
                'type'      => 'radio',
                'title'     => __( 'Featured posts are not older than', THEME_SLUG ),
                'options'   => vce_get_time_diff_opts( 'from' ),
                'default'   => '0',
                'required'  => array( 'category_fa', '=', true ),
            ),

            array(
                'id'        => 'category_fa_not_duplicate',
                'type'      => 'switch',
                'title'     => __( 'Do not duplicate', THEME_SLUG ),
                'subtitle'  => __( 'Enable this option to exclude posts in featured area from showing in main post listing', THEME_SLUG ),
                'default'   => true,
                'required'  => array( 'category_fa', '=', true ),
            ),

            array(
                'id'        => 'category_fa_hide_on_pages',
                'type'      => 'switch',
                'title'     => __( 'Show featured area on first page only', THEME_SLUG ),
                'subtitle'  => __( 'Enable this option to display featured area only on first page of category', THEME_SLUG ),
                'default'   => true,
                'required'  => array( 'category_fa', '=', true ),
            ),



            array(
                'id'        => 'category_layout',
                'type'      => 'image_select',
                'title'     => __( 'Category posts main layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display your posts on category templates', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'b'
            ),

            array(
                'id'        => 'category_use_top',
                'type'      => 'switch',
                'title'     => __( 'Enable starter posts', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to enable top/starter posts which will have different different layout than posts in main listing', THEME_SLUG ),
                'default'   => false
            ),

            array(
                'id'        => 'category_top_layout',
                'type'      => 'image_select',
                'title'     => __( 'Category starter posts layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display top/starter posts on category templates', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'a',
                'required'  => array( 'category_use_top', 'equals', true )
            ),

            array(
                'id'        => 'category_top_limit',
                'class'     => 'small-text',
                'type'      => 'text',
                'title'     => __( 'Number of starter posts', THEME_SLUG ),
                'subtitle'  => __( 'Specify how many top/starter posts you want to have', THEME_SLUG ),
                'default'   => 1,
                'validate'  =>'numeric',
                'required'  => array( 'category_use_top', 'equals', true )
            ),

            array(
                'id'        => 'category_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose default sidebar layout for category template', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'category_sidebar',
                'type'      => 'select',
                'title'     => __( 'Category standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose standard category sidebar', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'category_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'category_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Category sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose sticky category sidebar', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'category_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'category_pagination',
                'type'      => 'image_select',
                'title'     => __( 'Category pagination', THEME_SLUG ),
                'subtitle'  => __( 'Choose which pagination to use on category templates', THEME_SLUG ),
                'options'   => vce_get_pagination_layouts(),
                'default'   => 'load-more'
            ),

            array(
                'id'        => 'category_ppp',
                'type'      => 'radio',
                'title'     => __( 'Posts per page', THEME_SLUG ),
                'subtitle'  => __( 'Choose how many posts per page you want to display', THEME_SLUG ),
                'options'   => array(
                    'inherit' => sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                    'custom' => __( 'Custom number', THEME_SLUG )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'category_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Number of post per page', THEME_SLUG ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'category_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);

/* Tags */
Redux::setSection( $opt_name , array(
        'icon'      => ' el-icon-tag',
        'title'     => __( 'Tag Templates', THEME_SLUG ),
        'desc'     => __( 'Manage settings for tag templates', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'tag_layout',
                'type'      => 'image_select',
                'title'     => __( 'Tag archives layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display your posts on tag template', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'd'
            ),


            array(
                'id'        => 'tag_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose sidebar layout for tag template', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'tag_sidebar',
                'type'      => 'select',
                'title'     => __( 'Tag standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose standard sidebar for tag template', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'tag_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'tag_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Tag sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose sticky sidebar for tag template', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'tag_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'tag_pagination',
                'type'      => 'image_select',
                'title'     => __( 'Tag pagination', THEME_SLUG ),
                'subtitle'  => __( 'Choose which pagination to use on tag template', THEME_SLUG ),
                'options'   => vce_get_pagination_layouts(),
                'default'   => 'load-more'
            ),

            array(
                'id'        => 'tag_ppp',
                'type'      => 'radio',
                'title'     => __( 'Posts per page', THEME_SLUG ),
                'subtitle'  => __( 'Choose how many posts per page you want to display', THEME_SLUG ),
                'options'   => array(
                    'inherit' => sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                    'custom' => __( 'Custom number', THEME_SLUG )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'tag_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Number of post per page', THEME_SLUG ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'tag_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);

/* Author */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-user',
        'title'     => __( 'Author Templates', THEME_SLUG ),
        'desc'     => __( 'Manage settings for author templates', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'author_layout',
                'type'      => 'image_select',
                'title'     => __( 'Author archives layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display your posts on author template', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'c'
            ),

            array(
                'id'        => 'author_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose sidebar layout for author template', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'author_sidebar',
                'type'      => 'select',
                'title'     => __( 'Author standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose standard sidebar for author template', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'author_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'author_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Author sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose sticky sidebar for author template', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'author_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'author_pagination',
                'type'      => 'image_select',
                'title'     => __( 'Author pagination', THEME_SLUG ),
                'subtitle'  => __( 'Choose which pagination to use on author template', THEME_SLUG ),
                'options'   => vce_get_pagination_layouts(),
                'default'   => 'load-more'
            ),

            array(
                'id'        => 'author_ppp',
                'type'      => 'radio',
                'title'     => __( 'Posts per page', THEME_SLUG ),
                'subtitle'  => __( 'Choose how many posts per page you want to display', THEME_SLUG ),
                'options'   => array(
                    'inherit' => sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                    'custom' => __( 'Custom number', THEME_SLUG )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'author_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Number of post per page', THEME_SLUG ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'author_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);

/* Search */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-search',
        'title'     => __( 'Search Template', THEME_SLUG ),
        'desc'     => __( 'Manage settings for search results template', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'        => 'search_layout',
                'type'      => 'image_select',
                'title'     => __( 'Search archives layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display your posts on search template', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'd'
            ),

            array(
                'id'        => 'search_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose sidebar layout for search template', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'search_sidebar',
                'type'      => 'select',
                'title'     => __( 'Search standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose standard sidebar for search template', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'search_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'search_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Search sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose sticky sidebar for search template', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'search_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'search_pagination',
                'type'      => 'image_select',
                'title'     => __( 'Search pagination', THEME_SLUG ),
                'subtitle'  => __( 'Choose which pagination to use on search template', THEME_SLUG ),
                'options'   => vce_get_pagination_layouts(),
                'default'   => 'load-more'
            ),

            array(
                'id'        => 'search_ppp',
                'type'      => 'radio',
                'title'     => __( 'Posts per page', THEME_SLUG ),
                'subtitle'  => __( 'Choose how many posts per page you want to display', THEME_SLUG ),
                'options'   => array(
                    'inherit' => sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                    'custom' => __( 'Custom number', THEME_SLUG )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'search_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Number of post per page', THEME_SLUG ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'search_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);



/* Posts page archive */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-folder-open',
        'title'     => __( 'Posts Page Archive', THEME_SLUG ),
        'desc'     => sprintf( __( 'Manage settings for posts page archive if you are using "posts page" option in <a href="%s">Settings-> Reading</a>', THEME_SLUG ), admin_url( 'options-reading.php' ) ),
        'fields'    => array(

            array(
                'id'        => 'posts_page_layout',
                'type'      => 'image_select',
                'title'     => __( 'Posts page archives layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display your posts on posts page template', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'b'
            ),

            array(
                'id'        => 'posts_page_pagination',
                'type'      => 'image_select',
                'title'     => __( 'Posts page pagination', THEME_SLUG ),
                'subtitle'  => __( 'Choose which pagination to use on posts page template', THEME_SLUG ),
                'options'   => vce_get_pagination_layouts(),
                'default'   => 'load-more'
            ),

            array(
                'id'        => 'posts_page_ppp',
                'type'      => 'radio',
                'title'     => __( 'Posts per page', THEME_SLUG ),
                'subtitle'  => __( 'Choose how many posts per page you want to display', THEME_SLUG ),
                'options'   => array(
                    'inherit' => sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                    'custom' => __( 'Custom number', THEME_SLUG )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'posts_page_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Number of post per page', THEME_SLUG ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'posts_page_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )

        ) )
);


/* Archives */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-folder-open',
        'title'     => __( 'Archive Templates', THEME_SLUG ),
        'desc'     => __( 'Manage settings for other miscellaneous templates like date archives, post format archives, etc...', THEME_SLUG ),
        'fields'    => array(
            array(
                'id'        => 'archive_layout',
                'type'      => 'image_select',
                'title'     => __( 'Archives layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose how to display your posts on miscellaneous archive templates', THEME_SLUG ),
                'options'   => vce_get_main_layouts(),
                'default'   => 'b'
            ),

            array(
                'id'        => 'archive_use_sidebar',
                'type'      => 'image_select',
                'title'     => __( 'Sidebar layout', THEME_SLUG ),
                'subtitle'  => __( 'Choose sidebar layout for archive templates', THEME_SLUG ),
                'options'   => vce_get_sidebar_layouts(),
                'default'   => 'right'
            ),

            array(
                'id'        => 'archive_sidebar',
                'type'      => 'select',
                'title'     => __( 'Archive standard sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose standard sidebar for archive templates', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sidebar',
                'required'  => array( 'archive_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'archive_sticky_sidebar',
                'type'      => 'select',
                'title'     => __( 'Archive sticky sidebar', THEME_SLUG ),
                'subtitle'  => __( 'Choose sticky sidebar for archive templates', THEME_SLUG ),
                'options'   => vce_get_sidebars_list(),
                'default'   => 'vce_default_sticky_sidebar',
                'required'  => array( 'archive_use_sidebar', '!=', 'none' )
            ),

            array(
                'id'        => 'archive_pagination',
                'type'      => 'image_select',
                'title'     => __( 'Archive pagination', THEME_SLUG ),
                'subtitle'  => __( 'Choose which pagination to use on archive templates', THEME_SLUG ),
                'options'   => vce_get_pagination_layouts(),
                'default'   => 'load-more'
            ),

            array(
                'id'        => 'archive_ppp',
                'type'      => 'radio',
                'title'     => __( 'Posts per page', THEME_SLUG ),
                'subtitle'  => __( 'Choose how many posts per page you want to display', THEME_SLUG ),
                'options'   => array(
                    'inherit' => sprintf( __( 'Inherit from global option in <a href="%s">Settings->Reading</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                    'custom' => __( 'Custom number', THEME_SLUG )
                ),
                'default'   => 'inherit'
            ),

            array(
                'id'        => 'archive_ppp_num',
                'type'      => 'text',
                'class'     => 'small-text',
                'title'     => __( 'Number of post per page', THEME_SLUG ),
                'default'   => get_option( 'posts_per_page' ),
                'required'  => array( 'archive_ppp', '=', 'custom' ),
                'validate'  => 'numeric'
            )
        ) )
);

/* Typography */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-fontsize',
        'title'     => __( 'Typography', THEME_SLUG ),
        'desc'     => __( 'Manage fonts and typography settings', THEME_SLUG ),
        'fields'    => array(

            array(
                'id'          => 'main_font',
                'type'        => 'typography',
                'title'       => __( 'Main text font', THEME_SLUG ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subtitle'    => __( 'This is you main font for standard text', THEME_SLUG ),
                'default'     => array(
                    'google'      => true,
                    'font-weight'  => '400',
                    'font-family' => 'Open Sans',
                    'subsets' => 'latin-ext'
                ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '16px',
                    'line-height' => '26px',
                    'text' => 'This is a font used for your main content on the website. Here in MeksHQ, we think that readability is very important part of any WordPress theme. This is actually a rough example of how simple paragraph of text will look like on your website so you have a simple preview here.'
                )
            ),

            array(
                'id'          => 'h_font',
                'type'        => 'typography',
                'title'       => __( 'Headings font', THEME_SLUG ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subtitle'    => __( 'This font is used for headings, titles, h-elements...', THEME_SLUG ),
                'default'     => array(
                    'google'      => true,
                    'font-weight'  => '400',
                    'font-family' => 'Roboto Slab',
                    'subsets' => 'latin-ext'
                ),
                'preview' => array(
                    'always_display' => true,
                    'font-size' => '24px',
                    'line-height' => '30px',
                    'text' => 'There is no good blog without great readability'
                )

            ),

            array(
                'id'          => 'nav_font',
                'type'        => 'typography',
                'title'       => __( 'Navigation font', THEME_SLUG ),
                'google'      => true,
                'font-backup' => false,
                'font-size' => false,
                'color' => false,
                'line-height' => false,
                'text-align' => false,
                'units'       =>'px',
                'subtitle'    => __( 'This font is used for main website navigation', THEME_SLUG ),
                'default'     => array(
                    'font-weight'  => '400',
                    'font-family' => 'Roboto Slab',
                    'subsets' => 'latin-ext'
                ),

                'preview' => array(
                    'always_display' => true,
                    'font-size' => '16px',
                    'text' => 'Home &nbsp;&nbsp;About &nbsp;&nbsp;Blog &nbsp;&nbsp;Contact'
                )

            ),
            array(
                'id' => 'text_upper',
                'type' => 'checkbox',
                'multi' => true,
                'title' => __( 'Uppercase text', THEME_SLUG ),
                'subtitle' => __( 'Check if you want to show CAPITAL LETTERS for specific elements', THEME_SLUG ),
                'options' => array(
                    'site-title a' => __( 'Site title', THEME_SLUG ),
                    'site-description' => __( 'Site description', THEME_SLUG ),
                    'nav-menu li a' => __( 'Main navigation', THEME_SLUG ),
                    'entry-title' => __( 'Post/Page titles', THEME_SLUG ),
                    'main-box-title' => __( 'Box (module, archive, category, tag, etc...) titles', THEME_SLUG ),
                    'sidebar .widget-title' => __( 'Widget titles', THEME_SLUG ),
                    'site-footer .widget-title' => __( 'Footer widget titles', THEME_SLUG ),
                    'vce-featured-link-article' => __( 'Featured area titles', THEME_SLUG )
                ),
                'default' => array(
                    'site-title a' => 0,
                    'site-description' => 0,
                    'nav-menu li a' => 0,
                    'entry-title' => 0,
                    'main-box-title' => 0,
                    'sidebar .widget-title' => 0,
                    'site-footer .widget-title' => 0,
                    'vce-featured-link-article' => 0
                )
            )

        ) )
);

/* Ads */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-usd',
        'title'     => esc_html__( 'Ads', THEME_SLUG ),
        'desc'     => esc_html__( 'Use this options to fill your ads slots. Both image and JavaScript related ads are allowed.', THEME_SLUG ),
        'fields'    => array(


         array(
                'id' => 'ad_below_header',
                'type' => 'editor',
                'title' => esc_html__( 'Below header', THEME_SLUG ),
                'subtitle' => esc_html__( 'This ad will be displayed between your header and website content', THEME_SLUG ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
            ),

         array(
                'id' => 'ad_above_footer',
                'type' => 'editor',
                'title' => esc_html__( 'Above footer', THEME_SLUG ),
                'subtitle' => esc_html__( 'This ad will be displayed between your footer and website content', THEME_SLUG ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
         ),

         array(
                'id' => 'ad_above_single',
                'type' => 'editor',
                'title' => esc_html__( 'Above single post content', THEME_SLUG ),
                'subtitle' => esc_html__( 'This ad will be displayed above post content on your single post templates', THEME_SLUG ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
         ),

         array(
                'id' => 'ad_below_single',
                'type' => 'editor',
                'title' => esc_html__( 'Below single post content', THEME_SLUG ),
                'subtitle' => esc_html__( 'This ad will be displayed below post content on your single post templates', THEME_SLUG ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
         ),

         array(
                'id' => 'ad_between_posts',
                'type' => 'editor',
                'title' => esc_html__( 'Between posts', THEME_SLUG ),
                'subtitle' => esc_html__( 'This ad will be displayed between posts on archive templates such as category archives, tag archives etc...', THEME_SLUG ),
                'default' => '',
                'desc' => esc_html__( 'Note: If you want to paste HTML or JavaScript code, use "text" mode in editor', THEME_SLUG ),
                'args'   => array(
                    'textarea_rows'    => 5,
                    'default_editor' => 'html'
                )
         ),

         array(
                'id' => 'ad_between_posts_position',
                'type' => 'text',
                'class' => 'small-text',
                'title' => esc_html__( 'Between posts position', THEME_SLUG ),
                'subtitle' => esc_html__( 'Specify after how many posts you want to display ad', THEME_SLUG ),
                'default' => 4,
                'validate' => 'numeric'
            ),

        )
    )
);

/* Misc */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-wrench',
        'title'     => __( 'Miscellaneous', THEME_SLUG ),
        'desc'     => __( 'These are some miscellaneous settings for the website', THEME_SLUG ),
        'fields'    => array(
            
            array(
                'id' => 'more_string',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'More string', THEME_SLUG ),
                'subtitle' => __( 'Specify your "more" string to append after limited post titles and excerpts across the theme', THEME_SLUG ),
                'default' => '...',
                'validate' => 'no_html'
            ),

            array(
                'id'        => 'time_ago',
                'type'      => 'switch',
                'title'     => __( 'Display "time ago" format', THEME_SLUG ),
                'subtitle'  => __( 'Display post dates in "time ago" manner, like Twitter and Facebook (i.e 5 hours ago, 3 days ago, 2 weeks ago, 4 months ago, etc...)', THEME_SLUG ),
                'desc'  => sprintf( __( 'Note: If you disable this option, you can choose your preferred date format in <a href="%s">Settings -> General</a>', THEME_SLUG ), admin_url( 'options-general.php' ) ),
                'default'   => true
            ),

            array(
                'id'        => 'time_ago_limit',
                'type'      => 'radio',
                'title'     => __( 'Apply "time ago" to posts which are not older than', THEME_SLUG ),
                'options'   => array(
                    'hour' => __( '1 Hour', THEME_SLUG ),
                    'day' => __( '1 Day', THEME_SLUG ),
                    'week' => __( '1 Week', THEME_SLUG ),
                    'month' => __( '1 Month', THEME_SLUG ),
                    'three_months' => __( '3 Months', THEME_SLUG ),
                    'six_months' => __( '6 Months', THEME_SLUG ),
                    'year' => __( '1 Year', THEME_SLUG ),
                    '0' => __( 'Apply to all posts', THEME_SLUG ),
                ),
                'default'   => '0',
                'required'  => array( 'time_ago', '=', true ),
            ),

            array(
                'id'        => 'ago_before',
                'type'      => 'checkbox',
                'title'     => __( 'Display "ago" word before date/time', THEME_SLUG ),
                'subtitle'  => __( 'By default, "ago" word goes after date/time string but in some languages different than English it is more proper to display it before.', THEME_SLUG ),
                'desc'  => __( 'Example: "Publie depuis 3 heures"', THEME_SLUG ),
                'default'   => false,
                'required'  => array( 'time_ago', '=', true )
            ),

            array(
                'id' => 'views_forgery',
                'type' => 'text',
                'class' => 'small-text',
                'title' => __( 'Post views forgery', THEME_SLUG ),
                'subtitle' => __( 'Specify value to add to real number of entry views for each post', THEME_SLUG ),
                'desc' => __( 'i.e. If post has 45 views and you put 100, your post will display 145 views', THEME_SLUG ),
                'default' => '',
                'validate' => 'numeric'
            ),

            array(
                'id'        => 'scroll_to_top',
                'type'      => 'switch',
                'title'     => __( 'Display scroll to top button', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to display scroll to top button', THEME_SLUG ),
                'default'   => true
            ),

            array(
                'id' => 'scroll_to_top_color',
                'type' => 'color',
                'title' => __( 'Scroll to top button color', THEME_SLUG ),
                'subtitle' => __( 'Choose color for scroll to top button', THEME_SLUG ),
                'transparent' => false,
                'default' => '#323232',
                'required'  => array( 'scroll_to_top', '=', true )
            ),

            array(
                'id'        => 'use_gallery',
                'type'      => 'switch',
                'title'     => __( 'Use Voice gallery style', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to use our built in gallery style or disable if you want to use default WordPress gallery or some other gallery plugin', THEME_SLUG ),
                'default'   => true
            ),

            array(
                'id'        => 'img_zoom',
                'type'      => 'switch',
                'title'     => __( 'Enable zoom effect on featured images', THEME_SLUG ),
                'subtitle'  => __( 'Check if you want to enable zoom effect on featured image mouse-over', THEME_SLUG ),
                'default'   => true
            ),

            array(
                'id' => '404_img',
                'type' => 'media',
                'url' => true,
                'title' => __( '404 template image', THEME_SLUG ),
                'subtitle' => __( 'Upload image for 404 template (optional)', THEME_SLUG ),
                'desc' => __( 'Supported formats: .jpg and .png', THEME_SLUG ),
                'default' => array( 'url' => '' )
            ),

            array(
                'id'        => 'multibyte_excerpts',
                'type'      => 'switch',
                'title'     => __( 'Enable support for "multibyte" text excerpts', THEME_SLUG ),
                'subtitle'  => __( 'Use this option for some specific languages that have special characters i.e. Japanese', THEME_SLUG ),
                'default'   => false
            ),
        ) )
);

/* WooCommerce */

if ( vce_is_woocommerce_active() ) {

    Redux::setSection( $opt_name , array(
            'icon'      => 'el-icon-shopping-cart',
            'title' => __( 'WooCommerce', THEME_SLUG ),
            'desc' => __( 'Manage options for WooCommerce pages', THEME_SLUG ),
            'fields' => array(
                array(
                    'id'        => 'product_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => __( 'Product sidebar layout', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sidebar layout for WooCommerce products', THEME_SLUG ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'product_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Product standard sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose standard sidebar for WooCommerce products', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sidebar',
                    'required'  => array( 'product_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Product sticky sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sticky sidebar for WooCommerce products', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sticky_sidebar',
                    'required'  => array( 'product_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_cat_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => __( 'Product category sidebar layout', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sidebar layout for WooCommerce product category', THEME_SLUG ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'product_cat_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Product category standard sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose standard sidebar for WooCommerce product category', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sidebar',
                    'required'  => array( 'product_cat_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'product_cat_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Product category sticky sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sticky sidebar for WooCommerce product category', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sticky_sidebar',
                    'required'  => array( 'product_cat_use_sidebar', '!=', 'none' )
                )
            ) )
    );
}

/* bbPress */
if ( vce_is_bbpress_active() ) {

    Redux::setSection( $opt_name , array(
            'icon'      => 'el-icon-quotes',
            'title' => __( 'bbPress', THEME_SLUG ),
            'desc' => __( 'Manage options for bbPress pages', THEME_SLUG ),
            'fields' => array(
                array(
                    'id'        => 'forum_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => __( 'Forum sidebar layout', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sidebar layout for bbPress forums', THEME_SLUG ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'forum_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Forum standard sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose standard sidebar for bbPress forums', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sidebar',
                    'required'  => array( 'forum_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'forum_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Forum sticky sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sticky sidebar for bbPress forums', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sticky_sidebar',
                    'required'  => array( 'forum_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'topic_use_sidebar',
                    'type'      => 'image_select',
                    'title'     => __( 'Topic sidebar layout', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sidebar layout for bbPress topics', THEME_SLUG ),
                    'options'   => vce_get_sidebar_layouts(),
                    'default'   => 'right'
                ),

                array(
                    'id'        => 'topic_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Topic standard sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose standard sidebar for bbPress topics', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sidebar',
                    'required'  => array( 'topic_use_sidebar', '!=', 'none' )
                ),

                array(
                    'id'        => 'topic_sticky_sidebar',
                    'type'      => 'select',
                    'title'     => __( 'Topic sticky sidebar', THEME_SLUG ),
                    'subtitle'  => __( 'Choose sticky sidebar for bbPress topics', THEME_SLUG ),
                    'options'   => vce_get_sidebars_list(),
                    'default'   => 'vce_default_sticky_sidebar',
                    'required'  => array( 'topic_use_sidebar', '!=', 'none' )
                )


            ) )
    );
}

Redux::setSection( $opt_name , array( 'type' => 'divide', 'id' => 'vce-divide' ) );

/* Translation Options */

$translate_options[] = array(
    'id' => 'enable_translate',
    'type' => 'switch',
    'switch' => true,
    'title' => __( 'Enable theme translation?', THEME_SLUG ),
    'default' => '1'
);

$translate_strings = vce_get_translate_options();

foreach ( $translate_strings as $string_key => $string ) {
    $translate_options[] = array(
        'id' => 'tr_'.$string_key,
        'type' => 'text',
        'title' => esc_html( $string['option_title'] ),
        'subtitle' => isset( $string['option_desc'] ) ? $string['option_desc'] : '',
        'default' => ''
    );
}

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-globe-alt',
        'title' => __( 'Translation', THEME_SLUG ),
        'desc' => __( 'Use these settings to quckly translate or change text inside this theme. If you want to remove the text completely instead of modifying it, you can use <strong>"-1"</strong> as a value for particular field translation. <br/><br/><strong>Note:</strong> If you are using this theme for multilingual website, you need to disable these options and use multilanguage plugins (such as WPML) or manual translation via .po and .mo files located inside "wp-content/themes/voice/languages" folder.', THEME_SLUG ),
        'fields' => $translate_options
    )
);

/* Performance */
Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-dashboard',
        'title'     => esc_html__( 'Performance', THEME_SLUG ),
        'desc'     => esc_html__( 'Use these options to optimize your page speed', THEME_SLUG ),
        'fields'    => array(

         array(
                'id' => 'min_css',
                'type' => 'switch',
                'title' => esc_html__( 'Use minified CSS', THEME_SLUG ),
                'subtitle' => esc_html__( 'Load all theme css files combined and minified into a single file.', THEME_SLUG ),
                'default' => true
            ),

         array(
                'id' => 'min_js',
                'type' => 'switch',
                'title' => esc_html__( 'Use minified JS', THEME_SLUG ),
                'subtitle' => esc_html__( 'Load all theme js files combined and minified into a single file.', THEME_SLUG ),
                'default' => true
            )

)));

/* Updater Options */

Redux::setSection( $opt_name , array(
        'icon'      => 'el-icon-time',
        'title' => __( 'Updater', THEME_SLUG ),
        'desc' => sprintf( __( 'Specify your ThemeForest username and API Key in order to enable quick Voice theme updates. Whenever we release new Voice update it will appear on your <a href="%s">updates screen</a>.', THEME_SLUG ), admin_url( 'update-core.php' ) ),
        'fields' => array(

            array(
                'id' => 'theme_update_username',
                'type' => 'text',
                'title' => __( 'Your ThemeForest Username', THEME_SLUG ),
                'default' => ''
            ),

            array(
                'id' => 'theme_update_apikey',
                'type' => 'text',
                'title' => __( 'Your ThemeForest API Key', THEME_SLUG ),
                'desc' => __( 'Where can I find my <a href="http://themeforest.net/help/api" target="_blank">API key</a>?', THEME_SLUG ),
                'default' => ''
            )
        ) )
);


?>
