<?php
/*-----------------------------------------------------------------------------------*/
/*	Add Metaboxes
/*-----------------------------------------------------------------------------------*/

add_action( 'load-post.php', 'vce_meta_boxes_setup' );
add_action( 'load-post-new.php', 'vce_meta_boxes_setup' );

/* Meta box setup function. */
if ( !function_exists( 'vce_meta_boxes_setup' ) ) :
	function vce_meta_boxes_setup() {
		global $typenow;
		if ( $typenow == 'page' ) {
			add_action( 'add_meta_boxes', 'vce_load_page_metaboxes' );
			add_action( 'save_post', 'vce_save_page_metaboxes', 10, 2 );
		}

		if ( $typenow == 'post' ) {
			add_action( 'add_meta_boxes', 'vce_load_post_metaboxes' );
			add_action( 'save_post', 'vce_save_post_metaboxes', 10, 2 );
		}
	}
endif;

/* Add page metaboxes */
if ( !function_exists( 'vce_load_page_metaboxes' ) ) :
	function vce_load_page_metaboxes() {

		/* Sidebar metabox */
		add_meta_box(
			'vce_sidebar',
			__( 'Sidebar', THEME_SLUG ),
			'vce_sidebar_metabox',
			'page',
			'side',
			'default'
		);

		/* Featured area metabox */
		add_meta_box(
			'vce_hp_fa',
			__( 'Featured Area/Slider', THEME_SLUG ),
			'vce_fa_metabox',
			'page',
			'normal',
			'high'
		);

		/* Modules metabox */
		add_meta_box(
			'vce_hp_modules',
			__( 'Modules', THEME_SLUG ),
			'vce_modules_metabox',
			'page',
			'normal',
			'high'
		);

		/* Authors Metabox */
		add_meta_box(
			'vce_authors',
			__( 'Authors', THEME_SLUG ),
			'vce_authors_metabox',
			'page',
			'side',
			'default'
		);

		/* Content metabox */
		add_meta_box(
			'vce_hp_content',
			__( 'Page Content/Editor Options', THEME_SLUG ),
			'vce_page_content_metabox',
			'page',
			'normal',
			'high'
		);


	}
endif;

/* Add post metaboxes */
if ( !function_exists( 'vce_load_post_metaboxes' ) ) :
	function vce_load_post_metaboxes() {

		/* Sidebar metabox */
		add_meta_box(
			'vce_sidebar',
			__( 'Sidebar', THEME_SLUG ),
			'vce_sidebar_metabox',
			'post',
			'side',
			'default'
		);

		/* Layout metabox */
		add_meta_box(
			'vce_layout',
			__( 'Layout', THEME_SLUG ),
			'vce_layout_metabox',
			'post',
			'side',
			'default'
		);

		/* Display options metabox */
		add_meta_box(
			'vce_display',
			__( 'Display Options', THEME_SLUG ),
			'vce_display_metabox',
			'post',
			'side',
			'default'
		);

	}
endif;




/* Create Sidebars Metabox */
if ( !function_exists( 'vce_sidebar_metabox' ) ) :
	function vce_sidebar_metabox( $object, $box ) {
		$vce_meta = vce_get_post_meta( $object->ID );
		$sidebars_lay = vce_get_sidebar_layouts( true );
		$sidebars = vce_get_sidebars_list( true );
?>
	  	<ul class="vce-img-select-wrap">
	  	<?php foreach ( $sidebars_lay as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = $id == $vce_meta['use_sidebar'] ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<span><?php echo $layout['title']; ?></span>
	  			<input type="radio" class="vce-hidden" name="vce[use_sidebar]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['use_sidebar'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>

	   <p class="description"><?php _e( 'Sidebar layout', THEME_SLUG ); ?></p>

	  <?php if ( !empty( $sidebars ) ): ?>

	  	<p><select name="vce[sidebar]" class="widefat">
	  	<?php foreach ( $sidebars as $id => $name ): ?>
	  		<option value="<?php echo $id; ?>" <?php selected( $id, $vce_meta['sidebar'] );?>><?php echo $name; ?></option>
	  	<?php endforeach; ?>
	  </select></p>
	  <p class="description"><?php _e( 'Choose standard sidebar to display', THEME_SLUG ); ?></p>

	  	<p><select name="vce[sticky_sidebar]" class="widefat">
	  	<?php foreach ( $sidebars as $id => $name ): ?>
	  		<option value="<?php echo $id; ?>" <?php selected( $id, $vce_meta['sticky_sidebar'] );?>><?php echo $name; ?></option>
	  	<?php endforeach; ?>
	  </select></p>
	  <p class="description"><?php _e( 'Choose sticky sidebar to display', THEME_SLUG ); ?></p>

	  <?php endif; ?>
	  <?php
	}
endif;

if ( !function_exists( 'vce_layout_metabox' ) ) :

	function vce_layout_metabox( $object, $box ) {
		$vce_meta = vce_get_post_meta( $object->ID );
		$layouts = vce_get_single_layout_opts( true );

?>
		<ul class="vce-img-select-wrap">
		<?php foreach ( $layouts as $id => $layout ): ?>
  		<li>
  			<?php $selected_class = $id == $vce_meta['layout'] ? ' selected': ''; ?>
  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
  			<span><?php echo $layout['title']; ?></span>
  			<input type="radio" class="vce-hidden" name="vce[layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['layout'] );?>/> </label>
  		</li>
	  	<?php endforeach; ?>
		</ul>
		<p class="description"><?php _e( 'Choose a layout for this post', THEME_SLUG ); ?></p>
		<?php
	}

endif;

/* Create Featured area Metabox */
if ( !function_exists( 'vce_fa_metabox' ) ) :
	function vce_fa_metabox( $object, $box ) {
		$vce_meta = vce_get_page_meta( $object->ID );
		$fa_layouts = vce_get_featured_area_layouts( false, true );
		$order = vce_get_post_order_opts();
		$cats = get_categories( array( 'hide_empty' => false, 'number' => 0 ) );
		$time = vce_get_time_diff_opts();
?>
	   <div class="vce-opt-item">
	   <strong><?php _e( 'Choose layout', THEME_SLUG ); ?>:</strong>
	   <ul class="vce-img-select-wrap">
	  	<?php foreach ( $fa_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $id, $vce_meta['fa_layout'] ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[fa_layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['fa_layout'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>
	   <p><strong><?php _e( 'Number of posts to show', THEME_SLUG ); ?>:</strong> <br/>
	   <input type="text" name="vce[fa_limit]" class="small-text" value="<?php echo $vce_meta['fa_limit']; ?>"/></p>
	   <p><strong><?php _e( 'Choose posts (or pages) manually', THEME_SLUG ); ?>:</strong>
	   <input type="text" name="vce[fa_manual]" value="<?php echo implode( ",", $vce_meta['fa_manual'] ); ?>" style="width: 100%;" /><br/>
	   <small class="howto"><?php _e( 'Specify post ids separated by comma if you want to select only those posts. i.e. 213,32,12,45', THEME_SLUG ); ?></small>
	   </p>
	  </div>


	   <div class="vce-opt-item">

	   		<?php if ( !empty( $cats ) ): ?>
	   		<strong><?php _e( 'Filter by category', THEME_SLUG ); ?>:</strong><br/>
	   		<div class="vce-item-scroll">
	   		<?php foreach ( $cats as $cat ) : ?>
	   			<?php $checked = in_array( $cat->term_id, $vce_meta['fa_cat'] ) ? 'checked="checked"' : ''; ?>
	   			<label><input type="checkbox" name="vce[fa_cat][]" value="<?php echo $cat->term_id ?>" <?php echo $checked; ?> /><?php echo $cat->name;?></label><br/>
	   		<?php endforeach; ?>
	   		</div>
	   		<br/>
	   		<label><input type="checkbox" name="vce[fa_cat_child]" value="1" class="vce-count-me" <?php checked( $vce_meta['fa_cat_child'], 1  );?>/><strong><?php _e( 'Apply child categories', THEME_SLUG ); ?></strong></label><br/>
		    		<small class="howto"><?php _e( 'If parent category is selected, posts from child categories will be included automatically', THEME_SLUG ); ?></small>
	   		<br/>
	   		<?php endif; ?>

	   		<strong><?php _e( 'Filter by tag', THEME_SLUG ); ?>:</strong><br/>
	   		<div class="tagsdiv" id="post_tag">
						<div class="jaxtag">
							<label class="screen-reader-text" for="newtag"><?php _e( 'Tags' ); ?></label>
							<input type="hidden" name="vce[fa_tag]" class="the-tags" id="tax-input[post_tag]" value="<?php echo  $vce_meta['fa_tag'];?>" />
							<div class="ajaxtag">
								<input type="text" name="newtag[post_tag]" class="newtag form-input-tip" size="16" autocomplete="off" value="" />
								<input type="button" class="button tagadd" value="<?php esc_attr_e( 'Add' ); ?>" />
							</div>
						</div>
						<div class="tagchecklist">
							<?php $meta_tags = explode( ',', $vce_meta['fa_tag'] ); if ( !empty( $meta_tags ) ): $tag_i = 0; foreach ( $meta_tags as $tag_name ) : ?>
								<span><a id="post_tag-check-num-<?php echo $i; ?>" class="ntdelbutton">X</a>&nbsp;<?php echo $tag_name; ?></span>
							<?php $tag_i++; endforeach; endif; ?>
						</div>
			</div>

	   </div>

	   <div class="vce-opt-item">
	   <strong><?php _e( 'Posts are not older than', THEME_SLUG ); ?>:</strong><br/>
	   <?php foreach ( $time['from'] as $id => $title ) : ?>
	   <label><input type="radio" name="vce[fa_time]" value="<?php echo $id; ?>" <?php checked( $vce_meta['fa_time'], $id ); ?> /><?php echo $title;?></label><br/>
	   <?php endforeach; ?>
	   <br/>
	   <strong><?php _e( 'Order posts by', THEME_SLUG ); ?>:</strong><br/>
	   <?php foreach ( $order as $id => $title ) : ?>
	   <label><input type="radio" name="vce[fa_order]" value="<?php echo $id; ?>" <?php checked( $vce_meta['fa_order'], $id ); ?> /><?php echo $title;?></label><br/>
	   <?php endforeach; ?>
	   </div>

	   <div class="clear"></div>
	   <p><label><input type="checkbox" name="vce[fa_exclude]" value="1" <?php checked( $vce_meta['fa_exclude'], 1 )?>/><strong><?php _e( 'Do not duplicate', THEME_SLUG ); ?></strong></label>
	   <br/>
	   <small class="howto"><?php _e( 'Check this option to always exclude featured area posts from modules below so they don\'t appear twice', THEME_SLUG ); ?></small></p>

	<?php
	}
endif;

/* Create Authors Metabox */
if ( !function_exists( 'vce_authors_metabox' ) ) :

	function vce_authors_metabox($object, $box) 
	{
		$vce_meta = vce_get_page_meta( $object->ID );

		//print_r($vce_meta['authors']);
		
		$order_opts = array(
			'post_count' => 'Post Count',
			'user_login' => 'Username',
			'display_name' => 'Display Name',
			'user_registered' => 'Registered Date'
		);

		?>

		<p><strong><?php _e('Order by',THEME_SLUG);?></strong></p>
		<?php foreach ($order_opts as $order_value => $order_name) : ?>
			<?php $checked = ($vce_meta['authors']['orderby'] == $order_value) ? 'checked' : '';?> 
			<input type="radio" name="vce[authors][orderby]" value="<?php echo $order_value;?>" <?php echo $checked;?>>
			<label for="vce[authors][orderby]"><?php echo $order_name;?></label><br/>

		<?php endforeach;?>

		<p><strong><?php _e('Order',THEME_SLUG);?></strong></p>
		<select name="vce[authors][order]">
			<option value="DESC" <?php selected($vce_meta['authors']['order'],'DESC');?>>Descending</option>
			<option value="ASC" <?php selected($vce_meta['authors']['order'],'ASC');?>>Ascending</option>
		</select>

		<p><strong><?php _e('Exclude authors',THEME_SLUG);?></strong></p>
		<input type="text" name="vce[authors][exclude]" value="<?php echo $vce_meta['authors']['exclude'];?>"><br>
		<small><?php _e('Enter author IDs separated by comma');?></small>

		<?php

	}

endif;

/* Create Modules Metabox */
if ( !function_exists( 'vce_modules_metabox' ) ) :
	function vce_modules_metabox( $object, $box ) {

		$vce_meta = vce_get_page_meta( $object->ID );

		$data = array(
			'layouts' => vce_get_main_layouts(),
			'starter_layouts' => vce_get_main_layouts( false, true ),
			'cats' => get_categories( array( 'hide_empty' => false, 'number' => 0 ) ),
			'order' => vce_get_post_order_opts(),
			'time' => vce_get_time_diff_opts(),
			'actions' => vce_get_module_actions(),
			'paginations' => vce_get_pagination_layouts()
		);

		$module_def = array(
			'layout' => 'c',
			'title' => '',
			'title_link' => '',
			'limit' => 4,
			'manual' => array(),
			'cat' => array(),
			'time' => 0,
			'timeto' => 0,
			'order' => 'date',
			'top_layout' => 0,
			'top_limit' => 2,
			'one_column' => 0,
			'action' => 0,
			'pagination' => 'load-more',
			'action_link_text' => 'View all',
			'action_link_url' => 'http://',
			'cat_child' => 0,
			'tag' => '',
			'type' => 'posts',
			'content' => '',
			'autoplay' => '',
			'exclude' => 0

		);

		//print_r($vce_meta['modules']);
?>

		<ul id="vce-modules-wrap">
			<?php if ( !empty( $vce_meta['modules'] ) ) : ?>
			<?php foreach ( $vce_meta['modules'] as $i => $module ) : $module = wp_parse_args( (array) $module, $module_def ); ?>
			<li data-module="<?php echo $i; ?>">
				<span class="module-title"><?php echo $module['title']; ?></span> <span class="actions"> <a href="#" class="vce-edit-module">Edit</a> | <a href="#" class="vce-remove-module">Remove</a></span>
				<?php if ( $module['type'] == 'posts' ) {
			vce_generate_module_field( $module, $i, $data );
		} else {
			vce_generate_blank_module_field( $module, $i, $data );
		} ?>
			</li>
			<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<p><a id="vce-add-module" href="javascript:void(0);" class="button-secondary"><?php _e( 'Add posts module', THEME_SLUG ); ?></a> <a id="vce-add-module-blank" href="javascript:void(0);" class="button-secondary"><?php _e( 'Add html/text module', THEME_SLUG ); ?></a></p>

		<div id="vce-modules-count" data-count="<?php echo count( $vce_meta['modules'] ); ?>"></div>

		<?php vce_generate_module_field( $module_def, false, $data ); ?>
		<?php vce_generate_blank_module_field( $module_def, false, $data ); ?>

	<?php
	}
endif;



/* Create Content metabox */
if ( !function_exists( 'vce_page_content_metabox' ) ) :
	function vce_page_content_metabox( $object, $box ) {
		$vce_meta = vce_get_page_meta( $object->ID );
?>
		<p><strong><?php _e( 'Display page content:', THEME_SLUG ); ?></strong></p>

	  	<label><input type="radio" name="vce[display_content][position]" value="up" <?php checked( 'up', $vce_meta['display_content']['position'] );?>/> <?php _e( 'Above modules', THEME_SLUG ); ?></label><br/>
	  	<label><input type="radio" name="vce[display_content][position]" value="down" <?php checked( 'down', $vce_meta['display_content']['position'] );?>/> <?php _e( 'Below modules', THEME_SLUG ); ?></label><br/>
	  	<label><input type="radio" name="vce[display_content][position]" value="0" <?php checked( '0', $vce_meta['display_content']['position'] );?>/> <?php _e( 'Do not display', THEME_SLUG ); ?></label><br/><br/>

	  	<p><strong><?php _e( 'Style:', THEME_SLUG ); ?></strong></p>

	  	<label><input type="radio" name="vce[display_content][style]" value="wrap" <?php checked( 'wrap', $vce_meta['display_content']['style'] );?>/> <?php _e( 'Wrapped in box', THEME_SLUG ); ?></label><br/>
	  	<label><input type="radio" name="vce[display_content][style]" value="unwrap" <?php checked( 'unwrap', $vce_meta['display_content']['style'] );?>/> <?php _e( 'Unwrapped (transparent background)', THEME_SLUG ); ?></label><br/>

	  	<p><strong><?php _e( 'Width:', THEME_SLUG ); ?></strong></p>

	  	<label><input type="radio" name="vce[display_content][width]" value="container" <?php checked( 'container', $vce_meta['display_content']['width'] );?>/> <?php _e( 'Container/page width', THEME_SLUG ); ?></label><br/>
	  	<label><input type="radio" name="vce[display_content][width]" value="full" <?php checked( 'full', $vce_meta['display_content']['width'] );?>/> <?php _e( 'Full/browser width', THEME_SLUG ); ?></label><br/><br/>

	   	<p class="description"><?php _e( 'Manage display options for content/editor on this page', THEME_SLUG ); ?></p>

	  <?php
	}
endif;

/* Create Display Options Metabox */
if ( !function_exists( 'vce_display_metabox' ) ) :
	function vce_display_metabox( $object, $box ) {
		$vce_meta = vce_get_post_meta( $object->ID );
?>
	   <p class="description"><?php _e( 'Override display options for this particular post instead of using global options set in Theme Options -> Single Post', THEME_SLUG ); ?></p>
	   <p><label><?php _e( 'Category link', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_cat', $vce_meta['display']['show_cat'] ) ?></p>
	   <p><label><?php _e( 'Featured image', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_fimg', $vce_meta['display']['show_fimg'] ) ?></p>
	   <p><label><?php _e( 'Author image', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_author_img', $vce_meta['display']['show_author_img'] ) ?></p>
	   <p><label><?php _e( 'Headline (excerpt)', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_headline', $vce_meta['display']['show_headline'] ) ?></p>
	   <p><label><?php _e( 'Tags', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_tags', $vce_meta['display']['show_tags'] ) ?></p>
	   <p><label><?php _e( 'Prev/next posts', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_prev_next', $vce_meta['display']['show_prev_next'] ) ?></p>
	   <p><label><?php _e( 'Related posts', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_related', $vce_meta['display']['show_related'] ) ?></p>
	   <p><label><?php _e( 'Author box', THEME_SLUG ); ?>:</label> <?php vce_post_display_option( 'show_author_box', $vce_meta['display']['show_author_box'] ) ?></p>
	  <?php
	}
endif;

/* Create Display Options Metabox */
if ( !function_exists( 'vce_post_display_option' ) ) :
	function vce_post_display_option( $option_name, $selected = 'inherit' ) {
		$options = array( 'inherit' => __( 'Inherit', THEME_SLUG ), 'on' => __( 'On', THEME_SLUG ), 'off' => __( 'Off', THEME_SLUG ) );
?>
		 <select name="vce[display][<?php echo $option_name;?>]" class="vce-single-display-opt">
		 	<?php foreach ( $options as $val => $label ): ?>
		 		<option value="<?php echo $val; ?>" <?php selected( $selected, $val, true ); ?>><?php echo $label; ?></option>
		 	<?php endforeach; ?>
		 </select>
		<?php
	}
endif;



/* Save Page Meta */
if ( !function_exists( 'vce_save_page_metaboxes' ) ) :
	function vce_save_page_metaboxes( $post_id, $post ) {
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		if ( isset( $_POST['vce_page_nonce'] ) ) {
			if ( !wp_verify_nonce( $_POST['vce_page_nonce'], __FILE__  ) )
				return;
		}

		if ( $post->post_type == 'page' && isset( $_POST['vce'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;

			$vce_meta = array();

			$vce_meta['use_sidebar'] = isset( $_POST['vce']['use_sidebar'] ) ? $_POST['vce']['use_sidebar'] : 0;
			$vce_meta['sidebar'] = isset( $_POST['vce']['sidebar'] ) ? $_POST['vce']['sidebar'] : 0;
			$vce_meta['sticky_sidebar'] = isset( $_POST['vce']['sticky_sidebar'] ) ? $_POST['vce']['sticky_sidebar'] : 0;

			$vce_meta['fa_layout'] = isset( $_POST['vce']['fa_layout'] ) ? $_POST['vce']['fa_layout'] : 0;

			if ( $vce_meta['fa_layout'] ) {
				$vce_meta['fa_limit'] = isset( $_POST['vce']['fa_limit'] ) ? absint( $_POST['vce']['fa_limit'] ) : 0;
				$vce_meta['fa_time'] = isset( $_POST['vce']['fa_time'] ) ? $_POST['vce']['fa_time'] : 0;
				$vce_meta['fa_order'] = isset( $_POST['vce']['fa_order'] ) ? $_POST['vce']['fa_order'] : 0;
				$vce_meta['fa_exclude'] = isset( $_POST['vce']['fa_exclude'] ) ? $_POST['vce']['fa_exclude'] : 0;
				$vce_meta['fa_cat'] = isset( $_POST['vce']['fa_cat'] ) ? $_POST['vce']['fa_cat'] : array();
				$vce_meta['fa_tag'] = isset( $_POST['vce']['fa_tag'] ) ? $_POST['vce']['fa_tag'] : '';
				$vce_meta['fa_cat_child'] = isset( $_POST['vce']['fa_cat_child'] ) ? $_POST['vce']['fa_cat_child'] : 0;
				if ( isset( $_POST['vce']['fa_manual'] ) && !empty( $_POST['vce']['fa_manual'] ) ) {
					$vce_meta['fa_manual'] = array_map( 'absint', explode( ",", $_POST['vce']['fa_manual'] ) );
				}

				$fa_tags = explode( ",", $vce_meta['fa_tag'] );
				if ( $fa_tags ) {
					foreach ( $fa_tags as $fa_tag ) {
						wp_insert_term( $fa_tag, 'post_tag' );
					}
				}


			}

			if ( isset( $_POST['vce']['authors'] ) ) {
				$vce_meta['authors'] = array();
				$vce_meta['authors']['orderby'] = isset( $_POST['vce']['authors']['orderby'] ) ? $_POST['vce']['authors']['orderby'] : 0;
				$vce_meta['authors']['order'] = isset( $_POST['vce']['authors']['order'] ) ? $_POST['vce']['authors']['order'] : 'DESC';
				$vce_meta['authors']['exclude'] = isset( $_POST['vce']['authors']['exclude'] ) ? $_POST['vce']['authors']['exclude'] : '';
			}

			if ( isset( $_POST['vce']['modules'] ) ) {
				$vce_meta['modules'] = array_values( $_POST['vce']['modules'] );
				foreach ( $vce_meta['modules'] as $i => $module ) {
					if ( isset( $module['manual'] ) && !empty( $module['manual'] ) ) {
						$vce_meta['modules'][$i]['manual'] = array_map( 'absint', explode( ",", $module['manual'] ) );
					}

					if ( isset( $module['tag'] ) && !empty( $module['tag'] ) ) {
						$module_tags = explode( ",", $module['tag'] );{
							foreach ( $module_tags as $module_tag ) {
								wp_insert_term( $module_tag, 'post_tag' );
							}
						}
					}
				}

			}

			$vce_meta['display_content'] = isset( $_POST['vce']['display_content'] ) ? $_POST['vce']['display_content'] : array();

			update_post_meta( $post_id, '_vce_meta', $vce_meta );

		}
	}
endif;

/* Save Post Meta */
if ( !function_exists( 'vce_save_post_metaboxes' ) ) :
	function vce_save_post_metaboxes( $post_id, $post ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		if ( isset( $_POST['vce_post_nonce'] ) ) {
			if ( !wp_verify_nonce( $_POST['vce_post_nonce'], __FILE__  ) )
				return;
		}


		if ( $post->post_type == 'post' && isset( $_POST['vce'] ) ) {
			$post_type = get_post_type_object( $post->post_type );
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
				return $post_id;

			$vce_meta = array();

			$vce_meta['use_sidebar'] = isset( $_POST['vce']['use_sidebar'] ) ? $_POST['vce']['use_sidebar'] : 0;
			$vce_meta['sidebar'] = isset( $_POST['vce']['sidebar'] ) ? $_POST['vce']['sidebar'] : 0;
			$vce_meta['sticky_sidebar'] = isset( $_POST['vce']['sticky_sidebar'] ) ? $_POST['vce']['sticky_sidebar'] : 0;
			$vce_meta['layout'] = isset( $_POST['vce']['layout'] ) ? $_POST['vce']['layout'] : 0;

			if ( isset( $_POST['vce']['display'] ) && !empty( $_POST['vce']['display'] ) ) {
				foreach ( $_POST['vce']['display'] as $key => $value ) {
					if ( $value != 'inherit' ) {
						$vce_meta['display'][$key] = $value;
					}
				}
			}

			update_post_meta( $post_id, '_vce_meta', $vce_meta );

		}
	}
endif;


/* Add metaboxes to category */

if ( !function_exists( 'vce_category_add_meta_fields' ) ) :
	function vce_category_add_meta_fields() {
		$vce_meta = vce_get_category_meta();
		$sidebars_lay = vce_get_sidebar_layouts( true );
		$sidebars = vce_get_sidebars_list( true );
		$post_layouts = vce_get_main_layouts( true, false );
		$starter_layouts = vce_get_main_layouts( true, true );
		$fa_layouts = vce_get_featured_area_layouts( true, true );
?>
	 <div class="form-field">
	  	<label><?php _e( 'Featured area layout', THEME_SLUG ); ?></label>
	  	<ul class="vce-img-select-wrap next-hide">
	  	<?php foreach ( $fa_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['fa_layout'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[fa_layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['fa_layout'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>
	   <p class="description"><?php _e( 'Choose featured area layout', THEME_SLUG ); ?></p>
	 </div>

	 <?php $style = $vce_meta['fa_layout'] == 'inherit' || !$vce_meta['fa_layout'] ? 'style="display:none"' : ''; ?>
	 <div class="form-field"  <?php echo $style; ?>>
	  	<label><?php _e( 'Featured posts limit', THEME_SLUG ); ?></label>
	  	<input type="text" name="vce[fa_limit]" value="<?php echo $vce_meta['fa_limit']; ?>" style="width: 30px;"/> <?php _e( 'post(s)', THEME_SLUG ); ?>
	 </div>

	 <div class="form-field">
	  	<label><?php _e( 'Posts main layout', THEME_SLUG ); ?></label>
	  	<ul class="vce-img-select-wrap next-hide">
	  	<?php foreach ( $post_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['layout'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['layout'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>
	   <p class="description"><?php _e( 'Choose posts layout for this category', THEME_SLUG ); ?></p>
	 </div>

	 <?php $style = $vce_meta['layout'] == 'inherit' ? 'style="display:none"' : ''; ?>
	  <div class="form-field" <?php echo $style; ?>>
	  		<label><?php _e( 'Number of posts per page', THEME_SLUG ); ?></label>
		  	<input type="text" name="vce[ppp]" value="<?php echo $vce_meta['ppp']; ?>" style="width: 30px;"/> <?php _e( 'post(s)', THEME_SLUG ); ?><br/>
		  	<small  class="description"><?php _e( 'Note: leave empty if you want to inherit from global category option', THEME_SLUG ); ?></small>
	  </div>

	 <div class="form-field">
	  	<label><?php _e( 'Starter posts', THEME_SLUG ); ?></label>
	  	<ul class="vce-img-select-wrap next-hide">
	  	<?php foreach ( $starter_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['top_layout'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[top_layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['top_layout'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>
	   <p class="description"><?php _e( 'Check if you want to use starter posts', THEME_SLUG ); ?></p>
	 </div>

	 <?php $style = $vce_meta['top_layout'] == 'inherit' || !$vce_meta['top_layout'] ? 'style="display:none"' : ''; ?>
	 <div class="form-field"  <?php echo $style; ?>>
	  	<label><?php _e( 'Starter posts limit', THEME_SLUG ); ?></label>
	  	<input type="text" name="vce[top_limit]" value="<?php echo $vce_meta['top_limit']; ?>" style="width: 30px;"/> <?php _e( 'post(s)', THEME_SLUG ); ?>
	 </div>

	 <div class="form-field">
	  	<label><?php _e( 'Sidebar layout', THEME_SLUG ); ?></label>
	  	<ul class="vce-img-select-wrap">
	  	<?php foreach ( $sidebars_lay as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['use_sidebar'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[use_sidebar]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['use_sidebar'] );?>/> </label>
	  		</li>
	  	<?php endforeach; ?>
	   </ul>
	   <p class="description"><?php _e( 'Choose sidebar layout', THEME_SLUG ); ?></p>
	 </div>

	  <?php if ( !empty( $sidebars ) ): ?>
	  <div class="form-field">
	  <label><?php _e( 'Standard sidebar', THEME_SLUG ); ?></label>
	  	<select name="vce[sidebar]" class="widefat">
	  	<?php foreach ( $sidebars as $id => $name ): ?>
	  		<option value="<?php echo $id; ?>" <?php selected( $id, $vce_meta['sidebar'] );?>><?php echo $name; ?></option>
	  	<?php endforeach; ?>
	  </select>
	  <p class="description"><?php _e( 'Choose standard sidebar to display', THEME_SLUG ); ?></p>
	  </div>
	  <div class="form-field">
	  <label><?php _e( 'Sticky sidebar', THEME_SLUG ); ?></label>
	  <select name="vce[sticky_sidebar]" class="widefat">
	  	<?php foreach ( $sidebars as $id => $name ): ?>
	  		<option value="<?php echo $id; ?>" <?php selected( $id, $vce_meta['sticky_sidebar'] );?>><?php echo $name; ?></option>
	  	<?php endforeach; ?>
	  </select>
	   <p class="description"><?php _e( 'Choose sticky sidebar to display', THEME_SLUG ); ?></p>
	   </div>
	  <?php endif; ?>

	  <?php

		$most_used = get_option( 'vce_recent_cat_colors' );

		$colors = '';

		if ( !empty( $most_used ) ) {
			$colors .= '<p>'.__( 'Recently used', THEME_SLUG ).': <br/>';
			foreach ( $most_used as $color ) {
				$colors .= '<a href="#" style="width: 20px; height: 20px; background: '.$color.'; float: left; margin-right:3px; border: 1px solid #aaa;" class="vce_colorpick" data-color="'.$color.'"></a>';
			}
			$colors .= '</p>';
		}

?>

	 <div class="form-field">
		 <label><?php _e( 'Color', THEME_SLUG ); ?></label><br/>
		 <label><input type="radio" name="vce[color_type]" value="inherit" class="vce-radio color-type" <?php checked( $vce_meta['color_type'], 'inherit' );?>> <?php _e( 'Inherit from default accent color', THEME_SLUG ); ?></label>
		 <label><input type="radio" name="vce[color_type]" value="custom" class="vce-radio color-type" <?php checked( $vce_meta['color_type'], 'custom' );?>> <?php _e( 'Custom', THEME_SLUG ); ?></label>
		 <div id="vce_color_wrap">
		 <p>
		   	<input name="vce[color]" type="text" class="vce_colorpicker" value="<?php echo $vce_meta['color']; ?>" data-default-color="<?php echo $vce_meta['color']; ?>"/>
		 </p>
		 <?php if ( !empty( $colors ) ) { echo $colors; } ?>
		 </div>
		 <div class="clear"></div>
		 <p class="howto"><?php _e( 'Choose color', THEME_SLUG ); ?></p>
	 </div>

	<?php
	}
endif;

add_action( 'category_add_form_fields', 'vce_category_add_meta_fields', 10, 2 );

if ( !function_exists( 'vce_category_edit_meta_fields' ) ) :
	function vce_category_edit_meta_fields( $term ) {
		$vce_meta = vce_get_category_meta( $term->term_id );
		$sidebars_lay = vce_get_sidebar_layouts( true );
		$sidebars = vce_get_sidebars_list( true );
		$post_layouts = vce_get_main_layouts( true );
		$starter_layouts = vce_get_main_layouts( true, true );
		$fa_layouts = vce_get_featured_area_layouts( true, true );
?>
	  <tr class="form-field">
		<th scope="row" valign="top">
	  		<label><?php _e( 'Featured area layout', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<ul class="vce-img-select-wrap next-hide">
	  		<?php foreach ( $fa_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['fa_layout'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[fa_layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['fa_layout'] );?>/> </label>
	  		</li>
	  		<?php endforeach; ?>
	   		</ul>
		   	<p class="description"><?php _e( 'Choose featured area layout', THEME_SLUG ); ?></p>
	 	</td>
	  </tr>

	  <?php $style = $vce_meta['fa_layout'] == 'inherit' || !$vce_meta['fa_layout'] ? 'style="display:none"' : ''; ?>
	  <tr class="form-field" <?php echo $style; ?>>
		<th scope="row" valign="top">
	  		<label><?php _e( 'Featured area posts limit', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<input type="text" name="vce[fa_limit]" value="<?php echo $vce_meta['fa_limit']; ?>" style="width: 30px;"/> <?php _e( 'post(s)', THEME_SLUG ); ?>
	 	</td>
	  </tr>

	  <tr class="form-field">
		<th scope="row" valign="top">
	  		<label><?php _e( 'Posts main layout', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<ul class="vce-img-select-wrap next-hide">
	  		<?php foreach ( $post_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['layout'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['layout'] );?>/> </label>
	  		</li>
	  		<?php endforeach; ?>
	   		</ul>
		   	<p class="description"><?php _e( 'Choose posts layout for this category', THEME_SLUG ); ?></p>
	 	</td>
	  </tr>

	  <?php $style = $vce_meta['layout'] == 'inherit' ? 'style="display:none"' : ''; ?>
	  <tr class="form-field" <?php echo $style; ?>>
		<th scope="row" valign="top">
	  		<label><?php _e( 'Number of posts per page', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<input type="text" name="vce[ppp]" value="<?php echo $vce_meta['ppp']; ?>" style="width: 30px;"/> <?php _e( 'post(s)', THEME_SLUG ); ?><br/>
		  	<small  class="description"><?php _e( 'Note: leave empty if you want to inherit from global category option', THEME_SLUG ); ?></small>
	 	</td>
	  </tr>

	  <tr class="form-field">
		<th scope="row" valign="top">
	  		<label><?php _e( 'Starter posts layout', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<ul class="vce-img-select-wrap next-hide">
	  		<?php foreach ( $starter_layouts as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['top_layout'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[top_layout]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['top_layout'] );?>/> </label>
	  		</li>
	  		<?php endforeach; ?>
	       </ul>

		   	<p class="description"><?php _e( 'Check if you want to use starter posts', THEME_SLUG ); ?></p>
	 	</td>
	  </tr>

	  <?php $style = $vce_meta['top_layout'] == 'inherit' || !$vce_meta['top_layout'] ? 'style="display:none"' : ''; ?>
	  <tr class="form-field" <?php echo $style; ?>>
		<th scope="row" valign="top">
	  		<label><?php _e( 'Starter posts limit', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<input type="text" name="vce[top_limit]" value="<?php echo $vce_meta['top_limit']; ?>" style="width: 30px;"/> <?php _e( 'post(s)', THEME_SLUG ); ?>
	 	</td>
	  </tr>


	  <tr class="form-field">
		<th scope="row" valign="top">
	  		<label><?php _e( 'Sidebar layout', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<ul class="vce-img-select-wrap">
	  		<?php foreach ( $sidebars_lay as $id => $layout ): ?>
	  		<li>
	  			<?php $selected_class = vce_compare( $vce_meta['use_sidebar'], $id ) ? ' selected': ''; ?>
	  			<img src="<?php echo $layout['img']; ?>" title="<?php echo $layout['title']; ?>" class="vce-img-select<?php echo $selected_class; ?>">
	  			<input type="radio" class="vce-hidden" name="vce[use_sidebar]" value="<?php echo $id; ?>" <?php checked( $id, $vce_meta['use_sidebar'] );?>/> </label>
	  		</li>
	  		<?php endforeach; ?>
	   </ul>
		   	<p class="description"><?php _e( 'Choose sidebar layout', THEME_SLUG ); ?></p>
	 	</td>
	  </tr>

	  <tr class="form-field">
		<th scope="row" valign="top">
	  		<label><?php _e( 'Standard sidebar', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
			<select name="vce[sidebar]" class="widefat">
			<?php foreach ( $sidebars as $id => $name ): ?>
				<option value="<?php echo $id; ?>" <?php selected( $id, $vce_meta['sidebar'] );?>><?php echo $name; ?></option>
			<?php endforeach; ?>
			</select>
			<p class="description"><?php _e( 'Choose standard sidebar to display', THEME_SLUG ); ?></p>
	  	</td>
	  </tr>
	  <tr class="form-field">
		<th scope="row" valign="top">
	  		<label><?php _e( 'Sticky sidebar', THEME_SLUG ); ?></label>
	  	</th>
	  	<td>
		  	<select name="vce[sticky_sidebar]" class="widefat">
		  	<?php foreach ( $sidebars as $id => $name ): ?>
		  		<option value="<?php echo $id; ?>" <?php selected( $id, $vce_meta['sticky_sidebar'] );?>><?php echo $name; ?></option>
		  	<?php endforeach; ?>
		  	</select>
		    <p class="description"><?php _e( 'Choose sticky sidebar to display', THEME_SLUG ); ?></p>
	   </td>
	 </tr>

	 <?php

		$most_used = get_option( 'vce_recent_cat_colors' );

		$colors = '';

		if ( !empty( $most_used ) ) {
			$colors .= '<p>'.__( 'Recently used', THEME_SLUG ).': <br/>';
			foreach ( $most_used as $color ) {
				$colors .= '<a href="#" style="width: 20px; height: 20px; background: '.$color.'; float: left; margin-right:3px; border: 1px solid #aaa;" class="vce_colorpick" data-color="'.$color.'"></a>';
			}
			$colors .= '</p>';
		}

?>

	 <tr class="form-field">
		<th scope="row" valign="top"><label><?php _e( 'Color', THEME_SLUG ); ?></label></th>
			<td>
				<label><input type="radio" name="vce[color_type]" value="inherit" class="vce-radio color-type" <?php checked( $vce_meta['color_type'], 'inherit' );?>> <?php _e( 'Inherit from default accent color', THEME_SLUG ); ?></label> <br/>
				<label><input type="radio" name="vce[color_type]" value="custom" class="vce-radio color-type" <?php checked( $vce_meta['color_type'], 'custom' );?>> <?php _e( 'Custom', THEME_SLUG ); ?></label>
			  <div id="vce_color_wrap">
			  <p>
			    	<input name="vce[color]" type="text" class="vce_colorpicker" value="<?php echo $vce_meta['color']; ?>" data-default-color="<?php echo $vce_meta['color']; ?>"/>
			  </p>
			  <?php if ( !empty( $colors ) ) { echo $colors; } ?>
				</div>
				<div class="clear"></div>
				<p class="howto"><?php _e( 'Choose color', THEME_SLUG ); ?></p>
			</td>
		</tr>

	<?php
	}
endif;

add_action( 'category_edit_form_fields', 'vce_category_edit_meta_fields', 10, 2 );


if ( !function_exists( 'vce_save_category_meta_fields' ) ) :
	function vce_save_category_meta_fields( $term_id ) {

		if ( isset( $_POST['vce'] ) ) {

			$vce_meta = array();

			$vce_meta['layout'] = isset( $_POST['vce']['layout'] ) ? $_POST['vce']['layout'] : 0;
			$vce_meta['ppp'] = isset( $_POST['vce']['ppp'] ) && !empty( $_POST['vce']['ppp'] ) ? absint( $_POST['vce']['ppp'] ) : '';
			$vce_meta['top_layout'] = isset( $_POST['vce']['top_layout'] ) ? $_POST['vce']['top_layout'] : 0;
			$vce_meta['top_limit'] = isset( $_POST['vce']['top_limit'] ) ? $_POST['vce']['top_limit'] : 0;
			$vce_meta['fa_layout'] = isset( $_POST['vce']['fa_layout'] ) ? $_POST['vce']['fa_layout'] : 0;
			$vce_meta['fa_limit'] = isset( $_POST['vce']['fa_limit'] ) ? $_POST['vce']['fa_limit'] : 0;
			$vce_meta['use_sidebar'] = isset( $_POST['vce']['use_sidebar'] ) ? $_POST['vce']['use_sidebar'] : 0;
			$vce_meta['sidebar'] = isset( $_POST['vce']['sidebar'] ) ? $_POST['vce']['sidebar'] : 0;
			$vce_meta['sticky_sidebar'] = isset( $_POST['vce']['sticky_sidebar'] ) ? $_POST['vce']['sticky_sidebar'] : 0;
			$vce_meta['color_type'] = isset( $_POST['vce']['color_type'] ) ? $_POST['vce']['color_type'] : 0;
			$vce_meta['color'] = isset( $_POST['vce']['color'] ) ? $_POST['vce']['color'] : 0;

			update_option( '_vce_category_'.$term_id, $vce_meta );

			if ( $vce_meta['color_type'] == 'custom' ) {
				vce_update_recent_cat_colors( $vce_meta['color'] );
			}

			vce_update_cat_colors( $term_id, $vce_meta['color'], $vce_meta['color_type'] );
		}

	}
endif;

add_action( 'edited_category', 'vce_save_category_meta_fields', 10, 2 );
add_action( 'create_category', 'vce_save_category_meta_fields', 10, 2 );




?>