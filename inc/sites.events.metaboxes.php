<?php

if ( ! function_exists('custom_events_post_type') ) {

// Register Custom Post Type
function custom_events_post_type() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Events', 'text_domain' ),
		'name_admin_bar'        => __( 'Event', 'text_domain' ),
		'archives'              => __( 'Event Archives', 'text_domain' ),
		'attributes'            => __( 'Event Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Event Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Event Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Event Item', 'text_domain' ),
		'add_new'               => __( 'Add New Event', 'text_domain' ),
		'new_item'              => __( 'New Event Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Event Item', 'text_domain' ),
		'update_item'           => __( 'Update Event Item', 'text_domain' ),
		'view_item'             => __( 'View Event Item', 'text_domain' ),
		'view_items'            => __( 'View Event Items', 'text_domain' ),
		'search_items'          => __( 'Search Event Item', 'text_domain' ),
		'not_found'             => __( 'Event Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Event Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Event Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured event image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured event image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured event image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into event item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this event item', 'text_domain' ),
		'items_list'            => __( 'Event items list', 'text_domain' ),
		'items_list_navigation' => __( 'Event items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter event items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'events' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'events', $args );

}
add_action( 'init', 'custom_events_post_type', 0 );

}

///////////////////////////////

// Register Custom Taxonomy
function custom_event_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Events', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Events', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Event Categories', 'text_domain' ),
		'all_items'                  => __( 'All Event Categories', 'text_domain' ),
		'parent_item'                => __( 'Parent Event Category', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Event Category:', 'text_domain' ),
		'new_item_name'              => __( 'New Event Category', 'text_domain' ),
		'add_new_item'               => __( 'Add New Event Category', 'text_domain' ),
		'edit_item'                  => __( 'Edit Event Category', 'text_domain' ),
		'update_item'                => __( 'Update Event Category', 'text_domain' ),
		'view_item'                  => __( 'View Event Category', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove event categories', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Event Categories', 'text_domain' ),
		'search_items'               => __( 'Search Event Categories', 'text_domain' ),
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
	register_taxonomy( 'events', array( 'events' ), $args );

}
add_action( 'init', 'custom_event_taxonomy', 0 );
/*
function enqueue_date_picker(){
    wp_enqueue_script(
        'field-date', 
        get_template_directory_uri() . '/admin/field-date.js', 
        array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'),
        time(),
        true
    );  

    wp_enqueue_style( 'jquery-ui-datepicker' );
}

add_action('admin_enqueue_scripts', 'enqueue_date_picker');
*/
add_action( 'add_meta_boxes', 'cd_meta_box_add' );

function cd_meta_box_add(){

    wp_nonce_field( 'my_event_nonce', 'event_nonce' );	

    add_meta_box( 'event-main-info-id', 'Event Main Information', 'event_meta_box_main_info', 'events', 'normal', 'high' );
    add_meta_box( 'events-date-info-id', 'Event Date Information', 'event_meta_box_main_date_info', 'events', 'normal', 'high' );
    add_meta_box( 'event-location-info-id', 'Event Location Information', 'event_meta_box_location_info', 'events', 'normal', 'high' );
    add_meta_box( 'event-desc-info-id', 'Event Description Information', 'event_meta_box_desc_info', 'events', 'normal', 'high' );
	add_meta_box( 'event-rsvp-info-id', 'Event RSVP', 'event_meta_box_rsvp_info', 'events', 'normal', 'high');

}

function event_meta_box_desc_info($post){

?>	
<p><label><strong>Event Description</strong></label></p>
<?php

	wp_editor($post->post_content, 'event_desc', array('media_buttons' => true));
	
}

function event_meta_box_location_info($post){
    
    $data = get_post_custom($post->ID);

	$event_name = isset( $data['event_name'] ) ? esc_attr( $data['event_name'][0] ) : '';
	$event_address_main = isset( $data['event_address_main'] ) ? esc_attr( $data['event_address_main'][0] ) : '';
	$event_address_opt = isset( $data['event_address_opt'] ) ? esc_attr( $data['event_address_opt'][0] ) : '';
	$event_city = isset( $data['event_city'] ) ? esc_attr( $data['event_city'][0] ) : '';
	$event_state = isset( $data['event_state'] ) ? esc_attr( $data['event_state'][0] ) : '';
	$event_zip_code = isset( $data['event_zip_code'] ) ? esc_attr( $data['event_zip_code'][0] ) : '';
	$event_name = isset( $data['event_name'] ) ? esc_attr( $data['event_name'][0] ) : '';
	
?>
<table>
    <tr>
        <td>	<p>
        <label><strong>Location Name</strong>        </label>
    </p>
</td>
        <td>            <input type = "text" name = "event_name" id = "event_name" value = "<?php print $event_name; ?>" />
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>Address 1</strong>        </label>
    </p></td>
        <td>            <input type = "text" name = "event_address_main" id = "event_address_main" value = "<?php print $event_address_main; ?>" />
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>Address 2</strong>        </label>
    </p></td>
        <td>            <input type = "text" name = "event_address_opt" id = "event_address_opt" value = "<?php print $event_address_opt; ?>" />
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>City/Town</strong>        </label>
    </p></td>
        <td>            <input type = "text" name = "event_city" id = "event_city" value = "<?php print $event_city; ?>" />
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>State</strong>        </label>
    </p></td>
        <td><select name = "event_state" id = "event_state"><?php

$state_list = array('' => 'Select',

'AL'=>"Alabama",  
'AK'=>"Alaska",  

'AZ'=>"Arizona",  

'AR'=>"Arkansas",  

'CA'=>"California",  

'CO'=>"Colorado",  

'CT'=>"Connecticut",  

'DE'=>"Delaware",  

'DC'=>"District Of Columbia",  

'FL'=>"Florida",  

'GA'=>"Georgia",  

'GU' => 'Guam',

'HI'=>"Hawaii",  

'ID'=>"Idaho",  

'IL'=>"Illinois",  

'IN'=>"Indiana",  

'IA'=>"Iowa",  

'KS'=>"Kansas",  

'KY'=>"Kentucky",  

'LA'=>"Louisiana",  

'ME'=>"Maine",  

'MD'=>"Maryland",  

'MA'=>"Massachusetts",  

'MI'=>"Michigan",  

'MN'=>"Minnesota",  

'MS'=>"Mississippi",  

'MO'=>"Missouri",  

'MT'=>"Montana",

'NE'=>"Nebraska",

'NV'=>"Nevada",

'NH'=>"New Hampshire",

'NJ'=>"New Jersey",

'NM'=>"New Mexico",

'NY'=>"New York",

'NC'=>"North Carolina",

'ND'=>"North Dakota",

'OH'=>"Ohio",  

'OK'=>"Oklahoma",  

'OR'=>"Oregon",  

'PA'=>"Pennsylvania",

'PR' => 'Puerto Rico',

'RI'=>"Rhode Island",  

'SC'=>"South Carolina",  

'SD'=>"South Dakota",

'TN'=>"Tennessee",  

'TX'=>"Texas",  

'UT'=>"Utah",  

'VT'=>"Vermont",  

'VA'=>"Virginia",  

'USVI' => 'Virgin Islands, U.S.',

'WA'=>"Washington",  

'WV'=>"West Virginia",  

'WI'=>"Wisconsin",  

'WY'=>"Wyoming");

foreach($state_list as $key => $value){ ?>
<option value = "<?php print $key ?>"  <?php selected( $selected, $key ); ?>><?php print $value; ?></option>
<?php } ?>
</select>
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>Postal Code</strong>        </label>
    </p></td>
        <td>            <input type = "text" name = "event_zip_code" id = "event_zip_code" value = "<?php print $event_zip_code; ?>" />
</td>
    </tr>
</table>
	
<?php
}

function event_meta_box_main_date_info($post){

    $data = get_post_custom($post->ID);

	$event_name = isset( $data['event_date'] ) ? esc_attr( $data['event_date'][0] ) : '';
	$event_start_time = isset( $data['event_start_time'] ) ? esc_attr( $data['event_start_time'][0] ) : '';
	$event_end_time = isset( $data['event_end_time'] ) ? esc_attr( $data['event_end_time'][0] ) : '';
	
?>
<table>
    <tr>
        <td><p>
        <label><strong>Date</strong>
        </label>
    </p></td>
        <td>            <input type = "text" name = "event_date" id = "event_date" value = "<?php print $event_date ?>" />
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>Start Time</strong>
        </label>
    </p></td>
        <td>            <input type = "text" name = "event_start_time" id = "event_start_time" value = "<?php print $event_start_time ?>" />
</td>
    </tr>
    <tr>
        <td><p>
        <label><strong>End Time</strong>
        </label>
    </p></td>
        <td>            <input type = "text" name = "event_end_time" id = "event_end_time" value = "<?php print $event_end_time ?>" />
</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
    </tr>
</table>
	
<?php
	
}

function event_meta_box_main_info($post){
	
	$tar_audience = array('NONE' => 'Select Audience', 'ALL' => 'Open to All', 'STU' => 'Students', 'FAC' => 'Faculty', 'COMMUNITY' => 'University Community', 'invite' => 'Invite Only / RSVP', );
	$sponsor_orgs = array('NONE' => 'Select Audience', "DE" => "Deanery Office", "CDEE"=> "Continuing and Distance Engineering Education", "BME"=> "Biomedical Engineering Program", "BECAT"=> "Booth Engineering Center for Advanced Technology", "CEE"=> "Civil and Environmental Engineering", "CTI"=> "Connecticut Transportation Institute", "CTUP"=> "Center for Transportation and Urban Planning",     "CBE"=> "Chemical and Biomolecular Engineering", "MSE"=> "Material Science and Engineering", "CAP"=> "CT Advanced Pavement Laboratory", "CSE"=> "Computer Science and Engineering", "CGFCC"=> "Center for Clean Energy Engineering", "ECE"=> "Electrical and Computer Engineering", "ENVIRON"=> "Environmental Engineering Program", "ME"=> "Mechanical Engineering", "UGO"=> "Undergraduate Office", "STUORG"=> "Student Organization", "UNIVEVT"=> "University Event", "T2"=> "Technology Transportation Center", "FOUNDATION"=> "Alumni/Foundation", "GK12"=> "GK-12", "GRAD"=> "Graduate Office", "OTHER"=> "Other", "UTCIASE"=> "UTC Institute for Advanced Systems Engineering", );

    $data = get_post_custom($post->ID);

	$event_name = isset( $data['event_date'] ) ? esc_attr( $data['event_date'][0] ) : '';
	$event_other_sponsoring_org = isset( $data['event_other_sponsoring_org'] ) ? esc_attr( $data['event_other_sponsoring_org'][0] ) : '';
	$event_target_audience = isset( $data['event_target_audience'] ) ? esc_attr( $data['event_target_audience'][0] ) : '';
	$event_sponsoring_org = isset( $data['event_sponsoring_org'] ) ? esc_attr( $data['event_sponsoring_org'][0] ) : '';
	
?>
<table>
    <tr>
        <td><p>
	<label for="my_meta_box_text"><strong>Name of Event</strong>
   </label>
</p></td>
        <td> <input type="text" name="event_name" id="event_name" value = "" value = "<?php print $event_ ?>" /></td>
    </tr>
    <tr>
        <td><p>
	<label><strong>Target Audience</strong>
    </label>
</p></td>
        <td><select name = "event_target_audience" id = "event_target_audience">
		<?php foreach($tar_audience as $key => $value){ ?>
		<option value = "<?php print $key ?>" <?php selected($event_target_audience, $key); ?>><?php print $tar_audience[$event_target_audience] ?></option>
	<?php } ?>
    </select></td>
    </tr>
    <tr>
        <td><p><label><strong>Sponsoring Organization</strong>

</label></p></td>
        <td><select name = "event_sponsoring_org" id = "event_sponsoring_org">
		<?php foreach($sponsor_orgs as $key => $value){ ?>
		<option value = "<?php print $key ?>" <?php selected($event_sponsoring_org, $key); ?>><?php print $sponsor_orgs[$event_sponsoring_org] ?></option>
		<?php } ?>
</select></td>
    </tr>
    <tr>
        <td><p><label><strong>Other Sponsoring Organization</strong>
</label></p></td>
        <td>    <input type="text" name="event_other_sponsoring_org" id="event_other_sponsoring_org" value = "<?php print $event_other_sponsoring_org ?>"  /></label>
</td>
    </tr>
</table>

<?php    

}

add_action( 'save_post', 'event_meta_box_save' );

function event_meta_box_save($post_id){
	
	// Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;	

	// if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;	

}

class OrgEvents {
    
function __construct(){
    
    
}    
    
}
