<?php

// Register Custom Post Type Calendar Event
// Post Type Key: calendarevent
function create_calendarevent_cpt() {

	$labels = array(
		'name' => __( 'Calendar Events', 'Post Type General Name', 'calendar_event' ),
		'singular_name' => __( 'Calendar Event', 'Post Type Singular Name', 'calendar_event' ),
		'menu_name' => __( 'Calendar Events', 'calendar_event' ),
		'name_admin_bar' => __( 'Calendar Event', 'calendar_event' ),
		'archives' => __( 'Calendar Event Archives', 'calendar_event' ),
		'attributes' => __( 'Calendar Event Attributes', 'calendar_event' ),
		'parent_item_colon' => __( 'Parent Calendar Event:', 'calendar_event' ),
		'all_items' => __( 'All Calendar Events', 'calendar_event' ),
		'add_new_item' => __( 'Add New Calendar Event', 'calendar_event' ),
		'add_new' => __( 'Add New Event', 'calendar_event' ),
		'new_item' => __( 'New Calendar Event', 'calendar_event' ),
		'edit_item' => __( 'Edit Calendar Event', 'calendar_event' ),
		'update_item' => __( 'Update Calendar Event', 'calendar_event' ),
		'view_item' => __( 'View Calendar Event', 'calendar_event' ),
		'view_items' => __( 'View Calendar Events', 'calendar_event' ),
		'search_items' => __( 'Search Calendar Event', 'calendar_event' ),
		'not_found' => __( 'Not found', 'calendar_event' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'calendar_event' ),
		'featured_image' => __( 'Featured Image', 'calendar_event' ),
		'set_featured_image' => __( 'Set featured image', 'calendar_event' ),
		'remove_featured_image' => __( 'Remove featured image', 'calendar_event' ),
		'use_featured_image' => __( 'Use as featured image', 'calendar_event' ),
		'insert_into_item' => __( 'Insert into Calendar Event', 'calendar_event' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Calendar Event', 'calendar_event' ),
		'items_list' => __( 'Calendar Events list', 'calendar_event' ),
		'items_list_navigation' => __( 'Calendar Events list navigation', 'calendar_event' ),
		'filter_items_list' => __( 'Filter Calendar Events list', 'calendar_event' ),
	);
	$args = array(
		'label' => __( 'Calendar Event', 'calendar_event' ),
		'description' => __( 'A event calendar', 'calendar_event' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-calendar-alt',
		'supports' => array('title', 'thumbnail', 'revisions', 'author',),
		'taxonomies' => array('calendarkeyword',),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'calendarevent', $args );

}
add_action( 'init', 'create_calendarevent_cpt', 0 );
