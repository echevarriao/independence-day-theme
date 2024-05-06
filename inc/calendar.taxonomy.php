<?php

// Register Taxonomy Calendar Keyword
// Taxonomy Key: calendarkeyword
function create_calendarkeyword_tax() {

	$labels = array(
		'name'              => _x( 'Calendar Event Keywords', 'taxonomy general name', 'calendar_event' ),
		'singular_name'     => _x( 'Calendar Event Keyword', 'taxonomy singular name', 'calendar_event' ),
		'search_items'      => __( 'Search Calendar Event Keywords', 'calendar_event' ),
		'all_items'         => __( 'All Calendar Event Keywords', 'calendar_event' ),
		'parent_item'       => __( 'Parent Calendar Event Keyword', 'calendar_event' ),
		'parent_item_colon' => __( 'Parent Calendar Event Keyword:', 'calendar_event' ),
		'edit_item'         => __( 'Edit Calendar Event Keyword', 'calendar_event' ),
		'update_item'       => __( 'Update Calendar Event Keyword', 'calendar_event' ),
		'add_new_item'      => __( 'Add New Calendar Event Keyword', 'calendar_event' ),
		'new_item_name'     => __( 'New Calendar Event Keyword Name', 'calendar_event' ),
		'menu_name'         => __( 'Calendar Event Keyword', 'calendar_event' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( 'A keyword section to identify events', 'calendar_event' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_rest' => false,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => false,
	);
	register_taxonomy( 'calendarkeyword', array('calendarevent', ), $args );

}
add_action( 'init', 'create_calendarkeyword_tax' );

