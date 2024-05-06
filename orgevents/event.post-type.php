<?php

require_once("classes/event.date.class.php");
require_once("classes/event.information.class.php");
require_once("classes/event.location.class.php");
require_once("classes/event.rsvp.class.php");
require_once("taxonomy/event.taxonomy.php");

if ( ! function_exists('custom_orgevents_post_type') ) {

// Register Custom Post Type
function custom_orgevents_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'orgevents' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'orgevents' ),
		'menu_name'             => __( 'Events Calendar', 'orgevents' ),
		'name_admin_bar'        => __( 'Event Calendar', 'orgevents' ),
		'archives'              => __( 'Event Archives', 'orgevents' ),
		'attributes'            => __( 'Event Attributes', 'orgevents' ),
		'parent_item_colon'     => __( 'Event Parent:', 'orgevents' ),
		'all_items'             => __( 'All Event', 'orgevents' ),
		'add_new_item'          => __( 'Add New Event', 'orgevents' ),
		'add_new'               => __( 'Add New', 'orgevents' ),
		'new_item'              => __( 'New Event', 'orgevents' ),
		'edit_item'             => __( 'Edit Event', 'orgevents' ),
		'update_item'           => __( 'Update Event', 'orgevents' ),
		'view_item'             => __( 'View Event', 'orgevents' ),
		'view_items'            => __( 'View Events', 'orgevents' ),
		'search_items'          => __( 'Search Events', 'orgevents' ),
		'not_found'             => __( 'Not found', 'orgevents' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'orgevents' ),
		'featured_image'        => __( 'Featured Event Image', 'orgevents' ),
		'set_featured_image'    => __( 'Set featured Event image', 'orgevents' ),
		'remove_featured_image' => __( 'Remove featured Event image', 'orgevents' ),
		'use_featured_image'    => __( 'Use as featured Event image', 'orgevents' ),
		'insert_into_item'      => __( 'Insert into Event', 'orgevents' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'orgevents' ),
		'items_list'            => __( 'Events list', 'orgevents' ),
		'items_list_navigation' => __( 'Events list navigation', 'orgevents' ),
		'filter_items_list'     => __( 'Filter Events list', 'orgevents' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'orgevents' ),
		'description'           => __( 'Post Type Description', 'orgevents' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'org_events', $args );

}
add_action( 'init', 'custom_orgevents_post_type', 0 );

}