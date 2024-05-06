<?php

// Register Custom Taxonomy
function custom_orgevents_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Event Categories', 'Taxonomy General Name', 'orgevents' ),
		'singular_name'              => _x( 'Event Category', 'Taxonomy Singular Name', 'orgevents' ),
		'menu_name'                  => __( 'Event Category', 'orgevents' ),
		'all_items'                  => __( 'All Event Category Items', 'orgevents' ),
		'parent_item'                => __( 'Parent Event Category Item', 'orgevents' ),
		'parent_item_colon'          => __( 'Parent Event Category Item:', 'orgevents' ),
		'new_item_name'              => __( 'New Event Category Item', 'orgevents' ),
		'add_new_item'               => __( 'Add New Event Category Item', 'orgevents' ),
		'edit_item'                  => __( 'Edit Event Category Item', 'orgevents' ),
		'update_item'                => __( 'Update Event Category Item', 'orgevents' ),
		'view_item'                  => __( 'View Event Category Item', 'orgevents' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'orgevents' ),
		'add_or_remove_items'        => __( 'Add or remove Event Category items', 'orgevents' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'orgevents' ),
		'popular_items'              => __( 'Popular Event Category Items', 'orgevents' ),
		'search_items'               => __( 'Search Event Category Items', 'orgevents' ),
		'not_found'                  => __( 'Not Found', 'orgevents' ),
		'no_terms'                   => __( 'No Event Category items', 'orgevents' ),
		'items_list'                 => __( 'Items Event Category list', 'orgevents' ),
		'items_list_navigation'      => __( 'Event Category Items list navigation', 'orgevents' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'orgevents', array( 'org_events' ), $args );

}
add_action( 'init', 'custom_orgevents_taxonomy', 0 );
