<?php
/**
 * Documentation post type.
 *
 * Twenty Twenty Child theme.
 */

// Register Custom Post Type
function docs_post_type() {

	$labels = array(
		'name'                  => _x( 'Documentation', 'Post Type General Name', 'Twenty_Twenty_Child' ),
		'singular_name'         => _x( 'Documentation', 'Post Type Singular Name', 'Twenty_Twenty_Child' ),
		'menu_name'             => __( 'Documentation', 'Twenty_Twenty_Child' ),
		'name_admin_bar'        => __( 'Doc', 'Twenty_Twenty_Child' ),
		'archives'              => __( 'Documentation Archives', 'Twenty_Twenty_Child' ),
		'attributes'            => __( 'Documentation Attributes', 'Twenty_Twenty_Child' ),
		'parent_item_colon'     => __( 'Parent Documentation:', 'Twenty_Twenty_Child' ),
		'all_items'             => __( 'All Documentation', 'Twenty_Twenty_Child' ),
		'add_new_item'          => __( 'Add New Doc', 'Twenty_Twenty_Child' ),
		'add_new'               => __( 'Add New', 'Twenty_Twenty_Child' ),
		'new_item'              => __( 'New Doc', 'Twenty_Twenty_Child' ),
		'edit_item'             => __( 'Edit Doc', 'Twenty_Twenty_Child' ),
		'update_item'           => __( 'Update Doc', 'Twenty_Twenty_Child' ),
		'view_item'             => __( 'View Doc', 'Twenty_Twenty_Child' ),
		'view_items'            => __( 'View Documentation', 'Twenty_Twenty_Child' ),
		'search_items'          => __( 'Search Doc', 'Twenty_Twenty_Child' ),
		'not_found'             => __( 'Not found', 'Twenty_Twenty_Child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'Twenty_Twenty_Child' ),
		'featured_image'        => __( 'Featured Image', 'Twenty_Twenty_Child' ),
		'set_featured_image'    => __( 'Set featured image', 'Twenty_Twenty_Child' ),
		'remove_featured_image' => __( 'Remove featured image', 'Twenty_Twenty_Child' ),
		'use_featured_image'    => __( 'Use as featured image', 'Twenty_Twenty_Child' ),
		'insert_into_item'      => __( 'Insert into item', 'Twenty_Twenty_Child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'Twenty_Twenty_Child' ),
		'items_list'            => __( 'Items list', 'Twenty_Twenty_Child' ),
		'items_list_navigation' => __( 'Items list navigation', 'Twenty_Twenty_Child' ),
		'filter_items_list'     => __( 'Filter items list', 'Twenty_Twenty_Child' ),
	);
	$rewrite = array(
		'slug'                  => 'docs',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => false,
	);
	$args = array(
		'label'                 => __( 'Documentation', 'Twenty_Twenty_Child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'doc_category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-sos',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'docs', $args );

}
add_action( 'init', 'docs_post_type', 0 );

// Register Custom Taxonomy
function doc_category_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'Twenty_Twenty_Child' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'Twenty_Twenty_Child' ),
		'menu_name'                  => __( 'Categories', 'Twenty_Twenty_Child' ),
		'all_items'                  => __( 'All Categories', 'Twenty_Twenty_Child' ),
		'parent_item'                => __( 'Parent Category', 'Twenty_Twenty_Child' ),
		'parent_item_colon'          => __( 'Parent Category:', 'Twenty_Twenty_Child' ),
		'new_item_name'              => __( 'New Category Name', 'Twenty_Twenty_Child' ),
		'add_new_item'               => __( 'Add New Category', 'Twenty_Twenty_Child' ),
		'edit_item'                  => __( 'Edit Category', 'Twenty_Twenty_Child' ),
		'update_item'                => __( 'Update Category', 'Twenty_Twenty_Child' ),
		'view_item'                  => __( 'View Category', 'Twenty_Twenty_Child' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'Twenty_Twenty_Child' ),
		'add_or_remove_items'        => __( 'Add or remove categories', 'Twenty_Twenty_Child' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'Twenty_Twenty_Child' ),
		'popular_items'              => __( 'Popular Items', 'Twenty_Twenty_Child' ),
		'search_items'               => __( 'Search Items', 'Twenty_Twenty_Child' ),
		'not_found'                  => __( 'Not Found', 'Twenty_Twenty_Child' ),
		'no_terms'                   => __( 'No items', 'Twenty_Twenty_Child' ),
		'items_list'                 => __( 'Items list', 'Twenty_Twenty_Child' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Twenty_Twenty_Child' ),
	);
	$rewrite = array(
		'slug'                       => 'topic',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'doc_category', array( 'docs' ), $args );

}
add_action( 'init', 'doc_category_taxonomy', 0 );