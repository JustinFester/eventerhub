<?php

	add_action('wp_ajax_vce_hide_welcome', 'vce_hide_welcome');
	add_action('wp_ajax_vce_update_version', 'vce_update_version');
	add_action('wp_ajax_nopriv_vce_mega_menu', 'vce_generate_mega_menu_content');
	add_action('wp_ajax_vce_mega_menu', 'vce_generate_mega_menu_content');


	/* Update latest theme version (we use internally for new version introduction text) */
	function vce_update_version(){
		update_option('vce_theme_version',THEME_VERSION);
		die();
	}

	/* Update latest theme version */
	function vce_hide_welcome(){
		update_option('vce_welcome_box_displayed', true);
		die();
	}

	function vce_generate_mega_menu_content(){
	
		if(!isset($_POST['cat']))
			die();

		$cat = absint($_POST['cat']);

		$output = vce_load_mega_menu($cat);

		echo $output;

		die();
	}

?>