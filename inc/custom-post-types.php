<?php
// Register Custom Post Type
function digital_garden_register_note_post_type() {

	$labels  = array(
		'name'                  => _x( 'Notes', 'Post Type General Name', 'digital-garden' ),
		'singular_name'         => _x( 'Note', 'Post Type Singular Name', 'digital-garden' ),
		'menu_name'             => __( 'Notes', 'digital-garden' ),
		'name_admin_bar'        => __( 'Note', 'digital-garden' ),
		'archives'              => __( 'Note Archives', 'digital-garden' ),
		'attributes'            => __( 'Note Attributes', 'digital-garden' ),
		'parent_item_colon'     => __( 'Parent Note:', 'digital-garden' ),
		'all_items'             => __( 'All Notes', 'digital-garden' ),
		'add_new_item'          => __( 'Add New Note', 'digital-garden' ),
		'add_new'               => __( 'Add New', 'digital-garden' ),
		'new_item'              => __( 'New Note', 'digital-garden' ),
		'edit_item'             => __( 'Edit Note', 'digital-garden' ),
		'update_item'           => __( 'Update Note', 'digital-garden' ),
		'view_item'             => __( 'View Note', 'digital-garden' ),
		'view_items'            => __( 'View Notes', 'digital-garden' ),
		'search_items'          => __( 'Search Note', 'digital-garden' ),
		'not_found'             => __( 'Not found', 'digital-garden' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'digital-garden' ),
		'featured_image'        => __( 'Featured Image', 'digital-garden' ),
		'set_featured_image'    => __( 'Set featured image', 'digital-garden' ),
		'remove_featured_image' => __( 'Remove featured image', 'digital-garden' ),
		'use_featured_image'    => __( 'Use as featured image', 'digital-garden' ),
		'insert_into_item'      => __( 'Insert into Note', 'digital-garden' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Note', 'digital-garden' ),
		'items_list'            => __( 'Notes list', 'digital-garden' ),
		'items_list_navigation' => __( 'Notes list navigation', 'digital-garden' ),
		'filter_items_list'     => __( 'Filter Notes list', 'digital-garden' ),
	);
	$rewrite = array(
		'slug'       => 'notes',
		'with_front' => true,
		'pages'      => false,
		'feeds'      => true,
	);
	$args    = array(
		'label'               => __( 'Note', 'digital-garden' ),
		'description'         => __( 'Digital Garden Notes', 'digital-garden' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-index-card',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);
	register_post_type( 'digital_garden_note', $args );
}
add_action( 'init', 'digital_garden_register_note_post_type', 0 );

function digital_garden_register_note_tag_taxonomy() {
	$labels = array(
		'name'              => _x( 'Note Tags', 'taxonomy general name', 'digital-garden' ),
		'singular_name'     => _x( 'Note Tag', 'taxonomy singular name', 'digital-garden' ),
		'search_items'      => __( 'Search Note Tags', 'digital-garden' ),
		'all_items'         => __( 'All Note Tags', 'digital-garden' ),
		'parent_item'       => __( 'Parent Note Tag', 'digital-garden' ),
		'parent_item_colon' => __( 'Parent Note Tag:', 'digital-garden' ),
		'edit_item'         => __( 'Edit Note Tag', 'digital-garden' ),
		'update_item'       => __( 'Update Note Tag', 'digital-garden' ),
		'add_new_item'      => __( 'Add New Note Tag', 'digital-garden' ),
		'new_item_name'     => __( 'New Note Tag Name', 'digital-garden' ),
		'menu_name'         => __( 'Note Tags', 'digital-garden' ),
	);

	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'hierarchical'      => false, // Change to true if you want hierarchical tags
		'show_ui'           => true,
		'show_in_rest'      => true, // Enable for Gutenberg support
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'note-tag' ), // Change the slug as desired
	);

	register_taxonomy( 'note_tag', 'digital_garden_note', $args );
}
add_action( 'init', 'digital_garden_register_note_tag_taxonomy', 0 );
