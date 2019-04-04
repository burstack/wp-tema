<?php
// CUSTOM SECTION FRONT-PAGE
// Register Custom Post Type Front-page
// Post Type Key: frontpage
function create_frontpage_cpt() {

	$labels = array(
		'name' => __( 'Front-pages', 'Post Type General Name', 'skyfarm' ),
		'singular_name' => __( 'Front-page', 'Post Type Singular Name', 'skyfarm' ),
		'menu_name' => __( 'The Front Page', 'skyfarm' ),
		'name_admin_bar' => __( 'Front-page', 'skyfarm' ),
		'archives' => __( 'Front-page Archives', 'skyfarm' ),
		'attributes' => __( 'Front-page Attributes', 'skyfarm' ),
		'parent_item_colon' => __( 'Parent Front-page:', 'skyfarm' ),
		'all_items' => __( 'All Front-pages', 'skyfarm' ),
		'add_new_item' => __( 'Add New Front-page', 'skyfarm' ),
		'add_new' => __( 'Add New', 'skyfarm' ),
		'new_item' => __( 'New Front-page', 'skyfarm' ),
		'edit_item' => __( 'Edit Front-page', 'skyfarm' ),
		'update_item' => __( 'Update Front-page', 'skyfarm' ),
		'view_item' => __( 'View Front-page', 'skyfarm' ),
		'view_items' => __( 'View Front-pages', 'skyfarm' ),
		'search_items' => __( 'Search Front-page', 'skyfarm' ),
		'not_found' => __( 'Not found', 'skyfarm' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'skyfarm' ),
		'featured_image' => __( 'Featured Image', 'skyfarm' ),
		'set_featured_image' => __( 'Set featured image', 'skyfarm' ),
		'remove_featured_image' => __( 'Remove featured image', 'skyfarm' ),
		'use_featured_image' => __( 'Use as featured image', 'skyfarm' ),
		'insert_into_item' => __( 'Insert into Front-page', 'skyfarm' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Front-page', 'skyfarm' ),
		'items_list' => __( 'Front-pages list', 'skyfarm' ),
		'items_list_navigation' => __( 'Front-pages list navigation', 'skyfarm' ),
		'filter_items_list' => __( 'Filter Front-pages list', 'skyfarm' ),
	);
	$args = array(
		'label' => __( 'Front-page', 'skyfarm' ),
		'description' => __( 'What goes on the Front-page', 'skyfarm' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-welcome-view-site',
		'supports' => array('title'),
		'taxonomies' => array(),
		'public' => false,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 6,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => false,
		'has_archive' => false,
		'hierarchical' => false,
		'exclude_from_search' => true,
		'show_in_rest' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'frontpage', $args );

}
add_action( 'init', 'create_frontpage_cpt', 0 );
// CUSTOM SECTION FRONT-PAGE end
