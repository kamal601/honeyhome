<?php 
add_action( 'init', 'honeyhome_project_post' );
/**
 * Register a project post type.
 *
 *
 */
function honeyhome_project_post() {
	$labels = array(
		'name'               => _x( 'project', 'post type general name', 'honeyhome' ),
		'singular_name'      => _x( 'project', 'post type singular name', 'honeyhome' ),
		'menu_name'          => _x( 'project', 'admin menu', 'honeyhome' ),
		'name_admin_bar'     => _x( 'project', 'add new on admin bar', 'honeyhome' ),
		'add_new'            => _x( 'Add New', 'project', 'honeyhome' ),
		'add_new_item'       => __( 'Add New project', 'honeyhome' ),
		'new_item'           => __( 'New project', 'honeyhome' ),
		'edit_item'          => __( 'Edit project', 'honeyhome' ),
		'view_item'          => __( 'View project', 'honeyhome' ),
		'all_items'          => __( 'All project', 'honeyhome' ),
		'search_items'       => __( 'Search project', 'honeyhome' ),
		'parent_item_colon'  => __( 'Parent project:', 'honeyhome' ),
		'not_found'          => __( 'No project found.', 'honeyhome' ),
		'not_found_in_trash' => __( 'No project found in Trash.', 'honeyhome' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'honeyhome' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor','thumbnail','custom-fields'),
	);

	register_post_type( 'project', $args );
}

add_action( 'init', 'honeyhome_project_category', 0 );

function honeyhome_project_category(){
	// Add new taxonomy, NOT hierarchical (like tags)
	$labels = array(
		'name'                       => _x( 'Category', 'taxonomy general name', 'honeyhome' ),
		'singular_name'              => _x( 'Writer', 'taxonomy singular name', 'honeyhome' ),
		'search_items'               => __( 'Search Category', 'honeyhome' ),
		'popular_items'              => __( 'Popular Category', 'honeyhome' ),
		'all_items'                  => __( 'All Category', 'honeyhome' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit category', 'honeyhome' ),
		'update_item'                => __( 'Update Category', 'honeyhome' ),
		'add_new_item'               => __( 'Add New Category', 'honeyhome' ),
		'new_item_name'              => __( 'New Category Name', 'honeyhome' ),
		'separate_items_with_commas' => __( 'Separate Category with commas', 'honeyhome' ),
		'add_or_remove_items'        => __( 'Add or remove Category', 'honeyhome' ),
		'choose_from_most_used'      => __( 'Choose from the most used Category', 'honeyhome' ),
		'not_found'                  => __( 'No Category found.', 'honeyhome' ),
		'menu_name'                  => __( 'Category', 'honeyhome' ),
	);

	$args = array(
		'hierarchical'          => true,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'category' ),
	);

	register_taxonomy( 'project_category', 'project', $args );
};
 ?>