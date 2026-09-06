<?php

/**
 * Register Pricing Items Custom Post Type
 *
 * @package ReyoungSkin
 */

function reyoungskin_register_pricing_cpt() {
	$labels = array(
		'name'                  => _x( 'Pricing Items', 'Post Type General Name', 'reyoungskin' ),
		'singular_name'         => _x( 'Pricing Item', 'Post Type Singular Name', 'reyoungskin' ),
		'menu_name'             => __( 'Pricing Items', 'reyoungskin' ),
		'name_admin_bar'        => __( 'Pricing Item', 'reyoungskin' ),
		'archives'              => __( 'Item Archives', 'reyoungskin' ),
		'attributes'            => __( 'Item Attributes', 'reyoungskin' ),
		'parent_item_colon'     => __( 'Parent Item:', 'reyoungskin' ),
		'all_items'             => __( 'All Pricing Items', 'reyoungskin' ),
		'add_new_item'          => __( 'Add New Pricing Item', 'reyoungskin' ),
		'add_new'               => __( 'Add New', 'reyoungskin' ),
		'new_item'              => __( 'New Item', 'reyoungskin' ),
		'edit_item'             => __( 'Edit Item', 'reyoungskin' ),
		'update_item'           => __( 'Update Item', 'reyoungskin' ),
		'view_item'             => __( 'View Item', 'reyoungskin' ),
		'view_items'            => __( 'View Items', 'reyoungskin' ),
		'search_items'          => __( 'Search Item', 'reyoungskin' ),
		'not_found'             => __( 'Not found', 'reyoungskin' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'reyoungskin' ),
		'featured_image'        => __( 'Featured Image', 'reyoungskin' ),
		'set_featured_image'    => __( 'Set featured image', 'reyoungskin' ),
		'remove_featured_image' => __( 'Remove featured image', 'reyoungskin' ),
		'use_featured_image'    => __( 'Use as featured image', 'reyoungskin' ),
		'insert_into_item'      => __( 'Insert into item', 'reyoungskin' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'reyoungskin' ),
		'items_list'            => __( 'Items list', 'reyoungskin' ),
		'items_list_navigation' => __( 'Items list navigation', 'reyoungskin' ),
		'filter_items_list'     => __( 'Filter items list', 'reyoungskin' ),
	);
	$args = array(
		'label'                 => __( 'Pricing Item', 'reyoungskin' ),
		'description'           => __( 'Services and pricing items', 'reyoungskin' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'page-attributes' ),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => false,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-tag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => false,
		'capability_type'       => 'page',
		'show_in_rest'          => true, // Enable Gutenberg editor
	);
	register_post_type( 'pricing_item', $args );
}
add_action( 'init', 'reyoungskin_register_pricing_cpt', 0 );
