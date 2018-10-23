<?php

// Register Custom Person
function person_post_type() {

	$labels = array(
		'name'                  => _x( 'People', 'Person General Name', 'cd2h' ),
		'singular_name'         => _x( 'Person', 'Person Singular Name', 'cd2h' ),
		'menu_name'             => __( 'People', 'cd2h' ),
		'name_admin_bar'        => __( 'Person', 'cd2h' ),
		'archives'              => __( 'Item Archives', 'cd2h' ),
		'attributes'            => __( 'Item Attributes', 'cd2h' ),
		'parent_item_colon'     => __( 'Parent Item:', 'cd2h' ),
		'all_items'             => __( 'All Items', 'cd2h' ),
		'add_new_item'          => __( 'Add New Item', 'cd2h' ),
		'add_new'               => __( 'Add New', 'cd2h' ),
		'new_item'              => __( 'New Item', 'cd2h' ),
		'edit_item'             => __( 'Edit Item', 'cd2h' ),
		'update_item'           => __( 'Update Item', 'cd2h' ),
		'view_item'             => __( 'View Item', 'cd2h' ),
		'view_items'            => __( 'View Items', 'cd2h' ),
		'search_items'          => __( 'Search Item', 'cd2h' ),
		'not_found'             => __( 'Not found', 'cd2h' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'cd2h' ),
		'featured_image'        => __( 'Featured Image', 'cd2h' ),
		'set_featured_image'    => __( 'Set featured image', 'cd2h' ),
		'remove_featured_image' => __( 'Remove featured image', 'cd2h' ),
		'use_featured_image'    => __( 'Use as featured image', 'cd2h' ),
		'insert_into_item'      => __( 'Insert into item', 'cd2h' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'cd2h' ),
		'items_list'            => __( 'Items list', 'cd2h' ),
		'items_list_navigation' => __( 'Items list navigation', 'cd2h' ),
		'filter_items_list'     => __( 'Filter items list', 'cd2h' ),
	);
	$args = array(
		'label'                 => __( 'Person', 'cd2h' ),
		'description'           => __( 'Person Description', 'cd2h' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-users',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'person', $args );

}
add_action( 'init', 'person_post_type', 0 );
