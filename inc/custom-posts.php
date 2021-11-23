<?php

add_action('init', 'parent_register_position_type');
function parent_register_position_type()
{
	$args = [
		'label' => esc_html__('Job Positions', 'text-domain'),
		'labels' => [
			'menu_name' => esc_html__('Job Positions', 'parents'),
			'name_admin_bar' => esc_html__('Job Position', 'parents'),
			'add_new' => esc_html__('Add Job Position', 'parents'),
			'add_new_item' => esc_html__('Add new Job Position', 'parents'),
			'new_item' => esc_html__('New Job Position', 'parents'),
			'edit_item' => esc_html__('Edit Job Position', 'parents'),
			'view_item' => esc_html__('View Job Position', 'parents'),
			'update_item' => esc_html__('View Job Position', 'parents'),
			'all_items' => esc_html__('All Job Positions', 'parents'),
			'search_items' => esc_html__('Search Job Positions', 'parents'),
			'parent_item_colon' => esc_html__('Parent Job Position', 'parents'),
			'not_found' => esc_html__('No Job Positions found', 'parents'),
			'not_found_in_trash' => esc_html__('No Job Positions found in Trash', 'parents'),
			'name' => esc_html__('Job Positions', 'parents'),
			'singular_name' => esc_html__('Job Position', 'parents'),
		],
		'public' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'public' => true,
		'show_ui' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'show_in_rest' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite_no_front' => false,
		'show_in_menu' => true,
		'menu_icon' => 'dashicons-list-view',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		'taxonomies' => [
			'category'
		],

		'rewrite' => true
	];

	register_post_type('job-position', $args);
}

if (is_admin()) {

	/*
	 * prefix of meta keys, optional
	 */
	$prefix = 'pa_';
	/*
	 * configure your meta box
	 */
	$config = array(
		'id' => 'demo_meta_box',          // meta box id, unique per meta box
		'title' => 'Position Fields',          // meta box title
		'pages' => array('job-position'),        // taxonomy name, accept categories, post_tag and custom taxonomies
		'context' => 'normal',            // where the meta box appear: normal (default), advanced, side; optional
		'priority' => 'high',
		'fields' => array(),            // list of meta fields (can be added by field arrays)
		'local_images' => false,          // Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => get_template_directory() . '/inc/tax-meta-class'          //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);


	/*
	 * Initiate your meta box
	 */
	$my_meta = new AT_Meta_Box($config);

	/*
	 * Add fields to your meta box
	 */

	//text field
	$my_meta->addText($prefix . 'experience', array('name' => __('Position Experience ', 'parents')));
	$my_meta->addText($prefix . 'work_level', array('name' => __('Position Work Level ', 'parents')));
	$my_meta->addText($prefix . 'employee_type', array('name' => __('Position Employee Type', 'parents')));
	$my_meta->addText($prefix . 'location', array('name' => __('Position Location', 'parents')));
	$my_meta->addTaxonomy($prefix . 'category', array('taxonomy' => 'category'), array('name' => __('Position Category ', 'tax-meta')));
	//posts field
//	$my_meta->addPosts($prefix . 'posts_field_id', array('args' => array('post_type' => 'page')), array('name' => __('My Posts ', 'tax-meta')));

	//Finish Meta Box Decleration
	$my_meta->Finish();
}
