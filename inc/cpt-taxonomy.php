<?php
/**
 * Setting up Custom Post Types for Portfolio.
 *
 * @package coulson
 */

/**  Adding custom post types */
function coulson_register_custom_post_types() {

	// Projects CPT.
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name' ),
		'singular_name'      => _x( 'Project', 'post type singular name' ),
		'menu_name'          => _x( 'Projects', 'admin menu' ),
		'name_admin_bar'     => _x( 'Projects', 'add new on admin bar' ),
		'add_new'            => _x( 'Add New', 'Project' ),
		'add_new_item'       => __( 'Add New Project' ),
		'new_item'           => __( 'New Project' ),
		'edit_item'          => __( 'Edit Project' ),
		'view_item'          => __( 'View Projects' ),
		'all_items'          => __( 'All Projects' ),
		'search_items'       => __( 'Search Projects' ),
		'parent_item_colon'  => __( 'Parent Project:' ),
		'not_found'          => __( 'No Projects found.' ),
		'not_found_in_trash' => __( 'No Projects found in Trash.' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
        'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'show_in_rest'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'coulson-projects' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-hammer',
	);
	register_post_type( 'coulson-projects', $args );

}
add_action( 'init', 'coulson_register_custom_post_types', 0 );

/**  Register custom taxonomies for post types */
function coulson_register_taxonomies() {

	// Taxonomy for projects CPT - Project Type (Faculty and Administrative).
	$labels = array(
		'name'              => _x( 'Project Type', 'taxonomy general name' ),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Project Types' ),
		'all_items'         => __( 'All Project Types' ),
		'parent_item'       => __( 'Parent Project Type' ),
		'parent_item_colon' => __( 'Parent Project Type:' ),
		'edit_item'         => __( 'Edit Project Type' ),
		'update_item'       => __( 'Update Project Type' ),
		'add_new_item'      => __( 'Add New Project Type' ),
		'new_item_name'     => __( 'New Project Type' ),
		'menu_name'         => __( 'Project Type' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'project-type' ),
	);

	register_taxonomy( 'coulson-project-type', array( 'coulson-projects' ), $args );
}
add_action( 'init', 'coulson_register_taxonomies' );

/** Flushes rewrites if theme is switched */
function coulson_rewrite_flush() {
	coulson_register_custom_post_types();
	coulson_register_taxonomies();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'coulson_rewrite_flush' );
