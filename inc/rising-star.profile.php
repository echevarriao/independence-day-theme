<?php

function getRSProfile($postID){
	
	$inf = array();
	$profile_inf = array();
	
	$inf = get_post_meta($postID);

	if($postID){

	foreach($inf as $key => $value){
		
	$profile_inf[$key] = $value[0];
		
	}
	
	} else {
		
	return null;

	}
	
	return $profile_inf;
	
}

if ( ! function_exists('rising_star_post_type') ) {

add_action( 'init', 'rising_star_post_type',0 );
function rising_star_post_type() {
	$args = [
		'label'  => esc_html__( 'Rising Stars', 'text_domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Rising Stars', 'text_domain' ),
			'name_admin_bar'     => esc_html__( 'Rising Star', 'text_domain' ),
			'add_new'            => esc_html__( 'Add Rising Star', 'text_domain' ),
			'add_new_item'       => esc_html__( 'Add new Rising Star', 'text_domain' ),
			'new_item'           => esc_html__( 'New Rising Star', 'text_domain' ),
			'edit_item'          => esc_html__( 'Edit Rising Star', 'text_domain' ),
			'view_item'          => esc_html__( 'View Rising Star', 'text_domain' ),
			'update_item'        => esc_html__( 'View Rising Star', 'text_domain' ),
			'all_items'          => esc_html__( 'All Rising Stars', 'text_domain' ),
			'search_items'       => esc_html__( 'Search Rising Stars', 'text_domain' ),
			'parent_item_colon'  => esc_html__( 'Parent Rising Star', 'text_domain' ),
			'not_found'          => esc_html__( 'No Rising Stars found', 'text_domain' ),
			'not_found_in_trash' => esc_html__( 'No Rising Stars found in Trash', 'text_domain' ),
			'name'               => esc_html__( 'Rising Stars', 'text_domain' ),
			'singular_name'      => esc_html__( 'Rising Star', 'text_domain' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => false,
		'menu_icon'           => 'dashicons-star-half',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'rising-star', $args );
}

}

// taxonomy for rising star

// Register Custom Taxonomy
function rising_star_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Rising Star Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'risingstar-keyword', array( 'rising-star' ), $args );

}
add_action( 'init', 'rising_star_taxonomy', 0 );

